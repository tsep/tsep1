<h2>ACP Home</h2>
<table id="rounded-corner" summary="Current Indexes">
    <thead>
    	<tr>
        	<th width="38" class="rounded-company" scope="col"></th>
            <th width="118" class="rounded" scope="col">Index Name</th>
            <th width="100" class="rounded" scope="col">Index URL</th>
            <th width="131" class="rounded" scope="col">Last Indexed</th>
            <th width="63" class="rounded" scope="col">Edit</th>
            <th width="70" class="rounded-q4" scope="col">Delete</th>
        </tr>
    </thead>
        <tfoot>
    	<tr>
        	<td colspan="6" class="rounded-foot-left"><em>To begin indexing a profile, click on its name. Note: you cannot stop a profile that is being indexed.</em></td>
        	<td class="rounded-foot-right">&nbsp;</td>

        </tr>
    </tfoot>
    <tbody>
    <?php 
    if (!empty($profiles)) {
    	foreach ($profiles as $profile) {?>
    	<tr>
        	<td><input type="checkbox" name="" /></td>
            <td><?php echo 
            	$html->link(
            		$profile['Profile']['name'],
            		array(
            			'controller' => 'profiles',
            			'action' => 'view',
            			$profile['Profile']['id']
            		)
            	);
            ?></td>
            <td><?php echo $profile['Profile']['url']?></td>
            <td><?php echo $profile['Profile']['modified']?></td>

            <td><?php echo 
	            $html->link(
		            $html->image('user_edit.png', array(
		            	'border'=>'0',
		            	'alt' => 'edit'
		            )),
	            array(
	            	'action' => 'edit',
	            	'controller' => 'profiles',
	            	$profile['Profile']['id']
	            ),
	            array(
	            	'escape'=>false
	            ));			
           	?></td>
           	<td><?php echo 
	            $html->link(
		            $html->image('trash.png', array(
		            	'border'=>'0',
		            	'alt' => 'delete'
		            )),
	            array(
	            	'action' => 'delete',
	            	'controller' => 'profiles',
	            	$profile['Profile']['id']
	            ),
	            array(
	            	'class' => 'ask',
	            	'escape'=> false
	            ));			
           	?></td>
        </tr> 
     <?php } } else { ?>
     <tr><td colspan="6" style="text-align:center;"> There are no Indexing Profiles in the database.</td></tr>
     <?php }?>   
    </tbody>
</table>

<h2><?php echo $html->link('Create a New Indexing Profile', array('action' => 'add'))?></h2>