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

                $funcao = $post["funcao"];
                $vacina->__set("funcao", $funcao);

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
                
                /* require_once("../view/usuario/editar_usuario.php"); */
            }  
            

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
  
  