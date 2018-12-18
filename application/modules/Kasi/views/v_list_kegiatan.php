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
									<label for="namaunit" class="col-sm-1 col-md-2 control-label"
										style="text-align: right" >Perangkat Daerah</label>													   
											<div class="col-md-4">
												<input class="form-control"  value="<?php  echo $nmunit[0]['nmunit'];?>
												" readonly>   
											</div>
								</div>
							</div>
                      
							<div class="row">
								<div class="form-group">
									<label class="col-sm21 col-md-2 control-label"
										style="text-align: right" >Nama PPTK</label>
											<div class="col-md-4">
												<input class="form-control"  value="<?php echo $this->ion_auth->user()->row()->first_name ?>" readonly>   
											</div>
								</div>
							</div>
																		
                            <div class="row">
								<div class="form-group">							
									<label class="col-sm-2 col-md-2 control-label"
									style="text-align: right" >Jabatan</label>													   
										<div class="col-md-4">
											 <input class="form-control"  value="<?php  echo $jabatan[0]['nama'];?>" readonly>  
										</div>
								</div>
							</div>           
							
					
						<div class="row">
							<div class="form-group">
								<label  class="col-sm-2 col-md-2 control-label"
									style="text-align: right">Tahun Anggaran
								</label>
                                      <div class="col-md-4">
									
											 <input class="form-control"  value="2018" readonly>   
									
                                      </div>
                            </div>				
                        </div>
                    </div>		
							<br>
							<br>
							<br>
					
							<div class="row">
                                <div class="form-group">
                                    <label for="fakta" class="control-label col-md-3"
                                        style="text-align: right"></label>
                                    <div class="col-md-2">
                                            <a  id="tampilkan-tabel" data-toggle="tab" class="btn btn-succes btn-fill"><i
                                           class="fa fa-refresh"></i> Generate</a>
                                    </div>
                                </div>
                            </div>
						</div>
						</div>
						<div class="card">
                            <div id="tabel-generate" class="tabel-generate" style="display: none">
                       	<div class="col-md-12">
						
       


						<div class="card-header card-header-icon" data-background-color="blue">
                                    <i class="material-icons">assignment</i>
                        </div>
                                <div class="card-content">
                                 <h4 class="card-title">List Kegitan</h4>
                                  
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
							<th>Status</th>
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
</section>
<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js" type="text/javascript') ?>"></script>
<script type="text/javascript">
	$(document).ready(function(){       //Error happens here, $ is not defined.
		$(document).on('click','#tampilkan-tabel', function () {
			// console.log('tes');
			document.getElementById('tabel-generate').style.display = 'inline';
		});
    });
</script>