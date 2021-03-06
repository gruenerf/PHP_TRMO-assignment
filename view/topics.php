<?php
if (isset($_POST['submit']) && $loginController->isLoggedIn()) {
	// Sanitize userinput
	if (isset($_POST['title']) && isset($_POST['category'])) {
		$category = BaseController::fixString($_POST['category']);
		$title = BaseController::fixString($_POST['title']);

		if ($validatorController->validateTitle($title)) {

			// Save topic in database
			$topic = $topicController->create($title, $categoryController->getById($category), $loginController->getLoggedInUser());

			// If no topic is returned the topicname is already taken
			if (empty($topic)) {
				echo "<div class='notice'>The title is already taken.</div>";
			} else {
				// Redirect to topic page
				header('Location: ' . PROJECT_ADDRESS . "topic/" . $topic->getId());
			}
		} else {
			echo "<div class='notice'>The title is not valid.</div>";
		}
	} else {
		echo "<div class='notice'>Fill out all two fields.</div>";
	}
}

if ($loginController->isLoggedIn()) {
	// Get url parameter
	$parameter = $routeController->getParameter();

	if (!empty($parameter)) {
		if ($parameter[0] === "deleted") {
			?>
			<div class="notice_top">
				Topic was deleted successfully!
			</div>
		<?php
		}
	}
	?>

	<h2 class="content_headline">Topics</h2>

	<div class="create_new" id="create_new_topic"></div>

	<h3 class="content_headline">Create new topic</h3>
	<div class="create_topics">
		<form class="content_form" action="">
			<input class="text" type="text" name="title" placeholder="Topic">
			<select class="select" name="category">
				<option value='' disabled selected style='display:none;'>Please Choose Category</option>
				<?php
				$categoryArray = $categoryController->getAll();
				if (!empty($categoryArray)) {
					foreach ($categoryArray as $category) {
						?>
						<option value="<?php echo $category->getId(); ?>"><?php echo $category->getName(); ?></option>
					<?php
					}
				}
				?>
			</select>
			<input class="submit" type="submit" name="submit" formmethod="post" value="Create topic">
		</form>
	</div>

	<?php

	// If current user is admin, show all topics
	if ($loginController->isAdmin()) {
		?>
		<h3 class="content_headline">All Topics</h3>
		<?php
		$topicArray = $topicController->getAll();

	} else {
		?>
		<h3 class="content_headline">Your Topics</h3>
		<?php
		$topicArray = $topicController->getAllTopicByUser($loginController->getLoggedInUser());

	}

	if (!empty($topicArray)) {
		?>
		<div class="content_area">
		<?php
		foreach ($topicArray as $topic) {
			?>
			<div class="content_element">
				<a href="topic/<?php echo $topic->getId(); ?>">
					<div class="title">
						<?php echo $topic->getName(); ?>
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
			No Topics so far.
		</div>
	<?php
	}
} else {
	// Redirect to main
	header('Location: ' . PROJECT_ADDRESS . "home");
}