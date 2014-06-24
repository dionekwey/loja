<?php
$nome = isset($_POST['nome'])? $_POST['nome']:'';
$senha = isset($_POST['senha'])? $_POST['senha']:'';
if ($nome=='') { 
 $mensagem="<p class=\"msgErro\">Senha invalida!<br>Tente Novamente...</p><script>atraso()</script>";
}
    $file='clientes.txt';
    $arqCli = @fopen($file, "r+") or die("Could not open $file in READ+WRITE mode");;
    while(!feof($arqCli)){
        $linha = fgets($arqCli);
        $reg = explode(";",$linha);
        if ($nome == $reg[0] && $nome!=""){
            if ($senha == $reg[1]){
                session_start(); 
                $_SESSION['nome']=$nome;
                $_SESSION['senha']=$senha;
                $n = ucfirst($nome);
                $mensagem = "<p class=\"msgOk\">Bem Vindo, '$n'!<br><br>Aguarde...</p><script>atraso()</script>";
            }
            else{
                $mensagem="<p class=\"msgErro\">Senha invalida!<br>Tente Novamente...</p><script>atraso()</script>";
            }
        }
    }
    @fclose($arqCli);
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
