<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <HEAD:view/usuario/index.html></HEAD:view>
    <!-- CSS PARA O HTML -->
    <link rel="stylesheet" type="text/css" href="../../css/homepage.css">
    <link rel="stylesheet" type="text/css" href="../../css/corpo.css">

    <!-- CSS PARA O PHP CONTROLLER -->
    <link rel="stylesheet" type="text/css" href="../css/homepage.css">
    <link rel="stylesheet" type="text/css" href="../css/corpo.css">

    <!-- TELA DE USUARIO -->
    <title>Home</title>
</head>
<body>  
    <header>
        <div id="logo">
            <!-- <a><img src="../../img/Horizontal Logo Projeto PI fundo transp.png"></a> -->
            <h1>Logo</h1>
        </div>
        <!-- <button>Sair</button> -->
        <div class="botaosair">
            <button class="noselect"><span class='text'>Sair</span><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/>
            </svg></span></button>

        </div>

    </header>

    <div id="main">
        <div class="menu">
            <div class="sidebar">
                <div>
                    <a href="homepage.php"><button id="activemenu"><strong>Home</strong></button></a>
                </div>
                <div>
                    <a href="../../controller/vacina_controller.php?acao=listar"><button><strong>Perfil</strong></button></a>
                </div>
                <div>
                    <a href="cadastro_vacina.php"><button><strong>Cadastro de Vacinas </strong></button></a>
                </div>
                <div>
                    <a href="tela_config_usuario.php"><button><strong>Configurações</strong></button></a>
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

        <!-- <a href="tela_configusuario.html"><img id="iconeconfig" src="../../img/iconconfig.png"></a> -->
        <a href="tela_config_usuario.php"><button id="buttonconfig"><img id="iconeconfig" src="../../img/iconconfig.png"></button></a>



       </div>

    </div>
    
</body>
</html>