<section class="content-header">

   
</section>
<!-- Main content -->
<section class="content">
<div class="card">
							<div class="card-header card-header-text" data-background-color="blue">
                                        <h4 class="card-title">Form Target Keuangan</h4>
							</div>
    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1">
			 <div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: left">Organisasi</div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9" style="padding-left: 25px">
                                      <?php  echo $namaunit[0]['nmunit'];?>
									 
                                    </div>
            </div>
			<br>
			
			<div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: left">Tahun</div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9" style="padding-left: 25px">
                                       <?php  echo $tahun[0]['tahun'];?>
									  
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
                                       <?php  echo $nmkegunit ?>
									  
                                    </div>
            </div>
			<br>
			<div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: left">Nilai</div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9" style="padding-left: 25px">
                                    
									  Rp. <?php echo number_format($nilai,0,',','.') ?>,-
                                    </div>
            </div>
			<br>
			<div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: left">Nama PPK</div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9" style="padding-left: 25px">
                                      <?php  echo $idpnsppk ?>
									 
                                    </div>
            </div>
			<br>
			
			<!-- <div class="col-md-12">
                                            <a href="#tab-2" data-toggle="tab" class="btn btn-succes"><i
                                             class="fa fa-floppy-o text-blue"></i> Sinkoronisasi Keuangan</a>
            </div> -->
        </div>
    </div>
	</div>
	
	
					<div class="col-md-12">
						<div class="card">
							 
        
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th width="50px">No</th>
                            <th>Bulan</th>
                            <th>Target Keuangan</th>    
                        </tr>
                        </thead>
						<tbody id="target">						
								
                   
						</tbody>
						
                    </table>



                </div>
            
			</div>
			</div>			
	
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	 <div class="col-md-3 col-sm-6 col-xs-12"> 
      <a class="btn btn-block btn-success" id="btn-kembali">
        <i class="fa fa-arrow-left"></i> Kembali 
      </a>        
    </div>
	</div>
					</div>
	</div>
</section>
<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js" type="text/javascript') ?>"></script>

<script type="text/javascript">
	
ambilData(); 

	function ambilData(){

	$.ajax({ 
		type: 'POST',
	    url: '<?php echo base_url()."Kasi/ambildata" ?>',
		dataType: 'json', 
		
		success: function(data){
		//console.log(data); 
		var baris='';
		for (var i=0;i<data.length;i++){
			baris += '<tr>'+
					 	'<td>'+ data[i].id_bulan + '</td>' +
					 	'<td>'+ data[i].nama_bulan + '  </td>' +
					 	'<td>Rp. '+ data[i].nilai + '   </td>' +
					 //	'<td>Rp. '+ data[i].echo number_format(nilai,0,',','.') +'   </td>' +
					 '</tr>';
		}
        $('#target').html(baris);
		}
	});
	}

$('#btn-kembali').click(function(){ 
  
    window.history.back();
    
});



</script>
