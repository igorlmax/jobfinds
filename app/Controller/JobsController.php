<?php
	class JobsController extends AppController{
		public $helpers = array('Html');
		
		public $name = 'Jobs';
		
		/*
		 * Default Index Method
		 */
		public function index(){
			
			//$options act as WHERE
			$options = array(
				'order' => array('Job.created' => 'asc'),
				'limit' => '5'
			);
			
			// Get Job Info SELECT * from jobs
			$jobs = $this->Job->find('all', $options);
			
			$this->set('jobs', $jobs);
		}
		
		/*
		 * Browse Method
		 ***********************************************/
		
		public function browse($category = null){
			
			$options = array(
					'order' => array('Category.name' => 'asc')
			);
			
			//Get Categories
			$categories = $this->Job->Category->find('all', $options);
			
			//Set Categories
			$this->set('categories', $categories);
			
			//Init Conditions Array
			$conditions = array();
			
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
			
			$this->set('jobs', $job);
		}
	}