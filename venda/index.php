<?php
include('seguro.php');
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Venda</title>
        <link rel="stylesheet" href="estilos.css">
        <script type="text/javascript" src=scripts.js>
        </script>
    </head>
    <body onload="mudaBanner();preencheItens('todas');">
        
        <!-- Tela de login em poup up -->
        <div class="fundoPoupUp" id="poupUp">
            <div class="poupUpLogin" id="telaLogin">
                <div class="btFecharPoupUp" onclick="fecharLogin()">X</div>
                <!-- Fomulario de Login -->
                <div id="formLogin">
                    <form action="login.php" method="POST"> 
                        LOGIN<br><br>
                        Nome: <input type="text" name="nome" value="" /><br>
                        Senha: <input type="password" name="senha" value="" /><br><br>
                        <input type="submit" value="Login"><br><br>
                        <a href="#" onclick="mostrarCadastro()">Faça seu cadastro</a>
                    </form>
                </div>
                
                <!-- Fomulario de Cadastro -->
                <div id="formCadastro">
                    <form action="cadastroUsuario.php" method="POST"> 
                        CADASTRO<br><br>
                        Nome: <input type="text" name="nome" value="" /><br>
                        Senha: <input type="password" name="senha" value="" /><br><br>
                        <input type="submit" value="Cadastrar"><br><br>
                        <a href="#" onclick="mostrarLogin()">Fazer Login!</a>
                    </form> 
                </div>
            </div>

        </div>
        
        <!-- Corpo da pagina -->
        <div id="corpo" class="corpo">
               <?php
                if ($logado)
                   echo "<div align=right class=bemvindo>Bem Vindo $nome</div>";
               ?>


            <div id="menu" class="menu">
               <!-- menu -->
               <div id="btHome" class="botaoMenu" onclick="location.href='index.php'">HOME</div>
               <div id="btCategorias" class="botaoMenu">
                   <div class="botaoMenu">CATEGORIAS</div>
                   <div class="botaoMenu" onclick="preencheItens('eletrodomesticos')">ELETRODOMESTICOS</div>
                   <div class="botaoMenu" onclick="preencheItens('informatica')">INFORMÁTICA</div>
                   <div class="botaoMenu" onclick="preencheItens('moveis')">MÓVEIS</div>
               </div>
               <div id="btCarrinho" class="botaoMenu">CARRINHO</div>
              <?php 
               if ($logado)
                 echo "<div id=\"btLogin\" class=\"botaoMenu\" onclick=\"javascript:window.location.href='logout.php'\">LOGOUT</div>";
               else
                 echo "<div id=\"btLogin\" class=\"botaoMenu\" onclick=\"mostrarLogin()\">LOGIN</div>";
               ?>            
            </div>
            
            <!-- banner -->
            <div id="banner" class="banner"></div>
            
            <!-- lista de itens -->
            <div id="listaItens" class="listaItens"></div>
        </div>
    </body>
</html>
