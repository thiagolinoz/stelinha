<?php $view->extend('base.html.php')?>
<?php if ($error): ?>
    <div><?php echo $error->getMessage() ?></div>
<?php endif ?>

<form action="<?php echo $view['router']->path('login') ?>" method="post">
    <label for="username">Usuario:</label>
    <input type="text" id="username" name="_username" value="<?php echo $last_username ?>" />

    <label for="password">Senha:</label>
    <input type="password" id="password" name="_password" />

    <button type="submit">Enviar</button>
</form>