<?php
	use Cake\ORM\TableRegistry;
	use Cake\Core\Configure;

	$artifacts = TableRegistry::get('Artifacts');
	$artifact = $artifacts->find()->where(['name' => $name])->first();
?>

<?php 
	if(Configure::read('debug')) $this_mode = 'edit';
	else $this_mode = 'public';
?>

<div class="artifact-<?= $this_mode ?>">

<?php if($artifact->type == 'text'): ?>
	<?php $paragraphs = explode(PHP_EOL, $artifact['content']); ?>
	<?php foreach($paragraphs as $paragraph):?>
		<p class="<?= $class ?>"><?= $paragraph; ?></p>
	<?php endforeach; ?>
<?php endif;?>

	<?= $this->element('SiteManager.Bootstrap/button', ['title' => $this->element('SiteManager.Bootstrap/icon', ['icon' => 'pencil']), 'class' => 'primary btn-sm edit-button', 'type' => 'button']); ?>
</div>