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
                  <th width="1">No</th>
                  <th>Foto</th>
                  <th>Kode</th>
                  <th>Nama Obat</th>
                  <th>Aturan Pakai</th>
                  <th>Harga (Rp)</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php $no = 1; ?>
                <?php foreach ($data as $key): ?>
                                  
                  <tr>
                    <td width="1"><?php echo $no; ?></td>
                    <td><a href="<?= (@$key['obat_foto'])? base_url('assets/gambar/obat/'.$key['obat_foto']) : base_url('assets/gambar/no.png') ?>"><img src="<?= (@$key['obat_foto'])? base_url('assets/gambar/obat/'.$key['obat_foto']) : base_url('assets/gambar/no.png') ?>" width="40"></a></td>
                    <td><?php echo $key['obat_kode'] ?></td>
                    <td><?php echo $key['obat_nama'] ?></td>
                    <td><?php echo $key['obat_aturan'] ?></td>
                    <td><?php echo number_format($key['obat_harga']) ?></td>
                    <td style="width: 50px;">
                      <div>
                      <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-edit<?php echo $key['obat_id'] ?>"><i class="fa fa-edit"></i></button>
                      <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalHapus<?php echo $key['obat_id'] ?>"><i class="fa fa-trash"></i></button>

                      </div>
                    </td>
                  </tr>

                   <!--modal hapus-->
                      <div class="modal fade" id="modalHapus<?php echo $key['obat_id'] ?>">
                        <div class="modal-dialog" align="center">
                          <div class="modal-content" style="max-width: 300px;">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4>Confirmed ?</h4>
                              </div>
                            <div class="modal-body" align="center">
                               <a href="<?php echo base_url() ?>obat/delete/<?php echo $key['obat_id'] ?>"><button class="btn btn-success" style="width: 49%;">Yes</button></a>
                               <button class="btn btn-danger" data-dismiss="modal" style="width: 49%;">No</button>
                            </div>
                          </div>
                        </div>
                       </div> 


                  <div class="modal fade" id="modal-edit<?php echo $key['obat_id'] ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Edit Data</h4>
                        </div>
                        <div class="modal-body">
                          <form role="form" method="post" action="<?php echo base_url() ?>obat/update/<?php echo $key['obat_id'] ?>" enctype="multipart/form-data">
                            <div class="box-body">
                              <div class="form-group">
                                <label>Foto Produk</label>
                                <input type="file" name="obat_foto" class="form-control" value="">
                                <small class="text-danger">Masukan gambar untuk mengganti</small>
                              </div>
                              <div class="form-group">
                                <label>Obat Kode</label>
                                <input readonly="" required="" type="text" name="obat_kode" class="form-control" placeholder="Kode" value="<?php echo $key['obat_kode'] ?>">
                              </div>
                              <div class="form-group">
                                <label>Obat Nama</label>
                                <input required="" type="text" name="obat_nama" class="form-control" placeholder="Nama" value="<?php echo $key['obat_nama'] ?>">
                              </div>
                              <div class="form-group">
                                <label>Harga (Rp)</label>
                                <input required="" type="number" name="obat_harga" class="form-control" value="<?php echo $key['obat_harga'] ?>">
                              </div>
                              <div class="form-group">
                                <label>Aturan Pakai</label>
                                <textarea required="" placeholder="aturan" name="obat_aturan" class="form-control"><?php echo $key['obat_aturan'] ?></textarea>
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
                <?php $no++ ?>
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
                <h4 class="modal-title">Tambah Data</h4>
              </div>
              <div class="modal-body">
                <form role="form" method="post" action="<?php echo base_url() ?>obat/add" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label>Foto Produk</label>
                      <input type="file" name="obat_foto" class="form-control" value="">
                    </div>
                    <div class="form-group">
                      <label>Obat Kode</label>
                      <input required="" type="text" name="obat_kode" class="form-control" placeholder="Kode" value="">
                    </div>
                    <div class="form-group">
                      <label>Obat Nama</label>
                      <input required="" type="text" name="obat_nama" class="form-control" placeholder="Nama" value="">
                    </div>
                    <div class="form-group">
                      <label>Harga (Rp)</label>
                      <input required="" type="number" name="obat_harga" class="form-control" value="">
                    </div>
                    <div class="form-group">
                      <label>Aturan Pakai</label>
                      <textarea required="" placeholder="aturan" name="obat_aturan" class="form-control"></textarea>
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