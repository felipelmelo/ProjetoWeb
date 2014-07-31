	<?php
			include_once 'repositorioProduto.php';
			
			$retornaObjeto = RepositorioProduto::getInstancia()->listar();
			?>
			<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Nome Produto</th>
								  <th>Fabricante</th>
								  <th>Especificação</th>
								  <th>Data Produto</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php 
							include_once 'RepositorioProduto.php';
							$retornaObjeto = RepositorioProduto::getInstancia()->listar();
							
						    foreach ($retornaObjeto as $objProduto){
							
						  ?>
							<tr>
								
								<?php 
								echo $objProduto->getNomeProd();
								echo $objProduto->getFabricanteProd();
								echo $objProduto->getEspecificacaoProd();
								echo $objProduto->getDataProd();
								echo $objProduto->getIdCategoria();
								?>
								<td class="center">
									<a class="btn btn-info" href="frmProdutoAlterar.php?id=<?php echo $objProduto->getId();?>">
										<i class="icon-edit icon-white"></i>  
										Alterar                                            
									</a>
									<a class="btn btn-danger" href="excluirDados.php?id=<?php echo $objProduto->getId();?>"onClick="return confirm('Deseja realmente apagar este registo?')";>
										<i class="icon-trash icon-white"></i> 
										Excluir
									</a>
								</td>
							</tr>
							<?php } ?>