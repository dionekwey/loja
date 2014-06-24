<?php
    session_start(); 
    $nome = isset($_SESSION['nome'])? $_SESSION['nome']:'';
    $senha = isset($_SESSION['senha'])? $_SESSION['senha']:'';
    $logado=false;

    if ($nome!='' && $senha!='')
        $logado=true; 
 
    function escreve($logado, $nome){
        if ($logado)
            echo "<div class='bemvindo'>Bem-vindo, ".ucfirst($nome)."</div>";
    }
    
    function alteraBotaoLogin($logado){
        if ($logado)
            echo "<div id=\"btLogin\" class=\"botaoMenu\" onclick=\"javascript:window.location.href='logout.php'\">LOGOUT</div>";
        else
            echo "<div id=\"btLogin\" class=\"botaoMenu\" onclick=\"mostrarLogin()\">LOGIN</div>";
    }
?>
