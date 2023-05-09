<?php

    require_once ("../model/usuario.php");

    class usuario_controller{

        public function execute($post, $get){
            $acao = $get['acao'];

            echo "antes do banco";
            
            if($acao == "cadastrar"){
                $usuario = new usuario();

                if ($acao == "cadastrar"){
                    $usuario = new Usuario();
    
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

    
                    $senha = $post["senha"];
                    $confirmar_senha = $post["conf_senha"];
                    
                    if ($senha == $confirmar_senha){
                        $senha_hash = hash("sha3-256", $senha);
                        $usuario->__set("senha", $senha_hash);

                        
                       
                        if($usuario->cadastrar() == true){
                            echo "Usuario Cadastrado com Sucesso!";
                        }
                    }
                    else{
                        //enviar msg de erro
                    }
            }
            
        }
    }

}

    $controller = new usuario_controller();
    $controller->execute($_POST, $_GET);

?>