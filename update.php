<!DOCTYPE html>
<?php
include 'db.php';
$id = (int)$_GET['id'];
$sql = "SELECT * FROM tasks WHERE id='$id'";
$rows = $db->query($sql);
$row = $rows->fetch_assoc();
if(isset($_POST['send'])) {
	$task = htmlspecialchars($_POST['task']);
	$sql = "UPDATE tasks SET name = '$task' WHERE id = '$id'";
	$db->query($sql);
	header ("location: index.php");
}
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Todo List</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	</head>
	<body>
		
		<div class="container">
			
			<center style="margin-top: 70px;">
			<h1>Update Todo List</h1>
			</center>
			<div class="row" style="margin-top: 70px;">
				<div class="col-md-10 col-md-offset-1">
					<hr>
					<form method="post">
						<div class="form-group">
							<label>Task Name</label>
							<input type="text" class="form-control" name="task" value="<?php echo $row['name']; ?>" placeholder="" required>
						</div>
						<input type="submit" name="send" value="Add Task" class="btn btn-success">&nbsp;
						<a href="index.php" class="btn btn-warning" title="">Back</a>
					</form>
				</div>
			</div>
		</div>
	</body>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</html>