<?php if ($loginController->isLoggedIn()) {
	// Get url parameter
	$parameter = $routeController->getParameter();

	if (!empty($parameter)) {
		if ($parameter[0] === "newEntry") {
			?>
			<div class="notice_top">
				Entry was successfull!
			</div>
		<?php
		}
	}
	?>

	<h2 class="content_headline">Entries</h2>

	<div class="create_new" id="create_new_entry"></div>

	<h3 class="content_headline">Create new entry</h3>
	<div class="create_entry">
		<form class="entry_form" action="">
			<input class="text" type="text" name="title" placeholder="Title">
			<select class="select" name="topic">
				<option value='' disabled selected style='display:none;'>Please Choose Topic</option>
				<?php
				$topicArray = $topicController->getAll();
				if(!empty($topicArray)){
					foreach ($topicArray as $topic) {
						?>
						<option value="<?php echo $topic->getId(); ?>"><?php echo $topic->getName(); ?></option>s
					<?php
					}
				} ?>
			</select>
			<textarea class="textarea" name="content" cols="50" rows="5" placeholder="Enter the description..."></textarea>
			<input class="submit" type="submit" name="submit" formmethod="post" value="Post">
		</form>
	</div>

	<?php
	if(isset($_POST['submit'])){
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
					echo "<div class='notice'>The title is already taken.</div>";
				} else {
					// Redirect to login page
					header('Location: ' . PROJECT_ADDRESS."entry/" . $entry->getId());
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
	}?>

	<h3 class="content_headline">Your Entries</h3>
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
		<div class="entry">
			No Entries so far.
		</div>
	<?php
	}?>

<?php } else {
	// Redirect to main
	header('Location: ' . PROJECT_ADDRESS."home");
}