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
      } else if ($profile->hospital == "Community" || "Princess of Wales") {
          $condition = "Wellbeing Q";
      } else {
          $condition = "None Given";
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
<?php $profile->wemwbs_score = $profile->wembs_optimism + $profile->wembs_useful + $profile->wembs_relaxed + $profile->wembs_relaxed + $profile->interested_in_people + $profile->wembs_spare_energy + $profile->wembs_dealing_with_problems_well + $profile->wembs_thinking_clearly + $profile->wembs_good_about_self + $profile->wembs_close_to_others + $profile->wembs_feeling_confident + $profile->wembs_make_mind_up + $profile->wembs_loved + $profile->wembs_interested_in_new_things + $profile->wembs_cheerful; ?>
<?php $profile->phq4_score = $profile->phq_anxious + $profile->phq_worrying + $profile->phq_interest_please + $profile->phq_depressed; ?>
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
              <td><?=__('Age') ?></td>
              <td>
              <?php
               switch ($profile->age) {
                 case "band1":
                  echo "18-25";
                  break;
                case "band2":
                  echo "26-35";
                  break;
                case "band3":
                  echo "36-45";
                  break;
                case "band4":
                  echo "46-55";
                  break;
                case "band5":
                  echo "56-65";
                  break;
                case "band6":
                  echo "65+";
                  break;
                default:
                  echo "Unspecified";
                  break;
               }
               ?>
               </td>
        </tr>
        <tr>
              <td><?=__('Gender') ?></td>
              <td><?= h($profile->gender) ?></td>
        </tr>  
        <tr>
              <td><?=__('Hospital Board') ?></td>
              <td><?= h($profile->hospital) ?></td>
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
              <td><?=__('WEMWBS Score') ?></td>
              <td><?= h($profile->wemwbs_score) ?></td>
        </tr>
        <tr>
              <td><?=__('PHQ4 Score') ?></td>
              <td><?= h($profile->phq4_score) ?></td>
        </tr>    
    </table>
</div>
