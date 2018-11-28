<section class="content-header">

</section>
<section class="content">
     <div class="tab-content">
        <div class="tab-pane active" id="tab-1"> 
            <div class="col-md-12">
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
                                      <div class="col-md-8">
										<select name='tahun' class="form-control select2"
                                                style="width: 20%" >
                                                <option selected disabled>- Pilih -</option>
                                                <?php foreach ($tahun as $pn): ?>
                                                <option value="<?php echo $pn['tahun'] ?>"><?php echo $pn['tahun'] ?></option>                                                        <?php endforeach; ?>
                                        </select>			
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
                                            <a href="#tab-2" data-toggle="tab" class="btn btn-succes"><i
                                             class="fa fa-floppy-o text-blue"></i> Generate</a>
                                    </div>
                                </div>
                            </div>
								
						</div>
                </div>
            </div>
	    </div>
			   <div class="tab-pane" id="tab-2">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header card-header-text" data-background-color="blue">
                                        <h4 class="card-title">Form Tampilan Awal PPTK</h4>
							</div>
							<br>
							<br>
							<br>
							<div class="box-body">
								<table class="table table-bordered table-striped" id="tablekabid" >
									<thead>
										<tr>
											<th width="10px"><center>No</center></th>
											<th>Nama Kegiatan</th>
											<th style="width: 18%"><center>Pagu Dana</center></th>
											<th style="width: 23%"><center>Aksi</center></th>
										</tr>
									</thead>											                
						<tbody>
							<?php 
								if($datakegunit!=null){
								for($i=0;$i<count($datakegunit);$i++){ 
							?>
							<tr>							
									<td><center><?php echo $i+1 ?></center></td>
									<td>
										<div class="form-control" >
											<?php echo $datakegunit[$i]['nmkegunit']; ?>
										</div>
									</td>
									<td><center><input  class="form-control"  name="nilai[]" value=" <?php echo $datakegunit1[$i]; ?>"> </center></td>																																											
									<td class="td-actions text-right">
											<button type="button" class="btn btn-default">Target Keuangan</button>&nbsp; &nbsp; &nbsp;
											<button type="button" class="btn btn-info">Target Fisik</button> &nbsp; &nbsp; &nbsp;
											<button type="button" class="btn btn-danger">Realisasi</button>&nbsp;&nbsp;&nbsp;
									</td>
							</tr>
							
							<?php }}else{ ?>
							<tr>
								<td colspan="4">
								<center>Tidak ada data</center>
								</td>
							</tr>
							
							<?php } ?>															
						</tbody>
								</table>
							</div>
						</div>
					</div>
			   </div>
			</div>
			 
</section>