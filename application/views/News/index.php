<!DOCTYPE html>
<html lang="zxx">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sudana Bejo</title>
    <!-- plugin css for this page -->
    <link
      rel="stylesheet"
      href="<?php echo base_url('assets/news_assets/') ?>assets/vendors/mdi/css/materialdesignicons.min.css"
    />
    <link rel="stylesheet" href="<?php echo base_url('assets/news_assets/') ?>assets/vendors/aos/dist/aos.css/aos.css" />

    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/news_assets/') ?>assets/images/favicon.png" />

    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/news_assets/') ?>assets/css/style.css">
    <!-- endinject -->
  </head>

  <body>
    <div class="container-scroller">
      <div class="main-panel">
        <!-- partial:partials/_navbar.html -->
        <header id="header">
          <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
              <div class="navbar-top">
                <div class="d-flex justify-content-between align-items-center">
                  <ul class="navbar-top-left-menu">
                    <li class="nav-item">
                      <a href="#" class="nav-link">Tentang Kami</a>
                    </li>
                    <!-- <li class="nav-item">
                      <a href="pages/aboutus.html" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Events</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Write for Us</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">In the Press</a>
                    </li> -->
                  </ul>
                  <ul class="navbar-top-right-menu">
                    <li class="nav-item">
                      <a href="#" class="nav-link"><i class="mdi mdi-magnify"></i></a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Masuk</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">Daftar</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="navbar-bottom">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <a class="navbar-brand" href="#">
                      <strong style="color: white">SUDANA BEJO</strong>
                      <!-- <img src="<?php echo base_url('assets/news_assets/') ?>assets/images/logo.svg" alt="" />-->
                  </a>
                  </div>
                  <div>
                    <button
                      class="navbar-toggler"
                      type="button"
                      data-target="#navbarSupportedContent"
                      aria-controls="navbarSupportedContent"
                      aria-expanded="false"
                      aria-label="Toggle navigation"
                    >
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div
                      class="navbar-collapse justify-content-center collapse"
                      id="navbarSupportedContent"
                    >
                      <ul
                        class="navbar-nav d-lg-flex justify-content-between align-items-center"
                      >
                        <li>
                          <button class="navbar-close">
                            <i class="mdi mdi-close"></i>
                          </button>
                        </li>
                        <li class="nav-item active">
                          <a class="nav-link" href="#">Beranda</a>
                        </li>

                        <?php foreach($header_categories as $hc){ ?>
                        <li class="nav-item">
                          <a class="nav-link" href="#"><?php echo $hc->name ?></a>
                        </li>
                        <?php } ?>

                        <li class="nav-item">
                          <a class="nav-link" href="#">Kontak</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <ul class="social-media">
                    <li>
                      <a href="#">
                        <i class="mdi mdi-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="mdi mdi-youtube"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="mdi mdi-twitter"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
          </div>
        </header>

        <!-- partial -->
        <!-- <div class="flash-news-banner">
          <div class="container">
            <div class="d-lg-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center">
                <span class="badge badge-dark mr-3">Populer</span>
                <p class="mb-0">
                  Lorem Ipsum has been the industry's standard dummy text ever
                  since the 1500s.
                </p>
              </div>
              <div class="d-flex">
                <span class="mr-3 text-danger">Wed, March 4, 2020</span>
                <span class="text-danger">30°C,London</span>
              </div>
            </div>
          </div>
        </div> -->

        <div class="content-wrapper">
          <div class="container">
            <div class="row" data-aos="fade-up">

              <div class="col-xl-8 stretch-card grid-margin">
                <div class="position-relative">
                  <img
                    src="<?php echo base_url('assets/images/news/'.$headline[0]->photo_name) ?>"
                    alt="banner"
                    class="img-fluid"
                  />
                  <div class="banner-content">
                    <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                    <?php echo $headline[0]->category_name ?>
                    </div>
                    <h1 class="mb-0"><?php echo substr($headline[0]->title, 0, 65)."..." ?></h1>
                    <!-- <h1 class="mb-2">
                    
                    </h1> -->
                    <div class="fs-12">
                      <span class="mr-2">10 Minutes ago</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-4 stretch-card grid-margin">
                <div class="card bg-dark text-white">
                  <div class="card-body">
                    <h2>Berita terbaru</h2>

                    <?php foreach($latest_news as $ln){ ?>

                    <div class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between">
                      <div class="pr-3">
                        <h5><?php echo $ln->title ?></h5>
                        <div class="fs-12">
                          <span class="mr-2">10 Minutes ago</span>
                        </div>
                      </div>
                      <div class="rotate-img">
                        <!-- <img src="<?php echo base_url('assets/images/news/'.$ln->photo_news) ?>" alt="thumb" class="img-fluid img-sm"/> -->
                      </div>
                    </div>

                    <?php } ?>

                    
                  </div>
                </div>
              </div>
            </div>
            <div class="row" data-aos="fade-up">
              <div class="col-lg-3 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h2>Kategori</h2>
                    <ul class="vertical-menu">
                      <?php foreach($all_categories as $ac){ ?>
                      <li><a href="#"><?php echo $ac->name ?></a></li>
                      <?php } ?>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-9 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">

                  <?php foreach($popular as $p){ ?>

                    <div class="row">
                      <div class="col-sm-4 grid-margin">
                        <div class="position-relative">
                          <div class="rotate-img">
                            <img
                              src="<?php echo base_url('assets/images/news/'.$p->photo_name) ?>"
                              alt="thumb"
                              class="img-fluid"
                            />
                          </div>
                          <div class="badge-positioned">
                            <span class="badge badge-danger font-weight-bold"
                              >Populer</span
                            >
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-8  grid-margin">
                        <h2 class="mb-2 font-weight-600">
                          <?php echo $p->title ?>
                        </h2>
                        <div class="fs-13 mb-2">
                          <span class="mr-2">10 Minutes ago</span>
                        </div>
                        <p class="mb-0">
                        <?php echo substr($p->content, 0, 200)."..."?>
                        </p>
                      </div>
                    </div>

                    <?php } ?>

                  </div>
                </div>
              </div>
            </div>
            <div class="row" data-aos="fade-up">
              <div class="col-sm-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-8">
                        <div class="card-title">
                          Rekomendasi
                        </div>

                        <div class="row">

                          <div class="col-sm-6 grid-margin">
                            <div class="position-relative">
                              <div class="rotate-img">
                                <img
                                  src="<?php echo base_url('assets/images/news/'.$recommendation[0]->photo_name) ?>"
                                  alt="thumb"
                                  class="img-fluid"
                                />
                              </div>
                              <div class="badge-positioned w-90">
                                <div
                                  class="d-flex justify-content-between align-items-center"
                                >
                                  <span
                                    class="badge badge-danger font-weight-bold"
                                    ><?php echo $recommendation[0]->category_name ?></span
                                  >
                                  <div class="video-icon">
                                    <i class="mdi mdi-play"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-sm-6 grid-margin">
                            <div class="position-relative">
                              <div class="rotate-img">
                                <img
                                  src="<?php echo base_url('assets/images/news/'.$recommendation[1]->photo_name) ?>"
                                  alt="thumb"
                                  class="img-fluid"
                                />
                              </div>
                              <div class="badge-positioned w-90">
                                <div
                                  class="d-flex justify-content-between align-items-center"
                                >
                                  <span
                                    class="badge badge-danger font-weight-bold"
                                    ><?php echo $recommendation[1]->category_name ?></span
                                  >
                                  <div class="video-icon">
                                    <i class="mdi mdi-play"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6 grid-margin">
                            <div class="position-relative">
                              <div class="rotate-img">
                                <img
                                  src="<?php echo base_url('assets/images/news/'.$recommendation[2]->photo_name) ?>"
                                  alt="thumb"
                                  class="img-fluid"
                                />
                              </div>
                              <div class="badge-positioned w-90">
                                <div
                                  class="d-flex justify-content-between align-items-center"
                                >
                                  <span
                                    class="badge badge-danger font-weight-bold"
                                    ><?php echo $recommendation[2]->category_name ?></span
                                  >
                                  <div class="video-icon">
                                    <i class="mdi mdi-play"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-sm-6 grid-margin">
                            <div class="position-relative">
                              <div class="rotate-img">
                                <img
                                  src="<?php echo base_url('assets/images/news/'.$recommendation[3]->photo_name) ?>"
                                  alt="thumb"
                                  class="img-fluid"
                                />
                              </div>
                              <div class="badge-positioned w-90">
                                <div
                                  class="d-flex justify-content-between align-items-center"
                                >
                                  <span
                                    class="badge badge-danger font-weight-bold"
                                    ><?php echo $recommendation[3]->category_name ?></span
                                  >
                                  <div class="video-icon">
                                    <i class="mdi mdi-play"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div
                          class="d-flex justify-content-between align-items-center"
                        >
                          <div class="card-title">
                            
                          </div>
                          <p class="mb-3">See all</p>
                        </div>
                        <div
                          class="d-flex justify-content-between align-items-center border-bottom pb-2"
                        >
                          <div class="div-w-80 mr-3">
                            <div class="rotate-img">
                              <img
                                src="<?php echo base_url('assets/images/news/'.$recommendation[4]->photo_name) ?>"
                                alt="thumb"
                                class="img-fluid"
                              />
                            </div>
                          </div>
                          <h3 class="font-weight-600 mb-0">
                          <?php echo $recommendation[4]->title ?>
                          </h3>
                        </div>
                        <div
                          class="d-flex justify-content-between align-items-center border-bottom pt-3 pb-2"
                        >
                          <div class="div-w-80 mr-3">
                            <div class="rotate-img">
                              <img
                                src="<?php echo base_url('assets/images/news/'.$recommendation[5]->photo_name) ?>"
                                alt="thumb"
                                class="img-fluid"
                              />
                            </div>
                          </div>
                          <h3 class="font-weight-600 mb-0">
                          <?php echo $recommendation[5]->title ?>
                          </h3>
                        </div>
                        <div
                          class="d-flex justify-content-between align-items-center border-bottom pt-3 pb-2"
                        >
                          <div class="div-w-80 mr-3">
                            <div class="rotate-img">
                              <img
                                src="<?php echo base_url('assets/images/news/'.$recommendation[6]->photo_name) ?>"
                                alt="thumb"
                                class="img-fluid"
                              />
                            </div>
                          </div>
                          <h3 class="font-weight-600 mb-0">
                          <?php echo $recommendation[6]->title ?>
                          </h3>
                        </div>
                        <div
                          class="d-flex justify-content-between align-items-center border-bottom pt-3 pb-2"
                        >
                          <div class="div-w-80 mr-3">
                            <div class="rotate-img">
                              <img
                                src="<?php echo base_url('assets/images/news/'.$recommendation[7]->photo_name) ?>"
                                alt="thumb"
                                class="img-fluid"
                              />
                            </div>
                          </div>
                          <h3 class="font-weight-600">
                          <?php echo $recommendation[7]->title ?>
                          </h3>
                        </div>
                        <div
                          class="d-flex justify-content-between align-items-center pt-3"
                        >
                          <div class="div-w-80 mr-3">
                            <div class="rotate-img">
                              <img
                                src="<?php echo base_url('assets/images/news/'.$recommendation[8]->photo_name) ?>"
                                alt="thumb"
                                class="img-fluid"
                              />
                            </div>
                          </div>
                          <h3 class="font-weight-600 mb-0">
                          <?php echo $recommendation[8]->title ?>
                          </h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row" data-aos="fade-up">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-xl-6">
                        <div class="card-title">
                          Pilihan kami
                        </div>
                        <div class="row">
                          <div class="col-xl-6 col-lg-8 col-sm-6">
                            <div class="rotate-img">
                              <img
                                src="<?php echo base_url('assets/images/news/'.$our_choice[0]->photo_name) ?>"
                                alt="thumb"
                                class="img-fluid"
                              />
                            </div>
                            <h2 class="mt-3 text-primary mb-2">
                            <?php echo substr($our_choice[0]->title, 0, 20)."..."?>
                            </h2>
                            <p class="fs-13 mb-1 text-muted">
                              <span class="mr-2">10 Minutes ago</span>
                            </p>
                            <p class="my-3 fs-15">
                            <?php echo substr($our_choice[0]->content, 0, 40)."..."?>
                            </p>
                            <a href="#" class="font-weight-600 fs-16 text-dark"
                              >Baca selengkapnya</a
                            >
                          </div>
                          <div class="col-xl-6 col-lg-4 col-sm-6">
                            <div class="border-bottom pb-3 mb-3">
                              <h3 class="font-weight-600 mb-0">
                              <?php echo substr($our_choice[1]->title, 0, 20)."..."?>
                              </h3>
                              <p class="fs-13 text-muted mb-0">
                                <span class="mr-2">10 Minutes ago</span>
                              </p>
                              <p class="mb-0">
                                <?php echo substr($our_choice[1]->content, 0, 30)."..."?>
                              </p>
                            </div>
                            <div class="border-bottom pb-3 mb-3">
                              <h3 class="font-weight-600 mb-0">
                              <?php echo substr($our_choice[2]->title, 0, 20)."..."?>
                              </h3>
                              <p class="fs-13 text-muted mb-0">
                                <span class="mr-2">10 Minutes ago</span>
                              </p>
                              <p class="mb-0">
                                <?php echo substr($our_choice[2]->content, 0, 30)."..."?>
                              </p>
                            </div>
                            <div class="border-bottom pb-3 mb-3">
                              <h3 class="font-weight-600 mb-0">
                              <?php echo substr($our_choice[3]->title, 0, 20)."..."?>
                              </h3>
                              <p class="fs-13 text-muted mb-0">
                                <span class="mr-2">10 Minutes ago</span>
                              </p>
                              <p class="mb-0">
                                <?php echo substr($our_choice[3]->content, 0, 30)."..."?>
                              </p>
                            </div>
                            <div>
                              <h3 class="font-weight-600 mb-0">
                              <?php echo substr($our_choice[4]->title, 0, 20)."..."?>
                              </h3>
                              <p class="fs-13 text-muted mb-0">
                                <span class="mr-2">10 Minutes ago</span>
                              </p>
                              <p class="mb-0">
                                <?php echo substr($our_choice[4]->content, 0, 30)."..."?>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-6">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="card-title">
                              
                            </div>
                            <div class="border-bottom pb-3">
                              <div class="rotate-img">
                                <img
                                  src="<?php echo base_url('assets/images/news/'.$our_choice[5]->photo_name) ?>"
                                  alt="thumb"
                                  class="img-fluid"
                                />
                              </div>
                              <p class="fs-16 font-weight-600 mb-0 mt-3">
                              <?php echo substr($our_choice[5]->title, 0, 20)."..."?>
                              </p>
                              <p class="fs-13 text-muted mb-0">
                                <span class="mr-2">10 Minutes ago</span>
                              </p>
                            </div>
                            <div class="pt-3 pb-3">
                              <div class="rotate-img">
                                <img
                                  src="<?php echo base_url('assets/images/news/'.$our_choice[6]->photo_name) ?>"
                                  alt="thumb"
                                  class="img-fluid"
                                />
                              </div>
                              <p class="fs-16 font-weight-600 mb-0 mt-3">
                              <?php echo substr($our_choice[6]->title, 0, 20)."..."?>
                              </p>
                              <p class="fs-13 text-muted mb-0">
                                <span class="mr-2">10 Minutes ago</span>
                              </p>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="card-title">
                              
                            </div>
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="border-bottom pb-3">
                                  <div class="row">
                                    <div class="col-sm-5 pr-2">
                                      <div class="rotate-img">
                                        <img
                                          src="<?php echo base_url('assets/images/news/'.$our_choice[7]->photo_name) ?>"
                                          alt="thumb"
                                          class="img-fluid w-100"
                                        />
                                      </div>
                                    </div>
                                    <div class="col-sm-7 pl-2">
                                      <p class="fs-16 font-weight-600 mb-0">
                                      <?php echo substr($our_choice[7]->title, 0, 20)."..."?>
                                      </p>
                                      <p class="fs-13 text-muted mb-0">
                                        <span class="mr-2">10
                                        Minutes ago</span>
                                      </p>
                                      <p class="mb-0 fs-13">
                                        Lorem Ipsum has been
                                      </p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="border-bottom pb-3 pt-3">
                                  <div class="row">
                                    <div class="col-sm-5 pr-2">
                                      <div class="rotate-img">
                                        <img
                                          src="<?php echo base_url('assets/images/news/'.$our_choice[8]->photo_name) ?>"
                                          alt="thumb"
                                          class="img-fluid w-100"
                                        />
                                      </div>
                                    </div>
                                    <div class="col-sm-7 pl-2">
                                      <p class="fs-16 font-weight-600 mb-0">
                                        <?php echo substr($our_choice[8]->title, 0, 20)."..."?>
                                      </p>
                                      <p class="fs-13 text-muted mb-0">
                                        <span class="mr-2">10
                                        Minutes ago</span>
                                      </p>
                                      <p class="mb-0 fs-13">
                                        Lorem Ipsum has been
                                      </p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="border-bottom pb-3 pt-3">
                                  <div class="row">
                                    <div class="col-sm-5 pr-2">
                                      <div class="rotate-img">
                                        <img
                                          src="<?php echo base_url('assets/images/news/'.$our_choice[9]->photo_name) ?>"
                                          alt="thumb"
                                          class="img-fluid w-100"
                                        />
                                      </div>
                                    </div>
                                    <div class="col-sm-7 pl-2">
                                      <p class="fs-16 font-weight-600 mb-0">
                                        <?php echo substr($our_choice[9]->title, 0, 20)."..."?>
                                      </p>
                                      <p class="fs-13 text-muted mb-0">
                                        <span class="mr-2">10
                                        Minutes ago</span>
                                      </p>
                                      <p class="mb-0 fs-13">
                                        Lorem Ipsum has been
                                      </p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="pt-3">
                                  <div class="row">
                                    <div class="col-sm-5 pr-2">
                                      <div class="rotate-img">
                                        <img
                                          src="<?php echo base_url('assets/images/news/'.$our_choice[10]->photo_name) ?>"
                                          alt="thumb"
                                          class="img-fluid w-100"
                                        />
                                      </div>
                                    </div>
                                    <div class="col-sm-7 pl-2">
                                      <p class="fs-16 font-weight-600 mb-0">
                                        <?php echo substr($our_choice[10]->title, 0, 20)."..."?>
                                      </p>
                                      <p class="fs-13 text-muted mb-0">
                                        <span class="mr-2">10
                                        Minutes ago</span>
                                      </p>
                                      <p class="mb-0 fs-13">
                                        Lorem Ipsum has been
                                      </p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- main-panel ends -->
        <!-- container-scroller ends -->

        <!-- partial:partials/_footer.html -->
        <footer>
          <div class="footer-top">
            <div class="container">
              <div class="row">
                <div class="col-sm-5">
                  <strong>SUDANA BEJO</strong>
                  <!-- <img src="<?php echo base_url('assets/images/news/') ?>assets/images/logo.svg" class="footer-logo" alt="" /> -->
                  <h5 class="font-weight-normal mt-4 mb-5">
                    Website official Sudana Bejo 
                  </h5>
                  <ul class="social-media mb-3">
                    <li>
                      <a href="#">
                        <i class="mdi mdi-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="mdi mdi-youtube"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="mdi mdi-twitter"></i>
                      </a>
                    </li>
                  </ul>
                </div>

                <!-- <div class="col-sm-4">
                  <h3 class="font-weight-bold mb-3">RECENT POSTS</h3>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="footer-border-bottom pb-2">
                        <div class="row">
                          <div class="col-3">
                            <img
                              src="<?php echo base_url('assets/images/news/') ?>
                              alt="thumb"
                              class="img-fluid"
                            />
                          </div>
                          <div class="col-9">
                            <h5 class="font-weight-600">
                              Cotton import from USA to soar was American traders
                              predict
                            </h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="footer-border-bottom pb-2 pt-2">
                        <div class="row">
                          <div class="col-3">
                            <img
                              src="<?php echo base_url('assets/images/news/') ?>
                              alt="thumb"
                              class="img-fluid"
                            />
                          </div>
                          <div class="col-9">
                            <h5 class="font-weight-600">
                              Cotton import from USA to soar was American traders
                              predict
                            </h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div>
                        <div class="row">
                          <div class="col-3">
                            <img
                              src="<?php echo base_url('assets/images/news/') ?>
                              alt="thumb"
                              class="img-fluid"
                            />
                          </div>
                          <div class="col-9">
                            <h5 class="font-weight-600 mb-3">
                              Cotton import from USA to soar was American traders
                              predict
                            </h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> 

                <div class="col-sm-3">
                  <h3 class="font-weight-bold mb-3">CATEGORIES</h3>
                  <div class="footer-border-bottom pb-2">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="mb-0 font-weight-600">Magazine</h5>
                      <div class="count">1</div>
                    </div>
                  </div>
                  <div class="footer-border-bottom pb-2 pt-2">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="mb-0 font-weight-600">Business</h5>
                      <div class="count">1</div>
                    </div>
                  </div>
                  <div class="footer-border-bottom pb-2 pt-2">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="mb-0 font-weight-600">Sports</h5>
                      <div class="count">1</div>
                    </div>
                  </div>
                  <div class="footer-border-bottom pb-2 pt-2">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="mb-0 font-weight-600">Arts</h5>
                      <div class="count">1</div>
                    </div>
                  </div>
                  <div class="pt-2">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="mb-0 font-weight-600">Politics</h5>
                      <div class="count">1</div>
                    </div>
                  </div>
                </div> -->
              </div>
            </div>
          </div>
          <div class="footer-bottom">
            <div class="container">
              <div class="row">
                <div class="col-sm-12">
                  <div class="d-sm-flex justify-content-between align-items-center">
                    <div class="fs-14 font-weight-600">
                      © 2021 @ <a href="https://sudanabejo.com" target="_blank" class="text-white"> Sudana Bejo</a>. All rights reserved.
                    </div>
                    <div class="fs-14 font-weight-600">
                      Powered by <a href="https://www.franweb.my.id" target="_blank" class="text-white">Fran Web</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </footer>

        <!-- partial -->
      </div>
    </div>
    <!-- inject:js -->
    <script src="<?php echo base_url('assets/news_assets/') ?>assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="<?php echo base_url('assets/news_assets/') ?>assets/vendors/aos/dist/aos.js/aos.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="<?php echo base_url('assets/news_assets/') ?>assets/js/demo.js"></script>
    <script src="<?php echo base_url('assets/news_assets/') ?>assets/js/jquery.easeScroll.js"></script>
    <!-- End custom js for this page-->
  </body>
</html>
