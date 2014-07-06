<html>
    <head>
        <meta charset="UTF-8">
        <title>Venda</title>
        <link rel="stylesheet" href="estilos.css">
        <script type="text/javascript" src=scripts.js>
        </script>
        <?php
            include('seguro.php');
        ?>
    </head>
    <body onload="preencheItens('todas');mudaOfertas();">
        
        <!-- Tela de login em poup up -->
        <div class="fundoPoupUp" id="poupUp">
            <div class="poupUpLogin" id="telaLogin">
                <div class="btFecharPoupUp" onclick="fecharLogin()">X</div>
                
                <!-- Fomulario de Login -->
                <div id="formLogin">
                    LOGIN<br><br>
                    Nome: <input type="text" id="nome" value="" /><br>
                    Senha: <input type="password" id="senha" value="" /><br>
                    <span id='msgErro'></span><br>
                    <input type="button" value="Login" onclick="submeter('login')"><br><br>
                    <a href="#" onclick="mostrarCadastro()">Faça seu cadastro</a>
                </div>
                
                <!-- Fomulario de Cadastro -->
                <div id="formCadastro">
                    CADASTRO<br><br>
                    Nome: <input type="text" id="cadNome" value="" /><br>
                    Senha: <input type="password" id="cadSenha" value="" /><br><br>
                    <input type="button" value="Cadastrar" onclick="submeter('cadastro')"><br><br>
                    <a href="#" onclick="mostrarLogin()">Fazer Login!</a>
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
                <div id="btCarrinho" class="botaoMenu" onclick="preencheItens('carrinho')">CARRINHO</div>
                <?php alteraBotaoLogin($logado); ?>
            </div>
            
            <!-- banner -->
            <div id="banner" class="banner"></div>
                      
            <!-- lista de itens -->
            <div id="listaItens" class="listaItens"></div>
        </div>
    </body>
</html>
