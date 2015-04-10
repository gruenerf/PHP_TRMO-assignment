<div class="register">
	<h2 class="content_headline">Register</h2>

	<form class="register_form" action="">
		<input class="text" type="text" name="username" placeholder="Username">
		<div class="description">(min.6 and max. 20 characters, a-z, A-Z, 0-9, _)</div>

		<input class="password" type="password" name="password" placeholder="Password">
		<div class="description">(min.6 and max. 20 characters, a-z, A-Z, 0-9, _)</div>

		<input class="submit" type="submit" formmethod="post" value="Register">
	</form>
</div>

<?php

// Sanitize userinput
if (isset($_POST['username']) && isset($_POST['password'])) {
	$username = BaseController::fixString($_POST['username']);
	$password = BaseController::fixString($_POST['password']);

	if ($validatorController->validateString($username) && $validatorController->validateString($password)) {

		//Create passwordhash
		$pwhash = password_hash($password, PASSWORD_DEFAULT);

		// Save user in database
		$user = $userController->create($username, $pwhash, 'writer');

		// If no user is returned the username is already taken
		if (empty($user)) {
			echo "<div class='notice'>The username is already taken.</div>";
		} else {
			// Redirect to login page
			header('Location: ' . PROJECT_ADDRESS."login/newUser");
		}
	} else {
		// Verify if username and password are valid
		if (!$validatorController->validateString($username)) {
			echo "<div class='notice'>The username is not valid.</div>";
		}
		if (!$validatorController->validateString($password)) {
			echo "<div class='notice'>The password is not valid.</div>";
		}
	}
} else {
	echo "<div class='notice'>Fill out both fields</div>";
}