<?php
	include_once('connectionFactory/connection.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>

	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Formulário de cadastro</title>
	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="css/maxcdn.bootstrapcdn.com.css"> -->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/ajax.googleapis.com.js"></script>
	<script type="text/javascript" src="js/validation_field.js"></script>
  <script type="text/javascript" src="js/enviar.js"></script>
  <script type="text/javascript" src="js/buscaCEP.js"></script>

</head>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- script CEP -->
<script type="text/javascript">

        // <script type="text/javascript">
        //   $("input[name='nome']").on('blur', function(){
        //     var nomeUsuario = $(this).val();
        //     $.get('include/professor.php',function(data){
        //       $('#resultado').html(data);
        //     });
        //   });

</script>

 </script>

 <style type="text/css">
 	input {
 		text-transform: uppercase;
 	}
  #resp_cur {
    display: none;
  }
  #no {
    position: relative; top: 10px; display: inline-block;
  }
 </style>
<body>
<div class="container-fluid">
<div class="row">
<div class="col-sm-12">
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<h3>FORMULÁRIO DE CADASTRO</h3>
			<div role="tabpanel">

				<ul class="nav nav-tabs" role="tablist">

					<li role="presentation" class="active">
						<a href="#seccion1" aria-controls="seccion1" data-toggle="tab" role="tab">CAD. PROFESSOR</a></li>

					<li role="presentation">
						<a href="#seccion2" aria-controls="seccion2" data-toggle="tab" role="tab">CAD. CURSO</a></li>

					<li role="presentation">
						<a href="#seccion3" aria-controls="seccion3" data-toggle="tab" role="tab">CAD. ALUNO</a></li>

          <li role="presentation">
            <a href="#seccion4" aria-controls="seccion4" data-toggle="tab" role="tab">FORMULÁRIO</a></li>

				</ul>

				<div class="tab-content">

					<div role="tabpanel" class="tab-pane active" id="seccion1">

						<form class="form_pro">

				            <h3>Preencha o formulário</h3>

				            <div class="form-group">
				              <label for="nome">Nome completo</label>
				              <input type="text" class="form-control" name="nome" id="nome" placeholder="nome" required"/>

				            </div>

				            <div class="form-group">
				              <label for="dt_nasc">Data de Nascimento</label>
				              <input type="date" class="form-control" name="dt_nasc" id="dt_nasc" placeholder="data de nascimento" required>
				            </div>

				            <input type="submit" name="" class="btn btn-primary" value="Cadastrar Professor">
				            <i class="fa fa-reflesh fa-spin iconeRefresh"><img src="img/refresh.gif" width="5%"></i>

				        </form>
                <div class="row" id="bloc_message_pro">
				          <div class="col-sm-12">
                    <span class="messag"></span>
                  </div>
                </div>
					</div>

				<div role="tabpanel" class="tab-pane" id="seccion2">

					<form class="form_cur">

				            <h3>Preencha o formulário</h3>

				            <div class="form-group">
				              <label for="nome_curso">Curso</label>
				              <input type="text" class="form-control" name="nome_curso" id="nome_curso" placeholder="curso" required>
				            </div>

                    <div class="row">
                      
                      <div class="col-sm-6">

                        <div id="men" class="text-info">
                          <label>Atenção! Se não encontrar o nome do professor na lista, clique em atualizar.</label>
                        </div>

                        <div class="form-group">

                            <select name="f_developer" class="form-control" id="cur_op" onblur="mSeleNull();" onclick="mensagem();">

                              <OPTION value="selecione">SELECIONE UM PROFESSOR(A)</OPTION> 

                                <?php
                                  $sql = "SELECT * FROM professor ORDER BY pro_nome ASC";
                                  $res = mysqli_query($mysqli, $sql);
                                    
                                  while($row = mysqli_fetch_assoc($res)){

                                    echo '<option value="'.$row['pro_id'].'">'.strtoupper($row['pro_nome']).'</option>';

                                  }

                                ?>
                            </select>
                    
                        </div>

                      </div>

                      <script language="javascript"> // REFERENTE AO BOTAO PARA ATUALIZAR A PAGINA
                        var timer;

                        function comecarReload() {

                          var n = document.getElementById('sel_curso').value;

                          if(n == 'selec') {

                            timer = window.setTimeout("location.reload()", 100);

                          }

                        }
                      </script>

                      <div class="col-sm-6">
                        
                        <button class="btn btn-dark" onclick="comecarReload();">
                          <img src='img/oie_transparent.png' width='20px' height='20px' alt="atulizar">
                        </button>

                      </div>

                    </div>

                    <!-- mensagem de callbeck -->
                    <div class="alert alert-success" role="alert" id="resp_cur"></div><br/>

				            <input type="submit" name="" class="btn btn-primary" value="Cadastrar Curso" id="btn-cur" onclick="mSeleNull();">
				            <i class="fa fa-reflesh fa-spin iconeRefresh"><img src="img/refresh.gif" width="5%"></i>

				    </form>

				        <div class="row" id="bloc_message_cur">
                  <div class="col-sm-12">
                    <span class="messag_curso"></span>
                  </div>
                </div>

				</div>

				<div role="tabpanel" class="tab-pane" id="seccion3">

					<h3>Preencha o formulário</h3>

					<form class="form_alu">

                <div class="form-group">
                      <label for="matricula">Numero da Matricula</label>
                      <input type="number" maxlength="6" minlength="6" class="form-control" name="matricula" id="matricula" placeholder="matrícula com 6 digitos numericos" required">
                </div>

						    <div class="form-group">
				              <label for="nome_aluno">Nome completo</label>
				              <input type="text" class="form-control" name="nome_aluno" id="nome_aluno" placeholder="aluno" required>
				        </div>

				        <div class="form-group">
			              <label for="dt_nasc">Data de Nascimento</label>
			              <input type="date" class="form-control" name="dt_nasc" id="dt_nasc" placeholder="data de nascimento" required>
			            </div>

			            <div class="form-group">
			            	<label class="cep">CEP</label>
			            	<input type="text" name="cep" id="cep" class="form-control" placeholder="cep" maxlength="9" onkeydown="javascript: fMasc( this, mCEP);" alt="Endereço" required>
			            </div>

			            <div class="form-group">
			            	<label class="logradouro">Logradouro</label>
			            	<input type="text" name="logradouro" id="logradouro" class="form-control" placeholder="logradouro" required>
			            </div>

			            <div class="form-group">
			            	<label class="bairro">Bairro</label>
			            	<input type="text" name="bairro" id="bairro" class="form-control" placeholder="bairro" required>
			            </div>

			            <div class="form-group">
			            	<label class="numero">Nº</label>
			            	<input type="text" name="numero" id="numero" class="form-control" placeholder="nº da residência" required>
			            </div>

			            <div class="form-group">
			            	<label class="cidade">Cidade</label>
			            	<input type="text" name="cidade" id="cidade" class="form-control" placeholder="cidade" required>
			            </div>

			            <div class="form-group">
			            	<label class="estado">Estado</label>
			            	<input type="text" name="estado" id="estado" class="form-control" placeholder="estado" required>
			            </div>

			            <div class="form-group">

                      <div class="row">
                        
                        <div class="col-sm-6">

                          <div id="men" class="text-info">
                          <label>Atenção! Se não encontrar o nome do professor na lista, clique em atualizar.</label>
                        </div>

                          <select id="sel_curso" name="f_developer" class="form-control">
                               <option value="selec">SELECIONE UM CURSO</option> 
                                <?php
                                  $sql = "SELECT * FROM curso";
                                  $res = mysqli_query($mysqli, $sql);

                                  while($row = mysqli_fetch_assoc($res)){
                                    echo '<option value="'.$row['cur_id'].'">'.$row['cur_nome'].'</option>';
                                  }
                                ?>
                          </select>
                          
                        </div>
                        <div class="col-sm-6">
                          
                          <button type="button" class="btn btn-dark" onclick="comecarReload();">
                            <img src='img/oie_transparent.png' width='20px' height='20px' alt="atulizar">
                          </button>

                        </div>

                      </div>

				            </div>

				        <input type="submit" name="enviar" class="btn btn-primary" value="Cadastrar Aluno">
				            <i class="fa fa-reflesh fa-spin iconeRefresh"><img src="img/refresh.gif" width="5%"></i>

					</form>

					<div class="row" id="bloc_message_alu">
            <div class="col-sm-12">
              <span class="messag_aluno"></span>
            </div>
          </div>

				</div>

        <div role="tabpanel" class="tab-pane" id="seccion4">

          <h3>Gerar Formulário</h3>

          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="input-group">
                  <input type="text" name="palavra" id="palavra" class="form-control" placeholder="Buscar por aluno...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" id="busca" type="button">Buscar</button>
                  </span>
                </div>
              </div>
            </div>
            <?php
              include_once('connectionFactory/btn-primary.php');
            ?>
          </div><br/>
          
          <div class="row">
            <!-- Recebe a mensagem de Carregamento -->
            <div class="col-sm-12">
              <div id="dados"></div>
            </div>

          </div>

        </div>

			</div>

		</div>
		<div class="col-sm-3"></div>
	</div>
</div>
</div>
</div>
</div>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <!-- <script type="text/javascript" src="js/jquery-latest.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script> -->
</body>
</html>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

<script type="text/javascript">

// ajax buscar por aluno
function buscar(palavra) {
  var page = "connectionFactory/buscar.php";
  $.ajax ({
    type: 'POST',
    dataType: 'html',
    url: page, beforeSend: function () {
      $("#dados").html("Carregando...");
    },
    data: {palavra: palavra},
    success: function (msg) {
      $("#dados").html(msg);
    }
  });
}
$('#busca').click(function() {
    buscar($("#palavra").val())
});
</script>