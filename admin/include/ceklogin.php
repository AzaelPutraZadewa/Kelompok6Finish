<?php
require '../koneksi/koneksi.php';
$user = $_POST['username'];
$pass = md5($_POST['password']);
$sql = mysqli_query($koneksi, "select * from user where username='$user' and password='$pass'");
$cek = mysqli_num_rows($sql);

if(empty($user)){
    header("Location:index.php?gagal=userKosong");
} else if (empty($pass)){
    header("Location:index.php?gagal=passKosong");
}else if ($cek==0){
    header("Location:index.php?gagal=userpassSalah");
}else{
  session_start();
    while($data = mysqli_fetch_row($sql)){
  $id_user = $data[0]; //1
  $level = $data[1]; //speradmin
  $_SESSION['id_user']=$id_user;
  $_SESSION['level']=$level;
  header('location:profil.php');
  }
}
 ?>
