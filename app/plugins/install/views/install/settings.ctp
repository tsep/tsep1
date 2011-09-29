<?php __('Enter the initial configuration settings.'); ?>
<?php
	echo $form->create();
?>

<strong><?php __('Enter the details for the administrator below.'); ?></strong>
<table>
	<tr>
		<td><?php __('Administrator username:'); ?></td>
		<td><?php echo $form->input('Install.username', array('label' => false)); ?></td>
	</tr>
	<tr>
		<td><?php __('Administrator password:'); ?></td>
		<td><?php echo $form->input('Install.password', array('label' => false)); ?></td>
	</tr>
</table>


<?php
	echo $form->end(__('Next', true));
?>