<?php 	
require_once 'RepositorioCategoria.php';	

	
	$retornoObjCategoria = RepositorioCategoria::getInstancia()->listar();
	
	
 ?>


<div class="bloco-organizador">
	<div id="tabela_relacao">
	<h3><a href="inserir.php">Cadastrar nova Categoria</a></h3>
	
		<table  border="1" cellpadding="0" cellspacing="0">
				<tr>
				
					<th width="150" style="text-align:center">Nome</th>
					<th width="80" style="text-align:center">Alterar</th>
					<th width="80" style="text-align:center">Excluir</th>
					
				</tr>
				<?php 
				foreach ($retornoObjCategoria as $ObjCategoria){
						?>
				<tr>			
					<td> <?php echo  $ObjCategoria->getNome() . "<br>"; ?></td>	
					<td><a href="alterar.php?id=<?php echo $ObjCategoria->getId();?>"</a>Alterar</td>
					<td><a href="excluir.php?id=<?php echo $ObjCategoria->getId();?>" onClick="return confirm('Deseja realmente apagar este registo?');">Excluir</a></td>
					
				</tr>
				<?php }					
		?>
		</table>
	</div>
</div>	