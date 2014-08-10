<?php

include_once 'RepositorioProduto.php';

$id = $_GET['id'];
$retorna = RepositorioProduto::getInstancia()->visualizar($id);
//$retorna = RepositorioProduto::getInstancia()->listar();

foreach($retorna as $objProduto){

	//echo "<table border='1'>";//start table
     
        //creating our table heading
        echo "<tr>";
						        	// echo "<th>ID</th>";
						            echo "<th>Nome Produto</th>";
						            echo "<th>Fabricante</th>";
						            echo "<th>Especificacao</th>";
						            echo "<th>Data Produto</th>";
						            echo "<th>Atualizar</th>";
						            echo "<th>Deletar</th>";
						        echo "</tr>";

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
					                // echo "<td>";
					                // echo "<a href='alterar.php?id=$id '>Alterar</a></td>";
					                // echo "<td>";
				                	// echo "<a href='deletar.php?id=$id '>Deletar</a></td>";
				                echo "</tr>";
            echo "</tr>";
        }

        //end table
    		//echo "</table>";
   
	
?>