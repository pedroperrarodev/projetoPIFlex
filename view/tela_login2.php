<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <script src="../static/js/jquery-3.6.4.min.js"></script>
  <link rel="stylesheet" href="../css/login2.css">
  <script type="text/javascript">
    $(document).ready(function () {});

    function processa_login() {
      var formDados = {
        cpf: $("#cpf").val(),
        senha: $("#senha").val(),
      };

      $.ajax({
        type: "POST",
        url: "../controller/usuario_controller.php?acao=logar",
        data: formDados,
        dataType: "json",
      }).done(function (dataRetorno) {
        if (dataRetorno.erro == 0) {
          window.location.href = dataRetorno.url;
        } else {
          alert(dataRetorno.msg);
        }
      });
    }

    function processa_cadastro() {
      // Pegando os valores atualizados dos inputs
      var cpfcadastro = $("#cpfcadastro").val();
      var senhacadastro = $("#senhacadastro").val();

      // Transformando cpfcadastro e senhacadastro para cpf e senha
      var cpf = cpfcadastro;
      var senha = senhacadastro;

      var formDados = {
        nome_completo: $("#nome_completo").val(),
        cpf: cpf, // Usando o valor transformado
        rua: $("#rua").val(),
        bairro: $("#bairro").val(),
        cidade: $("#cidade").val(),
        numero: $("#numero").val(),
        num_telefone: $("#num_telefone").val(),
        email: $("#email").val(),
        perfil: $("#perfil").val(),
        senha: senha, // Usando o valor transformado
        confirmar_senha: $("#confirmar_senha").val(),
      };

      $.ajax({
        type: "POST",
        url: "../controller/usuario_controller.php?acao=cadastrar",
        data: formDados,
        dataType: "json",
      }).done(function (dataRetorno) {
        console.log("Criado no banco de dados");
        if (dataRetorno.erro == 0) {
          alert(dataRetorno.msg);
          window.location.href = dataRetorno.url;
        } else {
          alert(dataRetorno.msg);
        }
      });
    }
  </script>
</head>
<body>
  <div class="container" id="container">
    <div class="form-container sign-up">
      <form>
        <h1>Criar Conta</h1>
        <p>Insira seus dados para criar uma conta</p>

        <input type="text" placeholder="Insira o Nome Completo" name="nome_completo" id="nome_completo">
        <input type="text" placeholder="Insira seu CPF" name="cpfcadastro" id="cpfcadastro">
        <input type="text" placeholder="Insira a Rua" name="rua" id="rua">
        <input type="text" placeholder="Insira o Bairro" name="bairro" id="bairro">
        <input type="text" placeholder="Insira a cidade " name="cidade" id="cidade">
        <input type="text" placeholder="Insira o Número da Casa" name="numero" id="numero">
        <input type="text" placeholder="Insira o Número de Telefone" name="num_telefone" id="num_telefone">
        <input type="text" placeholder="Insira o Email" name="email" id="email">
        <input type="password" placeholder="Digita sua Senha" name="senhacadastro" id="senhacadastro">
        <input type="password" placeholder="Repita sua Senha" name="confirmar_senha" id="confirmar_senha">
        <button type="button" class="botao_registrar" onclick="processa_cadastro()">Cadastrar</button>
      </form>
    </div>
    <div class="form-container sign-in">
      <form>
        <h1>Fazer Login</h1>
        <input type="text" placeholder="Informe seu CPF" name="cpf" id="cpf">
        <input type="password" placeholder="Informe sua Senha" name="senha" id="senha">
        <input id="containerbutton" type="button" value="Logar" id="botao_login" onclick="processa_login()">
      </form>
    </div>
    <div class="toggle-container">
      <div class="toggle">
        <div class="toggle-panel toggle-left">
          <h1>Bem vindo!</h1>
          <p>Insira seus dados para fazer login</p>
          <button class="hidden" id="login">Entrar</button>
        </div>
        <div class="toggle-panel toggle-right">
          <h1>Bem vindo!</h1>
          <p>Registre-se para começarmos</p>
          <button class="hidden" id="register">Cadastre-se</button>
        </div>
      </div>
    </div>
  </div>
  <script src="../js/script.js"></script>
  <script>
        document.getElementById("senha").addEventListener("keydown", function(event) {
            if (event.key === "Enter") { // Verifica se a tecla pressionada é Enter
              processa_login();
            }
        });
    </script>
</body>
</html>
