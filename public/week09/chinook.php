<?php

// include database connection

require_once 'includes/chinookDB.php';

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chinook</title>
</head>
<body>

<?php
// build the query
$query = "SELECT InvoiceDate, FirstName, LastName, Total
            FROM Invoice
            LEFT JOIN Customer ON Invoice.CustomerId = Customer.CustomerId
            WHERE Total > 10
            ORDER BY InvoiceDate";

//execute the query
// add in die to help displaying the errors
$result = mysqli_query($db, $query) or die('Error in query: ' . mysqli_error($db));

?>

<table>
    <thead>
    <tr>
        <th>Invoice Date</th>
        <th>Customer</th>
        <th>Name</th>
        <th>Invoice total</th>
    </tr>
    </thead>
    <tbody>


    <?php

    // loop through results
    while($row = mysqli_fetch_array($result)){
        echo "<tr>
            <td>{$row['InvoiceDate']}</td>
            <td>{$row['FirstName']}</td>
            <td>{$row['LastName']}</td>
            <td>{$row['Total']}</td>
            </tr>";

    }

    // close database connection
    mysqli_close($db);

    ?>
    </tbody>
</table>

</body>
</html>
