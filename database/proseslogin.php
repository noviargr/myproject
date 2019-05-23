<?php
    session_start();
    include "koneksi.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($connect, $query);
    $check = mysqli_num_rows($result);

    if ($check) {
        $_SESSION['login'] = $username;
        echo "
            <script>
                alert('BERHASIL LOGIN');
                document.location.href = 'index.php?';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('GAGAL LOGIN');
                document.location.href = 'login.php';
            </script>
        ";
    }
?>