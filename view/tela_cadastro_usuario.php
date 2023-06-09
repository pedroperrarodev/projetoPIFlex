<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/cadastro.css">
    <script src="../static/js/jquery-3.6.4.min.js"></script>
	<script type="text/javascript">
        $( document ).ready(function() {
			});

			function processa_cadastro(){
				var formDados = {
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
					url: "../controller/usuario_controller.php?acao=cadastrar",
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
    
    <title>Tela de cadastro</title>
</head>
<body>
    <div class="bodycadastro">
        <div class="maincadastro">
            <div class="telacadastro">
                <a><img src=""></img></a>
                <form action="../controller/usuario_controller.php?acao=cadastrar" method="POST">
                    <div class="formulariocadastro">
                      <h1>Criar conta</h1>
                      <p>Por favor preencha o formulário para criar a conta.</p>
                      <hr>

                      <label for="nome_completo"><b>Nome Completo</b></label>
                      <input type="text" placeholder="Insira o Nome Completo" name="nome_completo" id="nome_completo">
                      
                      <label for="cpf"><b>CPF</b></label>
                      <input type="text" placeholder="Insira seu CPF" name="cpf" id="cpf">
                      
                      <label for="rua"><b>Rua</b></label>
                      <input type="text" placeholder="Insira a Rua" name="rua" id="rua">

                      <label for="bairro"><b>Bairro</b></label>
                      <input type="text" placeholder="Insira o Bairro" name="bairro" id="bairro">

                      <label for="cidade"><b>Cidade</b></label>
                      <input type="text" placeholder="Insira a cidade " name="cidade" id="cidade">

                      <label for="numero"><b>Número</b></label>
                      <input type="text" placeholder="Insira o Número da Casa" name="numero" id="numero">
                      
                      <label for="num_telefone"><b>Número de Telefone</b></label>
                      <input type="text" placeholder="Insira o Número de Telefone" name="num_telefone" id="num_telefone">

                      <label for="email"><b>Email</b></label>
                      <input type="text" placeholder="Insira o Email" name="email" id="email">
                  
                      <label for="senha"><b>Senha</b></label>
                      <input type="password" placeholder="Digita sua Senha" name="senha" id="senha">
                  
                      <label for="conf_senha"><b>Confirmar Senha</b></label>
                      <input type="password" placeholder="Repita sua Senha" name="confirmar_senha" id="confirmar_senha">
                      <hr>
                      <button type="button" class="botao_registrar" onclick="processa_cadastro()">Cadastrar</button>
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