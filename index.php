<!DOCTYPE html>
<?php
include 'db.php';
$page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);
$perPage = (isset($_GET['per-page']) && (int)($_GET['per-page']) <= 50 ? (int)$_GET['per-page'] : 5);
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
$sql = "SELECT * FROM tasks LIMIT ".$start." , ".$perPage." ";
$total = $db->query("SELECT * FROM tasks")->num_rows;
$pages = ceil($total / $perPage);
$rows = $db->query($sql);
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
					<table class="table table-hover">
						<button type="button" data-target="#myModal" data-toggle="modal" class="btn btn-success">Add Task</button>
						<button type="button" class="btn btn-primary float-right" onclick="print()">Print</button>
						<div class="col-md-12 text-center">
							<p>Search</p>
							<form action="search.php" method="post" class="form-g">
								
								<input type="text" placeholder="Search" name="search" class="form-control">
							</form>
						</div>
						<br><br>
						<!-- Modal -->
						<div id="myModal" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Add Task</h4>
									</div>
									<div class="modal-body">
										<form method="post" action="add.php">
											<div class="form-group">
												<label>Task Name</label>
												<input type="text" class="form-control" name="task" value="" placeholder="" required>
											</div>
											<input type="submit" name="send" value="Add Task" class="btn btn-success">
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
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
					<ul class="pagination justify-content-center">
						<?php for($i = 1; $i <= $pages; $i++): ?>
						<li class="page-item"><a class="page-link" href="?page=<?php echo $i; ?>&per-page=<?php echo $perPage; ?>" title=""><?php echo $i; ?></a></li>
						<?php endfor; ?>
					</ul>
				</div>
			</div>
		</div>
	</body>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</html>