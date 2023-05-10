<!-- alterar para ser uma tela de consulta -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <HEAD:view/usuario/index.html></HEAD:view>
<!--     <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/cadastro_vacina.css"> -->


    <link rel="stylesheet" type="text/css" href="../../css/cadastro_vacina_usuario.css"><!-- ESTILIZAÇÃO DE FORMULARIO DA PAGINA ESPECIFICA -->
    <link rel="stylesheet" type="text/css" href="../../css/corpo.css"><!-- ESTILIZAÇÃO DO HEADER MENU E BOTAO DE SAIR -->

            <!-- TROCAR OS LINKS DE ORDEM ALTERA A COR DAS PAGINAS PARA TESTE -->


    <title>Cadastro de Vacinas</title>
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
                    <a href="tela_profile.html"><button ><strong>Perfil</strong></button></a>
                </div>
                <div>
                    <a href="cadastro_vacina.html"><button id="activemenu"><strong>Cadastro de Vacinas </strong></button></a>
                </div>
                <div>
                    <a><button><strong>Menu 3</strong></button></a>
                </div>
                <div>
                    <a><button><strong>Menu 3</strong></button></a>
                </div>
            </div>
            <div class="sobre">
                <h3>Sobre</h3>
                

            </div>

        </div>

       <div class="containercadastro">
            <form name="cadastro_vacinas" action="grava_cadastrovacina.php" method="POST" enctype="multipart/form-data">
                <h1>Preencha seu cartão de vacinas.</h1><br>
                <div class="div_form">
                    <h4>Nome da vacina:</h4> <input type="text" name="nome"> <!-- APARECER O NOME DO USUARIO -->
                    <br>
                    <h4>Local ou Unidade de Vacinação:</h4> <input type="text" name="local">
                    <br>
                    <h4>Fabricante: </h4> <input type="text" name="fabricante_vacina">
                    <br>
                    <h4>Lote: </h4> <input type="text" name="lote_vacina">

                    <button type="submit" class="botao_registrar">Cadastrar Vacina</button>
                    <a href="../tela_principal.html"><button type="button" class="botao_voltar">Voltar</button></a>

                </div>
            
            </form>

       </div>

    </div>
    
</body>
</html>