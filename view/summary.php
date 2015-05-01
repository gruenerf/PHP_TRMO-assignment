<?php if ($loginController->isAdmin()) {
	?>

	<h2 class="content_headline">Summary</h2>

	<div class="content_area">
	<?php
	$categoryArray = $categoryController->getAll();

	if (!empty($categoryArray)) {
		?>

		<table class="summary_table">
			<tr class="table_head">
				<td>Category</td>
				<td>Number of topics</td>
			</tr>

			<?php foreach ($categoryArray as $category) {
				?>
				<tr>
					<td><?php echo $category->getName(); ?></td>
					<td><?php echo count($topicController->getAllTopicByCategory($category)); ?></td>
				</tr>
			<?php } ?>

		</table>

	<?php
	} else {
		?>
		<h2>
			No categories so far.
		</h2>
	<?php
	}?>

	</div>
<?php
} else {
	// Redirect to main
	header('Location: ' . PROJECT_ADDRESS . "home");
}