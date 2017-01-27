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
  </div>
</div>
<div class="row">
  <div class="col-xs-6">
    <div class="form-group">
      <label for="screener-question">Question:</label>
      <input type="text" class="form-control" id="screener-question">
      <label for="screener-question-type">Type (How the user will answer the question):</label>
      <select id="screener-question-type" class="form-control">
        <option value=0>Textbox/Numerical value</option>
        <option value=1>Radio buttons (Single choice)</option>
        <option value=2>Checkboxes (Multiple choice)</option>
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
      <div class="btn btn-success">
        Save and add another
      </div>
      <div class="btn btn-default">
        Save and close
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
      <tbody>
        <td>A question</td>
        <td>A type</td>
        <td>Option1, Option2</td>
      </tbody>
    </table>
  </div>
</div>
<?= $this->Form->end() ?>
