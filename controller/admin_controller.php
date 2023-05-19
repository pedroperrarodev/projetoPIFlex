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
                            $retorno = ["msg" =>"Adminstrador cadastrado com sucesso!", "erro"=>"0", "url" => "homepage_admin.php"];
                            echo json_encode($retorno);
                        }
                    }
                    else{
                        $retorno = ["msg" =>"Erro ao cadastrar o adminstrador!", "erro"=>"1"];
                        echo json_encode($retorno);                    }
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
                    echo "Posto de saúde cadastrado com sucesso!";
                }

            }
            
        }
    

}

    $controller = new admin_controller();
    $controller->execute($_POST, $_GET);

?>