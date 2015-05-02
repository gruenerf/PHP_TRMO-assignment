<?php

if (isset($_POST['logout'])) {
	$loginController->logout();
	// Redirect to login page
	header('Location: ' . PROJECT_ADDRESS . "login/logout");
}

if ($loginController->isLoggedIn()) {
	// Get url parameter
	$parameter = $routeController->getParameter();

	if (!empty($parameter)) {
		if ($parameter[0] === "deleted") {
			?>
			<div class="notice_top">
				Entry was deleted successfully!
			</div>
		<?php
		}
	}
	?>

	<h2 class="content_headline">Entries</h2>

	<div class="create_new" id="create_new_entry"></div>

	<h3 class="content_headline">Create new entry</h3>
	<div class="create_entry">
		<form class="content_form" action="">
			<input class="text" type="text" name="title" placeholder="Title">
			<select class="select" name="topic">
				<option value='' disabled selected style='display:none;'>Please Choose Topic</option>
				<?php
				$topicArray = $topicController->getAll();
				if (!empty($topicArray)) {
					foreach ($topicArray as $topic) {
						?>
						<option value="<?php echo $topic->getId(); ?>"><?php echo $topic->getName(); ?></option>s
					<?php
					}
				} ?>
			</select>
			<textarea class="textarea" name="content" cols="50" rows="5"
			          placeholder="Enter the description..."></textarea>
			<input class="submit" type="submit" name="submit" formmethod="post" value="Create entry">
		</form>
	</div>

	<?php
	if (isset($_POST['submit'])) {
		// Sanitize userinput
		if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['topic'])) {
			$title = BaseController::fixString($_POST['title']);
			$content = BaseController::fixString($_POST['content']);
			$topic = BaseController::fixString($_POST['topic']);

			if ($validatorController->validateTitle($title) && $validatorController->validateContent($content)) {

				// Save entry in database
				$entry = $entryController->create($title, $content, $loginController->getLoggedInUser(), $topicController->getById($topic));

				// If no entry is returned the entryname is already taken
				if (empty($entry)) {
					echo "<div class='notice'>The title is already taken.</div>";
				} else {
					// Redirect to entry page
					header('Location: ' . PROJECT_ADDRESS . "entry/" . $entry->getId());
				}
			} else {
				// Verify if username and password are valid
				if (!$validatorController->validateTitle($title)) {
					echo "<div class='notice'>The title is not valid.</div>";
				}
				if (!$validatorController->validateContent($content)) {
					echo "<div class='notice'>The content is not valid.</div>";
				}
			}
		} else {
			echo "<div class='notice'>Fill out all three fields.</div>";
		}
	}

	// If current user is admin, show all entries
	if ($loginController->isAdmin()) {
		?>
		<h3 class="content_headline">All Entries</h3>
		<?php
		$entryArray = $entryController->getAll();

	} else {
		?>
		<h3 class="content_headline">Your Entries</h3>
		<?php
		$entryArray = $entryController->getAllEntryByUser($loginController->getLoggedInUser());
	}
	if (!empty($entryArray)) {
		?>
		<div class="content_area">
			<?php foreach ($entryArray as $entry) {
				?>
				<div class="content_element">
					<a href="entry/<?php echo $entry->getId(); ?>">
						<div class="title">
							<?php echo $entry->getTitle(); ?>
						</div>
						<div class="cover">
						</div>
					</a>
				</div>
			<?php } ?>
		</div>
	<?php
	} else {
		?>
		<div class="no_content">
			No Entries so far.
		</div>
	<?php
	}?>

<?php
} else {
	// Redirect to main
	header('Location: ' . PROJECT_ADDRESS . "home");
}