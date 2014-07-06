<meta charset="UTF-8">
<?php
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    
    if ($nome=='') 
        echo "<p class='msgErro'>Campo de Usuario Vazio!<br>Tente Novamente...</p><script>atraso()</script>";
    else{
        $usuarios = simplexml_load_file("usuarios.xml");
        foreach ($usuarios as $x){
            if ($nome == $x->nome && $nome!=""){
                if ($senha == $x->senha){
                    session_start(); 
                    $_SESSION['nome']=$nome;
                    $_SESSION['senha']=$senha;
                    die('ok');
                }
            }
        }
    }
?>
<link rel="stylesheet" href="estilos.css">
<script type="text/javascript">
    function atraso(){
        setTimeout("window.location='index.php'",3000);
    }
</script>