<?php $view->extend('base.html.php')?>
<?php if(isset($msg)) echo $msg;?>
<form action="/realizada/save/<?=$realizada[0]->getId()?>" method="post">
    <label for="password">Atividade:</label>
    <input type="hidden" name="cronograma" value="<?=$realizada[0]->getId()?>">
    <input type="text" value="<?=$realizada[0]->getCronograma()->getAtividade()->getLocal()?>" readonly>
    <label for="password">Observacao:</label>
    <input type="text" name="observacao" value="<?=$realizada[0]->getObservacao()?>">
    <br/>
    <label for="password">Inicio:</label>
    <input type="text" name="horario_de" value="<?=$realizada[0]->getHorarioDe()?>">
    <br/>
    <label for="password">Fim:</label>
    <input type="text" name="horario_ate" value="<?=$realizada[0]->getHorarioAte()?>">
    <br/><br/>
    <button type="submit">Enviar</button>
</form>