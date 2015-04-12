<?php if ($loginController->isLoggedIn()) {
	// Get url parameter
	$parameter = $routeController->getParameter();

	if (!empty($parameter)) {
		if ($parameter[0] === "newTopic") {
			?>
			<div class="newTopic">
				Topic was successfully created!
			</div>
		<?php
		}
	}
	?>

	<h2 class="content_headline">Topics</h2>

	<div class="create_new" id="create_new_topic"></div>

	<h3 class="content_headline">Create new topic</h3>
	<div class="create_topics">
		<form class="topics_form" action="">
			<input class="text" type="text" name="title" placeholder="Topic">
			<select class="select" name="category">
				<option value='' disabled selected style='display:none;'>Please Choose Category</option>
				<?php
				$categoryArray = $categoryController->getAll();
				if (!empty($categoryArray)) {
					foreach ($categoryArray as $category) {
						?>
						<option value="<?php echo $category->getId(); ?>"><?php echo $category->getName(); ?></option>s
					<?php
					}
				}
				?>
			</select>
			<input class="submit" type="submit" name="submit" formmethod="post" value="Post">
		</form>
	</div>

	<?php
	if (isset($_POST['submit'])) {
		// Sanitize userinput
		if (isset($_POST['title']) && isset($_POST['category'])) {
			$category = BaseController::fixString($_POST['category']);
			$title = BaseController::fixString($_POST['title']);

			if ($validatorController->validateTitle($title)) {

				// Save user in database
				$topic = $topicController->create($title, $categoryController->getById($category), $loginController->getLoggedInUser());

				// If no user is returned the username is already taken
				if (empty($topic)) {
					echo "<div class='notice'>The title is already taken.</div>";
				} else {
					// Redirect to login page
					header('Location: ' . PROJECT_ADDRESS . "topic/" . $topic->getId());
				}
			} else {
				// Verify if username and password are valid
				if (!$validatorController->validateTitle($title)) {
					echo "<div class='notice'>The title is not valid.</div>";
				}
			}
		} else {
			echo "<div class='notice'>Fill out all two fields.</div>";
		}
	}?>

	<h3 class="content_headline">Your Topics</h3>
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
		<div class="topic"">
			No Topics so far.
		</div>
	<?php
	}
} else {
	// Redirect to main
	header('Location: ' . PROJECT_ADDRESS . "home");
}