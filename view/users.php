<?php if ($loginController->isAdmin()) {
	// Get url parameter
	$parameter = $routeController->getParameter();

	if (!empty($parameter)) {
		if ($parameter[0] === "madeAdmin") {
			?>
			<div class="newCategory">
				Admin-rights were successful.
			</div>
		<?php
		}
	}
	?>

	<h2 class="content_headline">Users</h2>

	<h3 class="content_headline">All Users</h3>
	<?php
	$userArray = $userController->getAll();

	if (!empty($userArray)) {
		foreach ($userArray as $user) {
			?>
			<div class="user">
				<p class="user_name">
					<?php echo $user->getName(); ?>
				</p>
			</div>
		<?php
		}
	} else {
		?>
		<div class="user"">
			No users so far.
		</div>
	<?php
	}
} else {
	// Redirect to main
	header('Location: ' . PROJECT_ADDRESS . "home");
}