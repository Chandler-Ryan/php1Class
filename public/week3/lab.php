<?php
session_name('CRyan-Week3');
session_start();
$title = 'Week3 Lab media player';
$errors = array();
// Build session
if(!isset($_SESSION['songList']))
{
    $_SESSION['songList'] = array();
}
if(!isset($_SESSION['nowPlay']))
{
    $_SESSION['nowPlay'] = 0;
}
// Reset Session or add song to session
if(isset($_POST['clearCart']))
{
    session_destroy();
    $host  = $_SERVER['HTTP_HOST'];
    $uri = $_SERVER['PHP_SELF'];
    header("Location: http://$host$uri");
    exit;
}else if(isset($_POST['back']))
{
    if($_SESSION['nowPlay'] > 0) $_SESSION['nowPlay']--;
}
else if(isset($_POST['forward']))
{
    if($_SESSION['nowPlay'] < (count($_SESSION['songList'])-1)) $_SESSION['nowPlay']++;
}
else if(!empty($_POST['songName']) && !empty($_POST['songArtist']))
{
    $_SESSION['songList'][] = array(
        'songName' => $_POST['songName'],
        'songArtist' => $_POST['songArtist']
    );
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title><?= $title ?? 'Rick Hammer' ?></title>
    <style>
    
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand" href="#">Media Player</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../week3"><i class="fas fa-angle-double-left"></i> Back to Assignment List</a>
                    </li>
                </ul>
            </div>        
        </div>
    </nav>

<main class="container my-5">

    <?php if(isset($_SESSION['songList'])): ?>
        <div class="col-lg-6 offset-lg-3">
            <div class="card">
                <div class="card-header">
                    Now Playing: <?php 
                    if(!empty($_SESSION['songList']))
                    {
                        $listEntry = $_SESSION['songList'][$_SESSION['nowPlay']];
                        if(!empty($listEntry)){
                            echo $listEntry['songName'] . ' by ' . $listEntry['songArtist'];
                        }
                    }else{
                        echo 'Please, add song to playlist.';
                    }?>
                </div>
                <ul class="list-group list-group-flush">
                    <?php foreach($_SESSION['songList'] as $key => $song): ?>
                        <li class="list-group-item <?=$key == $_SESSION['nowPlay'] ? 'active': ''?>"><?=$song['songName']?> by: <?=$song['songArtist']?></li>
                    <?php endforeach; ?>
                </ul>
                <div class="card-footer">
                    <div class="d-flex justify-content-around m-3">
                        <form action="" method="post"><button type="submit" class="btn btn-outline-primary" value="back" name="back"><i class="fas fa-backward" title="Backward"></i></button></form>
                        <form action="" method="post"><button type="submit" class="btn btn-outline-danger" value="clearCart" name="clearCart" title="Clear List"><i class="fas fa-eject"></i></button></form>
                        <form action="" method="post"><button type="submit" class="btn btn-outline-primary" value="forward" name="forward"><i class="fas fa-forward" title="Forward"></i></button></form>
                    </div>              
                </div>            
            </div>
        </div>
    <?php endif; ?>

    <div class="col-lg-6 offset-lg-3 my-5">
        <form action="" method="post">
            <div class="form-group row">
                <label for="songArtist" class="col-lg-4 col-form-label">Song Artist</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control <?=!empty($errors['songArtist'])?'is-invalid':''?>" name="songArtist" id="songArtist" placeholder="Enter Song Artist">
                    <?php if(!empty($errors['songArtist'])) : ?>
                        <div class="col-sm-12"><span class="text-danger"><?= $errors['songArtist'] ?></span></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="songName" class="col-lg-4 col-form-label">Song Name</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control <?=!empty($errors['songName'])?'is-invalid':''?>" name="songName" id="songName" placeholder="Enter Song Name">
                    <?php if(!empty($errors['songName'])) : ?>
                        <div class="col-sm-12"><span class="text-danger"><?= $errors['songName'] ?></span></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-8 offset-lg-4">
                    <input type="submit" value="Add Song to Playlist" class="btn btn-outline-success">
                </div>
            </div>    
        </form>
    </div>

</main>

<?php include('footer.php');
