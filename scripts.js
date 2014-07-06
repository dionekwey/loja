var i = -1;
var itens = [
    ['Fogao','eletrodomesticos','900','Fogão 5 Bocas Facilite com Timer CF676ARUNA Inox Bivolt','img/eletrodomesticos/fogao3',1],
    ['Refrigerador','eletrodomesticos','6500','Geladeira Electrolux Frost Free Side by Side 656 Litros Inox','img/eletrodomesticos/geladeira3',1],
    ['Maquina de Lavar','eletrodomesticos','2600','Lava e Seca LG 10kg 6 Motion Aço Escovado','img/eletrodomesticos/maquina1',1],
    ['Multifuncional','informatica','700','HP Laserjet Pro M1132 Laser Monocromática Copia Digitaliza 600 dpi Monitor de LED numérico 110V','img/informatica/impressora',2],
    ['IPad','informatica','2000','Tela de Retina 9,7 polegadas iOS7 Memória de 16GB Processador A7 Wi-Fi Câmera HD de 5MP Prateado','img/informatica/ipad',2],
    ['Roteador','informatica','70','Roteador Dexcom Wireless RTWL30F1 300Mbps 4 portas 2 antenas','img/informatica/modem',2],
    ['Cabeceira Box','moveis','270','Cabeceira Simbal Chevalier Branco com Preto Compatível com Colchão de 138 cm','img/moveis/cabeceira',3],
    ['Cama','moveis','260','Cama de Casal Neville Branca com Preto','img/moveis/cama',3],
    ['Guarda-Roupas','moveis','400','Guarda Roupa Búzios 4 Portas 2 Gavetas Branco e Preto','img/moveis/guardaroupa',3]
];

function submeter(funcao){
    var xmlhttp = null;
    // code for IE7+, Firefox, Chrome, Opera, Safari
    if (window.XMLHttpRequest)
        xmlhttp = new XMLHttpRequest();
    // code for IE6, IE5
    else
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

    xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState===4 && xmlhttp.status===200){
            if ((xmlhttp.responseText).search('ok')>0)
                fecharLogin();
            else
                document.getElementById('msgErro').innerHTML = "<font color=red>Usuario ou senha incorretos!</font>";
        }
    };
    
    var url, nome, senha, dados;
    
    if (funcao === "login"){
        url = "login.php";
        nome = document.getElementById("nome").value;
        senha = document.getElementById("senha").value;
    }
    else if (funcao === "cadastro"){
        url = "cadastroUsuario.php";
        nome = document.getElementById("cadNome").value;
        senha = document.getElementById("cadSenha").value;
    }
    
    dados = "nome="+nome+"&senha="+senha;
    
    xmlhttp.open("POST", url, true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send(dados);
}

function OpenPopupCenter(pageURL, title, w, h) {
    var left = (screen.width - w) / 2;
    var top = (screen.height - h) / 4;  // for 25% - devide by 4  |  for 33% - devide by 3
    var targetWin = window.open(pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
}

function mostrarLogin(){
    document.getElementById("formLogin").style.display = "block";
    document.getElementById("formCadastro").style.display = "none";
    document.getElementById("poupUp").style.display = "block";
}

function mostrarCadastro(){
    document.getElementById("formLogin").style.display = "none";
    document.getElementById("formCadastro").style.display = "block";
}

function fecharLogin(){
    document.getElementById("poupUp").style.display = "none";
    window.location='index.php';
}

function preencheItens(catItem){
    var texto = "<div id='ofertas' class='ofertas'></div>";
    if (catItem == "todas"){
        for (x=0;x<9;x++){
            texto = texto + "<div id='"+itens[x][0]+"' class='itemLista'>";
            src=itens[x][4];
            cat=itens[x][5];
            texto = texto + "<img src="+itens[x][4]+"p.jpg alt=item onclick=OpenPopupCenter(\'detalhes.php?img="+src+"g.jpg&cat="+cat+"\',\'DETALHE\',800,600)>";
            texto = texto + "<p class='p1'>"+itens[x][0]+"</p>"+itens[x][3]+"<p class='p2'>R$ "+itens[x][2]+",00</p>";
            texto = texto + "<input type='button' value='comprar' name='"+itens[x][0]+"' onclick='comprar(this.name)'></div>";
        }
    }
    else if(catItem == "carrinho"){
        for (x=0;x<9;x++){
            texto = texto + "<div id='"+itens[x][0]+"' class='itemLista'>";
            src=itens[x][4];
            cat=itens[x][5];

            texto = texto + "<img src="+itens[x][4]+"p.jpg alt=item onclick=OpenPopupCenter(\'detalhes.php?img="+src+"g.jpg&cat="+cat+"\',\'DETALHE\',800,600)>";
            texto = texto + "<p class='p1'>"+itens[x][0]+"</p>"+itens[x][3]+"<p class='p2'>R$ "+itens[x][2]+",00</p></div>";
        }        
    }
    else{
        for (x=0;x<9;x++){
            if (catItem == itens[x][1]){
                texto = texto + "<div id='"+itens[x][0]+"' class='itemLista'>";
                src=itens[x][4];
                cat=itens[x][5];
                
                texto = texto + "<img src="+itens[x][4]+"p.jpg alt=item onclick=OpenPopupCenter(\'detalhes.php?img="+src+"g.jpg&cat="+cat+"\',\'DETALHE\',800,600)>";
                texto = texto + "<p class='p1'>"+itens[x][0]+"</p>"+itens[x][3]+"<p class='p2'>R$ "+itens[x][2]+",00</p>";
                texto = texto + "<input type='button' value='comprar' name='"+itens[x][0]+"' onclick='comprar(this.name)'></div>";
            }
        }        
    }
    
    document.getElementById("listaItens").innerHTML = texto;
}

function mudaOfertas(){    
    i = parseInt(Math.random()*9);
    cat_cookie = categoria();
    cat_produto = itens[i][5];
    
    //if (cat_cookie == cat_produto || cat_cookie=='') {
        document.getElementById("ofertas").style.setProperty("background-image", "url('"+itens[i][4]+"p.jpg')");
        document.getElementById("ofertas").innerHTML = "<div class='ofertasTexto'><h3>"+itens[i][0]+"</h3><h5>"+itens[i][3]+"</h5><h3>R$ "+itens[i][2]+",00</h3></div>";
    //}
    setTimeout("mudaOfertas()", 3000);   
}

function comprar(nomeItem){
    alert (nomeItem);
}

function getCookie(cname){
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++){
        var c = ca[i].trim();
        if (c.indexOf(name)==0) 
          return c.substring(name.length,c.length);
    }
    return "";
}

function categoria(){
   return getCookie("cat");
}