<!-- <?php
		use MongoDB\Client;
		require "vendor/autoload.php";
		$con= new Client();
		$db= $con->demo;
		$coll=$db->user;
		$data=$coll->find();
		
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Demo- MongoDB</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

	<section class="container">
	<header>
	<h2>Add Username</h2>
	</header>
	<div>
		<form class="form-inline">
  			<div class="form-group mb-2">
    			<label for="username" class="sr-only">Username</label>
    			<input type="text" class="form-control" id="username" placeholder="Username">
  			</div>
  			<div class="form-group mx-sm-3 mb-2">
    			<label for="password" class="sr-only">Password</label>
    			<input type="password" class="form-control" id="password" placeholder="Password">
  			</div>
  			<button type="submit" class="btn btn-primary mb-2">Add</button>
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
      					<th scope="row"><?php echo $item['_id'].'<br>'; ?></th>
      					<td><?php echo $item['username'].'<br>'; ?></td>
      					<td><?php echo $item['password'].'<br>'; ?></td>
	  					<td>
							<button type="button" class="btn btn-success">Update</button>
							<button type="button" class="btn btn-danger">Delete</button>
						</td>
					</tr>
					<?php } ?>
  				</tbody>
			</table>
		</div>
	</section>
	

	<footer>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</footer>
</body>
</html>
