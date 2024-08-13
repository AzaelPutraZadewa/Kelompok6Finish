<?php

if(isset($_SESSION['id_user'])){
	$id_user = $_POST['id_user'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$old_password = md5($_POST['old_password']);
	$level = $_POST['level'];

    //get foto
    $sql_f = "SELECT `foto` FROM `user` WHERE `id_user`='$id_user'";
    $query_f = mysqli_query($koneksi,$sql_f);
    while($data_f = mysqli_fetch_row($query_f)){
        $foto = $data_f[0];
        //echo $foto;
    }

	if(empty($nama)){
	    header("Location:index.php?include=edit-user&data=".$id_user."&notif=editkosong&jenis=nama");
	}else if(empty($email)){
	    header("Location:index.php?include=edit-user&data=".$id_user."&notif=editkosong&jenis=email");
	}else if(empty($username)){
	    header("Location:index.php?include=edit-user&data=".$id_user."&notif=editkosong&jenis=username");
	}else{
    $lokasi_file = $_FILES['foto']['tmp_name'];
		$nama_file = $_FILES['foto']['name'];
		$direktori = 'foto/'.$nama_file;
		
		if(move_uploaded_file($lokasi_file,$direktori)){
            	   if(!empty($foto) && empty($password)) {
                     unlink("foto/$foto");
									 }
		   $sql = "update `user` set `nama`='$nama', `username`='$username',
                  `email`='$email', `foto`='$nama_file', `level`='$level' where `id_user`='$id_user'";
                  //echo $sql;
		   mysqli_query($koneksi,$sql);
		}else{
			$sql = "update `user` set `nama`='$nama', `username`='$username',`email`='$email', `password`='$password', `level`='$level' where `id_user`='$id_user'";
								 //echo $sql;
								 mysqli_query($koneksi,$sql);

		}
      	    header("Location:index.php?include=user&notif=editberhasil");

}
}

?>
