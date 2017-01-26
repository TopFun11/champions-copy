<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Profile'), ['action' => 'edit', $profile->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Profile'), ['action' => 'delete', $profile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profile->id)]) ?> </li>
<li><?= $this->Html->link(__('List Profile'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Profile'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Profile'), ['action' => 'edit', $profile->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Profile'), ['action' => 'delete', $profile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profile->id)]) ?> </li>
<li><?= $this->Html->link(__('List Profile'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Profile'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($profile->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Image') ?></td>
            <td><?= h($profile->image) ?></td>
        </tr>
        <tr>
            <td><?= __('Email') ?></td>
            <td><?= h($profile->email) ?></td>
        </tr>
        <tr>
            <td><?= __('Phone Number') ?></td>
            <td><?= h($profile->phone_number) ?></td>
        </tr>
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $profile->has('user') ? $this->Html->link($profile->user->id, ['controller' => 'Users', 'action' => 'view', $profile->user->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($profile->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Points') ?></td>
            <td><?= $this->Number->format($profile->points) ?></td>
        </tr>
    </table>
</div>

