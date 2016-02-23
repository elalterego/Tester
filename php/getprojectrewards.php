<?php
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn, "test");
mysqli_query($conn, "SET NAMES 'utf8'");

$query = "SELECT id, price, description, image
			FROM rewards
			WHERE project = '1'";
$query_result = mysqli_query($conn, $query);
$output = array();
$i=0;
while($row=mysqli_fetch_array($query_result,MYSQLI_ASSOC))
 {
 $output[$i]["id"]=$row["id"];
 $output[$i]["price"]=$row["price"];
 $output[$i]["description"]=$row["description"];
 $output[$i]["image"]=$row["image"];
 $i++;
 }

print json_encode($output);
?>