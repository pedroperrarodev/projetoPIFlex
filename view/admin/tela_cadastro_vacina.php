<?php
    require_once("../../infra/valida_sessao.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/cadastro_nova_vacina.css">
    <link rel="stylesheet" type="text/css" href="../../css/tela_profile_admin.css">
    <link rel="stylesheet" type="text/css" href="../../css/corpo2.css">
    
    <script src="../../static/js/jquery-3.6.4.min.js"></script> 
    <script type="text/javascript">
        $( document ).ready(function() {
			});

			function processa_cadastro_vacina(){
				var formDados = {
					nome_vacina: $("#nome_vacina").val(),
					fabricante: $("#fabricante").val(),
                    doenca_alvo: $("#doenca_alvo").val(),
    			};
                
				$.ajax({
					type: "POST",
					url: "../../controller/admin_controller.php?acao=cadastrar_vacina",
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
    <title>Tela de cadastro Vacina</title>
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
                    <a href="#"><button id="activemenu"><strong>Cadastro de Vacinas</strong></button></a>
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
                    <a href="tela_cadastro_posto_saude.php"><button><strong>Cadastro de Posto de Sáude</strong></button></a>
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
                <form action="/action_page.php" method="post">
                    <div class="formulariocadastro">
                      <h1>Cadastre uma nova vacina</h1>
                      <p>Cadastre uma nova vacina abaixo:</p>

                      <label for="email"><b>Nome da vacina</b></label>
                      <input type="text" placeholder="Insira o Nome da Vacina" name="nome_vacina" id="nome_vacina">

                      <label for="email"><b>Fabricante</b></label>
                      <input type="text" placeholder="Insira o Fabricante" name="fabricante" id="fabricante">

                      <label for="email"><b>Doença alvo</b></label>
                      <input type="text" placeholder="Insira a Doença Alvo" name="doenca_alvo" id="doenca_alvo">

                      <button type="button" class="botao_registrar" onclick="processa_cadastro_vacina()">Cadastrar</button>
                    </div>
                  
                  </form>
            </div>
        </div>
    </div>
       </div>
</div>
    
</body>
</html>