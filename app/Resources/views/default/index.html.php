<?php $view->extend('base.html.php')?>
Bem-Vindo Usuario: <?php echo $usuario->getNome() ?>
<br>
<?php if($view['security']->isGranted('ROLE_ADMIN')):?>
<a href='atividade/lista'>Atividade</a><br>
<a href='cronograma/lista'>Cronograma</a><br>
<a href='colaborador/lista'>Colaborador</a><br>
<?php endif; ?>
<a href="colaborador/edita/<?= $usuario->getId() ?>">Editar meu perfil</a><br>
<a href="atividade/extra">Atividade Extra</a><br>

<a href='logout'>logout</a>