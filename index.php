<?php
require_once('./autoloader.php');
session_start();

//dodaje sesje ponieważ przenoszę dane uzytkownika po zalogowaniu 
$userSelected = null;
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    $userSelected = user::loadById($_SESSION['id']);
}
//odbieram dane z fromularza i zapisuje do bazy danych 


if (!empty($_POST['tweet'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($userSelected != null) {

            $tweet = new tweet();
            $tweet->setUserId($_SESSION['id']);
            $tweet->setText($_POST['tweet']);
            $tweet->save();
        } else {
            echo "Zaloguj się aby móc dodawać tweety";
            header("Refresh:1; url=index.php");
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
        <!--        <link rel="stylesheet" href="css/style.css">-->

        <title>Twitter</title>
        <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">                                    
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"> Twitter - my page</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <?php if ($userSelected) { ?>
                        <ul class="nav navbar-nav">
                            <li class=""><?php
                                echo
                                "<a href='pages/user.php?id=" . $userSelected->getId() . "'>"
                                . "<span class='glyphicon glyphicon-user'></span> Profile</a>"
                                ?>
                            </li>
                            <li class=""><?php
                                echo
                                "<a href='pages/user.php?id=" . $userSelected->getId() . "'> "
                                . "You are loged as: " . $userSelected->getUsername() . "</a>";
                                ?>
                            </li>

                        </ul>
                    <?php } ?>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if (!$userSelected) { ?>
                            <li>
                                <a href="pages/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                            </li>
                            <li>
                                <a href="pages/register.php"><span class="glyphicon glyphicon-user"></span> Register</a>
                            </li>
                        <?php } else { ?>
                            <li>
                                <a href="pages/messages.php"><span class="glyphicon glyphicon-envelope"></span> Messages</a>
                            </li>
                            <li>
                                <a href="pages/settings.php"><span class="glyphicon glyphicon-cog"></span> Settings</a>
                            </li>
                            <li>
                                <a href="pages/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
        <hr>
        <div class= "jumbotron">
            <div class="container page-header text-center">
                <h1>Welcome to my weebsite</h1>
                <form action="index.php" method="POST" role="form" >
                    <div class="col-sm-12">
                        <label for="tweet"></label>
                        <input type="text"  class="form-control input-lg" name="tweet" id="tweet" maxlength="140"
                               placeholder="Write your tweet....."><br>
                        <button type="submit" class="btn btn-primary btn-sm" style="width:100%;"><span class="glyphicon glyphicon-share"></span> Shere</button>
                    </div>

                </form>
            </div>
        </div>    
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3>All tweets</h3>
                </div>
                <div class="col-sm-12 ">
                    <table class="table table-hover">
                        <?php
                        $allLoadedTweets = tweet::loadAll();

                        foreach ($allLoadedTweets as $tweet) {
                            $user = user::loadById($tweet->getUserId());
                            echo "<tr>"
                            . "<th><a href='pages/user.php?id=" . $user->getId() . "'>" . $user->getUsername() . "</a></th>"
                            . "<th>" . $user->getEmail() . "</th>"
                            . "</tr>";

                            echo
                            "<tr>"
                            . "<td><a href='pages/tweet.php?id=" . $tweet->getId() . "'>" . $tweet->getText() . "</a></td>"
                            . "<td>" . $tweet->getCreationDate() . "</td>"
                            . "</tr>";
                        }
                        ?> 
                    </table>
                </div>
            </div>
            <hr>
        </div>    
        <footer>
            <div class="container">
                <div class="row">
                    <div class=" text-center col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <p class="copyright text-muted">Copyright &copy; Twitter simillar website - Created by Łukasz Materla</p>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
