<strong><?php __('Please enter the database settings below.'); ?></strong>
<?php

	echo $form->create();

	echo $form->hidden('Database.driver', array('value' => 'mysqli'));
	echo $form->hidden('Database.persistent', array('value' => false));
?>
<table>
	<tr>
		<td><?php __('Database host:'); ?></td>
		<td><?php echo $form->input('Database.host', array ('label' => false)); ?></td>
	</tr>
	<tr>
		<td><?php __('Database username:'); ?></td>
		<td><?php echo $form->input('Database.login', array ('label' => false)); ?></td>
	</tr>
	<tr>
		<td><?php __('Database password:'); ?></td>
		<td><?php echo $form->input('Database.password', array ('label' => false)); ?></td>
	</tr>
	<tr>
		<td><?php __('Database name:'); ?></td>
		<td><?php echo $form->input('Database.database', array ('label' => false)); ?></td>
	</tr>
	<tr>
		<td><?php __('Table prefix:'); ?></td>
		<td><?php 	echo $form->input('Database.prefix', array ('label' => false)); ?></td>
	</tr>
</table>

<?php
	echo $form->end(__('Next', true));
?>