 <?php
    $nome = isset($_POST['nome'])? $_POST['nome']:'';
    $senha = isset($_POST['senha'])? $_POST['senha']:'';

    $xmlfile='usuarios.xml';

    if (file_exists($xmlfile)) {
        $usuario = @simplexml_load_file($xmlfile);
        
        $nc = $usuario->addChild("usuario");
        $nc->addChild("nome","$nome");
        $nc->addChild("senha","$senha");
    }
    else{
$xml = <<<EOF
    <usuarios>\n<senhas><nome></nome><senha></senha></senhas>\n</usuarios>
EOF;
        $usuario = simplexml_load_string($xml);
        $usuario->senhas[0]->nome="$nome";
        $usuario->senhas[0]->senha="$senha";
    }

    file_put_contents("usuarios.xml",$usuario->asXML());
    
    die('ok');
?>