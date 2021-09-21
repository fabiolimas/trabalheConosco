
function submit(){
    setTimeout(() => {
        window.location.href = "index.php";
    }, 2000);
}

function checaAnexo(){
    var anexo=document.querySelector("#anexar");


    if(anexo.value == ''){
        alert('Por favor, anexe o seu curriculo.');
             
        exit();
    }
}

function submitVaga(){
    setTimeout(() => {
        window.location.href = "manutencaoVagas.php";
    }, 2000);
}

function checaAnexo(){
    var anexo=document.querySelector("#anexar");


    if(anexo.value == ''){
        alert('Por favor, anexe o seu curriculo.');
             
        exit();
    }
}

$(function(){
	//Pesquisar os cursos sem refresh na página
	$("#vaga").keyup(function(){
		
		
		var pesquisa = $(this).val();
		
		//Verificar se há algo digitado
		if(pesquisa != null){
			
			var dados = {
				palavra : pesquisa
				
			}		
			$.post('model/Busca.php', dados, function(retorna){
				//Mostra dentro da ul os resultado obtidos 
				$(".resultado").html(retorna);
			});
		}else{
			$(".resultado").html(palavra);
		}		
	});
});