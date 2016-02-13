<?php
$class = '';
if (!empty($params['class'])) {
    $class = $params['class'];
}
?>
<?= $this->element('SiteManager.Bootstrap/alert',['class' => $class, 'message' => h($message), 'dismissible' => true]); ?>