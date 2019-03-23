<nav class="navbar navbar-expand-lg navbar-dark bg-secondary fixed-top">
<a class="navbar-brand" href="/never-note/">NeverNote</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<?php
//If the user_id is set (if the user has logged in), show the logout button.
if (isset($_SESSION['user_id'])) {
	echo <<<HTML
		<a class="btn btn-outline-dark text-white" href="index.php?function=logout">Logout</a>
HTML;
}
?>

</form>

</nav>
<br/>
<div class="container-fluid">
