<?php
    require_once ("../model/usuario.php");
    class usuario_controller{
        public function execute($post, $get){
            $acao = $get['acao'];
                if ($acao == "cadastrar"){
                    $usuario = new usuario();

                    $nome_completo = $post["nome_completo"];
                    $usuario->__set("nome_completo", $nome_completo);
    
                    $cpf = $post["cpf"];
                    $usuario->__set("cpf", $cpf);

                    $rua = $post["rua"];
                    $usuario->__set("rua", $rua);

                    $bairro = $post["bairro"];
                    $usuario->__set("bairro", $bairro);
    
                    $cidade = $post["cidade"];
                    $usuario->__set("cidade", $cidade);

                    $numero = $post["numero"];
                    $usuario->__set("numero", $numero);

                    $num_telefone = $post["num_telefone"];
                    $usuario->__set("num_telefone", $num_telefone);

                    $email = $post["email"];
                    $usuario->__set("email", $email);

                    $usuario->__set("perfil", 2);
    
                    $senha = $post["senha"];
                    $confirmar_senha = $post["confirmar_senha"];

                    if ($senha == $confirmar_senha){
                        $senha_hash = hash("sha3-256", $senha);
                        $usuario->__set("senha", $senha_hash);

                        if($usuario->cadastrar_usuario() == true){
                            $retorno = ["msg"=> "Usuário cadastrado com sucesso", "erro"=>"0", "url"=>"tela_login2.php"];
                            echo json_encode($retorno);
                        }
                        else{
                            $retorno = ["msg"=> "Erro ao cadastrar o usuário!", "erro"=>"1"];
                            echo json_encode($retorno);
                        }
                    }
                }
                else if($acao == "listarUsuario"){
                    $id = $get["id"];
                    $usuario = new usuario();
                    $dados = $usuario->listarUsuario($id);

                    require_once("../view/usuario/tela_consulta_info_usuario.php");  
                }
                else if($acao == "editar_usuario"){
                    $id = $get["id"];
                    $usuario = new usuario();
                    $dados = $usuario->buscarUsuarioPorId($id);
                    
                    require_once("../view/usuario/edita_usuario.php");  
                }
                else if ($acao == "atualizar_usuario"){

                    $usuario = new usuario();

                    $id = $post["id"];
                    $usuario->__set("id", $id);
    
                    $nome_completo = $post["nome_completo"];
                    $usuario->__set("nome_completo", $nome_completo);
    
                    $cpf = $post["cpf"];
                    $usuario->__set("cpf", $cpf);

                    $rua = $post["rua"];
                    $usuario->__set("rua", $rua);

                    $bairro = $post["bairro"];
                    $usuario->__set("bairro", $bairro);
    
                    $cidade = $post["cidade"];
                    $usuario->__set("cidade", $cidade);

                    $numero = $post["numero"];
                    $usuario->__set("numero", $numero);

                    $num_telefone = $post["num_telefone"];
                    $usuario->__set("num_telefone", $num_telefone);

                    $email = $post["email"];
                    $usuario->__set("email", $email);

                    $perfil = $post["perfil"];
                    $usuario->__set("perfil", $perfil);

                        if($usuario->atualizar_perfil_usuario() == true){
                            $retorno["msg"] = "Dados de usuário atualizado com sucesso!";
                            $retorno["erro"] = "0";
                            $retorno["url"] = "../view/usuario/homepage.php";
                            
                            echo json_encode($retorno);
                        }
                        else{
                            $retorno = ["msg" =>"Erro ao atualizar dados do usuário!!", "erro"=>"1"];
                            echo json_encode($retorno);
                        }
                    
                }



                /* AQUI */




                else if($acao == "logar"){
                    $cpf = $post["cpf"];
                    $senha = $post["senha"];

                    $usuario = new usuario();
                    $dados = $usuario->autenticar($cpf, $senha);

                    if($dados != null){
                        session_start();

                        $_SESSION["logado"] = true;
                        $_SESSION["cpf"] = $dados[0]["cpf"];
                        $_SESSION["id"] = $dados[0]["id"];

                        if($dados[0]["perfil"] == 2){
                            $retorno = ["msg"=> "Usuário logado com sucesso", "erro"=>"0", "url"=>"usuario/homepage.php"];
                            echo json_encode($retorno);
                        }
                        else if($dados[0]["perfil"] == 1){
                            $retorno = ["msg"=> "Administrador logado com sucesso", "erro"=>"0", "url"=>"admin/homepage_admin.php"];
                            echo json_encode($retorno);
                        }
                    }
                    else{
                        $retorno = ["msg"=> "Usuario invalido", "erro"=>"1", "url"=>""];
                        echo json_encode($retorno);

                    }
                }
                else if($acao == "logout"){
                    session_start();
                    unset($_SESSION);
                    session_destroy();
                    header("location:../view/tela_login.php");
                } 
    }

    private function listarUsuario(){
        $usuario = new usuario();
        $dados = $usuario->listarUsuario($_SESSION["id"]);

        require_once("../view/usuario/tela_consulta_info_usuario.php");
    }

}
    $controller = new usuario_controller();
    $controller->execute($_POST, $_GET);   
?>