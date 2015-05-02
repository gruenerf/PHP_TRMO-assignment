$(document).ready(function(){

	/**
	 *  Sets alerts for a couple of tasks to ask user to confirm the action
	 */

	$("#delete_category").click(function(e){
		var r = confirm("Do you really want to delete the selected category?");
		if (r !== true) {
			e.preventDefault();
		}
	});

	$("#delete_topic").click(function(e){
		var r = confirm("Do you really want to delete the selected topic?");
		if (r !== true) {
			e.preventDefault();
		}
	});

	$("#delete_entry").click(function(e){
		var r = confirm("Do you really want to delete the selected entry?");
		if (r !== true) {
			e.preventDefault();
		}
	});

	$("#delete_user").click(function(e){
		var r = confirm("Do you really want to delete the selected user?");
		if (r !== true) {
			e.preventDefault();
		}
	});

	$("#delete_account").click(function(e){
		var r = confirm("Do you really want to delete your Account. This will delete all entries you created.");
		if (r !== true) {
			e.preventDefault();
		}
	});
});