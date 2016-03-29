<?php
	namespace SiteManager\Controller;

	use SiteManager\Controller\AppController;
	use SiteManager\Form\TaskForm;
	
	class TasksController extends AppController {
		public function index() {
	        $task = new TaskForm();
	        if ($this->request->is('post')) {
	            if ($task->execute($this->request->data)) {
	                $this->Flash->success('Your request was submitted, we will get back to you as soon as we can.');
	            } else {
	                $this->Flash->error('There was a problem submitting your request.');
	            }
				return $this->redirect('/');
	        }
	        $this->set('task', $task);
		}
	}
	
?>