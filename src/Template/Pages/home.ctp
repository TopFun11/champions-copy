<div class="row">
    <div class="c4h-home-jumbo jumbotron">
        <h1>Champions for Health</h1>
        <p>A healthier you means a healthier Wales.</p>
    </div>
</div>

<div class="row">
  <div class="col-xs-12 col-sm-6 col-lg-6 left-Panel">
    <h3 class="home-title">What is Champions for Health?</h3>
    <p>Champions for Health is an all-Wales campaign which is encouraging NHS staff to become healthier and also encourages the public to do the same. Registration is currently open to staff within Abertawe Bro Morgannwg University Health Board.</p>
  </div>

  <div class="col-xs-12 col-sm-6 col-lg-6 left-Panel">
    <h3 class="home-title">What will taking part involve?</h3>
    <p>If you choose to take part, you will need to submit some basic personal information to complete the online registration process. </p>
    <p>You will be asked to select which lifestyle topic areas you would like to focus on, and then chart your progress towards your personal goals. You will also be asked some online evaluation-based questions at the end of the campaign which will help assess how effective it has been and help us improve it in the future.</p>
  </div>
</div>

<br>
<br>
<?php if ($module) {?>
  <hr>
  
  <div class="container">
   <div class="row display-flex">
       <?php if ($profile) { ?>
       <?php if ($profile->hospital != "Morriston") { ?>
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
       <?php } ?>
   </div>
</div>
<?php } ?>
