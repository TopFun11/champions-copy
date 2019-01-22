<?php
$this->layout = 'adminDefault';

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $exercise->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $exercise->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Exercise'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Recordset'), ['controller' => 'Recordset', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Recordset'), ['controller' => 'Recordset', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Question'), ['controller' => 'Question', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Question'), ['controller' => 'Question', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $exercise->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $exercise->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Exercise'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Recordset'), ['controller' => 'Recordset', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Recordset'), ['controller' => 'Recordset', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Question'), ['controller' => 'Question', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Question'), ['controller' => 'Question', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<pre><?= h($exercise) ?></pre>
<div class="row">
  <div class="col-xs-12">
    <h1>Exercise editor</h1>
  <?= $this->Form->create($exercise); ?>
  <fieldset>
      <legend><?= __('Add {0}', ['Exercise']) ?></legend>
      <?php
      echo $this->Form->input('section_id', ['options' => $sections, 'class'=>'form-control']);
      ?>
      <select id="type" class="form-control" >
        <option value="1">Can take exercise once only</option>
        <option value="2">Exercise is done weekly</option>
      </select>
  </fieldset>
  <div class="text-center"><br/>
  <div class="btn btn-success btn-lg" onClick="createExercise()">
    Save changes
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
        <?php foreach($exercise->question as $question): ?>
          <tr>
            <td><?= h($question->question)?></td>
            <td><?= h($question->type)?></td>
            <td>
              <?php foreach($question->question_option as $i => $option): ?>
                <?= h($option->text) ?>(<?= h($option->value) ?>) <?= $i == count($question->question_option) - 1 ? "" : "," ?>
              <?php endforeach; ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
</div>
<input id="module-exercise" type="hidden" value="<?= $exercise->id ?>"/>
<input id="question-being-worked-on" type="hidden"/>
<?= $this->Form->end() ?>
