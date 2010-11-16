<h2>Indexes</h2>
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
        	<td colspan="6" class="rounded-foot-left"><em>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</em></td>
        	<td class="rounded-foot-right">&nbsp;</td>

        </tr>
    </tfoot>
    <tbody>
    <?php foreach ($profiles as $profile) {?>
    	<tr>
        	<td><input type="checkbox" name="" /></td>
            <td><?php echo $profile['Profile']['name']?></td>
            <td><?php echo $profile['Profile']['url']?></td>
            <td><?php echo $profile['Profile']['modified']?></td>

            <td><a href="#"><?php echo $html->image('user_edit.png', array('border'=>'0'))?></a></td>
            <td><a href="#" class="ask"><?php echo $html->image('trash.png', array('border'=>'0'))?></a></td>
        </tr> 
     <?php }?>   
    </tbody>
</table>