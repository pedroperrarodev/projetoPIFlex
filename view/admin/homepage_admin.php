<?php
    require_once("../../infra/valida_sessao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Import de Icones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <HEAD:view/usuario/index.html></HEAD:view>
    <!-- CSS PARA O HTML -->
    <link rel="stylesheet" type="text/css" href="../../css/homepage2.css">
    <link rel="stylesheet" type="text/css" href="../../css/corpo2.css">

    <!-- CSS PARA O PHP CONTROLLER -->
    <link rel="stylesheet" type="text/css" href="../css/homepage2.css">
    <link rel="stylesheet" type="text/css" href="../css/corpo2.css">

    <!-- TELA DE USUARIO -->
    <title>Home</title>
</head>
<body>  
    <header>
        <div id="logo">
            <!-- <a><img src="../../img/Horizontal Logo Projeto PI fundo transp.png"></a> -->
            <h1>Projeto</h1>
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
                        <a href="#"><button id="activemenu"><strong>Perfil</strong></button></a>
                    </div>
                    <div>
                        <a href="../../view/admin/tela_cadastro_vacina.php"><button><strong>Cadastro de Vacinas</strong></button></a>
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


  
       <div class="homepage">
        <div>
            <a><img src="../../img/profileicon.png"></a><br>
            <h3>Bem vindo</h3>
            <p>Nome de profile</p>
            <p>Informações de profile</p>
            
        </div>

        <a href="../../controller/admin_controller.php?acao=listarAdminstradores"><button id="buttonconfig"><i class="fa-solid fa-gears fa-2x"></i></button></a>


       </div>

    </div>
    
</body>
</html>