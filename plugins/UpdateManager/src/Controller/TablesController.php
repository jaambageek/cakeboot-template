<?php
	namespace UpdateManager\Controller;

	use UpdateManager\Controller\AppController;
  use Migrations\Migrations;

	class TablesController extends AppController
	{
	    public function index()
	    {
        $user_migrations = new Migrations(['source' => '../plugins/CakeDC/Users/config/Migrations']);
        $status = $user_migrations->status();

        if(!empty($status[0])) {
          $this->set('user_status', $status[0]);
        }
      }

      public function setup($table = null) {
        if($table == 'user') {
          $source = '../plugins/CakeDC/Users/config/Migrations';
        }
        $migrations = new Migrations(['source' => $source]);
        if($migrations->migrate()) {
          $this->Flash->success('User tables created.');
        } else {
          $this->Flash->error('User table creation failed.');
        }
        $this->redirect('/update/tables');
      }

      public function remove($table = null) {
        if($table == 'user') {
          $source = '../plugins/CakeDC/Users/config/Migrations';
        }
        $migrations = new Migrations(['source' => $source]);
        if($migrations->rollback()) {
          $this->Flash->success('User tables removed.');
        } else {
          $this->Flash->error('User table removal failed.');
        }
        $this->redirect('/update/tables');
      }
	}
?>