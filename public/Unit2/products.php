<?php 
$title = "Products";
require_once('includes/header.php');

$sort = $_GET['sort'] ?? 'ProductName'; // 'Name' is the default sort
$dir = $_GET['dir'] ?? 'ASC'; // 'ASC' is the default sort direction

// get all products
$query = "SELECT ProductID, Model, p.Name as ProductName, ProductNumber, Color, ListPrice, pc.Name as Category
            FROM Product p
            JOIN ProductCategory pc ON p.ProductCategoryID = pc.ProductCategoryID
            ORDER BY $sort $dir";

// execute the query
$result = mysqli_query($db, $query) or die('Error in query: ' . mysqli_error($db));

// get number of rows
$count = mysqli_num_rows($result);
echo "<p class=\"text-center\" style=\"margin-top:56px;\">$count products found.</p>";
?>

<main class="container">
    <h1 class="text-center">Our Products!</h1>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <?php
                    // set NEW sort directions
                    $priceDir = ($dir == 'ASC') ? 'DESC' : 'ASC';
                    $priceArr = $dir == 'ASC' ? '&darr;' : '&uarr;';
                    
                ?>
                <th><a href="?sort=Category&dir=<?= $priceDir ?>">Category</a> <?= $sort == 'Category' ? $priceArr : '' ?></th>
                <th><a href="?sort=ProductName&dir=<?= $priceDir ?>">Product Name</a> <?= $sort == 'ProductName' ? $priceArr : '' ?></th>
                <th><a href="?sort=Model&dir=<?= $priceDir ?>">Model</a> <?= $sort == 'Model' ? $priceArr : '' ?></th>
                <th><a href="?sort=ProductNumber&dir=<?= $priceDir ?>">Product Number</a> <?= $sort == 'ProductNumber' ? $priceArr : '' ?></th>
                <th><a href="?sort=Color&dir=<?= $priceDir ?>">Color</a> <?= $sort == 'Color' ? $priceArr : '' ?></th>
                <th><a href="?sort=ListPrice&dir=<?= $priceDir ?>">Price</a> <?= $sort == 'ListPrice' ? $priceArr : '' ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
                // loop through results
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>
                            <td>{$row['Category']}</td>
                            <td><a href=\"productDetail.php?id={$row['ProductID']}\">{$row['ProductName']}</td>
                            <td>{$row['Model']}</td>
                            <td>{$row['ProductNumber']}</td>
                            <td>{$row['Color']}</td>
                            <td>{$row['ListPrice']}</td>
                        </tr>";
                }

                // close database connection
                mysqli_close($db);
            ?>
        </tbody>
    </table>
</main>

<?php
require_once('includes/footer.php');
?>
