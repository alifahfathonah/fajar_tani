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

        <div class="stepwizard">
          <div class="stepwizard-row setup-panel">
              <div class="stepwizard-step col-xs-6"> 
                  <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                  <p><small>Step 1</small></p>
              </div>
              <div class="stepwizard-step col-xs-6"> 
                  <a href="#step-2" type="button" class="btn btn-default btn-circle" >2</a>
                  <p><small>Step 2</small></p>
              </div>
          </div>
      </div>

      <br/>

      <form role="form" method="POST" action="<?php echo base_url('diagnosa/pilih') ?>" enctype="multipart/form-data">
        <div class="panel panel-primary setup-content" id="step-1">
          <div class="panel-body">

              <?php for ($i=0; $i < count(@$indikasi_data); $i++): ?>

                <?php if ($i < 11): ?>

                <div class="form-group">
                    <div class="col-md-10 col-xs-7 row">
                     <input readonly="" class="form-control" type="text" value="<?php echo @$indikasi_data[$i]['indikasi_nama'] ?>">
                    </div> 

                    <div class="col-md-2 col-xs-5">
                        <div data-toggle="buttons">
                          <div class="btn-group">
                            <label class="btn btn-primary">
                                <input type="radio" name="pilih[<?php echo $i; ?>]" id="type" value="<?php echo @$indikasi_data[$i]['indikasi_id'] ?>" class="sr-only" required>Ya
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="pilih[<?php echo $i; ?>]" id="type" value="0" class="sr-only" required>Tidak
                            </label>
                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="clearfix"></div>
                    <br/>

                <?php endif ?>

               <?php endfor ?>

              <button class="btn btn-primary nextBtn" type="button">Next <i class="fa fa-angle-double-right"></i></button>
          </div>
        </div>
        <div class="panel panel-primary setup-content" id="step-2">
          <div class="panel-body">
              <?php for ($i=0; $i < count(@$indikasi_data); $i++): ?>

                <?php if ($i > 10 && $i < 22): ?>

                <div class="form-group">
                    <div class="col-md-10 col-xs-7 row">
                     <input readonly="" class="form-control" type="text" value="<?php echo @$indikasi_data[$i]['indikasi_nama'] ?>">
                    </div> 

                    <div class="col-md-2 col-xs-5">
                        <div data-toggle="buttons">
                          <div class="btn-group">
                            <label class="btn btn-primary">
                                <input type="radio" name="pilih[<?php echo $i; ?>]" id="type" value="<?php echo @$indikasi_data[$i]['indikasi_id'] ?>" class="sr-only" required>Ya
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="pilih[<?php echo $i; ?>]" id="type" value="0" class="sr-only" required>Tidak
                            </label>
                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="clearfix"></div>
                    <br/>

                <?php endif ?>

               <?php endfor ?>

              <button type="submit" class="btn btn-success"><i class="fa fa-history"></i> Start Diagnosa</button>
          </div>
        </div>
      </form>


       <!-- <form method="POST" action="<?php echo base_url('diagnosa/pilih') ?>">

       <?php $i = 0; ?>
       <?php foreach ($indikasi_data as $indikasi_data): ?>
          <div class="form-group">
            <div class="col-md-10 col-xs-7 row">
             <input readonly="" class="form-control" type="text" value="<?php echo $indikasi_data['indikasi_nama'] ?>">
            </div> 

            <div class="col-md-2 col-xs-5">
                <div data-toggle="buttons">
                  <div class="btn-group">
                    <label class="btn btn-primary">
                        <input type="radio" name="pilih[<?php echo $i; ?>]" id="type" value="<?php echo $indikasi_data['indikasi_id'] ?>" class="sr-only" required>Ya
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="pilih[<?php echo $i; ?>]" id="type" value="0" class="sr-only" required>Tidak
                    </label>
                  </div>
                </div>
              </div>

            </div>

            <div class="clearfix"></div>
            <br/>

       <?php $i++; ?>
       <?php endforeach ?>

        <div class=" form-group">
          <div class="col-md-12 row">
           <button type="submit" class="btn btn-success"><i class="fa fa-history"></i> Start Diagnosa</button>
          </div>
        </div>
         

       </form> -->

      </div> 
      <!-- /.box-body -->

    </div>