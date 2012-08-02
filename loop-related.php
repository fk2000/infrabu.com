<?php if(have_posts()) : global $home_loop_title, $wp_query, $post; ?>
<div class="home-loop">
	<div class="container">
		<?php if(count($wp_query->posts) > 4) : ?>
		<div class="nav">
			<a href="#previous" class="prev">previous</a>
			<a href="#next" class="next">next</a>
		</div>
		<?php endif; ?>
		<h3><?php print $GLOBALS['home_loop_title'] ?></h3>
		<div class="post-list-wrapper">
			<ul class="post-list">
				<?php while(have_posts()) : the_post(); $type = get_post_type_object(get_post_type()) ?>
				<li <?php post_class(array('post')) ?>>

					<?php if($type->public) { ?><a href="<?php the_permalink() ?>"><?php } ?>
					<?php if(has_post_thumbnail()) : ?>
					<?php print get_the_post_thumbnail(get_the_ID(), 'home-loop') ?>
					<?php else : ?>
					<div class="placeholder"></div>
					<?php endif; ?>
					<?php if($type->public) print '</a>' ?>

					<?php if($post->post_type != 'client') : ?>
					<?php if($type->public) { ?><a href="<?php the_permalink() ?>"><?php } ?>
					<h4><?php the_title() ?></h4>
					<?php if($type->public) print '</a>' ?>
					<?php endif ?>

					<?php if(!empty($post->post_excerpt)) : ?>
					<p><?php print $post->post_excerpt ?></p>
					<?php endif; ?>

				</li>
				<?php endwhile; ?>
			</ul>
		</div>
	</div>
</div>
<?php endif ?>