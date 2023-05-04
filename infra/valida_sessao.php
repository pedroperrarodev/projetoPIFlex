<?php

    function valida_sessao(){

        session_start();
        if(empty($_SESSION['logado'])){
            header("location: tela_login.php");
        }
        
    }

    valida_sessao();
   

?>
