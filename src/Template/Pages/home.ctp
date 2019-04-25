<div class="row">
    <div class="c4h-home-jumbo jumbotron">
        <h1>Champions for Health</h1>
        <p>A healthier you means a healthier Wales.</p>
    </div>
</div>

<div class="row">
  <div class="col-xs-12 col-sm-6 col-lg-6 left-Panel">
    <h3 class="home-title">What is Champions for Health?</h3>
    <p>Champions for Health is a FREE online health and wellbeing programme developed by researchers at Swansea University and Public Health Wales. Currently, it is available for staff across Abertawe Bro Morgannwg University Health Board. Please register to begin your health challenge 2019 and to use the wellbeing resources.</p>
  </div>

  <div class="col-xs-12 col-sm-6 col-lg-6 left-Panel">
    <h3 class="home-title">What will taking part involve?</h3>
    <p>If you choose to take part, you will need to submit some basic personal information to complete the online registration process.  </p>
    <p>You will be asked to select a health challenge to take part in. Each week you can chart your progress towards your personal goals and earn health points and trophies along the way. At the end of the FREE 12 week programme you will be asked to complete a questionnaire and to provide feedback which will help assess how effective it has been and help us improve it in the future.</p>
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
       <?php if ($profile->hospital == "Neath Port Talbot" && $user->role == ("new student" || "student")) { ?>
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
      <?php } else if ($user->role == ("student" || "new student")) { ?>
       <?php foreach($module as $module) if ($module->title != 'Dissertation demo' && $module->title != 'Feedback'){ ?>
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
       <?php } else if ($user->role == "admin") { ?>
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
