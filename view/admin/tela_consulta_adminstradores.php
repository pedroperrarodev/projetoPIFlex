<?php
    require_once("../infra/valida_sessao.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <link rel="stylesheet" type="text/css" href="../css/tela_consulta_administradores.css">
    <link rel="stylesheet" type="text/css" href="../css/corpo2.css">
    <link rel="stylesheet" type="text/css" href="../css/table_posto.css">
    <script src="../../static/js/jquery-3.6.4.min.js"></script> 
    <script type="text/javascript">
			function excluir(id){
				retorno = confirm("Tem certeza que deseja excluir o ID="+id+" ?")
				if(retorno){
					alert("Excluindo!");
					document.location.href = "../controller/admin_controller.php?acao=deletar_adm_e_usuario&id="+id;
				}
			}
        </script>
    <title>Tela de consulta de adminstradores</title>
</head>
<body>
<header>
        <div id="logo">
            <h1>Projeto</h1>
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
                    <a href="../view/admin/homepage_admin.php"><button><strong>Perfil</strong></button></a>
                </div>
                <div>
                    <a href="../view/admin/tela_cadastro_vacina.php"><button><strong>Cadastro de Vacinas</strong></button></a>
                </div>
                <div>
                    <a href="../controller/admin_controller.php?acao=listarVacina"><button><strong>Consulta vacinas cadastrados</strong></button></a>
                </div>
                <div>
                    <a href="../view/admin/tela_cadastro_admin.php"><button><strong>Cadastro de adminstradores</strong></button></a>
                </div>
                <div>
                    <a href="../controller/admin_controller.php?acao=listarAdminstradores" ><button id="activemenu"><strong>Consulta adminstradores cadastrados</strong></button></a>
                </div>
                <div>
                    <a href="../view/admin/tela_cadastro_posto_saude.php"><button><strong>Cadastro de Posto de Sáude</strong></button></a>
                </div>
                <div>
                    <a href="../controller/admin_controller.php?acao=listarPostos"><button><strong>Consulta postos cadastrados</strong></button></a>
                </div>
            </div>
        </div>
        <div class="containerprofile1">
        <h1>Consulte os adminstradores cadastrados aqui</h1>
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
                        <td>Excluir</td>
		            </tr>
                    <?php
                        for ($i=0; $i<sizeof($dados);$i++){
                            echo "<tr>";
                            echo "<td><a href=\"admin_controller.php?acao=editar_perfil&id=".$dados[$i]["id"]."\">".$dados[$i]["id"]."</a></td>";
                            echo "<td>".$dados[$i]["nome_completo"]."</td>";
                            echo "<td>".$dados[$i]["cpf"]."</td>";
                            echo "<td>".$dados[$i]["rua"]."</td>";
                            echo "<td>".$dados[$i]["cidade"]."</td>";
                            echo "<td>".$dados[$i]["bairro"]."</td>";
                            echo "<td>".$dados[$i]["numero"]."</td>";
                            echo "<td>".$dados[$i]["num_telefone"]."</td>";
                            echo "<td>".$dados[$i]["email"]."</td>";
                            echo "<td align='center'><a href='#' class='delete-btn' onclick='excluir(".$dados[$i]["id"].")'><i class='fa fa-trash'></i></a></td>";
                            echo "</tr>";
                        }
                    ?>
		        </table>
            </div>
       </div>
</div>
</body>
</html>