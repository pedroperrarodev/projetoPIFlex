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
                    <a href="tela_cadastro_admin.php"><button><strong>Cadastro de adminstradores</strong></button></a>
                </div>
                <div>
                    <a href="tela_cadastro_posto_saude.php"><button><strong>Cadastro de Posto de Sáude</strong></button></a>
                </div>
            </div>
        </div>
    <div class="bodycadastro">
        <div class="maincadastro">
            <div class="telacadastro">
                <a><img src=""></img></a>
                <form action="/action_page.php" method="post">
                    <div class="formulariocadastro">
                      <h1>Cadastre uma nova vacina</h1>
                      <p>Cadastre uma nova vacina abaixo:</p>
                      <hr>

                      <label for="email"><b>Nome da vacina</b></label>
                      <input type="text" placeholder="Insira o Nome da Vacina" name="nome_vacina" id="nome_vacina">

                      <label for="email"><b>Fabricante</b></label>
                      <input type="text" placeholder="Insira o Fabricante" name="fabricante" id="fabricante">

                      <label for="email"><b>Doença alvo</b></label>
                      <input type="text" placeholder="Insira a Doença Alvo" name="doenca_alvo" id="doenca_alvo">

                      <button type="submit" class="botao_registrar">Cadastrar Vacina</button>
                      <a href="../tela_principal.html"><button type="button" class="botao_voltar">Voltar</button></a>
                    </div>
                  
                  </form>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>