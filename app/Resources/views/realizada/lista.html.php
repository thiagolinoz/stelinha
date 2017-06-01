<?php $view->extend('base.html.php')?>
<table style="width:100%">
	<tr>
		<td>Observacao</td>
		<td>Horario de</td>
		<td>Horario ate</td>
		<td>Edita</td>
		<td>Excluir</td>
	</tr>
	<?php foreach($realizada as $v):?>
	<tr>
		<td><?=$v->getObservacao()?></td>
		<td><?=$v->getHorarioDe()?></td>
		<td><?=$v->getHorarioAte()?></td>
		<td><a href="edita/<?=$v->getId()?>">E</a></td>
		<td><a href="exclui/<?=$v->getId()?>">X</a></td>
	</tr>
	<?php endforeach; ?>
</table>	
