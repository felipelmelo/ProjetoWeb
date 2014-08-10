
			<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  
						  </thead>   
						  <tbody>
						  <?php 
							include_once 'RepositorioProduto.php';
							$retornaObjeto = RepositorioProduto::getInstancia()->listar();
							
						    foreach ($retornaObjeto as $objProduto){
							
						  ?>
							<tr>
								
								<?php 
								// echo "<table>";
								echo "<tr>";
						        	// echo "<th>ID</th>";
						            echo "<th>Nome Produto</th>";
						            echo "<th>Fabricante</th>";
						            echo "<th>Especificacao</th>";
						            echo "<th>Data Produto</th>";
						            echo "<th>Atualizar</th>";
						            echo "<th>Deletar</th>";
						        echo "</tr>";


								// echo $n = $objProduto->getNomeProd();
								// echo $m = $objProduto->getFabricanteProd();
								// echo $objProduto->getEspecificacaoProd();
								// echo $objProduto->getDataProd();
								// echo $objProduto->getIdCategoria();

						        $id = $objProduto->getId();
								$nome = $objProduto->getNomeProd();
								$fabricante = $objProduto->getFabricanteProd();
								$espec = $objProduto->getEspecificacaoProd();
								$data = $objProduto->getDataProd();
								$idcategoria = $objProduto->getIdCategoria();


								echo "<tr>";
					            	echo "<td>$nome</td>";
					                echo "<td>$fabricante</td>";
					                echo "<td>$espec</td>";
					                echo "<td>$data</td>";
					                // echo "<td>$idcategoria</td>";
					                echo "<td>";
					                echo "<a href='alterar.php?id=$id '>Alterar</a></td>";
					                echo "<td>";
				                	echo "<a href='deletar.php?id=$id '>Deletar</a></td>";
				                echo "</tr>";
								?>
								
							<?php } ?>