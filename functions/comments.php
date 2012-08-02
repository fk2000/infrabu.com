<?php

function pitch_comments_before_form(){
	print '<div class="separator"></div>';
}
add_action('comment_form_before', 'pitch_comments_before_form');

function pitch_comments_comment_defaults($defaults){
	if(empty($defaults['fields'])) $defaults['fields'] = array();
	
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	
	$defaults['fields']['author'] = 
		'<div class="comment-form-field comment-form-author">' .
		'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />'.
		'<label for="author">'.__('Name', 'pitch').'</label>'.
		'</div>';

	$defaults['fields']['email'] =
		'<div class="comment-form-field comment-form-email">' .
		'<input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />'.
		'<label for="email">'.__('Email', 'pitch').'</label>'.
		'</div>';

	$defaults['fields']['url'] =
		'<div class="comment-form-field comment-form-url">' .
		'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30"' . $aria_req . ' />'.
		'<label for="url">'.__('Website', 'pitch').'</label>'.
		'</div>';
	
	$defaults['comment_field'] = '<div class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="'.__('Comment	', 'pitch').'"></textarea></div>'; 
	$defaults['comment_notes_before'] = '';
	$defaults['comment_notes_after'] = '';
	
	return $defaults;
}
add_filter('comment_form_defaults', 'pitch_comments_comment_defaults', 8);

/**
 * Display a comment.
 * 
 * @param $comment
 * @param $args
 * @param $depth
 */
function pitch_comment_display_comment($comment, $args, $depth){
	// Set up the global comment
	$GLOBALS['comment'] = $comment;
	$GLOBALS['comment_args'] = $args;
	$GLOBALS['comment_depth'] = $depth;
	get_template_part('comment');
}