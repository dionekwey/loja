<link rel="stylesheet" href="estilos.css">
<script type="text/javascript">
    function atraso(){
        setTimeout("window.location='index.php'",3000);
    }
</script>
<?php
    $nomeCli=$_POST['nome'];
    $senhaCli=$_POST['senha'];
    
    $arqCli = @fopen('clientes.txt','a+');
    $x = 0;
    while(!feof($arqCli)){
        $linha = fgets($arqCli);
        $reg = explode(";",$linha);
        if ($nomeCli == $reg[0]){
            $x++;
            echo '<p class="msgErro"><b>Usuario ja existe!</b><br>Tente outro usuario...</p>';
            echo '<script>atraso()</script>';
            exit();
        }
        else if ($nomeCli=="" || $senhaCli==""){
            $x++;
            echo '<p class="msgErro"><b>Favor preencher campos obrigatorios!</b><br>Usuario ou senha em branco...</p>';
            echo '<script>atraso()</script>';
            exit();
        }
    }
            
    if ($x == 0){
        fprintf($arqCli, "%s", utf8_encode($nomeCli).";".$senhaCli.";\n");
        
        /* ---------------------------------------
        Aqui ficará os Cookies e Sessões
        ex: setcookie('usuario', $nomeCli, time()+60);
        ---------------------------------------- */

        echo '<p class="msgOk"><b>Cadastro Realizado com sucesso!<b><br><br>';
        echo 'Aguarde...</p>';
        echo '<script>atraso()</script>';
        exit();
    }
    fclose($arqCli);
?>
