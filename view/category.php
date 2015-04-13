<?php
// Get url parameter
$parameter = $routeController->getParameter();

if (!empty($parameter)) {
	// Get category_id
	$category_id = intval($parameter[0]);
} else {
	$category_id = null;
}

if (!empty($category_id) && is_int($category_id)) {
	$category = $categoryController->getById($category_id);
	if (!empty($category)) {
		$topicArray = $topicController->getAllTopicByCategory($category);
	}
}
?>

<div class="category">
	<h2 class="content_headline"> <?php
		if (!empty($category)) {
			echo $category->getName();
		} else {
			echo "All Categories";
		}
		?>
	</h2>

	<div class="content_area">
		<?php if (!empty($category)) {
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
					No topics so far.
				</h2>
			<?php
			}
		} else {
			$categoryArray = $categoryController->getAll();
			if (!empty($categoryArray)) {
				foreach ($categoryArray as $category) {
					?>
					<div class="content_element">
						<a href="category/<?php echo $category->getId(); ?>">
							<div class="title">
								<?php echo $category->getName(); ?>
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
					No categories so far.
				</h2>
			<?php
			}
		}?>
	</div>
</div>