<?php if ($loginController->isLoggedIn()) { ?>

	<div class="settings">
		<h2 class="content_headline">Settings</h2>

		<h3 class="content_headline">Update Username/Password</h3>

		<form class="content_form" action="">
			<input class="text" type="text" name="username" placeholder="Username">

			<div class="description">(min.6 and max. 20 characters, a-z, A-Z, 0-9, _)</div>

			<input class="password" type="password" name="password" placeholder="Password">

			<div class="description">(min.6 and max. 20 characters, a-z, A-Z, 0-9, _)</div>

			<input class="submit" type="submit" name="submit" formmethod="post" value="Update">
		</form>
	</div>

	<?php
	if (isset($_POST['submit'])) {
		// Sanitize userinput
		if (isset($_POST['username']) && isset($_POST['password'])) {
			$username = BaseController::fixString($_POST['username']);
			$password = BaseController::fixString($_POST['password']);

			if ($validatorController->validateString($username) && $validatorController->validateString($password)) {

				$user = $loginController->getLoggedInUser();

				//Create passwordhash
				$pwhash = password_hash($password, PASSWORD_DEFAULT);

				$user->setName($username);
				$user->setPassword($pwhash);

				// Save user in database
				$userBuffer = $userController->update($user);

				// If no user is returned the username is already taken
				if (empty($userBuffer)) {
					echo "<div class='notice'>The username is already taken.</div>";
				} else {
					// Redirect to login page

					$_SESSION["user_name"] = $username;
					header('Location: ' . PROJECT_ADDRESS . "user/updated");
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
			echo "<div class='notice'>Fill out both fields.</div>";
		}
	}
} else {
	// Redirect to main
	header('Location: ' . PROJECT_ADDRESS . "home");
}