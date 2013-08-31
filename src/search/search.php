<?php
$host = '';     //Your host name goes here
$username = ''; //Your db username goes here
$password = ''; //Your db password goes here
$db = 'musx'; //Please do not change this variable
$dbServer = mysql_pconnect($host,$username,$password);
if($dbServer){
		if(!mysql_select_db($db,$dbServer)){
			header("location:gettingstarted.php");
		}
		
}

if(!isset($_GET['q'])){
	echo("No Query!");
	exit();
}
else
{
	$input = $_GET['q'];
	if(empty($input)){
		echo(0);
		exit();
	}

	
	
		$data = array();
		$query = "SELECT genre FROM genres where genre LIKE '%$input%'";
		$execute = mysql_query($query);
		while($result = mysql_fetch_assoc($execute)){
			//echo($result['genre'].",");
			array_push($data,$result['genre']);
		}
		
		echo(json_encode($data));
}	
	


?>