 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail komentar</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Komentar</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <!-- <form action="<?php echo base_url('admin/update_user_process') ?>" method="post"> -->
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input disabled id="name" name="name" type="text" class="form-control" value="<?php echo $comment->name ?>">
                        <input name="id" id="id" type="hidden" value="<?php echo $comment->id ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input disabled name="email" id="email" type="text" class="form-control" value="<?php echo $comment->email ?>">
                    </div>
                    
                    <div class="form-group">
                    <label>Komentar</label><br>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pen"></i></span>
                        </div>
                        <textarea disabled name="content" id="comment" class="form-control" rows="5"><?php echo $comment->comment ?></textarea>
                    </div>
                   
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button onclick="reply()" class="btn btn-primary">Balas</button>
                </div>
              <!-- </form> -->
            </div>
            <!-- /.card -->
          </div>
        </div>
    </div>
</section>