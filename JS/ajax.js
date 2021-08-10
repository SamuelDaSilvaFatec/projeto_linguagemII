// Faz a conexão Ajax
var ajax;

// Cria o objeto XMLHttpRequest
function requisicaoHTTP(tipo,url,assinc) {
	if(window.XMLHttpRequest ){	  
		ajax = new XMLHttpRequest();
	} 
	else if (window.ActiveXObject) {
		ajax = new ActiveXObject("Msxml2.XMLHTTP");

		if (!ajax) {
			ajax = new ActiveXObject("Microsoft.XMLHTTP");
		}
    }      
    
	if(ajax)	
		iniciaRequisicao(tipo,url,assinc);
	else
		alert("Seu navegador não possui suporte a essa aplicação!");
}

// Inicializa o objeto criado e envio dos dados 
function iniciaRequisicao(tipo, url, bool) {
	ajax.onreadystatechange = trataResposta;
	ajax.open(tipo,url,bool);
	ajax.send();
}

// Trata a resposta do servidor 
function trataResposta() {
	if(ajax.readyState == 4) {
		if(ajax.status == 200) {
			console.log("OK");  
		} else {
			alert("Problema na comunicação com o objeto XMLHttpRequest.");
		}
	}
}

function adicionaCarrinho(_id) {
    document.getElementById("num_prod").firstChild.nodeValue++;
    document.getElementById("row"+_id).firstChild.nodeValue++;
    requisicaoHTTP("GET","carrinho.php?op=1&_id="+_id, true);
}

function retiraCarrinho(_id) {
    var carrinho = document.getElementById("num_prod").firstChild;
    var produto = document.getElementById("row"+_id).firstChild;

    if (produto.nodeValue > 0) {
        carrinho.nodeValue--;
        produto.nodeValue--;
        requisicaoHTTP("GET","carrinho.php?op=2&_id="+_id, true);
    }
}
