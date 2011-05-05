<h2><?php __('Create a New Indexing Profile'); ?></h2>
<?php
	echo $form->create('Profile');
?>
<fieldset>
	<dl>
		<dt><?php __('Profile Name'); ?></dt>
		<dd><?php echo $form->input('name',array('label'=> false))?></dd>
	</dl>
	<dl>
		<dt><?php __('Start URL'); ?></dt>
		<dd>
			<?php echo $form->input('url',array('label'=> false))?>
			<em><?php __('The URL to the document root of your website.'); ?></em>
		</dd>
	</dl>
	<dl>
		<dt><?php __('Regular Expression'); ?></dt>
		<dd>
			<?php echo $form->input('regex',array('label'=>false, 'id' => 'regex'))?>
			<a href="#" id="regexLink"><?php __('Generate Regular Expression'); ?></a>
			<em><?php __('The regular expression that URLs must match.'); ?></em>
		</dd>
	</dl>
</fieldset>
<?php
	echo $form->end(array(
		'div'=> array(
			'class' => 'button'
		),
		'label' => __('Create Profile', true)
	));
?>
<br />
<b><?php __('You must index the new Profile before it will appear in the search results.'); ?></b>

<script type="text/javascript">

	$('#regexLink').click(function (){

		window.open( window.base + 'profiles/regex' );

	});

</script>