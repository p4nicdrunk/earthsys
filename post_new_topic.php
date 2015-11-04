<div class='topic'>
	<h4>post new topic</h4>
	<form method="post" action="new_topic.php" id="newTopicForm">
	<div class="row">
		<div class="form-group col-md-5">
			<p>title:</p>
			<input type="text" name="title" id="title" class="form-control" placeholder="Topic Title" tabindex="1">
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-12">
			<p>body:</p>
			<textarea name="body" id="body" class="form-control" placeholder="new post here..." tabindex="2"></textarea>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-3">
			<p>category:</p>
			<select name="category">
				<?php include('list_categories.php'); ?>
			</select>
		</div>
	</div>
	<input type="submit" name="submit" value="Submit" class="btn btn-primary btn-small" tabindex="3">
</div>