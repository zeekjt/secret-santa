<?php

require_once 'core/init.php';

if (Input::exists()) {
	
}

?>

<div>
	<form method="POST" action="">
		<div>
			<input type="text" id="username" name="username" placeholder="Username" />
		</div>
		<div>
			<input type="password" id="password" name="password" placeholder="Password" />
		</div>
		<div>
			<input type="submit" id="submit" name="submit" value="Submit" />
		</div>
	</form>
</div>