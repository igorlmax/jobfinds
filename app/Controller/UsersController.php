<?php
class UsersController extends AppController{
	
	public $name = 'Users';
	
	public function register(){
		if($this->request->is('post')){
			$this->User->create();
		
			if($this->User->save($this->request->data)){
				$this->Session->setFlash(__('You are now registered and may login'));
				return $this->redirect(array('controller' => 'jobs', 'action' => 'index'));
			}
			
			$this->Session->setFlash(
					__('There was a problem creating your account')
					);
		}
	}// register function
	
	
	
	
	/*
	 * Login User
	 */
public function login(){
	if($this->request->is('post')){
		if($this->Auth->login()){
			return $this->redirect($this->Auth->redirect());
		}
		$this->Session->setFlash(__('Invalid username or assword, try again'));
	}
}


/*
 * Logout User
 */
public function logout(){
	return $this->redirect($this->Auth->logout());
}
	
	
} // end UsersCOntroller
?>