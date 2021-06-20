  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kelurahan/Desa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Daerah</a></li>
              <li class="breadcrumb-item active">Kelurahan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <p hidden id='link'>api/get_sub_districts_data_table</p>
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Kelurahan/Desa di Bali</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Kelurahan/Desa</th>
                    <th>Termasuk dalam Kecamatan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <button onClick="add_sub_districts()" style="margin-bottom: 0.3em; margin-left: 1em; margin-top: 0.3em"  class="btn btn-block btn-outline-primary btn-sm col-sm-2 col-11">Tambah Kelurahan/Desa</button>
            </div>