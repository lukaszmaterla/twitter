<?php
require_once '../autoloader.php';
session_start();

$userSelected = null;
$tweet = null;
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    $userSelected = user::loadById($_SESSION['id']);
} else {
    header('Refresh: 1; url= ../index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!empty($_GET['id'])) {
        $tweet = tweet::loadById($_GET['id']);
    } else {
        echo "Podałeś błędne Id";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Twitter</title>
        <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    </head>
    <body>
        <nav class="navbar-custom navbar-fixed-top">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <?php if (!$userSelected) { ?>
                            <li>
                                <a href="pages/login.php">Login</a>
                            </li>
                            <li>
                                <a href="pages/register.php">Register</a>
                            </li>
                        <?php } else { ?>
                            <li>
                                <a href="pages/messages.php">Messages</a>
                            </li>
                            <li>
                                <a href="pages/settings.php">Settings</a>
                            </li>
                            <li>
                                <a href="pages/logout.php">Logout</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="intro-header" >
            <div class="container">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <div class="site-heading">
                            <h1>Twitter - Main Page</h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <hr>

        <div class="container">
            <div class="row">
                <div class="col-sm-10">
                    <h2>Tweet</h2>
                </div>
                <div class="col-sm-10 ">
                    <?php
                    if ($tweet != null) {
                        echo "<table class='table table-hover'>";
                        $author = user::loadById($tweet->getUserId());
                        echo "<tr><th>Author: ". $author->getUsername().""." </th><th>E-mail: ".$author->getEmail()."</th><th>Date: ".$tweet->getCreationDate()."</th></tr>";
                        echo "<tr><td colspan='3'>". $tweet->getText()."</td></tr>";
                        
                    }
                    echo "</table>";
                    ?> 

                </div>
                <div class="col-sm-10">
                    <a href="../index.php"><button type="" class="btn btn-success">Powrót</button></a>
                </div>
            </div>
        </div>      
        <hr>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <p class="copyright text-muted">Copyright &copy; Twitter simillar wesite</p>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>