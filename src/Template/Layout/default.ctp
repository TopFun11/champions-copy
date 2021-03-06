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
    
    <?= $this->Html->script(['/webroot/js/jquery/jquery.min.js', '/webroot/js/bootstrap/bootstrap.min.js', 'https://cdnjs.cloudflare.com/ajax/libs/pwstrength-bootstrap/2.0.6/pwstrength-bootstrap.min.js']); ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
  <div id="alert_placeholder">
    <?= $this->Flash->render() ?>
  </div>
  <div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">
      <div class="container">
          <div class="navbar-header">
              <a class="navbar-brand" href="/"><img src="/webroot/img/logo.png" class="c4h-logo" /></a>
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
          </button>
          </div>
          <div class="collapse navbar-collapse navbar-menubuilder">
              <ul class="nav navbar-nav navbar-left">
                  <li><a href="/home">Home</a>
                  </li>
                  <li><a href="/about">About us</a>
                  </li>
                  <li><a href="/contact">Contact us</a>
                  </li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <?php
                $user = $this->request->session()->read('Auth.User');

                if(!$user){

                ?>
                  <li><a href="/users/login">Login</a>
                  </li>
                  <li><a href="/users/add">Register</a>
                  </li>
                  <?php
                }else{ ?>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <span class="caret"></span></a>
                    <ul class="dropdown-menu">

                      <li><a href="/profile/view">Profile</a>
                      </li>
                      <li><a href="/users/dashboard">User Dashboard</a>
                      </li>
                      <?php
                      if("admin" == $user['role']) {
                      ?>
                      <li><a href="/module/index">Admin Dashboard</a>
                      </li>
                      <?php
                      }
                      ?>
                      <li role="separator" class="divider"></li>
                      <li><a href="/users/logout">Log out</a>
                      </li>
                    </ul>
                  </li>


                <?php }
                  ?>
              </ul>
          </div>
      </div>
  </div>
    <div class="container clearfix">
    <?= $this->fetch('content') ?>
    </div>
    <footer class="footer">
      <div class="container">
        <ul class="nav">
            <li><a href="/accessibility">Accessibility</a></li>
            <li><a href="/terms">Terms of use</a></li>
            <li><a href="/privacy">Privacy statement</a></li>
            <li><a href="#">Back to top</a></li>
        </ul>
      </div>
    </footer>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-91401281-1', 'auto');
  ga('send', 'pageview');

</script>
    <script src="/webroot/js/app.js"></script>
</body>
</html>
