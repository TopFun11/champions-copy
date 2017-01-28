<?php
$this->layout = 'adminDefault';

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Screener'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Module'), ['controller' => 'Module', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Module'), ['controller' => 'Module', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Screener'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Module'), ['controller' => 'Module', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Module'), ['controller' => 'Module', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>

<?= $this->Form->create($screener); ?>
<div class="row">
  <div class="col-xs-12">
    <h1>Screener creator</h1>

    <label for="module-screener-threshold">Screener Pass threshold - This is the pass value that is calculated by the formula. 0 means there is no failure.</label>
    <input type="number" id="module-screener-threshold" class="form-control"  value="0"/>
    <div class="btn btn-success" onClick="createScreener()">Add questions</div>
  </div>
</div>
<?= $this->Form->end() ?>
<input type="hidden" id="module-id" value="<?= $moduleid ?>"/>
