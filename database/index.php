<?php 
	session_start();
	require 'koneksi.php';
	date_default_timezone_set('Asia/Jakarta');

	if(!isset($_SESSION['login'])){
		header("Location: login.php");
	}else{
		if(isset($_POST['goStatus'])){
			$username = $_SESSION['login'];
			$isiStatus = htmlspecialchars($_POST['isiStatus']);
			if(!isset($_POST['fotoStatus'])){
				$fotoStatus = '';
			}else{
				$fotoStatus	= $_POST['fotoStatus'];
			}
			$tanggal = date('Y-m-d');
			$sql = "INSERT INTO status VALUES('','$username','$isiStatus','$fotoStatus','$tanggal')";

			$query = mysqli_query($connect, $sql);

			if($query){
				echo "
					<script>alert('Status berhasil dikirim');</script>
				";
			}else{
				echo "Error karena " . mysqli_error($connect);
			}
		}
		if(isset($_GET['goKomen'])){
			$isiKomen = $_GET['isiKomen'];
			$username = $_SESSION['login'];
			$idStatusKomen = $_GET['idStatusKomen'];
			$tanggal = date('Y-m-d');

			$sql3 = "INSERT INTO komentar VALUES('','$isiKomen','$username','$idStatusKomen','$tanggal')";
			$query = mysqli_query($connect, $sql3);

			if($query){
				echo "
					<script>alert('Komentar berhasil dikirim');</script>
				";
			}else{
				echo "Error karena " . mysqli_error($connect);
			}	
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bachat</title>
	<link rel="stylesheet" href="styleIndex.css">
	<link rel="shortcut icon" href="logo1.ico">
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<div class="navbar">
		<img src="logo.png">
		<input type="text" placeholder="Cari">
		<div class="profil"><a href="profil.php">Profil</a></div>
		<div class="logout"><a href="login.php?logout=true">Logout</a></div>
	</div>
	<div class="container">
		<div class="posting">
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="header">Buat Postingan</div>
				<textarea name="isiStatus" id="" cols="49" rows="5" placeholder="Apa yang anda pikirkan ?" required=""></textarea>
				<input type="file" name="fotoStatus">
				<button name="goStatus">Bagikan Kiriman</button>
			</form>
		</div>
		<div class="beranda">
			<h1>Beranda</h1>		
		</div>
		<?php 
			$sql1 = "SELECT user.foto as poto, user.nama_lengkap, status.status, status.foto, status.tanggal, status.id_status FROM status INNER JOIN user ON status.username = user.username ORDER BY status.id_status DESC";
			$query = mysqli_query($connect, $sql1);
			while($row = mysqli_fetch_assoc($query)):
					if (!empty($row['poto'])){
						$profil = $row['poto'];
					}else{
						$profil = 'profil.png';
					}
		?>
		<div class="status">
			<div class="header">
				<img src="<?= $profil; ?>" alt="" width="50">
				<p class="nama" style="color: #385898; font-weight: bold"><?= $row['nama_lengkap']; ?></p>
				<p class="tgl"><?= $row['tanggal']; ?></p>
			</div>
			<p class="text"><?= $row['status']; ?></p>
			<div class="tombolKomen">
			<span class="komentar"><i class='far fa-comment-alt'></i>
			Komentar </span>| <span class="hapus"><i class="material-icons" style="font-size: 20px;">delete</i>Hapus</span></div>
			<?php 
				$sql2 = "SELECT user.nama_lengkap, komentar.komen, komentar.tanggal, user.foto AS potoKomen FROM komentar, status, user WHERE komentar.username = user.username AND komentar.id_status = status.id_status and komentar.id_status = '$row[id_status]' ORDER BY komentar.id_komentar ASC";
				$query1 = mysqli_query($connect, $sql2);
				while($rowKomen = mysqli_fetch_assoc($query1)) :
					if (!empty($rowKomen['potoKomen'])){
						$profil = $rowKomen['potoKomen'];
					}else{
						$profil = 'profil.png';
					}
			?>
			<div class="komentar" >
				<img src="<?= $profil ?>" alt="" width="30">
				<p><span class="nama" style="color: #385898; font-weight: bold"><?= $rowKomen['nama_lengkap']; ?> &nbsp</span><?= $rowKomen['komen']; ?></p>
			</div>
			<?php 	endwhile; ?>
			<div class="tulisKomen">
				<form action="" method="GET">
					<input type="text" name="isiKomen" placeholder="Tulis Komentar">
					<button type="submit" name="goKomen">Kirim</button>
					<input type="hidden" name="idStatusKomen" value="<?= $row['id_status']; ?>">
				</form>
			</div>
			<hr>
		</div>  
		<?php endwhile; ?>    
	</div>
</body>
</html>