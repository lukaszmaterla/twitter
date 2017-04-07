<?php
require_once('../autoloader.php');
session_start();

$userSelected = null;
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    $userSelected = user::loadById($_SESSION['id']);
} else {
    echo "Please Login ";
    header('Refresh: 0; url = ../index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (!empty($_GET['id'])) {
        $messageInfo = message::loadById($_GET['id']);
        $messageSender = user::loadById($messageInfo->getSenderId());
        $messageReceiver = user::loadById($messageInfo->getReceiverId());
        $result = $messageInfo->getId();
        if (!empty($result)) {
            $_SESSION['messageId'] = $result;
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
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
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
        <div class= "jumbotron">
            <div class="container page-header text-center">
                <h2> Messages</h2>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <?php
                    if (!empty($_SESSION['messageId']) && !empty($messageInfo)) {
                        echo "<p>Wiamodość od " . $messageSender->getUsername() . "</p>";
                        echo "<div class='col-sm-8'>" . $messageInfo->getTextMessage() . "</div>";
                        if ($userSelected->getId() !== $messageInfo->getSenderId()) {
                            $messageInfo->setStatus(1);
                        }
                        $messageInfo->save();
                        $_SESSION['messageId'] = null;
                    }
                    ?>
                </div>
            </div>  
        </div>  
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <?php
                    if (!empty($userSelected)) {
                        echo "<h3>Received messages:</h3><br>";
                        echo " <table class='table table-hover'>";
                        $allReceivedMessages = message::loadAllByReceiverId($userSelected->getId());
                        if (!empty($allReceivedMessages)) {

                            foreach ($allReceivedMessages as $receivedMessage) {
                                $senderUser = user::loadById($receivedMessage->getReceiverId());
                                //var_dump($senderUser);
                                $status = ($receivedMessage->getStatus() == 1) ? 'read' : 'unread';
                                echo "<tr><th><a href='user.php?id=" . $senderUser->getId() . "'>" . $senderUser->getUsername() . "</a></th><th>" . $receivedMessage->getCreationDate() . "</th><tr>";

                                echo
                                "<tr>"
                                . "<td><a href='messages.php?id=" . $receivedMessage->getId() . "'>" . substr($receivedMessage->getTextMessage(), 0, 30) . " ..." . "</a></td><td>" . $status . "</td>"
                                . "</tr>";
                            }
                        } else {
                            echo "Your message box is empty";
                        }
                        echo "</table>";
                    }
                    ?>             
                </div>
                <div class="col-sm-6">
                    <?php
                    if (!empty($userSelected)) {
                        echo "<h3>Send messages:</h3><br>";
                        echo " <table class='table table-hover'>";

                        $allSenddMessages = message::loadAllBySenderId($userSelected->getId());
                        if (!empty($allSenddMessages)) {
                            foreach ($allSenddMessages as $sendMessage) {
                                $reciverUser = user::loadById($sendMessage->getSenderId());
                                $status = ($sendMessage->getStatus() == 1) ? 'read' : 'unread';
                                echo "<tr><th><a href='user.php?id=" . $reciverUser->getId() . "'>" . $reciverUser->getUsername() . "</a></th><th>" . $sendMessage->getCreationDate() . "</th><tr>";

                                echo
                                "<tr>"
                                . "<td><a href='messages.php?id=" . $sendMessage->getId() . "'>" . substr($sendMessage->getTextMessage(), 0, 30) . " ..." . "</a></td><td>" . $status . "</td>"
                                . "</tr>";
                            }
                        } else {
                            echo "Your message box is empty";
                        }
                        echo "</table>";
                    }
                    ?>
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
