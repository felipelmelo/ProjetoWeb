$("#bt_cadstrar").click(function(){
	
	if($('#strFone').val() != ''){	
		$.post(
				urlTrataCadastrar,
				{strTelefone : $('#strFone').val()}
				,function(retorno){
					if(retorno.st == 'ok'){
						window.location.href = BASE_URL+'/oscar/';
					}else if(retorno.st == 'red'){
						window.location.href = BASE_URL+'/resultado/';
					}else{
						jAlert(retorno.msg, 'Alerta');
					}
				},"json"
			);
	}else{
		jAlert('Informe seu telefone', 'Alerta');
	}

	return false;
});

$('#bt_voltar').click(function(){

	$.post(urlTrataSesao,
			function(retorno){
				window.location.href = BASE_URL;
			},'json'
			)
	
	return false;
});