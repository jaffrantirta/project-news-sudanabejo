<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sudana Bejo | Registrasi</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<p hidden id="account_scope">regencies</p>
<p hidden id="account_zone_id">1</p>
<p hidden id="base_url"><?php echo base_url() ?></p>



<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?php echo base_url(); ?>" class="h1"><b>⠀ ⠀ ⠀ ⠀ ⠀ ⠀⠀ ⠀</b></a>
    </div>
    <div class="card-header text-center">
      <a href="<?php echo base_url(); ?>" class="h1"><b>Sudana Bejo</b> Registrasi</a>
    </div>
    <div class="card-body">
      <form method="post" action="<?php echo base_url('news/register_process') ?>" enctype="multipart/form-data"">
        <div class="input-group mb-3">
          <input required name="name" type="text" class="form-control" placeholder="Nama lengkap">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="email" type="email" class="form-control" placeholder="Email (boleh dikosongkan)">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input required name="date_of_birth" type="date" class="form-control" placeholder="Tanggal lahir">
        </div>
        <div class="input-group mb-3">
        <label>Jenis kelamin</label>
            <select name="sex" id="select_gender" class="form-control select2 select_gender" style="width: 100%;">
                <option value="male">Laki - laki</option>
                <option value="female">Perempuan</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <div class="row">
              <div class="col-md-12 regencies_dropdown">
                <div class="form-group regencies_reload">
                    <label>Pilih Kabupaten</label>
                  <select required id="select_regencies" class="form-control select2 select_regencies" style="width: 100%;">
                    <option value="not selected yet" disabled selected hidden>- Pilih Kebupaten -</option>
                  </select>
                </div>
              </div>

              <div class="col-md-12 districts_dropdown">
                <div class="form-group districts_reload">
                <label>Pilih Kecamatan</label>
                  <select required id="select_districts" class="form-control select2 select_districts" style="width: 100%;">
                    <option value="" disabled selected hidden>- Pilih Kecamatan -</option>
                  </select>
                </div>
              </div>

              <div class="col-md-12 sub_districts_dropdown">
                <div class="form-group sub_districts_reload">
                <label>Pilih Kecamatan/Desa</label>
                  <select required name="sub_district_id" id="select_sub_districts" class="form-control select2 select_sub_districts" style="width: 100%;">
                    <option value="" disabled selected hidden>- Pilih Kelurahan/Desa -</option>
                  </select>
                </div>
              </div>

            </div>
        </div>
        <div class="input-group mb-3">
          <input required name="community_unit" type="text" class="form-control" placeholder="Banjar">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-home"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <label>Jenis pekerjaan</label>
            <select name="occupation_id" id="select_occupations" class="form-control select2 select_occupations" style="width: 100%;">
                <?php foreach($occupations as $data){ ?>
                    <option value="<?php echo $data->id ?>"><?php echo $data->name ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="input-group mb-3">
          <input required name="whatsapp_number" type="phone" class="form-control" placeholder="Nomor whatsapp">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-whatsapp"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input required name="nik" type="number" class="form-control" placeholder="Masukan NIK">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-id-card"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <div class="custom-file">
                <input required multiple="multiple" type="file" name="file[]" class="custom-file-input" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Upload KTP</label>
            </div>
        </div>
        <div class="input-group mb-3">
            <div class="custom-file">
                <input required multiple="multiple" type="file" name="file[]" class="custom-file-input" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Upload foto profil</label>
            </div>
        </div>
        <div class="input-group mb-3">
          <input required name="password" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input required name="re-password" type="password" class="form-control" placeholder="Masukan ulang password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
        </div>
      </form>

      <!-- <div class="social-auth-links text-center">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div> -->
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->



<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></script>
<script src="<?php echo base_url() ?>assets/build/js/admin/SweetAlertOffline.js"></script>
<script src="<?php echo base_url() ?>assets/build/js/admin/Jquery3Offline.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url() ?>assets/build/js/admin/AdminLogin.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url() ?>assets/build/js/admin/AdminDashboardByPlaces.js"></script>
</body>
</html>
