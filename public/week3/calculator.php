<?php
$title = 'Rick Hammer\'s Desk Calculator';
$errors = array();
$cost = 0;
$testDrawers = 0;
if (!empty($_POST))
{
    //view posted values
    //print_r($_POST);
    //validate deskLength    
    if(!empty($_POST['deskLength']))
    {
        if(!is_numeric($_POST['deskLength']) || $_POST['deskLength'] < 0)
        {
            $errors['deskLength'] = "Desk length is invalid.";           
        }
    }
    else
    {
        $errors['deskLength'] = "Desk length is invalid.";
    }
    //validate deskWidth should make function to avoid repeating myself
    if(!empty($_POST['deskWidth']))
    {
        if(!is_numeric($_POST['deskWidth']) || $_POST['deskWidth'] < 0 )
        {
            $errors['deskWidth'] = "Desk width is invalid.";           
        }

    }
    else
    {
        $errors['deskWidth'] = "Desk width is invalid.";
    }
    //validate deskDrawers
    if(isset($_POST['deskDrawers'])  && $_POST['deskDrawers'] >= 0)
    {
        if(is_numeric($_POST['deskDrawers']))
        {
            $testDrawers = (int)floor($_POST['deskDrawers']);
        }
        else
        {
            $errors['deskDrawers'] = "Desk drawers is invalid.";
        }

    }
    else
    {
        $errors['deskDrawers'] = "Desk drawers is invalid.";
    }
    //validate woodtype
    if(empty($_POST['deskWood']) || ($_POST['deskWood'] != 'pine' && $_POST['deskWood'] != 'oak' && $_POST['deskWood'] != 'mahogany'))
    {
        $errors['deskWood'] = "Desk wood is invalid but probably have bigger problem.";
    }

    // if validation was successful begin calculations
    if(empty($errors))
    {
        //size based costs
        if($_POST['deskLength'] * $_POST['deskWidth'] > 750)
        {
            $cost += 250;
        }
        else
        {
            $cost += 200;
        }

        //wood type costs
        if ($_POST['deskWood'] == 'mahogany')
        {
            $cost += 150;
        }
        elseif ($_POST['deskWood'] == 'oak')
        {
            $cost += 125;
        }

        //drawer costs
        if ($testDrawers > 0)
        {
            $cost += ($testDrawers * 30);
        }
    }
}

include('header.php');
?>

<main class="container my-5">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <img src="img/desk.jpg" alt="" class="card-img-top">
                <div class="card-body">
                    <?php if(empty($_POST) || !empty($errors)): ?>
                        <h5 class="card-title text-center">Customize and Calculate Cost</h5>
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label for="deskLength" class="col-sm-4 col-form-label text-right">Length</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control <?=!empty($errors['deskLength'])?'is-invalid':''?>" name="deskLength" id="deskLength" placeholder="Enter Length" value="<?= !empty($_POST['deskLength']) ? $_POST['deskLength'] : ''?>" step="0.1">
                                    <?php if(!empty($errors['deskLength'])) : ?>
                                        <div class="col-sm-12"><span class="text-danger"><?= $errors['deskLength'] ?></span></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="deskWidth" class="col-sm-4 col-form-label text-right">Width</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control <?=!empty($errors['deskWidth'])?'is-invalid':''?>" name="deskWidth" id="deskWidth" placeholder="Enter Width" value="<?= !empty($_POST['deskWidth']) ? $_POST['deskWidth'] : ''?>" step="0.1">
                                    <?php if(!empty($errors['deskWidth'])) : ?>
                                        <div class="col-sm-12"><span class="text-danger"><?= $errors['deskWidth'] ?></span></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="deskDrawers" class="col-sm-4 col-form-label text-right"># of Drawers</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control <?=!empty($errors['deskDrawers'])?'is-invalid':''?>" name="deskDrawers" id="deskDrawers" placeholder="Enter Quanity of Drawers" value="<?= !empty($_POST['deskDrawers']) ? $_POST['deskDrawers'] : ''?>" step="0.1">
                                    <?php if(!empty($errors['deskDrawers'])) : ?>
                                        <div class="col-sm-12"><span class="text-danger"><?= $errors['deskDrawers'] ?></span></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="deskWood" class="col-sm-4 col-form-label text-right">Type of Wood</label>
                                <div class="col-sm-8">
                                    <select name="deskWood" id="deskWood" class="custom-select <?=!empty($errors['deskWood'])?'is-invalid':''?>">
                                        <option value="pine">Pine</option>
                                        <option value="oak">Oak</option>
                                        <option value="mahogany">Mahogany</option>
                                    </select>
                                    <?php if(!empty($errors['deskWood'])) : ?>
                                        <div class="col-sm-12"><span class="text-danger"><?= $errors['deskWood'] ?></span></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-8 offset-sm-4">
                                    <input type="submit" value="Calculate Desk Cost" class="btn btn-success">                            
                                </div>
                            </div>
                        </form>
                    <?php else : ?>
                        <h5 class="card-title text-center">Cost of your desk is:</h5>
                        <p class="card-text text-center">$<?=number_format($cost,2) ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

<?php include('footer.php');
