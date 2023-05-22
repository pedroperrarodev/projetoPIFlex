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
    <link rel="stylesheet" type="text/css" href="../../css/tela_profile.css">
    <link rel="stylesheet" type="text/css" href="../../css/corpo.css">

    <script src="../../static/js/jquery-3.6.4.min.js"></script> 
    <script type="text/javascript">
        $( document ).ready(function() {
			});

			function cadastrar_registro(){
				var formDados = {
					id_vacina: $("#id_vacina").val(),
					id_posto: $("#id_posto").val(),
                    data: $("#data").val(),
                    id_pessoa: $("#id_pessoa").val(),
    			};
                
				$.ajax({
					type: "POST",
					url: "../../controller/registro_controller.php?acao=cadastrar_registro",
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
    <title>Cadastrar uma nova vacina</title>
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
                    <a href="homepage.php"><button><strong>Home</strong></button></a>
                </div>
                <div>
                    <a href="../../controller/usuario_controller.php?acao=listarUsuario&id=<?php echo $_SESSION['id']?>"><button><strong>Perfil</strong></button></a>
                </div>
                <div>
                    <a href="#"><button id="activemenu"><strong>Cadastrar uma nova vacina</strong></button></a>
                </div>
                <div>
                    <a href="../../controller/registro_controller.php?acao=listarVacina&id=<?php echo $_SESSION['id']?>"><button><strong>Consultar vacinas</strong></button></a>
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
                      <hr>
                      <input type="hidden" name="id_pessoa" id="id_pessoa" value="<?php echo $_SESSION['id']?>">

                      <label for="vacina"><b>Nome da vacina</b></label>
                        <select name="id_vacina" id="id_vacina">
                            <option value="1">astrazenica</option>
                            <option value="3">teste2</option>
                        </select><br>

                      <label for="email"><b>Fabricante</b></label>
                      <select name="id_vacina" id="id_vacina">
                            <option value="1">pfizer</option>
                            <option value="3">teste2</option>
                        </select><br>

                        <label for="email"><b>Local</b></label>
                        <select name="id_posto" id="id_posto">
                            <option value="1">primeiro posto testado</option>
                        </select><br>

                      <label for="email"><b>Data</b></label>
                      <input type="date" name="data" id="data">

                      <button type="button" class="botao_registrar" onclick="cadastrar_registro()">Cadastrar</button>
                    </div>
                  
                  </form>
            </div>
        </div>
    </div>
       </div>
</div>
    
</body>
</html>