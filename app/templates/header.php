<?php
$adm = "";
if(isset($_SESSION['usr']))
	$adm = "logged in as " . $_SESSION['usr'] . " <a href=index.php?page=login&action=logout>logout</a><br /><br />";
	
	
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>default</title>
	<meta name="author" content="Mattias Schertell">

</head>
<body>
 '. $adm .'
<p>We now haz a menu!!!<br />Menu: <a href=index.php>Home</a> | <a href=index.php?page=category>Catsegories</a> | 
<a href=index.php?page=product>Products</a> | <a href=index.php?page=login>ninjas</a></p>

';
?>