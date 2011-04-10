<h2><?php __('Stopwords'); ?></h2>
<table id="rounded-corner" summary="Current Indexes">
    <thead>
    	<tr>
        	<th width="38" class="rounded-company" scope="col"></th>
            <th width="118" class="rounded" scope="col"><?php __('Stopword'); ?></th>
            <th width="70" class="rounded-q4" scope="col"><?php __('Delete'); ?></th>
        </tr>
    </thead>
        <tfoot>
    	<tr>
        	<td colspan="6" class="rounded-foot-left"><em><?php __('Stopwords in the database are listed above.'); ?></em></td>
        	<td class="rounded-foot-right">&nbsp;</td>

        </tr>
    </tfoot>
    <tbody>
    <?php 
    if (!empty($stopwords)) {
    	foreach ($stopwords as $stopword) {?>
    	<tr>
        	<td><input type="checkbox" name="" /></td>
            <td><?php echo $stopword['Stopword']['stopword']?></td>
           	<td><?php echo 
	            $html->link(
		            $html->image('trash.png', array(
		            	'border'=>'0',
		            	'alt' => 'delete'
		            )),
	            array(
	            	'action' => 'delete',
	            	$stopword['Stopword']['id']
	            ),
	            array(
	            	'class' => 'ask',
	            	'escape'=> false
	            ));			
           	?></td>
        </tr> 
     <?php } } else { ?>
     <tr><td colspan="3" style="text-align:center;"><?php __('There are no stopwords in the database.'); ?> </td></tr>
     <?php }?>   
    </tbody>
</table>

<div class="pagination">
	
	<?php echo $this->Paginator->prev(__('&laquo; Previous', true), array('escape' => false), null, array('class' => 'disabled', 'escape' => false)); ?>
	<?php echo $this->Paginator->next(__('Next &raquo;', true), array('escape' => false), null, array('class' => 'disabled', 'escape' => false)); ?> 
</div>

<h2><?php echo $html->link(__('Add a stopword', true), array('action' => 'add'))?></h2>

