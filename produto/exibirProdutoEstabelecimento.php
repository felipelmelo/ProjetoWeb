<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<title>Or&ccedil;amento</title>
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
				<a class="brand" href=""><span>Or&ccedil;amento</span></a>
					
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
						<li><a class="ajax-link" href="../orcamento/exibirOrcamento.php"><i class="icon-edit"></i><span class="hidden-tablet"> Or&ccedilamento</span></a></li>
						<li><a class="ajax-link" href="../relatorio/relatorio.php"><i class="icon-edit"></i><span class="hidden-tablet"> Relat&oacute;rio</span></a></li>
						<li><a href="../login/index.php"><i class="icon-lock"></i><span class="hidden-tablet">Sair</span></a></li>
					</ul>
				</div><!--/.well -->
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
						<a href="#">Relat&oacute;rios</a>
					</li>
				</ul>
			</div>
			<?php 
			include_once '../Produto/repositorioProduto.php';
			$retornoObjProduto = RepositorioProduto::getInstancia()->ProdutoEstabelecimento();
			
			
			?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Nome do Produto</th>
								  <th>Estabelecimento</th>
								  <th>Pre&ccedil;o</th>
								  <th>A&ccedil;&atilde;o</th>
							  </tr>
						  </thead>
					<?php 
						foreach ($retornoObjProduto as $ObjProduto){
					?>	<tr>
						<td class="center"><?php echo utf8_encode($ObjProduto['nome_produto']); ?></td>
						<td class="center"><?php echo utf8_encode($ObjProduto['nome_fantasia_estabelecimento']); ?></td>
						<td class="center"><?php echo utf8_encode($ObjProduto['preco_produto']); ?></td>
						
						<td class="center">
									<a class="btn btn-info" href="frmProdutoAlterarPreco.php?idProduto=<?php echo $ObjProduto['id_Produto'];?>&idEstabelecimento=<?php echo $ObjProduto['id_Estabelecimento'];?>">
										<i class="icon-edit icon-white"></i>  
										Alterar                                            
									</a>
									<a class="btn btn-danger" href="excluirProdutoPreco.php?idProduto=<?php echo $ObjProduto['id_Produto'];?>&idEstabelecimento=<?php echo $ObjProduto['id_Estabelecimento'];?>"
									
									onClick="return confirm('Deseja realmente apagar este registo?')";>
										<i class="icon-trash icon-white"></i> 
										Excluir
									</a>
								</td>
					 </tr>
					<?php
					}?>
					</table>

										
					              
					
				</div><!--/span-->
			
			</div><!--/row-->
					
			</div><!--/#content.span10-->
		</div><!--/fluid-row-->
				
	

	</div><!--/.fluid-container-->

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
	<!--<script src="js/charisma.js"></script>-->
	
		
</body>
</html>
