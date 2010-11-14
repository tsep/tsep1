<h2>Indexes</h2>
<table>
	<?php foreach ($profiles as $profile) {?>
	<tr>
		<td><?php echo $profile['Profile']['name']?></td>
		<td><?php echo $profile['Profile']['url']?></td>
		<td><?php echo $profile['Profile']['modified']?></td>
	</tr>	
	<?php }?>
</table>