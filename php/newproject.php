<?php
require_once('Db.php');
// Our database object
$db = new Db();

// Quote and escape form submitted values
//$id ="5";
$owner = "'1'";
$title = $db -> quote($_POST['title']);
$summary = $db -> quote($_POST['summary']);
$category = $db -> quote($_POST['category']);
$subcategory = $db -> quote($_POST['subcategory']);
$city = $db -> quote($_POST['city']);
$endDate = $db -> quote($_POST['endDate']);
$goal = $db -> quote($_POST['goal']);
$image = "'img/1000x500.jpg'";

// Insert the values into the database
$result = $db -> query("INSERT INTO projects (owner, title,summary, category, subcategory, city, endDate, goal, image) VALUES (" . $owner . "," . $title . "," . $summary . "," . $category . "," . $subcategory . "," . $city . "," . $endDate . "," . $goal . ",".$image.")");

echo $db -> error();
?>