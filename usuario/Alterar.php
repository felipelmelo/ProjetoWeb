<?php require_once 'RepositorioUsuario.php';	

	$id = $_GET['id'];
	
	
	
	$retornoObjUsuario = RepositorioUsuario::getInstancia()->vizualizar($id);
	
	foreach ($retornoObjUsuario as $ObjUsuario){
		
?>	

<html>
<head>
<script

src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js">

</script>
</head>
<form method = "post" action = 'trataAlterar.php' onsubmit="return validacoes(this);">
	<fieldset>
		
		<br><br>	
		<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
					
		<label>Nome:</label>
		<input type = "text" name="nome" required value = "<?php echo $ObjUsuario->getNome();?>"><br><br>
		
		<label>Cpf:</label>
		<input type = "text" name = "Cpf"  required onKeyPress="return Numero(event);" value = "<?php echo $ObjUsuario->getCpf();?> "><br><br>
		
		<label>Email:</label>
		<input type = "text" name = "email" required value = "<?php echo $ObjUsuario->getEmail();?>"> <br><br>
		
		<label>Senha:</label>
		<input type = "password" name = "senha" id = "senha"> <br><br>
		
		<label>Tipo de Usuario:</label>
		<select name = "tipo_usuario" required>
			 <option <?php if ($ObjUsuario->getTipo_usuario() == "1"){?>selected="selected"<?php }?> value="1">Administrador</option>
			 <option <?php if ($ObjUsuario->getTipo_usuario() == "0"){?>selected="selected"<?php }?> value="2">usuario</option>
						
		</select>
		
		<?php }?>
		
		<br><input type = "Submit" value = "Alterar">
		<input type = "reset" value = "Limpar"><br><br>
		</fieldset>
	</form>
	
	<script language="javascript" type="text/javascript">
	
	function validacoes(form){
		
		var filtro_mail = /^.+@.+\..{2,3}$/
		if(!filtro_mail.test(form.email.value) || form.email.value == "")
		{
			alert("Preencha o seu e-mail corretamente.");
			form.email.focus();
			return false;
		}

		if(form.tipo_usuario[0].checked==false && form.tipo_usuario[1].checked==false)
		{
			alert("Seleciona o Tipo de usuario.");
			return false;
			}
		
		var filtro_nome = /^[a-zA-Z]*$/
		if(form.nome.value.length < 12 || form.nome.value == "")
			{
				alert("Preencha o seu nome corretamente.");
				form.nome.focus();
				return false;
			}	
	}

	function Numero(e)
	{
		navegador = /msie/i.test(navigator.userAgent);
	if (navegador)
		var tecla = event.keyCode;
	else
	var tecla = e.which;

	if(tecla > 47 && tecla < 58) // numeros de 0 a 9
		return true;
	else{
		if (tecla != 8) // backspace
			return false;
		else
			return true;
	}
	}

	$("#senha").change(function(){
		var filtro_senha = /.*?([0-9]).*?([0-9]).*?([0-9]).*?/
			var filtro_senha_letra = /.*?([a-z]).*?([a-z]).*?([a-z]).*?/	
			var filtro_senha_especial = /.*?([\!\@\#\$\%\&\*\_\-\+\?]).*?/
				if(!filtro_senha.test(senha.value) || senha.value == "" || !filtro_senha_letra.test(senha.value) || !filtro_senha_especial.test(senha.value))
				{
					alert("A senha deve conter pelo menos 3 numeros 3 caracteres e 1 caracteres especial ");
					senha.focus();
					return false;
				}else{
					alert("Sua senha foi aprovada com sucesso");
						
					}
	});
	$("#Cpf").change(function(){
		if(Cpf.value.length < 11 || Cpf.value == "" || Cpf.value.length > 11)
		{
			alert("O CPF deve ter 11 digitos");
			Cpf.focus();
			return false;
		}
		});
	</script>
	
	
</html>
