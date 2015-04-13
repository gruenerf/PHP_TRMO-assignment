<h2 class="sidebar_headline">Categories</h2>

<ul class="sidebar_list">
	<?php
	$catArray = $categoryController->getAll();
	if (!empty($catArray)) {
		foreach ($catArray as $cat) {
			?>
			<li class="sidebar_list_element">
				<a href="<?php echo "category/" . $cat->getId(); ?>">
					<div class="title">
						<?php echo $cat->getName(); ?>
					</div>
					<div class="cover"></div>
				</a>
			</li>
		<?php
		}
	} else {
		?>
		<li class="sidebar_list_element">
			No categories so far.
		</li>
	<?php } ?>
</ul>