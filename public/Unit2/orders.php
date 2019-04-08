<?php 
$title = "Orders";
require_once('includes/header.php');
$cList = false;
if(empty($_GET['id']) || !is_numeric($_GET['id']) || 
(is_int($_GET['id']) && $_GET['id'] < 1 )){
    // get all Customers
    $query = "SELECT FirstName, LastName, CustomerID, City, `State`
                FROM Customer
                ORDER BY LastName";
    // execute the query
    $result = mysqli_query($db, $query) or die('Error in query: ' . mysqli_error($db));
    echo 'first';
    $cList = true;
}else if(!empty($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0 ){
    $query = "SELECT Concat(FirstName, ' ', LastName) as `name`
    FROM Customer WHERE CustomerID = {$_GET['id']}";
    $name = mysqli_fetch_array(mysqli_query($db, $query))['name'];
    // get all orders for this customer
    $query = "SELECT *
                FROM OrderHeader oh
                JOIN OrderDetail od ON oh.OrderID = od.OrderID
                WHERE oh.CustomerID = {$_GET['id']}";
    // execute the query
    $result = mysqli_query($db, $query) or die('Error in query: ' . mysqli_error($db));
    $orders = mysqli_fetch_array($result);
    $cList = false;
}
// close database connection
mysqli_close($db);
?>

<main class="container">
    <h1 class="text-center"><?=$cList ? "Customers" : "Orders for $name"?></h1>
    <table class="table table-striped table-bordered table-hover">
    <?php if($cList):?>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>City</th>
                <th>State</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_array($result)):?>
            <tr>
                <td><a href="orders.php?id=<?=$row['CustomerID']?>"><?=$row['FirstName']?></a></td>
                <td><?=$row['LastName']?></td>
                <td><?=$row['City']?></td>
                <td><?=$row['State']?></td>
            </tr>                    
            <?php endwhile;?>
        </tbody>
    <?php else:?>
        <thead>
            <tr>
                <th>Order Date</th>
                <th>Order Number</th>
                <th>UnitPrice</th>
                <th>Quanity</th>
                <th>Line Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $total=0; while($row = mysqli_fetch_array($result)): $total += ($row['UnitPrice'] * $row['OrderQuantity']);?>
            <tr>
                <td><?=$row['OrderDate']?></td>
                <td><?=$row['OrderID']?></td>
                <td><?=$row['UnitPrice']?></td>
                <td><?=$row['OrderQuantity']?></td>
                <td><?=($row['UnitPrice'] * $row['OrderQuantity'])?></td>
            </tr>                    
            <?php endwhile;?>
        </tbody>
    <?php endif;?>
    </table>
    <h1 class="text-center">Total for all items: $<?=$total?></h1>
</main>

<?php
require_once('includes/footer.php');
?>
