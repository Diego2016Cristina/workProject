<?php
	include_once('connection.php');

	header('Content-Type: text/html; charset=iso-8859-1');

	$tag = $_POST['tag'];

	if(isset($tag) && $tag !== '') {

		// cadastra um professor

		if($tag == 'Cadastrar Professor') {
			
			$id = 0;
			$nome = utf8_decode($_POST['nome']);
			$data = $_POST['dt_nasc'];
			$dt_criacao = date('Y-m-d');

			$sq = "SELECT * FROM professor WHERE pro_nome = '$nome' LIMIT 1";

			$res = mysqli_query($mysqli, $sq);

			if(mysqli_num_rows($res) > 0) {
				echo false;
				exit();
			}else 
				if (mysqli_num_rows($res) == 0) {
					$sql = "INSERT INTO professor (pro_nome, pro_dt_nasc, pro_dt_criacao) VALUES ('$nome', '$data', '$dt_criacao')";

					if(mysqli_query($mysqli, $sql)) {
						echo true;
						exit();
					}else {
						echo false;
						exit();
					}
				}
		} else 

			// cadatra um curso

			if($tag == 'Cadastrar Curso') {
				$id = 0;
				$nome = strtoupper($_POST['nome_curso']);
				$dt_criacao = date('Y-m-d');
				$id_pro = $_POST['f_developer'];

				$sq = "SELECT * FROM curso c INNER JOIN professor p WHERE p.pro_id = '$id_pro' AND c.cur_nome ='$nome'";

			$res = mysqli_query($mysqli, $sq);

			if(mysqli_num_rows($res) > 0) {
				echo false;
				exit();
			}else 
				if (mysqli_num_rows($res) == 0) {
					$sql = "INSERT INTO curso (cur_nome, cur_dt_criacao, pro_id) VALUES ('$nome', '$dt_criacao', '$id_pro')";

					if(mysqli_query($mysqli, $sql)) {
						echo true;
						exit();
					}else {
						echo false;
						exit();
					}
				}

			} else

				// cadatra um aluno

				if($tag == 'Cadastrar Aluno') {

					$matricula       = $_POST['matricula'];
					$nome            = strtoupper($_POST['nome_aluno']);
					$dt_nasc         = $_POST['dt_nasc'];
					$cep             = $_POST['cep'];
					$logradouro      = strtolower($_POST['logradouro']);
					$bairro          = strtolower($_POST['bairro']);
					$numero          = $_POST['numero'];
					$cidade          = strtolower($_POST['cidade']);
					$estado          = strtolower($_POST['estado']);
					$alu_dt_criacao  = date('Y-m-d');
					$cur_id          = $_POST['f_developer'];

					$sq = "SELECT * FROM aluno WHERE alu_matricula = '$matricula' OR alu_nome = '$nome' LIMIT 1";

					$res = mysqli_query($mysqli, $sq);

					if(mysqli_num_rows($res) > 0) {
						echo false;
						exit();
					}else 
						if (mysqli_num_rows($res) == 0) {

						$sql = "INSERT INTO aluno (alu_matricula, alu_nome, aludt_nasc, alu_rua, alu_numero, alu_bairro, alu_cidade, alu_estado, alu_dt_criacao, alu_cep) VALUES ('$matricula', '$nome', '$dt_nasc', '$logradouro', '$numero', '$bairro', '$cidade', '$estado',  '$alu_dt_criacao', '$cep')";

						$ql = "INSERT INTO aluno_curso (cur_id, alu_matricula) VALUES ('$cur_id', '$matricula')";

						if(mysqli_query($mysqli, $sql)) 
							if(mysqli_query($mysqli, $ql)) {

							echo true;
							exit();

						}else {

							echo false;
							exit();

						}
					}
				}
	}
?>