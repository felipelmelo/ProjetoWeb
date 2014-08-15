<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<title>Cadastro Categoria</title>
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
						<li><a class="ajax-link" href="../produto/exibirProduto.php"><i class="icon-edit"></i><span class="hidden-tablet"> Produto</span></a></li>
						<li><a class="ajax-link" href="../estabelecimento/exibirDados.php"><i class="icon-edit"></i><span class="hidden-tablet"> Estabelecimento</span></a></li>
						<li><a class="ajax-link" href="../compras/frmCompras.php"><i class="icon-edit"></i><span class="hidden-tablet">Compras</span></a></li>
						<li><a class="ajax-link" href="../orcamento/exbirOrcamento.php"><i class="icon-edit"></i><span class="hidden-tablet"> Or&ccedilamento</span></a></li>
						<li><a class="ajax-link" href="../relatorio/relatorio.php"><i class="icon-edit"></i><span class="hidden-tablet"> Rela&oacute;rio</span></a></li>
						<li><a href="../login/index.php"><i class="icon-lock"></i><span class="hidden-tablet">Sair</span></a></li>
					</ul>
					
				</div>
			</div><!--/span-->
			<!-- left menu ends -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Categoria</a>
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
					<div class="box-content">
						<form class="form-horizontal" method = "post" action = 'trataInserir.php' onsubmit="return validacoes(this);">
						  <fieldset>
							<legend>Categoria</legend>
							<h5>* Todos os campos s&otilde;o obrigat&oacute;rios</h5><br/>
							
							<div class="control-group">
							  <label class="control-label" for="typeahead">Nome da Categoria: </label>
							  <div class="controls">
								<input type="text" name = "nome" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" >
							 </div>
							</div>
													
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Salvar</button>
							  <button type="reset" class="btn">Cancelar</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

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
	<!-- application script for Charisma demo -->
	
	<script language="javascript" type="text/javascript">
	
	function validacoes(form){
		
		if(form.nome.value=="")
		{
			alert("Preencha o seu nome corretamente.");
			form.nome.focus();
			return false;
		}
	}
	</script>
</body>
</html>
