<?= $this->layout = 'adminDefault'; ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Week'), ['action' => 'edit', $week->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Week'), ['action' => 'delete', $week->id], ['confirm' => __('Are you sure you want to delete # {0}?', $week->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Week'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Week'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="week view large-9 medium-8 columns content">
    <h3><?= h($week->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Useful') ?></th>
            <td><?= h($week->useful) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($week->id) ?></td>
        </tr>
    </table>
</div>
