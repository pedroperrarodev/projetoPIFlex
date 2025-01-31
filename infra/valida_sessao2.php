<?php
    function valida_sessao(){
        if(!isset($_SESSION)) {
            session_start();
        }
        if(!isset($_SESSION['id'])) {
            die("Você não pode acessar esta página porque não está logado.<p><a href=\"../tela_login2.php\">Entrar</a></p>");
        }
    }


    valida_sessao();
?>
