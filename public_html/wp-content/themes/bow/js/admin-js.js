jQuery(function() {

var pageTemplate = jQuery("#page_template");


		if(pageTemplate.val() == 'default' || 'page-home-slider.php') {
			jQuery('#bow_image_metabox').hide();
			jQuery('#bow_video_metabox').hide();
			jQuery('#bow_contact_metabox').hide();
			jQuery('#bow_gallery_metabox').hide();
			jQuery('#bow_about_metabox').hide();
		}

		if(pageTemplate.val() == 'page-home-image.php') {
			jQuery('#bow_image_metabox').show();
			jQuery('#bow_video_metabox').hide();
			jQuery('#bow_contact_metabox').hide();
			jQuery('#bow_gallery_metabox').hide();
			jQuery('#bow_about_metabox').hide();
		}

		if(pageTemplate.val() == 'page-home-video.php') {
			jQuery('#bow_image_metabox').hide();
			jQuery('#bow_video_metabox').show();
			jQuery('#bow_contact_metabox').hide();
			jQuery('#bow_gallery_metabox').hide();
			jQuery('#bow_about_metabox').hide();
		}

		if(pageTemplate.val() == 'page-contact.php') {
			jQuery('#bow_image_metabox').hide();
			jQuery('#bow_video_metabox').hide();
			jQuery('#bow_about_metabox').hide();
			jQuery('#bow_gallery_metabox').hide();
			jQuery('#bow_contact_metabox').show();
		}

		if(pageTemplate.val() == 'page-about.php') {
			jQuery('#bow_image_metabox').hide();
			jQuery('#bow_video_metabox').hide();
			jQuery('#bow_contact_metabox').hide();
			jQuery('#bow_gallery_metabox').hide();
			jQuery('#bow_about_metabox').show();
		}

		if(pageTemplate.val() == 'page-work.php') {
			jQuery('#bow_image_metabox').hide();
			jQuery('#bow_video_metabox').hide();
			jQuery('#bow_contact_metabox').hide();
			jQuery('#bow_about_metabox').hide();
			jQuery('#bow_gallery_metabox').show();
		}



	pageTemplate.change(function(){
		if(jQuery(this).val() == 'default' || 'page-home-slider.php') {
			jQuery('#bow_image_metabox').hide();
			jQuery('#bow_video_metabox').hide();
			jQuery('#bow_contact_metabox').hide();
			jQuery('#bow_about_metabox').hide();
			jQuery('#bow_gallery_metabox').hide();
		}

		if(jQuery(this).val() == 'page-home-image.php') {
			jQuery('#bow_image_metabox').show();
			jQuery('#bow_video_metabox').hide();
			jQuery('#bow_contact_metabox').hide();
			jQuery('#bow_about_metabox').hide();
			jQuery('#bow_gallery_metabox').hide();
		}

		if(jQuery(this).val() == 'page-home-video.php') {
			jQuery('#bow_image_metabox').hide();
			jQuery('#bow_video_metabox').show();
			jQuery('#bow_contact_metabox').hide();
			jQuery('#bow_gallery_metabox').hide();
			jQuery('#bow_about_metabox').hide();
		}

		if(jQuery(this).val() == 'page-contact.php') {
			jQuery('#bow_image_metabox').hide();
			jQuery('#bow_video_metabox').hide();
			jQuery('#bow_about_metabox').hide();
			jQuery('#bow_gallery_metabox').hide();
			jQuery('#bow_contact_metabox').show();
		}

		if(jQuery(this).val() == 'page-about.php') {
			jQuery('#bow_image_metabox').hide();
			jQuery('#bow_video_metabox').hide();
			jQuery('#bow_contact_metabox').hide();
			jQuery('#bow_gallery_metabox').hide();
			jQuery('#bow_about_metabox').show();
		}

		if(jQuery(this).val() == 'page-work.php') {
			jQuery('#bow_image_metabox').hide();
			jQuery('#bow_video_metabox').hide();
			jQuery('#bow_contact_metabox').hide();
			jQuery('#bow_about_metabox').hide();
			jQuery('#bow_gallery_metabox').show();
		}



	});


});