<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Week'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="week form large-9 medium-8 columns content">
    <?= $this->Form->create($week) ?>
    <fieldset>
        <legend><?= __('Add Week') ?></legend>
        <?php
            echo $this->Form->input('useful');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
