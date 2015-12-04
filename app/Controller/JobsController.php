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
		
		public function browse(){
			
		}
	}