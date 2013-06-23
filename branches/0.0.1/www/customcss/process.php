<?php
include('../config.php');
include(mnminclude.'ban.php');

header('Content-Type: application/json; charset=UTF-8');
array_push($globals['cache-control'], 'no-cache');
http_cache();

if(check_ban_proxy()) {
	error(_('IP no permitida'));
}


// only for logged users
if ($current_user->user_id < 0) {
	echo "Non logged user";
	die;
}

$css_name = clean_text($_POST['css_name'])
$css_text = clean_text($_POST['css_text'])

if (!strlen($css_text))
    error("O texto non debe estar baleiro");

if (!strlen($css_name))
    error("O nome non debe estar baleiro");

$s="SELECT css_name FROM customcss";
$results = $db->get_results($s);
if ($results) {
	// check for duplicated names
}

$s="INSERT INTO customcss (css_name, css_text, css_user_id, css_status) ".
"VALUES ('".$css_name."','".$css_text."',.($current_user->user_id).",".
"'pending'";

$db->query($s);

function error($mess) {
	$dict['error'] = $mess;
	echo json_encode($dict);
	die;
}
