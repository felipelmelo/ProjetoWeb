function getDados() {
	FB.api("/me", function(response) {
		retorna_dados(response.name,response.id); 
	});
}

function connFacebook(){
	FB.login();
	
}

$("#logarFacebook").click(function(){
	connFacebook();
});


function retorna_dados(nome, id){
	$.post(
		urlTrataDados,
		{nome: nome, id: id, tipo: 'Facebook'},
		function(retorno){
			if(retorno == "ok"){
				window.location = BASE_URL+'/confirmacao';		
			}
		},"json"
	);
}


$('#bt_prosseguir').click(function(){
	var usrName = $('#strNome').val();
	var usrEmail = $('#strEmail').val();
	
	if(usrName == ''){
		jAlert('Informe seu nome!', 'Alerta');
	}else if(usrEmail == ''){
		jAlert('Informe seu e-mail!', 'Alerta');
	}else{
		$.post(urlTrataDados,
				{ id : usrEmail, nome :usrName, tipo: 'email' }
				,function(retorno){
					if(retorno == "ok"){
						window.location = BASE_URL+'/confirmacao';		
					}
				},'json'
				)
	}
	return false;
});