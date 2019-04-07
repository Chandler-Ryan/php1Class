<?php
// include database connection
require_once 'includes/database.php';

// get country code
$code = $_GET['code'] ?? '';

$query = "SELECT * FROM Country WHERE Code = '$code'";

$result = mysqli_query($db, $query) or die("Error in query: " . mysqli_error($db));

// get the first result
$country = mysqli_fetch_array($result);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $country['Name'] ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<h1><?= $country['Name'] ?></h1>
<p><?= $country['Continent'] ?></p>
<p>...</p>
<?php
// build the query
$query = "SELECT * FROM City WHERE CountryCode = '$code'";

// execute the query
$result = mysqli_query($db, $query) or die('Error in query: ' . mysqli_error($db));

// get number of rows
$count = mysqli_num_rows($result);
echo "<p>$count cities found.</p>";
?>

<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>District</th>
            <th>Population</th>
        </tr>
    </thead>
    <tbody>
<?php
// loop through results
while($row = mysqli_fetch_array($result)){
    echo "<tr>
            <td>{$row['Name']}</td>
            <td>{$row['District']}</td>
            <td>{$row['Population']}</td>
          </tr>";
}

// close database connection
mysqli_close($db);

?>
    </tbody>
</table>


</body>
</html>
