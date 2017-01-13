<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Formular'), ['action' => 'edit', $formular->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Formular'), ['action' => 'delete', $formular->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formular->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Formular'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formular'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="formular view large-9 medium-8 columns content">
    <h3><?= h($formular->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($formular->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($formular->id) ?></td>
        </tr>
    </table>
</div>
