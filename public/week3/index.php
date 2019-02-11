<?php
$title = 'Rick Hammer\'s Home';
include('header.php');
?>

<main class="container">

    <div class="row my-5">
    
        <div class="col-md my-2">
            <div class="card">
                <div class="card-header">
                    Unit 1
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center">Assignment links</h5>
                    <div class="list-group">
                        <a href="calculator.php" class="list-group-item list-group-item-action">Week 2</a>
                        <a href="parts.php" class="list-group-item list-group-item-action d-flex justify-content-between">Week 3 <span class="badge badge-danger badge-pill">new</span></a>
                    </div>
                </div>
            </div>    
        </div>

        <div class="col-md my-2">
            <div class="card">
                <div class="card-header">
                    Unit 2
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center">Assignment links</h5>
                    <div class="list-group">
                        <a href="" class="list-group-item list-group-item-action">lorem</a>
                        <a href="" class="list-group-item list-group-item-action">ipsum</a>
                    </div>
                </div>
            </div>    
        </div>

        <div class="col-md my-2">
            <div class="card">
                <div class="card-header">
                    Unit 3
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center">Assignment links</h5>
                    <div class="list-group">
                        <a href="" class="list-group-item list-group-item-action">lorem</a>
                        <a href="" class="list-group-item list-group-item-action">ipsum</a>
                    </div>                    
                </div>
            </div>    
        </div>

    </div>

    <div class="mx-auto" style="width:400px;">
        <img src="img/toolbox.svg" alt="" width="400px" height="400px" class="my-5" />    
    </div>

</main>

<?php include('footer.php');
