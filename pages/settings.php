<?php
require_once('../autoloader.php');
session_start();
$userSelected = null;
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    $userSelected = user::loadById($_SESSION['id']);
    $userName = $userSelected->getUsername();
    $email = $userSelected->getEmail();
    $pass = $userSelected->getPasswordHash();
} else {
    echo "Nie jesteś zalogowany. Zaloguj się ";
    header('Refresh: 0; url = ../index.php');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        if (!empty($_POST['password']) && (md5($_POST['password']) === $pass)) {
            $userSelected->setUsername($_POST['username']);
            $userSelected->setEmail($_POST['email']);
            if (!empty($_POST['newpassword'])) {
                $userSelected->setPasswordHash($_POST['newpassword']);
            } else {
                $userSelected->setPasswordHash($_POST['password']);
            }
            $result = $userSelected->save();
            if ($result) {
                echo "Dokonałeś zmiany swoich danych";
                header('Refresh: 1;url= settings.php');
            }
        } else {
            echo "Niepoprawne hasło";
            header('Refresh: 1;url= settings.php');
        }
    } else {
        if (!empty($_POST['password']) && (md5($_POST['password']) === $pass)) {

            $result = $userSelected->delete();
            if ($result) {
                echo "Użytkownik usunięty z bazy danych. Za chwilę nastąpi przekierowanie na stronę główną";
                header('Refresh: 1;url=../index.php');
            }
        } else {
            echo "Niepoprawne hasło";
            header('Refresh: 1;url= settings.php');
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

        <hr>
        <div class="jumbotron">
            <div class="container page-header">
                <div class="row">
                    <div class="col-sm-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <form action="" method="post" role="form" >
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" value="<?php echo "$userName" ?>" name="username" id="username"
                                       placeholder="Your email">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" value="<?php echo "$email" ?>" name="email" id="email"
                                       placeholder="Your username">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" name="password" id="password"
                                       placeholder=""> 
                                <label for="newpassword">New password*:</label>
                                <input type="password" class="form-control" name="newpassword" id="newpassword"
                                       placeholder="">
                                <h6>*to change your data or delete a profile, please enter your password .</h6>
                            </div>
                            <button type="submit" name="submit" class="btn btn-success"><span class="glyphicon glyphicon-saved"></span> SUBMIT
                            </button>
                            <button type="delete" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> DELETE
                            </button>
                        </form>
                    </div>
                </div>
                <hr>
            </div>           
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