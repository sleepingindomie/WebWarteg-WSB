<?php
include('koneksi.php');
if (isset($_GET['id'])) {
    $query = mysqli_query($koneksi, "select * from artikel where id_artikel='" . $_GET['id'] . "'");
    $row = mysqli_fetch_array($query);
    echo $row["file"];
} else {
    header('location:blog.php');
}