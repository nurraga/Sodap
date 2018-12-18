<section class="content-header">

</section>
<section class="content">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
             <div class="card">
             
               <div class="card-header card-header-text" data-background-color="blue">
                                        <h4 class="card-title">Generate PPTK</h4>
               </div>
    
                <div class="box-body">
                  <form class="form" id="form" method="post" action="simpan" enctype="multipart/form-data">
                     <div class="row">
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="namaunit" class="col-sm-3 col-md-4 control-label"
                                                       style="text-align: right" >Organisasi
                                                </label>       
                                                    <div class="col-md-6">
                                                    <input type="hidden" name="namaunit"  class="form-control"  value="<?php echo $namaunit[0]['unitkey'];?>" readonly><?php echo $namaunit[0]['nmunit'] ?>                                             
                                                    </div>
                                            </div>
                                        </div>
                                     </div>
                    </div>
                    <br>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="form-group">
                                <label  class="col-sm-3 col-md-4 control-label"
                                    style="text-align: right">Tahun Anggaran
                                </label>
                                      <div class="col-md-8">
                                        <select name='tahun' class="form-control select2"
                                                style="width: 100%" >
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
                    <br>
                                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>    <th><b>No</b></th>
                                            <th><b>Nama Kegiatan</b></th>
                                            <th><b>Pagu Dana</b></th>
                                            <th><b>PPTK</b></th>
                                            <th><b>PPK</b></th>
                                    </tr>
                                </thead>
                                        

                               <tbody>

                                <?php for($i=0;$i<count($datakegunit);$i++){ ?>
                                    <tr>
                                        <td><?php echo $i+1 ?> </td>
                                                    
                                        <td>
                                            <div class="form-control" name="kegiatan" id="kegiatan" >
                                                <input type="hidden"class="form-control"  name="kegiatan[]" value="<?php echo $datakegunit[$i]['kdkegunit']; ?>"><?php echo $datakegunit[$i]['nmkegunit']; ?>
                                            </div>
                                        </td>
                                                    
                                        <td> <input class="form-control"  name="nilai[]" value=" <?php echo $datakegunit1[$i]; ?>"> </td>
                                                    
                                        <td> <select class="form-control" name="pilihpnspptk[]" id="pilihpnspptk" >
                                                <option value="">Pilih Pns</option>
                                                <?php foreach ($kasi as $pn): ?>
                                                <option value="<?php echo $pn['id'] ?>"><?php echo $pn['nama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                                    
                                        <td> <select class="form-control" name="pilihpnsppk[]" id="pilihpnsppk" >
                                                 <option value="">Pilih Pns</option>
                                                    <?php foreach ($eselon as $pn): ?>
                                                <option value="<?php echo $pn['id'] ?>"><?php echo $pn['nama'] ?></option>
                                                <?php endforeach; ?>
                                              </select>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                                        
                                        <div class="row">
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
                <br>
                <br>
                <br>                    
                                                                                                
                                                <div class="col-md-8">
                                                   
                                                        <tr>
                                                            <td>
                                                                <a href="Kasi" data-toggle="tab"
                                                                   class="btn btn-primary btn-danger"><i
                                                                            class="fa fa-arrow-circle-left text-grey"></i>
                                                                    RESET</a>
                                                            </td>
                                                            <td style="width: 10px"></td>
                                                            <td>
                                                                <button type="submit" class="btn btn-primary btn-success"><i
                                                                            class="fa fa-floppy-o text-blue"></i>
                                                                  Kirim Data
                                                                </button>
                                                            </td>
                                                        </tr>
                                                </div>
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
       
     $('.btn-add-dokumen').on('click', function (f) {
        f.preventDefault();
        var template = '<input accept="image/jpeg,application/pdf" type="file" id="dokumenpendukung" name="dokumenpendukung[]"><br>';
        $(this).before(template);
    });
    $(document).ready($(document).on('change', '#unitkey', function () {
      
        var unitkey = $(this).val();
        var input = '';
        $.ajax({
            url: 'getpns/' + unitkey,
            type: 'get',
            success: function (data) {
                $('#username').val(JSON.parse(data).nip);
            }

        });
   
    
        $.ajax({
            url: 'getpns/' + unitkey,
            type: 'get',
            success: function (data) {
                $('#nama').val(JSON.parse(data).nama);
            }

        });
    }));
    
     $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });


        var table = $('#datatables').DataTable();

        // Edit record
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');

            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function(e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });

        //Like record
        table.on('click', '.like', function() {
            alert('You clicked on Like button');
        });

        $('.card .material-datatables label').addClass('form-group');
    });
        

    
</script>