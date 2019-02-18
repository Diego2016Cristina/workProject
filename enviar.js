
$(document).ready(function(){
  $('.form_pro').submit(function(e) {
    e.preventDefault();
    var data = $(this).serializeArray();
    data.push({name: 'tag', value: 'Cadastrar Professor'});
    $.ajax({
      url: 'connectionFactory/processa.php',
      type: 'post',
      dataType: 'json',
      data: data,
      beforeSend: function() {
        $('.iconeRefresh').css('display', 'inline');
      }
    })
    .done(function() {
      $('.messag').html("Cadastrado com sucesso!");
      document.getElementById('bloc_message_pro').style.display = 'inline-block';
    })
    .fail(function() {
      $('.messag').html("Erro ao tentar cadastrar! Pode ser que o professor(a), já esteja em nosso banco de dados. Por favor entrar com outro nome.");
      document.getElementById('bloc_message_pro').style.display = 'inline-block';
    })
    .always(function() {
      setTimeout(function(){
        $('.iconeRefresh').hide();
        document.getElementById('nome').value = '';
        document.getElementById('dt_nasc').value = null;
      }, 1000);
    });
  });
});

  // ajax para o cadastro do curso
  $(document).ready(function(){
  $('.form_cur').submit(function(e) {
    e.preventDefault();

    var data = $(this).serializeArray();
    data.push({name: 'tag', value: 'Cadastrar Curso'});
    $.ajax({

      url: 'connectionFactory/processa.php',
      // url: 'connectionFactory/processa_curso.php',
      type: 'post',
      dataType: 'json',
      data: data,
      beforeSend: function() {
        $('.iconeRefresh').css('display', 'inline');
      }
    })
    .done(function() {
      $('.messag_curso').html("Cadastrado com sucesso!");
      document.getElementById('bloc_message_cur').style.display = 'inline-block';
    })
    .fail(function() {
      $('.messag_curso').html("Erro ao tentar cadastrar! Pode ser que já tenha um curso cadastrado com esse nome em nossa base de dados. Por favor! Cadastrar outro curso.");
      document.getElementById('bloc_message_cur').style.display = 'inline-block';
    })
    .always(function() {
      setTimeout(function(){
        $('.iconeRefresh').hide();
      }, 1000);
    });
  });
});


// ajax para o cadastro do aluno
  $(document).ready(function(){
  $('.form_alu').submit(function(e) {
    e.preventDefault();

    var data = $(this).serializeArray();
    data.push({name: 'tag', value: 'Cadastrar Aluno'});
    $.ajax({
      url: 'connectionFactory/processa.php',
      // url: 'connectionFactory/processa_aluno.php',
      type: 'post',
      dataType: 'json',
      data: data,
      beforeSend: function() {
        $('.iconeRefresh').css('display', 'inline');
      }
    })
    .done(function() {
      $('.messag_aluno').html("Cadastrado com sucesso!");
      document.getElementById('bloc_message_alu').style.display = 'inline-block';
    })
    .fail(function() {
      $('.messag_aluno').html("Erro ao tentar cadastrar! Pode ser que o nº da matrícula já esteja sendo usada. Ou que o aluno já esteja cadastrado em nosso banco de dados. Por favor! Entrar com outro nome.");
      document.getElementById('bloc_message_alu').style.display = 'inline-block';
    })
    .always(function() {
      setTimeout(function(){
        $('.iconeRefresh').hide();
      }, 1000);
    });
  });
});