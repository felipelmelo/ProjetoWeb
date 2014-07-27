<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<title>Or&ccedil;amento</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- The styles -->
	<link id="bs-css" href="css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/charisma-app.css" rel="stylesheet">
	<link href="css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='css/fullcalendar.css' rel='stylesheet'>
	<link href='css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='css/chosen.css' rel='stylesheet'>
	<link href='css/uniform.default.css' rel='stylesheet'>
	<link href='css/colorbox.css' rel='stylesheet'>
	<link href='css/jquery.cleditor.css' rel='stylesheet'>
	<link href='css/jquery.noty.css' rel='stylesheet'>
	<link href='css/noty_theme_default.css' rel='stylesheet'>
	<link href='css/elfinder.min.css' rel='stylesheet'>
	<link href='css/elfinder.theme.css' rel='stylesheet'>
	<link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='css/opa-icons.css' rel='stylesheet'>
	<link href='css/uploadify.css' rel='stylesheet'>
	
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
						<li><a class="ajax-link" href="frmUsuario.html"><i class="icon-edit"></i><span class="hidden-tablet"> Usu&aacute;rio</span></a></li>
						<li><a class="ajax-link" href="frmCategoria.html"><i class="icon-edit"></i><span class="hidden-tablet"> Categoria</span></a></li>
						<li><a class="ajax-link" href="frmProduto.html"><i class="icon-edit"></i><span class="hidden-tablet"> Produto</span></a></li>
						<li><a class="ajax-link" href="exibirDados.php"><i class="icon-edit"></i><span class="hidden-tablet"> Estabelecimento</span></a></li>
						<li><a class="ajax-link" href="frmCompras.html"><i class="icon-edit"></i><span class="hidden-tablet">Compras</span></a></li>
						<li><a class="ajax-link" href="frmOrcamento.html"><i class="icon-edit"></i><span class="hidden-tablet"> Or&ccedilamento</span></a></li>
						<li><a class="ajax-link" href="frmRelatorio.html"><i class="icon-edit"></i><span class="hidden-tablet"> Rela&oacute;rio</span></a></li>
						<li><a href="login.html"><i class="icon-lock"></i><span class="hidden-tablet">Sair</span></a></li>
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
						<a href="#">Estabelecimento</a>
					</li>
				</ul>
			</div>
			<?php
			include_once 'repositorioEstabelecimento.php';
			
			$retornoObjEstabelecimento = RepositorioEstabelecimento::getInstancia()->listar();
			?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
					
					<a class="btn btn-success" href="frmEstabelecimento.php"><i class="icon-edit icon-white"></i>Cadastrar</a> 
											
					</div>
	
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Nome Fantasia</th>
								  <th>Raz&atilde;o Social</th>
								  <th>Logradouro</th>
								  <th>N&uacute;mero</th>
								  <th>Complemento</th>
								  <th>Bairro</th>
								  <th>Cidade</th>
								  <th>Estado</th>
								  <th>A&ccedil;&atilde;o</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php 
							include_once 'repositorioEstabelecimento.php';
							$retornoObjEstabelecimento = RepositorioEstabelecimento::getInstancia()->listar();
							
						    foreach ($retornoObjEstabelecimento as $ObjEstabelecimento){
							
						  ?>
							<tr>
								<td class="center"><?php echo $ObjEstabelecimento->getNomeFantasia(); ?></td>
								<td class="center"><?php echo $ObjEstabelecimento->getRazaoSocial(); ?></td>
								<td class="center"><?php echo $ObjEstabelecimento->getLogradouro(); ?></td>
								<td class="center"><?php echo $ObjEstabelecimento->getNumero(); ?></td>
								<td class="center"><?php echo $ObjEstabelecimento->getComplemento(); ?></td>
								<td class="center"><?php echo $ObjEstabelecimento->getBairro(); ?></td>
								<td class="center"><?php echo $ObjEstabelecimento->getCidade(); ?></td>
								<td class="center" ><?php echo $ObjEstabelecimento->getEstado(); ?></td>
								<td class="center">
									<a class="btn btn-info" href="frmEstabelecimentoAlterar.php?id=<?php echo $ObjEstabelecimento->getId();?>">
										<i class="icon-edit icon-white"></i>  
										Alterar                                            
									</a>
									<a class="btn btn-danger" href="excluirDados.php?id=<?php echo $ObjEstabelecimento->getId();?>"onClick="return confirm('Deseja realmente apagar este registo?')";>
										<i class="icon-trash icon-white"></i> 
										Excluir
									</a>
								</td>
							</tr>
							<?php } ?>
							
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
					
			</div><!--/#content.span10-->
		</div><!--/fluid-row-->
				
		<hr>

		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
		</div>
	
	</div><!--/.fluid-container-->

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
