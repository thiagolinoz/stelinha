<?php $view->extend('base.html.php')?>
<table style="width:100%">
	<tr>
		<td>Usuario</td>
		<td>Local</td>
		<td>Horario de</td>
		<td>Horario ate</td>
		<td>Finaliza</td>
		<td>Edita</td>
		<td>Excluir</td>
	</tr>
	<?php foreach($crono as $v):?>
		<tr>
			<td><?=$v->getHorario()->getUser()->getNome()?></td>
			<td><?=$v->getAtividade()->getLocal()?></td>
			<td><?=$v->getAtividade()->getHorarioDe()?></td>
			<td><?=$v->getAtividade()->getHorarioAte()?></td>
			<td><a href="finaliza/<?=$v->getId()?>">F</a></td>
			<td><a href="edita/<?=$v->getId()?>">E</a></td>
			<td><a href="exclui/<?=$v->getId()?>">X</a></td>
		</tr>
	<?php endforeach; ?>
</table>	
