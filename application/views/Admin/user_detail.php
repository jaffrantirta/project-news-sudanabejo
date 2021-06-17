 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail pengguna</h1>
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
                <h3 class="card-title">Data diri</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo base_url('admin/update_user_process') ?>" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input name="name" type="text" class="form-control" placeholder="Masukan nama" value="<?php echo $user->name ?>">
                        <input name="id" type="hidden" value="<?php echo $user->id ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIK</label>
                        <input name="nik" type="text" class="form-control" placeholder="Masukan NIK" value="<?php echo $user->nik ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Banjar</label>
                        <input name="community_unit" type="text" class="form-control" placeholder="Masukan banjar" value="<?php echo $user->community_unit ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor whatsapp</label>
                        <input name="whatsapp_number" type="text" class="form-control" placeholder="Masukan nomor whatsapp" value="<?php echo $user->whatsapp_number ?>">
                    </div>
                    <div class="form-group">
                        <label>Jenis kelamin</label>
                        <select name="sex" class="form-control">
                          <option value="<?php echo $user->sex ?>"><?php if($user->sex == 'male'){
                            echo 'Laki -laki (dipilih)';
                          }else{
                            echo 'Perempuan (dipilih)';
                          } ?></option>
                          <option value="male">Laki - laki</option>
                          <option value="female">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jenis pekerjaan</label>
                        <select name="occupation" class="form-control">
                          <option value="<?php echo $user->occupation_id ?>"><?php echo $user->occupation_name ?> (dipilih)</option>
                          <?php foreach($occupations as $o){?>
                            <option value="<?php echo $o->id ?>"><?php echo $o->name ?></option>
                          <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kelurahan/Desa</label>
                        <select name="sub_districts" class="form-control">
                        <option value="<?php echo $user->sub_district_id ?>"><?php echo $user->sub_districts_name ?> (dipilih)</option>
                          <?php foreach($sub_districts as $o){?>
                            <option value="<?php echo $o->id ?>"><?php echo $o->name ?></option>
                          <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kecamatan</label>
                        <select name="districts" class="form-control" disabled>
                          <option value="<?php echo $user->districts_id ?>"><?php echo $user->districts_name ?> (dipilih)</>
                          <?php foreach($districts as $o){?>
                            <option value="<?php echo $o->id ?>"><?php echo $o->name ?></option>
                          <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kabupaten</label>
                        <select name="regency" class="form-control" disabled>
                        <option value="<?php echo $user->regency_id ?>"><?php echo $user->regency_name ?> (dipilih)</option>
                          <?php foreach($regencies as $o){?>
                            <option value="<?php echo $o->id ?>"><?php echo $o->name ?></option>
                          <?php } ?>
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
    </div>
</section>