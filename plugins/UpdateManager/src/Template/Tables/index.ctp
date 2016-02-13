<?= $this->element('Bootstrap/page_header', ['title' => 'Initialize Tables']); ?>
<p class="lead">
  <strong>User Plugin Tables: </strong>
  <?php
    if(!empty($user_status)) {
      if($user_status['status'] == 'down') {
        echo $this->Html->link('Initialize', '/update/tables/setup/user');
      } else {
        echo $this->Html->link('Remove Tables', '/update/tables/remove/user');
      }
    } else {
      echo 'Not Found';
    }
  ?>
</p>
