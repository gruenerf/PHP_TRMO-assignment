<?php if (!$routeController->isSettings()) { ?>

	<h2 class="sidebar_headline">Categories</h2>

	<ul class="list">
		<?php
		$catArray = $categoryController->getAll();
		if (!empty($catArray)) {
			foreach ($catArray as $cat) {
				?>
				<li id="category">
					<a href="<?php echo "category/" . $cat->getId(); ?>">
						<?php echo $cat->getName(); ?>
					</a>
				</li>
			<?php
			}
		} else {
			?>
			<li>
				No categories so far.
			</li>
		<?php } ?>
	</ul>

<?php }