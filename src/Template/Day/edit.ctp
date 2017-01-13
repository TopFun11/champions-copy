<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $day->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $day->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Day'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="day form large-9 medium-8 columns content">
    <?= $this->Form->create($day) ?>
    <fieldset>
        <legend><?= __('Edit Day') ?></legend>
        <?php
            echo $this->Form->input('amount');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
