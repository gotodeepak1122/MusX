<!DOCTYPE html>
<html>
	<head>
		<script type='text/javascript'>
		
			function clearField(elem){
				document.getElementById(elem.id).style.color='gray';
				document.getElementById(elem.id).value='';
				document.getElementById('body').style.backgroundImage="url('img/bg.png')";
			}
			function setValue(elem){
				document.getElementById(elem.id).style.color='rgb(190,190,190)';
				document.getElementById(elem.id).value="what's your genre?";
				document.getElementById('body').style.backgroundImage="url('img/bgt.png')";
			}
			function clearIt(elem,elem2){
				document.getElementById(elem).innerHTML='';
				
			}
			
			function sendData(){
				if(window.XMLHttpRequest){
					connect = new XMLHttpRequest();
				}
				
				connect.open("GET","search.php/search/"+document.getElementById('searchip').value,true);
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
	
		<title>Musx Search Component</title>
		<link rel='stylesheet'  href='design.css' media='screen' />
	</head>
	
	<body id='body'>
		<div class='header'>
			<h3>Musx</h3> <b> | </b>
			<h5>Search</h5>
		</div>
		
		<form name='search_form'>
			
			<input type='text'  value="what's your genre?" onfocus='clearField(this)' onblur='setValue(this)' id='searchip' onkeyup='sendData()' /> 
			<input type='button' id='clear' value='<' onclick="clearIt('container','searchip')" />
			<hr id='divide'>
			<div id='container'>
			
		</div>
		</form>
		<div id='notice'><text>2013. Musx Inc. All rights reserved.</div>
	</body>
	