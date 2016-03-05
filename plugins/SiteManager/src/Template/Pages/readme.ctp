<?php
	use Cake\Utility\Inflector;

	// THIS SCRIPT IS DUMPED TO THE LAYOUT AFTER CALLING JQUERY
	$GLOBALS['page_script'] = "$('body').scrollspy({ target: '#readme-nav', offset: 100 });";
	
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
?>

<div class="row">
	<div class="col-sm-2 hidden-xs">
		<!-- NAVIGATION PANE -->
		<div id="readme-nav"  data-spy="affix" data-offset-top="0">
			<ul class="nav nav-stacked nav-readme">
				<li>
					<a class="top" href="#overview">Overview</a>
					<ul class="nav">
						<li class="sub"><a href="#css">CSS Overrides</a></li>
						<li class="sub"><a href="#flash">Flash Messages</a></li>
					</ul>
				</li>
				<li>
					<a class="top" href="#editable">Editable Artifacts</a>
					<ul class="nav">
						<li class="sub"><a href="#placeholders">Empty Artifacts</a></li>
						<li class="sub"><a href="#texts">Text Artifacts</a></li>
						<li class="sub"><a href="#images">Image Artifacts</a></li>
					</ul>
				</li>
				<li><a class="top" href="#forms">Forms</a></li>
				<li>
					<a class="top" href="#bootstrap">Bootstrap Elements</a>
					<ul class="nav">
						<?php foreach($files as $file): ?>
							<li class="sub"><a href="#<?= $file ?>"><?= Inflector::humanize($file) ?></a></li>
						<?php endforeach; ?>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="col-xs-12 col-sm-10">
		<!-- README CONTENT -->
		<?= $this->element('SiteManager.Bootstrap/page_header', ['title' => 'Template Overview', 'id' => 'overview']) ?>
		
		<?= $this->element('SiteManager.Bootstrap/section', [
			'title' => 'How to use this template:',
			'body' => 'This template is designed to easily implement CakePHP 3.x and Bootstrap 3.x. If you have any questions about how certain features are implemented you can refer to the sections below.'
		]); ?>
		
		<?= $this->element('SiteManager.Bootstrap/section', [
			'id' => 'css',
			'title' => 'CSS Overrides:',
			'body' => 'Quite often you may want to override the default Bootstrap CSS. To do so, modify <code>webroot/css/overrides.css</code>. Do not modify the Bootstrap.css file directly.'
		]); ?>
		
		<?= $this->element('SiteManager.Bootstrap/section', [
			'id' => 'flash',
			'title' => 'Flash Messages:',
			'body' => 'Flash message formatting is typically handled from the templates in <code>src/Template/Element/Flash</code>. These have been updated to use the Bootstrap "Alert" element in the parent folder. Modifying the <code>.ctp</code> files in the Flash folder should not be necessary.'
		]); ?>
		
		<?= $this->element('SiteManager.Bootstrap/page_header', ['title' => 'Editable Artifacts!', 'id' => 'editable']) ?>
		
		<?= $this->element('SiteManager.Bootstrap/section', [
			'id' => 'placeholders',
			'title' => 'Empty "Placeholder" Artifacts:',
			'body' => 'To add a placeholder artifact, just insert the code into the location with an echo statement.'
		]); ?>
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<p class="lead">When in edit/debug mode, editable artifacts will have a dashed border. You can hover the artifact to get an edit button. Fill in some content for your new artifact and the artifact will be populated.</p>
			</div>
			<div class="col-xs-12 col-sm-6">
				<pre>$this->element('SiteManager.artifact', ['name' => 'myNewArtifactName']);</pre>
				<p class="lead"><?= $this->element('SiteManager.artifact_text', ['name' => 'myNewArtifact']); ?></p>
			</div>
		</div>
		<br /><br />
		
		<?= $this->element('SiteManager.Bootstrap/section', [
			'id' => 'texts',
			'title' => 'Text Artifacts:',
			'body' => 'Artifacts of this type will return the text entered in them. Use any style you want to display the text. See examples below:'
		]); ?>
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<h1><?= $this->element('SiteManager.artifact_text', ['name' => 'readme-heading']); ?></h1>
			</div>
			<div class="col-xs-12 col-sm-6">
				<p class="lead"><?= $this->element('SiteManager.artifact_text', ['name' => 'readme-text2']); ?></p>
			</div>
		</div>
		<br /><br />
		
		<?= $this->element('SiteManager.Bootstrap/section', [
			'id' => 'images',
			'title' => 'Image Artifacts:',
			'body' => 'NOT YET SUPPORTED'
		]); ?>
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				
			</div>
			<div class="col-xs-12 col-sm-6">
				<?= $this->element('SiteManager.artifact_image', ['name' => 'image-readme']); ?>
			</div>
		</div>
		
		<?= $this->element('SiteManager.Bootstrap/page_header', ['title' => 'Forms', 'id' => 'forms']) ?>
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
		
		<?= $this->element('SiteManager.Bootstrap/page_header', ['title' => 'Bootstrap Elements', 'id' => 'bootstrap']) ?>
		
		<p>Below you will find a list of all the Bootstrap Elements avaialble in this template and their usage. They may be edited from the <code>src/Template/Element/Bootstrap</code> folder. New elements added to this folder will automatically show up in this list if properly formatted.</p>
		<br />
		
		<?php
			foreach($files as $file) {
				echo $this->element('SiteManager.Bootstrap/'. $file, ['help' => true]);
			}
		?>
	</div>
</div>
