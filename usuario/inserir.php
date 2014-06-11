<html>
<head>
<script type="text/javascript"src="externo.js"></script>
</head>
<form method = "post" action = 'trataInserir.php'>
	<fieldset>
		
		<br><br>	
		<label>Nome:</label>
		<input type = "text" name="nome" required><br><br>
		
		<label>Endereço:</label>
		<input type = "text" name = "endereco" id="endereco" required"><br><br>
		
		<label>Idade:</label>
		<input type = "text" name = "idade" required> <br><br>
		
		<label>Sexo:</label>
		<select name = "sexo">
			<option>Escolha um sexo</option>	
			<option value = "Masculino">Masculino</option>
			<option  value = "Feminino">Feminino</option>
		</select><br><br>
		
		<label>Cep:</label>
		<input type = "text" name = "cep"> <br><br>
					
		<br><input type = "Submit" value = "Enviar">
		<input type = "reset" value = "Limpar"><br><br>
		</fieldset>
	</form>
</html>