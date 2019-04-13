<?php
	// including the database connection
    require_once('includes/db.php');
    
	if(isset($_POST['id'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $model = $_POST['model'];
        $productNumber = $_POST['productNumber'];
        $color = $_POST['color'];
        $listPrice = $_POST['listPrice'];
        $cost = $_POST['cost'];
        $vendorID = $_POST['vendor'];
        $productCategoryID = $_POST['cat'];

        $query = "UPDATE `Product`
                SET `Name` = '$name',
                `Model` = '$model',
                `ProductNumber` = '$productNumber',
                `Color` = '$color',
                `ListPrice` = $listPrice,
                `Cost` = $cost,
                `VendorID` = $vendorID,
                `ProductCategoryID` = $productCategoryID,
                `checked_out` = null
                WHERE `ProductID` = $id
                LIMIT 1;";

        mysqli_query($db, $query);
    }else if(isset($_GET['id'])){
        $id = $_GET['id'];
        $setLockout = true;
    }
    //Over ride lockout
    $overRide = false;

	// query database
	$q = "SELECT * FROM Product WHERE ProductID = '$id' LIMIT 1";
    $product = mysqli_fetch_array(mysqli_query($db, $q), MYSQLI_ASSOC);
    if($overRide){
        $query = "UPDATE `Product`
            SET `checked_out` = null
            WHERE `ProductID` = $id
            LIMIT 1;";
            mysqli_query($db, $query) || die(mysqli_error($db));
    }else if(isset($product['checked_out']) && time() - strtotime($product['checked_out'] < 3600)){
        $error = "This record is locked";
    }else if($setLockout){
        $query = "UPDATE `Product`
            SET `checked_out` = '".date("Y-m-d H:i:s")."'
            WHERE `ProductID` = $id
            LIMIT 1;";
            mysqli_query($db, $query) || die(mysqli_error($db));
    }
    $q = "SELECT * FROM ProductCategory";
    $categories = mysqli_fetch_all(mysqli_query($db, $q), MYSQLI_ASSOC);
    $q = "SELECT * FROM Vendor ORDER BY `Name`";
    $vendors = mysqli_fetch_all(mysqli_query($db, $q), MYSQLI_ASSOC);

    $title = "Edit {$product['Name']}";
    require_once('includes/header.php');
?>
    <main class="container">
    <?php if(isset($error)):?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?=$error?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif;?>
        <form action="" method="post" class="container">
            <div class="row py-2">
                <label for="name" class="col col-3">Product Name</label>
                <input type="text" name="name" id="name" class="col col-9" value="<?=$product['Name']?>">
            </div>

            <div class="row py-2">
                <label for="model" class="col col-3">Product Model</label>
                <input type="text" name="model" id="model" class="col col-9" value="<?=$product['Model']?>">
            </div>

            <div class="row py-2">
                <label for="productNumber" class="col col-3">Product Number</label>
                <textarea type="text" name="productNumber" id="productNumber" class="col col-9"><?=$product['ProductNumber']?></textarea>
            </div>

            <div class="row py-2">
                <label for="color" class="col col-3">Color</label>
                <input type="text" name="color" id="color" class="col col-9" value="<?=$product['Color']?>">
            </div>

            <div class="row py-2">
                <label for="listPrice" class="col col-3">List Price</label>
                <input type="text" name="listPrice" id="listPrice" class="col col-9" value="<?=$product['ListPrice']?>">
            </div>

            <div class="row py-2">
                <label for="cost" class="col col-3">Cost</label>
                <input type="text" name="cost" id="cost" class="col col-9" value="<?=$product['Cost']?>">
            </div>

            <div class="row py-2">
                <label for="cat" class="col col-3">Category</label>
                <select type="text" name="cat" id="cat" class="col col-9">
                    <?php foreach($categories as $cat){
                        if($product['ProductCategoryID'] == $cat['ProductCategoryID']){
                            echo "<option value=\"{$cat['ProductCategoryID']}\" selected>{$cat['Name']}</option>";
                        }else{
                            echo "<option value=\"{$cat['ProductCategoryID']}\">{$cat['Name']}</option>";
                        }                        
                    }?>
                </select>
            </div>

            <div class="row py-2">
                <label for="vendor" class="col col-3">Vendor</label>
                <select type="text" name="vendor" id="vendor" class="col col-9">
                    <?php foreach($vendors as $vendor){
                        if($product['VendorID'] == $vendor['VendorID']){
                            echo "<option value=\"{$vendor['VendorID']}\" selected>{$vendor['Name']}</option>";
                        }else{
                            echo "<option value=\"{$vendor['VendorID']}\">{$vendor['Name']}</option>";
                        }                        
                    }?>
                </select>
            </div>

            <div class="row py-2">
            <button type="submit" class="btn btn-outline-success"<?=isset($error)?'disabled':''?>>Submit</button>
            <input type="hidden" name="id" id="id"  value="<?=$product['ProductID']?>">
            </div>
        </form>	
    </main>

    <?php require_once('includes/footer.php');?>
