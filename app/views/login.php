<?php require_once "templates/header.php" ?>

<h1>Ini Halaman Login</h1>
<hr>
<form action="<?= BASEURL ?>/login/process" method="post" class="px-3">
	<label for="username">Username : </label>
	<input type="text" id="username" name="username">
	<br>
	<label for="password">Password : </label>
	<input type="password" id="password" name="password">
	<br><br>
	<button type="submit" class="btn btn-sm btn-primary">Submit</button>
	<a href="<?= BASEURL ?>/register" class="btn btn-sm btn-warning">register</a>
</form>

<?php require_once "templates/footer.php" ?>