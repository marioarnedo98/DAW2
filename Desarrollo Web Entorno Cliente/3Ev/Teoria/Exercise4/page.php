<?php 
if (isset($_GET['page'])) {
	$page=trim($_GET['page']);
	$allowed=['home','downloads','tutorials'];
	if (in_array($page, $allowed)) {
		echo file_get_contents("pages/{$page}.html");
	}
}