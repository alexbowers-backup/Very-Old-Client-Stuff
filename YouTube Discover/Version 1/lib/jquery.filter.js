/*
 *	jQuery.filter.js
 * 
 *	Author: Alex Bowers
 * 	Version: 0.0 - Beta
 *	Created: Sat, Dec 24, 2011 21:58:02 GMT
 *	Last Modified: Sat, Dec 24, 2011 **:**:** GMT
 *
 */
 
 $(document).ready(function(){
	 $('.filter').live('click',function(){
        $(this).append($(this).children().first());
        $(this).attr('title',$(this).children().first().attr('name'));
        
		var filter_cat = $(this).attr('name');
		var filter_val = $(this).find('div').attr('name');
        $(this).trigger('mouseleave').trigger('mouseenter');
		$(this).find('.input').val(filter_cat + ' ' + filter_val);
		
    }); 
 });