<div id="slider">
	<div class="container">
		<div class="slides nivoSlider">
			<img src="<?php print get_template_directory_uri() ?>/demo/slide.jpg" />
			<img src="<?php print get_template_directory_uri() ?>/demo/slide.jpg" />
			<img src="<?php print get_template_directory_uri() ?>/demo/slide.jpg" />
		</div>
		<div class="indicators-wrapper">
			<ul class="indicators">
				<li class="indicator active" style="width:33.333%">
					<div class="indicator-container">
						<div class="pointer"></div>
						<h4><?php _e('A Demo Slide', 'pitch') ?></h4>
						<p><?php _e('And a demo slide description', 'pitch') ?></p>
					</div>
				</li>
				<li class="indicator" style="width:33.333%">
					<div class="indicator-container">
						<div class="pointer"></div>
						<h4><?php _e('This is The Slide Title', 'pitch') ?></h4>
						<p><?php _e('This is the slide excerpt', 'pitch') ?></p>
					</div>
				</li>
				<li class="indicator" style="width:33.333%">
					<div class="indicator-container">
						<div class="pointer"></div>
						<h4><?php _e('Slides Are Easy To Add', 'pitch') ?></h4>
						<p><?php _e('You can do it right from your admin', 'pitch') ?></p>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>