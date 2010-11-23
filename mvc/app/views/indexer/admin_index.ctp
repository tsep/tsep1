<h2>Indexer</h2>
<p>To begin indexing, enter the ID of the Indexing Profile to Index. If you do nto know the ID of the Indexing profile that you want to Index, you can click on the profile on the Home Page</p>
<?php 
	echo $form->create('IndexRequest', array('url' => array('controller'=>'indexer', 'action' =>'index')));
	echo $form->inputs();
	echo $form->end('Start');
?>
