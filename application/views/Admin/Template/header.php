<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SUI | <?php echo $page ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.min.css">
  <style>
  .main-sidebar { background-color: #b00707 !important }
  }

  /* alert */
  @import "compass/css3";

.alertify,
.alertify-show,
.alertify-log {
  -webkit-transition: all 500ms cubic-bezier(0.175, 0.885, 0.320, 1.275);
     -moz-transition: all 500ms cubic-bezier(0.175, 0.885, 0.320, 1.275);
      -ms-transition: all 500ms cubic-bezier(0.175, 0.885, 0.320, 1.275);
       -o-transition: all 500ms cubic-bezier(0.175, 0.885, 0.320, 1.275);
          transition: all 500ms cubic-bezier(0.175, 0.885, 0.320, 1.275); /* easeOutBack */
}
.alertify-hide {
  -webkit-transition: all 250ms cubic-bezier(0.600, -0.280, 0.735, 0.045);
     -moz-transition: all 250ms cubic-bezier(0.600, -0.280, 0.735, 0.045);
      -ms-transition: all 250ms cubic-bezier(0.600, -0.280, 0.735, 0.045);
       -o-transition: all 250ms cubic-bezier(0.600, -0.280, 0.735, 0.045);
          transition: all 250ms cubic-bezier(0.600, -0.280, 0.735, 0.045); /* easeInBack */
}
.alertify-log-hide {
  -webkit-transition: all 500ms cubic-bezier(0.600, -0.280, 0.735, 0.045);
     -moz-transition: all 500ms cubic-bezier(0.600, -0.280, 0.735, 0.045);
      -ms-transition: all 500ms cubic-bezier(0.600, -0.280, 0.735, 0.045);
       -o-transition: all 500ms cubic-bezier(0.600, -0.280, 0.735, 0.045);
          transition: all 500ms cubic-bezier(0.600, -0.280, 0.735, 0.045); /* easeInBack */
}
.alertify-cover {
  position: fixed; z-index: 99999;
  top: 0; right: 0; bottom: 0; left: 0;
  background-color:white;
  filter:alpha(opacity=0);
  opacity:0;
}
  .alertify-cover-hidden {
    display: none;
  }
.alertify {
  position: fixed; z-index: 99999;
  top: 50px; left: 50%;
  width: 550px;
  margin-left: -275px;
  opacity: 1;
}
  .alertify-hidden {
    -webkit-transform: translate(0,-150px);
       -moz-transform: translate(0,-150px);
        -ms-transform: translate(0,-150px);
         -o-transform: translate(0,-150px);
            transform: translate(0,-150px);
    opacity: 0;
    display: none;
  }
  /* overwrite display: none; for everything except IE6-8 */
  :root *> .alertify-hidden {
    display: block;
    visibility: hidden;
  }
.alertify-logs {
  position: fixed;
  z-index: 5000;
  bottom: 10px;
  right: 10px;
  width: 300px;
}
.alertify-logs-hidden {
  display: none;
}
  .alertify-log {
    display: block;
    margin-top: 10px;
    position: relative;
    right: -300px;
    opacity: 0;
  }
  .alertify-log-show {
    right: 0;
    opacity: 1;
  }
  .alertify-log-hide {
    -webkit-transform: translate(300px, 0);
       -moz-transform: translate(300px, 0);
        -ms-transform: translate(300px, 0);
         -o-transform: translate(300px, 0);
            transform: translate(300px, 0);
    opacity: 0;
  }
  .alertify-dialog {
    padding: 25px;
  }
    .alertify-resetFocus {
      border: 0;
      clip: rect(0 0 0 0);
      height: 1px;
      margin: -1px;
      overflow: hidden;
      padding: 0;
      position: absolute;
      width: 1px;
    }
    .alertify-inner {
      text-align: center;
    }
    .alertify-text {
      margin-bottom: 15px;
      width: 100%;
      -webkit-box-sizing: border-box;
         -moz-box-sizing: border-box;
              box-sizing: border-box;
      font-size: 100%;
    }
    .alertify-buttons {
    }
      .alertify-button,
      .alertify-button:hover,
      .alertify-button:active,
      .alertify-button:visited {
        background: none;
        text-decoration: none;
        border: none;
        /* line-height and font-size for input button */
        line-height: 1.5;
        font-size: 100%;
        display: inline-block;
        cursor: pointer;
        margin-left: 5px;
      }

@media only screen and (max-width: 680px) {
  .alertify,
  .alertify-logs {
    width: 90%;
    -webkit-box-sizing: border-box;
       -moz-box-sizing: border-box;
            box-sizing: border-box;
  }
  .alertify {
    left: 5%;
    margin: 0;
  }
}






/**
 * Default Look and Feel
 */
.alertify,
.alertify-log {
  font-family: sans-serif;
}
.alertify {
  background: #FFF;
  border: 10px solid #333; /* browsers that don't support rgba */
  border: 10px solid rgba(0,0,0,.7);
  border-radius: 8px;
  box-shadow: 0 3px 3px rgba(0,0,0,.3);
  -webkit-background-clip: padding;     /* Safari 4? Chrome 6? */
     -moz-background-clip: padding;     /* Firefox 3.6 */
          background-clip: padding-box; /* Firefox 4, Safari 5, Opera 10, IE 9 */
}
  .alertify-text {
    border: 1px solid #CCC;
    padding: 10px;
    border-radius: 4px;
  }
  .alertify-button {
    border-radius: 4px;
    color: #FFF;
    font-weight: bold;
    padding: 6px 15px;
    text-decoration: none;
    text-shadow: 1px 1px 0 rgba(0,0,0,.5);
    box-shadow: inset 0 1px 0 0 rgba(255,255,255,.5);
    background-image: -webkit-linear-gradient(top, rgba(255,255,255,.3), rgba(255,255,255,0));
    background-image:    -moz-linear-gradient(top, rgba(255,255,255,.3), rgba(255,255,255,0));
    background-image:     -ms-linear-gradient(top, rgba(255,255,255,.3), rgba(255,255,255,0));
    background-image:      -o-linear-gradient(top, rgba(255,255,255,.3), rgba(255,255,255,0));
    background-image:         linear-gradient(top, rgba(255,255,255,.3), rgba(255,255,255,0));
  }
  .alertify-button:hover,
  .alertify-button:focus {
    outline: none;
    background-image: -webkit-linear-gradient(top, rgba(0,0,0,.1), rgba(0,0,0,0));
    background-image:    -moz-linear-gradient(top, rgba(0,0,0,.1), rgba(0,0,0,0));
    background-image:     -ms-linear-gradient(top, rgba(0,0,0,.1), rgba(0,0,0,0));
    background-image:      -o-linear-gradient(top, rgba(0,0,0,.1), rgba(0,0,0,0));
    background-image:         linear-gradient(top, rgba(0,0,0,.1), rgba(0,0,0,0));
  }
  .alertify-button:focus {
    box-shadow: 0 0 15px #2B72D5;
  }
  .alertify-button:active {
    position: relative;
    box-shadow: inset 0 2px 4px rgba(0,0,0,.15), 0 1px 2px rgba(0,0,0,.05);
  }
    .alertify-button-cancel,
    .alertify-button-cancel:hover,
    .alertify-button-cancel:focus {
      background-color: #FE1A00;
      border: 1px solid #D83526;
    }
    .alertify-button-ok,
    .alertify-button-ok:hover,
    .alertify-button-ok:focus {
      background-color: #5CB811;
      border: 1px solid #3B7808;
    }

.alertify-log {
  background: #1F1F1F;
  background: rgba(0,0,0,.9);
  padding: 15px;
  border-radius: 4px;
  color: #FFF;
  text-shadow: -1px -1px 0 rgba(0,0,0,.5);
}
  .alertify-log-error {
    background: #FE1A00;
    background: rgba(254,26,0,.9);
  }
  .alertify-log-success {
    background: #5CB811;
    background: rgba(92,184,17,.9);
  }

button {
  min-width: 300px;
  outline: none;
}


  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-footer-fixed text-sm">
<p hidden id="base_url"><?php echo base_url() ?></p>
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SUI Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $session['name'] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
          <?php if($page == 'Dashboard'){ ?>
            <a href="<?php echo base_url('admin/dashboard') ?>" class="nav-link active">
          <?php }else{ ?>
            <a href="<?php echo base_url('admin/dashboard') ?>" class="nav-link">
          <?php } ?>
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
          <?php if($page == 'Pengguna'){ ?>
            <a href="<?php echo base_url('admin/users') ?>" class="nav-link active">
          <?php }else{ ?>
            <a href="<?php echo base_url('admin/users') ?>" class="nav-link">
          <?php } ?>
              <i class="nav-icon fas fa-user"></i>
              <p>
                Pengguna
              </p>
            </a>
          </li>
          <li class="nav-item">
        <?php if($page == 'Kabupaten' || $page == 'Kecamatan' || $page == 'Kelurahan'){ ?>
          <li class="nav-item menu-is-opening menu-open">
        <?php }else{ ?>
          <li class="nav-item">
        <?php } ?>
            <a id="nav-daerah" href="#" class="nav-link"> 
              <i class="nav-icon fas fa-map-marker-alt"></i>
              <p>
                Daerah
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <?php if($page == 'Kabupaten'){ ?>
                <a href="<?php echo base_url('admin/regencies') ?>" class="nav-link active">
              <?php }else{ ?>
                <a href="<?php echo base_url('admin/regencies') ?>" class="nav-link">
              <?php } ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kabupaten</p>
                </a>
              </li>
              <li class="nav-item">
              <?php if($page == 'Kecamatan'){ ?>
                <a href="<?php echo base_url('admin/districts') ?>" class="nav-link active">
              <?php }else{ ?>
                <a href="<?php echo base_url('admin/districts') ?>" class="nav-link">
              <?php } ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kecamatan</p>
                </a>
              </li>
              <li class="nav-item">
              <?php if($page == 'Kelurahan'){ ?>
                <a href="<?php echo base_url('admin/sub_districts') ?>" class="nav-link active">
              <?php }else{ ?>
                <a href="<?php echo base_url('admin/sub_districts') ?>" class="nav-link">
              <?php } ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kelurahan/Desa</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <?php if($page == 'Kategori Berita' || $page == 'Berita Populer' || $page == 'Berita' || $page == 'Berita Headline' || $page == 'Buat Berita'){ ?>
              <li class="nav-item menu-is-opening menu-open">
            <?php }else{ ?>
              <li class="nav-item">
            <?php } ?>
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Berita
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <?php if($page == 'Buat Berita'){ ?>
                <a href="<?php echo base_url('admin/create_news') ?>" class="nav-link active">
              <?php }else{ ?>
                <a href="<?php echo base_url('admin/create_news') ?>" class="nav-link">
              <?php } ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buat Berita</p>
                </a>
              </li>
              <li class="nav-item">
              <?php if($page == 'Berita Headline'){ ?>
                <a href="<?php echo base_url('admin/headline_news') ?>" class="nav-link active">
              <?php }else{ ?>
                <a href="<?php echo base_url('admin/headline_news') ?>" class="nav-link">
              <?php } ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Headline</p>
                </a>
              </li>
              <li class="nav-item">
              <?php if($page == 'Berita Populer'){ ?>
                <a href="<?php echo base_url('admin/popular_news') ?>" class="nav-link active">
              <?php }else{ ?>
                <a href="<?php echo base_url('admin/popular_news') ?>" class="nav-link">
              <?php } ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Populer</p>
                </a>
              </li>
              <li class="nav-item">
              <?php if($page == 'Berita'){ ?>
                <a href="<?php echo base_url('admin/news') ?>" class="nav-link active">
              <?php }else{ ?>
                <a href="<?php echo base_url('admin/news') ?>" class="nav-link">
              <?php } ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Berita</p>
                </a>
              </li>
              <li class="nav-item">
              <?php if($page == 'Kategori Berita'){ ?>
                <a href="<?php echo base_url('admin/news_categories') ?>" class="nav-link active">
              <?php }else{ ?>
                <a href="<?php echo base_url('admin/news_categories') ?>" class="nav-link">
              <?php } ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Berita</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-info"></i>
              <p>
                Informasi
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>