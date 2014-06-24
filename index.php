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
    <body onload="preencheItens('todas');">
        
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
            <?php escreve($logado, $nome);?>
            
            <!-- menu -->
            <div id="menu" class="menu">
               <div id="btHome" class="botaoMenu" onclick="location.href='index.php'">HOME</div>
               <div id="btCategorias" class="botaoMenu">
                   <div class="botaoMenu">CATEGORIAS</div>
                   <div class="botaoMenu" onclick="preencheItens('eletrodomesticos')">ELETRODOMESTICOS</div>
                   <div class="botaoMenu" onclick="preencheItens('informatica')">INFORMÁTICA</div>
                   <div class="botaoMenu" onclick="preencheItens('moveis')">MÓVEIS</div>
               </div>
               <div id="btCarrinho" class="botaoMenu">CARRINHO</div>
                <?php alteraBotaoLogin($logado); ?>            
            </div>
            
            <!-- banner -->
            <div id="banner" class="banner"></div>
                      
            <!-- lista de itens -->
            <div id="listaItens" class="listaItens">
                
                <!-- ofertas -->
                <div id="ofertas" class="ofertas"></div>                
            </div>
        </div>
    </body>
</html>
