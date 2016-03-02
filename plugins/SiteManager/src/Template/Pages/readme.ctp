<?= $this->element('SiteManager.Bootstrap/page_header', ['title' => 'Template Read Me']) ?>

<?= $this->element('SiteManager.Bootstrap/section', [
	'title' => 'How to use this template:',
	'body' => 'This template is designed to easily implement CakePHP 3.x and Bootstrap 3.x. If you have any questions about how certain features are implemented you can refer to the sections below.'
]); ?>

<?= $this->element('SiteManager.Bootstrap/section', [
	'title' => 'CSS Overrides:',
	'body' => 'Quite often you may want to override the default Bootstrap CSS. To do so, modify <code>webroot/css/overrides.css</code>. Do not modify the Bootstrap.css file directly.'
]); ?>

<?= $this->element('SiteManager.Bootstrap/section', [
	'title' => 'Flash Messages:',
	'body' => 'Flash message formatting is typically handled from the templates in <code>src/Template/Element/Flash</code>. These have been updated to use the Bootstrap "Alert" element in the parent folder. Modifying the <code>.ctp</code> files in the Flash folder should not be necessary.'
]); ?>

<?= $this->element('SiteManager.Bootstrap/page_header', ['title' => 'Editable Artifacts!']) ?>

<?= $this->element('SiteManager.Bootstrap/section', [
	'title' => 'Empty "Placehoder" Artifacts:',
	'body' => 'To add a placehoder artifact, just insert the following code into the location'
]); ?>

<div class="row">
	<div class="col-xs-12 col-sm-8">
		<pre>$this->element('SiteManager.artifact', ['name' => 'myNewArtifactName', 'class' => 'someClass']);</pre>
	</div>
	<div class="col-xs-12 col-sm-4">
		<?= $this->element('SiteManager.artifact', ['name' => 'myNewArtifact', 'class' => 'lead']); ?>
	</div>
</div>

<p class="lead">This will give you an editable placeholder like the following. When in edit/debug mode, you can hover the artifact to get an edit button. Fill in some content for your new artifact and the artifact will be populated (See example above).</p>

<?= $this->element('SiteManager.Bootstrap/section', [
	'title' => 'Text Artifacts:',
	'body' => 'Artifacts of this type will fill in <code>&lt;p&gt;</code> elements with some automatic formatting. See the examples below.'
]); ?>
<div class="row">
	<div class="col-xs-12 col-sm-6">
		<?= $this->element('SiteManager.artifact', ['name' => 'help', 'class' => 'lead']); ?>
	</div>
	<div class="col-xs-12 col-sm-6">
		<?= $this->element('SiteManager.artifact', ['name' => 'help2', 'class' => 'lead']); ?>
	</div>
</div>

<?= $this->element('SiteManager.Bootstrap/page_header', ['title' => 'Forms']) ?>
<p>Below you will see examples of the different types of form elements supported by this template. These can be customized in <code>config/app_form.php</code>.</p>

<?php
	echo $this->Form->create('Test');
	echo $this->Form->input('name', ['templateVars' => ['placeholder' => 'Jim T. Kirk']]);
	echo $this->Form->input('password', ['type' => 'password', 'templateVars' => ['placeholder' => 'Password']]);
	echo $this->Form->textarea('notes', ['templateVars' => ['label' => 'Notes']]);
	echo $this->Form->datetime('date_time', [
		'monthNames' => true,
		'minYear'    => date('Y') - 2,
		'maxYear'    => date('Y') + 1,
		'interval'   => 15,
		'empty'      => true,
		'seconds'    => false,
		'timeFormat' => 12,
		'templateVars' => ['label' => 'Date Time']
	]);
	echo $this->Form->checkbox('done', ['templateVars' => ['label' => 'Done']]);
	echo $this->Form->radio(
	    'favorite_color',
	    [
	        ['value' => 'r', 'text' => 'Red'],
	        ['value' => 'u', 'text' => 'Blue'],
	        ['value' => 'g', 'text' => 'Green'],
	    ]
	);
	echo $this->Form->button('Submit', ['templateVars' => ['class' => 'primary']]);
	echo $this->Form->end();

?>

<?= $this->element('SiteManager.Bootstrap/page_header', ['title' => 'Bootstrap Elements']) ?>

<p>Below you will find a list of all the Bootstrap Elements avaialble in this template and their usage. They may be edited from the <code>src/Template/Element/Bootstrap</code> folder. New elements added to this folder will automatically show up in this list if properly formatted.</p>
<br />

<?php
	$files = array();
	$i = 0;

	$dir = new DirectoryIterator(dirname('../plugins/SiteManager/src/Template/Element/Bootstrap/empty'));
	foreach ($dir as $fileinfo) {
	    if (!$fileinfo->isDot()) {
	    	if(strpos($fileinfo->getFilename(), '.ctp') !== false) {
	        	$files[$i] = substr($fileinfo->getFilename(), 0, -4);
	        	$i++;
	        }
	    }
	}

	sort($files);

	foreach($files as $file) {
		echo $this->element('SiteManager.Bootstrap/'. $file, ['help' => true]);
	}
?>
