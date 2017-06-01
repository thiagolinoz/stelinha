<?php $view->extend('base.html.php')?>
<?php if(isset($msg)) echo $msg;?>
<form action="/cronograma/save/<?=$crono[0]->getId()?>" method="post">
    <label for="username">Usuario:</label>
    <input type="text" id="username" value="<?=$crono[0]->getHorario()->getUser()->getNome()?>" readonly/>
    <br/>
    <label for="password">Local:</label>
    <input type="text" value="<?=$crono[0]->getAtividade()->getLocal()?>" readonly/>
    <input type="hidden" value="<?=$crono[0]->getAtividade()->getId()?>" name="atividade">
    <br/><br/>
    <label for="password">Horario de:</label>
    <input type="text" id="password" value="" name="horario_de"/>
    <br/><br/>
    <label for="password">Horario ate:</label>
    <input type="text" id="password" value="" name="horario_ate"/>
    <br/><br/>
    <label for="password">Observacao:</label>
    <textarea name="observacao"/></textarea>
    <br/><br/>
    <button type="submit">Enviar</button>
</form>