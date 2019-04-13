<?php
	// including the database connection
	require_once('includes/database.php');
	
	// get the city ID
	$city_id = isset($_GET['city_id']) ? $_GET['city_id'] : '';

	// query database
	$sql = "SELECT * FROM City WHERE ID = '$city_id' LIMIT 1";

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
    <title>Add Place</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
	<h1><?= $city['Name'] ?></h1>
	<p>Distirct: <?= $city['District'] ?></p>
	<p>...</p>

	<h3>Add Place</h3>
<?php
// if the form was submitted
if(isset($_POST['name'])){
    $name = $_POST['name'];
    $city_id = $_POST['city_id'];
    $address = $_POST['address'];
    $description = $_POST['description'];
    $rating = $_POST['rating'];

    // TODO: Validation

    // add to database
    $query = "INSERT INTO `CityPlace` (`PlaceID`, `Name`, `CityID`, `Address`, `Description`, `Rating`) VALUES (NULL, '$name', '$city_id', '$address', '$description', '$rating');";
    $result = mysqli_query($db, $query);

    //if (mysqli_affected_rows($result) == 1){
        if ($new_id = mysqli_insert_id($db)){// get the new primary key
        header('Location: City.php?id='.$city_id);
    }
    
}

?>

	<form action="" method="post" class="container">
        <div class="row py-2">
            <label for="name" class="col col-3">Name</label>
            <input type="text" name="name" id="name" class="col col-9">
        </div>
        <div class="row py-2">
            <label for="city_id" class="col col-3">City_id</label>
            <input type="hidden" name="city_id" id="city_id" value="<?=$city_id?>">
            <div class="col col-9">The value is hidden</div>
        </div>
        <div class="row py-2">
            <label for="address" class="col col-3">Address</label>
            <input type="text" name="address" id="address" class="col col-9">
        </div>
        <div class="row py-2">
            <label for="description" class="col col-3">Description</label>
            <textarea type="text" name="description" id="description" class="col col-9"></textarea>
        </div>
        <div class="row py-2">
            <label for="rating" class="col col-3">Rating</label>
            <input type="text" name="rating" id="rating" class="col col-9">
        </div>
        <div class="row py-2">
        <button type="submit" class="btn btn-outline-success">Submit</button>
        </div>
    </form>
	
</body>
</html>