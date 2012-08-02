<div class="gallery flexslider">
	<ul class="slides">
		<?php
		$images = get_children(array(
			'post_parent' => $GLOBALS['pitch_gallery_atts']['id'],
			'post_mime_type' => 'image',
		));
		foreach($images as $image){
			?><li><?php
			print wp_get_attachment_image(
				$image->ID,
				isset($GLOBALS['pitch_gallery_atts']['size']) ? $GLOBALS['pitch_gallery_atts']['size'] : 'gallery'
			)
			?></li><?php
		}
		?>
	</ul>
	<div class="shadow"></div>
</div>