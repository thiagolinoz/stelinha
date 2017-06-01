<?php $view->extend('base.html.php')?>
<?php if(isset($msg)) echo $msg;?>
<form action="/colaborador/save" method="post">
    <label for="username">Usuario:</label>
    <input type="text" id="username" name="User[username]" required/>
    <br/>
    <label for="password">Senha:</label>
    <input type="password" id="password" name="User[password]" required/>
    <br/>
    <label for="password">Nome:</label>
    <input type="text" id="password" name="User[nome]" required/>
    <br/>
    <label for="password">Email:</label>
    <input type="email" id="password" name="User[email]" required/>
    <br/>
    <label for="password">Quarto:</label>
    <input type="text" id="password" name="User[quarto]" />
    <br/>
    <label for="password">Nivel:</label>
    <select name="User[role]">
    	<option value="admin">Administrador</option>
    	<option value="user">Colaborador</option>
    </select>
    <span class="container_horario">
        <label for="password">Dia Livre:</label>
        <select name="Horario[dia][1]">
            <option value="1">Segunda</option>
            <option value="2">Terca</option>
            <option value="3">Quarta</option>
            <option value="4">Quinta</option>
            <option value="5">Sexta</option>
            <option value="6">Sabado</option>
            <option value="7">Domingo</option>
        </select>
        <label for="password">Horario de:</label>
        <input type="text" id="password" name="Horario[horarioDe][1]" required placeholder="00:00"/>
        <label for="password">Horario ate:</label>
        <input type="text" id="password" name="Horario[horarioAte][1]" required placeholder="00:00"/>
        <br/>
    </span>
    <span class="container_vazio">
    </span>
    <button type="button" id="mais">+ Horarios</button>
    <button type="button" id="menos">- Horarios</button>
    <br/><br/>
    <button type="submit">Enviar</button>
</form>
<script>
$(function(){
    var count = $(".container_horario").length;
    console.log(count);
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
            <input type='text' id='password' name='Horario[horarioDe]["+count+"]' required placeholder='00:00'/>\
            <label for='password'>Horario ate:</label>\
            <input type='text' id='password' name='Horario[horarioAte]["+count+"]' required placeholder='00:00'/>\
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