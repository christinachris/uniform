<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-success"><?= $message ?></div>
<script>jQuery('.alert').delay(5000).fadeOut('slow')</script>
