<li <?php comment_class() ?> id="comment-<?php comment_ID()?>">
	<?php if(get_comment_type() == 'comment') : ?>
		<div class="avatar-container">
			<?php print get_avatar(get_comment_author_email(), 65) ?>
			<div class="shadow"></div>
		</div>
		<div class="comment-text">
			<div class="comment-separator"><?php comment_reply_link(array('depth' => $GLOBALS['comment_depth'], 'max_depth' => $GLOBALS['comment_args']['max_depth'])) ?></div>
			<div class="content entry-content"><?php comment_text() ?></div>
			<div class="comment-info">
				<span class="comment-author"><?php comment_author_link() ?></span><span class="comment-date"><?php comment_date() ?></span>
			</div>
		</div>
		<div class="clear"></div>
	<?php elseif(get_comment_type() == 'pingback') : ?>
		<div class="pingback-title"><?php comment_author_link() ?></div>
		<div class="pingback-date"><?php comment_date() ?></div>
		<div class="pingback-content"><?php comment_text() ?></div>
	<?php endif ?>