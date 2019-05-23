<?php
    include "koneksi.php";

    $username = htmlspecialchars($_POST['username']);
    $password = ($_POST['password']);
    $nama = htmlspecialchars($_POST['nama']);
    $namaFile = $_FILES['Gambar']['name'];
		$ukuranFile = $_FILES['Gambar']['size'];
		$error = $_FILES['Gambar']['error'];
		$tmpFile = $_FILES['Gambar']['tmp_name'];

    $valid = ['jpg', 'jpeg','png'];
	$ekstensiUser =	 explode('.', $namaFile);
	$ekstensiUser = end($ekstensiUser);
    $ekstensiUser = strtolower($ekstensiUser);
	if(!in_array($ekstensiUser, $valid)){
		echo "
			<script>
				alert(' format ' + '$ekstensiUser'+' tidak didukung');
			</script>
		";
	}else if($ukuranFile > 5000000){
		echo "
			<script>
				alert('Ukuran Foto terlalu besar');
			</script>
			";
		}else{
		// membangkitkan nama acak
		$acak = uniqid();
		$acak .= '.' . $ekstensiUser;

		move_uploaded_file($tmpFile, $acak);
		$syntax = "INSERT INTO user VALUES('$username','$password','$nama','$acak')";
		$query = mysqli_query($connect, $syntax);
		if($query){
			echo "
				<script>
                    alert('Akun berhasil di buat');
                    document.location.href = 'login.php';
				</script>
			";
		}else{
			echo "Error karena " . mysqli_error($connect);
		}
	}
    mysqli_close($connect);
?>