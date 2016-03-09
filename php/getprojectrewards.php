<?php
require_once('Db.php');
// Our database object
$db = new Db();

$query = "SELECT id, price, description, image
			FROM rewards
			WHERE project = '1'";
			
$output = array();
$output = $db -> select($query);

print json_encode($output);
?>