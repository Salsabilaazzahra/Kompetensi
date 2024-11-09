<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kredit Mobil</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="img/Cuplikan layar 2024-11-09 010700.png" width="70" height="auto" alt="Logo">
               <b>Kredit Mobil</b>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto" >
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<!-- Gambar Slider -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/7.jpg" class="d-block w-100" alt="slide1">
            </div>
            <div class="carousel-item">
                <img src="img/1.jpg" class="d-block w-100" alt="slide2">
            </div>
            <div class="carousel-item">
                <img src="img/2.webp" class="d-block w-100" alt="slide3">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

 <!-- Section Tentang Perusahaan -->
 <section id="about" class="about py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <!-- Explain Section -->
            <div class="col-md-6">
                <h2 class="font-weight-bold">About Company</h2>
                <p class="text-secondary mt-3">Kami adalah perusahaan terkemuka yang menyediakan solusi pembiayaan kendaraan, 
            khususnya untuk mobil baru dan bekas, dengan skema kredit yang fleksibel dan mudah diakses. 
            Berdiri dengan tujuan memberikan kemudahan bagi masyarakat dalam memiliki kendaraan impian, 
            kami menawarkan berbagai produk pembiayaan dengan bunga kompetitif, tenor yang dapat disesuaikan, 
            dan proses persetujuan yang cepat dan transparan. Dengan dukungan tim profesional yang berpengalaman, 
            kami berkomitmen untuk memberikan pelayanan terbaik kepada pelanggan, memastikan setiap proses kredit berjalan dengan lancar dan sesuai dengan kebutuhan finansial Anda. 
            Kami juga terus berinovasi untuk memberikan pengalaman yang lebih baik, dengan memanfaatkan teknologi untuk mempermudah proses pengajuan dan pembayaran angsuran. 
            Bergabunglah bersama kami dan wujudkan impian Anda untuk memiliki kendaraan yang sesuai dengan gaya hidup dan kebutuhan.</p>
            </div>
            <!-- Picture Section -->
            <div class="col-md-6 text-center">
                <img src="img/mobil.webp" alt="Tools Image" class="img-fluid">
            </div>
        </div>
    </div>
</section>

    <!-- Form Perhitungan Kredit Mobil -->
    <div class="container mt-4">
        <h2>Perhitungan Kredit Mobil</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="harga_mobil">Harga Mobil</label>
                <input type="number" class="form-control" id="harga_mobil" name="harga_mobil" required>
            </div>
            <div class="form-group">
                <label for="dp">DP (%)</label>
                <input type="number" class="form-control" id="dp" name="dp" required>
            </div>
            <div class="form-group">
                <label for="tenor">Tenor (Tahun)</label>
                <input type="number" class="form-control" id="tenor" name="tenor" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Hitung</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $harga_mobil = $_POST['harga_mobil'];
            $dp_persen = $_POST['dp'];
            $tenor_tahun = $_POST['tenor'];

            // Perhitungan Bunga dan Angsuran
            $bunga = 0.2 * $harga_mobil;
            $dp_nominal = ($dp_persen / 100) * $harga_mobil;
            $total_pinjaman = ($harga_mobil + $bunga) - $dp_nominal;
            $tenor_bulan = $tenor_tahun * 12;
            $angsuran_bulanan = $total_pinjaman / $tenor_bulan;

            // Menampilkan hasil
            echo "<div class='mt-4'>";
            echo "<h4>Hasil Perhitungan</h4>";
            echo "<p><strong>Harga Mobil:</strong> Rp " . number_format($harga_mobil, 2, ',', '.') . "</p>";
            echo "<p><strong>DP (" . $dp_persen . "%):</strong> Rp " . number_format($dp_nominal, 2, ',', '.') . "</p>";
            echo "<p><strong>Tenor:</strong> " . $tenor_bulan . " bulan (" . $tenor_tahun . " tahun)</p>";
            echo "<p><strong>Bunga (20%):</strong> Rp " . number_format($bunga, 2, ',', '.') . "</p>";
            echo "<p><strong>Angsuran Per Bulan:</strong> Rp " . number_format($angsuran_bulanan, 2, ',', '.') . "</p>";
            echo "</div>";
        }
        ?>
    </div>

     <!-- Section Contact -->
     <section id="contact" class="about py-4 bg-light">
    <div class="container text-center">
        <h2 class="mb-4">Contact Us</h2>
        <div class="row">
            <!-- By Phone -->
            <div class="col-md-4 d-flex">
                <div class="card border-0 w-100 h-100">
                    <div class="card-body d-flex flex-column">
                        <div class="icon mb-3">
                            <img src="img/Phone--Streamline-Kameleon.png" alt="Phone Icon" width="50">
                        </div>
                        <h5 class="card-title">Telefon</h5>
                        <p>08123456789</p>
                    </div>
                </div>
            </div>

            <!-- Address -->
            <div class="col-md-4 d-flex">
                <div class="card border-0 w-100 h-100">
                    <div class="card-body d-flex flex-column">
                        <div class="icon mb-3">
                            <img src="img/Sync-Location--Streamline-Ultimate.png" alt="Case Icon" width="50">
                        </div>
                        <h5 class="card-title">Alamat</h5>
                        <p>Jl. Pradan RT 02 RW 01 Geneng, Prambanan, Klaten, Jawa Tengah, 57454</p>
                    </div>
                </div>
            </div>

            <!-- Email -->
            <div class="col-md-4 d-flex">
                <div class="card border-0 w-100 h-100">
                    <div class="card-body d-flex flex-column">
                        <div class="icon mb-3">
                            <img src="img/Army-Symbol-Airborne-Infantry-1--Streamline-Ultimate.png" alt="Case Icon" width="50">
                        </div>
                        <h5 class="card-title">Email</h5>
                        <p>Creditcar@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center p-3">
    <div class="d-flex justify-content-center align-items-center">
    <p>&copy; Company Name. All rights reserved.</p>
    </div>
    </footer>

    <!-- Script Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>