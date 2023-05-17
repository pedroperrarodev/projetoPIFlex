<?php
    require_once "../model/Vacina.php";

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

                $funcao_vacina = $post["funcao_vacina"];
                $vacina->__set("funcao_vacina", $funcao_vacina);

                if($vacina->salvar() == true){
                    $retorno = ["msg" =>"Vacina cadastrada com sucesso!", "erro"=>"0", "url" => "../usuario/cadastro_vacina.php"];
                    echo json_encode($retorno);
                }
                else{
                    $retorno = ["msg" =>"Erro ao cadastrar a vacina!", "erro"=>"1"];
                    echo json_encode($retorno);
                }
            }
            else if ($acao == "atualizar"){
                
                $vacina = new Vacina();

                $id = $post["id"];
                $vacina->__set("id", $id);

                $nomevacina = $post["nomevacina"];
                $vacina->__set("nomevacina", $nomevacina);

                $local = $post["local"];
                $vacina->__set("local", $local);

                $fabricante = $post["fabricante"];
                $vacina->__set("fabricante", $fabricante);

                $funcao_vacina = $post["funcao_vacina"];
                $vacina->__set("funcao_vacina", $funcao_vacina);

                if($vacina->atualizar() == true){
                    /* $retorno["msg"] = "Usuário atualizado com sucesso!"; */
                    $retorno["msg"] = "AQUI";
                    $retorno["erro"] = "0";
                    $retorno["url"] = "../controller/vacina_controller.php?acao=listar";
                    
                    echo json_encode($retorno);
                }
                else{
                    $retorno = ["msg" =>"Erro ao atualizar o usuário!!", "erro"=>"1"];
                    echo json_encode($retorno);
                }

            }

            
            else if ($acao == "listar"){
                $vacina = new Vacina();
                $dados = $vacina->listarVacinas();

                
                require_once("../view/usuario/tela_profile_usuario.php");
            }

            else if($acao == "editar"){
                $id = $get["id"];
                $vacina = new Vacina();
                $dados = $vacina->buscarPorId($id);

                
                require_once("../view/usuario/editar_vacina.php");
            }  
            

            else if($acao == "deletar"){
                $id = $get["id"];
                $vacina = new Vacina();
                $dados = $vacina->deletar($id);
                
                header("location:../controller/vacina_controller.php?acao=listar");
            }  
        }

    }
    
  
        $controller = new VacinaController();
        $controller->execute($_POST, $_GET); 
  
  