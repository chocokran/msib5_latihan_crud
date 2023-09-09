<?php

    include_once("koneksi.php");

    $id = $_GET['id'];

    $delete = mysqli_query($mysqli, "DELETE FROM mahasiswa WHERE id='$id'");

    header("Location:index.php");
?>