<?php
if ($loginController->isLoggedIn()) {
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
	<form action="">
		<button type="submit" formmethod="post" formaction="settings" name="logout">Logout</button>
		<button type="submit" formmethod="post" formaction="posts" name="post">Create post</button>
		<button type="submit" formmethod="post" formaction="create_topic" name="topic">Create topic</button>
	</form>
	<h2 class="headline_2">Update Username/Password</h2>
	<div class="settings_update">
		<form class="update_form" action="">
			<input class="text" type="text" name="username" placeholder="Username">
			<input class="password" type="password" name="password" placeholder="Password">
			<input class="submit" type="submit" formmethod="post" value="Update">
		</form>
	</div>

	<?php
	if (isset($_POST['logout'])) {
		$loginController->logout();
		// Redirect to login page
		header('Location: ' . "login/logout");
	}

	if (isset($_POST['post'])) {
		// Redirect to login page
		header('Location: ' . "posts");
	}

	if (isset($_POST['topic'])) {
		// Redirect to login page
		header('Location: ' . "create_topic");
	}

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
				echo "The username is already taken.";
			} else {
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
	?>
	<h2 class="headline_2">Your Posts</h2>
	<?php
	$entryArray = $entryController->getAllEntryByUser($loginController->getLoggedInUser());

	if (!empty($entryArray)) {
		foreach ($entryArray as $entry) {
			?>
			<a href="entry/<?php echo $entry->getId(); ?>">
				<div class="entry">
					<p class="entry_name">
						<?php echo $entry->getTitle(); ?>
					</p>
				</div>
			</a>
		<?php
		}
	} else {
		?>
		<h2>
			No Entries so far.
		</h2>
	<?php
	}?>
	<h2 class="headline_2">Your Topics</h2>
	<?php
	$topicArray = $topicController->getAllTopicByUser($loginController->getLoggedInUser());

	if (!empty($topicArray)) {
		foreach ($topicArray as $topic) {
			?>
			<a href="topic/<?php echo $topic->getId(); ?>">
				<div class="topic">
					<p class="topic_name">
						<?php echo $topic->getName(); ?>
					</p>
				</div>
			</a>
		<?php
		}
	} else {
		?>
		<h2>
			No Topics so far.
		</h2>
	<?php
	}
} else {
	header('Location: ' . "login");
}
