<?php if ($loginController->isLoggedIn()) {
	// Get url parameter
	$parameter = $routeController->getParameter();

	if (!empty($parameter)) {
		if ($parameter[0] === "newTopic") {
			?>
			<div class="newTopic">
				Topic was successfull!
			</div>
		<?php
		}
	}
	?>

	<div class="create_topics">
		<form class="topics_form" action="">
			<select name="category"><?php
				$categoryArray = $categoryController->getAll();
				foreach ($categoryArray as $category) {
					?>
					<option value="<?php echo $category->getId(); ?>"><?php echo $category->getName(); ?></option>s
				<?php
				}
				?></select>
			<input class="text" type="text" name="title" placeholder="Topic">
			<input class="submit" type="submit" formmethod="post" value="Post">
		</form>
	</div>

	<?php

	// Sanitize userinput
	if (isset($_POST['title']) && isset($_POST['category'])) {
		$category = BaseController::fixString($_POST['category']);
		$title = BaseController::fixString($_POST['title']);

		if ($validatorController->validateTitle($title)) {

			// Save user in database
			$topic = $topicController->create($title, $categoryController->getById($category), $loginController->getLoggedInUser());

			// If no user is returned the username is already taken
			if (empty($topic)) {
				echo "The title is already taken.";
			} else {
				// Redirect to login page
				header('Location: ' . "topic/" . $topic->getId());
			}
		} else {
			// Verify if username and password are valid
			if (!$validatorController->validateTitle($title)) {
				echo "The title is not valid.";
			}
		}
	} else {
		echo "Fill out all two fields";
	}
} else {
	// Redirect to main
	header('Location: ' . "home");
}