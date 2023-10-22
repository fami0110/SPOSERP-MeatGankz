<?php require_once "templates/header.php" ?>

<h1>Ini Halaman Register</h1>
<hr>
<form action="<?= BASEURL ?>/register/process" method="post" class="px-3">
	<label for="username">Username : </label>
	<input type="text" id="username" name="username" required>
	<br>
	<label for="email">Email : </label>
	<input type="email" id="email" name="email" required>
	<br>
	<label for="password">Password : </label>
	<input type="password" id="password" name="password" required>
	<br><br>
	<button type="submit" class="btn btn-sm btn-primary">Submit</button>
</form>

<?php require_once "templates/footer.php" ?>