<?php require_once 'RepositorioCategoria.php';	

	$id = $_GET['id'];
	
	
	
	$retornoObjCategoria = RepositorioCategoria::getInstancia()->vizualizar($id);
	
	foreach ($retornoObjCategoria as $ObjCategoria){
		
?>	

<html>
<head></head>
<form method = "post" action = 'trataAlterar.php' onsubmit="return validacoes(this);">
	<fieldset>
		
		<br><br>	
		<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
					
		<label>Nome:</label>
		<input type = "text" name="nome" required value = "<?php echo $ObjCategoria->getNome();?>"><br><br>
	
	<?php }?>
		<br><input type = "Submit" value = "Alterar">
		<input type = "reset" value = "Limpar"><br><br>
		</fieldset>
	</form>
	
	<script language="javascript" type="text/javascript">
	
		
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