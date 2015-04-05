<div>
	Sort by
	<form action="">
		<button type="submit" formmethod="post" formaction="#" name="date_asc">Date</button>
		<button type="submit" formmethod="post" formaction="#" name="date_desc">Date</button>
		<button type="submit" formmethod="post" formaction="#" name="popularity_asc">Popularity</button>
		<button type="submit" formmethod="post" formaction="#" name="popularity_desc">Popularity</button>
	</form>
</div>

<?php
if (isset($_POST['date_asc'])) {
	$topicArray = $topicController->getTopicsChronological("asc");
} elseif (isset($_POST['date_desc'])) {
	$topicArray = $topicController->getTopicsChronological("desc");
} elseif (isset($_POST['popularity_asc'])) {
	$topicArray = $topicController->getTopicsPopularity("asc");
} elseif (isset($_POST['popularity_desc'])) {
	$topicArray = $topicController->getTopicsPopularity("desc");
} else{
	$topicArray = $topicController->getTopicsChronological("desc");
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