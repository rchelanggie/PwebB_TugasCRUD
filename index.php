<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hamption Student Admission</title>

    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
  <main class="container">
    <?php include 'navbar.php';?>

    <div class="row mb-4">
      <div class="col-sm-12">
        <div class="card text-center">
          <div class="card-body">
            <img src="image/sch-add.jpg" height=470px alt="PPDB">
          </div>
        </div>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-sm-6">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title"><strong>New Registration</strong></h5>
            <p class="card-text">New Students Registration.</p>
            <a href="form-register.php" class="btn btn-primary">New Registrations</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title"><strong>Registrants List</strong></h5>
            <p class="card-text">View All Registrants.</p>
            <a href="list-siswa.php" class="btn btn-primary">View Registrants</a>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>