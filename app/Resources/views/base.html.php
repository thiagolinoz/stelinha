<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php $view['slots']->output('title', 'Oraganizador de Tarefas') ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Le styles -->
        <link href="<?php echo $view['assets']->getUrl('css/bootstrap.css')?>" rel="stylesheet">
        <link href="<?php echo $view['assets']->getUrl('css/bootstrap-responsive.css')?>" rel="stylesheet">
        <link href="<?php echo $view['assets']->getUrl('css/estilo_admin.css')?>" rel="stylesheet">
        
        <script async src="<?php echo $view['assets']->getUrl('js/jquery.js')?>"></script>
        <script src="<?php echo $view['assets']->getUrl('js/bootstrap.js')?>"></script>
        <script src="<?php echo $view['assets']->getUrl('js/ckeditor/ckeditor.js')?>"></script>

        
    </head>
    <body>
    
        <div id="sidebar">
            
        </div>
            <?php $view['slots']->output('_content') ?>

    </body>
</html>