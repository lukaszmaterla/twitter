<?php
require_once ('../autoloader.php');
//session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['username'])) {
        if (!empty($_POST['email'])) {
            if (!empty($_POST['password'])) {

                $userName = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                if (user::loadByUsername($userName)) {
                    echo "Podana nazwa użytkownika jest juz zajęta ";
                } else {
                    if (user::loadByEmail($email)) {
                        echo "Podany email jest juz zajęty";
                    } else {

                        $newUser = new user();
                        $newUser->setUsername($userName);
                        $newUser->setEmail($email);
                        $newUser->setPasswordHash($password);
                        $newUser->save();
                        echo "Brawo rejestracja się powiodła za chwilę zostaniesz przekierowany/a na stronę do logowania ";
                        header('refresh:3, url=login.php');
                    }
                }
            } else {
                echo "Ustaw hasło do swojego konta";
            }
        } else {
            echo "Pole E-mail jest wymagane do wypełnienia";
        }
    } else {
        echo "Pole nazwa użytkownika jest wymagane do wypełnienia";
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
                            <legend class="text-center">REGISTER FORM</legend>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username"  placeholder="username...">
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="e-mail...">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="password...">
                            </div>
                            <button type="submit" name="submit" value="register" class="btn btn-primary">REGISTER</button>
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
                        <p class="copyright text-muted">Copyright &copy; Twitter simillar website - Created by Łukasz Materla</p>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
