<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
$class = 'alert alert-primary mb-3';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="<?= h($class) ?>" onclick="this.classList.add('hidden');" role="alert"><?= $message ?></div>
