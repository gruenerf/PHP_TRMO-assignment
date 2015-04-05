<?php
// Get url patameter
$parameter = $routeController->getParameter();

if (!empty($parameter)) {
	// Get category_id
	$category_id = intval($parameter[0]);
} else {
	$category_id = null;
}

if (!empty($category_id) && is_int($category_id)) {
	$category = $categoryController->getById($category_id);
	if(!empty($category)){
		$topicArray = $topicController->getAllTopicByCategory($category);
	}
}
?>

<div class="category">
	<h1 class="category-headline"><?php
		if (!empty($category)) {
			echo $category->getName();
		} else {
			echo "All Categories";
		}
		?>
	</h1>

	<?php if (!empty($category)) {
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
				No topics so far.
			</h2>
		<?php
		}
	} else {
		$categoryArray = $categoryController->getAll();
		if (!empty($categoryArray)) {
			foreach ($categoryArray as $category) {
				?>
				<a href="category/<?php echo $category->getId(); ?>">
					<div class="category">
						<p class="category_name">
							<?php echo $category->getName(); ?>
						</p>
					</div>
				</a>
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