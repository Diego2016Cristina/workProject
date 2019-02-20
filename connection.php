<?php

	$host = 'sql200.epizy.com';
	$user = 'epiz_23465036';
	$password = '3ygmIlFBbfErLT';
	$bd = 'epiz_23465036_flexpeaker';

	//Local
 // 	$host ='localhost';
	// $user ='root';
	// $password = '';
	// $bd = 'flexpeaker';

	//Criar Conexao
	@$mysqli = new mysqli($host, $user, $password, $bd);
    
 	if(mysqli_connect_errno()) {
 		printf("Falha na conexao. %s\n", mysqli_connect_error());

 		exit();
 	}
?>
