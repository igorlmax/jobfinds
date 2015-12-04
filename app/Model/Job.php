<!-- creates connection between "jobs" and "types" table, primary with secondary key -->
<?php
	class Job extends AppModel{
		
		public $name = 'Job';
		public $belongsTo = array('Type');
	}
