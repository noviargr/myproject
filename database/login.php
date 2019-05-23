<?php   
        session_start();
        if(isset($_GET['logout'])){
            session_unset();
            session_destroy();
            echo "";
        }
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="shortcut icon" href="logo1.ico">
        <link rel="stylesheet" href="stylelogin.css">
        <title>Login</title>
    </head>
    <body>
        <div class="layout">
            <div class="header">
                <img src="icon3.png">
            </div>
        </div>
        <div class="content">
            <div class="isi">
                <div class="bachat">Login ke Bachat</div>
                <form action="proseslogin.php" method="post">
                    <table>
                        <tr>
                            <td><input type="text" name="username" size="50" placeholder="username"></td>
                        </tr>
                        <tr>
                            <td><input type="password" name="password" size="50" placeholder="password"></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="login" value="Login"></td>
                        </tr>
                    </table>
                </form>
                <div class="or">atau</div>
                <div class="create">
                    <a href="Create.php">Create Account</a>
                </div>
            </div>
        </div>
    </body>
</html>