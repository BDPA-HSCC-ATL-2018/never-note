<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_nav.php';

?> 


<form action="../index.php" method="post">
	<div class="card">

<div class="card-body">
		<label for="first_name"> First Name </label> <input type="text" name="l_name" id="last_name" class="form-control" required>
		<label for="last_name" > Last Name </label> <input type="text" name="password" id="password" class="form-control"required>
		<label for="password"> Password </label> <input type="text" name="email" id="email" class="form-control"required>
		<label for="email"> Email </label> <input type="text" name="email" id="email" class="form-control"required>
		<input type="submit" value="Signup" class="btn btn-primary">
</div>	
</div>	
</form>


<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/web-assets/tpl/app_footer.php'; ?>

