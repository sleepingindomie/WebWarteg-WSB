<?php
require_once 'koneksi.php';
include('fungsi.php');
$sql = "SELECT * FROM artikel";
$all = $koneksi->query($sql);
$sql1 = "SELECT nama FROM kategori";
$all1 = $koneksi->query($sql1);
?>
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
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
        <div class="text-center my-5">
                <h1 class="fw-bolder">Selamat Datang di WSB Blog</h1>
                <p class="lead mb-0">Berisi seputar informasi makanan yang kami sajikan</p>
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container">

        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <div class="card mb-4">
                    <?php
                    $teratas = mysqli_query($koneksi, "SELECT * FROM artikel ORDER BY id_artikel DESC LIMIT 1");
                    while ($data = mysqli_fetch_array($teratas)) {
                    ?>
                        <a href="#!"><img class="card-img-top" src="image_view.php?id=<?php echo $data['id_artikel']; ?>" alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted"><span><?= $data['penulis'] ?> </span><?= ubahtanggal1($data["tgl"]) ?></div>
                            <h2 class="card-title"><?= $data["judul"] ?></h2>
                            <p class="card-text"><?= tampiltext($data["deskripsi"]) ?></p>
                            <a class="btn btn-primary" href="post.php?myid=<?= $data['id_artikel'] ?>"">Read more →</a>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <!-- Nested row for non-featured blog posts-->

                    <div class=" row">
                                <?php
                                $quer = mysqli_query($koneksi, "SELECT * FROM artikel ORDER BY id_artikel ASC LIMIT 6");

                                while ($row = mysqli_fetch_array($quer)) {
                                    # code...

                                ?>
                                    <div class="col-lg-6">
                                        <!-- Blog post-->
                                        <div class="card mb-4">
                                            <a href="#!"><img class="card-img-top" src="image_view.php?id=<?php echo $row['id_artikel']; ?>" alt="..." /></a>
                                            <div class="card-body">
                                                <div class="small text-muted"><span><?= $row['penulis'] ?>, </span><?= ubahtanggal1($row["tgl"]) ?></div>
                                                <h2 class="card-title h4"><?php echo $row["kategori"] ?></h2>
                                                <p class="card-text "><?php echo $row["judul"] ?></p>
                                                <a class="btn btn-primary" href="post.php?myid=<?= $row['id_artikel'] ?>">Read more →</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                        </div>

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
                                        <?php while ($row = mysqli_fetch_assoc($all1)) {
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