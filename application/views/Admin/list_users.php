  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">List Pengguna</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Pengguna</a></li>
              <li class="breadcrumb-item active">List Pengguna</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php if($id_clause == null && $data == null){ ?>
    <p hidden id='link'>get_all_users</p>
    <?php }else if($data == 'birthday'){ ?>
    <p hidden id='day_value'><?php echo $day_value ?></p>
    <p hidden id='month_value'><?php echo $month_value ?></p>
    <p hidden id='link'><?php echo $data ?></p>
    <?php }else{ ?>
    <p hidden id='link'><?php echo $data ?></p>
    <p hidden id='id_clause'><?php echo $id_clause ?></p>
    <?php } ?>
    
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data List <?php echo $page ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="table" class="table table-bordered table-striped ">
                  <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jenis Pekerjaan</th>
                    <th>Kelurahan/Desa</th>
                    <th>Kecamatan</th>
                    <th>Kabupaten</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>