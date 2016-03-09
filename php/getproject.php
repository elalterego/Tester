<?php
require_once('Db.php');
// Our database object
$db = new Db();

$id = trim($_GET["id"]);

$query = "SELECT p.id AS id, p.title AS title, p.summary AS summary, 
					p.image AS image, DATEDIFF(p.endDate, NOW()) AS daysLeft, p.goal AS goal, 
					COUNT(DISTINCT d.user) AS donors, IFNULL(SUM(d.amount),0) AS donated
			FROM projects p
			INNER JOIN donations d ON p.id = d.project
			WHERE p.id = '".$id."'";
			
$output = array();
$output = $db -> select($query);

//print json_encode($output, JSON_HEX_QUOT | JSON_HEX_TAG);
print json_encode($output);
?>