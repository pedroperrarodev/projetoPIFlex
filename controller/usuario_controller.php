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

                        if($usuario->cadastrar() == true){
                            $retorno = ["msg"=> "Usuário cadastrado com sucesso", "erro"=>"0", "url"=>"tela_login.php"];
                            echo json_encode($retorno);
                        }
                        else{
                            $retorno = ["msg"=> "Erro ao cadastrar o usuário!", "erro"=>"1"];
                            echo json_encode($retorno);
                        }
                    }
                }
                if ($acao == "atualizar"){

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

                    $usuario->__set("perfil", 2);
    
                    $senha = $post["senha"];
                    $confirmar_senha = $post["confirmar_senha"];

                    if ($senha == $confirmar_senha){
                        $senha_hash = hash("sha3-256", $senha);
                        $usuario->__set("senha", $senha_hash);

                        if($usuario->atualizar() == true){
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
                }

                else if($acao == "logar"){
                    $cpf = $post["cpf"];
                    $senha = $post["senha"];

                    $usuario = new usuario();
                    $dados = $usuario->autenticar($cpf, $senha);

                    if($dados != null){
                        session_start();
                        $_SESSION["logado"] = true;
                        $_SESSION["cpf"] = $cpf ;

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
                else if ($acao == "listar"){
                    $usuario = new Usuario();
                    $dados = $usuario->listarUsuarios();
    
                    
                   /*  require_once("../view/usuario/tela_profile_usuario.php"); */
                }
    
                else if($acao == "editar"){
                    $id = $get["id"];
                    $usuario = new Usuario();
                    $dados = $usuario->buscarPorId($id);
    
                    
                    require_once("../view/usuario/tela_config_usuario.php");
                } 
    }

    private function listarUsuarios(){
        $usuario = new Usuario();
        $dados = $usuario->listarTodos();

        require_once("../view/usuario/listar_usuario.php");
    }

}
    $controller = new usuario_controller();
    $controller->execute($_POST, $_GET);

    
?>