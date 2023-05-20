<?php

    require_once ("../model/admin.php");

    class admin_controller{

        public function execute($post, $get){
            $acao = $get['acao'];
                if ($acao == "cadastrar_admin"){
                    $admin = new admin();
    
                    $nome_completo = $post["nome_completo"];
                    $admin->__set("nome_completo", $nome_completo);
    
                    $cpf = $post["cpf"];
                    $admin->__set("cpf", $cpf);

                    $rua = $post["rua"];
                    $admin->__set("rua", $rua);

                    $bairro = $post["bairro"];
                    $admin->__set("bairro", $bairro);
    
                    $cidade = $post["cidade"];
                    $admin->__set("cidade", $cidade);

                    $numero = $post["numero"];
                    $admin->__set("numero", $numero);

                    $num_telefone = $post["num_telefone"];
                    $admin->__set("num_telefone", $num_telefone);

                    $email = $post["email"];
                    $admin->__set("email", $email);

                    $admin->__set("perfil", 1);
    
                    $senha = $post["senha"];
                    $confirmar_senha = $post["confirmar_senha"];

                    
                    if ($senha == $confirmar_senha){
                        $senha_hash = hash("sha3-256", $senha);
                        $admin->__set("senha", $senha_hash);

                        if($admin->cadastrar_admin() == true){
                            $retorno = ["msg" =>"Adminstrador cadastrado com sucesso!", "erro"=>"0", "url" => "../../controller/admin_controller.php?acao=listarAdminstradores"];
                            echo json_encode($retorno);
                        }
                    }
                    else{
                        $retorno = ["msg" =>"Erro ao cadastrar o adminstrador!", "erro"=>"1"];
                        echo json_encode($retorno);                    }
            }

            else if($acao == "listarAdminstradores"){
                $this->listarAdminstradores();
            }

            else if($acao == "cadastrar_posto"){

                $admin = new admin();

                $razao_social = $post["razao_social"];
                $admin->__set("razao_social",$razao_social);

                $cnpj = $post["cnpj"];
                $admin->__set("cnpj",$cnpj);

                $rua = $post["rua"];
                $admin->__set("rua", $rua);

                $bairro = $post["bairro"];
                $admin->__set("bairro", $bairro);
    
                $cidade = $post["cidade"];
                $admin->__set("cidade", $cidade);

                $numero = $post["numero"];
                $admin->__set("numero", $numero);

                $num_telefone = $post["num_telefone"];
                $admin->__set("num_telefone", $num_telefone);

                $email = $post["email"];
                $admin->__set("email", $email);

                if($admin->cadastrar_posto() == true){
                    $retorno = ["msg" =>"Posto cadastrado com sucesso!", "erro"=>"0", "url" => "../../controller/admin_controller.php?acao=listarPostos"];
                    echo json_encode($retorno);
                }
                else{
                    $retorno = ["msg" =>"Erro ao cadastrar o posto!", "erro"=>"1"];
                    echo json_encode($retorno);                    
                }

            }
            else if($acao == "listarPostos"){
                $this->listarPostos();
            }

            else if($acao == "cadastrar_vacina"){

                $admin = new admin();

                $nome_vacina = $post["nome_vacina"];
                $admin->__set("nome_vacina",$nome_vacina);

                $fabricante = $post["fabricante"];
                $admin->__set("fabricante",$fabricante);

                $doenca_alvo = $post["doenca_alvo"];
                $admin->__set("doenca_alvo", $doenca_alvo);

                if($admin->cadastrar_vacina() == true){
                    $retorno = ["msg" =>"Vacina cadastrada com sucesso!", "erro"=>"0", "url" => "../../controller/admin_controller.php?acao=listarVacina"];
                    echo json_encode($retorno);
                }
                else{
                    $retorno = ["msg" =>"Erro ao cadastrar a !Vacina", "erro"=>"1"];
                    echo json_encode($retorno);                    
                }

            }
            else if($acao == "listarVacina"){
                $this->listarVacinas();
            }
            else if($acao == "deletar_vacina"){
                $id = $get["id"];
                $admin = new admin();
                $dados = $admin->deletar_vacina($id);
                
                $this->listarVacinas();
            }
        }

        private function listarPostos(){
            $admin = new admin();
            $dados = $admin->listarTodosPostos();

            require_once("../view/admin/tela_consulta_postos_saude.php");
        }

        private function listarAdminstradores(){
            $admin = new admin();
            $dados = $admin->listarTodosAdministradores();

            require_once("../view/admin/tela_consulta_adminstradores.php");
        }

        private function listarVacinas(){
            $admin = new admin();
            $dados = $admin->listarTodasVacinas();

            require_once("../view/admin/tela_consulta_vacina.php");
        }
}

    $controller = new admin_controller();
    $controller->execute($_POST, $_GET);

?>