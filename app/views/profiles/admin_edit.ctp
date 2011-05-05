<h2><?php __('Edit Indexing Profile'); ?></h2>
<?php
	echo $form->create('Profile');
?>
<fieldset>
	<dl>
		<dt><?php __('Profile Name'); ?></dt>
		<dd><?php echo $form->input('name',array('value' => $profile['Profile']['name'], 'label'=> false))?></dd>
	</dl>
	<dl>
		<dt><?php __('Start URL'); ?></dt>
		<dd>
		    <?php echo $form->input('url',array('value' => $profile['Profile']['url'], 'label'=> false))?>
			<em><?php __('The URL to the document root of your website.'); ?></em>
		</dd>
	</dl>
	<dl>
		<dt><?php __('Regular Expression'); ?></dt>
		<dd>
		    <?php echo $form->input('regex',array('value' => $profile['Profile']['regex'],'disabled' => 'disabled', 'label'=>false, 'id' => 'regex'))?>
			<a href="#" id="regexLink"><?php __('Generate Regular Expression'); ?></a>
			<em><?php __('The regular expression that URLs must match.'); ?></em>
		</dd>
	</dl>
	<?php echo $form->input('id', array('value' => $profile['Profile']['id'], 'type' => 'hidden', 'label' => false))?>

</fieldset>
<?php
	echo $form->end(array(
		'div'=> array(
			'class' => 'button'
		),
		'label' => __('Submit changes', true)
	));
?>

<script type="text/javascript">

	$('#regexLink').click(function (){

		window.open( window.base + 'profiles/regex' );

	});

</script>
