<section class="content-header">

</section>
<section class="content">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
             <div class="card">
			 <form method="get" action="#" class="form-horizontal">
               <div class="card-header card-header-text" data-background-color="blue">
                                        <h4 class="card-title">Form Entry data</h4>
                                    </div>
                <div class="box-body">
                    
                           
                <form class="form" id="form" method="post" action="store" enctype="multipart/form-data">
                <div class="tab-content">
                            <div class="tab-pane active" id="tab-1">
                                <div class="row">
                                   
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="Kegiatan" class="col-sm-3 col-md-4 control-label"
                                                       style="text-align: right">Organisasi</label>
                                                <div class="col-md-8">
                                                    <select class="form-control select2"
                                                            data-placeholder="nama Opd" style="width: 100%"
                                                            name="id_opd">
                                                        <option selected disabled>- Nama -</option>
                                                         <?php foreach ($unit as $pn): ?>
                                                            <option value="<?php echo $pn['unitkey'] ?>"><?php echo $pn['nmunit'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                        </div>
								        </div>
								</div>
                                        <br>
                                         <div class="col-md-10">
                                         <div class="row">
                                            <div class="form-group">
                                                <label for="pelaksana" class="col-sm-3 col-md-4 control-label"
                                                       style="text-align: right">
                                                  Tahun Anggaran
                                                </label>
                                                <div class="col-md-8">
                                                    <select class="form-control select2"
                                                            data-placeholder="Pelakasana Perjalanan Dinas"
                                                            style="width: 100%" name="pelaksana">
                                                        <option selected disabled>- Pilih -</option>
                                                        <?php foreach ($tahun as $pn): ?>
                                                            <option value="<?php echo $pn['id_tahun'] ?>"><?php echo $pn['tahun'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
											
                                        </div>
                                        </div>
                                       
										 <br>
										<br>
                                        <br>
										 <br>
                                         <div class="col-md-10">
                                           <div class="row">
                                            <div class="form-group">
                                                <label for="pelaksana" class="col-sm-3 col-md-4 control-label"
                                                       style="text-align: right">
                                                  Input Data PPK
                                                </label>
                                                <div class="col-md-8">
                                                    <select class="form-control select2"
                                                            data-placeholder="Pelakasana Perjalanan Dinas"
                                                            style="width: 100%" name="pelaksana">
                                                        <option selected disabled>- data ppk-</option>
                                                        <?php foreach ($pns as $pn): ?>
                                                            <option value="<?php echo $pn['id'] ?>"><?php echo $pn['nama'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>	
                                        </div>
                                        </div>
										 <br>
										<br>
                                        <br>
										 <br>
                                         <div class="col-md-10">
                                           <div class="row">
                                            <div class="form-group">
                                                <label for="pelaksana" class="col-sm-3 col-md-4 control-label"
                                                       style="text-align: right">
                                                  Input Data Kegiatan
                                                </label>
                                                <div class="col-md-8">
                                                    <select class="form-control select2"
                                                            data-placeholder="Pelakasana Perjalanan Dinas"
                                                            style="width: 100%" name="pelaksana">
                                                        <option selected disabled>- data kegiatan -</option>
                                                        <?php foreach ($matangr as $pn): ?>
                                                            <option value="<?php echo $pn['kdper'] ?>"><?php echo $pn['nmper'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>	
                                        </div>
                                        </div>
										
										<div class="col-md-12 col-sm-12 col-xs-12">
                                            <br>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-sm-3 col-md-4 control-label"></label>
                                                    <div class="col-md-8 col-sm-8 col-xs-8">
                                                        <a onclick="tambahkegiatan()" href="#"><i
                                                                    class="fa fa-plus-circle"> Tambah
                                                                Kegiatan</i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
										<br>
										<br>
										<br>
								<div class="col-md-10">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="persoalan" class="control-label col-md-4"
                                               style="text-align: right">input target keuangan</label>
                                        <div class="col-md-8">
                                                <textarea id="editor1" class="form-control" rows="7" placeholder="..."
                                                          name="persoalan"></textarea>
                                            <span class="text-red"><?php echo form_error('input'); ?></span>
                                        </div>
                                    </div>
                                </div>	
								</div>									
                                <br>
                               
								<br>
								<br>
								<br>
								<br>
									<div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fakta" class="control-label col-md-10"
                                               style="text-align: left"></label>
                                        <div class="col-md-8">
                                            <a href="#tab-2" data-toggle="tab" class="btn btn-primary btn-round"><i
                                                        class="fa fa-arrow-circle-right text-green"></i> Selanjutnya</a>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="tab-pane" id="tab-2">
								<div class="row">
										<div class="col-md-6">
                                           <div class="row">
                                            <div class="form-group">
                                                <label for="pelaksana" class="col-sm-3 col-md-4 control-label"
                                                       style="text-align: right">
                                                  Input Data Targe Fisik
                                                </label>
                                                <div class="col-md-8">
                                                    <select class="form-control select2"
                                                            data-placeholder="Pelakasana Perjalanan Dinas"
                                                            style="width: 100%" name="pelaksana">
                                                        <option selected disabled>- data -</option>
                                                        <?php foreach ($pns as $pn): ?>
                                                            <option value="<?php echo $pn['id'] ?>"><?php echo $pn['nama'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>	
                                        </div>
                                        </div>
								</div>
							<br>
							<br>
							
								<div class="row">
										<div class="col-md-6">
                                           <div class="row">
                                            <div class="form-group">
                                                <label for="pelaksana" class="col-sm-3 col-md-4 control-label"
                                                       style="text-align: right">
                                                  Input Data Realisasi Fisik
                                                </label>
                                                <div class="col-md-8">
                                                    <select class="form-control select2"
                                                            data-placeholder="Pelakasana Perjalanan Dinas"
                                                            style="width: 100%" name="pelaksana">
                                                        <option selected disabled>- data -</option>
                                                        <?php foreach ($pns as $pn): ?>
                                                            <option value="<?php echo $pn['id'] ?>"><?php echo $pn['nama'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>	
                                        </div>
                                        </div>
								</div>
							<br>
							<br>
							
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="pelaksana" class="col-sm-3 col-md-4 control-label"
                                                       style="text-align: right">
                                                  Jadwal pelaksanaan
                                                </label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
												<div class="col-md-8">
                                                <input name="jadwalpelaksanaan" type="text"
                                                       class="form-control pull-right datepicker"
                                                       id="jadwalpelaksana" placeholder="Tanggal"
                                                      
                                                <span class="text-red"><?php echo form_error('tanggal'); ?></span>
                                            </div>
											 </div>
                                        </div>
                                    </div>
                                    
                                </div>
								
								
								
									<div class="row">
										<div class="col-md-6">
                                           <div class="row">
                                            <div class="form-group">
                                                <label for="pelaksana" class="col-sm-3 col-md-4 control-label"
                                                       style="text-align: right">
                                                  Input 
                                                </label>
                                                <div class="col-md-8">
                                                <input type="text" class="form-control" placeholder="...">
                                 </div>
								 </div>
								 </div>
								  </div>
								    </div>
									
                              
                                <div class="row">
                                     <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="dokumenpendukung"
                                                       class="col-sm-3 col-md-4 control-label"
                                                       style="text-align: right;">
                                                    Upload dokumen pendukung
                                                </label>
                                                <div class="col-sm-8">
                                                    <?php form_open_multipart('upload') ?>
                                                    <input accept="image/jpeg,/image/png" type="file"
                                                           id="dokumenpendukung"
                                                           name="dokumenpendukung[]">
                                                    <br>
                                                    <?php echo form_error('dokumenpendukung[]') ?>
                                                    <br>
                                                    <a href="#" class="btn-add-dokumen">
                                                        <i class="fa fa-plus-circle"> Tambah Dokumen</i>
                                                    </a>
                                                    <div class="row">
                                                        <p class="help-block">
                                                            <small><b class="text-red">*</b> Dokumen pendukung ajuan
                                                                Telaah Staf.
                                                            </small>
                                                            <br>
                                                            <small><b class="text-red">*</b> Format(jpeg/jpg/png).
                                                            </small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                        </div>
                                <div class="row" id="navigasi-tab2">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label col-md-2" style="text-align: right">

                                            </label>
                                            <div class="col-md-8">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <a href="#tab-1" data-toggle="tab"
                                                                   class="btn btn-primary btn-danger"><i
                                                                            class="fa fa-arrow-circle-left text-grey"></i>
                                                                    Kembali</a>
                                                            </td>
                                                            <td style="width: 10px"></td>
                                                            <td>
                                                                <button type="submit" class="btn btn-primary btn-success"><i
                                                                            class="fa fa-floppy-o text-blue"></i>
                                                                    Simpan
                                                                </button>
                                                            </td>
															
														
                                                        </tr>
                                                    </table>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>
									  
                                    
                                        
                                        
                            
                                        
                               
                            </div>
                        </div>
                    </form>
					</form>
                </div>
				
            </div>
        </div>
  
</section>
<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
<!-- CK Editor -->
<script src="<?php echo base_url('assets/bower_components/ckeditor/ckeditor.js') ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>
<script type="text/javascript">
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1')
        //bootstrap WYSIHTML5 - text editor
    })
    /*$('.btn-add-pengikut').on('click', function (f) {
        f.preventDefault();
        var opsi = '<select class="form-control select2" multiple="multiple" name="pengikut[]">' +
            '<option selected disabled>- Pilihan Pengikut -</option>' +
            '</select><br>';
        $(this).before(opsi);
    });*/

     

  $(function () {
        $('#jadwalpelaksana').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy',
            startDate: new Date()
        })
    });
</script>