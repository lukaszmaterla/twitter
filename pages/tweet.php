<?php
require_once '../autoloader.php';
session_start();

$userSelected = null;
$tweet = null;
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    $userSelected = user::loadById($_SESSION['id']);
} else {
    echo "Nie jesteś zalogowany. Zaloguj się ";
    header('Refresh: 2; url= ../index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!empty($_GET['id'])) {
        $tweet = tweet::loadById($_GET['id']);
        if ($tweet == true) {

            $_SESSION['tweetPostId'] = $_GET['id'];
        }
    } else {
        echo "Podałeś błędne Id";
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_SESSION['tweetPostId'] && $userSelected) {

        $tweet = tweet::loadById($_SESSION['tweetPostId']);
        if (!empty($_POST['comment'])) {
            $newComment = new comment();
            $newComment->setUserId($_SESSION['id']);
            $newComment->setPostId($_SESSION['tweetPostId']);
            $newComment->setText($_POST['comment']);
            $newComment->save();
        }
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
    <div class="container text-center">
        <h2>Tweet</h2>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8 ">
            <?php
            if ($tweet != null) {
            echo "<table class='table table-hover'>";
            $author = user::loadById($tweet->getUserId());
            echo
                "<tr>"
                . "<th>Author: " . $author->getUsername() . "" . " </th>"
                . "<th>E-mail: " . $author->getEmail() . "</th>"
                . "</tr>";
            echo
                "<tr>"
                . "<td>" . $tweet->getText() . "</td>"
                . "<td>" . $tweet->getCreationDate() . "</td>"
                . "</tr>";
            echo "</table>";
            ?>
        </div>
        <div class="col-sm-offset-2 col-sm-8 ">
            <form action="tweet.php" method="POST" role="form">
                <label for="comment">Write your comment:</label>
                <input type="text" class="form-control" name="comment" id="comment" maxlength="60"
                       placeholder="Write your comment....."><br>
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-comment"></span> Send
                </button>
            </form>
        </div>
        <div class="col-sm-offset-2 col-sm-8 ">
            <?php
            echo "<table class='table table-hover'>";
            $allComments = comment::loadAllByPostId($_SESSION['tweetPostId']);
            if ($allComments != null) {
                foreach ($allComments as $comment) {
                    $commentAuthor = user::loadById($comment->getUserId());
                    echo
                        "<tr>"
                        . "<th>" . $commentAuthor->getUsername() . "</a></th>"
                        . "<th>" . $commentAuthor->getEmail() . "</th>"
                        . "</tr>";

                    echo
                        "<tr>"
                        . "<td>" . $comment->getText() . "</a></td>"
                        . "<td>" . $comment->getCreationDate() . "</td>"
                        . "</tr>";
                }
            } else {
                echo
                    "<tr>"
                    . "<td>No comments, feel free to be first... </td>"
                    . "</tr>";
            }

            echo "</table>";
            }
            ?>
        </div>
        <div class="col-sm-offset-2 col-sm-8">
            <a href="../index.php">
                <button type="" class="btn btn-success"><span class="glyphicon glyphicon-hand-left"></span> Back
                </button>
            </a>
        </div>
    </div>
    <hr>
</div>
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