<footer class="container my-2">
        
</footer>

<div class="modal fade" id="cartModal" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cart Contents...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <?php if (isset($_SESSION['cart'])): ?>
                        <p>Thank you for your order of:</p>
                        <div class="list-group">
                            <?php foreach($_SESSION['cart'] as $item => $quanity): ?>
                                <div class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-3" style="height:80px; min-width: 50px;">
                                            <img src="<?=getProductArrayByID($products, $item)['image']?>" alt="" class="img-fluid rounded mx-auto d-block h-100">
                                        </div>
                                        <div class="col-md-5">
                                            <h3><?=getProductArrayByID($products, $item)['name']?></h3>
                                            <div>
                                                <?= $quanity ?> @ <?php $price=getProductArrayByID($products, $item)['price']; echo '$'.$price; ?> = $<?=number_format($quanity * $price, 2)?>
                                            </div>                          
                                        </div>
                                        <div class="col-md-4 d-flex">
                                            <form action="" method="post" class="ml-auto">
                                                <input type="submit" value="Remove Item" name="removeItem" class="my-4 btn btn-outline-danger">
                                                <input type="hidden" name="removeID" value="<?=getProductArrayByID($products, $item)['id'] ?>">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <p>for a total of: $<?=number_format($total, 2)?></p>
                    <?php else: ?>
                        <h3 class="text-center">You do not have any items in your cart.</h3>            
                    <?php endif; ?>
                </div>
            </div>
            <div class="modal-footer">
            <?php if (isset($_SESSION['cart'])): ?>
                <form action="" method="post">
                    <input type="submit" value="Clear Cart" name="clearCart" class="my-4 btn btn-outline-danger">
                </form>
            <?php endif; ?>
            </div>        
        </div>    
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>