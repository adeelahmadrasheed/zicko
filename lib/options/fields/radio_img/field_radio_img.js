/*
 *
 * Furnihome_Options_radio_img function
 * Changes the radio select option, and changes class on images
 *
 */
function furnihome_radio_img_select(relid, labelclass){
	jQuery(this).prev('input[type="radio"]').prop('checked');

	jQuery('.furnihome-radio-img-'+labelclass).removeClass('furnihome-radio-img-selected');	
	
	jQuery('label[for="'+relid+'"]').addClass('furnihome-radio-img-selected');
}//function