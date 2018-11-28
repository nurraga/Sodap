<section class="content-header">

   
</section>
<script type="text/javascript">
   var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
 </script>



<div id="myModal" class ="modal fade" tabindex="-1" role="dialog">
 	<div class="modal-dialog" role="document">
 		<div class="modal-content">
 			<div class="modal-header">
 				<button type="button" class="close" data-dismiss="modal" arial-label="Close"> <span aria-hidden="true">&times;</span></button>
 				<h4 class="modal-tittle">modal tittle</h4>
 			</div>


<div class="modal-body">
						<form id="myForm" action"" method="post" class="form-horizontal">
							<input type="hidden" name="idbulan" value="0">
							<div class="form-group">
								<label class="label control col-md-2">Bulan</label> 
								<div class="col-md-8">
								<input type="text" name="namabulan" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="label control col-md-2">Nilai</label> 
								<div class="col-md-8">
								<input type="text" name="nilai" class="form-control">
								</div>
							</div>
						</form>
</div>

<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">close</button>
	<button type="button" id="btnsave" class="btn btn-primary" data-dismiss="modal">save</button>
</div>
</div>
</div>
</div>



<!-- Main content -->
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
                                      <?php  echo $namaunit ?>
									 
                                    </div>
            </div>
			<br>
			
			<div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: left">Tahun</div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9" style="padding-left: 25px">
                                       <?php  echo $tahun ?>
									  
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
                                   <!-- <?php  echo $idpnsppk?> -->
									 
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
                                                    <!-- <?php  echo $targetkeuangan[0]['nilai']?> --></td> 
                                                   
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Februari</td>
                                                    <td>Rp. </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Maret</td>
                                                   <td>Rp. </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>April</td>
                                                    <td>Rp. </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Mei</td>
                                                  <td>Rp. </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>Juni</td>
                                                     <td>Rp. </td>
                                                    
                                                </tr>
                                                 <tr>
                                                    <td>7</td>
                                                    <td>Juli</td>
                                                     <td>Rp. </td>
                                                   
                                                </tr>
                                                <tr>
                                                    <td>8</td>
                                                    <td>Agustus</td>
                                                    <td>Rp. </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>9</td>
                                                    <td>September</td>
                                                   <td>Rp. </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>10</td>
                                                    <td>Oktober</td>
                                                     <td>Rp. </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>11</td>
                                                    <td>November</td>
                                                     <td>Rp. </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>12</td>
                                                    <td>Desember</td>
                                                     <td>Rp. </td>
                                                    
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
                              </div>
</section>
<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js" type="text/javascript') ?>"></script>

<script type="text/javascript">





//edit data

$('#target').on('click', '.item-edit',  function(){
	var id_bulan= $(this).attr('data');
	$('#myModal').modal('show');
	$('#myModal').find('.modal-tittle').text('Edit Data');
	$('#myForm').attr('action', '<?php echo base_url() ?>Kasi/updatedata' );
	//var data = $('#myForm').serialize();
	$.ajax({
		type: 'ajax',  
		method: 'get',
		url: '<?php echo base_url() ?>Kasi/editdata',
		data: {id_bulan: id_bulan},
		async: false,
		dataType: 'json', 
		success: function(data){
				$('input[name=namabulan]').val(data.nama_bulan);
				$('input[name=nilai]').val(data.nilai);
				$('input[name=idbulan]').val(data.id_bulan);


		},
		error: function(){
			alert('Tidak Bisa Edit Data');
		}

	});

});

 
$('#btnsave').click(function(){
 var url='';
});





$('#btn-kembali').click(function(){ 
  
    window.history.back();
    
});



</script>


<!-- ambilData();  

	function ambilData(){

	$.ajax({ 
		type: 'POST',
	    url: '<?php echo base_url()."Kasi/ambildata" ?>',
		dataType: 'json', 
		 "data": function ( data ) 
                    {
                      data.token = csrfHash;
                    }
                    },

		
		success: function(data){
		//console.log(data); 
		var baris='';
		for (var i=0;i<data.length;i++){
			baris += '<tr>'+
					 	'<td>'+ data[i].id_bulan + '</td>' +
					 	'<td>'+ data[i].nama_bulan + '  </td>' +
					 	'<td>Rp. '+ data[i].nilai + '   </td>' +
					 	/*'<td>'+
					 			'<a href=javascript:;" class="btn btn-info item-edit" data="'+data[i].id_bulan +' ">Edit</a>'

					 	+ '   </td>' +*/
					 //	'<td>Rp. '+ data[i].echo number_format(nilai,0,',','.') +'   </td>' +
					 '</tr>';
		}
        $('#target').html(baris);
		}
	});
	} --> 