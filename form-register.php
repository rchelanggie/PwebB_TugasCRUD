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

    <h4 class="mb-3 text-center">
      Hampton Student Admission Form
    </h4>

    <div class="bg-white card">
      <form action="create.php" method="POST" enctype="multipart/form-data">
        <fieldset>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Your Full Name" required>
            <label for="nama">Full Name</label>
          </div>
          <div class="mb-3">
              <label for="foto" class="form-label">Foto</label>
              <input type="file" class="form-control" name="foto" id="foto" accept=".png, .jpg, .jpeg" required>
              <img src="" style="max-height: 100px; width: auto" id="previewImg">
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
                <option value="Kristen">Christian</option>
                <option value="Katolik">Catholic</option>
                <option value="Buddha">Buddha</option>
                <option value="Hindu">Hindu</option>
                <option value="Khonghucu">Khonghucu</option>
              </select>
            </div>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="sekolah_asal" id="sekolah_asal" placeholder="Sekolah asal Anda" required>
            <label for="sekolah_asal">Previous School</label>
          </div>
          <button id="submit-btn" type="submit" value="Regist" name="regist" class="btn btn-primary w-100 pt-2 btn-block">Register</input>
        </fieldset>
      </form>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</html>