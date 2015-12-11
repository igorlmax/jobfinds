<?php
	class JobsController extends AppController{
		public $helpers = array('Html');
		
		public $name = 'Jobs';
		
		
		
		/*
		 * Default Index Method
		 ***********************************************/
		public function index(){
			
			$options = array(
					'order' => array('Category.name' => 'asc')
			);
			
			//Get Categories
			$categories = $this->Job->Category->find('all', $options);
			
			//Set Categories
			$this->set('categories', $categories);
			
			//$options act as WHERE
			$options = array(
				'order' => array('Job.created' => 'asc'),
				'limit' => '5'
			);
			
			// Get Job Info SELECT * from jobs
			$jobs = $this->Job->find('all', $options);
			
			//Title above the tab on Web Browser
			$this->set('title_for_layout', 'JobFinds | Welcome');
			
			$this->set('jobs', $jobs);
		}
		
		/*
		 * Browse Method
		 ***********************************************/
		public function browse($category = null){

			//Init Conditions Array
			$conditions = array();			
			
			// If there is post submitted
			if($this->request->is('post')){
				if(!empty($this->request->data('keywords'))){
					//die($this->request->data('keywords')); 		Used for testing
					$conditions[] = array('OR' => array(
							'Job.title LIKE' => "%" . $this->request->data('keywords') . "%",
							'Job.description LIKE' => "%" . $this->request->data('keywords') . "%"
					));
				}
			}
			
			$options = array(
					'order' => array('Category.name' => 'asc')
			);
			
			//Get Categories
			$categories = $this->Job->Category->find('all', $options);
			
			//Set Categories
			$this->set('categories', $categories);

			
			if ($category != null){
				//Match Category
				$conditions[] = array(
						'Job.category_id LIKE' => "%" . $category . "%"
				);
			}
			
			//Set Query Options
			$options = array(
					'order' => array('Job.created' => 'desc'),
					'conditions' => $conditions,
					'limit' => 8
			);
			
			//Get Job Info
			$job = $this->Job->find('all', $options);
			
			//Title above the tab on Web Browser
			$this->set('title_for_layout', 'JobFinds | Browse');
			
			$this->set('jobs', $job);
		}
		
		/*
		 * View single Job
		 ***********************************************/
		public function view($id){
			if(!$id){
				throw new NotFoundException(__('Invalid job listing'));
			}
			
			$job = $this->Job->findById($id);
			
			if(!$job){
				throw new NotFoundException(__('Invalid job listing'));
			}
			
			//Set Title
			$this->set('title_for_layout', $job['Job']['title']);
			
			$this->set('job', $job);
		}
		
		
		
		
		
		/*
		 * Add Job
		 ***********************************************/
		public function add(){
			
			//Get categories for select list
			$options = array(
					'order' => array('Category.name' => 'asc')
			);
			
			//Get categories
			$categories = $this->Job->Category->find('list', $options);
			
			//Set categories
			$this->set('categories', $categories);
			
			//Get types for select list
			$types = $this->Job->Type->find('list');
			
			//Set Types
			$this->set('types', $types);
			
			
			if($this->request->is('post')){
				
				$this->Job->create();
				
				//Save Logged User ID
				$this->request->data['Job']['user_id'] = 1;
				
				if($this->Job->save($this->request->data)){
					$this->Session->setFlash(__('Your job has been inserted'));
					return $this->redirect(array('action' => 'index'));
				}
				
				$this->Session->setFlash(__('Something Wrong, cant insert Job'));
			}
		}
		
		
		
		/*
		 * Edit Job
		 ***********************************************/
		public function edit($id){
				
			//Get categories for select list
			$options = array(
					'order' => array('Category.name' => 'asc')
			);
				
			//Get categories
			$categories = $this->Job->Category->find('list', $options);
				
			//Set categories
			$this->set('categories', $categories);
				
			//Get types for select list
			$types = $this->Job->Type->find('list');
				
			//Set Types
			$this->set('types', $types);
			
			//Modified for Edit
			if(!$id){
				throw new NotFoundException(__('Can not find those Job'));
			}
			//Modified for Edit
			$job = $this->Job->findById($id);
			
			if(!$job){
				throw new NotFoundException(__('Invalid Job showing'));
			}
			
			//Instead of CREATE we make UPDATE
			if($this->request->is(array('job', 'put'))){
				$this->Job->id = $id;
		
		
				if($this->Job->save($this->request->data)){
					$this->Session->setFlash(__('Your job has been updated'));
					return $this->redirect(array('action' => 'index'));
				}
		
				$this->Session->setFlash(__('Something Wrong, cant insert Job'));
			}
			//Fill the fields with existing content from DB
			if(!$this->request->data){
				$this->request->data = $job;
			}
		}	
		
		
		/*
		 * Delete Job
		 ***********************************************/
		public function delete($id){
			if($this->request->is('get')){
				throw new MethodNotAllowedException();
			}
			
			if($this->Job->delete($id)){
				$this->Session->setFlash(
						__('The job with id: %s has been deleted', h($id))
						);
				return $this->redirect(array('action' => 'index'));
			}
		}
	}