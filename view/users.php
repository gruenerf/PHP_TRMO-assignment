<?php if ($loginController->isAdmin()) {

	if (isset($_POST['delete'])) {
		$user = $userController->getById($_POST['delete']);

		if (!empty($user)) {
			$userController->delete($user);

			header('Location: ' . PROJECT_ADDRESS . "users/delete");
		} else {
			echo "<div class='notice'>The user id is not valid.</div>";
		}

	} elseif (isset($_POST['admin'])) {
		$user = $userController->getById($_POST['admin']);

		if (!empty($user)) {
			if ($userController->makeAdmin($user)) {
				header('Location: ' . PROJECT_ADDRESS . "users/role");
			}
		} else {
			echo "<div class='notice'>The user id is not valid.</div>";
		}
	} elseif (isset($_POST['writer'])) {
		$user = $userController->getById($_POST['writer']);

		if (!empty($user)) {
			if ($userController->makeWriter($user)) {
				header('Location: ' . PROJECT_ADDRESS . "users/role");
			}
		} else {
			echo "<div class='notice'>The user id is not valid.</div>";
		}
	}

	// Get url parameter
	$parameter = $routeController->getParameter();

	if (!empty($parameter)) {
		if ($parameter[0] === "delete") {
			?>
			<div class="notice_top">
				User was deleted successfully!
			</div>
		<?php
		}
		if ($parameter[0] === "role") {
			?>
			<div class="notice_top">
				Userrole changed to admin successfully!
			</div>
		<?php
		}
	}
	?>

	<h2 class="content_headline">Users</h2>

	<div class="content_area">
		<?php
		$userArray = $userController->getAll();

		if (!empty($userArray) && count($userArray) > 1) {
			?>
			<table class="user_table">
				<tr class="table_head">
					<td class="user_name">User</td>
					<td class="user_role">Role</td>
					<td class="user_admin">Make Writer</td>
					<td class="user_admin">Make Admin</td>
					<td class="user_delete">Delete</td>
				</tr>
				<?php
				foreach ($userArray as $user) {
					if ($user->getId() !== $loginController->getLoggedInUser()->getId()) {
						?>
						<tr>
							<td class="user_name">
								<?php echo $user->getName(); ?>
							</td>
							<td class="user_role">
								<?php echo $user->getRole(); ?>
							</td>
							<td class="user_writer">
								<?php if ($user->getRole() !== 'writer') { ?>
									<form>
										<button class="table_check" type="submit" formmethod="post" name="writer"
										        value="<?php echo $user->getId(); ?>"></button>
									</form>
								<?php } ?>
							</td>
							<td class="user_admin">
								<?php if ($user->getRole() !== 'admin') { ?>
									<form>
										<button class="table_check" type="submit" formmethod="post" name="admin"
										        value="<?php echo $user->getId(); ?>"></button>
									</form>
								<?php } ?>
							</td>
							<td class="user_delete">
								<form>
									<button id="delete_user" class="table_check" type="submit" formmethod="post"
									        name="delete"
									        value="<?php echo $user->getId(); ?>"></button>
								</form>
							</td>
						</tr>
					<?php
					}
				}?>
			</table>
		<?php
		} else {
			?>
			<h2>
				No users so far.
			</h2>
		<?php } ?>
	</div>
<?php
} else {
	// Redirect to main
	header('Location: ' . PROJECT_ADDRESS . "home");
}