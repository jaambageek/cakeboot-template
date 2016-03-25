<?php
	namespace SiteManager\Controller;

	use SiteManager\Controller\AppController;
	use SiteManager\Controller\Traits\AjaxCrudTrait;

	class ArtifactsController extends AppController
	{
		use AjaxCrudTrait;
		
		  // TOGGLE THE EDIT MODE
		public function mode() {
			$this->request->session()->write('edit_mode', !$this->request->session()->read('edit_mode'));
			$this->redirect($this->referer());
		}
		
	    public function editText($id = null) {
	    	$this->viewBuilder()->layout('ajax');
			if(!is_numeric($id)) {
				$artifact = $this->Artifacts->newEntity();
		        if ($this->request->is(['post', 'put'])) {
		            $artifact = $this->Artifacts->patchEntity($artifact, $this->request->data);
		            if ($this->Artifacts->save($artifact)) {
		                $this->Flash->success(__('Your artifact has been saved.'));
		                return $this->redirect($this->referer());
		            }
		            $this->Flash->error(__('Unable to add your artifact.'));
		        }
				$artifact->name = $id; // THE ID IS THE NAME OF THE ARTIFACT THAT WAS CALLED
				$artifact->type = 'text';
			} else {
				$artifact = $this->Artifacts->get($id);
			    if ($this->request->is(['post', 'put'])) {
			        $this->Artifacts->patchEntity($artifact, $this->request->data);
			        if ($this->Artifacts->save($artifact)) {
			            $this->Flash->success(__('Your artifact has been updated.'));
			            return $this->redirect($this->referer());
			        }
			        $this->Flash->error(__('Unable to update your artifact.'));
			    }
			}
			$this->set('artifact', $artifact);
	    }

		public function editImage($id = null) {
	    	$this->viewBuilder()->layout('ajax');
			if(!is_numeric($id)) {
				$artifact = $this->Artifacts->newEntity();
		        if ($this->request->is(['post', 'put'])) {
		            $artifact = $this->Artifacts->patchEntity($artifact, $this->request->data);
		            if ($this->Artifacts->save($artifact)) {
		                $this->Flash->success(__('Your artifact has been saved.'));
		                return $this->redirect($this->referer());
		            }
		            $this->Flash->error(__('Unable to add your artifact.'));
		        }
				$artifact->name = $id; // THE ID IS THE NAME OF THE ARTIFACT THAT WAS CALLED
				$artifact->type = 'image';
			} else {
				$artifact = $this->Artifacts->get($id);
			    if ($this->request->is(['post', 'put'])) {
			        $this->Artifacts->patchEntity($artifact, $this->request->data);
			        if ($this->Artifacts->save($artifact)) {
			            $this->Flash->success(__('Your artifact has been updated.'));
			            return $this->redirect($this->referer());
			        }
			        $this->Flash->error(__('Unable to update your artifact.'));
			    }
			}
			$this->set('artifact', $artifact);
	    }
	}
?>
