<html>
<head>
<script type="text/javascript"src="externo.js"></script>
</head>
<form id="frmInserir"  method = "post" action = 'tratarInserir.php' onsubmit="return validacoes(this);">
	<fieldset>
		
		<br><br>	
		<label>Nome Produto:</label>
		<input type="text" name="nome_produto" id="nome_produto" required><br><br>

		<label>Fabricante Produto:</label>
		<input type="text" name="fabricante_produto" id="fabricante_produto" required><br><br>

		<label>Especificacao Produto:</label>
		<input type="text" name="especificacao_prod" id="especificacao_prod" required><br><br>

		<label>Data Produto:</label>
		<input type="text" name="inclusao_dt_produto" id="inclusao_dt_produto" required><br><br>

			<h3>Categoria</h3>
							<select id="intIdPrograma" name="intIdPrograma" class="campo-cinza-padrao required" style="width:375px;" tabindex="4">
							  <option value="<?php echo $objCategoria->getIdCategoria();?>">---</option>
							  <?php 
							  $arrayObjCategoria = ControladorCategoria::getInstancia()->listar();
							  foreach ($arrayObjCategoria as $objCategoria){
							  	$intIdCategoria = $objCategoria>getId();
							  	$strNomeCategoria = $objCategoria->getNome();

							  	if($objCategoriav->getIdCategoria() == $objCategoria->getId()){
						  			$selected = 'selected="selected"';
						  		}else{
						  			$selected = '';
						  		}
						  		?>
									<option value="<?php echo $objPrograma->getId();?>" <?php echo $selected;?>><?php echo $objCategoria->getNome();?></option>
						  		<?php 
							  } 
						  ?>
			</select>
		<br><input type= "Submit" value = "Enviar">
		<input type ="reset" value = "Limpar"><br><br>
		</fieldset>
	</form>
	
<script language="javascript" type="text/javascript">
	
	function validacoes(form){
		
				
		var filtro_nome = /^[a-zA-Z]*$/
		if(!filtro_nome.test(form.nome.value) || form.nome.value == "")
		{
			alert("Preencha o seu os campos corretamente.");
			form.nome.focus();
			return false;
		}
	}
	</script>
</html>