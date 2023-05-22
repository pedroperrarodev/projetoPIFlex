<?php

    require_once ("../model/registra_vacina.php");

    class registro_controller{

        public function execute($post, $get){
            $acao = $get['acao'];
            if ($acao == "cadastrar_registro"){
                    $registro = new registraVacina();
    
                    $id_vacina = $post["id_vacina"];
                    $registro->__set("id_vacina", $id_vacina);
    
                    $id_posto = $post["id_posto"];
                    $registro->__set("id_posto", $id_posto);

                    $data = $post["data"];
                    $registro->__set("data", $data);

                    $id_pessoa = $post["id_pessoa"];
                    $registro->__set("id_pessoa", $id_pessoa);

                    if($registro->cadastrar_registro() == true){
                        $retorno = ["msg" =>"Vacina cadastrada com sucesso!", "erro"=>"0", "url" => ""];
                        echo json_encode($retorno);
                    }
                    else{
                        $retorno = ["msg" =>"Erro ao cadastrar a vacina!", "erro"=>"1"];
                        echo json_encode($retorno);   
                    }
            }
            else if($acao == "listarVacina"){
                $id = $get["id"];
                $registro = new registraVacina();
                $dados = $registro->listarVacina();

                require_once("../view/usuario/consulta_vacina.php");  
            }
            else if($acao == "editar_vacina"){
                $id = $get["id"];
                $registro = new registraVacina();
                $dados = $registro->buscarVacinaPorId($id);
                
                require_once("../view/usuario/edita_vacina.php");  
            }
            else if ($acao == "atualizar_vacina"){

                $registro = new registraVacina();

                $id_registro_vacina = $post["id_registro_vacina"];
                $registro->__set("id_registro_vacina", $id_registro_vacina);

                $nome_vacina = $post["nome_vacina"];
                $registro->__set("nome_vacina", $nome_vacina);

                $fabricante = $post["fabricante"];
                $registro->__set("fabricante", $fabricante);

                $razao_social = $post["razao_social"];
                $registro->__set("razao_social", $razao_social);

                $data = $post["data"];
                $registro->__set("data", $data);


                    if($registro->atualizar_perfil_vacina() == true){
                        $retorno["msg"] = "Dados da vacina atualizado com sucesso!";
                        $retorno["erro"] = "0";
                        $retorno["url"] = "../view/usuario/homepage.php";
                        
                        echo json_encode($retorno);
                    }
                    else{
                        $retorno = ["msg" =>"Erro ao atualizar dados do usuário!!", "erro"=>"1"];
                        echo json_encode($retorno);
                    }
                
            }

    }
}
    $controller = new registro_controller();
    $controller->execute($_POST, $_GET);

?>