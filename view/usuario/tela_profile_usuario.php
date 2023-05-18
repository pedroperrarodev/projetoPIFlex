<?php
    require_once("../../infra/valida_sessao.php");      
    /* DEPENDENDO DA AÇÃO OU PÁGINA ATUALIZADA TEM QUE SER OUTRO DIRETÓRIO */
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <HEAD:view/usuario/index.html></HEAD:view>
    <!-- CSS PARA O HTML -->
    <link rel="stylesheet" type="text/css" href="../../css/tela_profile.css">
    <link rel="stylesheet" type="text/css" href="../../css/corpo.css">

    <!-- CSS PARA O PHP CONTROLLER -->
    <link rel="stylesheet" type="text/css" href="../css/tela_profile.css">
    <link rel="stylesheet" type="text/css" href="../css/corpo.css">

    <!-- TELA DE USUARIO -->
    <title>Tela Profile Usuario</title>
    <script type="text/javascript">
			function excluir(id){
				retorno = confirm("Tem certeza que deseja excluir o ID="+id+" ?")
				if(retorno){
					alert("Excluindoo!!");
					document.location.href = "../controller/vacina_controller.php?acao=deletar&id="+id;
				}
			}
            function processa_atualizar(){
				var formDados = {
                    nomevacina: $("#nomevacina").val(),
					local: $("#local").val(),
					fabricante: $("#fabricante").val(),
					funcao_vacina: $("#funcao_vacina").val(),
    			};
				
				$.ajax({
					type: "POST",
					url: "../../controller/vacina_controller.php?acao=atualizar",
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
            <!-- <a><img src="../../img/Horizontal Logo Projeto PI fundo transp.png"></a> -->
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
                    <a href="../view/usuario/homepage.php"><button><strong>Home</strong></button></a>
                </div>
                <div>
                    <a href="vacina_controller.php?acao=listar"><button id="activemenu"><strong>Perfil</strong></button></a>
                </div>
                <div>
                    <a href="../view/usuario/cadastro_vacina.php"><button><strong>Cadastro de Vacinas </strong></button></a>
                </div>
                <div>
                <a href="../view/usuario/tela_config_usuario.php"><button><strong>Configurações</strong></button></a>
                </div>  
            </div>

        </div>

       <div class="containerprofile1">
        <div>
            <form name="cadastro_vacinas" action="grava_cadastrovacina.php" method="POST" enctype="multipart/form-data">
                <h2>Seu cartão de vacinas.</h2><!-- <br> -->
                <div class="div_form">
                    <p>Informações do banco de dados do usuario</p>
                    <input id="campopesquisa" type="text" placeholder="Pesquise">
                </div>
            </form>
        </div>
           
            <table id= "tabelavacinas">
                <tr>
                    <!-- <th>Id</th> -->
                    <th>ID</th>
                    <th>Nome da vacina</th>
                    <th>Local</th>
                    <th>Fabricante</th>
                    <th>Função Vacina</th>
                    <th></th>
                </tr>
                
                <?php
                 for ($i=0; $i<sizeof($dados);$i++){
                    echo "<tr>";	
                    echo "<td><a href=\"../controller/vacina_controller.php?acao=editar&id=".$dados[$i]["id"]."\">".$dados[$i]["id"]."</a></td>";

                    echo "<td>".$dados[$i]["nomevacina"]."</td>";
                    echo "<td>".$dados[$i]["local"]."</td>";
                    echo "<td>".$dados[$i]["fabricante"]."</td>";
                    echo "<td>".$dados[$i]["funcao_vacina"]."</td>";
                    echo "<td align='center'><a href='#' onclick='excluir(".$dados[$i]["id"].")'>Excluir</a></td>";
                    echo "</tr>";
                 }
                ?>
            
            </table>
            
       </div>
       <div class="containerprofile2">
        <div>
            <a><img src="../img/profileicon.png"></a><br>
            <h3>Bem vindo</h3>
            <p>Nome de profile</p>
            <p>Informações de profile</p>
            
        </div>

        <a href="../view/usuario/tela_config_usuario.php"><button id="buttonconfig"><img id="iconeconfig" src="../img/iconconfig.png"></button></a>



       </div>

    </div>
    
</body>
</html>