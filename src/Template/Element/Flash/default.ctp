<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="<?= h($class) ?>" onclick="this.classList.add('hidden');"><?= $message ?></div>

<div class="alert alert-success alert-dismissable <?= h($class) ?>">
  <div class="container">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?= $message ?>
</div>
</div>
