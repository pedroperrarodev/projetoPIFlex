<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/login.css">
  <script src="../static/js/jquery-3.6.4.min.js"></script>
	<script type="text/javascript">
      $( document ).ready(function() {
			  });

			  function processa_login(){
				  var formDados = {
     			 	    cpf: $("#cpf").val(),
      			 	  senha: $("#senha").val(),
    			  };
				
				    $.ajax({
					      type: "POST",
					      url: "../controller/usuario_controller.php?acao=logar",
					      data: formDados,
					      dataType: "json",
					        }).done(function (dataRetorno) {
						      if(dataRetorno.erro == 0){
						    	window.location.href = dataRetorno.url;
						      }
						      else{
							    alert(dataRetorno.msg)
					    	  }
					    });
				} 
    </script>
</head>

<body>
  <form>
    <div class="container">
      <div class="img_container">
        <img src="../img/vaccine.png">
      </div>
      <div class="div_cpf">
        
        <!-- <label for="cpf">CPF</label> -->
        <input type="text" placeholder="Informe seu CPF" name="cpf" id="cpf">
      </div>
      <div class="div_senha">
        <label for="senha">SENHA</label>
        <input type="password" placeholder="Informe sua Senha" name="senha" id="senha">
      </div>
      <div class="div_botao_login">
      <input type="button" value="Logar" id="botao_login" onclick="processa_login()"/>
      </div>
      <div class="tem_cadastro">
        <label for="ja_tem_cadastro">Ja possui cadastro? Caso não, <a
            href="tela_cadastro_usuario.php">Cadastre-se aqui</a></label>
      </div>

    </div>

  </form>

</body>

</html>