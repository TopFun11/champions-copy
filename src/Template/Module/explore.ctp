<?php
/* @var $this \Cake\View\View */
?>
<div class="container">
    <div class="c4h-home-jumbo jumbotron" style="background-image:url('/webroot/img/headers/home/bg.jpg')">
        <h1>Champions for Health</h1>
        <p>A healthier you, means a healthier Wales.</p>
    </div>
</div>


<div class="container">
    <div class="row">
      <?php foreach($module as $module): ?>
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
                                  Read More <i class="fa fa-angle-double-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="space"></div>
            </div>
        </div>
      <?php endforeach; ?>
    </div>
</div>
