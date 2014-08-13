<?php

	require_once 'RepositorioProduto.php';

	 $id_produto = $_POST['id_produto'];
	 $id_estabelecimento = $_POST['id_estabelecimento'];

	 

	 echo "<script> alert('estab:'+$id_estabelecimento); </script>";


	 $preco = $_POST['preco'];

	 echo "preco:".$preco;
	 echo "<br>";
	 echo "id prod:".$id_produto;
	  
 
	 $objProdutoEstab = RepositorioProduto::getInstancia()->inserirProdEstab($id_produto, $id_estabelecimento, $preco);
	 
	 // if (!$objProdutoEstab) {
	 // 	echo "<script type=\"text/javascript\"> 
		// 		alert(\"Produto cadastrado!\"); 
		// 		window.location.href = \"frmCadaProdEstab.php\"; 			
		// 		</script>";
	 // }else{
	 // 	echo "<script type=\"text/javascript\"> 
		// 		alert(\"Produto não cadastrado!\"); 
		// 		window.location.href = \"frmProduto.php\"; 			
		// 		</script>";
	 // }
  ?>