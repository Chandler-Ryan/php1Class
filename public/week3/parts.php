<?php
$title = 'Rick Hammer\'s Desk Parts';
$alert = '';
include('header.php');
    
?>

<?php if (!empty($alert)): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <div class="container">
        <div class="col-sm-8 offset-sm-2">
            <p><?=$alert ?></p>
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
