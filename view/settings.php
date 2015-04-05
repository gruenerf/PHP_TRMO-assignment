<?php
if($loginController->isLoggedIn()){
	// Get url patameter
	$parameter = $routeController->getParameter();

	if (!empty($parameter)) {
		// Get Searchterm
		if ($parameter[0] === "updated") {
			?>
			<div class="newUser">
				Account updated successfully!
			</div>
		<?php
		}
	}
	?>

	<h1 class="headline">Settings</h1>
	<h2 class="headline_2">Update Username/Password</h2>
	<div class="settings_update">
		<form class="update_form" action="">
			<input class="text" type="text" name="username" placeholder="Username">
			<input class="password" type="password" name="password" placeholder="Password">
			<input class="submit" type="submit" formmethod="post" value="Update">
		</form>
	</div>

<?php

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
				if(empty($userBuffer)){
					echo "The username is already taken.";
				}else{
					// Redirect to login page

					$_SESSION["user_name"] = $username;
					header('Location: ' . "settings/updated");
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
}
else{
	header('Location: ' . "login");
}
