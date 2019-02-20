<?php
session_name('CRyan-Week4Project');
session_start();
require_once('includes/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/site.css">
    <title><?= $title ?? 'Quiz Site' ?></title>
    <style>
    
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #3b238c;">
        <div class="container">
            <a class="navbar-brand" href="#">Quiz site</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav d-flex flex-fill justify-content-around">
                    <li class="nav-item<?=$title == 'Quiz Site Home' ? ' active' : '' ?>">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item<?=$title == 'Quiz Site - Lesson' ? ' active' : '' ?>">
                        <a class="nav-link" href="lesson.php">Lessson</a>
                    </li>
                    <li class="nav-item<?=$title == 'The quiz page' ? ' active' : '' ?>">
                        <a class="nav-link" href="quiz.php">Quiz</a>
                    </li>
                </ul>
            </div>        
        </div>
    </nav>
