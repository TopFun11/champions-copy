<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Champions for Health';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('/webroot/css/bootstrap/bootstrap.min.css'); ?>
    <?= $this->Html->css('/webroot/css/champions/app.css'); ?>
    <?= $this->Html->css('/webroot/css/bootstrap-treeview.css')?>
    <?= $this->Html->script(['/webroot/js/jquery/jquery.min.js', '/webroot/js/bootstrap/bootstrap.min.js']); ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
  <div id="alert_placeholder">
    <!--what?!-->
  </div>
<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">C4H Admin</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="/module/">Modules</a></li>
        <li><a href="/screener/">Screeners</a></li>
        <li><a href="/sections/">Sections</a></li>
        <li><a href="/users/">Users</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Actions <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?= $this->Fetch("tb_sidebar");?>
            <li role="separator" class="divider"></li>
            <li><a href="/users/logout">Log out</a></li>
          </ul>
          <li><a href="#"><i class="glyphicon glyphicon-user"></i></a></li>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container clearfix">
<?= $this->fetch('content') ?>
</div>

<footer class="footer">
  <div class="container">
    <a href="/accessibility">Accessibility</a><br/><a href="/terms">Terms of use</a><br/><a href="/privacy">Privacy statement</a><br/><a href="#">Back to top</a>
  </div>
</footer>
<script src="/webroot/js/bootstrap-treeview.js"></script>
<script src="/webroot/js/app.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.2/tinymce.min.js"></script>
</body>
</html>
