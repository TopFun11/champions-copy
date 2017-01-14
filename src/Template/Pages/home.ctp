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
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
if (!Configure::read('debug')):
    throw new NotFoundException('Please replace src/Template/Pages/home.ctp with your own version.');
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
</head>
<body class="home">
  <div class="container">
      <div class="c4h-home-jumbo jumbotron" style="background-image:url('img/headers/home/bg.jpg')">
          <h1>Champions for Health</h1>
          <p>A healthier you, means a healthier Wales.</p>
      </div>
  </div>
  <div class="container">
      <div class="row">

          <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="c4h-home-module">
                  <div class="c4h-home-image">
                      <img class="img-responsive" src="img/png-fixed/apple.png" />
                  </div>
                  <div class="c4h-home-header">
                      Eat Healthily
                  </div>
                  <div class="c4h-home-text">
                      Text here
                  </div>
              </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="c4h-home-module">
                  <div class="c4h-home-image">
                      <img class="img-responsive" src="img/png-fixed/book.png" />
                  </div>
                  <div class="c4h-home-header">
                      Maintaining a Healthy Weight
                  </div>
                  <div class="c4h-home-text">
                      Text here
                  </div>
              </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="c4h-home-module">
                  <div class="c4h-home-image">
                      <img class="img-responsive" src="img/png-fixed/smoke.png" />
                  </div>
                  <div class="c4h-home-header">
                      Stop Smoking
                  </div>
                  <div class="c4h-home-text">
                      Text here
                  </div>
              </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="c4h-home-module">
                  <div class="c4h-home-image">
                      <img class="img-responsive" src="img/png-fixed/footsteps.png" />
                  </div>
                  <div class="c4h-home-header">
                      Take Regular Exercise
                  </div>
                  <div class="c4h-home-text">
                      Text here
                  </div>
              </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="c4h-home-module">
                  <div class="c4h-home-image">
                      <img class="img-responsive" src="img/png-fixed/glass.png" />
                  </div>
                  <div class="c4h-home-header">
                      Drink Safely
                  </div>
                  <div class="c4h-home-text">
                      Text here
                  </div>
              </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="c4h-home-module">
                  <div class="c4h-home-image">
                      <img class="img-responsive" src="img/png-fixed/brain.png" />
                  </div>
                  <div class="c4h-home-header">
                      Improve Your Well Being
                  </div>
                  <div class="c4h-home-text">
                      Text here
                  </div>
              </div>
          </div>

      </div>
  </div>
</body>
</html>
