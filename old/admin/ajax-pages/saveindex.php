<?php
?>
<dl>
			<dt><label for="ipselect">Index Should be Saved in:</label></dt>
			<dd>
			<select id="ipselect" size="1" name="ipselect">
				<option  value="saved">An Existing Profile:</option>
				<option  value="new">A New Profile:</option>		
			</select>
			<div id="savedprofile" style="display:inline;">
				<select id="profiles" size="1" name="profiles">
					<option value="demo">Demo Profile</option>
				</select>
			</div>
			<div id="newprofile" style="display:none;">
				<input type="text" name="newprofilename" />
			</div>
			</dd>
</dl>
