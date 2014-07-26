<html>
<head>
<script type="text/javascript"src="externo.js"></script>
</head>
<form id="frmInserir"  method = "post" action = 'trataInserir.php' onsubmit="return validacoes(this);">
	<fieldset>
		
		<br><br>	
		<label>Produto</label>
		<select id="id_categoria" name="id_categoria" required style="width:375px;" tabindex="4">
		<option value="">---</option>
		<?php
		
		require_once '../produto/RepositorioProduto.php';
		$retornoObjProdutos = RepositorioProduto::getInstancia()->listar();		
		foreach ($retornoObjProdutos as $objProdutos){
		$intIdProdutos = $objProdutos->getId();
		$strNomeProdutos = $objProdutos->getNomeProd();
		
		echo '<option value="' . $intIdProdutos . '">' . $strNomeProdutos . '</option>';
		}
		?>
		
		<label>Estabelecimento</label>
		<select id="id_categoria" name="id_categoria" required style="width:375px;" tabindex="4">
		<option value="">---</option>
		<?php
	 
		require_once '../estabelecimento/RepositorioEstabelecimento.php';
		$retornoObjEstabelecimento = RepositorioEstabelecimento::getInstancia()->listar();		
		foreach ($retornoObjEstabelecimento as $objEstabelecimento){
		$idEstabelecimento = $objEstabelecimento->getId();
		$nomeEstabelecimento = $objEstabelecimento->getNome();
		
		echo '<option value="' . $idEstabelecimento . '">' . $nomeEstabelecimento . '</option>';
		}*/
		?>
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