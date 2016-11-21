<!DOCTYPE html>
<html>
<head>
	<title>Tugas 2</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
		<h2 align="center">Input Data Mobil</h2>
			<form method="POST">
			
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" name="id_mobil" placeholder="ID Mobil" class="form-control">
				</div>
				<div class="form-group">
					<input type="text" name="merk" placeholder="Merk" class="form-control">
				</div>
				<div class="form-group">
					<input type="text" name="model" placeholder="Model" class="form-control">
				</div>
				<div class="form-group">
					<input type="text" name="tipe" placeholder="Tipe" class="form-control">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" name="pintu" placeholder="Pintu" class="form-control">
				</div>
				<div class="form-group">
					<input type="text" name="tahun_produksi" placeholder="Tahun Produksi" class="form-control">
				</div>
				<div class="form-group">
					<input type="text" name="negara_pembuat" placeholder="Negara Pembuat" class="form-control">
				</div>
				<div class="form-group">
					<input type="text" name="jenis_produksi" placeholder="Jenis Produksi" class="form-control">
				</div>
			</div>
			<div class="col-md-6">
			<input type="submit" name="masuk" value="Input" class="btn btn-primary">
			<input type="submit" name="ubah" value="Update" class="btn btn-success">
			<input type="submit" name="hapus" value="Delete" class="btn btn-info">
			<input type="submit" name="cari" value="Search" class="btn btn-warning">
			<input type="submit" name="list" value="List Mobil" class="btn btn-danger">
			</div>
			</form>
		</div>
	</div>
</div>
<?php
error_reporting(1);
include "koneksi.php";
		$id_mobil = $_POST['id_mobil'];
		$merk = $_POST['merk'];
		$model = $_POST['model'];
		$tipe = $_POST['tipe'];
		$pintu = $_POST['pintu'];
		$tahun_produksi = $_POST['tahun_produksi'];
		$negara_pembuat = $_POST['negara_pembuat'];
		$jenis_produksi = $_POST['jenis_produksi'];
		if (isset($_POST['masuk'])) {
			$sql = "INSERT INTO `mobil`(`Id_Mobil`, `Merk`, `Model`, `Tipe`, `Pintu`, `Tahun_Produksi`, `Negara_Pembuat`, `Jenis_Produksi`) VALUES ('$id_mobil','$merk','$model','$tipe','$pintu','$tahun_produksi','$negara_pembuat','$jenis_produksi')";
			$exe = mysql_query($sql);
		}elseif (isset($_POST['ubah'])) {
			$sql = "UPDATE `data` SET `Merk`='$merk',`Model`='$model',`Tipe`='$tipe',`Pintu`='$pintu',`Tahun_Produksi`='$tahun_produksi',`Negara_Pembuat`='$negara_pembuat',`Jenis_Produksi`='$jenis_produksi' WHERE `Id_Mobil`='$id_mobil'";
			$exe = mysql_query($sql);
		}elseif (isset($_POST['hapus'])) {
			$sql = "DELETE FROM `data` WHERE `Id_Mobil`='$id_mobil'";
			$exe = mysql_query($sql);
		}elseif (isset($_POST['cari'])) {
			$sql = "SELECT * FROM `data` WHERE `Id_Mobil`='$id_mobil'";
			$exe = mysql_query($sql);
			echo "<table class='table'>\n";
			echo "<tr>";
					echo "<th style='background:gray'>ID Mobil</th>";
					echo "<th style='background:gray'>Merk</th>";
					echo "<th style='background:gray'>Model</th>";
					echo "<th style='background:gray'>Tipe</th>";
					echo "<th style='background:gray'>Pintu</th>";
					echo "<th style='background:gray'>Tahun Produksi</th>";
					echo "<th style='background:gray'>Negara Pembuat</th>";
					echo "<th style='background:gray'>Jenis Produksi</th>";
				echo "</tr>";
			while($line = mysql_fetch_array($exe, MYSQL_NUM)){
				echo "\t<tr>\n";
				foreach ($line as $col_value) {
					echo "\t\t<td>$col_value</td>\n";
				}
				echo "\t</tr>\n";
			}
			echo "</table>\n";
		}elseif (isset($_POST['list'])) {
			$query = 'SELECT * FROM data';
				$result = mysql_query($query) or die ('Query failed :'.mysql_error());
				echo "<center>";
				echo "<h2>List Mobil</h2>";
				echo "</center>";
				echo "<table class='table'>\n";
				echo "<tr>";
					echo "<th style='background:gray'>ID Mobil</th>";
					echo "<th style='background:gray'>Merk</th>";
					echo "<th style='background:gray'>Model</th>";
					echo "<th style='background:gray'>Tipe</th>";
					echo "<th style='background:gray'>Pintu</th>";
					echo "<th style='background:gray'>Tahun Produksi</th>";
					echo "<th style='background:gray'>Negara Pembuat</th>";
					echo "<th style='background:gray'>Jenis Produksi</th>";
				echo "</tr>";
				while($line = mysql_fetch_array($result, MYSQL_NUM)){
					echo "\t<tr>\n";
					foreach ($line as $col_value) {
						echo "\t\t<td>$col_value</td>\n";
					}
					echo "\t</tr>\n";
				}
				echo "</table>\n";
		}
?>
</body>
</html>