<?php $view->extend('base.html.php')?>
<?php if(isset($msg)) echo $msg;?>
<form action="/cronograma/save" method="post">
    <label for="password">Local:</label>
    <select name="atividade" id="atividade">
        <option>Local</option>
        <?php foreach($atividade as $v):?>
            <option value="<?=$v->getId()?>"><?=$v->getLocal()?></option>
        <?php endforeach?>  
    </select>
    <br/>
    <label for="password">Horario Local:</label>
    <input type="text" value="Selecione um local antes" id="horario_atividade" readonly>
    <br/>
    <label for="password">Horarios:</label>
    <select name="horario" id="horario">
        <option>De - Ate</option>
        <?php foreach($horario as $v):?>
            <option value="<?=$v->getId()?>"><?=$v->getHorarioDe()." - ". $v->getHorarioAte()?></option>
        <?php endforeach?>  
    </select>
    <br/>
    <label for="password">Usuario:</label>
    <input type="text" value="Selecione um horario antes" id="user" readonly>
    <br/><br/>
    <button type="submit">Enviar</button>
</form>
<script>
$("#horario").change(function(){
    var horario_id = $(this).val();
    $.ajax({
        method: "post",
        dataType: "json",
        data: {id: horario_id},
        url: 'userByHorario'
    }).done(function(result){
        $("#user").val(result[0]['user_id']);
    });
});

$("#atividade").change(function(){
    var atividade_id = $(this).val();
    $.ajax({
        method: "post",
        dataType: "json",
        data: {id: atividade_id},
        url: 'horarioByLocal'
    }).done(function(result){
        $("#horario_atividade").val(result[0]['horario']);
    });
});
</script>