<?php
$this->layout = 'adminDefault';

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $question->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Question'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $question->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Question'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($question); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Question']) ?></legend>
    <?php
    echo $this->Form->input('question');
    echo $this->Form->input('screener_id');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
