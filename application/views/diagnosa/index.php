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

    <div class="box">
      <div class="box-header with-border">

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">

       <form method="POST" action="<?php echo base_url('diagnosa/pilih') ?>">

       <?php $no = 0; ?>
       <?php foreach ($indikasi_data as $key): ?>
          <div class="form-group">
            <div class="col-md-10 col-xs-7 row">
             <input readonly="" class="form-control" type="text" value="<?php echo $key['indikasi_nama'] ?>">
            </div> 

            <div class="col-md-2 col-xs-5">
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

            <div class="clearfix"></div>
            <br/>

       <?php $no++; ?>
       <?php endforeach ?>

        <div class=" form-group">
          <div class="col-md-12 row">
           <button type="submit" class="btn btn-success"><i class="fa fa-history"></i> Start Diagnosa</button>
          </div>
        </div>
         

       </form>

      </div> 
      <!-- /.box-body -->

    </div>