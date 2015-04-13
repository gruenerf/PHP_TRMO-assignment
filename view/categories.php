<?php if ($loginController->isAdmin()) {
	// Get url parameter
	$parameter = $routeController->getParameter();

	if (!empty($parameter)) {
		if ($parameter[0] === "newCategory") {
			?>
			<div class="newCategory">
				Topic was successfully created!
			</div>
		<?php
		}
	}
	?>

	<h2 class="content_headline">Categories</h2>

	<div class="create_new" id="create_new_category"></div>

	<h3 class="content_headline">Create new category</h3>
	<div class="create_categories">
		<form class="content_form" action="">
			<input class="text" type="text" name="title" placeholder="Category">
			<input class="submit" type="submit" name="submit" formmethod="post" value="Create category">
		</form>
	</div>

	<?php
	if (isset($_POST['submit'])) {
		// Sanitize userinput
		if (isset($_POST['title'])) {
			$title = BaseController::fixString($_POST['title']);

			if ($validatorController->validateTitle($title)) {

				// Save category in database
				$category = $categoryController->create($title, $loginController->getLoggedInUser());

				// If no user is returned the username is already taken
				if (empty($category)) {
					echo "<div class='notice'>The title is already taken.</div>";
				} else {
					// Redirect to category
					header('Location: ' . PROJECT_ADDRESS . "category/" . $category->getId());
				}
			} else {
				echo "<div class='notice'>The title is not valid.</div>";
			}
		} else {
			echo "<div class='notice'>Fill out the field.</div>";
		}
	}?>

	<h3 class="content_headline">All Categories</h3>
	<?php
	$categoryArray = $categoryController->getAll();

	if (!empty($categoryArray)) {
		?>

		<div class="content_area">
		<?php foreach ($categoryArray as $category) {
			?>
			<div class="content_element">
				<a href="category/<?php echo $category->getId(); ?>">
					<div class="title">
						<?php echo $category->getName(); ?>
					</div>
					<div class="cover">
					</div>
				</a>
			</div>
		<?php
		}
	} else {
		?>
		<div class="category"">
		                     No Categories so far.
		</div>
	<?php
	}
} else {
	// Redirect to main
	header('Location: ' . PROJECT_ADDRESS . "home");
}