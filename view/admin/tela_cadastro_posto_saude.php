<?php
    require_once("../../infra/valida_sessao.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/cadastro_posto_saude.css">
    <title>Tela de cadastro Posto de Saude</title>
</head>
<body>
    <div class="bodycadastro">
        <div class="maincadastro">
            <div class="telacadastro">
                <a><img src=""></img></a>
                <form action="../../controller/admin_controller.php?acao=cadastrar_posto" method="POST">
                    <div class="formulariocadastro">
                      <h1>Posto de Saúde</h1>
                      <p>Cadastre um novo posto de saúde abaixo:</p>
                      <hr>
                      <label for="razao_social"><b>Razão Social</b></label>
                      <input type="text" placeholder="Insira a Razão Social" name="razao_social" id="razao_social">
                      
                      <label for="cnpj"><b>CNPJ</b></label>
                      <input type="text" placeholder="Insira o CNPJ" name="cnpj" id="cnpj">

                      <label for="rua"><b>Rua</b></label>
                      <input type="text" placeholder="Insira a Rua" name="rua" id="rua">

                      <label for="cidade"><b>Cidade</b></label>
                      <input type="text" placeholder="Insira a Cidade" name="cidade" id="cidade">

                      <label for="bairro"><b>Bairro</b></label>
                      <input type="text" placeholder="Insira o Bairro" name="bairro" id="bairro">

                      <label for="numero"><b>Número</b></label>
                      <input type="text" placeholder="Insira o Número" name="numero" id="numero">
                                        
                      <label for="num_telefone"><b>Número de Telefone</b></label>
                      <input type="text" placeholder="Insira o Número de Telefone" name="num_telefone" id="num_telefone">

                      <label for="email"><b>Email</b></label>
                      <input type="text" placeholder="Insira o Email" name="email" id="email">

                      <button type="submit" class="botao_registrar">Cadastrar</button>
                      <a href="../tela_principal.html"><button type="button" class="botao_voltar">Voltar</button></a>

                    </div>
                  </form>
            </div>
        </div>
    </div>

    
</body>
</html>