<?php
if($module->theme) {
  $this->layout = $module->theme;
}
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Module'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?> </li>
<?php
$this->end();
$this->start('tb_sidebar');
?>
    <li><?= $this->Html->link(__('List Module'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?> </li>
<?php
$this->end();
?>

<!--<pre>
<?= h($module); ?>
</pre>-->
  <div class="row">
    <div class="c4h-home-jumbo jumbotron" style="background-image:url('<?= ($module->banner) ?>')">
        <h1><?= ($module->title) ?></h1>
        <p> <?= ($module->description) ?> </p>
    </div>
  </div>
  <div class="row">
    <ul class="nav nav-pills">
      <?php
        $active = false;
        foreach($module->sections as $section):
        if (!$active):
          $active = true;
      ?>
      <li class="active"><a data-toggle="pill" href="#s<?= $section->id ?>"><?= $section->title;?></a></li>
    <?php else: ?>
      <li><a data-toggle="pill" href="#s<?= $section->id ?>"><?= $section->title;?></a></li>
    <?php endif; endforeach; ?>
    </ul>
    <div class="tab-content">

    <?php
        foreach($module->sections as $section):
        if ($active):
          $active = false;
    ?>
          <div id="s<?= $section->id ?>" class="tab-pane fade in active">
            <?= $section->content;?>
            <?php if($section->exercises != null):
              echo $this->Exercise->display($section->exercises);
              ?>

             <?php endif;  ?>
          </div>
          <?php
        else:
          ?>
          <div id="s<?= $section->id ?>" class="tab-pane fade">
            <?= $section->content;?>
            <?php if($section->exercises != null):
              echo $this->Exercise->display($section->exercises);
              ?>

             <?php endif;  ?>
          </div>
        <?php endif; endforeach; ?>
        </div>
  </div>
