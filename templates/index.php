<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?=asset('assets-aqua/img/favicon.ico')?>" type="image/x-icon">
    <title>DSA System</title>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="<?=asset('assets-aqua/css/font-awesome.min.css')?>" media="all" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?=asset('assets-aqua/css/bootstrap.min.css')?>" media="all" />
    <!-- Slicknav CSS -->
    <link rel="stylesheet" type="text/css" href="<?=asset('assets-aqua/css/slicknav.min.css')?>">
    <!-- Owl carousel CSS -->
    <link rel="stylesheet" type="text/css" href="<?=asset('assets-aqua/css/owl.carousel.css')?>">
    <!-- Icofont CSS -->
    <link rel="stylesheet" type="text/css" href="<?=asset('assets-aqua/css/icofont.css')?>">
    <!-- Popup CSS -->
    <link rel="stylesheet" type="text/css" href="<?=asset('assets-aqua/css/magnific-popup.css')?>">
    <!-- Timeline CSS -->
    <link rel="stylesheet" type="text/css" href="<?=asset('assets-aqua/css/timeline.css')?>">
    <!-- Lightbox CSS -->
    <link rel="stylesheet" type="text/css" href="<?=asset('assets-aqua/css/lightbox.min.css')?>">
    <!-- Main style CSS -->
    <link rel="stylesheet" type="text/css" href="<?=asset('assets-aqua/css/style.css')?>" media="all" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" type="text/css" href="<?=asset('assets-aqua/css/responsive.css')?>" media="all" />

    <style>
    .cover-img {
        width: 300px;
        height: 200px;
        object-fit: contain;
    }
    </style>
</head>

<body>
    	<!-- Page loader -->
	<div id="preloader"></div>
	<!-- header area start -->
	<header class="header-area ptb-10 ">
		<div class="container">
			<div class="row sticky-top">
				<div class="col-md-7">
					<div class="header-left-content">
						<ul>
							<li><a href="#"><i class="fa fa-phone"></i>+6285349468896</a></li>
							<li><a href="#"><i class="fa fa-envelope"></i>admin@diagnosastresakademik.my.id</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-5">
					<div class="header-right-content">
						<ul>
							<li>
								<select>
									<option value="ID">ID</option>
								</select>
							</li>
							<!--  class="popup-show" -->
							<li><a href="<?=routeTo('auth/login')?>">Get Started</a>

							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</header><!-- header area end -->
	<!-- menu area start -->
	<div class="menubar sticky-top">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-5">
					<div class="logo">
						<a href="<?=routeTo('/')?>"><img src="<?=asset('assets-aqua/img/logo.png')?>" alt="logo"></a>
					</div>
				</div>
				<div class="col-md-9 col-sm-7">
					<div class="responsive-menu"></div>
					<div class="mainmenu">
						<ul id="primary-menu">
							<li class="active"><a href="<?=routeTo('/')?>">Home</a></li>
							<li><a href="#about">About Us</a></li>
							<li><a href="#shop">Profile</a>
								<ul>
									<li><a href="page.php?page=peneliti">Peneliti</a></li>
									<li><a href="page.php?page=tujuan">Tujuan Penelitian</a></li>
									<li><a href="page.php?page=abstrak">Abstrak</a></li>
								</ul>
							</li>

							<li><a href="#sa">Stres Akademik</a></li>
							<li><a href="#testimoni">Testimoni</a></li>

						</ul>
					</div>
				</div>
			</div>
		</div>
	</div><!-- menu area end -->
    <!-- hero area start -->
    <section class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="hero-area-slide">
                        <div class="hero-area-single-slide">
                            <h2>Diagnosa Stres Akademik</h2>
                            <p>Selamat Datang di layanan website DSA Sistem. <br>Daftar dan lihat hasil stres akademik
                                yang kamu alami.</p>
                            <a href="<?=routeTo('auth/login')?>" class="aquaponic-btn">Get Started</a>
                        </div>
                        <div class="hero-area-single-slide">
                            <h2>Stres Akademik</h2>
                            <p>Mahasiswa sering kali khawatir dengan masa depan mereka, tentunya mereka juga paham bahwa
                                hasil akademik sangat berdampak pada masa depan mereka. Mahasiswa sarjana juga tentunya
                                ingin mendapatkan gelar akademik pertama, besar harapan mereka untuk memiliki hasil
                                akademik yang baik.</p>
                            <a href="https://upt-lbk.unj.ac.id/blog/Stres%20Akademik" target="_blank"
                                class="aquaponic-btn">Learn More</a>
                        </div>
                        <div class="hero-area-single-slide">
                            <h2>Adaptasi</h2>
                            <p>Mahasiswa pada tahun pertama cenderung memiliki stres akademik yang paling besar
                                dibanding tahun selanjutnya, hal tersebut dikarenakan mereka perlu beradaptasi dengan
                                silabus di program studi mereka, pola belajar dan lingkungan belajar yang baru.</p>
                            <a href="https://upt-lbk.unj.ac.id/blog/Stres%20Akademik" target="_blank"
                                class="aquaponic-btn">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- hero area end -->
    <!-- about area start -->
    <section class="about-area ptb-100" id="about">
        <div class="container">
            <div class="row flexbox-center">
                <div class="col-lg-6">
                    <div class="about-area-slide">
                        <div class="about-area-single-slide">
                            <img src="<?=asset('assets-aqua/img/about-slide/slide-5.jpg')?>" alt="about-slide">
                        </div>
                        <div class="about-area-single-slide">
                            <img src="<?=asset('assets-aqua/img/about-slide/slide-2.jpg')?>" alt="about-slide">
                        </div>
                        <div class="about-area-single-slide">
                            <img src="<?=asset('assets-aqua/img/about-slide/slide-3.jpg')?>" alt="about-slide">
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-area-info">
                        <h2>Pendahuluan</h2>
                        <p>Mahasiswa umumnya memiliki tingkat stres sedang dikarenakan beban tugas yang berlebih, proyek
                            kelompok, harapan dan tekanan orang tua, pola perubahan belajar dll. Mahasiswa yang tidak
                            dapat mengelola stres dengan baik kemungkinan memiliki tekanan psikologis yang lebih besar
                            [1]. Stres akademik merupakan tekanan untuk mencapai kegiatan akademik yang lebih baik,
                            misalnya performa di dalam kelas, nilai ujian akhir, penyelesaian studi bahkan kehidupan
                            pasca kampus [2]
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- about area end -->
    <!-- tile gallery area start -->


    <!-- choose us area start -->
    <section class="choose-us" id="sa">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sec-title">
                        <h2>STRESS AKADEMIK</h2>
                    </div>
                    <p class="text-center">Mahasiswa umumnya memiliki tingkat stres sedang dikarenakan beban tugas yang
                        berlebih, proyek kelompok, harapan dan tekanan orang tua, pola perubahan belajar dll. Mahasiswa
                        yang tidak dapat mengelola stres dengan baik kemungkinan memiliki tekanan psikologis yang lebih
                        besar [1]. Stres akademik merupakan tekanan untuk mencapai kegiatan akademik yang lebih baik,
                        misalnya performa di dalam kelas, nilai ujian akhir, penyelesaian studi bahkan kehidupan pasca
                        kampus [2]. Apa sih penyebab stres akademik?
                    </p>

                </div>
            </div>
        </div>
    </section>
    <section class="our-foods pb-75">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="our-foods-list flexbox-center">
                        <div class="our-foods-icon">
                            <i class="icofont icofont-address-book"></i>
                        </div>
                        <div class="our-foods-info">
                            <p>Ekspektasi Tinggi terhadap Prestasi Akademik
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="our-foods-list flexbox-center">
                        <div class="our-foods-icon">
                            <i class="icofont icofont-address-book"></i>
                        </div>
                        <div class="our-foods-info">
                            <p>Beban Akademik yang Tinggi
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="our-foods-list flexbox-center">
                        <div class="our-foods-icon">
                            <i class="icofont icofont-address-book"></i>
                        </div>
                        <div class="our-foods-info">
                            <p>Kurangnya Kualitas Jaringan Persahabatan
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- choose us area end -->

    <!-- testimonial area start -->
    <section class="testimonial-area ptb-90" id="testimoni">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sec-title">
                        <h2>Testimoni</h2>
                        <p>Kami selalu terbuka dengan masukan dan kritikan yang membangun untuk lebih baik lagi</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonial-slide">
                        <?php foreach($testimoni as $t): ?>
                        <div class="testimonial-single-slide">
                            <div class="testimonial-single-slide-img">
                                <img src="<?=asset('assets/img/user-placeholder.png')?>" alt="" />
                                <i class="fa fa-facebook"></i>
                            </div>
                            <div class="testimonial-single-slide-desc">
                                <p><?=nl2br($t->deskripsi)?></p>
                                <br>
                                <center>
                                    - <i><?=$t->name?></i> -
                                </center>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- testimonial area end -->
    <!-- blog area start -->
    <section class="blog-area ptb-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sec-title">
                        <h2>Blog</h2>
                        <p>Dapatkan informasi terbaru dan tips trik dari kami</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-slide">
                        
                    </div>
                </div>
            </div>
        </div>
    </section><!-- blog area end -->
    <!-- team member area start -->
    <section class="team-member ptb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sec-title">
                        <h2>Hubungi Kami</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="our-foods-list flexbox-center">
                        <div class="our-foods-icon">
                            <i class="icofont icofont-address-book"></i>
                        </div>
                        <div class="our-foods-info">
                            <p>Website
                                <br>
                                https://diagnosastresakademik.my.id
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="our-foods-list flexbox-center">
                        <div class="our-foods-icon">
                            <i class="icofont icofont-address-book"></i>
                        </div>
                        <div class="our-foods-info">
                            <p>Email
                                <br>
                                admin@diagnosastresakademik.my.id
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="our-foods-list flexbox-center">
                        <div class="our-foods-icon">
                            <i class="icofont icofont-address-book"></i>
                        </div>
                        <div class="our-foods-info">
                            <p>Whatsapp
                                <br>
                                +6285349468896
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-md-8 offset-md-2">
                <div class="row">

                </div>
            </div>
        </div>

    </section>

    <!-- footer area start -->
    <footer class="footer ptb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-5">
                    <div class="footer-copyright">
                        <p>Copyright <a href="#">DSA Sistem</a> - All Right Reserved</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-7">
                    <div class="footer-menu">
                        <ul>
                            <li><a href="#">Help</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- footer area end -->
    <!-- jquery main JS -->
    <script src="<?=asset('assets-aqua/js/jquery.min.js')?>"></script>
    <!-- Poppers JS -->
    <script src="<?=asset('assets-aqua/js/popper.min.js')?>"></script>
    <!-- Bootstrap JS -->
    <script src="<?=asset('assets-aqua/js/bootstrap.min.js')?>"></script>
    <!-- owl carousel JS -->
    <script src="<?=asset('assets-aqua/js/owl.carousel.min.js')?>"></script>
    <!-- Slicknav JS -->
    <script src="<?=asset('assets-aqua/js/jquery.slicknav.min.js')?>"></script>
    <!-- Circlechart JS -->
    <script src="<?=asset('assets-aqua/js/jquery.circlechart.js')?>"></script>
    <!-- Timeline JS -->
    <script src="<?=asset('assets-aqua/js/timeline.js')?>"></script>
    <!-- Popup JS -->
    <script src="<?=asset('assets-aqua/js/jquery.magnific-popup.min.js')?>"></script>
    <!-- Lightbox JS -->
    <script src="<?=asset('assets-aqua/js/lightbox.min.js')?>"></script>
    <!-- Zoom JS -->
    <script src="<?=asset('assets-aqua/js/jquery.imagezoom.js')?>"></script>
    <!-- main JS -->
    <script src="<?=asset('assets-aqua/js/main.js')?>"></script>
</body>

</html>