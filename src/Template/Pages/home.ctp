<div class="row">
    <div class="c4h-home-jumbo jumbotron">
        <h1>Champions for Health</h1>
        <p>A healthier you means a healthier Wales.</p>
    </div>
</div>

<div class="row">
    <h1 class="home-title">Thank you for taking part</h1>
  <div class="col-xs-12 col-sm-6 col-lg-6 left-Panel">
    <h3 class="home-title">BEFORE YOU GO</h3>
      <p>The 12 week health challenge has now ended.</p>

      <p>Please click on the <b>new feedback module</b> at the bottom of this page and tell us about your health and wellbeing now you have taken part. This is really important for us even if you only took part a few times.</p>
      
<p>You will find the questions below the new 'Feedback' module at the bottom of this page. You can also give us your feedback from there.</p>

      <p>If you used the wellbeing module please <b>ALSO</b> answer the 7 questions found in Week 12, ‘Try Now’</p>
  </div>

  <div class="col-xs-12 col-sm-6 col-lg-6 left-Panel">
    <h3 class="home-title">TELL US WHAT YOU THOUGHT</h3>
    <p>Please click on new feedback module at the bottom of this page and tell us how we can improve. What worked for you, what didn’t? what do you need?</p>
    <p>If you prefer to chat in person please email Menna.Brown@swansea.ac.uk</p>
    <p>We will be holding a small group session to learn more about what you want from this resource. <b<This is really important.</b> Without you we can’t make improvements. Lunch and refreshments will be provided.</p>
    <br>
    <h3 class="home-title">CERTIFICATE</h3>
    <p>Please get in touch if you would like a certificate for your CPD folder.</p>
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
