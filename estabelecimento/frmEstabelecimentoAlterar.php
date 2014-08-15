<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<title>Estabelecimento</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- The styles -->
	<link id="bs-css" href="../estrutura/css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	<link href="../estrutura/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="../estrutura/css/charisma-app.css" rel="stylesheet">
	<link href="../estrutura/css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='../estrutura/css/fullcalendar.css' rel='stylesheet'>
	<link href='../estrutura/css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='../estrutura/css/chosen.css' rel='stylesheet'>
	<link href='../estrutura/css/uniform.default.css' rel='stylesheet'>
	<link href='../estrutura/css/colorbox.css' rel='stylesheet'>
	<link href='../estrutura/css/jquery.cleditor.css' rel='stylesheet'>
	<link href='../estrutura/css/jquery.noty.css' rel='stylesheet'>
	<link href='../estrutura/css/noty_theme_default.css' rel='stylesheet'>
	<link href='../estrutura/css/elfinder.min.css' rel='stylesheet'>
	<link href='../estrutura/css/elfinder.theme.css' rel='stylesheet'>
	<link href='../estrutura/css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='../estrutura/css/opa-icons.css' rel='stylesheet'>
	<link href='../estrutura/css/uploadify.css' rel='stylesheet'>

</head>

<body>
		<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html"> <span>Or&ccedil;amento</span></a>
				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> admin</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#">Profile</a></li>
						<li class="divider"></li>
						<li><a href="../login/index.php">Logout</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
				
				</div>
		</div>
	</div>
	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">Menu</li>
						<li><a class="ajax-link" href="../index.html"><i class="icon-home"></i><span class="hidden-tablet"> Home</span></a></li>
						<li><a class="ajax-link" href="../usuario/exibirUsuario.php"><i class="icon-edit"></i><span class="hidden-tablet"> Usu&aacute;rio</span></a></li>
						<li><a class="ajax-link" href="../categoria/exibirCategoria.php"><i class="icon-edit"></i><span class="hidden-tablet"> Categoria</span></a></li>
						<li><a class="ajax-link" href="..produto/exibirProduto.php"><i class="icon-edit"></i><span class="hidden-tablet"> Produto</span></a></li>
						<li><a class="ajax-link" href="../estabelecimento/exibirDados.php"><i class="icon-edit"></i><span class="hidden-tablet"> Estabelecimento</span></a></li>
						<li><a class="ajax-link" href="../compras/frmCompras.php"><i class="icon-edit"></i><span class="hidden-tablet">Compras</span></a></li>
						<li><a class="ajax-link" href="../orcamento/exibirOrcamento.php"><i class="icon-edit"></i><span class="hidden-tablet"> Or&ccedilamento</span></a></li>
						<li><a class="ajax-link" href="../relatorio/relatorio.php"><i class="icon-edit"></i><span class="hidden-tablet"> Relat&oacute;rio</span></a></li>
						<li><a href="../login/index.php"><i class="icon-lock"></i><span class="hidden-tablet">Sair</span></a></li>
					</ul>
					
				</div>
			</div><!--/span-->
			<!-- left menu ends -->
			
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					
					<li>
						<a href="#">Estabelecimento</a>
					</li>
					
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Formul&aacute;rio de Cadastro</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<?php
					require_once 'repositorioEstabelecimento.php';
					$id = $_GET['id'];
					$retornoobjEstabelecimento = RepositorioEstabelecimento::getInstancia()->visualizar($id);
					foreach($retornoobjEstabelecimento as $objEstabelecimento)
					{

					?>
					<div class="box-content">
						<form class="form-horizontal" method="post" action = "alterarDados.php">
						  <fieldset>
							<legend>Estabelecimento</legend>
							<h5>* Todos os campos s&otilde;o obrigat&oacute;rios</h5><br/>
							
							<input type="hidden" name="id" id="id" value="<?php echo $id;?>" />
							
							<div class="control-group">
							  <label class="control-label" for="nomeFantasia">Nome Fantasia: </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" name="nomeFantasia" required value = "<?php echo utf8_encode($objEstabelecimento->getNomeFantasia());?>">
							 </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="razaoSocial">Raz&atilde;o Social: </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" name="razaoSocial" required value = "<?php echo utf8_encode($objEstabelecimento->getRazaoSocial());?>">
							 </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="logradouro">Logradouro: </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" name="logradouro" required value = "<?php echo utf8_encode($objEstabelecimento->getLogradouro());?>" >
							 </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="numero">N&uacute;mero: </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" name="numero" required value = "<?php echo $objEstabelecimento->getNumero();?>">
							 </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="complemento">Complemento: </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" name="complemento" value = "<?php echo utf8_encode($objEstabelecimento->getComplemento());?>">
							 </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="bairro">Bairro: </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" name="bairro" required value = "<?php echo utf8_encode($objEstabelecimento->getBairro());?>">
							 </div>
							</div>
														
							<div class="control-group">
							  <label class="control-label" for="cidade">Cidade: </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" name = "cidade" required value = "<?php echo utf8_encode($objEstabelecimento->getCidade());?>">
							 </div>
							</div>
							
							<div class="control-group">
							<label class="control-label" for="estado">UF </label>
							<div class="controls">
							  <select id="selectError" data-rel="chosen" name="estado" required value = "<?php echo $objEstabelecimento->getEstado();?>">
								<option>AC</option>
								<option>AL</option>
								<option>AP</option>
								<option>AM</option>
								<option>BA</option>
								<option>CE</option>
								<option>DF</option>
								<option>ES</option>
								<option>GO</option>
								<option>MA</option>
								<option>MT</option>
								<option>MS</option>
								<option>MG</option>
								<option>PA</option>
								<option>PB</option>
								<option Selected>PE</option>
								<option>PI</option>
								<option>RJ</option>
								<option>RN</option>
								<option>RS</option>
								<option>RO</option>
								<option>RR</option>
								<option>SC</option>
								<option>SP</option>
								<option>SE</option>
								<option>TO</option>							
							  </select>
							  
							  </div>
						  <?php
								}
						  ?>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Salvar</button>
							  <button type="reset" class="btn">Cancelar</button>
							</div>
						</div>
						</fieldset>
						</form>  						  
					</div>
				</div>
			</div>
						
	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->
	<script src="../estrutura/js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="../estrutura/js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="../estrutura/js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="../estrutura/js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="../estrutura/js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="../estrutura/js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="../estrutura/js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="../estrutura/js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="../estrutura/js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="../estrutura/js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="../estrutura/js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="../estrutura/js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="../estrutura/js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="../estrutura/js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="../estrutura/js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="../estrutura/js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src='../estrutura/js/fullcalendar.min.js'></script>
	<!-- data table plugin -->
	<script src='../estrutura/js/jquery.dataTables.min.js'></script>

	<!-- chart libraries start -->
	<script src="../estrutura/js/excanvas.js"></script>
	<script src="../estrutura/js/jquery.flot.min.js"></script>
	<script src="../estrutura/js/jquery.flot.pie.min.js"></script>
	<script src="../estrutura/js/jquery.flot.stack.js"></script>
	<script src="../estrutura/js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="../estrutura/js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="../estrutura/js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="../estrutura/js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="../estrutura/js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="../estrutura/js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="../estrutura/js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="../estrutura/js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="../estrutura/js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="../estrutura/js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="../estrutura/js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="../estrutura/js/jquery.history.js"></script>
	
	
	<form onsubmit="return valida(this);">

<script>
function valdia(form)
{ //verificar o tamanho dos campos
	if(form.nomeFantasia.Value=="" || form.nomefantasia.Value.length <=60)
	{
		alert("Preencha o nome fantasia do estabelecimento corretamente");
		form.nomeFantasia.focus();
		return false;
	}
	
	if(form.razaoSocial.Value=="" || form.razaoSocial.Value.length <=60 )
	{
		alert("Preencha a razão Social corretamente");
		form.razaoSocial.focus();
		return false;
	}
	
	if(form.logradouro.Value=="" || form.logradouro.Value.length <=70)
	{
		alert("Preencha o logradouro corretamente");
		form.razaoSocial.focus();
		return false;
	}
	
	if(!IsNum(form.numero.Value) || form.numero.Value.length <=6)
	{
		//lembrar no formulario de colocar o campo numero com não obrigatorio
		alert("Informe apenas número");
		form.numero.focus();
		return false;
	}
	
	if(form.complemento.Value.lenght <=70)
	{
		alert("O campo complemento não ultrapasse 70 caracteres");
		form.bairro.focus();
		return false;
	}
	
	if(form.bairro.Value=="" || form.bairro.Value.lenght <=70)
	{
		alert("Preencha o nome do bairro corretamente");
		form.bairro.focus();
		return false;
	}
	
	if(form.cidade.Value=="" || form.cidade.Value.lenght <=70)
	{
		alert("Preencha o nome da cidade corretamente");
		form.cidade.focus();
		return false;
	}
	
	if(form.estado.Value=="" || form.estado.Value.lenght <=2)
	{
		alert("Preencha o nome do estado corretamente");
		form.cidade.focus();
		return false;
	}
}
</script>
		
</body>
</html>
