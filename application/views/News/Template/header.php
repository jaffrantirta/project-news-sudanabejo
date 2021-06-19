<!DOCTYPE html>
<html lang="zxx">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title><?php echo $header ?></title>
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
  <p hidden id="base_url" ><?php echo base_url() ?></p>
    <div class="container-scroller">
      <div class="main-panel">
        <!-- partial:partials/_navbar.html -->
        <header id="header">
          <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
              <div class="navbar-top">
                <div class="d-flex justify-content-between align-items-center">
                  
                  
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
                    <div class="navbar-collapse justify-content-center collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav d-lg-flex justify-content-between align-items-center">
                        <li>
                          <button class="navbar-close">
                            <i class="mdi mdi-close"></i>
                          </button>
                        </li>
                        <li class="nav-item active">
                          <a class="nav-link" href="<?php echo base_url('news') ?>">Beranda</a>
                        </li>

                        <?php foreach($header_categories as $hc){ ?>
                        <li class="nav-item">
                          <a class="nav-link" href="<?php echo base_url('news/categories/'.$hc->name) ?>"><?php echo $hc->name ?></a>
                        </li>
                        <?php } ?>
                        <li class="nav-item">
                          <h3 style="color: white"> ⠀| ⠀</h3>
                        </li>

                        <li class="nav-item">
                          <a href="#search" onclick="search_page()" class="nav-link">Pencarian</a>
                        </li>

                        <li class="nav-item">
                          <h3 style="color: white"> ⠀| ⠀</h3>
                        </li>

                        <?php if(!$login['status']){ ?>

                        <li class="nav-item">
                          <a href="#login" onclick="login_page()" class="nav-link">Masuk</a>
                        </li>
                        <li class="nav-item">
                          <a href="<?php echo base_url('news/register') ?>" class="nav-link">Daftar</a>
                        </li>

                        <?php }else{ ?>

                          
                            <li class="nav-item">
                              <a href="#profile" onclick="profile()"><strong style="color: white">halo, <?php echo $login['data']['name'] ?></strong></a>
                            </li>
                          

                          <?php } ?>


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