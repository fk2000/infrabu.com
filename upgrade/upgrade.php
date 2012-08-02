<?php

function pitch_premium_upgrade_content($content){
	$content['premium_title'] = __('Upgrade To Pitch Premium', 'pitch');
	$content['premium_summary'] = __("If you've enjoyed using Pitch, you'll going to love Pitch Premium. It's a robust upgrade to Pitch that gives you loads of cool features and premium support. At just <strong>$9</strong>, it's a cost effective way to give your site a professional edge.", 'pitch');
	
	$content['buy_url'] = 'http://siteorigin.fetchapp.com/sell/uyeenaiv';
	$content['buy_button'] = get_template_directory_uri().'/upgrade/images/download.png';
	$content['buy_message_1'] = __("If you're not delighted with Pitch Premium, I'll give you a full refund", 'pitch');
	$content['buy_message_2'] = __("Remember, if you're not satisfied, you get your money back", 'pitch');
	
	$content['features'] = array();
	$content['features'][] = array(
		'heading' => __('Email Support', 'pitch'),
		'content' => __("Need help setting up Pitch? Upgrading to Pitch Premium gives you access to email support for answers to any questions you can't find in the theme documentation.", 'pitch'),
	);

	$content['features'][] = array(
		'heading' => __('Sprite Maps', 'pitch'),
		'content' => __("If you're targeting a perfect Google PageSpeed score and all the SEO benefits it brings, then sprite maps are essential. They'll make your site load faster and put less load on your servers - saving you cash.", 'pitch'),
	);

	$content['features'][] = array(
		'heading' => __('Contact Form 7 Integration', 'pitch'),
		'content' => sprintf(__('Pitch Premium includes CSS and formatting code to make your <a href="%s">Contact Form 7</a> forms fit right in to the look and feel of Pitch.', 'pitch'), 'http://wordpress.org/extend/plugins/contact-form-7/'),
	);

	$content['features'][] = array(
		'heading' => __('Additional Widgets', 'pitch'),
		'content' => __('The social widget lets you list your social profiles in your sidebar or footer. The video widget lets you put a video in your sidebar.', 'pitch'),
	);

	$content['features'][] = array(
		'heading' => __('Page Templates', 'pitch'),
		'content' => __('You also get the full width page template, with more templates coming soon.', 'pitch'),
	);

	$content['features'][] = array(
		'heading' => __('Video Projects', 'pitch'),
		'content' => __("Need to show off a video as one of your projects? Pitch Premium lets you add the URL for any video sharing site. It automatically fetches the video's embed code and displays it in your project.	", 'pitch'),
	);

	$content['features'][] = array(
		'heading' => __('Linkable Slider', 'pitch'),
		'content' => __('Pitch Premium lets you choose a destination post, page or project for each of your slider slides. This changes your homepage from something users just look at, into a gateway to the rest of your site.', 'pitch'),
	);

	$content['features'][] = array(
		'heading' => __('Dropdown Menu', 'pitch'),
		'content' => __('Pitch Premium supports drop down menus for the main menu. Perfect if you have a lot of content.', 'pitch'),
	);

	$content['features'][] = array(
		'heading' => __('Remove Attribution Links', 'pitch'),
		'content' => __('Pitch premium gives you the option to easily remove the "Powered by WordPress, Theme by SiteOrigin" text from your footer. ', 'pitch'),
	);
	
	return $content;
}
add_filter('so_premium_content', 'pitch_premium_upgrade_content');