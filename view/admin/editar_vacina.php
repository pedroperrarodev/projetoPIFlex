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
			function processa_atualizar(){
				var formDados = {
					id: $("#id").val(),
					nome_vacina: $("#nome_vacina").val(),
					fabricante: $("#fabricante").val(),
                    doenca_alvo: $("#doenca_alvo").val(),
    			};
				$.ajax({
					type: "POST",
					url: "../controller/admin_controller.php?acao=atualizar_vacina",
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
    <title>Tela atualizar vacina</title>
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
                      <h1>Atualize a vacina aqui</h1>
                      <p>Altere os dados abaixo para atualizar os dados da vacina</p>
                      <hr>
                      <input type="hidden" placeholder="Insira o Nome da Vacina" name="id" id="id" value="<?php echo $dados[0]["id"]?>">

                      <label for="email"><b>Nome da vacina</b></label>
                      <input type="text" placeholder="Insira o Nome da Vacina" name="nome_vacina" id="nome_vacina" value="<?php echo $dados[0]["nome_vacina"]?>">

                      <label for="email"><b>Fabricante</b></label>
                      <input type="text" placeholder="Insira o Fabricante" name="fabricante" id="fabricante" value="<?php echo $dados[0]["fabricante"]?>">

                      <label for="email"><b>Doença alvo</b></label>
                      <input type="text" placeholder="Insira a Doença Alvo" name="doenca_alvo" id="doenca_alvo" value="<?php echo $dados[0]["doenca_alvo"]?>">

                      <button type="button" class="botao_registrar" onclick="processa_atualizar()">Atualizar</button>
                    </div>
                  
                  </form>
            </div>
        </div>
    </div>
    </div>
</div>
    
</body>
</html>