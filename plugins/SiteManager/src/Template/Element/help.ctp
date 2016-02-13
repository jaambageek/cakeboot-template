<?php 
	use Cake\Utility\Inflector;
	
	/* ELEMENT HELP */
	
	// REQUIRED VARIABLES
	if(!isset($element)) $element = 'no';
	if(!isset($options)) $options = null;
?>
<h3>Element Help - <strong><?= Inflector::humanize($element) ?></strong></h3>
<p class="lead">Usage</p>
<pre>echo $this->element('Bootstrap/<?= $element ?>', ['option' => 'value', 'option2' => 'value2']);</pre>
<?php if($options != null):?>
<p class="lead">Options</p>
<table class="table table-bordered table-condensed">
	<thead>
		<tr>
			<th>Option</th>
			<th>Default</th>
			<th>Usage</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($options as $option => $info):?>
			<tr>
				<td><code><?= $option ?></code></td>
				<td><code><?= $info[0] ?></code></td>
				<td><?= $info[1] ?></td>
			</tr>
		<?php endforeach;?>
	</tbody>
</table>
<?php endif;?>
<p class="lead">Example</p>