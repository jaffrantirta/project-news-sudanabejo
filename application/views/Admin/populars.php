  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">List Berita Populer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Berita</a></li>
              <li class="breadcrumb-item active">List Berita Populer</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <p hidden id='link'>api/get_popular_news_data_table</p>
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data List Berita Populer</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Jumlah Kunjungan</th>
                    <th>Pending Status</th>
                    <th>Dibuat pada</th>
                    <th>Diedit pada</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <button onClick="add_popular_news()" style="margin-bottom: 0.3em; margin-left: 1em; margin-top: 0.3em"  class="btn btn-block btn-outline-primary btn-sm col-sm-2 col-11">Tambah Berita Populer</button>
            </div>