<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="shortcut icon" href="logo1.ico">
        <link rel="stylesheet" href="styleaccount.css">
        <title>Create Account</title>
    </head>
    <body>
        <div class="layout">
            <div class="header">
                <img src="icon3.png">
            </div>
        </div>
        <div class="content">
            <div class="isi">
                <div class="bachat">Create Account Bachat</div>
                <form action="CreateAccount.php" enctype="multipart/form-data" method="POST">
                <table>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td><input type="text" name="nama" placeholder="nama lengkap"></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>:</td>
                        <td><input type="text" name="username" placeholder="username"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td><input type="password" name="password" placeholder="password"></td>
                    </tr>
                    <tr>
                        <td>Choose a Photo</td>
                        <td>:</td>
                        <td><input type="File" name="Gambar"></td>
                    </tr>
                </table>
                <table class="table2">
                    <tr>
                        <td><input type="submit" name="daftar" value="Daftar"></td>
                    </tr>
                </table>
            </form>
            </div>
        </div>
    </body>
</html>