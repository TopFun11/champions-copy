<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-error alert-dismissable">
  <div class="container">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?= $message ?>
</div>
</div>
