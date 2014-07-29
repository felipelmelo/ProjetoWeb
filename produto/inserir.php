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

		<label>Categoria:</label>
		<select id="id_categoria" name="id_categoria" required style="width:375px;" tabindex="4">
		<option value="">---</option>
		
			<?php 
				require_once '../categoria/RepositorioCategoria.php';
				$retornoObjCategoria = RepositorioCategoria::getInstancia()->listar();		
				foreach ($retornoObjCategoria as $objCategoria){
				$intIdCategoria = $objCategoria->getId();
				echo "string".$$intIdCategoria;
				$strNomeCategoria = $objCategoria->getNome();
				
				echo '<option value="' . $intIdCategoria . '">' . $strNomeCategoria . '</option>';
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