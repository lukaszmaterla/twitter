<?php
require_once('../autoloader.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['email'])) {
        if (!empty($_POST['password'])) {
            $loggedUser = user::loadByEmail($_POST['email']);

            if ($loggedUser == true) {
                if (md5($_POST['password']) == $loggedUser->getPasswordHash()) {
                    $_SESSION['id'] = $loggedUser->getId();
                    $_SESSION['username'] = $loggedUser->getUsername();
                    $_SESSION['email'] = $loggedUser->getEmail();

                    if (isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['email'])) {
                        echo "Witaj jesteś zalogowany jako: " . $_SESSION['username'] . " <br> Za chwilę nastąpi przekierwowanie na stronę główną ";
                        header('Refresh:2, url=../index.php');
                    }
                } else {
                    echo "Podałes nie poprawne hasło";
                }
            } else {

                echo "Uzytkownik o podanym adresie email nie istnieje ";
            }
        } else {
            echo "Wprowadz hasło ";
        }
    } else {
        echo "Podaj adres mailowy";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zadanie 3 - formularze dodawania do bazy</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="../index.php">Twitter - my page</a>
        </div>
        <ul class="nav navbar-nav navbar-right">

            <li>
                <a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
            </li>
            <li>
                <a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a>
            </li>
        </ul>
    </div>
</nav>
<div class="jumbotron">
    <div class="container page-header">
        <div class="row">

            <div class="col-sm-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <form action="" method="POST">
                    <legend class="text-center">LOGIN FORM</legend>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="e-mail...">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                               placeholder="password...">
                    </div>
                    <button type="submit" name="submit" value="login" class="btn btn-primary">LOGIN</button>
                </form>
                <hr>
            </div>
        </div>

    </div>
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
