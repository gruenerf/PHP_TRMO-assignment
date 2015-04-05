<?php
// Get url patameter
$parameter = $routeController->getParameter();

if (!empty($parameter)) {
	// Get topic_id
	$topic_id = intval($parameter[0]);
} else {
	$topic_id = null;
}

/**
 * proof for integer val of id
 */
if (!empty($topic_id) && is_int($topic_id)) {
	$topic = $topicController->getById($topic_id);
	if(!empty($topic)){
		$entryArray = $entryController->getAllEntryByTopic($topic);
	}
}
?>

<div class="topic">
	<h1 class="topic-headline"><?php
		if (!empty($topic)) {
			echo $topic->getName();
		} else {
			echo "All Topics";
		}
		?>
	</h1>

	<?php if (!empty($topic)) {
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
		}
	} else {
		$topicArray = $topicController->getAll();
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
	}?>
</div>