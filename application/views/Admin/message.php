  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      <h1><strong><?php echo $this->session->flashdata('msg_upload') ?></strong></h1>
        <hr>
        <p class="lead">
            <a class="btn btn-primary btn-sm" href="<?php echo base_url('admin/create_news') ?>" role="button">Kembali ke Buat Berita</a>
        </p>
      </div><!-- /.container-fluid -->
    </div>