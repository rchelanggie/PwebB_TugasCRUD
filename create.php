<?php

include("config.php");

if(isset($_POST['regist'])){

    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    if(isset($foto)){
 
        if($_FILES['foto']['size'] > 5 * 1048576) { 
            die(json_encode([
                "error" => 500,
                "status" => "File is too large (> 5 MB)"
            ]));
            exit;
        }
       
        $location = "photos/".$foto;
        $img_file_type = pathinfo($location,PATHINFO_EXTENSION);
        $img_file_type = strtolower($img_file_type);
        $img_new_filename = md5(time()).'.'.$img_file_type;
        $location = "photos/".$img_new_filename;
 
        $valid_extensions = array("jpg","jpeg","png");
     
        $response = 0;
        if(in_array(strtolower($img_file_type), $valid_extensions)) {
           if(move_uploaded_file($tmp, $location)){
              $response = $location;
              $foto = $img_new_filename;
           }
        }else{
            die(json_encode([
                "error" => 500,
                "status" => "Invalid file type"
            ]));
            exit;
        }    
    }

    $sql = "INSERT INTO calon_siswa (nama, jenis_kelamin, agama, sekolah_asal, alamat, foto) VALUE ('$nama', '$jenis_kelamin', '$agama', '$sekolah_asal', '$alamat', '$foto')";
    $query = mysqli_query($db, $sql);

    if( $query ) {
        header('Location: index.php?status=sukses');
    } else {
        header('Location: index.php?status=gagal');
    }
} else {
    die("Akses dilarang...");
}

?>