jQuery(document).ready(function(){
	
	
	if(jQuery('#last_tab').val() == ''){

		jQuery('.furnihome-opts-group-tab:first').slideDown('fast');
		jQuery('#furnihome-opts-group-menu li:first').addClass('active');
	
	}else{
		
		tabid = jQuery('#last_tab').val();
		jQuery('#'+tabid+'_section_group').slideDown('fast');
		jQuery('#'+tabid+'_section_group_li').addClass('active');
		
	}
	
	
	jQuery('input[name="'+furnihome_opts.opt_name+'[defaults]"]').click(function(){
		if(!confirm(furnihome_opts.reset_confirm)){
			return false;
		}
	});
	
	jQuery('.furnihome-opts-group-tab-link-a').click(function(){
		relid = jQuery(this).attr('data-rel');
		
		jQuery('#last_tab').val(relid);
		
		jQuery('.furnihome-opts-group-tab').each(function(){
			if(jQuery(this).attr('id') == relid+'_section_group'){
				jQuery(this).show();
			}else{
				jQuery(this).hide();
			}
			
		});
		
		jQuery('.furnihome-opts-group-tab-link-li').each(function(){
				if(jQuery(this).attr('id') != relid+'_section_group_li' && jQuery(this).hasClass('active')){
					jQuery(this).removeClass('active');
				}
				if(jQuery(this).attr('id') == relid+'_section_group_li'){
					jQuery(this).addClass('active');
				}
		});
	});
	
	
	
	
	if(jQuery('#furnihome-opts-save').is(':visible')){
		jQuery('#furnihome-opts-save').delay(4000).slideUp('slow');
	}
	
	if(jQuery('#furnihome-opts-imported').is(':visible')){
		jQuery('#furnihome-opts-imported').delay(4000).slideUp('slow');
	}	
	
	jQuery('input, textarea, select').change(function(){
		jQuery('#furnihome-opts-save-warn').slideDown('slow');
	});
	
	
	jQuery('#furnihome-opts-import-code-button').click(function(){
		if(jQuery('#furnihome-opts-import-link-wrapper').is(':visible')){
			jQuery('#furnihome-opts-import-link-wrapper').fadeOut('fast');
			jQuery('#import-link-value').val('');
		}
		jQuery('#furnihome-opts-import-code-wrapper').fadeIn('slow');
	});
	
	jQuery('#furnihome-opts-import-link-button').click(function(){
		if(jQuery('#furnihome-opts-import-code-wrapper').is(':visible')){
			jQuery('#furnihome-opts-import-code-wrapper').fadeOut('fast');
			jQuery('#import-code-value').val('');
		}
		jQuery('#furnihome-opts-import-link-wrapper').fadeIn('slow');
	});
	
	
	
	
	jQuery('#furnihome-opts-export-code-copy').click(function(){
		if(jQuery('#furnihome-opts-export-link-value').is(':visible')){jQuery('#furnihome-opts-export-link-value').fadeOut('slow');}
		jQuery('#furnihome-opts-export-code').toggle('fade');
	});
	
	jQuery('#furnihome-opts-export-link').click(function(){
		if(jQuery('#furnihome-opts-export-code').is(':visible')){jQuery('#furnihome-opts-export-code').fadeOut('slow');}
		jQuery('#furnihome-opts-export-link-value').toggle('fade');
	});
	
	

	
	
	
});