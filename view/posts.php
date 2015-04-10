<?php if ($loginController->isLoggedIn()) {
	// Get url parameter
	$parameter = $routeController->getParameter();

	if (!empty($parameter)) {
		if ($parameter[0] === "newUser") {
			?>
			<div class="newEntry">
				Entry was successfull!
			</div>
		<?php
		}
	}
	?>

	<div class="create_posts">
		<form class="posts_form" action="">
			<select name="topic"><?php
				$topicArray = $topicController->getAll();
				foreach ($topicArray as $topic) {
					?>
					<option value="<?php echo $topic->getId(); ?>"><?php echo $topic->getName(); ?></option>s
				<?php
				}
				?></select>
			<input class="text" type="text" name="title" placeholder="Title">
			<textarea name="content" cols="50" rows="5">
				Enter the description...
			</textarea>
			<input class="submit" type="submit" formmethod="post" value="Post">
		</form>
	</div>

	<?php

	// Sanitize userinput
	if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['topic'])) {
		$title = BaseController::fixString($_POST['title']);
		$content = BaseController::fixString($_POST['content']);
		$topic = BaseController::fixString($_POST['topic']);

		if ($validatorController->validateTitle($title) && $validatorController->validateContent($content)) {

			// Save user in database
			$entry = $entryController->create($title, $content, $loginController->getLoggedInUser(), $topicController->getById($topic));

			// If no user is returned the username is already taken
			if (empty($entry)) {
				echo "The title is already taken.";
			} else {
				// Redirect to login page
				header('Location: ' . PROJECT_ADDRESS."entry/" . $entry->getId());
			}
		} else {
			// Verify if username and password are valid
			if (!$validatorController->validateTitle($title)) {
				echo "The title is not valid.";
			}
			if (!$validatorController->validateContent($content)) {
				echo "The content is not valid.";
			}
		}
	} else {
		echo "Fill out all three fields";
	}
} else {
	// Redirect to main
	header('Location: ' . PROJECT_ADDRESS."home");
}