<!-- Using CakePHP Helper create Form for posting Job -->
<?php echo $this->Form->create('Job'); ?>
	<fieldset>
		<legend><?php echo __('Edit Job Listing'); ?></legend>
		<?php
			echo $this->Form->input('title');
			echo $this->Form->input('company_name');
			echo $this->Form->input('category_id', array(
					'type' => 'select',
					'options' => $categories,
					'empty' => 'Select Category'
			));
			echo $this->Form->input('type_id', array(
					'type' => 'select',
					'options' => $types,
					'empty' => 'Select Type'
			));
			echo $this->Form->input('description');
			echo $this->Form->input('city');
			echo $this->Form->input('state');
			echo $this->Form->input('contact_email');
			
			//Hidden Input will send to us the Job ID
			echo $this->Form->input('id', array('type' => 'hidden'));
			//Act as input type="submit"
			echo $this->Form->end('Update Job');
						
		?>
</fieldset>