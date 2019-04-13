<?php 
if(empty($_GET['id']) || !is_numeric($_GET['id']) || 
    (is_int($_GET['id']) && $_GET['id'] < 1 ) ){
    header("Location: products.php");
}
$id = $_GET['id'];
$title = "Product Detail";
require_once('includes/header.php');
// get all products
$query = "SELECT Model, p.Name as ProductName, ProductNumber, Color, ListPrice, pc.Name as Category
            FROM Product p
            JOIN ProductCategory pc ON p.ProductCategoryID = pc.ProductCategoryID
            WHERE ProductID = $id";
// execute the query
$result = mysqli_query($db, $query) or die('Error in query: ' . mysqli_error($db));
$product = mysqli_fetch_array($result);
// close database connection
mysqli_close($db);
?>

<main class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <h5 class="card-header"><?=$product['Model']?></h5>
                <div class="card-body">
                    <h5 class="card-title"><?=$product['ProductName']?></h5>
                    <p class="card-text">This is the area where I would include a description if it was populated in the DB.</p>
                    <p class="card-text">Color: <?= !empty($product['Color']) ? $product['Color'] : "Not Supplied"; ?></p>
                    <p class="card-text">Product Number: <?=$product['ProductNumber']?></p>
                    <p class="card-text">Product Category: <?=$product['Category']?></p>
                    <p class="card-text text-center"><strong>Price only: $<?=$product['ListPrice']?></strong></p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
require_once('includes/footer.php');
?>
