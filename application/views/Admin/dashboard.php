  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <p hidden id="account_scope"><?php echo $session['account_scope'] ?></p>

    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
          <div class="row card-header">
            <h3 class="col-10 card-title">Pilih daerah yang ingin di tampilkan</h3>
            <div class="row col-2 card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">

              <div class="col-md-3 regencies_dropdown">
                
              </div>

              <div class="col-md-3 districts_dropdown">
              <div class="form-group districts_reload">
                  <label>Kecamatan</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option value="not selected yet">- Pilih Kecamatan -</option>
                  </select>
                </div>
              </div>

              <div class="col-md-3 sub_districts_dropdown">
                <div class="form-group sub_districts_reload">
                  <label>Kelurahan/Desa</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option value="not selected yet">- Pilih Kelurahan/Desa -</option>
                  </select>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                <label></label>
                <a href="#show" class="col-12 btn btn-primary">Tampilkan</a>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="row count_load">
        </div>
      </div>
    </section>
  </div>
