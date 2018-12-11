<!-- <div class="content">

                <div class="container-fluid">
                  <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                    <i class="fa fa-list-ul"></i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Entri</p>
                                    <h3 class="card-title">Target</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">

                                        <div class="stats">
                                        <button class="btn btn-info btn-sx" id="btn-dash-entri"type="button">Proses</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>



                </div>
            </div> -->


<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    SODAP
    <small>Kota Payakumbuh</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

</ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="callout bg-blue">
      <div class="row">
          <div class="col-xs-12 col-md-12 col-md-offset-1">
             <br>
             <p id="kdunit" hidden><?php echo $idopd ?></p>
             <div class="row">
                <div class="col-md-2 col-sm-2" style="text-align: left">Organisasi</div>
                <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                <div class="col-md-9 col-sm-9" style="padding-left: 25px"><?php echo $nmopd ?></div>
            </div>
            <br>

            <div class="row">
                <div class="col-md-2 col-sm-2" style="text-align: left">Tahun</div>
                <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                <div class="col-md-9 col-sm-9" style="padding-left: 25px"><?php echo $tahun ?>

            </div>
        </div>
        <br>



    </div>

</div>
</div>
<div class="row">

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>List</h3>

          <p>Kegiatan</p>
      </div>
      <div class="icon">
          <i class="ion ion-stats-bars"></i>
      </div>
    <!--   <a href="#" class="small-box-footer" id="dashkeg">
          Proses <i class="fa fa-arrow-circle-right"></i>
      </a> -->
       <a class="btn btn-block btn-social btn-success" id="btn-dash-entri">
          <i class="fa fa-bars"></i> proses
        </a>
  </div>
</div>
<!-- ./col -->


</div>


</section>
<!-- /.content -->
