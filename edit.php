<?php
        include_once("koneksi.php");
        
        if(isset($_POST['edit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $absen = $_POST['absen'];
        $tugas = $_POST['tugas'];
        $uts = $_POST['uts'];
        $uas = $_POST['uas'];


        $query = mysqli_query($mysqli, 
        "UPDATE mahasiswa SET nama='$nama', absen='$absen', tugas='$tugas', uts='$uts', uas='$uas' WHERE id='$id' ");
        header("Location: index.php");
    }
    $id = $_GET['id'];

    $query = mysqli_query($mysqli, "SELECT * FROM mahasiswa WHERE id='$id'");

    while($mahasiswas = mysqli_fetch_array($query)) {
        $nama = $mahasiswas['nama'];
        $absen = $mahasiswas['absen'];
        $tugas = $mahasiswas['tugas'];
        $uts = $mahasiswas['uts'];
        $uas = $mahasiswas['uas'];

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informatika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light shadow-sm" style="background-color: #800000; color: white">
    <div class="container">
        <a class="navbar-brand" href="#" style="color: #ffffff;">Informatika</a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" style="color: #ffffff;" href="index.php">Home</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-8">
                <h2>Data Mahasiswa</h2>
                <p>Berikut data mahasiswa dengan lengkap</p>
               <div class="my-3">
            </div> 
                <form action="edit.php" method="POST" class="row g-3">
                    <div class="col-md-12">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" class="form-control" value="<?=$nama?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="absen" class="form-label">Nilai Absen</label>
                        <input type="number" name="absen" id="absen" placeholder="Masukkan Nilai Absen" class="form-control" value="<?=$absen?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="tugas" class="form-label">Nilai Tugas</label>
                        <input type="number" name="tugas" id="tugas" placeholder="Masukkan Nilai Tugas" class="form-control" value="<?=$tugas?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="uts" class="form-label">Nilai UTS</label>
                        <input type="number" name="uts" id="uts" placeholder="Masukkan Nilai UTS" class="form-control" value="<?=$uts?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="uas" class="form-label">Nilai UAS</label>
                        <input type="number" name="uas" id="uas" placeholder="Masukkan Nilai UAS" class="form-control" value="<?=$uas?>" required>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                    <button type="submit" name="edit" class="btn btn-danger col-md-2">Edit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>