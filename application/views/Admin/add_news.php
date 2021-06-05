  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Buat Berita</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Berita</a></li>
              <li class="breadcrumb-item active">Buat Berita</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="row text-center">
    <?php $msg = $this->session->flashdata('message_name');
    if($msg == 'success_msg'){ ?>
      <div>
        <button class="button large round success">Success notification</button>
      </div>
    <?php }else if($msg == 'failed_msg'){?>
      <div>
        <button class="button large round alert">Error notification</button>
      </div>
    <?php } ?>
    </div>


    <div class="container">
    <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Isi konten berita dibawah</h3>
              </div>
              <div class="card-body">
              <form method="post" action="<?php echo base_url('admin/create_news_process') ?>" enctype="multipart/form-data" id="form_news">
                <div class="form-group">
                  <label>Pilih Kategori Berita</label><br>
                  <small id="msg_category" hidden style="color: red">pilih kategori terlebih dahulu</small>
                  <select name="category" id="select_news_category" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                    <option value="not select yet">- pilih kategori -</option>
                    <?php if($data > 0){
                      $count = count($data);
                      for($i=0;$i<$count;$i++){ ?>
                        <option value="<?php echo $data[$i]->id ?>"><?php echo $data[$i]->name ?></option>
                      <?php } ?>
                    <?php } ?>
                  </select>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- phone mask -->
                <div class="form-group">
                  <label>Judul Berita</label><br>
                  <small id="msg_title" hidden style="color: red">judul kosong</small>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-newspaper"></i></span>
                    </div>
                    <input name="title" id="news_title" type="text" class="form-control" placeholder="judul berita">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- IP mask -->
                <div class="form-group">
                  <label>Isi Berita</label><br>
                  <small id="msg_content" hidden style="color: red">isi berita kosong</small>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-pen"></i></span>
                    </div>
                    <textarea name="content" id="news_content" class="form-control" rows="5" placeholder="masukan isi berita ..."></textarea>
                  </div>
                  <!-- /.input group -->
                </div>

                <div class="form-group">
                  <label>Gambar Berita</label><br>
                  <small id="msg_photo" hidden style="color: red">isi berita kosong</small>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-upload"></i></span>
                    </div>
                    <input type="file" id="file" name="file">
                  </div>
                  <!-- /.input group -->
                </div>

                <div class="form-group">
                  <input type="submit" class="col-12 col-md-6 btn btn-primary" value="Buat Berita" id="but_upload">
                </div>
                <!-- /.form group -->
                </form>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
  
                      
    