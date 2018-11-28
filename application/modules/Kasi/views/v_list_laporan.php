<section class="content-header">

</section>
<section class="content">
    <div class="tab-content">
		
            <div class="col-md-12">
            	<div class="row col-md-12">
            		<div class="card">
					<div class="card-header card-header-text" data-background-color="blue">
                                        <h4 class="card-title">Generate PPTK</h4>
					</div>
                         <div class="box-body">
							<div class="row">
								<div class="form-group">
									<label for="namaunit" class="col-sm-1 col-md-1 control-label"
										style="text-align: right" >Organisasi</label>													   
											<div class="col-md-4">
												<input class="form-control"  value="<?php echo $namaunit[0]['nmunit'];?>" readonly>   
											</div>
								</div>
							</div>
                      
							<div class="row">
								<div class="form-group">
									<label class="col-sm-1 col-md-1 control-label"
										style="text-align: right" >Nama PPTK</label>
											<div class="col-md-4">
												<input class="form-control"  value="<?php echo $this->ion_auth->user()->row()->first_name ?>" readonly>   
											</div>
								</div>
							</div>
																		
                            <div class="row">
								<div class="form-group">							
									<label class="col-sm-1 col-md-1 control-label"
									style="text-align: right" >Jabatan</label>													   
										<div class="col-md-4">
											<input class="form-control"  value="<?php foreach ($jabatan_user as $j):?> <?php echo $j['jabatan_pns'] ?><?php endforeach; ?>" readonly>   
										</div>
								</div>
							</div>           
							<br>
					<div class="col-md-10">
						<div class="row">
							<div class="form-group">
								<label  class="col-sm-1 col-md-1 control-label"
									style="text-align: right">Tahun Anggaran
								</label>
                                      <div class="col-md-5">
										
											<input class="form-control"  value="<?php foreach ($tahun as $j):?> <?php echo $j['tahun'] ?><?php endforeach; ?>" readonly>   
										
                                      </div>
                            </div>				
                        </div>
                    </div>		
							<br>
							<br>
							<br>
							<br>							
							<div class="row">
                                <div class="form-group">
                                    <label for="fakta" class="control-label col-md-2"
                                        style="text-align: right"></label>
                                    <div class="col-md-8">
                                            <a id="tampilkan-tabel" data-toggle="tab" class="btn btn-succes"><i
                                             class="fa fa-floppy-o text-blue"></i> Generate</a>
                                    </div>
                                </div>
                            </div>
						</div>
						</div>
						<div class="card">
                            <div id="tabel-generate" class="tabel-generate" style="display: none">
                            	<div class="col-md-12">
						<div class="card">
							
        <div class="col-sm-12 col-md-12">
            <div class="box box-warning">
                <div class="box-header">
                  <center>  <h3 class="box-title">Laporan Kegiatan</h3>  </center> 
                </div>
				<br>
				
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped" id="tablekegiatan" style="width: 100%">
                        <thead>
                        <tr>
                            <th width="50px">No</th>
                            <th>Nama Kegiatan</th>
                            <th>Pagu Dana</th>
                            
                            <th></th>
							<th>Aksi</th>
							<th></th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
						</div>
					</div>
                            </div>
						</div>
                </div>
            </div>
      
                      
	</div>
    </div>
</section>
<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js" type="text/javascript') ?>"></script>
<script type="text/javascript">
	$(document).ready(function(){       //Error happens here, $ is not defined.
		$(document).on('click','#tampilkan-tabel', function () {
			console.log('tes');
			document.getElementById('tabel-generate').style.display = 'inline';
		});
    });
</script>