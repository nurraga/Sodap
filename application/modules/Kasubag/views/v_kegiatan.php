 <div class="box box-warning">
                 <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <form id="TypeValidation" class="form-horizontal" action="#" method="" novalidate="novalidate">
                                    <div class="card-header card-header-text" data-background-color="rose">
                                        <h4 class="card-title">Kegiatan</h4>
                                    </div>
                                    <div class="card-content">
                                        
                                        
                                    <div class="row">   
                                    <div class="tim-typo">
                                        <h4>
                                            <span class="tim-note">Nama Unit / OPD</span><?php echo $namaunit[0]['nmunit'] ?></h4>
                                    </div>   
                                    <div class="tim-typo">
                                        <h4>
                                            <span class="tim-note">Tahun</span>2018</h4>
                                    </div> 
                                    
                                    </div>
                                      
                                    </div>
                                    <div class="card-footer text-center">
                                       
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
              
                <br>
                      <div class="col-md-12">                  
                         <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>


                                    <tr>    <th width="1%"><b>No</b></th>
                                            <th width="35%"><center><b>Nama Kegiatan</b></center></th>
                                            <th width="15%"><center><b>Pagu Dana</b></center></th>
                                            <th width="25%"><center><b>PPTK</b></center></th>
                                            <th width="25%"><center><b>PPK</b></center></th>
                                    </tr>
                                </thead>
                               <tbody>

                                <?php for($i=0;$i<count($datakegunit);$i++){ ?>
                                    <tr>
                                        <td><center><?php echo $i+1 ?> </center> </td>
                                                    
                                        <td width="35%"> 
                                            <div name="kegiatan" id="kegiatan">
                                                <input type="hidden" class="form-control"  name="kegiatan[]" value="<?php echo $datakegunit[$i]['kdkegunit']; ?>"><?php echo $datakegunit[$i]['nmkegunit']; ?>
                                            </div>
                                        </td>
                                                    
                                        <td width="15%"> <input type="hidden" class="form-group"  name="nilai[]" 
                                        value=" <?php echo $datakegunit1[$i]; ?>">
                                   Rp. <?php echo number_format($datakegunit1[$i] ,0,',','.') ?>,- </td>
                                                    
                                        <td width="20%"> <select class="dropdown-toggle btn btn-primary btn-round btn-rose" data-background-color="white" name="pilihpnspptk[]" id="pilihpnspptk" >
                                                <option value="">Pilih Pns</option>
                                                <?php foreach ($kasi as $pn): ?>
                                                <option value="<?php echo $pn['id'] ?>"><?php echo $pn['nama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                                    
                                        <td width="25%"> <select class="dropdown-toggle btn btn-primary btn-round btn-block" data-background-color="white"  name="pilihpnsppk[]" id="pilihpnsppk" >
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
                                                    Upload SK
                                                </label>

                                                <div class="col-sm-8">
                                                
                                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                
                                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                
                                                <div>  
                                                     <?php form_open_multipart('upload') ?> 
                                                    <span class="btn btn-rose btn-round btn-file">
                                                      
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                         
                                                        <input type="file" id="dokumenpendukung" name="dokumenpendukung" />
                                                    </span>
                                                     
                                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                    
                                                </div>
                                            </div>
                                            <?php echo form_error('dokumenpendukung[]') ?>
                                                    <br>
                                                   
                                                    <br>
                                                    <a href="#" class="btn-add-dokumen">
                                                        <i class="fa fa-plus-circle"> Tambah Dokumen</i>
                                                    </a>
                                                    
                                                </div>
                                            </div>
                             </div>
                                         </div>


                                        <br>
                                  
                </div>
                <br>
                <br>
                <br>                    
                                                                                                
                                                <div class="col-md-8">
                                                   
                                                        <tr>
                                                            <td>
                                                                <a href="Kasubag" data-toggle="tab"
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


<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js" type="text/javascript') ?>"></script>
<script type="text/javascript">

$('.btn-add-dokumen').on('click', function (f) {
        f.preventDefault();
        var template =  /*'<class="fileinput fileinput-new text-center" data-provides="fileinput">'
                           '< class="fileinput-preview fileinput-exists thumbnail">'*/
                                /*'<span class="btn btn-rose" class="fileinput-new" btn-round btn-file data-provides="fileinput">Select image</span>'

                                 //'<div>'  
                                    '<span class="fileinput-new"  data-provides="fileinput">Select image</span>'
                                        '<span class="fileinput-exists">Change</span>'
                                                         
                                            '<input type="file" id="dokumenpendukung" name="dokumenpendukung" />'
                                    '</span>'
                                                     
                                    '<a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>'
// '</div>'  */
 // '</div>'  



                                            //    '<class="fileinput fileinput-new text-center" data-provides="fileinput">'
                                        
                                                    '<span class="btn btn-rose btn-round btn-file" class="fileinput fileinput-new text-center" data-provides="fileinput" data-provides="fileinput" fileinput-exists thumbnail>Select image</span><br>'
                                                        '<span class="fileinput-exists">Change</span>'
                                                         
                                                        '<input type="file" id="dokumenpendukung" name="dokumenpendukung" />'
                                                    '</span>'
                                                     
                                                    '<a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>'
                                                    
                                               





        ;
        $(this).before(template);
    });




    $(document).ready(function(){       //Error happens here, $ is not defined.
        $(document).on('click','#tampilkan-tabel', function () {
           // console.log('tes');
            document.getElementById('tabel-generate').style.display = 'inline';
        });
    });

     $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [50, 40, 30, 20, -1],
                [50, 40, 30, 20, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Cari Kegiatan",
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

    /*$(document).ready(function(){       //Error happens here, $ is not defined.
        $('#files').change(function() {
           // console.log('tes');
           
            var files = $('#files')[0].files;
            var error ='';
            var form_data = new FormData();
            for ( var count = 0; count<files.length; count++)
            {
                var name = files[count].name;
                var extension = name.split('.').pop().toLowerCase();
                if (jQuery.inArray(ex))

            }
           // document.getElementById('tabel-generate').style.display = 'inline';
        });
    });



*/












</script>












