<?php
global $post;
$video = get_post_meta($post->ID, 'project_video', true);
global $wp_embed;

?>

<div id="project-images">
	<div class="image">
		<?php
		if(!empty($video) && defined('SO_IS_PREMIUM')) print $wp_embed->shortcode(array('width' => 600), $video);
		else print do_shortcode("[gallery id='{$post->ID}' size='project']");
		?>
	</div>
</div>