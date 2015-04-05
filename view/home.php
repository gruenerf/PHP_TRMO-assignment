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
	// save preferences in cookie
	setcookie('trmo_order', 'date_asc', strtotime( '+30 days' ));
} elseif (isset($_POST['date_desc'])) {
	$topicArray = $topicController->getTopicsChronological("desc");
	// save preferences in cookie
	setcookie('trmo_order', 'date_desc', strtotime( '+30 days' ));
} elseif (isset($_POST['popularity_asc'])) {
	$topicArray = $topicController->getTopicsPopularity("asc");
	// save preferences in cookie
	setcookie('trmo_order', 'popularity_asc', strtotime( '+30 days' ));
} elseif (isset($_POST['popularity_desc'])) {
	$topicArray = $topicController->getTopicsPopularity("desc");
	// save preferences in cookie
	setcookie('trmo_order', 'popularity_desc', strtotime( '+30 days' ));
} else {
	// Check cookie for preferred sorting
	$order = "";
	if (isset($_COOKIE['trmo_order'])) {
		$order = $_COOKIE['trmo_order'];
	}

	// if cookie is set then sort after preferred sorting
	if ($order === 'date_asc') {
		$topicArray = $topicController->getTopicsChronological("asc");
	} elseif ($order === 'date_desc') {
		$topicArray = $topicController->getTopicsChronological("desc");
	} elseif ($order === 'popularity_asc') {
		$topicArray = $topicController->getTopicsPopularity("asc");
	} elseif ($order === 'popularity_desc') {
		$topicArray = $topicController->getTopicsPopularity("desc");
	}else{
		$topicArray = $topicController->getTopicsChronological("desc");
		// save preferences in cookie
		setcookie('trmo_order', 'date_desc', strtotime( '+30 days' ));
	}

}

if (!empty($topicArray)) {
	foreach ($topicArray as $topic) {
		?>
		<a href="topic/<?php echo $topic->getId(); ?>">
			<div>
				<?php echo $topic->getName(); ?>
			</div>
		</a>
	<?php
	}
}