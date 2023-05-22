<?php
    require_once("../infra/valida_sessao.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/tela_profile.css">
    <link rel="stylesheet" type="text/css" href="../css/corpo.css">
    <link rel="stylesheet" type="text/css" href="../css/table_posto.css">
		</script>
    <title>Perfil</title>
</head>
<body>
<header>
        <div id="logo">
            <h1>Logo</h1>
        </div>
        <div class="botaosair">
            <a href="../controller/usuario_controller.php?acao=logout"><button class="noselect"><span class='text'>Sair</span><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/>
            </svg></span></button></a>

        </div>

    </header>
<div id="main">
        <div class="menu">
            <div class="sidebar">
            <div>
                    <a href="../view/usuario/homepage.php"><button><strong>Home</strong></button></a>
                </div>
                <div>
                    <a href="../../controller/usuario_controller.php?acao=listarUsuario&id=<?php echo $_SESSION['id']?>"><button id="activemenu"><strong>Perfil</strong></button></a>
                </div>
                <div>
                    <a href="../view/usuario/cadastrar_vacina.php"><button><strong>Cadastrar uma nova vacina</strong></button></a>
                </div>
                <div>
                    <a href="../../controller/registro_controller.php?acao=listarVacina&id=<?php echo $_SESSION['id']?>"><button><strong>Consultar vacinas</strong></button></a>
                </div>
            </div>
        </div>
        <div class="containerprofile1">
        <h1>Consulte os dados do seu perfil aqui</h1>
        <div>
                <table id="posto">
		            <tr>
                        <td>ID</td>
			            <td>Nome completo</td>
			            <td>CPF</td>
			            <td>Rua</td>
                        <td>Cidade</td>
                        <td>Bairro</td>
                        <td>Número</td>
                        <td>Número de Telefone</td>
			            <td>Email</td>
		            </tr>
                    <?php
                        for ($i=0; $i<sizeof($dados);$i++){
                                echo "<tr>";
                                echo "<td><a href=\"usuario_controller.php?acao=editar_usuario&id=".$dados[$i]["id"]."\">".$dados[$i]["id"]."</a></td>";
                                echo "<td>".$dados[$i]["nome_completo"]."</td>";
                                echo "<td>".$dados[$i]["cpf"]."</td>";
                                echo "<td>".$dados[$i]["rua"]."</td>";
                                echo "<td>".$dados[$i]["cidade"]."</td>";
                                echo "<td>".$dados[$i]["bairro"]."</td>";
                                echo "<td>".$dados[$i]["numero"]."</td>";
                                echo "<td>".$dados[$i]["num_telefone"]."</td>";
                                echo "<td>".$dados[$i]["email"]."</td>";
                                echo "</tr>";
                        }
                    ?>
		        </table>
                <h4>Para editar os dados do seu perfil, clique em cima do Id.</h4>
            </div>
       </div>
</div>
</body>
</html>