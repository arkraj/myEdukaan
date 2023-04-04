<!DOCTYPE html>
<html>
<head>
	<title>Vendor Product Management</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style>
		/* Custom styles here */
	</style>
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="#">My Vendor Dashboard</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="#">Home</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="#">Products</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Orders</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Account</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	
	<section class="container">
		<h1 class="my-4">Product Management</h1>
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Price</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Product 1</td>
							<td>$19.99</td>
							<td>
								<a href="#" class="btn btn-success">Edit</a>
								<a href="#" class="btn btn-danger">Delete</a>
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td>Product 2</td>
							<td>$29.99</td>
							<td>
								<a href="#" class="btn btn-success">Edit</a>
								<a href="#" class="btn btn-danger">Delete</a>
							</td>
						</tr>
						<tr>
							<td>3</td>
							<td>Product 3</td>
							<td>$39.99</td>
							<td>
								<a href="#" class="btn btn-success">Edit</a>
								<a href="#" class="btn btn-danger">Delete</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div
