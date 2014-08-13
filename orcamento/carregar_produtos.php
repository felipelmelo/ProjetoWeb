<?php

mysql_connect("localhost","root","");
mysql_select_db("orcamento");

$sql = "SELECT * FROM produto WHERE id_Categoria = " . $_POST["idCategoria"];
$qr = mysql_query($sql) or die(mysql_erro());
echo mysql_num_rows($qr);
if($ln = mysql_fetch_array($qr, MYSQLI_ASSOC)){
	echo '<option value="' . $ln['id_Produto'] . '">' . $ln['nome_produto'] . '</option>';
}else{
	echo '<option value=0"> Não há Produto cadastrado</option>';
	}

			
?>
