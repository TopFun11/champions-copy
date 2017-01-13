<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Module'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="module view large-9 medium-8 columns content">
    <h3><?= h($module->title) ?></h3>
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#details">Details</a></li>
      <li><a data-toggle="tab" href="#sections">Sections</a></li>
    </ul>

<div class="tab-content">
  <div id="details" class="tab-pane fade in active">
    <h3>Details</h3>
    <div class="module form large-9 medium-8 columns content">
      <?= $this->Form->create($module) ?>
      <fieldset>
          <legend><?= __('Add Module') ?></legend>
          <?php
              echo $this->Form->input('title');
          ?>
      </fieldset>
      <?= $this->Form->button(__('Submit')) ?>
      <?= $this->Form->end() ?>
    </div>
  </div>
  <div id="sections" class="tab-pane fade">
    <h3>Sections</h3>
    <p><!--TODO--></p>
  </div>
</div>
