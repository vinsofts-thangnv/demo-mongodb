<?php
		use MongoDB\Client;
		require "vendor/autoload.php";
		$con= new Client();
		$db= $con->demo;
		$coll=$db->user;
		$data=$coll->find();
		
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Demo- MongoDB</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
	 crossorigin="anonymous">
</head>

<body>

	<section class="container">
		<header>
			<h2>Add Username</h2>
		</header>
		<div>
			<form class="form-inline" method="POST">
				<div class="form-group mb-2">
					<label for="username" class="sr-only">Username</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Username">
				</div>
				<div class="form-group mx-sm-3 mb-2">
					<label for="password" class="sr-only">Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Password">
				</div>
				<button type="submit" class="btn btn-primary mb-2">Add</button>
				<?php
				if( isset($_SERVER['REQUEST_METHOD']) and ($_SERVER['REQUEST_METHOD']=="POST") and ($_POST['username']!="") and ($_POST['password']!="")){
					$coll->insertOne([username=>$_POST['username'],password=>$_POST['password']]);
					header("location:index.php");
				}
			?>
			</form>
		</div>
	</section>

	<section class="container">
		<header>
			<h2>List Username</h2>
		</header>
		<div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Username</th>
						<th scope="col">Password</th>
						<th scope="col">Options</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data as $item) { ?>
					<tr>
						<th scope="row">
							<?php echo $item['_id'].'<br>'; ?>
						</th>
						<td>
							<?php echo $item['username']; ?>
						</td>
						<td>
							<?php echo $item['password']; ?>
						</td>
						<td>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateModal" onClick="loadModal('<?php echo $item['_id']; ?>','<?php echo $item['username']; ?>','<?php echo $item['password']; ?>')">Update</button>
							<a onClick="return window.confirm('Delete ID: <?php echo $item['_id']; ?>  ?');" href="/demomongodb/delete.php?id=<?php echo $item['_id']; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>

			<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalTitle"
			 aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" >Update Username</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="/demomongodb/update.php" method="POST">
							<div class="modal-body">
								<div id="kq"></div>
								<div class="form-group mb-2">
									<label for="idModal" class="sr-only">ID</label>
									<input type="text" readOnly  class="form-control" id="idModal" name="idModal" placeholder="ID">
								</div>
								<div class="form-group mb-2">
									<label for="usernameModal" class="sr-only">Username</label>
									<input type="text" class="form-control" id="usernameModal" name="usernameModal" placeholder="Username">
								</div>
								<div class="form-group mb-2">
									<label for="password" class="sr-only">Password</label>
									<input type="password" class="form-control" id="passwordModal" name="passwordModal" placeholder="Password">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
	</section>


	<footer>
		<script>
			function loadModal(id,user,pass) {
				document.getElementById('idModal').value =id;
				document.getElementById('usernameModal').value = user;
				document.getElementById('passwordModal').value = pass;
				document.getElementById('kq').innerHTML='';
			}
		</script>



		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
		 crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
		 crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
		 crossorigin="anonymous"></script>
	</footer>
</body>

</html>