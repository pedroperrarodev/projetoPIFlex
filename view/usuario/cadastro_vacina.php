<?php
    require_once("../../infra/valida_sessao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <HEAD:view/usuario/index.html></HEAD:view>
    
    <link rel="stylesheet" type="text/css" href="../../css/corpo.css">
    <link rel="stylesheet" type="text/css" href="../../css/cadastro_vacina_usuario.css">



    <title>Cadastro de Vacinas</title>
    <script src="../../static/js/jquery-3.6.4.min.js"></script>
		<script type="text/javascript">
			$( document ).ready(function() {
			});

			function processa_cadastro(){
				var formDados = {
					nomevacina: $("#nomevacina").val(),
					local: $("#local").val(),
					fabricante: $("#fabricante").val(),
					funcao_vacina: $("#funcao_vacina").val(),
    			};

				$.ajax({
					type: "POST",
					url: "../../controller/vacina_controller.php?acao=cadastrar",
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


</head>
<body>  
    <header>
        <div id="logo">
            <!--<a><img src="../../img/logoteste2.png"></a> -->
            <h1>Logo</h1>
        </div>
        <!-- <button>Sair</button> -->
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
                    <a href="homepage.php"><button><strong>Home</strong></button></a>
                </div>
                <div>
                    <a href="../../controller/vacina_controller.php?acao=listar"><button><strong>Perfil</strong></button></a>
                </div>
                <div>
                    <a href="cadastro_vacina.php"><button id="activemenu"><strong>Cadastro de Vacinas </strong></button></a>
                </div>
                <div>
                    <a href="tela_config_usuario.php"><button><strong>Configurações</strong></button></a>
                </div>
            </div>

        </div>

       <div class="containercadastro">
            <form name="cadastro_vacinas" action="#" method="POST">
                <h1>Preencha seu cartão de vacinas.</h1><br>
                <div class="div_form">
                    <h4>Nome da vacina:</h4> <input type="text" id="nomevacina" name="nomevacina">
                    <br>
                    <h4>Local ou Unidade de Vacinação:</h4> <input type="text" id="local" name="local">
                    <br>
                    <h4>Fabricante: </h4> <input type="text" id="fabricante" name="fabricante">
                    <br>
                    <h4>Função da Vacina: </h4> <input type="text" id="funcao_vacina" name="funcao_vacina">


                    <input type="button" value="Cadastrar" class="botao_registrar" onclick="processa_cadastro()"/> <br>

                    <a href="homepage.php"><button type="button" class="botao_voltar">Voltar</button></a>

                </div>
            
            </form>

       </div>

    </div>
    
</body>
</html>