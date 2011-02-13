<?php __('Enter the initial configuration settings.'); ?>
<?php 
	echo $form->create();
?>	

<?php __('Enter the details for the administrator below.'); ?>
<?php 
	
	echo $form->input('Install.username');
	echo $form->input('Install.password');

	echo $form->end(__('Next', true));
?>