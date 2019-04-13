<?php
if(getenv('APP_ENV') == 'devH'){
    $db = @mysqli_connect('127.0.0.1', 'homestead', 'secret', 'adventure_works') or 
    die('Error connecting to database.');
}else{
    $db = @mysqli_connect('bitlampsites.com', 'cryan14', '000089017', 'cryan14') or 
    die('Error connecting to database.');
}
