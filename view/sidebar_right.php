<?php
$topic = $topicController->getRandomTopic();
if (!empty($topic)) {
	$entryArray = $entryController->getAllEntryByTopic($topic);
}
?>

<h2 class="sidebar_headline">
	<?php if (!empty($topic)) {
		echo $topic->getName();
	}else{
		echo "No topics so far.";
	} ?></h2>

<ul class="entry_list">
	<?php
	if (!empty($entryArray)) {
		foreach ($entryArray as $entry) {
			?>
			<li id="entry">
				<a href="<?php echo "entry/" . $entry->getId(); ?>">
					<?php echo $entry->getTitle(); ?>
				</a>
			</li>
		<?php
		}
	} else {
		echo "No entries so far.";
	}?>
</ul>