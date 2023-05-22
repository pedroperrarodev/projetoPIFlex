<?php
    //require_once("../../infra/valida_sessao.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/cadastro_nova_vacina.css">
    <link rel="stylesheet" type="text/css" href="../css/tela_profile.css">
    <link rel="stylesheet" type="text/css" href="../css/corpo.css">
    <script src="../static/js/jquery-3.6.4.min.js"></script>
	<script type="text/javascript">
			function processa_atualizar_vacina(){
				var formDados = {
					id_registro_vacina: $("#id_registro_vacina").val(),
					nome_vacina: $("#nome_vacina").val(),
					fabricante: $("#fabricante").val(),
                    razao_social: $("#razao_social").val(),
                    data: $("#data").val(),
    			};
				$.ajax({
					type: "POST",
					url: "../controller/registro_controller.php?acao=atualizar_vacina",
					data: formDados,
					dataType: "json",
					}).done(function (dataRetorno) {
						if(dataRetorno.erro == 0){
							alert(dataRetorno.msg)
							window.location.href = dataRetorno.url;
						}
						else{
							alert(dataRetorno.msg)
						}
				});
			}
	</script>
    <title>Tela atualizar perfil</title>
</head>
<body>
<header>
        <div id="logo">
            <h1>Logo</h1>
        </div>
    </header>
<div id="main">
        <div class="containerprofile1">
        <div class="bodycadastro">
        <div class="maincadastro">
            <div class="telacadastro">
                <a><img src=""></img></a>
                <form action="/action_page.php" method="post">
                    <div class="formulariocadastro">
                      <h1>Atualize o perfil aqui</h1>
                      <p>Altere os dados abaixo para atualizar o seu perfil</p>
                      <hr>
                      <input type="hidden" name="id_registro_vacina" id="id_registro_vacina" value="<?php echo $dados[0]["id_registro_vacina"]?>">

                      <input type="text" disabled placeholder="Insira o Nome Completo" name="nome_vacina" id="nome_vacina" 
                      value="<?php echo $dados[0]["nome_vacina"]?>">

                      <input type="text" disabled placeholder="Insira o Nome Completo" name="fabricante" id="fabricante" 
                      value="<?php echo $dados[0]["fabricante"]?>">

                      <input type="text" disabled placeholder="Insira o Nome Completo" name="razao_social" id="razao_social" 
                      value="<?php echo $dados[0]["razao_social"]?>">

                      <input type="date" name="data" id="data" 
                      value="<?php echo $dados[0]["data"]?>">

                      <button type="button" class="botao_registrar" onclick="processa_atualizar_vacina()">Atualizar</button>
                    </div>
                  
                  </form>
            </div>
        </div>
    </div>
    </div>
</div>
    
</body>
</html>