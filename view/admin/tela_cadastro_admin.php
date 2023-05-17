<?php
    require_once("../../infra/valida_sessao.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/cadastro.css">
    
    <title>Tela de admin</title>
</head>
<body>
    <div class="bodycadastro">
        <div class="maincadastro">
            <div class="telacadastro">
                <a><img src=""></img></a>
                <form action="../../controller/admin_controller.php?acao=cadastrar_admin" method="post">
                    <div class="formulariocadastro">
                      <h1>Cadastre um novo admin</h1>
                      <p>Por favor preencha o formulário para cadastrar um novo administrador.</p>
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
                  
                      <label for="confirmar_senha"><b>Confirmar Senha</b></label>
                      <input type="password" placeholder="Repita sua Senha" name="confirmar_senha" id="confirmar_senha">
                      <hr>
                      <button type="submit" class="botao_registrar">Cadastrar</button>
                    </div>
                    <a href=""><button type="button" class="botao_voltar">Voltar</button></a>
                  </form>
            </div>
        </div>
    </div>

    
</body>
</html>