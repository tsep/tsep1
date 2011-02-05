<h2>ACP Home</h2>
<table id="rounded-corner" summary="Current Indexes">
    <thead>
    	<tr>
        	<th width="38" class="rounded-company" scope="col"></th>
            <th width="118" class="rounded" scope="col">Theme Name</th>
            <th width="100" class="rounded" scope="col"></th>
            <th width="131" class="rounded" scope="col">Activate Theme</th>
            <th width="63" class="rounded" scope="col"></th>
            <th width="70" class="rounded-q4" scope="col"></th>
        </tr>
    </thead>
        <tfoot>
    	<tr>
        	<td colspan="6" class="rounded-foot-left"><em>Click on a theme to activate it.</em></td>
        	<td class="rounded-foot-right">&nbsp;</td>

        </tr>
    </tfoot>
    <tbody>
    <?php 
    if (!empty($themes)) {
    	foreach ($themes as $theme) {?>
    	<tr>
        	<td><input type="checkbox" name="" /></td>
            <td><?php echo $theme['Theme']['name']?></td>
            <td></td>
            <td><?php echo 
	            $html->link(
		            'Activate',
	            array(
	            	'action' => 'activate',
	            	'controller' => 'themes',
	            	$theme['Theme']['name']
	            ));			
           	?></td>

            <td></td>
           	<td></td>
        </tr> 
     <?php } } else { ?>
     <tr><td colspan="6" style="text-align:center;"> There are no Themes in the database.</td></tr>
     <?php }?>   
    </tbody>
</table>

<h2><?php echo $html->link('Add a new theme', array('controller'=>'themes', 'action' => 'add', 'admin' =>true))?></h2>