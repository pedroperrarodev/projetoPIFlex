<?php
    require_once("../../infra/valida_sessao.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/cadastro.css">
    <link rel="stylesheet" type="text/css" href="../../css/tela_profile.css">
    <link rel="stylesheet" type="text/css" href="../../css/corpo.css">
    <script src="../../static/js/jquery-3.6.4.min.js"></script> 
    <script type="text/javascript">
        $( document ).ready(function() {
			});

			function processa_cadastro(){
				var formDados = {
					nome_completo: $("#nome_completo").val(),
					cpf: $("#cpf").val(),
					rua: $("#rua").val(),
                    bairro: $("#bairro").val(),
                    cidade: $("#cidade").val(),
					numero: $("#numero").val(),
					num_telefone: $("#num_telefone").val(),
					email: $("#email").val(),
                    perfil: $("#perfil").val(),
                    senha: $("#senha").val(),
                    confirmar_senha: $("#confirmar_senha").val(),
    			};
                
				$.ajax({
					type: "POST",
					url: "../../controller/admin_controller.php?acao=cadastrar_admin",
					data: formDados,
					dataType: "json",
					}).done(function (dataRetorno) {
                        console.log("aqui");
						if(dataRetorno.erro == 0){
							alert(dataRetorno.msg);
							window.location.href = dataRetorno.url;
						}
						else{
							alert(dataRetorno.msg)
						}
						
				});
				
			}
		</script>
    
    <title>Tela de admin</title>
</head>
<body>
<header>
        <div id="logo">
            <h1>Logo</h1>
        </div>
        <div class="botaosair">
            <a href="../../controller/usuario_controller.php?acao=logout"><button class="noselect"><span class='text'>Sair</span><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/>
            </svg></span></button></a>

        </div>

    </header>
<div id="main">
        <div class="menu">
            <div class="sidebar">
                <div>
                    <a href="homepage_admin.php"><button><strong>Perfil</strong></button></a>
                </div>
                <div>
                    <a href="tela_cadastro_vacina.php"><button><strong>Cadastro de Vacinas</strong></button></a>
                </div>
                <div>
                    <a href="#"><button id="activemenu"><strong>Cadastro de adminstradores</strong></button></a>
                </div>
                <div>
                    <a href="tela_cadastro_posto_saude.php"><button><strong>Cadastro de Posto de Sáude</strong></button></a>
                </div>
            </div>
</div>
        <div class="containerprofile1">
        <div class="bodycadastro">
        <div class="maincadastro">
            <div class="telacadastro">
                <a><img src=""></img></a>
                <form action="../../controller/admin_controller.php?acao=cadastrar_admin" method="post">
                    <div class="formulariocadastro">
                      <h1>Cadastre um novo administrador</h1>
                      <p>Por favor preencha o formulário para cadastrar um novo administrador.</p>
                      <hr>

                      <label for="nome_completo"><b>Nome Completo</b></label>
                      <input type="text" placeholder="Insira o Nome Completo" name="nome_completo" id="nome_completo">
                      
                      <label for="cpf"><b>CPF</b></label>
                      <input type="text" placeholder="Insira seu CPF" name="cpf" id="cpf">
                      
                      <label for="rua"><b>Rua</b></label>
                      <input type="text" placeholder="Insira a Rua" name="rua" id="rua">

                      <label for="bairro"><b>Bairro</b></label>
                      <input type="text" placeholder="Insira o Bairro" name="bairro" id="bairro">

                      <label for="cidade"><b>Cidade</b></label>
                      <input type="text" placeholder="Insira a cidade " name="cidade" id="cidade">

                      <label for="numero"><b>Número</b></label>
                      <input type="text" placeholder="Insira o Número da Casa" name="numero" id="numero">
                      
                      <label for="num_telefone"><b>Número de Telefone</b></label>
                      <input type="text" placeholder="Insira o Número de Telefone" name="num_telefone" id="num_telefone">

                      <label for="email"><b>Email</b></label>
                      <input type="text" placeholder="Insira o Email" name="email" id="email">
                  
                      <label for="senha"><b>Senha</b></label>
                      <input type="password" placeholder="Digita sua Senha" name="senha" id="senha">
                  
                      <label for="confirmar_senha"><b>Confirmar Senha</b></label>
                      <input type="password" placeholder="Repita sua Senha" name="confirmar_senha" id="confirmar_senha">
                      <hr>
                      <button type="button" class="botao_registrar" onclick="processa_cadastro()">Cadastrar</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>
        </div>
        <div class="containerprofile2">
        </div>
</div>
</body>
</html>