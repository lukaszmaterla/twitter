<?php
require_once('./autoloader.php');
session_start();
// $obj1 = new user();
// $obj1->setUsername('Janusz z Obornik '.rand(0,9));
// $obj1->setEmail('janusz14'.rand(0,9).'@wp.pl');
// $obj1->setpasswordHash('1234'.rand(0,9));
// $obj1->saveToDb();
// $obj1 = user::loadUserById(4);
// $obj1->setUsername('Andrzej');
// $obj1->saveToDb();
// $obj1->delete();
//var_dump(user::loadAll());
$userSelected = 0;
if (isset($_SESSION['email']) && isset($_SESSION['username'])){
    $userSelected = user::loadById($_SESSION['id']);
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
                        <?php if (!$userSelected){?>
                        <li>
                            <a href="html/login.php">Login</a>
                        </li>
                        <li>
                            <a href="html/register.php">Register</a>
                        </li>
                        <?php }else{ ?>
                        <li>
                            <a href="html/messages.php">Messages</a>
                        </li>
                        <li>
                            <a href="html/settings.php">Settings</a>
                        </li>
                        <li>
                            <a href="html/logout.php">Logout</a>
                        </li>
                        <?php   }?>
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
                <ul class="pager">
                    <li class="">
                        <h2>Wiadomośći</h2>
                    </li>
                </ul>
                <div class="col-lg-8 col-md-10">

                </div>
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
