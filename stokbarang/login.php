<?php
require 'function.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cekdatabase = mysqli_query($conn, "SELECT * FROM login where email='$email' and password='$password'");
    $hitung = mysqli_num_rows($cekdatabase);

    if($hitung>0){
        $_SESSION['log'] = 'True';
        header('location:index.php');
    } else {
        
    echo '<script> alert("email atau password anda salah!");
    window.location.href="index.php";
    </script>';
     
    };
};
if(!isset($_SESSION['log'])){

} else{
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Motor Online</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">                
                <a class="navbar-brand" href="#!">Motor HDC</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container"><div id="home" class="slider">
         <div id="main_slider" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#main_slider" data-slide-to="0" class="active"></li>
               <li data-target="#main_slider" data-slide-to="1"></li>
               <li data-target="#main_slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img class="d-block w-100" src="images/416233bc769c8337d6aa2a6972371bfe.jpg" style="width:720px;height:500px;" alt="slider_img">
               </div>
               <div class="carousel-item">
                  <img class="d-block w-100" src="images/0724fb39673e5c3eab6a97d0e4c3ad1b.jpg" style="width:720px;height:500px;" alt="slider_img">
               </div>
			    <div class="carousel-item">
                  <img class="d-block w-100" src="images/edaeef77881dfe60d6516a9c66285421.jpg" style="width:720px;height:500px;" alt="slider_img">
               </div>
            </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
            <img src="images/kanan.png" style="width:100px;height:50px;" alt="#" />
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
            <img src="images/kiri.png" style="width:100px;height:50px;" alt="#" />
            </a>
            </div>
                </div>
                <header class="py-5 bg-light border-bottom mb-4">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Welcome to Motor HDC!</h1>
                    <p class="lead mb-0">Temukan Motor yang tepat untuk anda!Berbagai pilihan motor dengan 
                        tekonologi dan desain yang menarik untuk kebutuhan Anda.Melesat dengan Kecepatan dan Presisi Akurat.HDC Indonesia Motor menghadirkan livery terbaru dari Suzuki GSX-R 150, MotoGP 2020 Limited Edition.
                        Didukung dengan fitur terbaru Lamp Ring, Lampu Hazard, dan New LCD Speedometer Backlight, membuat perhatian semua orang terpusat padamu.</p>
                    
                    <br>
                    <p class="lead mb-0"> Temukan</p>
                    <h1 class="fw-bolder">MOTOR</h1>
                    <p class="lead mb-0"> yang tepat untuk anda</p>
                    
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
                        <a href="#!"><img  class="card-img-top" src="images/0681ed0703182e17171da0f46006e419.jpg" style="width:720px;height:500px;" alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted">July 25, 2021</div>
                            <h2 class="card-title">Vespa Matic</h2>
                            <p class="card-text">Skuter legendaris asal negeri Italia kembali menggoyang pasar otomotif nasional dengan motor barunya yang bertajuk Vespa Sprint 150.
Motor klasik yang sudah melegenda dan cukup nge-trend di era tahun 80-an tersebut akhirnya resmi diperkenalkan oleh PT Piaggio Indonesia dari Italia pada 25 Mei 2016 lalu di Gandaria City, Jakarta Selatan.
Bahkan, sejak saat itu pula, Vespa Sprint 150 tersebut sudah bisa mulai dipesan oleh konsumen. Di sisi lain, kehadirannya dipastikan akan menjadi pesaing berat bagi para produsen motor lain yang sempat mendominasi pasar otomotif kendaraan roda dua di Indonesia.</p>
                            <a class="btn btn-primary" href="#!">Read more →</a>
                        </div>
                    </div>
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="images/0724fb39673e5c3eab6a97d0e4c3ad1b.jpg" style="width:350px;height:250px;" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">July 25, 2021</div>
                                    <h2 class="card-title h4">H2R</h2>
                                    <p class="card-text">Kawasaki Ninja H2R yang merupakan motor super sport varian Ninja tertinggi buatan Kawasaki khusus untuk keperluan balap di sirkuit saja (Race Only).
Produk terbaru dari Kawasaki tersebut dikenalkan pada ajang pameran otomotif internasional di Milan, Italia yakni EICMA pada bulan November 2014 lalu.
Di mana Kawasaki Motor Corporation mengenalkan 2 produk terbaru mereka sekaligus yaitu Kawasaki Ninja H2R (versi sirkuit) dan Kawasaki Ninja H2 (versi jalanan) yang merupakan motor super sport kelas 1000 cc andalan mereka.
Sedangkan untuk peluncuran Kawasaki Ninja H2R secara resmi ini dilaksanakan pada bulan Desember 2014 lalu.</p>
                                    <a class="btn btn-primary" href="#!">Read more →</a>
                                </div>
                            </div>
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="images/416233bc769c8337d6aa2a6972371bfe.jpg" style="width:340px;height:250px;" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">July 25, 2021</div>
                                    <h2 class="card-title h4">Supra Bapak</h2>
                                    <p class="card-text">Motor ini pernah eksis pada tahun 90an dan tahun 2000an. Motor ini merupakan motor sejuta umat dari anak SMA sampai kakek - kakek banyak yang memakai motor ini. Honda Supra X 110 cc diproduksi dari tahun 1997 - 2005 dan sampai sekarang harganya pun masih sangat stabil. Dari rem depan yang masih pakek tromol sampai yang sudah pakai cakram.</p>
                                    <a class="btn btn-primary" href="#!">Read more →</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="images/edaeef77881dfe60d6516a9c66285421.jpg" style="width:340px;height:250px;" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">July 25, 2021</div>
                                    <h2 class="card-title h4">Mio soul</h2>
                                    <p class="card-text">Tampilan Mio Soul seperti Mio versi Thailand di samping, yang berbeda hanyalah warna & body striping. Mio Soul dilengkapi rem cakram depan serta memakai velg racing. Pada tanggal 16 Juni 2008, Yamaha Mio Sporty dan Yamaha Mio Soul melakukan facelift pada bagian striping, lampu sein, model hampir mirip seperti sebelumnya dan dijuluki Mio Smile.</p>
                                    <a class="btn btn-primary" href="#!">Read more →</a>
                                </div>
                            </div>
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="images/f029ed541deed04d5c772325b5f372f6.jpg" style="width:340px;height:250px;" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">July 25, 2021</div>
                                    <h2 class="card-title h4">Vario</h2>
                                    <p class="card-text">Honda Vario 125 2021 ini memiliki panjang 1.919 mm, lebar 679 mm, dan tinggi 1.062 mm. Tinggi tempat duduknya mencapai 769 mm dan jarak terendah ke tanah hanya 132 mm. Skutik ini memiliki bobot hingga 111 kg.
Di bagian kaki-kaki, Honda Vario 125 2021 masih tetap dibekali suspensi depan teleskopik dan sokbreker tunggal di bagian belakang.</p>
                                    <a class="btn btn-primary" href="#!">Read more →</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination-->
                    <nav aria-label="Pagination">
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4">
                            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                            <li class="page-item"><a class="page-link" href="#!">2</a></li>
                            <li class="page-item"><a class="page-link" href="#!">3</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                            <li class="page-item"><a class="page-link" href="#!">15</a></li>
                            <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                        </ul>
                    </nav>
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
                                        <li><a href="#!">Motor Bebek</a></li>
                                        <li><a href="#!">Motor Sport</a></li>
                                        <li><a href="#!">Motor Matic</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">Vestic</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Peraturan</div>
                        <div class="card-body">Untuk cicilan seumur hidup mending kelaut!</div>
                        </div>
                        
                        <div class="card mb-4">
                        <div class="card-header">Contact Form</div>
                        <form method="post" name="contact" action="#">
                        <label for="fullname">Name:</label>
                        <input name="fullname" type="text" class="required input_field"
                        id="fullname" maxlength="40" />
                        <div class="cleaner h10"></div>
                        <label for="email">Email:</label>
                        <input name="email" type="text" class="validate-email required
                        input_field" id="email" maxlength="40" />
                        <div class="cleaner h10"></div>
                        <label for="subject">Subject:</label>
                        <input name="subject" type="text" class="validate-subject
                        required input_field" id="subject" maxlength="60"/>
                        <div class="cleaner h10"></div>
                        <label for="message">Message:</label>
                        <textarea id="message" name="message" rows="0" cols="0"
                        class="required"></textarea>
                        <div class="cleaner h10"></div>
                        <input type="submit" value="Send" id="submit" name="submit"
                        class="submit_btn float_l" />
                        <input type="reset" value="Reset" id="reset" name="reset"
                        class="submit_btn float_r" />
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; https://startbootstrap.com/</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        
    </body>
</html>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Jersey printing</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method ="post">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" name="email" id="inputEmailAddress" type="email" placeholder="Enter email address" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Enter password" />
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" name= "login" >Login</buttonn>
                                            </div>
                                        </form>
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; 19.240.0130</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
