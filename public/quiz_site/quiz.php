<?php
$title = 'The quiz page';
$questions = array(
    array(
        'question' => "Why use a virtualized development enviornment?",
        'choices' => array(
            'custom' =>'Customizable',
            'multiplatform' => 'Multi-Platform',
            'shareable' => 'Shareable',
            'allAbove' => 'All of the Above'),
        'answer' => 'allAbove',
        'type' => 'radio'    
    ),
    array(
        'question' => "What web servers are included?",
        'choices' => array(
            'kestral' => 'Kestral',
            'apache' => 'Apache',
            'nginx' => 'Nginx',
            'flask' => 'Flask'    
        ),
        'answer' => array('apache', 'nginx'),
        'type' => 'checkbox'
    ),
    array(
        'question' => "What version of PHP come installed?",
        'choices' => array(
            '73' =>'PHP 7.3',
            '72' => 'PHP 7.2',
            '71' => 'PHP 7.1',
            '56' => 'PHP 5.6'),
        'answer' => array('73', '72', '71'),
        'type' => 'checkbox'    
    ),
    array(
        'question' => "What databases does Homestead have installed?",
        'choices' => array(
            'mysql' =>'MySQL',
            'mssql' => 'SQL Server',
            'postgre' => 'PostgreSQL',
            'sqlite' => 'SQLite',
            'mongo' => 'MongoDB'
            
        ),
        'answer' => array('mysql', 'postgre', 'sqlite', 'mongo'),
        'type' => 'checkbox'    
    ),
    array(
        'question' => "Which hypervisors does support the homestead vagrant box?",
        'choices' => array(
            'virtualBox' =>'Virtualbox',
            'xenServer' => 'Xen Server',
            'vmWare' => 'VM Ware',
            'parallels' => 'Parallels',
            'hyperV' => 'Hyper-V'
            ),
        'answer' => array('virtualBox', 'vmWare', 'parallels', 'hyperV'),
        'type' => 'checkbox'    
    )
);
include('includes/header.php');
if(!isset($_SESSION['name'])){
    $part = pathinfo($_SERVER['PHP_SELF']);
    header("Location: " . $part['dirname']);
}
if(isset($_POST['logout'])){
    session_destroy();
    $part = pathinfo($_SERVER['PHP_SELF']);
    header("Location: " . $part['dirname']);
}
?>
<main class="container">
<?php 
if(!empty($_POST)):
    if(array_sum(calcResults($questions)) == count($questions)):?>
        <div class="col-8 offset-2">
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <strong>You have answered all the questions correctly.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>    
        </div>
    <?php $_SESSION['correct'] = true; ?>
    <?php elseif(count(calcResults($questions)) != count($questions)):?>
        <div class="col-8 offset-2">
            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                You <strong>must</strong> answer all the questions.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>    
        </div>
    <?php else:?>
        <div class="col-8 offset-2">
            <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                <p>
                    You got <strong><?=array_sum(calcResults($questions))?></strong> questions correct.            
                </p>
                <p>
                    You may continue to retry to get them all.
                </p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>    
        </div>
    <?php endif;
endif;?>
<?php if(!isset($_SESSION['correct'])):?>
    <div class="row m-5">
        <div class="col-8 offset-2">
            <div class="card">
                <div class="card-header">
                    <p class="text-center">Let's see what you remember.</p>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Please answer all 5 of the questions.</h5>
                    <form method="POST">
                        <?php foreach(displayFormElements($questions, calcResults($questions)) as $item) echo $item; ?>
                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php else :?>
    <div class="row m-5">
        <div class="col-8 offset-2">
            <div class="card">
                <div class="card-header">
                    <p class="text-center">Congratulations <?= $_SESSION['name']?>, for getting all the answers correct.</p>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Please log off so a new user may login.</h5>
                    <form method="POST">
                        <button type="submit" class="btn btn-outline-success" value="logout" name="logout">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
</main>
<?php include('includes/footer.php'); ?>
