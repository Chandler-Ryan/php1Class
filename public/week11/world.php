<?php
// include database connection
require_once 'includes/database.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>World</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<?php
$sort = $_GET['sort'] ?? 'Name'; // 'Name' is the default sort
$dir = $_GET['dir'] ?? 'ASC'; // 'ASC' is the default sort direction

// build the query
$query = "SELECT Code, Name, Continent, Population 
        FROM Country
        ORDER BY $sort $dir";

// execute the query
$result = mysqli_query($db, $query) or die('Error in query: ' . mysqli_error($db));

// get number of rows
$count = mysqli_num_rows($result);
echo "<p>$count countries found.</p>";
?>

<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <?php
                // set NEW sort directions
                $populationDir = ($sort == 'Population' && $dir == 'ASC') ? 'DESC' : 'ASC';
                $populationArr = '';
                if($sort == 'Population'){
                    $populationArr = $dir == 'ASC' ? '&darr;' : '&uarr;';
                }
            ?>
            <th><a href="?sort=Name">Name</a></th>
            <th><a href="?sort=Continent">Continent</a></th>
            <th><a href="?sort=Population&dir=<?= $populationDir ?>">Population</a> <?= $populationArr ?></th>
        </tr>
    </thead>
    <tbody>
<?php
// loop through results
while($row = mysqli_fetch_array($result)){
    echo "<tr>
            <td><a href=\"country.php?code={$row['Code']}\">{$row['Name']}</a></td>
            <td>{$row['Continent']}</td>
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
