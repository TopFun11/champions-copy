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
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="c4h-home-module">
                <div class="c4h-home-image">
                    <img class="img-responsive" src="<?= h($module->icon) ?>" />
                </div>
                <div class="c4h-home-header">
                    <?= h($module->title) ?>
                </div>
                <div class="c4h-home-text">
                    <?= $module->description_text ?>
                </div>
            </div>
        </div>
      <?php endforeach; ?>
    </div>
</div>
