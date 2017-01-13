<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Day'), ['action' => 'edit', $day->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Day'), ['action' => 'delete', $day->id], ['confirm' => __('Are you sure you want to delete # {0}?', $day->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Day'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Day'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="day view large-9 medium-8 columns content">
    <h3><?= h($day->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($day->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($day->amount) ?></td>
        </tr>
    </table>
</div>
