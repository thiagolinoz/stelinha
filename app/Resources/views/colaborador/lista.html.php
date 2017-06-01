<?php $view->extend('base.html.php')?>
<table style="width:100%">
	<tr>
		<td>Nome</td>
		<td>Excluir</td>
		<td>Editar</td>
	</tr>
	<?php foreach($colaborador as $v):?>
		<tr>
			<td><?=$v->getNome();?></td>
			<td><a href="desativa/<?=$v->getId()?>">X</a></td>
			<td><a href="edita/<?=$v->getId()?>">E</a></td>
		</tr>	
	<?php endforeach;?>
</table>	
