<?php
if (isset($_POST['logout'])) {
	$loginController->logout();
	// Redirect to login page
	header('Location: ' . PROJECT_ADDRESS . "login/logout");
}

if ($loginController->isLoggedIn()) { ?>
	<form>
		<?php if($loginController->isAdmin()){?>
			<button class="user_buttons" id="button_summary" type="submit" formmethod="post" formaction="summary"
			        name="summary">
				<img title="Summary" src="<?php echo IMG_PATH ?>circle_statistics.png">

				<p>Summary</p>
			</button>
		<?php }?>
		<button class="user_buttons" id="button_settings" type="submit" formmethod="post" formaction="settings"
		        name="settings">
			<img title="Settings" src="<?php echo IMG_PATH ?>circle_settings.png">

			<p>Settings</p>
		</button>
		<button class="user_buttons" id="button_logout" type="submit" formmethod="post" formaction="" name="logout">
			<img title="Logout" src="<?php echo IMG_PATH ?>circle_logout.png">

			<p>Logout</p>
		</button>
	</form>
	<?php
} else {
	include_once(ROOT_PATH . "/view/sidebar_right_topic.php");
}

