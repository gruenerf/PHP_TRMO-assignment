<?php
// Get url patameter
$parameter = $routeController->getParameter();

if (!empty($parameter)) {
	// Get Searchterm
	$term = $parameter[0];
} elseif (isset($_POST["searchtext"])) {
	// Sanitize post string
	$term = BaseController::fixString($_POST["searchtext"]);
	// Put post as parameter in url
	header('Location: ' . PROJECT_ADDRESS."search/" . $term);
	// Make sure the code terminates
	die();
} else {
	$term = null;
}

if (!empty($term)) {
	$topicArray = $topicController->searchForTopic($term);
	$entryArray = $entryController->searchForEntry($term);
}
?>

<div class="search">
	<h1 class="content_headline">Search Results</h1>

	<?php if (!empty($topicArray)) { ?>

		<div class="search_results-topics">
			<h2 class="search_results-headline">Topics</h2>
			<?php foreach ($topicArray as $topic) { ?>
				<a href="topic/<?php echo $topic->getId(); ?>">
					<div class="topic">
						<p class="topic_name">
							<?php echo $topic->getName(); ?>
						</p>
					</div>
				</a>
			<?php
			}?>

		</div>
	<?php }

	if (!empty($entryArray)) { ?>

		<div class="search_results-entries">
			<h2 class="search_results-headline">Entries</h2>
			<?php foreach ($entryArray as $entry) { ?>
				<a href="entry/<?php echo $entry->getId(); ?>">
					<div class="entry">
						<p class="entry_name">
							<?php echo $entry->getTitle(); ?>
						</p>
					</div>
				</a>
			<?php
			}?>

		</div>
	<?php }

	if(empty($entryArray) && empty($topicArray)){
		?>
		<div class="search_results-entries">
			<h2 class="search_results-headline">No results found.</h2>
		</div>
	<?php
	}?>
</div>