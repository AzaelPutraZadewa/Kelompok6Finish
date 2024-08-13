<?php
    //akses file koneksi database
    require '../koneksi/koneksi.php';
    if (isset($_POST['login'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $username = mysqli_real_escape_string($koneksi,$user);
        $password = mysqli_real_escape_string($koneksi,md5($pass));

        //cek username dan password
        $sql= mysqli_query($koneksi, "select * from `user` where `username`='$username' and `password`='$password'");
        $jumlah = mysqli_num_rows($sql);

        if(empty($user)){
            header("Location:index.php?gagal=userKosong");
        }else if(empty($pass)){
            header("Location:index.php?gagal=passKosong");
        }else if($jumlah==0){
            header("Location:index.php?gagal=userpassSalah");
        }else{
            session_start();
            //get data
            while($data = mysqli_fetch_row($sql)){
                $id_user = $data[0]; //1
                $level = $data[5]; //speradmin
                $_SESSION['id_user']=$id_user;
                $_SESSION['level']=$level;
                header("Location:index.php?include=profil");
            }
        }
}

?>
