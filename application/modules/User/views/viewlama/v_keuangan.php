<section class="content-header">

   
</section>

<section class="content">


   
   
<div class="col-md-12">	
<div class="card">
     <div class="card-header card-header-icon" data-background-color="rose">
                                        <i class="material-icons">assignment</i>
                                    </div>
                                    <h4 class="card-title"></h4>
                                    <p class="category">Target keuangan</p>
							
    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1">
        	 <br>
			 <div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: left">Organisasi</div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9" style="padding-left: 25px">
                                      <?php  echo $data['namaunit'] ?>
									 
                                    </div>
            </div>
			<br>
			
			<div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: left">Tahun</div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9" style="padding-left: 25px">
                                       <?php  echo $data['tahun'] ?>
									  
                                    </div>
            </div>
			<br>
			<div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: left">Nama PPTK</div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-4 col-sm-5" style="padding-left: 25px">
                                     <?php echo $this->ion_auth->user()->row()->first_name ?> 
									  
                                    </div>
            </div>
			<br>
			<div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: left">Nama Kegiatan</div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9" style="padding-left: 25px">
                                       <?php  echo $data['nmkegunit'] ?>
									  
                                    </div>
            </div>
			<br>
			<div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: left">Nilai</div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9" style="padding-left: 25px">
                                    
									  Rp. <?php echo number_format($data['nilai'],0,',','.') ?>,-
                                    </div>
            </div>
			<br>
			<div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: left">Nama PPK</div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9" style="padding-left: 25px">
                              <?php  echo $namappk->nama;?>
									 
                                    </div>
            </div>
			<br>
			
        </div>
    </div>
	</div>
	</div>
	

	<div class="col-md-12">	
<div class="card">
                                <div class="card card-plain">
                                   
                                    <div class="card-content table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr><th>No</th>
                                                <th>Bulan</th>
                                                <th>Nilai</th>
                                                
                                            </tr></thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Januari</td>
                                                  <td> Rp.
                                                    <?php  echo number_format($jan[0]['nilai'],0,',','.'); ?>,-</td> 
                                                   
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Februari</td>
                                                    <td> Rp.
                                                    <?php  echo number_format($feb[0]['nilai'],0,',','.'); ?>,-</td> 
                                                    
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Maret</td>
                                                 <td> Rp.
                                                    <?php  echo number_format($mar[0]['nilai'],0,',','.'); ?>,-</td> 
                                                    
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>April</td>
                                                 <td> Rp.
                                                    <?php  echo number_format($apr[0]['nilai'],0,',','.'); ?>,-</td> 
                                                    
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Mei</td>
                                                  <td> Rp.
                                                    <?php  echo number_format($mei[0]['nilai'],0,',','.'); ?>,-</td>  
                                                    
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>Juni</td>
                                                   <td> Rp.
                                                    <?php  echo number_format($jun[0]['nilai'],0,',','.'); ?>,-</td> 
                                                    
                                                </tr>
                                                 <tr>
                                                    <td>7</td>
                                                    <td>Juli</td>
                                                      <td> Rp.
                                                    <?php  echo number_format($jul[0]['nilai'],0,',','.'); ?>,-</td> 
                                                   
                                                </tr>
                                                <tr>
                                                    <td>8</td>
                                                    <td>Agustus</td>
                                                    <td> Rp.
                                                    <?php  echo number_format($agus[0]['nilai'],0,',','.'); ?>,-</td>  
                                                    
                                                </tr>
                                                <tr>
                                                    <td>9</td>
                                                    <td>September</td>
                                                   <td> Rp.
                                                    <?php  echo number_format($sep[0]['nilai'],0,',','.'); ?>,-</td> 
                                                    
                                                </tr>
                                                <tr>
                                                    <td>10</td>
                                                    <td>Oktober</td>
                                                     <td> Rp.
                                                    <?php  echo number_format($oct[0]['nilai'],0,',','.'); ?>,-</td> 
                                                    
                                                </tr>
                                                <tr>
                                                    <td>11</td>
                                                    <td>November</td>
                                                     <td> Rp.
                                                    <?php  echo number_format($nov[0]['nilai'],0,',','.'); ?>,-</td> 
                                                    
                                                </tr>
                                                <tr>
                                                    <td>12</td>
                                                    <td>Desember</td>
                                                   <td> Rp.
                                                    <?php  echo number_format($des[0]['nilai'],0,',','.'); ?>,-</td> 
                                                    
                                                </tr>
                                                <tr><td> </td>
                                                    <td><b> TOTAL</b></td>
                                                    <td> <b> Rp. <?php echo number_format($data['nilai'],0,',','.') ?>,-</b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
</div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12"> 
      <a class="btn btn-block btn-info" id="btn-kembali">
        <i class="fa fa-arrow-left"></i> Kembali 
      </a>        
    </div>


</section>
<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js" type="text/javascript') ?>"></script>

<script type="text/javascript">
</script>


