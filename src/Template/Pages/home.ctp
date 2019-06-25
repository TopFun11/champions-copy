<div class="row">
    <div class="c4h-home-jumbo jumbotron">
        <h1>Champions for Health</h1>
        <p>A healthier you means a healthier Wales.</p>
    </div>
</div>

<div class="row">
    <h1 class="home-title">Welcome to Champions for Health: 12 week staff health challenge!</h1>
  <div class="col-xs-12 col-sm-6 col-lg-6 left-Panel">
    <h3 class="home-title">Why take part?</h3>
      <p>Changing your lifestyle and health choices can be difficult even when you are motivated and aware of the benefits!</p>

      <p>Champions is here to help!</p>
      
<p>Take the 12 week challenge and improve your health and wellbeing alongside your work colleagues.</p>

      <p><i>Your</i> employer has signed up to take part.</p>
  </div>

  <div class="col-xs-12 col-sm-6 col-lg-6 left-Panel">
    <h3 class="home-title">How do I take part?</h3>
    <ol>
        <li>Click on the register option on the top right of this page</li>
        <li>Complete the registration form</li>
        <li>Select a personal health challenge</li>
        <li>Visit the website to record and track your progress over the 12 weeks</li>
        <li>Earn health points and trophies</li>
      </ol>
      <p>At the same time, BOOST your wellbeing by trying out the weekly, bite sized interactive exercises and get that positive work life balance back.</p>
  </div>
</div>
<br>
<?php if($profile) { ?>
<?php if($profile->hospital == "Morriston") { ?>
<hr>
<div class="row" style="background-color:#aed6f1">
    <h2><center>Other users are improving their health every day. Get started here!</center></h2>
</div>
<?php } ?>
<?php } ?>
<br>
<?php if ($module) {?>
  <hr>
  
  <div class="container">
   <div class="row display-flex">
       <?php if ($profile) { ?>
       <?php if ($profile->hospital == "Neath Port Talbot") { ?>
        <?php foreach($module as $module) if ($module->title != 'Dissertation demo' && $module->title != 'Wellbeing'){ ?>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="box">
                    <div class="icon">
                        <div class="image"><img class="img-responsive" src="<?= h($module->icon) ?>" /></div>
                        <div class="info">
                            <h3 class="title"><?= h($module->title) ?></h3>
                            <p>
                                <?= $module->description_text ?>
                            </p>
                            <div class="more">
                                <a href="/module/overview/<?=$module->id?>" title="Title Link">
                                    <?php if ($module->enrolled > 0) { ?>
                                        Take Part <i class="fa fa-angle-double-right"></i>
                                    <?php } else { ?>
                                        Enrol <i class="fa fa-angle-double-right"></i>
                                    <?php } ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="space"></div>
                </div>
            </div>
       <?php } ?>
      <?php } else if ($user->role != 'admin') { ?>
       <?php foreach($module as $module) if ($module->title != 'Dissertation demo'){ ?>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="box">
                    <div class="icon">
                        <div class="image"><img class="img-responsive" src="<?= h($module->icon) ?>" /></div>
                        <div class="info">
                            <h3 class="title"><?= h($module->title) ?></h3>
                            <p>
                                <?= $module->description_text ?>
                            </p>
                            <div class="more">
                                <a href="/module/overview/<?=$module->id?>" title="Title Link">
                                    <?php if ($module->enrolled > 0) { ?>
                                        Take Part <i class="fa fa-angle-double-right"></i>
                                    <?php } else { ?>
                                        Enrol <i class="fa fa-angle-double-right"></i>
                                    <?php } ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="space"></div>
                </div>
            </div>
       <?php } ?>
       <?php } else { ?>
            <?php foreach($module as $module) if ($module->title != 'Dissertation demo') { ?>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="box">
                    <div class="icon">
                        <div class="image"><img class="img-responsive" src="<?= h($module->icon) ?>" /></div>
                        <div class="info">
                            <h3 class="title"><?= h($module->title) ?></h3>
                            <p>
                                <?= $module->description_text ?>
                            </p>
                            <div class="more">
                                <a href="/module/overview/<?=$module->id?>" title="Title Link">
                                    <?php if ($module->enrolled > 0) { ?>
                                        Take Part <i class="fa fa-angle-double-right"></i>
                                    <?php } else { ?>
                                        Enrol <i class="fa fa-angle-double-right"></i>
                                    <?php } ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="space"></div>
                </div>
            </div>
       <?php } ?>
       <?php } ?>
       <?php } else { ?>
        <?php foreach($module as $module) if ($module->title != 'Dissertation demo' && $module->title != 'Wellbeing' && $module->title != 'Feedback'){ ?>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="box">
                    <div class="icon">
                        <div class="image"><img class="img-responsive" src="<?= h($module->icon) ?>" /></div>
                        <div class="info">
                            <h3 class="title"><?= h($module->title) ?></h3>
                            <p>
                                <?= $module->description_text ?>
                            </p>
                            <div class="more">
                                <a href="/module/overview/<?=$module->id?>" title="Title Link">
                                    <?php if ($module->enrolled > 0) { ?>
                                        Take Part <i class="fa fa-angle-double-right"></i>
                                    <?php } else { ?>
                                        Enrol <i class="fa fa-angle-double-right"></i>
                                    <?php } ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="space"></div>
                </div>
            </div>
       <?php } ?>
       <?php } ?>
   </div>
</div>
<?php } ?>
