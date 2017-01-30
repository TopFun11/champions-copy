<?php
$this->layout = 'adminDefault';


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Exercise'), ['action' => 'edit', $exercise->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Exercise'), ['action' => 'delete', $exercise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exercise->id)]) ?> </li>
<li><?= $this->Html->link(__('List Exercise'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Exercise'), ['action' => 'add']) ?> </li>
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
<li><?= $this->Html->link(__('Edit Exercise'), ['action' => 'edit', $exercise->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Exercise'), ['action' => 'delete', $exercise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exercise->id)]) ?> </li>
<li><?= $this->Html->link(__('List Exercise'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Exercise'), ['action' => 'add']) ?> </li>
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
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($exercise->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Section') ?></td>
            <td><?= $exercise->has('section') ? $this->Html->link($exercise->section->title, ['controller' => 'Sections', 'action' => 'view', $exercise->section->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($exercise->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Type') ?></td>
            <td><?= $this->Number->format($exercise->type) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Recordset') ?></h3>
    </div>
    <?php if (!empty($exercise->recordset)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Screener Id') ?></th>
                <th><?= __('Exercise Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($exercise->recordset as $recordset): ?>
                <tr>
                    <td><?= h($recordset->id) ?></td>
                    <td><?= h($recordset->user_id) ?></td>
                    <td><?= h($recordset->screener_id) ?></td>
                    <td><?= h($recordset->exercise_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Recordset', 'action' => 'view', $recordset->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Recordset', 'action' => 'edit', $recordset->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Recordset', 'action' => 'delete', $recordset->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recordset->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Recordset</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Question') ?></h3>
    </div>
    <?php if (!empty($exercise->question)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Screener Id') ?></th>
                <th><?= __('Question') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Exercise Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($exercise->question as $question): ?>
                <tr>
                    <td><?= h($question->id) ?></td>
                    <td><?= h($question->screener_id) ?></td>
                    <td><?= h($question->question) ?></td>
                    <td><?= h($question->type) ?></td>
                    <td><?= h($question->exercise_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Question', 'action' => 'view', $question->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Question', 'action' => 'edit', $question->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Question', 'action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Question</p>
    <?php endif; ?>
</div>
