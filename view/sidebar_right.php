<?php
	$topic = $topicController->getRandomTopic();
	$entryArray = $entryController->getAllEntryByTopic($topic);
?>

<h2 class="sidebar_headline"><?php echo $topic->getName(); ?></h2>

<ul class="entry_list">
	<?php
	if (!empty($entryArray)){
	foreach ($entryArray as $entry) {
		?>
		<li id="entry">
			<a href="<?php echo "entry/" . $entry->getTitle(); ?>">
				<?php echo $entry->getTitle(); ?>
			</a>
		</li>
	<?php }
	}
	else{
		echo "No entries so far.";
	}?>
</ul>