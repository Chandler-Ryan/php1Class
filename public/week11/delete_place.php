<?php
	// including the database connection
    require_once('includes/database.php');
    
    if (isset($_POST['delete'])){
	// query database
	$sql = "DELETE FROM CityPlace WHERE PlaceID = '{$_POST['place_id']}' LIMIT 1";
	// execute query
    $result = mysqli_query($db, $sql);
    header('Location: city.php');
    }else if(isset($_POST['cancel'])){
        header('Location: city.php');
    }

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Place</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
	
	<h3>Delete Place</h3>

<p>Are You sure you want to delete this place?</p>
	<form action="" method="post" class="container">
        <div class="row py-2">
            <label for="place_id" class="col col-3">Place ID is hidden</label>
            <input type="hidden" name="place_id" id="place_id"  value="<?=$_GET['place_id']?>">
            <div class="col col-9">The value is hidden</div>
        </div>
        <div class="row py-2">
        <button type="submit" class="btn btn-outline-success" value="delete">Delete</button>
        <button type="submit" class="btn btn-outline-success" value="cancel">Cancel</button>
        </div>
    </form>	
    </body>
</html>
