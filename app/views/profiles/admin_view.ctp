<h2>View Indexing Profile</h2>

<fieldset>
	<dl>
		<dt>Name:</dt>
		<dd><span><?php echo $profile['Profile']['name']?></span></dd>
	</dl>
	<dl>
		<dt>URL:</dt>
		<dd><span><?php echo $profile['Profile']['url']?></span></dd>
	</dl>
	<dl>
		<dt>Regular Expression</dt>
		<dd><span><?php echo $profile['Profile']['regex']?></span></dd>
	</dl>
</fieldset>
<h2><?php echo $html->link('Index this profile',array('controller'=>'indices','action' =>'index','admin'=>true,$profile['Profile']['id']))?></h2>