<?php

require_once __DIR__.'/../../include/global.php';
Security::protect();

?>
<dl>
			<dt><label for="url">Start URL:</label></dt>
			<dd><input type="text" name="url" size="54" /></dd>
</dl>
<dl class="submit">
			<input class="button" type="submit" name="indexhttp" value="Begin Indexing" />
</dl>