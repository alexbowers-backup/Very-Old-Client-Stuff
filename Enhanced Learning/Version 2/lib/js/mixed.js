jQuery(document).ready(function($) {
	//===============================================	
	// 		TOOLTIP
	//===============================================
	
	$("#social_icons li a[title]").tooltip({effect: 'slide', slideSpeed: 200});
	
	//===============================================	
	// 		NAVIGATION	
	//===============================================	
	
	$('#menu_list').dcAccordion({
		classParent: 'menu_list_parent',
		eventType: 'hover',
		autoClose: true,
		menuClose: false,
		saveState: true,
		disableLink: false,
		hoverDelay: 0,
		classArrow: 'menu_list_icon',
		speed: 300
	});	
	
	//===============================================
	// 		REPONSIVE NAVIGATION
	//===============================================
	
	// Create the dropdown bases
	$("<select />").appendTo("#menu nav");
	
	// Create default option "Go to page..."
	$("<option />", {
	   "selected": "selected",
	   "value"   : "",
	   "text"    : "Go to page..."
	}).appendTo("nav select");
	
	// Populate dropdowns with the first menu items
	$("#menu_list li").each(function() {
		
		var depth   = $(this).parents('ul').length - 1;
		
		var dash = '';
		if( depth > 0 ) { dash = '- '; }
		if( depth > 1 ) { dash = '-- '; }
		
		var el = $(this).children('a');
		 $("<option />", {
			 "value"   : el.attr("href"),
			 "text"    : (dash + el.text())
		}).appendTo("nav select");
	});

	
	//make responsive dropdown menu actually work			
	$("#menu nav select").change(function() {
		window.location = $(this).find("option:selected").val();
	});

})