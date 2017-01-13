<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Screener'), ['action' => 'edit', $screener->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Screener'), ['action' => 'delete', $screener->id], ['confirm' => __('Are you sure you want to delete # {0}?', $screener->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Screener'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Screener'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="screener view large-9 medium-8 columns content">
    <h3><?= h($screener->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($screener->Name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($screener->id) ?></td>
        </tr>
    </table>
</div>
