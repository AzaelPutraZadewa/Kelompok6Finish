<?php
include('../koneksi/koneksi.php');
$id_user = $_SESSION['id_user'];
$id_kategori_blog = $_POST['kategori_blog'];
$tanggal = date('Y/m/d');
$judul = $_POST['judul'];
$isi = $_POST['isi'];
if(empty($judul)){
	header("Location:index.php?include=tambah-blog&notif=tambahkosong&jenis=judul");
}else if(empty($id_kategori_blog)){
	header("Location:index.php?include=tambah-blog&notif=tambahkosong&jenis=kategori blog");
}else{
	$sql = "insert into `blog` (`id_kategori_blog`, `id_user`, `tanggal`, `judul`, `isi`)
	values ('$id_kategori_blog', '$id_user', '$tanggal', '$judul', '$isi')";
	mysqli_query($koneksi,$sql);
header("Location:index.php?include=blog&notif=tambahberhasil");
}
?>
