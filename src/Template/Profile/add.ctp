<?php
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Profile'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Profile'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($profile); ?>
<div class="row">
  <div class="col-xs-12">
    <h1>Add your phone number and email address</h1>
    <p class="lead">We will only use these to send occasional reminders and helpful information to you.</p>
    <?= $this->Form->create($profile); ?>
    <fieldset>
        <?php
        echo $this->Form->input('email',['class'=>'form-control','type'=>'email','placeholder'=>'joebloggs@email.com']);
        echo $this->Form->input('phone_number',['class'=>'form-control','type'=>'tel','placeholder'=>'Telephone number']);
        ?>
    </fieldset>
  </div>
  <div class="col-sm-12 text-center">
    <br/>
    <?= $this->Form->button(__('Finish registration'), ['class' => 'btn btn-success btn-lg']); ?>
  </div>
</div>
<?= $this->Form->end() ?>
