<meta charset="UTF-8">
<?php
    session_start(); 
    $nome = isset($_SESSION['nome'])? $_SESSION['nome']:'';
    $senha = isset($_SESSION['senha'])? $_SESSION['senha']:'';

    $mensagem = "<p class=\"msgOk\">Fechando a Sessão!<br><br>Aguarde...</p><script>atraso()</script>";

    if ($nome!=''){
        unset($_SESSION['nome']);
        unset($_SESSION['senha']);
        $logado=false;
    }
?>

<link rel="stylesheet" href="estilos.css">
<script type="text/javascript">
    function atraso(){
        setTimeout("window.location='index.php'",3000);
    }
</script>
<?php
    echo $mensagem;
?>