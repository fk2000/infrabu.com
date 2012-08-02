<?php

function pitch_demo_template_redirect(){
	if(isset($_GET['demo_project']) && $GLOBALS['pitch_theme_settings']['type_project']){
		$projects = wp_count_posts('project');
		if($projects->publish == 0) {
			// Display the demo projects if there aren't any real projects
			get_template_part('demo/project');
			exit();
		}
		else return;
	}
	
	if(isset($_GET['features_page'])){
		$projects = wp_count_posts('project');
		if($projects->publish == 0) {
			// Only display the features page when the user hasn't added any of their own projects
			get_template_part('demo/page', 'features');
			exit();
		}
	}
}
add_action('template_redirect', 'pitch_demo_template_redirect');