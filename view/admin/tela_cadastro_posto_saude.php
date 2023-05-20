<?php
    require_once("../../infra/valida_sessao.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/cadastro_posto_saude.css">
    <link rel="stylesheet" type="text/css" href="../../css/tela_profile.css">
    <link rel="stylesheet" type="text/css" href="../../css/corpo.css">
    <script src="../../static/js/jquery-3.6.4.min.js"></script> 
    <script type="text/javascript">
        $( document ).ready(function() {
			});

			function processa_cadastro_posto(){
				var formDados = {
					razao_social: $("#razao_social").val(),
					cnpj: $("#cnpj").val(),
					rua: $("#rua").val(),
                    bairro: $("#bairro").val(),
                    cidade: $("#cidade").val(),
					numero: $("#numero").val(),
					num_telefone: $("#num_telefone").val(),
					email: $("#email").val(),
    			};
                
				$.ajax({
					type: "POST",
					url: "../../controller/admin_controller.php?acao=cadastrar_posto",
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
    <title>Tela de cadastro Posto de Saude</title>
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
                    <a href="../../controller/admin_controller.php?acao=listarVacina"><button><strong>Consulta vacinas cadastrados</strong></button></a>
                </div>
                <div>
                    <a href="tela_cadastro_admin.php"><button><strong>Cadastro de adminstradores</strong></button></a>
                </div>
                <div>
                    <a href="../../controller/admin_controller.php?acao=listarAdminstradores"><button><strong>Consulta adminstradores cadastrados</strong></button></a>
                </div>
                <div>
                    <a href="#"><button id="activemenu"><strong>Cadastro de Posto de Sáude</strong></button></a>
                </div>
                <div>
                    <a href="../../controller/admin_controller.php?acao=listarPostos"><button><strong>Consulta postos cadastrados</strong></button></a>
                </div>
            </div>
        </div>
        <div class="containerprofile1">
        <div class="bodycadastro">
        <div class="maincadastro">
            <div class="telacadastro">
                <a><img src=""></img></a>
                <form action="../../controller/admin_controller.php?acao=cadastrar_posto" method="POST">
                    <div class="formulariocadastro">
                      <h1>Posto de Saúde</h1>
                      <p>Cadastre um novo posto de saúde abaixo:</p>
                      <hr>
                      <label for="razao_social"><b>Razão Social</b></label>
                      <input type="text" placeholder="Insira a Razão Social" name="razao_social" id="razao_social">
                      
                      <label for="cnpj"><b>CNPJ</b></label>
                      <input type="text" placeholder="Insira o CNPJ" name="cnpj" id="cnpj">

                      <label for="rua"><b>Rua</b></label>
                      <input type="text" placeholder="Insira a Rua" name="rua" id="rua">

                      <label for="cidade"><b>Cidade</b></label>
                      <input type="text" placeholder="Insira a Cidade" name="cidade" id="cidade">

                      <label for="bairro"><b>Bairro</b></label>
                      <input type="text" placeholder="Insira o Bairro" name="bairro" id="bairro">

                      <label for="numero"><b>Número</b></label>
                      <input type="text" placeholder="Insira o Número" name="numero" id="numero">
                                        
                      <label for="num_telefone"><b>Número de Telefone</b></label>
                      <input type="text" placeholder="Insira o Número de Telefone" name="num_telefone" id="num_telefone">

                      <label for="email"><b>Email</b></label>
                      <input type="text" placeholder="Insira o Email" name="email" id="email">

                      <button type="button" class="botao_registrar" onclick="processa_cadastro_posto()">Cadastrar</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>
       </div>
</div>
</body>
</html>