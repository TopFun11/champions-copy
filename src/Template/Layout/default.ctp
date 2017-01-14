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

$cakeDescription = 'CakePHP: the rapid development php framework';
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
    <?= $this->Html->script(['/webroot/js/jquery/jquery.min.js', '/webroot/js/bootstrap/bootstrap.min.js']); ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
  <div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">
      <div class="container">
          <div class="navbar-header">
              <a class="navbar-brand" href="#"><img src="/webroot/img/logo.png" class="c4h-logo" /></a>
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
          </button>
          </div>
          <div class="collapse navbar-collapse navbar-menubuilder">
              <ul class="nav navbar-nav navbar-left">
                  <li><a href="/">Home</a>
                  </li>
                  <li><a href="/products">About us</a>
                  </li>
                  <li><a href="/about-us">Explore Modules</a>
                  </li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                  <li><a href="/">Login</a>
                  </li>
                  <li><a href="/products">Register</a>
                  </li>
              </ul>
          </div>
      </div>
  </div>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer class="footer">
      <div class="container">
        <a href="#">Accessibility</a><br/><a href="#">Terms of use</a><br/><a href="#">Privacy statement</a><br/><a href="#">Back to top</a>
      </div>
    </footer>
</body>
</html>
