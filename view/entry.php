<?php
// Get url parameter
$parameter = $routeController->getParameter();

if (!empty($parameter)) {
	// Get entry_id
	$entry_id = intval($parameter[0]);
} else {
	$entry_id = null;
}

// Get current entry
if (!empty($entry_id) && is_int($entry_id)) {
	$entry = $entryController->getById($entry_id);
}
?>

<div class="entry">
	<h2 class="content_headline"><?php
		if (!empty($entry)) {
			echo $entry->getTitle();
		} else {
			echo "All Entries";
		}
		?>
	</h2>

	<div class="content_area">

		<?php if (!empty($entry)) { ?>
			<?php
			if (!$loginController->isAdmin() &&
				$loginController->getLoggedInUser() &&
				$loginController->getLoggedInUser()->getId() === $entry->getUserId()
			) {
				?>
				<form>
					<button class="button_delete" id="delete_entry" type="submit" formmethod="post"
					        name="delete"></button>
				</form>
			<?php
			} elseif ($loginController->isAdmin()) {
				?>
				<form>
					<button class="button_delete" id="delete_entry" type="submit" formmethod="post"
					        name="delete"></button>
				</form>
			<?php
			}
			if (isset($_POST['delete'])) {
				$entryController->delete($entry);

				// Redirect to entries page
				header('Location: ' . PROJECT_ADDRESS . "entries/deleted");
			}
			?>

			<div class="entry_content">
				<?php echo $entry->getContent(); ?>
			</div>
		<?php
		} else {
			?>
			<?php
			$entryArray = $entryController->getAll();
			if (!empty($entryArray)) {
				foreach ($entryArray as $entry) {
					?>

					<div class="content_element">
						<a href="entry/<?php echo $entry->getId(); ?>">
							<div class="title">
								<?php echo $entry->getTitle(); ?>
							</div>
							<div class="cover">
							</div>
						</a>
					</div>
				<?php
				}
			} else {
				?>
				<h2>
					No Entries so far.
				</h2>
			<?php
			}
		} ?>
	</div>
</div>