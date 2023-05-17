<?php

    function valida_sessao(){
        if(session_id() == ''){
            session_start();
            if(empty($_SESSION["logado"])){
                header("location:/index.php");
            }
        }
        else{
            echo "Sessão não iniciada";
        }
    }

    valida_sessao();
?>
