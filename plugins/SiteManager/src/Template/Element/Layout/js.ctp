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