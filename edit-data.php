<?php

include("config.php");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = str_replace("'", "\'", $_POST['id']);
    $nama = str_replace("'", "\'", $_POST['nama']);
    $jenis_kelamin = str_replace("'", "\'", $_POST['jenis_kelamin']);
    $agama = str_replace("'", "\'", $_POST['agama']);
    $sekolah_asal = str_replace("'", "\'", $_POST['sekolah_asal']);
    $alamat = str_replace("'", "\'", $_POST['alamat']);
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    
    if (!empty($foto)) {
        if ($_FILES['foto']['size'] > 3 * 1048576) { 
            die(json_encode([
                "error" => 500,
                "status" => "File too large (> 3 MB)"
            ]));
            exit;
        }

        $location = "photos/" . $foto;
        $img_file_type = pathinfo($location, PATHINFO_EXTENSION);
        $img_file_type = strtolower($img_file_type);
        $img_new_filename = md5(time()) . '.' . $img_file_type;
        $location = "photos/" . $img_new_filename;

        $valid_extensions = array("jpg", "jpeg", "png");

        $response = 0;
        if (in_array(strtolower($img_file_type), $valid_extensions)) {
            if (move_uploaded_file($tmp, $location)) {
                $response = $location;
                $foto = $img_new_filename;
            }
        } else {
            die(json_encode([
                "error" => 500,
                "status" => "Invalid file type"
            ]));
            exit;
        }

        $sql = "SELECT * FROM calon_siswa WHERE id=$id";
        $query = mysqli_query($db, $sql);

        $old_foto = "";
        while ($siswa = mysqli_fetch_array($query)) {
            $old_foto = $siswa["foto"];
            break;
        }

        if ($old_foto && file_exists($old_foto)) {
            unlink($old_foto);
        }

        $sql = "UPDATE calon_siswa
               SET nama='$nama', jenis_kelamin='$jenis_kelamin', agama='$agama', sekolah_asal='$sekolah_asal', alamat='$alamat', foto='$foto'
               WHERE id=$id";
    } else {
        $sql = "UPDATE calon_siswa
               SET nama='$nama', jenis_kelamin='$jenis_kelamin', agama='$agama', sekolah_asal='$sekolah_asal', alamat='$alamat'
               WHERE id=$id";
    }
    $query = mysqli_query($db, $sql);
    
    if ($query) {
        die(json_encode([
            "error" => 0,
            "status" => "OK"
        ]));
    } else {
        die(json_encode([
            "error" => 500,
            "status" => "Internal Server Error"
        ]));
    }
}else{
    die("Method not allowed");
}