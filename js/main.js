		(function($) {
		    $(function() {
		        /*
		        Carousel initialization
		        */
		        $('.jcarousel')
		            .jcarousel({
		                // Options go here
		            });

		        /*
		         Prev control initialization
		         */
		        $('.jcarousel-control-prev')
		            .on('jcarouselcontrol:active', function() {
		                $(this).removeClass('inactive');
		            })
		            .on('jcarouselcontrol:inactive', function() {
		                $(this).addClass('inactive');
		            })
		            .jcarouselControl({
		                // Options go here
		                target: '-=1'
		            });

		        /*
		         Next control initialization
		         */
		        $('.jcarousel-control-next')
		            .on('jcarouselcontrol:active', function() {
		                $(this).removeClass('inactive');
		            })
		            .on('jcarouselcontrol:inactive', function() {
		                $(this).addClass('inactive');
		            })
		            .jcarouselControl({
		                // Options go here
		                target: '+=1'
		            });

		        /* 
		        Pagination initialization
		        $('.jcarousel-pagination')
		            .on('jcarouselpagination:active', 'a', function() {
		                $(this).addClass('active');
		            })
		            .on('jcarouselpagination:inactive', 'a', function() {
		                $(this).removeClass('active');
		            })
		            .jcarouselPagination({
		                // Options go here
		            });
				*/

				/* Navegação dos indicados */

				//Esconde tudo
				$('.box-opcoes-oscar').not('#item-ator').hide()

				$('#menu a').on('click', function(e){
					//para o evero href
					e.preventDefault();

					//Dá foco ao item clicado no menu
					$('#menu a').removeClass('ativo').fadeTo('fast',0.33);
					$(this).addClass('ativo').fadeTo('fast',1);

					//Mostra o box de opções selecionadas
					var target = $(this).attr('href');
					$('.box-opcoes-oscar').not(target).fadeOut('slow', function(){
						$(target).fadeIn('slow');
					});
				})

				//Destaca a resposta escolhida
				$('.opcoes-oscar > a').on('click', function(e){
					e.preventDefault();
					$('.opcoes-oscar > a').removeClass('ativo');
					$(this).addClass('ativo');
				})


		    });
		})(jQuery);
		
		
function mask(objeto, evt, mask){
	var LetrasU = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	var LetrasL = 'abcdefghijklmnopqrstuvwxyz';
	var Letras  = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	var Numeros = '0123456789';
	var Fixos  = '().-:/ ';
	var Charset = " !\"#$%&\'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\]^_/`´abcdefghijklmnopqrstuvwxyz{|}~";
	
	evt = (evt) ? evt : (window.event) ? window.event : "";
	var value = objeto.value;
	if (evt) {
	 var ntecla = (evt.which) ? evt.which : evt.keyCode;
	 tecla = Charset.substr(ntecla - 32, 1);
	 if (ntecla < 32) return true;
	
	 var tamanho = value.length;
	 if (tamanho >= mask.length) return false;
	
	 var pos = mask.substr(tamanho,1);
	 while (Fixos.indexOf(pos) != -1) {
	  value += pos;
	  tamanho = value.length;
	  if (tamanho >= mask.length) return false;
	  pos = mask.substr(tamanho,1);
	 }
	
	 switch (pos) {
	   case '#' : if (Numeros.indexOf(tecla) == -1) return false; break;
	   case 'A' : if (LetrasU.indexOf(tecla) == -1) return false; break;
	   case 'a' : if (LetrasL.indexOf(tecla) == -1) return false; break;
	   case 'Z' : if (Letras.indexOf(tecla) == -1) return false; break;
	   case '*' : objeto.value = value; return true; break;
	   default : return false; break;
	 }
	}
	objeto.value = value;
	return true;
}

function mostraThumb(id){

	$("#" + id).show();

}