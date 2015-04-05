<?php
// Get url patameter
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
	<h1 class="entry-headline"><?php
		if (!empty($entry)) {
			echo $entry->getTitle();
		} else {
			echo "All Entries";
		}
		?>
	</h1>

	<?php if (!empty($entry)) { ?>

		<div class="entry_content">
			<?php echo $entry->getContent(); ?>
		</div>

	<?php
	} else {
		$entryArray = $entryController->getAll();
		if (!empty($entryArray)) {
			foreach ($entryArray as $entry) {
				?>
				<a href="entry/<?php echo $entry->getId(); ?>">
					<div class="entry_link">
						<p class="entry_name">
							<?php echo $entry->getTitle(); ?>
						</p>
					</div>
				</a>
			<?php
			}
		} else {
			?>
			<h2>
				No Entries so far.
			</h2>
		<?php
		}
	}?>
</div>