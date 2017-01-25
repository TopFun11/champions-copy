<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $module->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $module->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Module'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $module->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $module->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Module'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
  <?php
  //$this->extend('../Layout/TwitterBootstrap/dashboard');
  $this->start('tb_actions');
  ?>
      <li><?= $this->Html->link(__('List Module'), ['action' => 'index']) ?></li>
      <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?> </li>
      <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?> </li>
  <?php
  $this->end();
  $this->start('tb_sidebar');
  ?>

  <ul class="nav nav-sidebar">
      <li><?= $this->Html->link(__('List Module'), ['action' => 'index']) ?></li>
      <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?> </li>
      <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?> </li>
  </ul>
  <?php
  $this->end();
  ?>
  <pre><?= h($module) ?></pre>
  <div class="container">
    <?= $this->Form->create($module); ?>
    <div class="row">
      <div class="col-xs-12">
        <h1>Module editor</h1>
      </div>
      <div class="col-xs-4">
        <div class="form-group">
          <label for="usr">Module name:</label>
          <?php
          echo $this->Form->input('title',['class="form-control"','label'=>false]);
          ?>
        </div>
      </div>
      <div class="col-xs-4">
        <div class="form-group">
          <label for="usr">Icon path:</label>
          <?php
          echo $this->Form->input('icon',['class="form-control"','label'=>false]);
          ?>
        </div>
      </div>
      <div class="col-xs-4">
        <div class="form-group">
          <label for="usr">Banner path:</label>
          <?php
          echo $this->Form->input('banner',['class="form-control"','label'=>false]);
          ?>
        </div>
      </div>
    </div>
    <div class="row" id="md">
      <label for="usr">Module description:</label>
      <div class="col-xs-11 ed-display">
        <div class="module-section ed-preview">
          <?=$module->has('description_text') ? $module->description_text : "ass"?>
        </div>
        <div class="ed-editor">
          <label for="comment">Module description:</label>
          <?php
          echo $this->Form->textarea('description_text',['class="form-control"','label'=>false, 'id' => 'description_text']);
          ?>
        </div>
      </div>
      <div class="col-xs-1 text-right">
        <div class="btn btn-sm btn-success md-button" onclick="openPartEditor(this)">
          Add/Edit
        </div>
      </div>
    </div>
    <?= $this->Form->end() ?>
    <div class="row" id="sc">
      <label>Screener questionnaire</label>
      <div class="col-xs-11 ed-display">
        <div class="ed-preview">
          No Screener
          <h3>Screener details</h3>
          <table class="table">
            <div class="row">
              <div class="col-xs-12">
                Pass threshold: 0
              </div>
            </div>
          <h3>Question details</h3>
          <table class="table">
            <thead>
              <tr>
                <th>Question</th>
                <th>Type</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
          <?php foreach($module->screener->question as $question):?>
            <tr>
              <td><?=h($question->question)?></td>
              <td><?=h($question->type)?></td>
              <td>
                
                <?php foreach($question->question_option as $qo):?>
                  <?=h($qo->text)?>,
                <?php endforeach; ?>
              </td>
            </tr>
          <?php endforeach;?>
          </tbody>
        </table>
        </div>
        <div class="ed-editor">
          <input type="hidden" id="module-id" value="<?=$this->Number->format($module->id)?>"/>
          <input type="hidden" id="module-name" value="<?=h($module->title)?>"/>
          <input type="hidden" id="module-screener" value="<?=$module->has('screener') ? $this->Number->format($module->screener->id) : "ass"?>"/>
          <input type="hidden" id="question-being-worked-on"/>
          <div class="form-group">
            <!--TODO: Add code to allow editing of questions, options, etc-->
            <div class="row">
              <div class="col-xs-12">
                <!--TODO: Add code to display questions attached to screener along with edit and delete options-->
                <h3>Step 1: Set the pass threshold</h3>
              </div>
              <div class="col-xs-12">
                <label for="module-screener-threshold">Screener Pass threshold - This is the pass value that is calculated by the formula. 0 means there is no failure.</label>
                <input type="number" id="module-screener-threshold" class="form-control"  value="<?=$module->has('screener') ? $this->Number->format($module->screener->threshold) : "0"?>"/>
              </div>
              <div class="col-xs-12">
                <h3>Step 2: Add a question</h3>
                <!--TODO: Go ahead and create code to firstly allow user to input and then to iteratively add each option to the question-->
              </div>
              <div class="col-xs-12">
                <label for="screener-question">Question:</label>
                <input type="text" class="form-control" id="screener-question">
                <div class="btn btn-success" onclick="addQuestion()">
                  Save question
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <h3>Step 3: Define how users should answer your question</h3>
            </div>
            <div class="col-xs-12">
              <label for="screener-question-type">Type (How the user will answer the question):</label>
              <select id="screener-question-type" class="form-control">
                <option value=0>Textbox/Numerical value</option>
                <option value=1>Radio buttons (Single choice)</option>
                <option value=2>Checkboxes (Multiple choice)</option>
              </select>
            </div>
            <div class="option-input">

              <div class="col-xs-9 multioption-text">
                <label for="multioption">Options user can pick from:</label>
              </div>
              <div class="col-xs-3 multioption-value">
                <label for="multioption">Score:</label>
              </div>
            </div>
            <div class="col-xs-12">

            <div class="btn btn-success" onclick="addQuestion()">
              Save Options
            </div>
          </div>
          </div>
        </div>
      </div>
      <div class="col-xs-1">
        <div class="btn btn-sm btn-success" onclick="openPartEditor(this)">
          Add/Edit
        </div>
      </div>
    </div>

    <div class="row" id="sd">
      <label for="usr">Module sections:</label>
      <div class="col-xs-11 ed-display">
        <div class="module-section ed-preview">
          <table class="table">
            <thead>
              <tr>
                <th>Section name:</th>
                <th>Enroll criteria:</th>
                <th>Number of questions:</th>
                <th class="text-right"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Introduction</td>
                <td>None</td>
                <td>None</t</div>

            </tbody>
          </table>
        </div>
        <div class="ed-editor">
          <label for="comment">Section text:</label>
          <textarea></textarea>
          <label for="comment">Questions after section:</label>
          <div class="text-right">
            <div class="btn btn-sm btn-success">
              Add question
            </div>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th>Question:</th>
                <th>Type of answer:</th>
                <th>Number of options:</th>
                <th class="text-right"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>How many buckets do you own?</td>
                <td>Radiobox</td>
                <td>5</td>
                <td class="glyph-buttons text-right"><i class="glyphicon glyphicon-edit"></i><i class="glyphicon glyphicon-trash"></i>
              </tr>
            </tbody>
          </table>
          <div class="aq">
            <div class="form-group">
              <label for="usr">Question:</label>
              <input type="text" class="form-control" id="usr">
              <label for="usr">Type:</label>
              <select class="form-control">
                <option>Textbox</option>
                <option>Multiple choice</option>
                <option>Radio box</option>
              </select>
              <div class="multioption-input">
                <label for="multioption">Options user can pick from:</label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-1 text-right">
        <div class="btn btn-sm btn-success md-button" onclick="toggleModuleCreatorField(this)">
          Add
        </div>
      </div>
    </div>
  </div>
