<?php
$topic = $topicController->getRandomTopic();
if (!empty($topic)) {
	$entryArray = $entryController->getAllEntryByTopic($topic);
}
?>

<h2 class="sidebar_headline">
	<?php if (!empty($topic)) {
		echo $topic->getName();
	} else {
		echo "No topics so far.";
	} ?></h2>

<ul class="sidebar_list">
	<?php
	if (!empty($entryArray)) {
		foreach ($entryArray as $entry) {
			?>
			<li class="sidebar_list_element">
				<a href="<?php echo "entry/" . $entry->getId(); ?>">
					<div class="title">
					<?php echo $entry->getTitle(); ?>
					</div>
					<div class="cover"></div>
				</a>
			</li>
		<?php
		}
	} else {
		?>
		<li class="sidebar_list_element"> No entries so far.</li>
	<?php } ?>
</ul>
