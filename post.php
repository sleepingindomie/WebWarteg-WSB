<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Warteg Sukses Bahari</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="admin/assets/img/favicon(3).ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles1.css" rel="stylesheet" />
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php"> Warteg Sukses Bahari</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="blog.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <?php
                include "koneksi.php";
                include('fungsi.php');

                $id = $_GET["myid"];
                $image_query = mysqli_query($koneksi, "select * from artikel where $id = id_artikel");
                while ($rows = mysqli_fetch_array($image_query)) {
                ?>
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1"><?= $rows['judul'] ?></h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2"><span><?= $rows['penulis'] ?> , </span><?= ubahtanggal1($rows['tgl']) ?></div>
                            <!-- Post categories-->
                            <a class="badge bg-secondary text-decoration-none link-light" href="kategori.php?kategori=<?= $rows['kategori'] ?>"><?= $rows['kategori'] ?></a>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="image_view.php?id=<?php echo $rows['id_artikel']; ?>" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4 text-start" style="text-decoration: underline;"><?= $rows['deskripsi'] ?></p>
                        </section>
                    </article>
                <?php
                }
                ?>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                            <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                        </div>
                    </div>
                </div>
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <?php
                                    require_once 'koneksi.php';
                                    $sql1 = "SELECT nama FROM kategori";
                                    $all1 = $koneksi->query($sql1);
                                    while ($row = mysqli_fetch_assoc($all1)) {
                                        # code...
                                    ?>
                                        <li><a href="kategori.php?kategori=<?= $row['nama'] ?>"><?= $row['nama'] ?></a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                 <!-- Side widget-->
                 <div class=" card mb-4">
                                                                <div class="card-header">Tentang Kami</div>
                                                                <div class="card-body">Warteg Sukses Bahari adalah warung makan Warung Tegal yang menyajikan hidangan tradisional Indonesia. Kami terkenal dengan cita rasa autentik dan bahan-bahan segar. Nikmati hidangan khas Indonesia yang lezat di Warteg Sukses Bahari.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; WSB 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="admin/js/scripts1.js"></script>
</body>

</html>