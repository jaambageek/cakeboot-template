<?php
	namespace SiteManager\Controller;

	use SiteManager\Controller\AppController;

	class ArtifactsController extends AppController
	{
	    public function edit($id = null) {
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
			$this->set('options', ['text' => 'Text', 'heading' => 'Heading', 'image' => 'Image']);
			$this->set('artifact', $artifact);
	    }
	}
?>
