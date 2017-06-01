<?php $view->extend('base.html.php')?>
<?php if(isset($msg)) echo $msg;?>
<form action="/cronograma/saveExtra/" method="post">
    <label for="username">Horarios Cadastrados:</label>
    <select name="horario">
    	<?php foreach($horario as $v): ?>
    		<option><?= $v->getHorarioDe().' - '.$v->getHorarioAte()?></option>
    	<?php endforeach; ?>	
    </select>
    <br/>
    <select name="quantidade">
    <?php for($i=1;$i<=5;$i++):?>
        <option value="<?=$i?>" <?=$i == $atividade->getQuantidade() ? 'selected' : ''?>><?=$i?></option>
    <?php endfor?>    
    </select>
    <input type="hidden" name="atividade" value="<?= $atividade->getId() ?>" />
    <input type="hidden" name="horario" value="<?= $horario[0]->getId() ?>" />
    <br/><br/>
    <button type="submit">Enviar</button>
</form>