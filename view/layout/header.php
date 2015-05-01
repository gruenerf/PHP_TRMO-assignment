<div class="header_container">
	<div class="header">
		<a href="" id="logo">
			<img id="logo_img" title="Home" src="<?php echo IMG_PATH; ?>logo.png">
		</a>

		<form class="search" action="search">
			<input class="text" type="text" name="searchtext" placeholder="Search">
			<input class="submit" type="submit" formmethod="post" value="Go!">
		</form>

		<a href="login" id="login">
			<?php if ($loginController->isLoggedIn()) { ?>
				<img id="login_img" title="Login" src="<?php echo IMG_PATH; ?>user.png">
			<?php } else { ?>
				<img id="login_img" title="User" src="<?php echo IMG_PATH; ?>login.png">
			<?php } ?>
		</a>
	</div>
</div>