<!DOCTYPE html>
<html>
	<head>
		<script type='text/javascript'>
		
			function clearIt(elem,elem2){
				document.getElementById(elem).innerHTML=' ';
				document.getElementById(elem2).value ='';
			}
			
			function sendData(){
				if(window.XMLHttpRequest){
					connect = new XMLHttpRequest();
				}
				
				connect.open("GET","search.php?q="+document.getElementById('searchip').value,true);
				connect.onreadystatechange = function (){
												if(connect.readyState == 4 && connect.status == 200){
													document.getElementById('container').innerHTML='';
													
													newobj = JSON.parse(connect.responseText);
													for(i=0;i<newobj.length;i++){
														document.getElementById('container').innerHTML+="<div class='result_div'>"+newobj[i]+"</div>";
													}
													
												}
											}
				connect.send(null);
				
			}
		</script>
		
		<style>
			.result_div {
				background-color:rgb(245,245,245);
				display: inline-block;
				padding:3px;
				color:gray;
				margin-right:5px;
				border:solid thin rgb(205,205,205);
			}
		</style>
		<title>Musx Search Component</title>
	</head>
	
	<body>
		<h1>Musx</h1>
		<h3>Search</h3>
		
		<form name='search_form'>
			<label for='search_field'>Search:</label>
			<input type='text' id='searchip' onkeyup='sendData()'/>
			<input type='button' id='clear' value='X' onclick="clearIt('container','searchip')" />
		</form>
		<div id='container'>
			
		</div>
	</body>
	