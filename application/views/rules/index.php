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
                  <th>Nama</th>
                  <th>Indikasi</th>
                  <th>Nama Obat</th>
                  <th>Tanggal Input</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php $i = 1; ?>
                <?php foreach ($data as $key): ?>
                                  
                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $key['rules_nama'] ?></td>
                    <td>

                      <!--indikasi -->
                      <?php 
                      $indikasi = $key['rules_indikasi'];
                      $x = $this->db->query("SELECT * FROM t_indikasi WHERE indikasi_id IN($indikasi)")->result_array(); 
                      
                      $no = 1;
                      foreach ($x as $x1){
                        echo $no.'. '.$x1['indikasi_nama'].'<br/>';
                        $no++;
                      } 
                      ?>
                      
                    </td>
                    
                    <td><?php echo $key['penyakit_nama'] ?></td>
                    <td style="width: 20%;"><?php echo $key['rules_tanggal'] ?></td>
                    <td style="width: 10px;">
                      <div>
                      <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalHapus<?php echo $key['rules_id'] ?>"><i class="fa fa-trash"></i></button>

                      </div>
                    </td>
                  </tr>

                   <!--modal hapus-->
                      <div class="modal fade" id="modalHapus<?php echo $key['rules_id'] ?>">
                        <div class="modal-dialog" align="center">
                          <div class="modal-content" style="max-width: 300px;">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4>Confirmed ?</h4>
                              </div>
                            <div class="modal-body" align="center">
                               <a href="<?php echo base_url() ?>rules/delete/<?php echo $key['rules_id'] ?>"><button class="btn btn-success" style="width: 49%;">Yes</button></a>
                               <button class="btn btn-danger" data-dismiss="modal" style="width: 49%;">No</button>
                            </div>
                          </div>
                        </div>
                       </div> 

                  <!-- /.modal -->
                <?php $i++ ?>
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
                <form role="form" method="post" action="<?php echo base_url() ?>rules/add" enctype="multipart/form-data">
                  <div class="box-body">

                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Indikasi</label>
                        <br/>

                        <?php foreach ($indikasi_data as $key): ?>
                          <div class="col-md-6 col-xs-6 row">
                            <div class="custom-control custom-checkbox">
                              <input value="<?php echo $key['indikasi_id'] ?>" name="rules_indikasi[]" type="checkbox" class="custom-control-input">
                              <span><?php echo $key['indikasi_nama'] ?></span>
                            </div>
                          </div>
                        <?php endforeach ?>

                      </div>
                    </div>

                    <div class="clearfix"></div>

                    <br/>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>penyakit</label>
                        <select class="form-control" required="" name="rules_penyakit">
                          <option value="" hidden="">-- Pilih --</option>

                          <?php foreach ($penyakit_data as $key): ?>
                            <option value="<?php echo $key['penyakit_id'] ?>"><?php echo $key['penyakit_nama'] ?></option>
                          <?php endforeach ?>

                        </select>
                      </div>

                    </div>
                  </div>

                  </div>
                  
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

<script type="text/javascript">
  //gangguan_add
  $(document).ready(function(){
      $('#gangguan_add').on('change',function(){
        var id = $(this).val();


        $.ajax({
            url : "<?php echo base_url('rules/get_indikasi') ?>",
            method : "POST",
            data : {id: id},
            dataType : 'json',
            success: function(data){
                
                //hapus
                $('#indikasi_add').children().remove();

                $.each(data, function(index) {

                  $('#indikasi_add').append('<div class="col-md-6 col-xs-6 row">'+
                                            '<div class="custom-control custom-checkbox">'+
                                            '<input value="'+data[index].indikasi_id+'" name="rules_indikasi[]" type="checkbox" class="custom-control-input">'+
                                            ' <span>'+data[index].indikasi_nama+'</span>'+
                                            '</div></div>');

                });

            }
          });


      });
  });



</script>
      