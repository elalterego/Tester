<?php
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn, "test");
mysqli_query($conn, "SET NAMES 'utf8'");

$query = "SELECT id, content
			FROM blogs
			WHERE project = '1'";
$query_result = mysqli_query($conn, $query);
$output = array();
$i=0;
while($row=mysqli_fetch_array($query_result,MYSQLI_ASSOC))
 {
 $output[$i]["id"]=$row["id"];
 $output[$i]["content"]=$row["content"];
 $i++;
 }

print json_encode($output);
?>