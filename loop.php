<?php if(have_posts()) :  ?>
	<div id="loop" class="loop-posts">
		<?php while(have_posts()) : the_post(); ?>
			<div id="post-<?php the_ID() ?>" <?php post_class() ?>>
				<div class="post-info">
					<div class="date">
						<span class="day"><?php print get_the_date('d') ?></span>
						<span class="month-year"><?php print get_the_date('M') ?><br/><?php print get_the_date('Y') ?></span>
					</div>
					
					<div class="extras">
						<div class="categories">
							<?php the_category(', ') ?>
						</div>
						<div class="comment-count">
							<?php
								$comments = get_comment_count(get_the_ID());
								if($comments['approved'] > 0){
									printf(__('%s Comments', 'pitch'), $comments['approved']);
								}
							?>
						</div>
						<div class="author">
							<?php printf(__('By %s', 'pitch'), get_the_author_link()) ?>
						</div>
					</div>
				</div>
				<div class="post-main">
					<a href="<?php the_permalink() ?>"><?php print get_the_post_thumbnail() ?></a>
					
					<h2 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
					
					<div class="excerpt content">
						<?php the_excerpt() ?>
					</div>
					
					<div class="read-more">
						<a href="<?php the_permalink() ?>">
							<?php _e('Read More', 'pitch') ?>
							<i></i>
						</a>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		<?php endwhile; ?>
		
		<div class="pagination">
			<?php if($GLOBALS['wp_query']->max_num_pages > 1) : ?><div class="separator"></div><?php endif ?>
			<?php posts_nav_link(' ', __('Newer Entries', 'pitch'), __('Older Entries', 'pitch')); ?>
			<?php if($GLOBALS['wp_query']->max_num_pages > 1) : ?><div class="clear"></div><div class="separator"></div><?php endif ?>
		</div>
	</div>
<?php endif ?>