<?php $view->extend('base.html.php')?>
<table style="width:100%">
	<tr>
		<td>Local</td>
		<td>Horario de</td>
		<td>Horario ate</td>
		<td>Fazer</td>
		<td>Excluir</td>
	</tr>
	<?php foreach($atividade as $v):?>
		<tr>
			<td><?=$v->getLocal();?></td>
			<td><?=$v->getHorarioDe();?></td>
			<td><?=$v->getHorarioAte();?></td>
			<td><a href="meuHorario/<?= $v->getId() ?>">Escolher Horario</a></td>
			<td><a href="desativa/<?=$v->getId()?>">X</a></td>
		</tr>	
	<?php endforeach;?>
</table>	
