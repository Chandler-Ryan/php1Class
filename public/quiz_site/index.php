<?php
$title = 'Quiz Site Home';
include('includes/header.php');
if(isset($_POST['name'])){
    if(!is_numeric($_POST['name']) && strlen($_POST['name']) > 3){
        $_SESSION['name'] = $_POST['name'];
    }
}
?>

<main class="container">
    <h1 class="mt-5 p-3 text-center">Welcome to the PHP Quiz Site!</h1>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="img/phpStock1.jpg" class="d-block w-100 rounded" alt="...">
            </div>
            <div class="carousel-item">
            <img src="img/phpStock2.jpg" class="d-block w-100 rounded" alt="...">
            </div>
            <div class="carousel-item">
            <img src="img/phpStock3.jpg" class="d-block w-100 rounded" alt="...">
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

<?php if(!isset($_SESSION['name'])): ?>
    <div class="row m-5">
        <div class="col-8 offset-2">
            <div class="card">
                <div class="card-header">
                    <p>Let's get started...</p>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Please enter your name.</h5>
                    <form method="POST">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="<?=$_POST['name'] ?? '' ?>">
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="row m-5">
        <div class="col-8 offset-2">
            <div class="card">
                <div class="card-header">
                    <h2>Welcome, <?=$_SESSION['name'] ?></h2>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Please click the lesson link</h5>
                    <p>The content on the lesson page will prepare you for the quiz.</p>                    
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

</main>
<?php include('includes/footer.php'); ?>
