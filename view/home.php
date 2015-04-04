<div>
	Sort by
	<form action="">
		<button type="submit" formmethod="post" formaction="#" name="date">Date</button>
		<button type="submit" formmethod="post" formaction="#" name="popularity">Popularity</button>
	</form>
</div>

<?php
if (isset($_POST['popularity'])) {
	// Todo implement
	$topicArray = $topicController->getTopicsPopularity('asc');
} elseif (isset($_POST['date'])) {
	$topicArray = $topicController->getTopicsChronological('asc');
}

if (!empty($topicArray)) {
	foreach ($topicArray as $topic) {
		?>
		<a href="topic/<?php echo $topic->getName(); ?>">
			<div>
				<?php echo $topic->getName(); ?>
			</div>
		</a>
	<?php
	}
}