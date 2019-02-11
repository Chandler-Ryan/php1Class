<?php
$title = 'Rick Hammer\'s Desk Parts';
$total = 0;
$products = array(
    array( 
        'id' => '1',
        'name' => 'Drawer Pull',
        'price' => 3.99,
        'image' => 'https://farm3.staticflickr.com/2165/2246272794_7328992509_b.jpg',
        'description' => 'Antique bronze drawer pull. Adds character to your desk drawers.'),
    array(
        'id' => '2',
        'name' => 'Drawer Organizer',
        'price' => 17.99,
        'image' => 'https://images-na.ssl-images-amazon.com/images/I/91tlrCudmyL._SX679_.jpg',
        'description' => 'Bamboo wood adjustable drawer organizer with 6 removable dividers.'),
    array(
        'id' => '3',
        'name' => 'Pencil Holder',
        'price' => '9.95',
        'image' => 'https://images-na.ssl-images-amazon.com/images/I/51V2aMxGrYL._SX679_.jpg',
        'description' => ' Bamboo wood desk pen/pencil holder. Size: 3" L x 3" W x 4" H.'),
    array(
        'id' => '4',
        'name' => 'Desk Lamp',
        'price' => 24.95,
        'image' => 'https://images-na.ssl-images-amazon.com/images/I/61u9oOHCKAL._SX679_.jpg',
        'description' => 'Swing arm is easily adjustable to direct the light wherever you need it.')
    );

    function getProductArrayByID($products, $id)
    {
        foreach($products as $prod)
        {
            if ($prod['id'] == $id) return $prod;
        }
        return false;
    }

    include('header.php');
   
    // Check for items added to the cart
    if(!empty($_POST))
    {
        if(isset($_POST['clearCart']))
        {
            session_destroy();
            $host  = $_SERVER['HTTP_HOST'];
            $uri = $_SERVER['PHP_SELF'];
            header("Location: http://$host$uri");
            exit;
        }
        else
        {
            if(intval($_POST['quantity'])>0 && intval($_POST['quantity'])<10)
            {
                $_SESSION['cart'][$_POST['item']] = $_POST['quantity'];
            }
        }
    }

    // set the order total
    if(isset($_SESSION['cart']))
    {
        foreach ($_SESSION['cart'] as $id => $quanity)
        {
            $orderedItem = getProductArrayByID($products,$id);
            $total += $orderedItem['price'] * $quanity;
        }
    }
    
?>

<?php if (isset($_SESSION['cart'])): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <div class="container">
        <div class="col-8 offset-2">
            <p>Thank you for your order of:</p>
            <div class="list-group">
                <?php foreach($_SESSION['cart'] as $item => $quanity): ?>
                    <div class="list-group-item list-group-item-success">
                        <div class="row">
                            <div class="col" style="height:80px;">
                                <img src="<?=getProductArrayByID($products, $item)['image']?>" alt="" class="img-fluid rounded mx-auto d-block h-100">
                            </div>
                            <div class="col">
                                <h3><?=getProductArrayByID($products, $item)['name']?></h3>
                                <div>
                                    <?= $quanity ?> @ <?php $price=getProductArrayByID($products, $item)['price']; echo '$'.$price; ?> = $<?=number_format($quanity * $price, 2)?>
                                </div>                          
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <p>for a total of: $<?=number_format($total, 2)?></p>
            <form action="" method="post"><input type="submit" value="Clear Cart" name="clearCart" class="my-4 btn btn-outline-danger"></form>
        </div>
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>        
</div>
<?php endif; ?>

<main class="container">

    <div class="my-5">
        <h1 class="text-center">Rick Hammer's Accessory Shop</h1>   
    </div>

    <div class="row">
        <?php foreach($products as $product): ?>
            <div class="col-md-4 d-flex align-items-stretch my-2">
                <div class="card">
                    <img src="<?= $product['image'] ?>" class="card-img-top" alt="...">
                    <div class="card-body d-flex justify-content-end" style="flex-direction:column;">
                        <h5 class="card-title text-center"><?= $product['name'] ?></h5>
                        <p class="card-text"><?= $product['description'] ?></p>
                        <p class="text-center">$<?=$product['price']?></p>
                        <form action="" method="post">
                            <div class="form-group">
                                <select name="quantity" id="quantity" class="custom-select">
                                    <option value="0">Order quantity</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                </select>                            
                                <input type="hidden" name="item" value="<?= $product['id'] ?>">
                            </div>
                            <button type="submit" class="btn btn-outline-success btn-block">Add to Cart</button>
                        </form>

                    </div>
                </div>            
            </div>
        <?php endforeach; ?>
    </div>

</main>

<?php include('footer.php'); ?>
