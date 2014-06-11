<?php 	
require_once 'RepositorioPessoa.php';	

	
	$retornoObjPessoa = RepositorioPessoa::getInstancia()->listar();
	
	
 ?>


<div class="bloco-organizador">
	<div id="tabela_relacao">
	<h3><a href="inserir.php">Cadastrar nova pessoa</a></h3>
	<br>
		<table  border="1" cellpadding="0" cellspacing="0">
				<tr>
				
					<th width="150" style="text-align:center">Nome</th>
					<th width="80" style="text-align:center">Idade</th>
					<th width="150" style="text-align:center">Endereço</th>
					<th width="80" style="text-align:center">Sexo</th>
					<th width="80" style="text-align:center">CEP</th>
					<th width="80" style="text-align:center">Alterar</th>
					<th width="80" style="text-align:center">Excluir</th>
					
				</tr>
				<?php 
				foreach ($retornoObjPessoa as $ObjPessoa){
						?>
				<tr>			
					<td> <?php echo  $ObjPessoa->getNome() . "<br>"; ?></td>
					<td><?php echo $ObjPessoa->getIdade() . "<br>"; ?></td>
					<td><?php echo $ObjPessoa->getEndereco() . "<br>"; ?></td>
					<td><?php echo  $ObjPessoa->getSexo()  . "<br>"; ?></td>
					<td><?php echo $ObjPessoa->getCep() . "<br>"; ?></td>
					<td><a href="alterar.php?id=<?php echo $ObjPessoa->getId();?>"</a>Alterar</td>
					<td><a href="excluir.php?id=<?php echo $ObjPessoa->getId();?>" onClick="return confirm('Deseja realmente apagar este registo?');">Excluir</a></td>
					
				</tr>
				<?php }					
		?>
		</table>
	</div>
</div>	