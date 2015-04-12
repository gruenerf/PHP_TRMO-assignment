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
		$category = $categoryController->getById($topic->getCategoryId());
	}
}

if (!empty($category)) {
	?>
	<h2 class="sidebar_headline"><?php echo $category->getName(); ?></h2>

	<ul class="sidebar_list">
		<?php
		$topicArray = $topicController->getAllTopicByCategory($category);
		if (!empty($topicArray)) {
			foreach ($topicArray as $topic) {
				?>
				<li class="sidebar_list_element">
					<a href="<?php echo "topic/" . $topic->getId(); ?>">
						<?php echo $topic->getName(); ?>
					</a>
				</li>
			<?php
			}
		} else {
			?>
			<li class="sidebar_list_element">
				No topics so far.
			</li>
		<?php } ?>
	</ul>
<?php
} else {
	include_once(ROOT_PATH . "/view/sidebar_left_category.php");
}

