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
    <link rel="stylesheet" type="text/css" href="../../css/corpo.css">
    <link rel="stylesheet" type="text/css" href="../../css/tela_config_usuario.css">


    <!-- CSS PARA O PHP CONTROLLER -->
    <link rel="stylesheet" type="text/css" href="../css/corpo.css">
    <link rel="stylesheet" type="text/css" href="../css/tela_config_usuario.css">

    <!-- TELA DE USUARIO -->
    <title>Configurações de usuario</title>

    <!-- MUDAR TODOS OS DADOS -->

    <script src="/static/js/jquery-3.6.4.min.js"></script>
    <script type="text/javascript">
			$( document ).ready(function() {
			});

            function processa_atualizar(){
				var formDados = {
                    id: $("#id").val(),
					nome_completo: $("#nome_completo").val(),
					cpf: $("#cpf").val(),
					rua: $("#rua").val(),
					bairro: $("#bairro").val(),
					cidade: $("#cidade").val(),
					numero: $("#numero").val(),
					num_telefone: $("#num_telefone").val(),
					email: $("#email").val(),
					perfil: $("#perfil").val(),
                    senha: $("#senha").val(),
                    confirmar_senha: $("#confirmar_senha").val(),
    			};

				$.ajax({
					type: "POST",
					url: "../controller/usuario_controller.php?acao=atualizar",
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
        <!-- MUDAR TODOS OS DADOS -->
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
                    <a href="homepage.php"><button><strong>Home</strong></button></a>
                </div>
                <div>
                <a href="../../controller/vacina_controller.php?acao=listar"><button><strong>Perfil</strong></button></a>
                </div>
                <div>
                    <a href="cadastro_vacina.php"><button><strong>Cadastro de Vacinas </strong></button></a>
                </div>
                <div>  
                    <a href="../controller/usuario_controller.php?acao=editar&id="><button  id="activemenu"><strong>Configurações</strong></button></a>

                </div>
            </div>
        </div>

        <div class="containercadastro">
            <div class="form_editar_usuario">
                <form action="#" method="POST">
                        <div class="formulariocadastro">
                        <h1>Editar dados do usuário</h1>
                        <p>Reescreva seus dados para editar.</p>
                        <hr>
                        <input type="hidden" placeholder="id" name="id" id="id" value="<?php echo $dados[0]["id"]?>">

                        <label for="nome_completo"><b>Nome Completo</b></label>
                        <input type="text" placeholder="Insira o Nome Completo" name="nome_completo" id="nome_completo" value="<?php echo $dados[0]["nome_completo"]?>">
                        
                        <label for="cpf"><b>CPF</b></label>
                        <input type="text" placeholder="Insira seu CPF" name="cpf" id="cpf" value="<?php echo $dados[0]["cpf"]?>">
                        
                        <label for="rua"><b>Rua</b></label>
                        <input type="text" placeholder="Insira a Rua" name="rua" id="rua" value="<?php echo $dados[0]["rua"]?>">

                        <label for="bairro"><b>Bairro</b></label>
                        <input type="text" placeholder="Insira o Bairro" name="bairro" id="bairro" value="<?php echo $dados[0]["bairro"]?>">

                        <label for="cidade"><b>Cidade</b></label>
                        <input type="text" placeholder="Insira a cidade " name="cidade" id="cidade" value="<?php echo $dados[0]["cidade"]?>">

                        <label for="numero"><b>Número</b></label>
                        <input type="text" placeholder="Insira o Número da Casa" name="numero" id="numero" value="<?php echo $dados[0]["numero"]?>">
                        
                        
                        <label for="num_telefone"><b>Número de Telefone</b></label>
                        <input type="text" placeholder="Insira o Número de Telefone" name="num_telefone" id="num_telefone" value="<?php echo $dados[0]["num_telefone"]?>">

                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Insira o Email" name="email" id="email" value="<?php echo $dados[0]["email"]?>">
                    
                        <label for="senha"><b>Senha</b></label>
                        <input type="password" placeholder="Digita sua Senha" name="senha" id="senha">
                    
                        <label for="conf_senha"><b>Confirmar Senha</b></label>
                        <input type="password" placeholder="Repita sua Senha" name="confirmar_senha" id="confirmar_senha" >
                        <hr>
                        <button type="button" class="botao_registrar" onclick="processa_atualizar()">Cadastrar</button>
                        </div>
                        <div class="container signin">
                        <p>Já possui uma conta? <a href="tela_login.php">Entrar</a>.</p>
                    </div>
                    </form>




            
                </div>
        

       </div>


    </div>
    
</body>
</html>