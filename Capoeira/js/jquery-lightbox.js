// repo @ https://github.com/khoomeister/jquery-lightbox
(function($) {
	// get the folder for images - note this only works for scripts that're statically included (e.g. <SCRIPT>),
	// not scripts that're dynamically included (e.g. $.getScript)
	var scripts = document.getElementsByTagName('script');
	var jsUrl = scripts[scripts.length - 1].src;
	var imageFolder = jsUrl.replace(/[^/]+$/i, '');

	// create jquery lightbox plugin
	$.fn.lightbox = function(options) {
        var imageCount;

		var settings = {
			overlayBackgroundColor: '#000000',
			overlayOpacity:	0.7,

			startContainerOpacity: 0.2,
			
			fixedNavigation: false, // if true, the previous & next button images will be fixed.  If false, the images will only appear on mouse over
			
            blankImage: imageFolder + '../img/lightbox/jquery-lightbox-blank.gif',
			loadingImage: imageFolder + '../img/lightbox/jquery-lightbox-ico-loading.gif',
			previousButtonImage: imageFolder + '../img/lightbox/jquery-lightbox-btn-prev.gif',
			nextButtonImage: imageFolder + '../img/lightbox/jquery-lightbox-btn-next.gif',
			closeButtonImage: imageFolder + '../img/lightbox/jquery-lightbox-btn-close.gif',
			
			containerPadding: 10,
			containerGrowSpeed: 300,
			
			itemText: 'Image',
			ofText: 'of',
			
			keyCodeToClose: 27,
			keyCodeToPrev: 37,
			keyCodeToNext: 39,

			// below ettings are used internally by jQuery Lightbox (do not alter unless you want things to potentially stuff up!)
			itemList: [],
			activeItem: 0
		};
        $.extend(settings, options);
		
		// Functions
		function closeLightBox() {
			$('#jquery-lightbox').remove();
			$('#jquery-lightbox-overlay').fadeOut(function() { $('#jquery-lightbox-overlay').remove(); });
			// Show some elements to avoid conflict with overlay in IE. These elements appear above the overlay.
			$('embed, object, select').css({ 'visibility' : 'visible' });
            $(document).unbind('keyup', keyupEvent);
		}
		
		function getViewableLeftTopCoordinates() {
			// Based on getPageScroll() by quirksmode.com
			var xScroll, yScroll;
			if (self.pageYOffset) {
				yScroll = self.pageYOffset;
				xScroll = self.pageXOffset;
			} else if (document.documentElement && document.documentElement.scrollTop) { // Explorer 6 Strict
				yScroll = document.documentElement.scrollTop;
				xScroll = document.documentElement.scrollLeft;
			} else if (document.body) {// all other Explorers
				yScroll = document.body.scrollTop;
				xScroll = document.body.scrollLeft;	
			}
			return {left: xScroll, top: yScroll};
		}

        function goImage(relativePos) {
            $('#jquery-lightbox-loading').show();
            $('#jquery-lightbox-container-box').css({height: $('#jquery-lightbox-loading-image').height()});
            settings.activeItem += relativePos;
            displayActiveImage();
        }

		function goNextImage() {
            goImage(1);
		}
		
		function goPrevImage() {
            goImage(-1);
		}

		function initLightBox(clickedElt, matches) {
			function addToItemList(elt) {
				settings.itemList.push({
					href: elt.getAttribute('href'),
					title: elt.getAttribute('title'),
					width: elt.getAttribute('width'),
					height: elt.getAttribute('height')
				});
			}

			function adjustOverlayAndLightBox() {
				var viewableCoordinates = getViewableLeftTopCoordinates();

				// Style overlay and show it
				$('#jquery-lightbox-overlay').css({
					left: viewableCoordinates.left,
					top: viewableCoordinates.top,
					width: $(window).width(),
					height: $(window).height()
				});

				// Calculate top and left offset for the jquery-lightbox div object and show it
				$('#jquery-lightbox').css({
					left: viewableCoordinates.left,
					top: viewableCoordinates.top
				});
			}
			
		    // Hide some elements to avoid conflict with overlay in IE. These elements appear above the overlay.
			$('embed, object, select').css({'visibility' : 'hidden'});
			
			// Apply the HTML markup into body tag
			$('body').append('<div id="jquery-lightbox-overlay"></div>' +
				'<div id="jquery-lightbox"><div id="jquery-lightbox-container-box">' +
					'<div id="jquery-lightbox-container"></div>' +
					'<div id="jquery-lightbox-nav">' +
						'<a href="#" id="jquery-lightbox-nav-btnPrev"></a><a href="#" id="jquery-lightbox-nav-btnNext"></a>' +
					'</div>' +
					'<div id="jquery-lightbox-loading">' +
						'<a href="#" id="jquery-lightbox-loading-link"><img id="jquery-lightbox-loading-image" src="' + settings.loadingImage + '" /></a>' +
					'</div>' +
					'<div id="jquery-lightbox-footer-box">' +
						'<div id="jquery-lightbox-footer-data"></div>' +
						'<a href="#" id="jquery-lightbox-closeButton"><img src="' + settings.closeButtonImage + '" /></a>' +
					'</div>' +
				'</div></div>');
			$('#jquery-lightbox-closeButton').hide();

			// Style overlay and show it
			adjustOverlayAndLightBox();
			$('#jquery-lightbox-overlay').css({
				backgroundColor: settings.overlayBackgroundColor,
				opacity: settings.overlayOpacity
			}).fadeIn();

			// Assigning click events in elements to close overlay
			$('#jquery-lightbox-overlay, #jquery-lightbox-closeButton').click(function() {
				closeLightBox();
				return false;
			});

			// If window is resized or scrolled, calculate the new overlay dimensions
			$(window).resize(adjustOverlayAndLightBox);
			$(window).scroll(adjustOverlayAndLightBox);

			// Unset total images in imageArray
			settings.itemList.length = 0;
			settings.activeItem = 0;

            imageCount = matches.length;
			if (imageCount == 1) {
				addToItemList(clickedElt);
			} else {
				// Add an Array (as many as we have), with href and title atributes, inside the Array that storage the images references		
				for ( var i = 0; i < imageCount; i++ ) {
					var elt = matches[i];
					addToItemList(elt);
				}
			}

            // find the correct active image by comparing clickedElt to imageArray
			while (settings.itemList[settings.activeItem].href != clickedElt.getAttribute('href') ) {
				settings.activeItem++;
			}

			// deselects the link - if user presses Enter key while in lightbox, it re-opens the lightbox and loading icon goes out of position and stays on the screen
			var linkElt = matches[settings.activeItem];
			linkElt.blur();
			
			// set initial position of lightbox container
			// note: Jelt stands for "jQuery element".
			var imageJelt = $(linkElt.firstChild);
			var viewableCoordinates = getViewableLeftTopCoordinates();
			var imageWidth, imageHeight;

			if (imageJelt.css('display') === 'block') {
				imageWidth = imageJelt.outerWidth();
				imageHeight = imageJelt.outerHeight();
			} else {
				imageWidth = 0;
				imageHeight = 0;
			}

			var offset = imageJelt.offset();
			$('#jquery-lightbox-container-box').css({
				left: offset.left - viewableCoordinates.left,
				top: offset.top - viewableCoordinates.top,
				width: imageWidth,
				height: imageHeight,
				opacity: settings.startContainerOpacity
			});
			
            $(document).keyup(keyupEvent);

			// Call the function that prepares image exhibition
			$('#jquery-lightbox-loading').show();
			displayActiveImage();
		}
		
		function displayActiveImage() {
            function enablePrevNextButtons() {
                $('#jquery-lightbox-nav').show();
                // don't try to set #jquery-lightbox-nav width to 100% in CSS because it won't work in IE 6
                $('#jquery-lightbox-nav').css('left', settings.containerPadding + 'px');
                $('#jquery-lightbox-nav').width($('#jquery-lightbox-container-box').width() + 'px');

                // the below line is required by IE to display & make the previous & next buttons clickable
                $('#jquery-lightbox-nav-btnPrev, #jquery-lightbox-nav-btnNext').css({ background: 'transparent url(' + settings.blankImage + ') no-repeat' });

                // Show the prev & next button, if not the first nor last image in the set
                if (settings.activeItem > 0) {
                    showButton('#jquery-lightbox-nav-btnPrev', goPrevImage, 'url(' + settings.previousButtonImage + ') left 15% no-repeat');
                }
                if (settings.activeItem < imageCount - 1) {
                    showButton('#jquery-lightbox-nav-btnNext', goNextImage, 'url(' + settings.nextButtonImage + ') right 15% no-repeat');
                }
            }
            
            function growContainerBox(imageWidth, imageHeight, isImage) {
                function showFooterBox() {
                    var text = '';
                    if (imageCount > 1) {
                        text += '<p>' + settings.itemText + ' ' + (settings.activeItem + 1) + ' ' + settings.ofText + ' ' + imageCount + '</p>';
                    }

                    var title = settings.itemList[settings.activeItem].title;
                    if (title) {
                        text += '<p class="caption">' + title + '</p>';
                    }
                    $('#jquery-lightbox-footer-box').show();
					$('#jquery-lightbox-footer-box').height('0px');

					var maxFrames = 10;

					// resize the footer data width so it doesn't push down the close button
					// and also measure its height to set accordingly during animation
					$('#jquery-lightbox-footer-data').width(($('#jquery-lightbox-footer-box').width() - $('#jquery-lightbox-closeButton').width()) + 'px');
                    $('#jquery-lightbox-footer-data').html(text);
					var incrHeight = ($('#jquery-lightbox-footer-data').height() + ($.browser.msie ? settings.containerPadding : 0)) / maxFrames;
					$('#jquery-lightbox-footer-data').hide();

                    // animate height
                    // need to increase jquery-lightbox-container-box manually because of IE6 so need to increase both the footer box & container box height
                    // at the same time
					var frame = 0;
                    var interval = setInterval(function() {
                        frame++;
                        if (frame == (maxFrames + 1)) {
							$('#jquery-lightbox-footer-data').show();
                            $('#jquery-lightbox-closeButton').show();
                            clearInterval(interval);
                        } else {
                            $('#jquery-lightbox-footer-box').height(($('#jquery-lightbox-footer-box').height() + incrHeight) + 'px');
                            $('#jquery-lightbox-container-box').height(($('#jquery-lightbox-container-box').height() + incrHeight) + 'px');
                        }
                    }, 10);
                }

                var containerBox = $('#jquery-lightbox-container-box');
                var containerPadding = settings.containerPadding;
                containerBox.css({padding: containerPadding});

                var containerWidth = imageWidth;
                var containerHeight = imageHeight;

                var containerAnimationDestination = {
                    left: ($(window).width() / 2) - (containerWidth / 2),
                    top: ($(window).height() / 2) - (containerHeight / 2),
                    width: containerWidth,
                    height: containerHeight,
                    opacity: 1
                }

                // perform the growing effect
                containerBox.animate(containerAnimationDestination, settings.containerGrowSpeed, function() {
                    // kill the height so that the data box can slide down (note: doesn't work with IE6 though)
                    containerBox.css({height: null});

                    // fade in image
                    $('#jquery-lightbox-loading').hide();
                    showFooterBox();
                    if (isImage) {
                        $('#jquery-lightbox-image').fadeIn(enablePrevNextButtons);
                    }

                    // preload previous & next images
                    if (settings.activeItem  < imageCount - 1) {
                        var nextImage = new Image();
                        nextImage.src = settings.itemList[settings.activeItem + 1].href;
                    }
                    if (settings.activeItem > 0) {
                        var prevImage = new Image();
                        prevImage.src = settings.itemList[settings.activeItem - 1].href;
                    }
                });

                $('#jquery-lightbox-footer-box').css({ width: imageWidth });
                $('#jquery-lightbox-nav-btnPrev, #jquery-lightbox-nav-btnNext').css({ height: imageHeight + containerPadding });
            }

            function showButton(selector, goImageFunction, backgroundCss) {
                if (settings.fixedNavigation) {
                    $(selector).css({'background' : backgroundCss}).show().unbind().bind('click',function() {
                        goImageFunction();
                        return false;
                    });
                } else {
                    // Show the images button for Next buttons
                    $(selector).unbind().hover(function() {
                        $(this).css({background: backgroundCss});
                    }, function() {
                        $(this).css({background: 'transparent url(' + settings.blankImage + ') no-repeat'});
                    }).show().bind('click', function() {
                        goImageFunction();
                        return false;
                    });
                }
            }
            
            // hide all relevant elements
			$('#jquery-lightbox-nav, #jquery-lightbox-nav-btnPrev, #jquery-lightbox-nav-btnNext, #jquery-lightbox-footer-box').hide();

			var item = settings.itemList[settings.activeItem]
            var url = item.href;
            var parsedUrl = parseUrl(url);
            if (parsedUrl.host.toLowerCase().indexOf('youtube') != -1) {
                var youtubeVideoId = parsedUrl.params.v;
                var videoWidth = item.width;
                var videoHeight= item.height;
                $('#jquery-lightbox-container').html('<iframe width="' + videoWidth + '" height="' + videoHeight + '" src="http://www.youtube.com/embed/' + youtubeVideoId + '" frameborder="0" allowfullscreen></iframe>');
                growContainerBox(videoWidth, videoHeight, false);
            } else {
                // preload image and once it's done, load into lightbox
                var image = new Image();
                $(image).one('load', function() {
                    // check that user hasn't switched to another image using left or right keys in the meantime - if so, don't do the animation
                    if (url == settings.itemList[settings.activeItem].href) {
                        $('#jquery-lightbox-container').html('<img id="jquery-lightbox-image" />');
                        $('#jquery-lightbox-image').hide();
                        $('#jquery-lightbox-image').attr('src', url);
                        growContainerBox(image.width, image.height, true);
                    }
                });
                image.src = url;
            }
		};

        function keyupEvent(e) {
            var keyCode = e == null ? event.keyCode : e.keyCode; // IE : Mozilla

            // Verify the keys to close the ligthBox
            switch(keyCode) {
            case settings.keyCodeToClose:
                closeLightBox();
                break;
            case settings.keyCodeToPrev:
                // If we're not showing the first image, call the previous.
                if (settings.activeItem > 0) {
                    goPrevImage();
                }
                break;
            case settings.keyCodeToNext:
                // If we're not showing the last image, call the next.
                if (settings.activeItem < imageCount - 1) {
                    goNextImage();
                }
            }
        }

		function parseUrl(url) {
			var a =  document.createElement('a');
			a.href = url;
			return {
				source: url,
				protocol: a.protocol.replace(':',''),
				host: a.hostname,
				port: a.port,
				query: a.search,
				params: (function() {
					var
						ret = {},
						seg = a.search.replace(/^\?/,'').split('&'),
						len = seg.length, i = 0, s;
					for (;i<len;i++) {
						if (!seg[i]) { continue; }
						s = seg[i].split('=');
						ret[s[0]] = s[1];
					}
					return ret;
				})(),
				file: (a.pathname.match(/\/([^\/?#]+)$/i) || [,''])[1],
				hash: a.hash.replace('#',''),
				path: a.pathname.replace(/^([^\/])/,'/$1'),
				relative: (a.href.match(/tps?:\/\/[^\/]+(.+)/) || [,''])[1],
				segments: a.pathname.replace(/^\//,'').split('/')
			};
		}
		
		// Main
		var allMatches = this;
		return this.unbind('click').click(function() {
			var clickedElt = this;
			initLightBox(clickedElt, allMatches);
			return false; // returning false will avoid the browser following the link
		});
	};
})(jQuery);