<?php
if (!$loginController->isLoggedIn()) {
	// Get url parameter
	$parameter = $routeController->getParameter();

	if (!empty($parameter)) {
		if ($parameter[0] === "newUser") {
			?>
			<div class="newUser">
				Registration successful. You're almost there :) Now login!
			</div>
		<?php
		}
		elseif ($parameter[0] === "logout") {
			?>
			<div class="newUser">
				Logout successful. We hope to see you again quite soon :)
			</div>
		<?php
		}
	}
	?>

	<div class="login">
		<form class="login_form" action="">
			<input class="text" type="text" name="username" placeholder="Username">
			<input class="password" type="password" name="password" placeholder="Password">
			<input class="submit" type="submit" formmethod="post" value="Login">
		</form>
		<div class="login_register">
			<p>Aren&apos;t registered yet? <a href="register">Register now!</a></p>
		</div>
	</div>

<?php

// Sanitize userinput
	if (isset($_POST['username']) && isset($_POST['password'])) {
		$username = BaseController::fixString($_POST['username']);
		$password = BaseController::fixString($_POST['password']);

		if ($validatorController->validateUser($username, $password)) {
			// Redirect to settings page
			header('Location: ' . "settings");
		} else {
			echo "Username and/or password are wrong. Try again!";
		}

	} else {
		if (empty($parameter) || !$parameter[0] === "newUser") {
			echo "Fill out both fields";
		}
	}
} else {
	// Redirect to settings page
	header('Location: ' . "settings");
}