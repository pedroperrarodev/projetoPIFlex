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
    <!-- CSS PARA O HTML -->
    <link rel="stylesheet" type="text/css" href="../../css/tela_profile.css">
    <link rel="stylesheet" type="text/css" href="../../css/corpo.css">

    <!-- CSS PARA O PHP CONTROLLER -->
    <link rel="stylesheet" type="text/css" href="../css/tela_profile.css">
    <link rel="stylesheet" type="text/css" href="../css/corpo.css">

    <title>Tela administrador</title>
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
                    <a href="#"><button id="activemenu"><strong>Perfil</strong></button></a>
                </div>
                <div>
                    <a href="tela_cadastro_vacina.php"><button><strong>Cadastro de Vacinas</strong></button></a>
                </div>
                <div>
                    <a href="tela_cadastro_admin.php"><button><strong>Cadastro de adminstradores</strong></button></a>
                </div>
                <div>
                    <a href="tela_cadastro_posto_saude.php"><button><strong>Cadastro de Posto de Sáude</strong></button></a>
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
                    <th>Nome da vacina</th>
                    <th>Local</th>
                    <th>Fabricante</th>
                    <th>Função Vacina</th>
                </tr> 


            </table>
            
       </div>
       <div class="containerprofile2">
        <div>
            <a><img src="../img/profileicon.png"></a><br>
            <h3>Bem vindo</h3>
            <p>Nome de profile</p>
            <p>Informações de profile</p>
            
        </div>
            <a href="tela_configusuario.html"><button id="buttonconfig"><img id="iconeconfig" src="../img/iconconfig.png"></button></a>
       </div>

    </div>
    
</body>
</html>