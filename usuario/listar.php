<?php 	
require_once 'RepositorioUsuario.php';	

	
	$retornoObjUsuario = RepositorioUsuario::getInstancia()->listar();
	
	
 ?>


<div class="bloco-organizador">
	<div id="tabela_relacao">
	<h3><a href="inserir.php">Cadastrar nova pessoa</a></h3>
	<br>
		<table  border="1" cellpadding="0" cellspacing="0">
				<tr>
				
					<th width="150" style="text-align:center">Nome</th>
					<th width="80" style="text-align:center">CPF</th>
					<th width="150" style="text-align:center">Email</th>
					<th width="80" style="text-align:center">Tipo de usuario</th>
					<th width="80" style="text-align:center">Alterar</th>
					<th width="80" style="text-align:center">Excluir</th>
					
				</tr>
				<?php 
				foreach ($retornoObjUsuario as $ObjUsuario){
						?>
				<tr>			
					<td> <?php echo  $ObjUsuario->getNome() . "<br>"; ?></td>
					<td><?php echo $ObjUsuario->getCpf() . "<br>"; ?></td>
					<td><?php echo $ObjUsuario->getEmail() . "<br>"; ?></td>
					<td><?php 
					if ($ObjUsuario->getTipo_usuario() == 1){
						echo "Administrador"; 
					}else{
						echo "Usuario";
					} 
					?></td>
					
					<td><a href="alterar.php?id=<?php echo $ObjUsuario->getId();?>"</a>Alterar</td>
					<td><a href="excluir.php?id=<?php echo $ObjUsuario->getId();?>" onClick="return confirm('Deseja realmente apagar este registo?');">Excluir</a></td>
					
				</tr>
				<?php }					
		?>
		</table>
	</div>
</div>	