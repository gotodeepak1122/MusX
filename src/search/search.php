<?php
$host = 'localhost';     //Your host name goes here
$username = 'root'; //Your db username goes here
$password = '85878500'; //Your db password goes here
$db = 'musx'; //Please do not change this variable
$dbServer = mysql_pconnect($host,$username,$password);
if($dbServer){
		if(!mysql_select_db($db,$dbServer)){
			header("location:gettingstarted.php");
		}
		
}
$addr = $_SERVER['REQUEST_URI'];
$first = array();
$first = explode("search.php",$addr);
$request_string = $first[1];
$request_var = array();
$request_var = explode("/",$request_string);

$method = $request_var[1];
$query = $request_var[2];

if($method != "search"){
	echo("[\"unrecognized method\"]");
	exit();
}

else
{
	$input = mysql_real_escape_string($query);
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
		if(empty($data)){ $data = array("No results"); }
		echo(json_encode($data));
}	
	


?>