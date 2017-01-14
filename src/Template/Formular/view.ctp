<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Formular'), ['action' => 'edit', $formular->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Formular'), ['action' => 'delete', $formular->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formular->id)]) ?> </li>
<li><?= $this->Html->link(__('List Formular'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Formular'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Screener'), ['controller' => 'Screener', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Screener'), ['controller' => 'Screener', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Formular Operators'), ['controller' => 'FormularOperators', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Formular Operator'), ['controller' => 'FormularOperators', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Formular Variables'), ['controller' => 'FormularVariables', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Formular Variable'), ['controller' => 'FormularVariables', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Formular'), ['action' => 'edit', $formular->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Formular'), ['action' => 'delete', $formular->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formular->id)]) ?> </li>
<li><?= $this->Html->link(__('List Formular'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Formular'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Screener'), ['controller' => 'Screener', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Screener'), ['controller' => 'Screener', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Formular Operators'), ['controller' => 'FormularOperators', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Formular Operator'), ['controller' => 'FormularOperators', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Formular Variables'), ['controller' => 'FormularVariables', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Formular Variable'), ['controller' => 'FormularVariables', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($formular->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($formular->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Screener') ?></td>
            <td><?= $formular->has('screener') ? $this->Html->link($formular->screener->Name, ['controller' => 'Screener', 'action' => 'view', $formular->screener->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($formular->id) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related FormularOperators') ?></h3>
    </div>
    <?php if (!empty($formular->formular_operators)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Formular Id') ?></th>
                <th><?= __('Operator') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($formular->formular_operators as $formularOperators): ?>
                <tr>
                    <td><?= h($formularOperators->id) ?></td>
                    <td><?= h($formularOperators->formular_id) ?></td>
                    <td><?= h($formularOperators->operator) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'FormularOperators', 'action' => 'view', $formularOperators->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'FormularOperators', 'action' => 'edit', $formularOperators->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'FormularOperators', 'action' => 'delete', $formularOperators->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formularOperators->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related FormularOperators</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related FormularVariables') ?></h3>
    </div>
    <?php if (!empty($formular->formular_variables)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Formular Id') ?></th>
                <th><?= __('Question Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($formular->formular_variables as $formularVariables): ?>
                <tr>
                    <td><?= h($formularVariables->id) ?></td>
                    <td><?= h($formularVariables->formular_id) ?></td>
                    <td><?= h($formularVariables->question_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'FormularVariables', 'action' => 'view', $formularVariables->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'FormularVariables', 'action' => 'edit', $formularVariables->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'FormularVariables', 'action' => 'delete', $formularVariables->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formularVariables->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related FormularVariables</p>
    <?php endif; ?>
</div>
