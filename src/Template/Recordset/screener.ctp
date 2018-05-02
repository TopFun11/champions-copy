<?= $this->Form->create($recordset); ?>
<?=  $this->Form->hidden('screener_id', ['value' => $screener->id]); ?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($screener->module->title . ' screener') ?></h3>
    </div>
<!--<?= $screener ?>-->
  <?php foreach($screener->question as $question): ?>
      <div>
          <p><?= $question->question ?></p>
        </div>
        <div>
          <?= $this->QuestionAnswer->display($question);?>
        </div>

  <?php endforeach;?>
</div>
<?= $this->Form->button(__("Complete")); ?>
<?= $this->Form->end() ?>
