<?php if ($routeController->isSettings()) { ?>
<div class="settings">
	<?php } ?>

	<div class="content_container">
		<div class="content_area">
			<div class="sidebar_left">
				<?php
				include_once(ROOT_PATH . "/view/sidebar_left.php");
				?>
			</div>
			<div class="content_middle">
				<?php
				include_once(ROOT_PATH . "/view/" . $routeController->getView());
				?>
			</div>
			<div class="sidebar_right">
				<?php
				include_once(ROOT_PATH . "/view/sidebar_right.php");
				?>
			</div>
		</div>
	</div>
	
	<?php if ($routeController->isSettings()) { ?>
</div>
<?php } ?>

