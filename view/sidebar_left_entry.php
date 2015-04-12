<?php
// Get url parameter
$parameter = $routeController->getParameter();

if (!empty($parameter)) {
	// Get entry_id
	$entry_id = intval($parameter[0]);
} else {
	$entry_id = null;
}

/**
 * proof for integer val of id
 */
if (!empty($entry_id) && is_int($entry_id)) {
	$entry = $entryController->getById($entry_id);
	if (!empty($entry)) {
		$topic = $topicController->getById($entry->getTopicId());
	}
}

if (!empty($entry)) {
	?>
	<h2 class="sidebar_headline"><?php echo $entry->getName(); ?></h2>

	<ul class="sidebar_list">
		<?php
		$entryArray = $entryController->getAllEntryByTopic($topic);
		if (!empty($entryArray)) {
			foreach ($entryArray as $entry) {
				?>
				<li class="sidebar_list_element">
					<a href="<?php echo "entry/" . $entry->getId(); ?>">
						<?php echo $entry->getName(); ?>
					</a>
				</li>
			<?php
			}
		} else {
			?>
			<li class="sidebar_list_element">
				No entries so far.
			</li>
		<?php } ?>
	</ul>
<?php
} else {
	include_once(ROOT_PATH . "/view/sidebar_left_category.php");
}

