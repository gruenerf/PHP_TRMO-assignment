<?php
// Get url parameter
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
	if (!empty($topic)) {
		$entryArray = $entryController->getAllEntryByTopic($topic);
	}
}
?>

<div class="topic">
	<h2 class="content_headline"><?php
		if (!empty($topic)) {
			echo $topic->getName();
		} else {
			echo "All Topics";
		}
		?>
	</h2>

	<div class="content_area">
		<?php if (!empty($topic)) {
			if (!empty($entryArray)) {
				foreach ($entryArray as $entry) {
					?>
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
</div>