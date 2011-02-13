<?php __('Please enter the database settings below.'); ?>
<?php 

	echo $form->create(); 
	
	echo $form->hidden('Database.driver', array('value' => 'mysql'));
	echo $form->hidden('Database.persistent', array('value' => false));
	
	echo $form->input('Database.host');
	echo $form->input('Database.login');
	echo $form->input('Database.password');
	echo $form->input('Database.database');
	echo $form->input('Database.prefix');
	
	echo $form->end(__('Next', true));
?>
