<?php
	// in src/Form/TaskForm.php
	namespace SiteManager\Form;
	
	use Cake\Form\Form;
	use Cake\Form\Schema;
	use Cake\Validation\Validator;
	use Cake\Mailer\Email;
	use Cake\Routing\Router;
	
	class TaskForm extends Form
	{
	    protected function _buildSchema(Schema $schema)
	    {
	        return $schema->addField('name', 'string')
	            ->addField('email', ['type' => 'string'])
	            ->addField('request', ['type' => 'text']);
	    }
	
	    protected function _buildValidator(Validator $validator)
	    {
	        return $validator->add('request', 'length', [
	                'rule' => ['minLength', 1],
	                'message' => 'A message is required.',
	            ]);
	    }
	
	    protected function _execute(array $data)
	    {
	    	$send_to = 'dev_task@vallierebrothers.com';
	    	if(preg_match('dev', Router::url('/',true))) {
	    		$send_to = 'dev_task@vallierebrothers.com';
	    	} else {
	    		$send_to = 'task@vallierebrothers.com';
	    	}
			
	        // Send an email.
	        $message = 'Site: '. Router::url('/', true) .'
User: ' . $data['name'] .'
Email: '. $data['email'] .'

{START}'. $data['request'] .'{END}';
	        
	        $email = new Email('default');
			$email->from([$data['email'] => $data['name']])
		    ->sender($data['email'], $data['name'])
		    ->to('dev_task@vallierebrothers.com')
		    ->subject('New Request')
		    ->send($message);
    
	        return true;
	    }
	}
?>