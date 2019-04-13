<?php
	// including the database connection
	require_once('includes/database.php');
	
	// get the city ID
	$id = isset($_GET['id']) ? $_GET['id'] : '';

	// query database
	$sql = "SELECT * FROM City WHERE ID = '$id' LIMIT 1";

	// execute query
	$result = mysqli_query($db, $sql);

	// get the city data
	$city = mysqli_fetch_array($result, MYSQLI_ASSOC);
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $city['Name'] ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
	<h1><?= $city['Name'] ?></h1>
	<p>Distirct: <?= $city['District'] ?></p>
	<p>...</p>

	<h3>Places</h3>
	<table class="table table-bordered table-striped table-hover">
		<thead>
			<th>Name</th>
			<th>Address</th>
			<th>Description</th>
			<th>Rating</th>
			<th>Action</th>
		</thead>
		<tbody>
			<?php
				$query = "SELECT * FROM CityPlace Where CityID = 69";
				$result = mysqli_query($db, $query) or die('Error:');
				while($row = mysqli_fetch_array($result)){
					echo "<tr>
						<td>{$row['Name']}</td>
						<td>{$row['Address']}</td>
						<td>{$row['Description']}</td>
						<td>{$row['Rating']}</td>
						<td>
							<a href='edit_place.php?place_id={$row['place_id']}' class='btn btn-secondary'>Edit</a>
							<a href='delete_place.php?place_id={$row['PlaceID']}' class='btn btn-danger'>Delete</a>
						</td>
					</tr>";
				}
			?>
		</tbody>
	</table>
	<a href="add_place.php?city_id=<?=$id?>" class="btn btn-primary">Add Place</a>
</body>
</html>