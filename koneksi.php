<?php
	$nama_db="showroommobil";
	$link = mysql_connect('localhost','root','') or die('Could not connect: '.mysql_error());
	if($link){
//pilih database
mysql_select_db($nama_db);
}else{
echo "Database tidak terkoneksi";
}
?>