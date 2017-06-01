<?php $view->extend('base.html.php')?>
<?php if(isset($msg)) echo $msg;?>
<form action="/realizada/save" method="post">
    <label for="password">Selecione uma Atividade:</label>
    <select name="cronograma">
        <?php foreach($crono as $c):?>
            <option value="<?=$c->getId()?>"><?=$c->getAtividade()->getLocal()?></option>
        <?php endforeach?>  
    </select>
    <label for="password">Observacao:</label>
    <input type="text" name="observacao">
    <br/>
    <label for="password">Inicio:</label>
    <input type="text" name="horario_de">
    <br/>
    <label for="password">Fim:</label>
    <input type="text" name="horario_ate">
    <br/><br/>
    <button type="submit">Enviar</button>
</form>