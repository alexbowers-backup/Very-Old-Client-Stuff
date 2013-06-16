function init(elem, options){
	elem.addClass('countdownHolder');

	// Creating the markup inside the container
	$.each(['Days','Hours','Minutes','Seconds'],function(i){
		$('<span class="count'+this+'">').html(
			'<span class="position">\
				<span class="digit static">0</span>\
			</span>\
			<span class="position">\
				<span class="digit static">0</span>\
			</span>'
		).appendTo(elem);

		if(this!="Seconds"){
			elem.append('<span class="countDiv countDiv'+i+'"></span>');
		}
	});

}

// Creates an animated transition between the two numbers
function switchDigit(position,number){

	var digit = position.find('.digit')

	if(digit.is(':animated')){
		return false;
	}

	if(position.data('digit') == number){
		// We are already showing this number
		return false;
	}

	position.data('digit', number);

	var replacement = $('<div>',{
		'class':'digit',
		css:{
			top:'-2.1em',
			opacity:0
		},
		html:number
	});

	// The .static class is added when the animation
	// completes. This makes it run smoother.

	digit
		.before(replacement)
		.removeClass('static')
		.animate({top:'2.5em',opacity:0},'fast',function(){
			digit.remove();
		})

	replacement
		.delay(100)
		.animate({top:0,opacity:1},'fast',function(){
			replacement.addClass('static');
		});
}