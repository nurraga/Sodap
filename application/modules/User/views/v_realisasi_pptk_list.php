<script type="text/javascript">
 $(document).ready(function() {

 });
</script>
<section class="content-header">
  <h1>
    SODAP
    <small>Kota Payakumbuh</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    
</ol>
</section>
<section class="content">

    
  
    <div class="callout callout-info">
      <div class="row">
          <div class="col-xs-12 col-md-12 col-md-offset-1">
             <br>
            
             <div class="row">
                <div class="col-md-2 col-sm-2" style="text-align: left">Organisasi</div>
                <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                <div class="col-md-9 col-sm-9" style="padding-left: 25px"><?php echo $nmopd ?></div>
            </div>
            <br>

            <div class="row">
                <div class="col-md-2 col-sm-2" style="text-align: left">Tahun</div>
                <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                <div class="col-md-9 col-sm-9" style="padding-left: 25px"><?php echo $tahun ?></div>
        </div>
        <br>



    </div>

</div>

</div>

<div class="row">
        
      <div class="col-md-3 col-sm-6 col-xs-12">
        <a class="btn btn-block btn-social btn-success" id="btn-kembali">
          <i class="fa fa-arrow-left"></i> Kembali 
        </a> 
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
      
        </div>
         
        <div class="col-md-3 col-sm-6 col-xs-12">
        

        </div>
        
        
      
      </div>
      <br>
<!-- Default box -->

<div class="box box-primary">
  <div class="box-header with-border">
    <i class="fa fa-text-width"></i>
    <h3 class="box-title">Form Realisasi</h3>
  </div>
  <div class="box-body">


    <div class="row">
      <div class="col-md-2 col-sm-2 col-xs-12">  
      </div>
      <div class="col-md-8 col-sm-8 col-xs-12">
        <h2 class="text-center">Realisasi Kegiatan</h2>
      </div>
      <div class="col-md-2 col-sm-2 col-xs-12">
      </div> 
    </div>
    <div class="row">
      <div class="col-md-2 col-sm-2 col-xs-12">  
      </div>
      <div class="col-md-8 col-sm-8 col-xs-12">
       <h3 class="text-center"><?php echo $prog ?></h3>
     </div>
     <div class="col-md-2 col-sm-2 col-xs-12">
     </div> 
   </div>
   <hr>
   <div class="row">
    <div class="col-md-1 col-sm-1 col-xs-12">        
    </div>
    <div class="col-md-2 col-sm-2 col-xs-12">  
     <h4 class="text-left text-muted">Kegiatan</h4>
   </div>
   <div class="col-md-1 col-sm-1 col-xs-12">  
    <h4 class="text-center text-muted">:</h4>
  </div>
  <div class="col-md-6 col-sm-8 col-xs-12">
    <h4 class="text-left text-muted"><?php echo $keg ?></h4>
  </div>
  <div class="col-md-2 col-sm-2 col-xs-12">
  </div> 
</div>
<div class="row">
  <div class="col-md-1 col-sm-1 col-xs-12">  

  </div>
  <div class="col-md-2 col-sm-2 col-xs-12">  
   <h4 class="text-left text-muted">Pagu Dana</h4>
 </div>
 <div class="col-md-1 col-sm-1 col-xs-12">  
  <h4 class="text-center text-muted">:</h4>
</div>
<div class="col-md-6 col-sm-8 col-xs-12">
 <h4 class="text-left text-muted"><?php echo $this->template->rupiah($nl) ?></h4>
</div>
<div class="col-md-2 col-sm-2 col-xs-12">
</div> 
</div>
<div class="row">
  <div class="col-md-1 col-sm-1 col-xs-12">        
  </div>
  <div class="col-md-2 col-sm-2 col-xs-12">  
   <h4 class="text-left text-muted">Bobot Kegiatan</h4>
 </div>
 <div class="col-md-1 col-sm-1 col-xs-12">  
  <h4 class="text-center text-muted">:</h4>
</div>
<div class="col-md-6 col-sm-8 col-xs-12">
 <h4 class="text-left text-muted" id="botkeg"><?php echo $bobot ?></h4>
</div>
<div class="col-md-2 col-sm-2 col-xs-12">
</div> 
</div>
<div class="row">
  <div class="col-md-1 col-sm-1 col-xs-12">        
  </div>
  <div class="col-md-2 col-sm-2 col-xs-12">  
   <h4 class="text-left text-muted">Nama PPK</h4>
 </div>
 <div class="col-md-1 col-sm-1 col-xs-12">  
  <h4 class="text-center text-muted">:</h4>
</div>
<div class="col-md-6 col-sm-8 col-xs-12">
 <h4 class="text-left text-muted"><?php echo $ppk ?></h4>
</div>
<div class="col-md-2 col-sm-2 col-xs-12">
</div> 
</div>

<hr>
          <table class="table table-bordered ">
            <thead >
             
                      
            </thead>
            
              <tbody>
                              
                          
                         
                      
                         
              </tbody>
          </table>
    </div>
    <br>
   
<!-- /.box-body -->

<!-- <div class="box-footer">
  Footer
</div> -->
<!-- /.box-footer-->

</div>
<!-- /.box -->


</section>


