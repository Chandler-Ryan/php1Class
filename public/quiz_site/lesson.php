<?php
$title = 'Quiz Site - Lesson';
include('includes/header.php');
?>
<main class="container p-5">
    <h1 class="text-center">The topic I am doing is Laravel Homestead.</h1>

    <p class="text-center"><a href="https://laravel.com/docs/5.8/homestead">https://laravel.com/docs/5.8/homestead</a></p>

    <p class="text-justify">When doing web development having the right development environment can make all the 
    difference in the world. When it comes to an environment I strongly prefer using a 
    virtualized environment. That is where Homestead comes in. With the combination of your
    favorite hypervisor and Vagrant you can have an extermely customized development environment
    in minutes.</p>

    <h3 class="text-center mt-3">Why use a virtualized development enviornment?</h3>

    <p class="text-justify">There are 3 reasons, that come quickly to mind. The first being
     that you can customize a VM any way you like without it 
    affecting your host operating system. This allows you to run your environment on any 
    operating system. Lastly, its shareable. These VM are easy to share with others.</p>

    <h3 class="text-center mt-3">What web servers are included?</h3>

    <p class="text-justify">Well this is a trick question. It comes out of the box configured for Nginx but its on
    linux so apache is easily installed so the docs list it as optional. 2 other web servers
    the python one called Flask and the one running ASP.net Core (Kestral) are not listed as 
    available but could be enabled manually. For the quiz just use Nginx and Apache.</p>

    <h3 class="text-center mt-3">What version(s) of PHP come installed?</h3>

    <p class="text-justify">In the current version of Homestead all 3 minor versions of the php 7 are available. Support
    for PHP 5.6 is no longer supported, so you would have to manually add that yourself.</p>

    <h3 class="text-center mt-3">What databases does Homestead have installed?</h3>

    <p class="text-justify">This again is a trick question. Any DBMS you can install on Ubuntu can be used on Homestead
    but the docs only specify a few of them for the sake of the quiz we will use the following:
    MySQL, Postges, SQLite, and MongoDB. Of note, although I do not have it included as a valid 
    choice SQL Server is available for Ubuntu/Debian via a repo provided by Microsoft. Run T-SQL
    on Linux its super fast and easy to install as long as you have 2 Gigs of memory allocated to your  
    VM / VPS.</p>

    <h3 class="text-center mt-3">Which hypervisors does support the homestead vagrant box?</h3>

    <p class="text-justify">So all this fun as got you itching to virtualize your development environment, but you 
    need to know what hypervisor will work with Homestead. The most popular hypervisor is from
    VM Ware, is supported but Vagrant will tack you for a plugin charge to enable it. Next there
     is Hyper-V the free hypervisor from Microsoft. No addon required but vagrant will not have
     built in network configuations. Next is Parallels, if you are on a Mac this is the way to go.
     Lastly, is VirutalBox. This is hypervisor is has the most complete support and is readibly 
     available for free. Suprisingly, it is not supported for use on the Citrix's hypervisor 
     XenServer.</p>

</main>
<?php include('includes/footer.php'); ?>
