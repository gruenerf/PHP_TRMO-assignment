<div class="content_container">
	<div class="content_wrapper">
		<div class="sidebar_left">
			<?php
			include_once(ROOT_PATH . "/view/" . $routeController->getSidebarLeft());
			?>
		</div>
		<div class="content_middle">
			<?php
			include_once(ROOT_PATH . "/view/" . $routeController->getView());
			?>
		</div>
		<div class="sidebar_right">
			<?php
			include_once(ROOT_PATH . "/view/" . $routeController->getSidebarRight());
			?>
		</div>
	</div>
</div>

