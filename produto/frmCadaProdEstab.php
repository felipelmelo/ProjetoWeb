<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<title>Cadastro Produto Estabelecimento</title>
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
	<link href="../estruturacss/bootstrap-responsive.css" rel="stylesheet">
	<link href="../estruturacss/charisma-app.css" rel="stylesheet">
	<link href="../estruturacss/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='../estruturacss/fullcalendar.css' rel='stylesheet'>
	<link href='../estruturacss/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='../estruturacss/chosen.css' rel='stylesheet'>
	<link href='../estruturacss/uniform.default.css' rel='stylesheet'>
	<link href='../estruturacss/colorbox.css' rel='stylesheet'>
	<link href='../estruturacss/jquery.cleditor.css' rel='stylesheet'>
	<link href='../estruturacss/jquery.noty.css' rel='stylesheet'>
	<link href='../estruturacss/noty_theme_default.css' rel='stylesheet'>
	<link href='../estruturacss/elfinder.min.css' rel='stylesheet'>
	<link href='../estruturacss/elfinder.theme.css' rel='stylesheet'>
	<link href='../estruturacss/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='../estruturacss/opa-icons.css' rel='stylesheet'>
	<link href='../estruturacss/uploadify.css' rel='stylesheet'>

			
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
						<li><a href="login.html">Logout</a></li>
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
						<li><a class="ajax-link" href="index.html"><i class="icon-home"></i><span class="hidden-tablet"> Home</span></a></li>
						<li><a class="ajax-link" href="../usuario/exibirUsuario.php"><i class="icon-edit"></i><span class="hidden-tablet"> Usu&aacute;rio</span></a></li>
						<li><a class="ajax-link" href="../categoria/exibirCategoria.php"><i class="icon-edit"></i><span class="hidden-tablet"> Categoria</span></a></li>
						<li><a class="ajax-link" href="../produto/exibirProduto.php"><i class="icon-edit"></i><span class="hidden-tablet"> Produto</span></a></li>
						<li><a class="ajax-link" href="../estabelecimento/ExibirDados.php"><i class="icon-edit"></i><span class="hidden-tablet"> Estabelecimento</span></a></li>
						<li><a class="ajax-link" href="../compras/frmCompras.php"><i class="icon-edit"></i><span class="hidden-tablet">Compras</span></a></li>
						<li><a class="ajax-link" href="../orcamento/orcamento.php"><i class="icon-edit"></i><span class="hidden-tablet"> Or&ccedilamento</span></a></li>
						<li><a class="ajax-link" href="../relatorio/relatorio.php"><i class="icon-edit"></i><span class="hidden-tablet"> Relat&oacute;rio</span></a></li>
						<li><a href="login.html"><i class="icon-lock"></i><span class="hidden-tablet">Sair</span></a></li>
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
						<a href="#">Produto</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Formul&aacute;rio de Cadastro Produto Estabelecimento</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action='tratarInserirProdEstab.php' onsubmit="return validacoes(this);">
						  <fieldset>
							<legend>Produto</legend>
							<h5>* Todos os campos s&otilde;o obrigat&oacute;rios</h5><br/>
																
							<div class="control-group">
							  <label class="control-label" for="typeahead">Pre&ccedil;o Produto: </label>
							  <div class="controls">
								<input type="text" id="preco" name="preco" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" >
							 </div>
							</div>


							<div class="control-group">
							<label class="control-label" for="typeahead">Produto:</label>
							<div class="controls">
								<select id="id_produto" name="id_produto" required style="width:375px;" tabindex="4">
								<option value="">Selecione uma produto</option>
								
									<?php 
										require_once 'RepositorioProduto.php';
										$retornoObjProduto = RepositorioProduto::getInstancia()->listar();		
										foreach ($retornoObjProduto as $objProduto){
										$intIdProduto = $objProduto->getId();
										$strNomeProduto = $objProduto->getNomeProd();
										
										echo '<option value="' . $intIdProduto . '">' . $strNomeProduto . '</option>';
										}
								?>
								</select>
							</div>

							<br />
							<div class="control-group">
							<label class="control-label" for="typeahead">Estabelecimento:</label>
							<div class="controls">
								<select id="id_estabelecimento" name="id_estabelecimento" required style="width:375px;" tabindex="4">
								<option value="">Selecione uma estabelecimento</option>
								
									<?php 
										require_once '../estabelecimento/repositorioEstabelecimento.php';
										$retornoObjEstab = RepositorioEstabelecimento::getInstancia()->listar();		
										foreach ($retornoObjEstab as $objEstab){
										$idEstab = $objEstab->getId();
										$nomeEstab = $objEstab->getNomeFantasia();
										
										echo '<option value="' . $idEstab . '">' . $nomeEstab . '</option>';
										}
								?>
								</select>
							</div>
													
							</div> <!-- fecha div container -->

							<br /><br />
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
	<script src="js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src='js/fullcalendar.min.js'></script>
	<!-- data table plugin -->
	<script src='js/jquery.dataTables.min.js'></script>

	<!-- chart libraries start -->
	<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.min.js"></script>
	<script src="js/jquery.flot.pie.min.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="js/charisma.js"></script>
	
		
</body>
</html>
