<?php
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn, "test");
mysqli_query($conn, "SET NAMES 'utf8'");

$id = trim($_GET["id"]);

$query = "SELECT p.id AS id, p.title AS title, p.summary AS summary, 
					p.image AS image, DATEDIFF(p.endDate, NOW()) AS daysLeft, p.goal AS goal, 
					COUNT(DISTINCT d.user) AS donors, IFNULL(SUM(d.amount),0) AS donated
			FROM projects p
			INNER JOIN donations d ON p.id = d.project
			WHERE p.id = '".$id."'";
$query_result = mysqli_query($conn, $query);
$output = array();
$i=0;
while($row=mysqli_fetch_array($query_result,MYSQLI_ASSOC))
 {
 	$output[$i]["id"]=$row["id"];
 	$output[$i]["title"]=$row["title"];
 	$output[$i]["summary"]=$row["summary"];
 	$output[$i]["image"]=$row["image"];
 	$output[$i]["daysLeft"]=$row["daysLeft"];
 	$output[$i]["goal"]=$row["goal"];
 	$output[$i]["donors"]=$row["donors"];
 	$output[$i]["donated"]=$row["donated"];
 	$i++;
 }

//print json_encode($output, JSON_HEX_QUOT | JSON_HEX_TAG);
print json_encode($output);
?>