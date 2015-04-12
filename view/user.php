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
	header('Location: ' . PROJECT_ADDRESS."login");
}
