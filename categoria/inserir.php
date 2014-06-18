<html>
<head>
<script type="text/javascript"src="externo.js"></script>
</head>
<form id="frmInserir"  method = "post" action = 'trataInserir.php' onsubmit="return validacoes(this);">
	<fieldset>
		
		<br><br>	
		<label>Nome:</label>
		<input type = "text" name="nome" id="nome" required><br><br>
		
		<br><input type = "Submit" value = "Enviar">
		<input type = "reset" value = "Limpar"><br><br>
		</fieldset>
	</form>
	
<script language="javascript" type="text/javascript">
	
	function validacoes(form){
		
				
		var filtro_nome = /^[a-zA-Z]*$/
		if(!filtro_nome.test(form.nome.value) || form.nome.value == "")
		{
			alert("Preencha o seu nome corretamente.");
			form.nome.focus();
			return false;
		}
	}
	</script>
</html>