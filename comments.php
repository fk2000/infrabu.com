<?php if(have_comments()) : ?>
	<div id="comments">
		<div class="separator"></div>
		<h3 id="comments-title">Comments</h3>
		<ul id="comment-list">
			<?php wp_list_comments(array('callback' => 'pitch_comment_display_comment')) ?>
		</ul>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-below">
				<div class="nav-previous"><?php previous_comments_link( __( 'Older Comments', 'pitch' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'pitch' ) ); ?></div>
			</nav>
		<?php endif ?>
	</div>
<?php endif ?>
<?php if ( !comments_open() && !is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
	<div id="comments">
		<?php print $GLOBALS['pitch_theme_settings']['comments_closed_text'] ?>
	</div>
<?php endif ?>

<?php comment_form() ?>