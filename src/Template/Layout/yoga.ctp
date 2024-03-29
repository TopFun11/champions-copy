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

<?php
function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
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
     <?= $this->Html->css('/webroot/css/lazyYT.css')?>
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
                   <li><a href="/">Home</a>
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
                       <li><a href="/users/dashboard">Dashboard</a>
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
   <div class="row">
    <h1><center>Welcome!</center></h1>
    <p><center><b>Where to start?</b></center></p>
    <p><center>If you’re looking for quick fire tips go to Relaxation. If sleep is troubling you look here for suggestions, if you want inspiration look at the Green Space gallery.
     For a long-term wellbeing boost start with ACT week 1. Here 6 techniques are explained over 12 weeks in bite sized sections. The ‘Try Now’ activities are quick and easy, the ‘Try at Home’ exercises can be used when you have more time and get your headphones ready for the ‘Watch Now’ clips, guided meditations and breathing exercises.
     Each week you can enter your progress and track your activity over time in your personal dashboard.</center></p>
     <?php if(isMobile() == 0) { ?>
     <?php if($profile->hospital != "Singleton") { ?>
          <div id="module-game">
              <div id="yoga-girl">
                  <img class="img-responsive" src="/webroot/img/my-icons-collection/png/lotus-position.png" alt="‘Improve Your Well Being’ icon" class="img-thumnail" width="800">
              </div>
              <div class="mg-container" style="top:120px;left:-30px;">
                  <div class="mg-icon mg-icon-left wb">
                      <a href="#" data-toggle="modal" data-target="#relax">
                          <img class="img-responsive mg-fade" src="/webroot/img/my-icons-collection/png/coconaut.png">
                      </a>
                  </div>
                  <div class="mg-text text-right">
                      <p>Relaxation</p>
                  </div>
              </div>
              <div class="mg-container" style="top:120px;left:570px;">
                  <div class="mg-icon mg-icon-right wb">
                      <a href="#" data-toggle="modal" data-target="#sleep">
                          <img class="img-responsive mg-fade" src="/webroot/img/my-icons-collection/png/bed.png">
                      </a>
                  </div>
                  <div class="mg-text">
                      <p>Sleep</p>
                  </div>
              </div>
              <div class="mg-container" style="top:300px;left:650px;">
                  <div class="mg-icon mg-icon-right wb">
                      <a href="#" data-toggle="modal" data-target="#green-space">
                          <img class="img-responsive mg-fade" src="/webroot/img/my-icons-collection/png/mountain.png">
                      </a>
                  </div>
                  <div class="mg-text">
                      <p>Green Space</p>
                  </div>
              </div>
              <div class="mg-container" style="top:300px;left:-100px;">
                  <div class="mg-icon mg-icon-left wb">
                      <a href="#" data-toggle="modal" data-target="#act">
                          <img class="img-responsive mg-fade" src="/webroot/img/my-icons-collection/png/test.png">
                      </a>
                  </div>
                  <div class="mg-text text-right">
                      <p>ACT</p>
                  </div>
              </div>
          </div>
      </div>
      <?php } else { ?>
          <div id="module-game">
              <div id="yoga-girl">
                  <img class="img-responsive" src="/webroot/img/my-icons-collection/png/lotus-position.png" alt="‘Improve Your Well Being’ icon" class="img-thumnail" width="800">
              </div>
              <div class="mg-container" style="top:300px;left:-100px;">
                  <div class="mg-icon mg-icon-left wb">
                      <a href="#" data-toggle="modal" data-target="#act">
                          <img class="img-responsive mg-fade" src="/webroot/img/my-icons-collection/png/test.png">
                      </a>
                  </div>
                  <div class="mg-text text-right">
                      <p>ACT</p>
                  </div>
              </div>
              <div class="mg-container" style="top:120px;left:-30px;">
                  <div class="mg-icon mg-icon-left wb">
                      <a href="#" data-toggle="modal" data-target="#relax">
                          <img class="img-responsive mg-fade" src="/webroot/img/my-icons-collection/png/coconaut.png">
                      </a>
                  </div>
                  <div class="mg-text text-right">
                      <p>Relaxation</p>
                  </div>
              </div>
              <div class="mg-container" style="top:30px;left:330px;">
                  <div class="mg-icon mg-icon-right wb">
                      <a href="#" data-toggle="modal" data-target="#sleep">
                          <img class="img-responsive mg-fade" src="/webroot/img/my-icons-collection/png/bed.png">
                      </a>
                  </div>
                  <div class="mg-text">
                      <p>Sleep</p>
                  </div>
              </div>
              <div class="mg-container" style="top:120px;left:570px;">
                  <div class="mg-icon mg-icon-right wb">
                      <a href="#" data-toggle="modal" data-target="#green-space">
                          <img class="img-responsive mg-fade" src="/webroot/img/my-icons-collection/png/mountain.png">
                      </a>
                  </div>
                  <div class="mg-text">
                      <p>Green Space</p>
                  </div>
              </div>
              <div class="mg-container" style="top:300px;left:650px;">
                  <div class="mg-icon mg-icon-right wb">
                      <a href="#" data-toggle="modal" data-target="#pocketmedic">
                          <img class="img-responsive mg-fade" src="/webroot/img/my-icons-collection/png/pocketlogo.PNG">
                      </a>
                  </div>
                  <div class="mg-text">
                      <p>PocketMedic Wellbeing Films</p>
                  </div>
              </div>
          </div>
      </div>
     <?php } ?>
     <?php } else if(isMobile() == 1) { ?>
      <?php if($profile->hospital != "Singleton") { ?>
          <div id="module-game">
              <div class="row">
                  <div class="mg-icon mg-icon-right wb">
                      <a href="#" data-toggle="modal" data-target="#relax">
                          <img class="img-responsive mg-fade" src="/webroot/img/my-icons-collection/png/coconaut.png">
                      </a>
                  </div>
                  <div class="mg-text">
                      <p>Relaxation</p>
                  </div>
              </div>
              <div class="row">
                  <div class="mg-icon mg-icon-right wb">
                      <a href="#" data-toggle="modal" data-target="#sleep">
                          <img class="img-responsive mg-fade" src="/webroot/img/my-icons-collection/png/bed.png">
                      </a>
                  </div>
                  <div class="mg-text">
                      <p>Sleep</p>
                  </div>
              </div>
              <div class="row">
                  <div class="mg-icon mg-icon-right wb">
                      <a href="#" data-toggle="modal" data-target="#green-space">
                          <img class="img-responsive mg-fade" src="/webroot/img/my-icons-collection/png/mountain.png">
                      </a>
                  </div>
                  <div class="mg-text">
                      <p>Green Space</p>
                  </div>
              </div>
              <div class="row">
                  <div class="mg-icon mg-icon-right wb">
                      <a href="#" data-toggle="modal" data-target="#act">
                          <img class="img-responsive mg-fade" src="/webroot/img/my-icons-collection/png/test.png">
                      </a>
                  </div>
                  <div class="mg-text">
                      <p>ACT</p>
                  </div>
              </div>
          </div>
      </div>
      <?php } else { ?>
          <div id="module-game">
              <div class="row">
                  <div class="mg-icon mg-icon-right wb">
                      <a href="#" data-toggle="modal" data-target="#act">
                          <img class="img-responsive mg-fade" src="/webroot/img/my-icons-collection/png/test.png">
                      </a>
                  </div>
                  <div class="mg-text">
                      <p>ACT</p>
                  </div>
              </div>
              <div class="row">
                  <div class="mg-icon mg-icon-right wb">
                      <a href="#" data-toggle="modal" data-target="#relax">
                          <img class="img-responsive mg-fade" src="/webroot/img/my-icons-collection/png/coconaut.png">
                      </a>
                  </div>
                  <div class="mg-text">
                      <p>Relaxation</p>
                  </div>
              </div>
              <div class="row">
                  <div class="mg-icon mg-icon-right wb">
                      <a href="#" data-toggle="modal" data-target="#sleep">
                          <img class="img-responsive mg-fade" src="/webroot/img/my-icons-collection/png/bed.png">
                      </a>
                  </div>
                  <div class="mg-text">
                      <p>Sleep</p>
                  </div>
              </div>
              <div class="row">
                  <div class="mg-icon mg-icon-right wb">
                      <a href="#" data-toggle="modal" data-target="#green-space">
                          <img class="img-responsive mg-fade" src="/webroot/img/my-icons-collection/png/mountain.png">
                      </a>
                  </div>
                  <div class="mg-text">
                      <p>Green Space</p>
                  </div>
              </div>
              <div class="row">
                  <div class="mg-icon mg-icon-right wb">
                      <a href="#" data-toggle="modal" data-target="#pocketmedic">
                          <img class="img-responsive mg-fade" src="/webroot/img/my-icons-collection/png/pocketlogo.PNG">
                      </a>
                  </div>
                  <div class="mg-text">
                      <p>PocketMedic Wellbeing Films</p>
                  </div>
              </div>
          </div>
      </div>
     <?php } ?>
     <?php } ?>
    </div>
    <br/><br/>
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
    <script src="/webroot/js/lazyYT.js"></script>
    <script src="/webroot/js/app.js"></script>
</body>
</html>
