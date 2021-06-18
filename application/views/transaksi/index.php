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

          <div class="row">
            <div class="col-md-3">
              <button id="test" data-toggle="modal" data-target="#obat" class="btn btn-success"><i class="fa fa-medkit"></i> Data Obat</button>
              <button class="btn btn-success" data-toggle="modal" data-target="#diagnosa"><i class="fa fa-pencil"></i> Diagnosa</button>
            </div>
            <!-- <div class="col-md-9 row">
              <form action="" method="POST" style="display: grid;">
                <div class="form-group" style="margin-bottom: 0px;">
                  <div class="row">
                    <div class="col-md-3 col-xs-10">
                      <input placeholder="Kode obat" required="" name="kode" type="text" class="form-control pull-right" value="">
                    </div>
                    <div class="col-md-3 col-xs-2 row">
                      <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </form>  
            </div> -->
          </div>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
         
          <div class="row">
            <div class="col-md-8">
              <form role="form" method="post" action="<?php echo base_url('transaksi/cart_add') ?>">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">Kode Obat&#160;</span>
                      <input readonly="" value="<?php echo @$log_last['log_kode'] ?>" type="text" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">Nama Obat</span>
                      <input readonly="" value="<?php echo @$log_last['log_obat'] ?>" type="text" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">Harga Obat</span>
                      <input readonly="" value="<?php echo @$log_last['log_harga'] ?>" type="text" class="form-control">
                    </div>
                  </div>

                  <!-- id log -->
                  <input type="hidden" name="log_id" value="<?php echo @$log_last['log_id'] ?>">

                  <div class="form-group">
                    <button type="submit" class="btn btn-default">Keranjang <i class="fa fa-fw fa-plus-circle"></i></button>
                  </div>
                </form>
            </div>
            <div class="col-md-4">
              <div style="background: #00a65a; padding: 3%; box-shadow: 0 0 rgb(0 0 0 / 20%), 0 0 10px 0 rgb(0 0 0 / 57%);">
                <h3 style="font-weight: 600; color: white; margin-top: 0px;"><?= (@$data_total['total'])?'Rp. '.@number_format($data_total['total']) : 'Rp. 0' ?></h3>
              
                <form role="form" method="post" action="<?php echo base_url('transaksi/bayar') ?>">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">Kembali</span>
                        <input name="kembali" id="kembali" readonly="" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">Bayar&#160;&#160;&#160;&#160;&#160;</span>
                        <input name="bayar" id="bayar" type="number" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <button id="btn_bayar" disabled="" type="submit" class="btn btn-default">Bayar <i class="fa fa-fw fa-angle-double-right"></i></button>
                    </div>

                    <!--total-->
                    <input type="hidden" name="total" value="<?php echo @$data_total['total'] ?>">

                  </form>
              </div>
            </div>
            <div class="col-md-12" style="margin-top: 2%;">
              <table class="table table-bordered table-hover" style="background: azure;">
                <tbody>
                  <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th colspan="2">Harga</th>
                  </tr>
                  <?php foreach ($data_log as $key): ?>
                    <tr>
                      <td><?php echo $key['log_kode'] ?></td>
                      <td><?php echo $key['log_obat'] ?></td>
                      <td><?php echo $key['log_harga'] ?></td>
                      <td width="1">
                        <a href="<?php echo base_url('transaksi/del_log/'.$key['log_id']) ?>"><button class="btn btn-xs btn-danger" type="button"><i class="fa fa-times"></i></button></a>
                      </td>
                    </tr>
                  <?php endforeach ?>  
                </tbody>
              </table>

            </div>
          </div>

        </div>
      </div>
      <!-- /.box -->


  <div class="modal fade" id="obat">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Kode</th>
                <th colspan="2">Nama Obat</th>
              </tr>
              </thead>
              <tbody>

                <?php foreach ($data_obat as $key): ?>
                                  
                  <tr>
                    <td><?php echo $key['obat_kode'] ?></td>
                    <td><?php echo $key['obat_nama'] ?></td>
                    <td style="width: 1px;">
                      <div>
                        <a href="<?php echo base_url('transaksi/cart/'.$key['obat_id']) ?>"><button class="btn btn-xs btn-primary"><i class="fa fa-plus"></i></button></a>
                      </div>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="diagnosa">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            
            <form method="POST" action="<?php echo base_url('transaksi/diagnosa') ?>">

             <?php $no = 0; ?>
             <?php foreach ($indikasi_data as $key): ?>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-9 col-xs-7" style="padding-right: 0px;">
                     <input readonly="" class="form-control" type="text" value="<?php echo $key['indikasi_nama'] ?>">
                    </div> 

                    <div class="col-md-3 col-xs-5" align="right">
                      <div data-toggle="buttons">
                        <div class="btn-group">
                          <label class="btn btn-primary">
                            <input type="radio" name="pilih[<?php echo $no; ?>]" id="type" value="<?php echo $key['indikasi_id'] ?>" class="sr-only" required>Ya
                          </label>
                          <label class="btn btn-primary">
                            <input type="radio" name="pilih[<?php echo $no; ?>]" id="type" value="0" class="sr-only" required>Tidak
                          </label>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>

             <?php $no++; ?>
             <?php endforeach ?>

              <div class=" form-group">
                <div class="row">
                  <div class="col-md-12" style="margin-bottom: -15px;">
                   <button type="submit" class="btn btn-success"><i class="fa fa-history"></i> Start Diagnosa</button>
                  </div>
                </div>
              </div>
               

             </form>

          </div>
        </div>
      </div>
    </div>

<script type="text/javascript">

  $(document).ready(function(){

    var total = <?php echo @$data_total['total'] ?>;

    $('#bayar').on('input',function(){

          var num = $('#bayar').val() - total; 

          if ($('#bayar').val() <= total) {
              $('#kembali').val('');
          }else{
              $('#kembali').val(num);
              $('#btn_bayar').removeAttr('disabled');
          }

        });
    });

</script>

    
      