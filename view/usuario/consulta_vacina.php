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
    <title>Consultar vacinas</title>
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
                    <a href="../controller/usuario_controller.php?acao=listarUsuario&id=<?php echo $_SESSION['id']?>"><button><strong>Perfil</strong></button></a>
                </div>
                <div>
                    <a href="../view/usuario/cadastrar_vacina.php"><button><strong>Cadastrar uma nova vacina</strong></button></a>
                </div>
                <div>
                    <a href="../controller/registro_controller.php?acao=listarVacina&id=<?php echo $_SESSION['id']?>"><button id="activemenu"><strong>Consultar vacinas</strong></button></a>
                </div>
            </div>
        </div>
        <div class="containerprofile1">
        <h1>Consulte as suas vacinas aqui</h1>
        <div>
                <table id="posto">
		            <tr>
                        <td>ID</td>
			            <td>Nome vacina</td>
			            <td>Fabricante</td>
			            <td>Local</td>
                        <td>Data</td>
		            </tr>
                    <?php
                        for ($i=0; $i<sizeof($dados);$i++){
                                echo "<tr>";
                                echo "<td><a href=\"registro_controller.php?acao=editar_vacina&id=".$dados[$i]["id_registro_vacina"].
                                "\">".$dados[$i]["id_registro_vacina"]."</a></td>";
                                echo "<td>".$dados[$i]["nome_vacina"]."</td>";
                                echo "<td>".$dados[$i]["fabricante"]."</td>";
                                echo "<td>".$dados[$i]["razao_social"]."</td>";
                                echo "<td>".$dados[$i]["data"]."</td>";
                                echo "</tr>";
                        }
                    ?>
		        </table>
                <h4>Para editar os dados da vacina, clique em cima do Id.</h4>
            </div>
       </div>
</div>
</body>
</html>