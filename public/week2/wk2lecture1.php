<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forms</title>
    <style>
        .error { color:red; font-weight:bold;}
    </style>
</head>
<body>
<?php
 $firstname = isset($_POST['firstname']) ? $_POST['firstname']: '';
 $entree = isset($_POST['entree']) ? $_POST['entree']: '';
 $toppings = isset($_POST['toppings']) ? $_POST['toppings']: array();

// make checkboxes sticky
$cheeseChecked = in_array('cheese', $toppings) ? 'checked' : '';
$chickenChecked = in_array('chicken', $toppings) ? 'checked' : '';
$baconChecked = in_array('bacon', $toppings) ? 'checked' : '';

$comments = isset($_POST['comments']) ? $_POST['comments'] : '' ;

// ------------- Validation ----------------
// assume the form is valid, until proven guilty
$firstnameError = '';
$entreeError = '';
$toppingsError = '';
$formIsValid = true;

if(isset($_POST['submit']))
{
    if(is_numeric($firstname))
    {
        $firstnameError = 'First name can not be a number.';
        $formIsValid = false;
    }
    elseif (strlen($firstname) < 2)
    {
        $firstnameError = 'Name must be at least 2 charactors';
        $formIsValid = false;
    }
    // check if value is not in list
    if(!in_array($entree, ['hamburger', 'pizza', 'salad']))
    {
        $entreeError = 'Invalid choice selected';
        $formIsValid = false;
    }
    // check if value is not in list
    if(!in_array($toppings, ['bacon', 'chicken','cheese', '']))
    {
        $toppingsError = 'Invalid choice selected';
        $formIsValid = false;
    }

    // validating a number
    $width = "5";
    
    if(!is_numeric($width))
    {
        // convert to int or float number
        $width = intval($width); // or floatval($width)

        // check if number is in range
        if($width < 24 or $width > 96)
        {
            // error
            
        }
    }

}

?>
    <form action="" method="post">
        <label for="firstname">Name:</label>
        <input type="text" name="firstname" id="firstname" 
        value="<?=$firstname ?>">
        <span class="error"><?= $firstnameError ?></span>

        <p>Entree:</p>
        <label><input type="radio" name="entree" id="hamburger"
            value="hamburger" <?= $entree == 'hamburger' ? 'checked' : '' ?>>Hamburger</label><br>
        <label><input type="radio" name="entree" id="Pizza" 
            value="pizza" <?= $entree == 'pizza' ? 'checked' : '' ?>>Pizza</label><br>
        <label><input type="radio" name="entree" id="Salad" 
            value="salad" <?= $entree == 'salad' ? 'checked' : '' ?>>Salad</label><br>
            <span class="error"><?= $entreeError ?></span><br>

        <p>Toppings</p>
        <label><input type="checkbox" name="toppings[]" value="cheese" <?=$cheeseChecked ?>>Cheese</label><br>
        <label><input type="checkbox" name="toppings[]" value="chicken" <?=$chickenChecked ?>>Chicken</label><br>
        <label><input type="checkbox" name="toppings[]" value="bacon" <?=$baconChecked ?>>Bacon</label><br>
        <span class="error"><?= $toppingsError ?></span><br>

        <label for="comments">Comments:</label><br>
        <textarea name="comments" id="comments" cols="30" rows="10"><?= $comments ?></textarea><br><br>

        <button type="submit" name="submit">Submit</button>
        <input type="submit" value="Submit2" name="Submit2">

    </form>

    <div style="margin:20px;">
        <a href="index.php">Homework</a>
    </div>

    <hr>

<?php
// all form values are in $_GET or $_POST
// to debug variables
echo '<pre>';
print_r($_POST);
echo '</pre>';
var_dump($_POST);
// check if button one was pressed
if(isset($_POST['submit']))
{
    echo "<br>We will get working on your " . $entree . " with the following topings: " . implode(', ', $toppings);
}
if(isset($_POST['Submit2']))
{
    echo "<br>Welcome back " . $_POST['firstname'];
}





?>
</body>
</html>