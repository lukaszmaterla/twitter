<?php
require_once('../autoloader.php');
session_start();

$userSelected = null;
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    $userSelected = user::loadById($_SESSION['id']);
} else {
    echo "Nie jesteś zalogowany. Zaloguj się ";
    header('Refresh: 1; url = ../index.php');
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (!empty($_GET['id'])) {
        $user = user::loadById($_GET['id']);
        if (!empty($user)) {
            $_SESSION['receiverId'] = $user->getId();
        } else {

            echo "Brak usera o takim id";
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!empty($_POST['message'])) {
        $newMessage = new message();
        $newMessage->setSenderId($userSelected->getId());
        $newMessage->setReceiverId($_SESSION['receiverId']);
        $newMessage->setTextMessage($_POST['message']);
        $result = $newMessage->save();
        if ($result) {
            $_SESSION['send'] = true;
            header("Refresh:0 url= messages.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" con tent="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Twitter</title>
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.php"> Twitter - my page</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php if ($userSelected) { ?>
                <ul class="nav navbar-nav">
                    <li class=""><?php
                        echo
                            "<a href='user.php?id=" . $userSelected->getId() . "'>"
                            . "<span class='glyphicon glyphicon-user'></span> Profile</a>"
                        ?>
                    </li>
                    <li class=""><?php
                        echo
                            "<a href='user.php?id=" . $userSelected->getId() . "'> "
                            . "You are loged as: " . $userSelected->getUsername() . "</a>";
                        ?>
                    </li>

                </ul>
            <?php } ?>
            <ul class="nav navbar-nav navbar-right">
                <?php if ($userSelected) { ?>

                    <li>
                        <a href="messages.php"><span class="glyphicon glyphicon-envelope"></span> Messages</a>
                    </li>
                    <li>
                        <a href="settings.php"><span class="glyphicon glyphicon-cog"></span> Settings</a>
                    </li>
                    <li>
                        <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
<div class="jumbotron">
    <div class="container page-header text-center">
        <h2>All Tweets selected by user</h2>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <?php
            if (!empty($user)) {
                echo "<p>All Users tweets: " . $user->getUsername() . "</p>";
                echo "<p>Email: " . $user->getEmail() . "</p>";
                echo " <table class='table table-hover'>";
                //var_dump($user);
                $allTweets = tweet::loadAllByUserId($user->getId());
                foreach ($allTweets as $tweet) {
                    echo
                        "<tr>"
                        . "<td><a href='tweet.php?id=" . $tweet->getId() . "'>" . $tweet->getText() . "</a></td>"
                        . "<td>" . $tweet->getCreationDate() . "</td>"
                        . "</tr>";
                }
                echo "</table>";
            }
            ?>
        </div>
        <?php
        if (!empty($user)) {
            echo "<div class='col-sm-4'>";
            if ($user->getId() !== $userSelected->getId() && !empty($user->getId())) {
                ?>
                <form action="" method="POST" role="form">
                    <label for="message">Send a message<?php $user->getUsername() ?></label>
                    <textarea rows="4" cols="50" class="form-control" name="message" id="message"
                              placeholder="Write your message...."></textarea><br>
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-send"></span> Send
                    </button>
                </form>
                <?php
            }
            echo " </div>";
        }
        ?>
    </div>
</div>
<hr>
<footer>
    <div class="container">
        <div class="row">
            <div class=" text-center col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p class="copyright text-muted">Copyright &copy; Twitter simillar website - Created by Łukasz
                    Materla</p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
