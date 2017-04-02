<?php
require_once('./autoloader.php');
session_start();

//dodaje sesje ponieważ przenoszę dane uzytkownika po zalogowaniu 
$userSelected = null;
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    $userSelected = user::loadById($_SESSION['id']);
}
//odbieram dane z fromularza i zapisuje do bazy danych 

if ($userSelected != null) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['tweet'])) {

            $tweet = new tweet();
            $tweet->setUserId($_SESSION['id']);
            $tweet->setText($_POST['tweet']);
            $tweet->save();
        } else {
            
        }
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
        <?php
        if ($userSelected != null) {
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">

                    </div>
                    <div class="col-sm-8">
                        <form action="index.php" method="POST" role="form" >
                            <label for="tweet">Tweet:</label>
                            <input type="text"  class="form-control" name="tweet" id="tweet" maxlength="140"
                                   placeholder="Write your tweet.....">                  
                            <button type="submit" class="btn btn-success">Send</button>
                        </form>
                    </div>
                    <div class="col-sm-8">

                    </div>
                </div>
            </div>    
        <?php } ?>   
        <hr>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3>All yours tweets</h3>
                </div>
                <div class="col-sm-10 ">
                    <table class="table table-hover">
                        <?php
                        if ($userSelected != null) {
                            $allLoadedTweets = tweet::loadAll();

                            foreach ($allLoadedTweets as $tweet) {
                                $user = user::loadById($tweet->getUserId());
                                echo "<tr>"
                                . "<th><a href='pages/profile.php?id=" . $user->getId() . "'>" . $user->getUsername() . "</a></th>"
                                . "<th>" . $user->getEmail() . "</th>"
                                . "</tr>";

                                echo
                                "<tr>"
                                . "<td><a href='pages/tweet.php?id=" . $tweet->getId() . "'>Tweet: " . $tweet->getText() . "</a></td>"
                                . "<td>" . $tweet->getCreationDate() . "</td>"
                                . "</tr>";
                            }
                        }
                        ?> 
                    </table>
                </div>
                <div class="col-sm-4">

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
