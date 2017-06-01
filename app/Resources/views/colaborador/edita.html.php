<?php $view->extend('base.html.php')?>
<?php if(isset($msg)) echo $msg;?>
<form action="/colaborador/save/<?=$colaborador->getId()?>" method="post">
    <label for="username">Usuario:</label>
    <input type="text" id="username" name="User[username]" value="<?=$colaborador->getUsername()?>" required/>
    <br/>
    <label for="password">Nome:</label>
    <input type="text" id="password" name="User[nome]" value="<?=$colaborador->getNome()?>" required/>
    <br/>
    <label for="password">Email:</label>
    <input type="email" id="password" name="User[email]" value="<?=$colaborador->getEmail()?>" required/>
    <br/>
    <label for="password">Quarto:</label>
    <input type="text" id="password" name="User[quarto]" value="<?=$colaborador->getQuarto()?>" />
    <br/>
    <label for="password">Nivel:</label>
    <select name="User[role]">
    	<option value="admin">Administrador</option>
    	<option value="user">Colaborador</option>
    </select>
    <?php foreach($horario as $k => $v):?>
        <span class="container_horario">
            <label for="password">Dia Livre:</label>
            <select name="Horario[dia][<?=$k?>]">
                <option value="1">Segunda</option>
                <option value="2">Terca</option>
                <option value="3">Quarta</option>
                <option value="4">Quinta</option>
                <option value="5">Sexta</option>
                <option value="6">Sabado</option>
                <option value="7">Domingo</option>
            </select>
            <label for="password">Horario de:</label>
            <input type="text" id="password" name="Horario[horarioDe][<?=$k?>]" value="<?=$v->getHorarioDe()?>" required placeholder="00"/>
            <label for="password">Horario ate:</label>
            <input type="text" id="password" name="Horario[horarioAte][<?=$k?>]" value="<?=$v->getHorarioAte()?>" required placeholder="00"/>   
            <br/>
        </span>    
    <?php endforeach;?>
    <span class="container_vazio">
    </span>
    <button type="button" id="mais">+ Horarios</button>
    <button type="button" id="menos">- Horarios</button>
    <br/><br/>    
    <button type="submit">Enviar</button>
</form>

<script>
$(function(){
    var valor_cadastro = "<?=strtolower(substr($colaborador->getRole(), strpos($colaborador->getRole(),"_")+1))?>";
    $("select[name='User[role]'] option").each(function(){
        if($(this).val()==valor_cadastro){
            $(this).attr("selected","selected");
        }
    });
});

$(function(){
<?php foreach($horario as $k => $v):?>    
    var valor_cadastro = "<?=is_null($horario) ? '' : $v->getDia()?>";
    $("select[name='Horario[dia][<?=$k?>]'] option").each(function(){
        if($(this).val()==valor_cadastro){
            $(this).attr("selected","selected");
        }
    });
<?php endforeach;?>   
});

$(function(){
    var count = $(".container_horario").length;
    $("#mais").click(function(){
        count += 1;
        if(count <= 6){
            $(".container_vazio:last").html("<span class='container_horario'>\
            <label for='password'>Dia Livre:</label>\
            <select name='Horario[dia]["+count+"]'>\
                <option value='1'>Segunda</option>\
                <option value='2'>Terca</option>\
                <option value='3'>Quarta</option>\
                <option value='4'>Quinta</option>\
                <option value='5'>Sexta</option>\
                <option value='6'>Sabado</option>\
                <option value='7'>Domingo</option>\
            </select>\
             <label for='password'>Horario de:</label>\
            <input type='text' id='password' name='Horario[horario_de]["+count+"]' required placeholder='00:00'/>\
            <label for='password'>Horario ate:</label>\
            <input type='text' id='password' name='Horario[horario_ate]["+count+"]' required placeholder='00:00'/>\
            </span>\
            <span class='container_vazio'>\
            </span>");
        }
    });
    $("#menos").click(function(){
        $(".container_horario:last").remove();
    });
});       
</script>