<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/cadastro_nova_vacina.css">
    
    <title>Tela de cadastro Vacina</title>
</head>
<body>
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

    
</body>
</html>