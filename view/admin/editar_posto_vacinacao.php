<?php
    //require_once("../../infra/valida_sessao.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/cadastro_nova_vacina.css">
    <link rel="stylesheet" type="text/css" href="../css/tela_profile.css">
    <link rel="stylesheet" type="text/css" href="../css/corpo.css">
    <script src="../static/js/jquery-3.6.4.min.js"></script>
	<script type="text/javascript">
			function processa_atualizar(){
				var formDados = {
					id: $("#id").val(),
					razao_social: $("#razao_social").val(),
					cnpj: $("#cnpj").val(),
					rua: $("#rua").val(),
                    bairro: $("#bairro").val(),
                    cidade: $("#cidade").val(),
					numero: $("#numero").val(),
					num_telefone: $("#num_telefone").val(),
					email: $("#email").val(),
    			};
				$.ajax({
					type: "POST",
					url: "../controller/admin_controller.php?acao=atualizar_posto_vacinacao",
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
    <title>Tela atualizar vacina</title>
</head>
<body>
<header>
        <div id="logo">
            <h1>Logo</h1>
        </div>
    </header>
<div id="main">
        <div class="containerprofile1">
        <div class="bodycadastro">
        <div class="maincadastro">
            <div class="telacadastro">
                <a><img src=""></img></a>
                <form action="/action_page.php" method="post">
                    <div class="formulariocadastro">
                      <h1>Atualize a vacina aqui</h1>
                      <p>Altere os dados abaixo para atualizar os dados da vacina</p>
                      <hr>
                      <p>Cadastre um novo posto de saúde abaixo:</p>
                      <hr>
                      <input type="hidden" name="id" id="id" value="<?php echo $dados[0]["id"]?>">

                      <label for="razao_social"><b>Razão Social</b></label>
                      <input type="text" placeholder="Insira a Razão Social" name="razao_social" id="razao_social" value="<?php echo $dados[0]["razao_social"]?>">
                      
                      <label for="cnpj"><b>CNPJ</b></label>
                      <input type="text" placeholder="Insira o CNPJ" name="cnpj" id="cnpj" value="<?php echo $dados[0]["cnpj"]?>">

                      <label for="rua"><b>Rua</b></label>
                      <input type="text" placeholder="Insira a Rua" name="rua" id="rua" value="<?php echo $dados[0]["rua"]?>"> 

                      <label for="cidade"><b>Cidade</b></label>
                      <input type="text" placeholder="Insira a Cidade" name="cidade" id="cidade" value="<?php echo $dados[0]["cidade"]?>">

                      <label for="bairro"><b>Bairro</b></label>
                      <input type="text" placeholder="Insira o Bairro" name="bairro" id="bairro" value="<?php echo $dados[0]["bairro"]?>">

                      <label for="numero"><b>Número</b></label>
                      <input type="text" placeholder="Insira o Número" name="numero" id="numero" value="<?php echo $dados[0]["numero"]?>">
                                        
                      <label for="num_telefone"><b>Número de Telefone</b></label>
                      <input type="text" placeholder="Insira o Número de Telefone" name="num_telefone" id="num_telefone" value="<?php echo $dados[0]["num_telefone"]?>">

                      <label for="email"><b>Email</b></label>
                      <input type="text" placeholder="Insira o Email" name="email" id="email" value="<?php echo $dados[0]["email"]?>">

                      <button type="button" class="botao_registrar" onclick="processa_atualizar()">Atualizar</button>
                    </div>
                  
                  </form>
            </div>
        </div>
    </div>
    </div>
</div>
    
</body>
</html>