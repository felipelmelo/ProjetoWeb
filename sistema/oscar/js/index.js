$(".opcoes-oscar").click(function(){
	var idDiv = $(this).attr('id');	
	jConfirm('Deseja confirmar o voto ?', 'Alerta');	
	$('#popup_ok').click(function(){
		$.post(urlTrataVotacao,
			{
				info: idDiv
			},
			function(retorno){
				
				if(retorno.contador == 10){
					window.location.href = BASE_URL+'/resultado/';
				}else if(retorno.status == "ok"){								
					$('#'+idDiv).parent().html('<h3 style="text-align:center;">'+retorno.msg+'</h3>');
				}else{					
					$('#'+idDiv).parent().html('<h3 style="text-align:center;">VOCÊ JÁ VOTOU NESTA CATEGORIA!</h3>');
				}
				$('.jcarousel-control-next').click();
			},'json'
			);
	});
});




