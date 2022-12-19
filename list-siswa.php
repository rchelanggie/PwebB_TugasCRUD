<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hampton Student Admission</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <main class="container">
        <?php include 'navbar.php'; ?>
        <div class="row">
        <div class="col-md-12">
            <div class="row mb-3">
            <div class="col-sm-6">
                <h4>New Student Applicant List</h4>
            </div>
            <div class="col-sm-6 float-end">
                <a href="unduh-pdf.php" class="btn btn-danger mb-2 float-end">+ Download PDF</a>
                <a href="form-register.php" class="btn btn-primary mb-2 float-end">+ Register</a>
            </div>
            </div>

            <table class="table table-striped">
            <thead>
                <tr>                
                <th scope="col">No</th>
                <th scope="col" >Foto</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Agama</th>
                <th scope="col">Sekolah Asal</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody id="listSiswa">

            </tbody>
            </table>
        </div>
        </div>
    </main>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Data Calon Siswa Baru Akademi One Piece</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="form-edit">
          <div class="modal-body">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="nama" id="nama" placeholder="Full Name" required>
              <label for="nama">Full Name</label>
            </div>
            <div class="mb-3">
              <label for="foto">Foto</label>
              <input type="file" class="form-control" name="foto" id="foto" accept=".png, .jpg, .jpeg" required>
              <img src="" style="width: 96px; height:128px; object-fit: cover;" id="previewImg">
            </div>
            <div class="form-floating mb-3">
              <textarea class="form-control" placeholder="Alamat" name="alamat" id="alamat" style="height: 100px" required></textarea>
              <label for="alamat">Address</label>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label class="fw-bold" for="jenis_kelamin">Gender</label>
                <select class="form-select form-floating mb-3" name="jenis_kelamin" id="jenis_kelamin" required>
                  <option label="Pilih Jenis Kelamin" hidden></option>
                  <option value="laki-laki">Male</option>
                  <option value="perempuan">Female</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="fw-bold" for="agama">Religion</label>
                <select class="form-select form-floating mb-3" name="agama" id="agama" required>
                  <option label="Pilih Agama" hidden></option>
                  <option value="Islam">Islam</option>
                  <option value="Kristen">Kristen</option>
                  <option value="Katolik">Katolik</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Buddha">Buddha</option>
                  <option value="Khonghucu">Khonghucu</option>
                </select>
              </div>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="sekolah_asal" id="sekolah_asal" placeholder="Sekolah Asal" required>
              <label for="sekolah_asal">Previous School</label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="edit-btn">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $(document).ready(() => {
    $.ajax({
      type: 'GET',
      url: "get-list.php",
      success: function(resultData) {
        resultData.split("\n").forEach(element => {
          if (element) {
            let data = JSON.parse(element);
            if (!data) return;
            $('#listSiswa').append(`
              <tr>
                <td>${data.id}</td>
                <td><img src="photos/${data.foto}" alt="Foto ${data.nama}" style="width: 96px; height:128px; object-fit: cover;"></td>
                <td>${data.nama}</td>s
                <td>${data.alamat}</td>
                <td>${data.jenis_kelamin}</td>
                <td>${data.agama}</td>
                <td>${data.sekolah_asal}</td>
                <td>
                    <button class="btn btn-warning btn-sm text-white" type="button" data-bs-toggle="modal" data-bs-target="#editModal" onclick="getDataSiswa(${data.id})">Edit</button>&nbsp;
                    <button class="btn btn-danger btn-sm" onclick="deleteData(${data.id})">Hapus</button>
                </td>
              </tr>
              `)
          }
        });
      }
    });
  });

  const getDataSiswa = (id => {
    $('#form-edit')[0].reset();
    $.ajax({
      type: 'GET',
      url: "get-data.php?id=" + id,
      success: function(resultData) {
        let data = JSON.parse(resultData);
        $('#edit-btn').data('id', id);
        $('#nama').val(data.nama);
        $('#previewImg').attr('src', `photos/${data.foto}`);
        $('#previewImg').addClass('mt-3');
        $('#jenis_kelamin option[value=' + data.jenis_kelamin + ']').attr('selected', 'selected');
        $('#agama option[value=' + data.agama + ']').attr('selected', 'selected');
        $('#sekolah_asal').val(data.sekolah_asal);
        $('#alamat').val(data.alamat);
      }
    });
  });

  $('#foto').change(function(e) {
    if (e.target.files && e.target.files[0]) {
      let reader = new FileReader();

      reader.onload = function(e) {
        $('#previewImg').addClass('mt-3');
        $('#previewImg').attr('src', e.target.result);
      }

      reader.readAsDataURL(e.target.files[0]);
    }
  });

  $('#edit-btn').on('click', () => {
    var form = $('#form-edit')[0];
    var formData = new FormData(form);
    let dataSiswa = {
      id: $('#edit-btn').data('id'),
      nama: $('#nama').val(),
      jenis_kelamin: $('#jenis_kelamin').val(),
      agama: $('#agama').val(),
      sekolah_asal: $('#sekolah_asal').val(),
      alamat: $('#alamat').val(),
    }

    let flag = false;
    if (!dataSiswa.nama.length ||
      !dataSiswa.jenis_kelamin.length ||
      !dataSiswa.agama.length ||
      !dataSiswa.sekolah_asal.length ||
      !dataSiswa.alamat.length) flag = true

    if (!flag) {
      formData.append('id', dataSiswa.id);
      formData.append('nama', dataSiswa.nama);
      formData.append('jenis_kelamin', dataSiswa.jenis_kelamin);
      formData.append('agama', dataSiswa.agama);
      formData.append('sekolah_asal', dataSiswa.sekolah_asal);
      formData.append('alamat', dataSiswa.alamat);

      var file = $('#foto')[0].files[0]
      if (file) formData.append('foto', file);
      $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        url: "edit-data.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function(resultData) {
          Swal.fire({
            icon: 'success',
            title: 'Perbarui Data Berhasil',
            text: 'Data Anda berhasil diperbarui',
            heightAuto: false
          }).then((result) => {
            if (result.isConfirmed) {
              location.reload();
            }
          })
        }
      });
    } else {
      Swal.fire({
        icon: 'error',
        title: 'Terjadi Kesalahan',
        text: 'Periksa kembali data yang Anda masukkan',
        heightAuto: false
      });
    }
  });

  const deleteData = (id => {
    Swal.fire({
      title: 'Hapus Data?',
      text: "Apakah Anda yakin akan menghapus data pendaftaran? Tindakan ini tidak bisa dibatalkan.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#dc3545',
      confirmButtonText: 'Hapus',
      cancelButtonText: 'Batal',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: 'GET',
          url: "hapus.php?id=" + id,
          success: function(resultData) {
            Swal.fire({
              icon: 'success',
              title: 'Hapus data berhasil',
              text: 'Data Anda berhasil dihapus',
              heightAuto: false
            }).then((result) => {
              if (result.isConfirmed) {
                location.reload();
              }
            })
          }
        });
      }
    })
  });
</script>
</html>