<?php 
$title = "Home";
require_once('includes/header.php');

?>

<div style="margin-top:56px">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="img/Sagan1.jpg" class="d-block w-100 rounded" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5><span style="background:black;opacity:0.65;padding:0 10px">Sagan!</span></h5>
                    <p><span style="background:black;opacity:0.65;padding:0 10px">Photo from roadcycling.co.nz</span></p>
                </div>
            </div>
            <div class="carousel-item">
            <img src="img/orangeMTB.jpg" class="d-block w-100 rounded" alt="...">
            </div>
            <div class="carousel-item">
            <img src="img/Sagan2.jpg" class="d-block w-100 rounded" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5><span style="background:black;opacity:0.65;padding:0 10px">Sagan!</span></h5>
                    <p><span style="background:black;opacity:0.65;padding:0 10px">Photo from www.trifind.com</span></p>
                </div>
            </div>
            <div class="carousel-item">
            <img src="img/orangeWheels.jpg" class="d-block w-100 rounded" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<div class="container">

    <h1 class="text-center p-3">Sunday, April 14th, "Hell of the North"</h1>
    <p class="text-justifed">
        Life doesn't get any better then this... On the 14<sup>th</sup> TV doesn't get any better then this.
        In the morning US time, watch the best cyclists try to conquer the "Hell of the North" and then later
        watch the king of the north burn some zombies!
    </p>
    <p>
        To gear up for Paris-Roubaix check out our products at the link below:
    </p>
    <p>
        <a href="products.php" class="btn btn-danger" style="margin:auto; display:block; width: 45%;">Products</a>
    </p>

</div>

<?php
require_once('includes/footer.php');
?>
