<?php

include_once("koneksi.php");

$result = mysqli_query($mysqli, 'SELECT * FROM mahasiswa');
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
  <div class="container mt-3">
    <div class="header">
        <h1>Daftar Nilai Mahasiswa</h1>
        <br>
        <div class="d-flex justify-content-between">
        <p>Dibawah ini merupakan daftar nilai mahasiswa program studi <span style="color: #800000">Informatika</span></p>
            <a href="tambah.php" class="btn" style="background-color: #800000; color: white">Tambah</a>
        </div>
    <br>
    <div class="table-responsive">
        <table class="table table-bordered" align="center" style="text-align: center">
            <thead>
                <tr>
                    <th rowspan="2">#</th>
                    <th rowspan="2">Nama Lengkap</th>
                    <th colspan="4">Nilai</th>
                    <th colspan="4">Presentasi Nilai</th>
                    <th rowspan="2">Nilai Akhir</th>
                    <th rowspan="2">Keterangan</th>
                    <th rowspan="2">Aksi</th>   
                </tr>
                <tr>
                    <td>Absen</td>
                    <td>Tugas</td>
                    <td>UTS</td>
                    <td>UAS</td>
                    <td>Absen (10%)</td>
                    <td>Tugas (20%)</td>
                    <td>UTS (30%)</td>
                    <td>UAS (40%)</td>
                </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
            while($mahasiswas = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $mahasiswas['nama']; ?></td>
                    <td><?php echo $mahasiswas['absen']; ?></td>
                    <td><?php echo $mahasiswas['tugas']; ?></td>
                    <td><?php echo $mahasiswas['uts']; ?></td>
                    <td><?php echo $mahasiswas['uas']; ?></td>
                    <?php
                        $nilaiA = $mahasiswas['absen']*10/100;
                        $nilaiB = $mahasiswas['tugas']*20/100;
                        $nilaiC = $mahasiswas['uts']*30/100;
                        $nilaiD = $mahasiswas['uas']*40/100;
                        $nilaiE = $nilaiA+$nilaiB+$nilaiC+$nilaiD
                        ?>
                        <td><?php echo $nilaiA;?></td>
                        <td><?php echo $nilaiB;?></td>
                        <td><?php echo $nilaiC;?></td>
                        <td><?php echo $nilaiD;?></td>
                        <td><?php echo $nilaiE;?></td>
                        <td>
                            <?php
                            if ($nilaiE >= 70 && $nilaiE <=100) {
                                ?>
                                <b style="color: green">Lulus</b>
                            <?php
                            }elseif ($nilaiE >= 0 && $nilaiE <=70) {
                                ?>
                                <b style="color: red">Tidak Lulus</b>
                            <?php
                            }
                            ?>
                        </td>
                        <td>
                            <a href="edit.php?id=<?php echo $mahasiswas['id']; ?>" class="btn btn-warning">Edit</a>
                            <br>
                            <a href="hapus.php?id=<?php echo $mahasiswas['id']; ?>" class="btn btn-danger mt-2" onclick="return confirm('Yakin mau hapus data?')">Delete</a>
                        </td>
                    </tr>
            </tbody>
            <?php
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>