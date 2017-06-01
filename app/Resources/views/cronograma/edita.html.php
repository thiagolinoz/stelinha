<?php $view->extend('base.html.php')?>
<?php if(isset($msg)) echo $msg;?>
<form action="/cronograma/save/<?=$crono[0]->getId()?>" method="post">
    <label for="username">Usuario:</label>
    <input type="text" id="username" value="<?=$crono[0]->getHorario()->getUser()->getNome()?>" readonly/>
    <br/>
    <label for="password">Local:</label>
    <select name="atividade">
    	<?php foreach($atividade as $v):?>
    		<option value="<?=$v->getId()?>"><?=$v->getLocal()?></option>
    	<?php endforeach?>	
    </select>
    <label for="password">Horario de:</label>
    <input type="text" id="password" value="<?=$crono[0]->getAtividade()->getHorarioDe()?>" readonly/>
    <br/><br/>
    <label for="password">Horario ate:</label>
    <input type="text" id="password" value="<?=$crono[0]->getAtividade()->getHorarioAte()?>" readonly/>
    <br/><br/>
    <button type="submit">Enviar</button>
</form>
<script>
	var local = <?=$crono[0]->getAtividade()->getId()?>;
	$("select[name='atividade'] option").each(function(){
		if($(this).val() == local){
			$(this).attr("selected","selected");
		}
	});
</script>>