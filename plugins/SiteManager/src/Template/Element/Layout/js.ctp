<?php 
	$this->loadHelper('User');
	
	$role  = $this->User->role();
	$admin = $this->User->admin();
	
	if(($role == 'owner') || ($admin)) {
		  // DEFAULT EDIT MODE IS TRUE
		if(!$this->request->session()->check('edit_mode')) {
			$this->request->session()->write('edit_mode', true);
		}
		
		  // IF IN EDIT MODE, DISPLAY PREVIEW BUTTON, ELSE DISPLAY EDIT
		$mode = $this->request->session()->read('edit_mode');
		if($mode) {
			$title = $this->element('SiteManager.Bootstrap/icon', ['icon' => 'eye-open']). ' Preview';
		} else {
			$title = $this->element('SiteManager.Bootstrap/icon', ['icon' => 'pencil']). ' Edit';
		}

		echo '<div id="edit-toggle">';
		echo $this->element('SiteManager.Bootstrap/button', ['type' => 'link', 'class' => 'default btn-sm', 'title' => $title, 'url' => '/sitemgr/artifacts/mode']);
		echo '</div>';
	}
?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<?= $this->Html->script('SiteManager.bootstrap.min') ?>

<script>

function updateModal(path)
{
   $.ajax({
     type: "GET",
     url: path,
     success: function(data) {
           // data is the returned content
          $('#modalContent').html(data);
          $('#theModal').modal('show');
     }
   });
}

$(function () {
  $('[data-toggle="popover"]').popover()
});

<?php if(!empty($GLOBALS['page_script'])) echo $GLOBALS['page_script']; ?>
</script>