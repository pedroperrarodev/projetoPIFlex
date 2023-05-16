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
                else if($acao == "logar"){
                    $cpf = $post["cpf"];
                    $senha = $post["senha"];
                    $nome_completo = $post["nome__completo"];

                    $usuario = new usuario();
                    $dados = $usuario->autenticar($cpf, $senha);
                    if($dados != null){
                        session_start();
                        $_SESSION[] = ;

                        if($dados[0]["perfil"] == 1){
                            $retorno = ["msg"=> "Usuário logado com sucesso", "erro"=>"0", "url"=>"tela_login.php"];
                            echo "ADMIN";
                        }
                        else if($dados[0]["perfil"] == 2){
                            echo "OUTRO PERFIL";
                        }
                        //$retorno = ["msg"=> "Usuário logado com sucesso", "erro"=>"0", "url"=>"tela_login.php"];
                        echo json_encode($retorno);
                    }

                                      
                    
                }
    }

}

    $controller = new usuario_controller();
    $controller->execute($_POST, $_GET);

?>