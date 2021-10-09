<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Freelancer - Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="<?= base_url(); ?>assets/fontawesome-5.15.2/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="<?= base_url(); ?>assets/font/montserrat.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/font/italic.css" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= base_url(); ?>assets/css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Lapor</a>
            <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#home">Home</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#service">Alur</a></li>
                    <?php if ($this->session->userdata('nik')) : ?>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#form">Form</a></li>
                    <?php else : ?>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">Login</a></li>
                    <?php endif; ?>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">History</a></li>
                    <?php if ($this->session->userdata('username')) : ?>
                        <div class="dropdown">
                            <button class="nav-link py-3 px-0 px-lg-3 rounded btn btn-outline-success text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= $this->session->userdata('username'); ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="<?= site_url('login/logout') ?>" onclick="return confirm('Yakin keluar dari halaman ini?')">Logout</a>
                            </div>
                        </div>
                    <?php else : ?>
                        <!-- <a class="nav-link py-3 px-0 px-lg-3 rounded btn btn-outline-success text-white" href="<?= site_url('login'); ?>">Login</a> -->
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead bg-primary text-white text-center" id="home">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image-->
            <img class="masthead-avatar mb-5" src="<?= base_url(); ?>assets/img/avataaars.svg" alt="" />
            <!-- Masthead Heading-->
            <h1 class="masthead-heading text-uppercase mb-0">Mari Laporkan</h1>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-leaf"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Masthead Subheading-->
            <p class="masthead-subheading font-weight-light mb-0">Aplikasi Pengaduan dan Pelayanan Masyarakat
        </div>
    </header>
    <!-- Services-->
    <section class="page-section service" id="service">
        <div class="container">
            <!-- Services Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary">Service</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="row">
                <!-- Service Section Content 1-->
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-gem text-secondary mb-4"></i>
                        <h3 class="h4 mb-2">Sturdy Themes</h3>
                        <hr>
                        <p class="text-muted mb-0 lead">Our themes are updated regularly to keep them bug free!</p>
                    </div>
                </div>
                <!-- Service Section Content 2-->
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-laptop-code text-secondary mb-4"></i>
                        <h3 class="h4 mb-2">Up to Date</h3>
                        <hr>
                        <p class="text-muted mb-0 lead">All dependencies are kept current to keep things fresh.</p>
                    </div>
                </div>
                <!-- Service Section Content 3-->
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-globe text-secondary mb-4"></i>
                        <h3 class="h4 mb-2">Ready to Publish</h3>
                        <hr>
                        <p class="text-muted mb-0 lead">You can use this design as is, or you can make changes!</p>
                    </div>
                </div>
                <!-- Service Section Content 4-->
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-heart text-secondary mb-4"></i>
                        <h3 class="h4 mb-2">Made with Love</h3>
                        <hr>
                        <p class="text-muted mb-0 lead">Is it really open source if it's not made with love?</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- pengkodisian untuk form laporan-->
    <?php if ($this->session->userdata('nik')) : ?>
        <!-- Login Section-->
        <section class="page-section bg-primary mb-0" id="form">
            <div class="container">
                <!-- Login Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">Form Pengaduan</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-leaf"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <?= $this->session->flashdata('msg'); ?>
                <div class="row">
                    <div class="col-lg-8 mx-auto bg-white" style="border-radius: 5px;">
                        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->
                        <form action="<?= site_url('index/report') ?>" id="contactForm" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Judul Laporan</label>
                                    <input class="form-control" id="judul" name="judul" type="text" placeholder="Judul Laporan" required="required" data-validation-required-message="Silahkan masukan judul laporan anda." />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Tanggal Laporan</label>
                                    <input class="form-control" id="tanggal" name="tanggal" type="date" placeholder="Masukan tanggal" required="required" data-validation-required-message="Silahkan masukan tanggal laporan." />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Isi Laporan</label>
                                    <textarea class="form-control" id="laporan" name="laporan" rows="5" placeholder="Masukan laporan" required="required" data-validation-required-message="Silahkan masukan laporan anda."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="mt-3">
                                <small class="text-danger">*silahkan masukan berkas pendukung, jika ada.</small>
                                <div class="form-group">
                                    <!-- <label for="exampleFormControlFile1">Example file input</label> -->
                                    <input type="file" class="form-control-file" id="upload" name="upload">
                                </div>
                            </div>
                            <br />
                            <div class="form-group">
                                <button class="btn btn-primary btn-xl" type="submit">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    <?php else : ?>
        <!-- About Section-->
        <section class="page-section bg-primary text-white mb-0" id="about">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">About</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col-lg-4 ml-auto">
                        <p class="lead">Freelancer is a free bootstrap theme created by Start Bootstrap. The download includes the complete source files including HTML, CSS, and JavaScript as well as optional SASS stylesheets for easy customization.</p>
                    </div>
                    <div class="col-lg-4 mr-auto">
                        <p class="lead">You can create your own custom avatar for the masthead, change the icon in the dividers, and add your email address to the contact form to make it fully functional!</p>
                    </div>
                </div>
                <!-- About Section Button-->
                <div class="text-center mt-4">
                    <a class="btn btn-xl btn-outline-light" href="<?= base_url('login'); ?>">
                        <i class="fas fa-download mr-2"></i>
                        Login
                    </a>
                    <a class="btn btn-xl btn-outline-light" href="<?= base_url('login/register'); ?>">
                        <i class="fas fa-user mr-2"></i>
                        Register
                    </a>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">History</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">
                <!-- Portfolio Item 1-->
                <!-- <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="<?= base_url(); ?>assets/img/portfolio/cabin.png" alt="" />
                    </div>
                </div> -->
                <!-- <?php foreach ($history as $his) : ?>
                    <div class="card" style="width: 18rem;">
                        <?php if ($his->pengaduan_foto == null) : ?>
                            <img src="<?= base_url('assets/img/default-image.png') ?>" class="card-img-top" alt="...">
                        <?php else : ?>
                            <img src="<?= base_url('assets/uploads/') . $his->pengaduan_foto; ?>" class="card-img-top" alt="...">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= $his->pengaduan_judul ?></h5>
                            <p class="card-text"><?= $his->pengaduan_isi ?></p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                <?php endforeach; ?> -->
                <div class="card-deck">
                    <?php foreach ($history as $his) : ?>
                        <div class="card">
                            <img src="<?= base_url('assets/uploads/') . $his->pengaduan_foto; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $his->pengaduan_judul; ?></h5>
                                <p class="card-text"><?= $his->pengaduan_isi; ?></p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Author : <strong><?= $his->masyarakat_nama; ?> </strong></small><br>
                                <small class="text-muted">Diupload : <?= date('d-m-Y', strtotime($his->pengaduan_tgl)); ?></small><br>
                                <small class="text-muted">Status :
                                    <?php if ($his->pengaduan_status == '0') : ?>
                                        <span class="badge badge-pill badge-secondary">Menunggu</span>
                                    <?php elseif ($his->pengaduan_status == 'Proses') : ?>
                                        <span class="badge badge-pill badge-info">Sedang diproses</span>
                                    <?php else : ?>
                                        <span class="badge badge-pill badge-success">Selesai</span>
                                    <?php endif; ?>
                                </small>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Location</h4>
                    <p class="lead mb-0">
                        2215 John Daniel Drive
                        <br />
                        Clark, MO 65243
                    </p>
                </div>
                <!-- Footer Social Icons-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Around the Web</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                </div>
                <!-- Footer About Text-->
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">About Freelancer</h4>
                    <p class="lead mb-0">
                        Freelance is a free to use, MIT licensed Bootstrap theme created by
                        <a href="http://startbootstrap.com">Start Bootstrap</a>
                        .
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright © Your Website 2020</small></div>
    </div>
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
    <div class="scroll-to-top d-lg-none position-fixed">
        <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
    </div>
    <!-- Portfolio Modals-->
    <!-- Portfolio Modal 1-->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title-->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="portfolioModal1Label">Log Cabin</h2>
                                <!-- Icon Divider-->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image-->
                                <img class="img-fluid rounded mb-5" src="<?= base_url(); ?>assets/img/portfolio/cabin.png" alt="" />
                                <!-- Portfolio Modal - Text-->
                                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                                <button class="btn btn-primary" data-dismiss="modal">
                                    <i class="fas fa-times fa-fw"></i>
                                    Close Window
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="<?= base_url(); ?>assets/js/jquery.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="<?= base_url(); ?>assets/mail/contact_me.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery.easing.min.js"></script>
    <!-- Contact form JS-->
    <script src="<?= base_url(); ?>assets/mail/jqBootstrapValidation.js"></script>
    <!-- <script src="<?= base_url(); ?>assets/mail/contact_me.js"></script> -->
    <!-- Core theme JS-->
    <script src="<?= base_url(); ?>assets/js/scripts.js"></script>
</body>

</html>