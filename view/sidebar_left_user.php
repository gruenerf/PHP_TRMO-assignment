<?php if ($loginController->isLoggedIn()) { ?>
	<form action="">
		<button class="user_buttons" id="button_post" type="submit" formmethod="post" formaction="entries" name="entries">
			<img title="Posts" src="<?php echo IMG_PATH ?>circle_post.png">

			<p>Entries</p>
		</button>
		<?php if ($loginController->isAdmin()) { ?>
			<button class="user_buttons" id="button_category" type="submit" formmethod="post" formaction="categories"
			        name="categories">
				<img title="Categories" src="<?php echo IMG_PATH ?>circle_category.png">

				<p>Categories</p>
			</button>
		<?php } ?>
		<button class="user_buttons" id="button_topic" type="submit" formmethod="post" formaction="topics"
		        name="topics">
			<img title="Topics" src="<?php echo IMG_PATH ?>circle_topic.png">

			<p>Topics</p>
		</button>
		<?php if ($loginController->isAdmin()) { ?>
			<button class="user_buttons" id="button_users" type="submit" formmethod="post" formaction="users"
			        name="users">
				<img title="Users" src="<?php echo IMG_PATH ?>circle_users.png">

				<p>Users</p>
			</button>
		<?php } ?>
	</form>
<?php
} else {
	include_once(ROOT_PATH . "/view/sidebar_left_category.php");
}