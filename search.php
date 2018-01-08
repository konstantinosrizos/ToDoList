<!DOCTYPE html>
<?php
include 'db.php';
if(isset($_POST['search'])) {
	$name = htmlspecialchars($_POST['search']);
	$sql = "SELECT * FROM tasks WHERE name LIKE '%$name%' ";
	$rows = $db->query($sql);
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
			<h1>Todo List</h1>
			</center>
			<div class="row" style="margin-top: 70px;">
				<div class="col-md-10 col-md-offset-1">
					<div class="col-md-12 text-center">
						<p>Search</p>
						<form action="search.php" method="post" class="form-g">
							
							<input type="text" placeholder="Search" name="search" class="form-control">
						</form>
					</div>
					<br><br>
					<?php  if(mysqli_num_rows($rows) < 1): ?>
					
					<h2 class="text-danger text-center">Nothing Found</h2>
					<?php else: ?>
					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col">ID.</th>
								<th scope="col">Task</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php
									while($row = $rows->fetch_assoc()):
								?>
								<th><?php echo $row['id']?></th>
								<td class="col-md-10"><?php echo $row['name']?></td>
								<td><a href="update.php?id=<?php echo $row['id'];?>" class="btn btn-success">Edit</td>
								<td><a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</td>
							</tr>
							<?php
									endwhile;
							?>
						</tbody>
					</table>
					<?php  endif; ?>
					
					<a href="index.php" class="btn btn-warning">Back</a>
				</div>
			</div>
		</div>
	</body>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</html>