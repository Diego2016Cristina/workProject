<?php
	//Servidor Web dias e advogados
    
	 // $host ='mysql.hostinger.com.br';
	 // $user ='u487995588_adm';
	 // $password = '32327790clara';
	 // $bd = 'u487995588_crea';

	 // Servidor CREA-AM
	 // $host ='localhost';
	 // $user ='creaam_seminario';
	 // $password = 'Kr3@174dti!';
	 // $bd = 'creaam_seminariomineracao';

	 // s3nh@Cr34

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