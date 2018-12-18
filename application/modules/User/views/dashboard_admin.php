

<script type="text/javascript">
  var idunit = '<?php echo $idopd ?>';
  $(document).ready(function() {
     $.ajax ({
        url: base_url+"User/cekstrukturopd/"+Math.random(),
        type: "POST",
        data: {
        idunt : idunit
      },
      dataType: "JSON",
      complete: function(data){
        var jsonData = JSON.parse(data.responseText);
         
        if (jsonData.data[0].status == "false"){
          swal(
            'info',
            'Silahkan Lengkapi Struktur OPD / Unit !!!',
            'info'
          );
       
        }else{
          return true;

        }

      },
      error: function(jqXHR, textStatus, errorThrown){
        swal(
            'error',
            'Terjadi Kesalahan, Coba Lagi Nanti',
            'error'
          )
      }
    });
    $("#dashkeg").click(function() {
        Pace.restart ();
        Pace.track (function (){
            window.location.href = base_url+"User/kakppk";    
        });
    });
});

</script>
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
    <div class="callout callout-info">
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
          <h3>LIST</h3>

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
<div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>Generate</h3>

          <p>PPK - PPTK</p>
      </div>
      <div class="icon">
          <i class="ion ion-stats-bars"></i>
      </div>
    <!--   <a href="#" class="small-box-footer" id="dashkeg">
          Proses <i class="fa fa-arrow-circle-right"></i>
      </a> -->

       <a class="btn btn-block btn-social btn-success" id="btn-entrikegiatan">
          <i class="fa fa-bars"></i> proses 
        </a> 
  </div>
</div>
<div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>Struktur</h3>

          <p>Birokrasi</p>
      </div>
      <div class="icon">
          <i class="ion ion-stats-bars"></i>
      </div>
    <!--   <a href="#" class="small-box-footer" id="dashkeg">
          Proses <i class="fa fa-arrow-circle-right"></i>
      </a> -->
       <a class="btn btn-block btn-social btn-success" id="dashkeg" href="<?php echo base_url('User/struktur');?>">
          <i class="fa fa-bars"></i> proses 
        </a> 
  </div>
</div>
<!-- ./col -->


</div>


</section>
<!-- /.content -->









