<div class="register">
	<form class="register_form" action="">
		Username (min.6 and max. 20 letters, a-z, A-Z, 0-9, _)
		<input class="text" type="text" name="username" placeholder="Username">
		Password (min.6 and max. 20 letters, a-z, A-Z, 0-9, _)
		<input class="password" type="password" name="password" placeholder="Password">
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
		if(empty($user)){
			echo "The username is already taken.";
		}else{
			// Redirect to login page
			header('Location: ' . "login/newUser");
		}
	} else {
		// Verify if username and password are valid
		if (!$validatorController->validateString($username)) {
			echo "The username is not valid.";
		}
		if (!$validatorController->validateString($password)) {
			echo "The password is not valid.";
		}
	}
} else {
	echo "Fill out both fields";
}