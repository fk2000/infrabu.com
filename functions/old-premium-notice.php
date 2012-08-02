<?php

/**
 * Set up the default admin bars.
 *
 * @param $bar
 * @return object
 */
function pitch_adminbar_premium_update_notice($bar){
	$bar = (object) array('id' => 'premium-update', 'message' => array('tpl/message', 'update'));
	return $bar;
}
// Apply this filter with a lower priority so its over written by other admin bars
add_filter('so_adminbar', 'pitch_adminbar_premium_update_notice', 5);