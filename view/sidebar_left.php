<?php if (!$routeController->isUser()) { ?>

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

<?php
} else {
	?>
	<form action="">
		<button class="user_buttons" id="button_post" type="submit" formmethod="post" formaction="posts" name="post">
			<img title="Posts" src="<?php echo IMG_PATH ?>circle_post.png">

			<p>Posts</p>
		</button>
		<button class="user_buttons" id="button_topic" type="submit" formmethod="post" formaction="create_topic"
		        name="topic">
			<img title="Topics" src="<?php echo IMG_PATH ?>circle_topic.png">

			<p>Topics</p>
		</button>
		<button class="user_buttons" id="button_settings" type="submit" formmethod="post" formaction="settings"
		        name="settings">
			<img title="Settings" src="<?php echo IMG_PATH ?>circle_settings.png">

			<p>Settings</p>
		</button>
	</form>
<?php
}