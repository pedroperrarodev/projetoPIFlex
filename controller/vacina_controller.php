<?php
    require_once "../model/Vacina.php";
            /* SÓ ALTEREI O LISTAR 08/05/2023 */
    class VacinaController{
        
        public function execute($post, $get){
            $acao = $get["acao"];
            if ($acao == "cadastrar"){
                $vacina = new Vacina();

                $nomevacina = $post["nomevacina"];
                $vacina->__set("nomevacina", $nomevacina);

                $local = $post["local"];
                $vacina->__set("local", $local);

                $fabricante = $post["fabricante"];
                $vacina->__set("fabricante", $fabricante);

                $lote = $post["lote"];
                $vacina->__set("lote", $lote);

            }
            else if ($acao == "listar"){
                $vacina = new Vacina();
                $dados = $vacina->listarVacinas();

                require_once("../view/usuario/tela_profile.php");
            }

            else if($acao == "editar"){
                $id = $get["id"];
                $vacina = new Vacina();
                $dados = $vacina->buscarPorId($id);
                
                /* require_once("../view/usuario/editar_usuario.php"); */
            }  
            
/*             else if($acao == "logar"){
                $login = $post["login"];
                $senha = $post["senha"];

                $usuario = new Usuario();
                $valida = $usuario->autenticar($login, $senha);

                if ($valida == true){
                    session_start();
	                $_SESSION["logado"] = true;
                    $_SESSION["login"] = $login;

                    $retorno = ["msg" =>"", "erro"=>"0", "url" => "principal.php"];
                    echo json_encode($retorno);
                }
                else{
                    $retorno = ["msg" =>"Senha Invalida!!", "erro"=>"1"];
                    echo json_encode($retorno);
                    json_decode($dados);
                }
            }   
            else if($acao == "logout"){
                session_start();
                unset($_SESSION);
                session_destroy();
            
                header("location:../view/login.php");
            } */


            else if($acao == "deletar"){
                $id = $get["id"];
                $Vacina = new Vacina();
                $dados = $vacina->deletar($id);
                
                $this->listarVacinas();
            }  
        }

    }
    
  
        $controller = new VacinaController();
        $controller->execute($_POST, $_GET); 
  
  