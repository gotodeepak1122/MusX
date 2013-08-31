<?php

//Database Configuration Script
/*
	This code helps you setup the database needed to run tests for the MusX search.
	You should be redirected to this page only if you have not yet set up the database.
	If you are still redirected to this page then Apocalypse is on! Go find the table to hide under!
	Kidding. Just check the scripts again and find where you went wrong. :)
	Feel free to make changes to this code and suit yourself! :)
*/

if(!isset($_GET['host'],$_GET['username'],$_GET['password'])){
		echo("<center><h1>Welcome to Configuration Wizard</h1><p>Please type MySQL host (Mostly localhost), host username and host password as GET parameters in the address bar to get started!</p></center>");
		echo("<center><p>Example:gettingstarted.php?host=<I>your_hostname</I>&username=<I>your_username</I>&password=<I>your_password</I></p></center>");
		exit();
	}
$host = $_GET['host'];
$username = $_GET['username'];
$password = $_GET['password'];
$db = "musx";

$open = mysql_connect($host,$username,$password)or die("<p>Cannot connect to server! Check your parameters.</p>");
if(mysql_select_db($db,$open)){
	die("<p> Database is already created! Configuration ended prematurely!Exiting...</p>");
}
else
{
	
	$newDB = mysql_query("CREATE DATABASE $db");
	if($newDB){
		echo("<p>Database Created.</p>");
	}else{
		echo("<p>Error creating database! Configuration Failed! Exiting...</p>");
	}
	$select_db = mysql_select_db($db);
	
	$query = "CREATE TABLE genres(id INT(2) AUTO_INCREMENT, genre VARCHAR(64), PRIMARY KEY(id))";
	if(mysql_query($query)){
		echo("<p>Table created. <br/>Configuration complete. Please enter test values into the tables to start running tests. Thankyou.</p>");
	}
}
?>
