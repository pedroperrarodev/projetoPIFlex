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
					nome_completo: $("#nome_completo").val(),
					cpf: $("#cpf").val(),
                    rua: $("#rua").val(),
                    bairro: $("#bairro").val(),
                    cidade: $("#cidade").val(),
                    numero: $("#numero").val(),
                    num_telefone: $("#num_telefone").val(),
                    email: $("#email").val(),
                    perfil: $("#perfil").val(),
    			};
				$.ajax({
					type: "POST",
					url: "../controller/admin_controller.php?acao=atualizar_perfil",
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
                      <p>Altere os dados abaixo para atualizar os dados do perfil</p>
                      <hr>
                      <input type="hidden" name="id" id="id" value="<?php echo $dados[0]["id"]?>">

                      <label for="nome_completo"><b>Nome Completo</b></label>
                      <input type="text" placeholder="Insira o Nome Completo" name="nome_completo" id="nome_completo" value="<?php echo $dados[0]["nome_completo"]?>">
                      
                      <label for="cpf"><b>CPF</b></label>
                      <input type="text" placeholder="Insira seu CPF" name="cpf" id="cpf" value="<?php echo $dados[0]["cpf"]?>">
                      
                      <label for="rua"><b>Rua</b></label>
                      <input type="text" placeholder="Insira a Rua" name="rua" id="rua" value="<?php echo $dados[0]["rua"]?>">

                      <label for="bairro"><b>Bairro</b></label>
                      <input type="text" placeholder="Insira o Bairro" name="bairro" id="bairro" value="<?php echo $dados[0]["bairro"]?>">

                      <label for="cidade"><b>Cidade</b></label>
                      <input type="text" placeholder="Insira a cidade " name="cidade" id="cidade" value="<?php echo $dados[0]["cidade"]?>">

                      <label for="numero"><b>Número</b></label>
                      <input type="text" placeholder="Insira o Número da Casa" name="numero" id="numero" value="<?php echo $dados[0]["numero"]?>">
                      
                      <label for="num_telefone"><b>Número de Telefone</b></label>
                      <input type="text" placeholder="Insira o Número de Telefone" name="num_telefone" id="num_telefone" value="<?php echo $dados[0]["num_telefone"]?>">

                      <label for="email"><b>Email</b></label>
                      <input type="text" placeholder="Insira o Email" name="email" id="email" value="<?php echo $dados[0]["email"]?>">

                      <input type="hidden" name="perfil" id="perfil" value="<?php echo $dados[0]["perfil"]?>">

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