
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Week 1 part 2</title>
</head>
<body>
    <?php
    // indexed arrays
    $drinks = ['Green Tea Latte', 'Milk', 'Mt. Dew'];
    $drinks = array('Green Tea Latte', 'Milk', 'Mt. Dew');

    // modify element
    $drinks[1] = 'Chocolate Milk';

    // Add element
    array_push($drinks, 'Mohito');
    $drinks[] = 'Beer';

    // looping though arrays
    for($i=0; $i < count($drinks); $i++)
    {
        echo $drinks[$i];
        echo ($i+1 < count($drinks)) ? ", " : "\n";
    }

    echo '<ul>';
    foreach($drinks as $drink)
    {
        echo "<li>$drink</li>";
    }
    echo '</ul>';

    // associative array
    // index is a string rather than a zero-based index
    // used to represent individual items rather than a collection
    $student = array('firstname' => 'Steve', 'lastname' => 'Griffin', 'age' => 2);
    echo "<p>The student's name is {$student['firstname']},</p>";
    echo "<p>The first letter of the student's name: {$student['firstname'][0]},</p>";

    foreach($student as $key => $value)
    {
        echo "<p>$key: $value</p>";
    }

    //delete item in middle of array
    //unset($drinks[1]);
    //better way so no empty index
    array_splice($drinks, 1, 1);

    // if statements
    $phpIsFun = true;
    $phpIsWeird = true;

    if($phpIsFun)
    {
        echo 'Yea! PHP is fun!';
    }elseif($phpIsWeird){
        echo 'PHP is weird';
    }else{
        echo ':(';
    }

    echo '<br>';

    if($phpIsFun): ?>

        <h1>"yea its fun"</h1>
<?php
    endif;

    // conditional operators &&, and , ||, or !

    ?>

    <h3><?= $student['firstname'] . ' ' . $student['lastname'] ?></h3>
</body>
</html>