$('#compartilharFace').click(function(){	
	FB.login(function(response) {
			if (response.authResponse) {
				FB.api('/me/albums', 'post',
						{
							name: 'Boão Oscar',
							message: 'Veja meus palpites para o Oscar 2014'
						},
						function(response) {
							console.log(response);
							FB.api('/'+response.id+'/photos', 'post',
									{
										message:"",
										url:fotoFinal
									},
									function(response){
										if (!response || response.error) {
											console.log(response.error);
										}
									});
						}); 
			}		
		}, {scope: 'publish_actions,publish_stream,read_stream,share_item' });
	
});

$('#compartilharTwitter').click(function(){
	window.location.href = BASE_URL+"/compartilhar/";
	//alert('Compartilhar no twitter');
});