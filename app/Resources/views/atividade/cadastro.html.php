<?php $view->extend('base.html.php')?>
<?php if(isset($msg)) echo $msg;?>
<form action="/atividade/save" method="post">
    <label for="username">Local:</label>
    <input type="text" id="username" name="local" required/>
    <br/>
    <label for="password">Horario de:</label>
    <input type="text" id="password" name="horarioDe" required/>
    <br/>
    <label for="password">Horario ate:</label>
    <input type="text" id="password" name="horarioAte" required/>
    <br/>
    <label for="password">Descricao</label>
    <input type="text" id="password" name="descricao" />
    <br/>
    <label for="password">Quantidade</label>
    <select name="quantidade">
    <?php for($i=1;$i<=5;$i++):?>
        <option value="<?=$i?>"><?=$i?></option>
    <?php endfor?>    
    </select>
    <label for="password">Atividade Extra</label>
    <input type="checkbox" id="password" name="extra" />Sim
    <br/><br/>
    <button type="submit">Enviar</button>
</form>