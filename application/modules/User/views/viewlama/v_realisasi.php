<section class="content-header">

   
</section>


<!-- Main content -->
<section class="content">

 
    <br>
    <br>
<div class="col-md-12">	
<div class="card">
							<div class="card-header card-header-text" data-background-color="blue">
                                        <h4 class="card-title">Form Target Realisasi</h4>
							</div>
    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1">
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
                                    <div class="col-md-2 col-sm-2" style="text-align: left">Pagu Dana</div>
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
                                    <!--   <?php  echo $idpnsppk ?> -->
									 
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
                                    <div class="col-md-2 col-sm-2" style="text-align: left">Bulan</div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                     <div class="col-md-4 col-sm-1" style="padding-left: 25px">
                                                <input name="pilihTahun" type="text"
                                                      class="form-control datepicker"
                                                       id="pilihTahun" placeholder="Bulan"
                                                       />
                                              
                                            </div>

                                    
            </div>
            <br>
<div class="col-md-5">
                                            <a  id="tampilkan-tabel" data-toggle="tab" class="btn btn-succes"><i
                                           class="fa fa-refresh"></i>Generate Bulan</a>
                                    </div>
			
          
        </div>
    </div>
	</div>
    
	</div>
	

					


	
	<div class="tab-pane" id="tab-2">
					<div class="col-md-12">
						<div class="card">
							 
        <div class="col-sm-12 col-md-12">
            <div class="box box-warning">
                <div class="box-header">
                    <h3 class="box-title"></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                   <center> tabel dpa</center>
                </div>
            </div>
        </div>
						 <div class="row">
                                    <div class="form-group">
                                        <label for="analisis" class="control-label col-md-2"
                                               style="text-align: right">Kendala / Permasalahan</label>
                                        <div class="col-md-8">
                                                <textarea id="editor3" class="form-control" rows="7" placeholder="..."
                                                          name="analisis" required></textarea>
                                            
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
	<div class="col-md-12">
		<td>
			<button type="submit" class="btn btn-primary btn-success"><i
			class="fa fa-floppy-o text-blue"></i>
			Simpan
			</button>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
		</td>
		<td>
			<button type="submit" class="btn btn-primary btn-default"><i
			class="fa fa-floppy-o text-blue"></i>
			Edit
			</button>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
		</td>
		<td>
			<button type="submit" data-toggle="tab" class="btn btn-succes"><i
                                             class="fa fa-floppy-o text-blue"></i> Kirim</a>
			</button>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
		</td>
	</div>
	</div>
					</div>
	</div>
</section>

<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js" type="text/javascript') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript">
$('#btn-kembali').click(function(){ 
  
    window.history.back();
    
});

$ (function () {
        $('#pilihTahun').datetimepicker({
           
            format: 'MM',
             icons: {
               /* time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove',*/
                inline: true
            }
           
        })
    });

</script>