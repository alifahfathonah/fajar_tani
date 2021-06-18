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
            <a href="<?php echo base_url('diagnosa') ?>"><button class="btn btn-primary" data-toggle="modal" data-target="#modal-album"><i class="fa fa-history"></i> Diagnosa</button></a>
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
                  <th>Penyakit</th>
                  <th>Obat</th>
                  <th>Deskripsi</th>
                  <th>Status</th>

                  <?php if ($this->session->userdata('level') == 1): ?>
                  <th style="width: 20px;">Action</th>
                  <?php endif ?>

                </tr>
                </thead>
                <tbody>

                <?php foreach ($data as $key): ?>
                                  
                  <tr>
                    <td><?php echo $key['penyakit_nama'] ?></td>
                    <td><?php echo $key['obat_nama'] ?></td>
                    <td><?php echo $key['penyakit_deskripsi'] ?></td>
                    <td><?php echo $key['diagnosa_status'] ?></td>

                    <?php if ($this->session->userdata('level') == 1): ?>

                    <td style="width: 20px;">
                      <div>
                      <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalHapus<?php echo $key['diagnosa_id'] ?>"><i class="fa fa-trash"></i></button>

                      </div>
                    </td>

                    <?php endif ?>
                  </tr>

                   <!--modal hapus-->
                      <div class="modal fade" id="modalHapus<?php echo $key['diagnosa_id'] ?>">
                        <div class="modal-dialog" align="center">
                          <div class="modal-content" style="max-width: 300px;">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4>Confirmed ?</h4>
                              </div>
                            <div class="modal-body" align="center">
                               <a href="<?php echo base_url() ?>hasil/delete/<?php echo $key['diagnosa_id'] ?>"><button class="btn btn-success" style="width: 49%;">Yes</button></a>
                               <button class="btn btn-danger" data-dismiss="modal" style="width: 49%;">No</button>
                            </div>
                          </div>
                        </div>
                       </div> 

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


  <div class="modal fade" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hasil Diagnosa</h4>
              </div>
              <div class="modal-body">
                <table class="table table-bordered table-striped">
                  <tr>
                    <td>Status</td>
                    <td><?php echo ($this->session->flashdata("hasil")['status'] == 'pasti')?'Di Temukan':'Tidak Di Temukan (Menampilkan Hasil Indikasi Yang Mirip)'; ?></td>
                  </tr>
                  <tr>
                    <td>Penyakit</td>
                    <td><?php echo $this->session->flashdata("hasil")['penyakit']; ?></td>
                  </tr>
                  <tr>
                    <td>Obat</td>
                    <td><?php echo $this->session->flashdata("hasil")['obat']; ?></td>
                  </tr>
                </table>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
  
<script type="text/javascript">

<?php if (@$this->session->flashdata('hasil')): ?>
   $( document ).ready(function() {
     $('#myModal').modal('show');
  });
<?php endif ?>

</script>

    
      