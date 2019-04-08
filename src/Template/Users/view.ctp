<?php
$this->layout = 'adminDefault';


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?php $condition = null;
      if ($profile->hospital == "Singleton") {
          $condition = "Wellbeing + PocketMedic";
      } else if ($profile->hospital == "Morriston") {
          $condition = "Wellbeing + Peer";
      } else if ($profile->hospital == "Neath Port Talbot") {
          $condition = "Control";
      } else {
          $condition = "Wellbeing";
      }
?>
<?php $emailCond = null;
      if ($profile->unsubscribed) {
            $emailCond = "Unsubscribed from Emails";
      } else {
            $emailCond = $profile->email;
      }
?>
<?php $phoneCond = null;
      if ($profile->unsubscribed) {
            $phoneCond = "Unsubscribed from SMS";
      } else {
            $phoneCond = $this->Number->format($profile->phone_number);
      }
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($user->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Username') ?></td>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <td><?= __('Password') ?></td>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <td><?= __('Role') ?></td>
            <td><?= h($user->role) ?></td>
        </tr>
        <tr>
            <td><?= __('Condition') ?></td>
            <td><?= h($condition) ?></td>
        </tr>
        <tr>
              <td><?= __('Email') ?></td>
              <td><?= h($emailCond) ?></td>
          </tr>
          <tr>
                <td><?= __('SMS') ?></td>
                <td><?= h($phoneCond) ?></td>
          </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
              <td><?=__('General Health') ?></td>
              <td><?= h($profile->general_health) ?></td>
        </tr>
        <tr>
              <td><?=__('Supervises Others?') ?></td>
              <td><?= h($profile->supervises) ?></td>
        </tr>
        <tr>
              <td><?=__('Days off Work') ?></td>
              <td><?= h($profile->days_off_work) ?></td>
        </tr>
        <tr>
              <td><?=__('Abscences Lasting A Week') ?></td>
              <td><?= h($profile->absences_lasting_a_week) ?></td>
        </tr>
        <tr>
              <td><?=__('General Work Performance') ?></td>
              <td><?= h($profile->work_performance) ?></td>
        </tr>
        <tr>
              <td><?=__('General Health') ?></td>
              <td><?= h($profile->general_health) ?></td>
        </tr>  
    </table>
</div>
