
<?php if (!$routeController->isUser()) { ?>
<form>
	<button class="user_buttons" id="button_logout" type="submit" formmethod="post" formaction="" name="logout">
		<img title="Logout" src="<?php echo IMG_PATH ?>circle_logout.png">

		<p>Logout</p>
	</button>
</form>
<?php
if (isset($_POST['logout'])) {
	$loginController->logout();
	// Redirect to login page
	header('Location: ' . PROJECT_ADDRESS . "login/logout");
}}else{
	include_once(ROOT_PATH . "/view/sidebar_right_topic");
}