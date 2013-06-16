/*
 *	jQuery.navigation.js
 * 
 *	Author: Alex Bowers
 * 	Version: 0.0 - Beta
 *	Created: Sat, Dec 24, 2011 18:24:15 GMT
 *	Last Modified: Sat, Dec 24, 2011 21:56:09 GMT
 *
 */
 
$(document).ready(function(){
	$("#categories li").click(function(){
			var catChosen = $(this).attr('name');
			var catChosenName = $(this).attr('temp');
			
			$('.step_2 #sub-categories').attr('holder',catChosen);
			$('.step_1').fadeOut('slow',function(){
				$.cookie('step1name',catChosenName);
				$.cookie('step1',catChosen);
				showSubCategories(catChosen);
				$('.step_2').fadeIn('slow');
			});
			
	});
	
	$('#sub-categories li').live('click',function(){
       		 var catChosen = $(this).attr('holder');
			 var subCat = $(this).attr('name');
			 
			 
			 $('.step_2').fadeOut('slow',function(){
				$.cookie('step2',subCat);
				$('.step_3').fadeIn('slow');
			 	$('#right').fadeIn('slow');
				showFilters('anything','anything');
			 });
	});
});