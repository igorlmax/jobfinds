<?php
	class JobsController extends AppController{
		public $name = 'Jobs';
		
		/*
		 * Default Index Method
		 */
		public function index(){
			
			// Get Job Info SELECT * from jobs
			$jobs = $this->Job->find('all');
			
			$this->set('jobs', $jobs);
		}
	}