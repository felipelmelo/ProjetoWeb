<?php require_once 'RepositorioPessoa.php';	

	$id = $_GET['id'];
	
	
	
	$retornoObjPessoa = RepositorioPessoa::getInstancia()->vizualizar($id);
	
	foreach ($retornoObjPessoa as $ObjPessoa){
		
?>	

<html>
<head>
<script type="text/javascript"src="externo.js"></script>
</head>
<form method = "post" action = 'trataAlterar.php'>
	<fieldset>
		
		<br><br>	
		<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
					
		<label>Nome:</label>
		<input type = "text" name="nome" required value = "<?php echo $ObjPessoa->getNome();?>"><br><br>
		
		<label>Endere&ccedilo:</label>
		<input type = "text" name = "endereco" id="endereco" required value = "<?php echo $ObjPessoa->getEndereco();?>"><br><br>
		
		<label>Idade:</label>
		<input type = "text" name = "idade" required value = "<?php echo $ObjPessoa->getIdade();?>"> <br><br>
		
		<label>Sexo:</label>
		<select name = "sexo">
			 <option <?php if ($ObjPessoa->getSexo() == "Masculino"){?>selected="selected"<?php }?> value="Masculino">Masculino</option>
			 <option <?php if ($ObjPessoa->getSexo() == "Feminino"){?>selected="selected"<?php }?> value="Feminino">Feminino</option>
						
		</select><br><br>
		
		<label>Cep:</label>
		<input type = "text" name = "cep" value = "<?php echo $ObjPessoa->getCep(); ?>"> <br><br>
		
		<?php }?>
		
		<br><input type = "Submit" value = "Alterar">
		<input type = "reset" value = "Limpar"><br><br>
		</fieldset>
	</form>
</html>
