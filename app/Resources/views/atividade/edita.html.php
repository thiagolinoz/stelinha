<?php $view->extend('base.html.php')?>
<?php if(isset($msg)) echo $msg;?>
<form action="/atividade/save/<?=$atividade->getId()?>" method="post">
    <label for="username">Local:</label>
    <input type="text" id="username" name="local" value="<?=$atividade->getLocal()?>" required/>
    <br/>
    <label for="password">Horario de:</label>
    <input type="text" id="password" name="horarioDe" value="<?=$atividade->getHorarioDe()?>" required placeholder="00"/>
    <label for="password">Horario ate:</label>
    <input type="text" id="password" name="horarioAte" value="<?=$atividade->getHorarioAte()?>" required placeholder="00"/>    
    <label for="password">Descricao:</label>
    <input type="text" id="password" name="descricao" value="<?=$atividade->getDescricao()?>" />
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

<script>
$(function(){

    var valor_check = "<?=$atividade->getExtra()?>";
    if(valor_check==1){
        $("input[name='extra']").prop( "checked", true );
    }

    $("select[name='quantidade'] option").each(function(){
        if($(this).val() == <?=$atividade->getQuantidade()?>){
            $(this).attr("selected","selected");
        }
    });
    
});       
</script>