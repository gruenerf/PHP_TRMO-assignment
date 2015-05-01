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
	header('Location: ' . PROJECT_ADDRESS . "search/" . $term);
	// Make sure the code terminates
	die();
} else {
	$term = null;
}


?>

<div class="search">
	<h2 class="content_headline">Search Results</h2>

	<?php if (strlen($term) < 3) { ?>
		<div class="search_results-entries">
			<div class="notice">The searchterm has to be at least 3 characters.</div>
		</div>
		<?php die();
	}

	if (!empty($term)) {
		$topicArray = $topicController->searchForTopic($term);
		$entryArray = $entryController->searchForEntry($term);
	}
	?>

	<?php if (!empty($topicArray)) { ?>
		<h3 class="content_headline">Topics</h3>
		<div class="content_area">
			<?php foreach ($topicArray as $topic) { ?>
				<div class="content_element">
					<a href="topic/<?php echo $topic->getId(); ?>">
						<div class="title">
							<?php echo $topic->getName(); ?>
						</div>
						<div class="cover">
						</div>
					</a>
				</div>
			<?php
			}?>
		</div>
	<?php
	}

	if (!empty($entryArray)) {
		?>
		<h3 class="content_headline">Entries</h3>
		<div class="content_area">
			<?php foreach ($entryArray as $entry) { ?>
				<div class="content_element">
					<a href="entry/<?php echo $entry->getId(); ?>">
						<div class="title">
							<?php echo $entry->getTitle(); ?>
						</div>
						<div class="cover">
						</div>
					</a>
				</div>
			<?php
			}?>
		</div>
	<?php
	}

	if (empty($entryArray) && empty($topicArray)) {
		?>
		<div class="search_results-entries">
			<div class="notice">No results found.</div>
		</div>
	<?php
	}?>
</div>