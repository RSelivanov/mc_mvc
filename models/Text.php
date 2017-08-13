<?php


class Text {
    
    public static function bbcode($data){

	$search = array(
		'/\[b\](.*?)\[\/b\]/is',
		'/\[i\](.*?)\[\/i\]/is',
		'/\[u\](.*?)\[\/u\]/is',
		'/\[li\](.*?)\[\/li\]/is',
		'/\[br\]/is'
		);
	$replace = array(
		'<strong>$1</strong>',
		'<em>$1</em>',
		'<u>$1</u>',
		'<li>$1</li>',
		'<br />'
		);

	/* Check for multiple [br] tags */
	$data = preg_replace('/(\[br\])+/', '[br]', trim($data));

	/* Replace the codes */
	$data = preg_replace($search, $replace, $data);

	return $data;
    }
    
    
}
