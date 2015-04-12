<?php if ($loginController->isLoggedIn()) { ?>
	<form action="">
		<button class="user_buttons" id="button_post" type="submit" formmethod="post" formaction="entries" name="post">
			<img title="Posts" src="<?php echo IMG_PATH ?>circle_post.png">

			<p>Entries</p>
		</button>
		<button class="user_buttons" id="button_topic" type="submit" formmethod="post" formaction="topics"
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
}else{
	include_once(ROOT_PATH . "/view/sidebar_left_category.php");
}