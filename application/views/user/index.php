<section class="content-header">
      <h1>
        <?php echo $title; ?>
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section> 

    <!-- Main content --> 
    <section class="content">

    <?php if ($this->session->flashdata('gagal')): ?>
      <div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-close"></i>
        <?php echo $this->session->flashdata('gagal'); ?>
      </div>
    <?php endif ?>
 
    <?php if ($this->session->flashdata('success')): ?>
      <div class="alert alert-success alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-check"></i>
        <?php echo $this->session->flashdata('success'); ?>
      </div>
    <?php endif ?>

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

            <div align="left">
              <button class="btn btn-success" data-toggle="modal" data-target="#modal-album"><i class="fa fa-plus"></i> Tambah Data</button>
            </div>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
         
          <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Level</th>
                  <th>Email</th>
                  <th>Tanggal Input</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($data as $key): ?>
                                  
                  <tr>
                    <td><?php echo $key['user_name'] ?></td>
                    <td><?= ($key['user_level'] == '1')? 'Admin':'user'; ?></td>
                    <td><?php echo $key['user_email'] ?></td>
                    <td style="width: 20%;"><?php echo $key['user_tanggal'] ?></td>
                    <td style="width: 50px;">
                      <div>
                      <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-edit<?php echo $key['user_id'] ?>"><i class="fa fa-edit"></i></button>
                      <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalHapus<?php echo $key['user_id'] ?>"><i class="fa fa-trash"></i></button>

                      </div>
                    </td>
                  </tr>

                   <!--modal hapus-->
                      <div class="modal fade" id="modalHapus<?php echo $key['user_id'] ?>">
                        <div class="modal-dialog" align="center">
                          <div class="modal-content" style="max-width: 300px;">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4>Confirmed ?</h4>
                                <small class="text-danger">Tindakan ini akan menghapus record semua menu user ini</small>
                              </div>
                            <div class="modal-body" align="center">
                               <a href="<?php echo base_url() ?>user/delete/<?php echo $key['user_id'] ?>"><button class="btn btn-success" style="width: 49%;">Yes</button></a>
                               <button class="btn btn-danger" data-dismiss="modal" style="width: 49%;">No</button>
                            </div>
                          </div>
                        </div>
                       </div> 


                  <div class="modal fade" id="modal-edit<?php echo $key['user_id'] ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Edit Data Siswa</h4>
                        </div>
                        <div class="modal-body">
                          <form role="form" method="post" action="<?php echo base_url() ?>user/update/<?php echo $key['user_id'] ?>" enctype="multipart/form-data">
                            <div class="box-body">
                              <div class="form-group">
                                <label>Nama</label>
                                <input required="" type="text" name="user_name" class="form-control" placeholder="Nama Lengkap" value="<?php echo $key['user_name'] ?>">
                              </div>
                              <div class="form-group">
                                <label>Email</label>
                                <input required="" type="text" name="user_email" class="form-control" placeholder="Email" value="<?php echo $key['user_email'] ?>">
                              </div>
                              <div class="form-group">
                                <label>Level</label>
                                <select required="" class="form-control" name="user_level">
                                  <option value="<?php echo $key['user_level'] ?>" hidden=""><?= ($key['user_level'] == '1')? 'Admin':'user'; ?></option>
                                  <option value="1">Admin</option>
                                  <option value="2">User</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Password</label>
                                <input required="" type="password" name="user_password" class="form-control" placeholder="Password" value="<?php echo $key['user_password'] ?>">
                              </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                              <button type="submit" class="btn btn-primary">Submit</button>
                               <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                          </form>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                <?php endforeach ?>

                </tfoot>
              </table>

        </div>

        
      </div>
      <!-- /.box -->


  <div class="modal fade" id="modal-album">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Siswa</h4>
              </div>
              <div class="modal-body">
                <form role="form" method="post" action="<?php echo base_url() ?>user/add" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label>Nama</label>
                      <input required="" type="text" name="user_name" class="form-control" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input required="" type="text" name="user_email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <label>Level</label>
                      <select required="" class="form-control" name="user_level">
                        <option value="" hidden="">-- Pilih --</option>
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input autocomplete="off" required="" type="password" name="user_password" class="form-control" placeholder="Password">
                    </div>
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                     <button type="reset" class="btn btn-danger">Reset</button>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
  


    
      