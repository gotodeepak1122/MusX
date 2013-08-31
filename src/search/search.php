<?php
$dbServer = mysql_pconnect('localhost','root','85878500');
if($dbServer){
		mysql_select_db('musx',$dbServer);
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