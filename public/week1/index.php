<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hello World</title>
</head>
<body>
    
<h1>
    <?php echo('hello world'); ?>
</h1>

    <?php
        // variables
        // needs to start with $ and a letter
        $name = 'Chandler';
        $age = 43;
        $isAwesome = true;

        echo "Welcome $name to the site!<br>";

        // two different types of strings
        echo "Hi $name<br>"; // interpreted strings
        echo 'Hi $name<br>'; // literal strings

    ?>
    
    


</body>
</html>