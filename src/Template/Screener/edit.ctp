<?php
$this->layout = 'adminDefault';

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $screener->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $screener->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Screener'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Module'), ['controller' => 'Module', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Module'), ['controller' => 'Module', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $screener->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $screener->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Screener'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Module'), ['controller' => 'Module', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Module'), ['controller' => 'Module', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($screener); ?>
<div class="form-group">
  <!--TODO: Add code to allow editing of questions, options, etc-->
  <div class="row">
    <div class="col-xs-12">
      <!--TODO: Add code to display questions attached to screener along with edit and delete options-->
      <h3>Edit screener</h3>
    </div>
    <div class="col-xs-9">
      <label for="module_id">Module to associate this screener with:</label>
      <?=  $this->Form->input('module_id', ['options' => $module,'class="form-control"','label'=>false]) ?>
    </div>
    <div class="col-xs-3">
      <label for="module_id">Threshold for pass:</label>
      <input type="number" id="threshold" name="threshold" class="form-control" placeholder="Pass threshold" value="<?= $screener->threshold ?>"/>
      <input type="hidden" id="Name" name="Name" value="Screener"/>
    </div>
    <div class="col-xs-12 text-center">
      <br/>
      <?= $this->Form->button("Save changes", ['class="btn btn-success btn-lg"']); ?>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-6">
    <div class="form-group">
      <label for="screener-question">Question:</label>
      <input type="text" class="form-control" id="screener-question">
      <label for="screener-question-type">Type (How the user will answer the question):</label>
      <select id="screener-question-type" class="form-control">
        <option value=0>Text value</option>
        <option value=1>Radio buttons (Single choice)</option>
        <option value=2>Checkboxes (Multiple choice)</option>
        <option value=3>Numerical value</option>
      </select>
      <div class="option-input">
        <div class="row">
          <div class="col-xs-9 multioption-text">
            <label for="multioption">Options user can pick from:</label>
          </div>
          <div class="col-xs-3 multioption-value">
            <label for="multioption">Score:</label>
          </div>
        </div>
      </div>
    </div>
    <div class="text-right">
      <div class="btn btn-success" onClick="processQuestion()">
        Save and add another
      </div>
    </div>
  </div>
  <div class="col-xs-6">
    <h4>Currently added questions:</h4>
    <table class="table">
      <thead>
        <tr>
          <th>Question</th>
          <th>Type</th>
          <th>Options</th>
        </tr>
      </thead>
      <tbody id="questions-added">
        <?php
        foreach($questions as $question) {
        ?>
        <tr>
          <td><?=$question->question?></td>
          <td><?=$question->type?></td>
          <td>
            <?= $this->Form->postLink('', ['controller' => 'Question', 'action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash', 'method' => 'DELETE']) ?>
          </td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
<input id="module-screener" type="hidden" value="<?= $screener->id?>"/>
<input id="question-being-worked-on" type="hidden"/>
<?= $this->Form->end() ?>
