<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="styleprofil.css">
        <link rel="shortcut icon" href="logo1.ico">
        <title>Profil</title>
    </head>
    <body>
        <div class="layout">
            <div class="header">
                <img src="icon3.png">
            </div>
        </div>
        <div class="content">
            <div class="isi">
                <?php
                    include "koneksi.php";

                    ob_start();
                    session_start();

                    if (!isset($_SESSION['login'])) header("location: login.php");
                    $query = "SELECT user.nama_lengkap, biodata.tempat_lahir, biodata.tanggal_lahir, biodata.alamat, biodata.no_hp, biodata.status FROM biodata, user WHERE user.username=biodata.username";
                    $result = mysqli_query($connect, $query);
                    $row = mysqli_fetch_assoc($result);
                    
                ?>
                <tr>
                    <td></td>
                </tr>
                <table>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td><?php echo $row['nama_lengkap']; ?></td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td>:</td>
                        <td><?php echo $row['tempat_lahir']; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td><?php echo $row['tanggal_lahir']; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?php echo $row['alamat']; ?></td>
                    </tr>
                    <tr>
                        <td>No. Hp</td>
                        <td>:</td>
                        <td><?php echo $row['no_hp']; ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td><?php echo $row['status']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>