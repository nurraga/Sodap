<section class="content-header">

</section>
<section class="content">
      <div class="tab-content">
        
            <div class="col-md-12">
                <div class="row col-md-12">
                    <div class="card">
                    <div class="card-header card-header-text" data-background-color="default">
                                        <h4 class="card-title">Generate PPTK</h4>
                    </div>
    
                  <div class="col-sm-12 col-md-12">
               
                  <form class="form" id="form" method="post" action="simpan" enctype="multipart/form-data">
                     <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="namaunit" class="col-sm-3 col-md-4 control-label"
                                                       style="text-align: right" >Organisasi
                                                </label>       
                                                    <div class="col-md-7">
                                                    <input type="hidden" name="namaunit"  class="form-control"  value="<?php echo $namaunit[0]['unitkey'];?>" readonly><?php echo $namaunit[0]['nmunit'] ?>                                             
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                    </div>
                    <br>
                        <div class="row">
                            

                                         <div class="col-md-6">
                                                <label class="col-sm-3 col-md-4 control-label"
                                                       style="text-align: right" >Pilih Tahun
                                                </label> 
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                               
                                                </div>
                                                <div class="col-md-12">
                                                <input name="pilihTahun" type="text"
                                                      class="form-control datepicker"
                                                       id="pilihTahun" placeholder="Tahun"
                                                       />
                                                <span class="text-red"><?php echo form_error('pilihTahun'); ?></span>
                                            </div>
                                             </div>
                                        </div>
                        </div>
                        <br>
                
                            <div class="row">
                                <div class="form-group">
                                    <label for="fakta" class="control-label col-md-4"
                                        style="text-align: left"></label>
                                    <div class="col-md-8">
                                            <a id="tampilkan-tabel"  data-background-color="blue"><i
                                             class="fa fa-plus-circle-o text-blue"></i>Filter</a>
                                    </div>
                                </div>
                            </div>
                        
                
                <div class="box-body">
                    <div class="card">
                            <div id="tabel-generate" class="tabel-generate" style="display: none">
                                <div class="col-md-12">
                    <div class="row">
                      
                            
      
            <div class="box box-warning">
                <div class="box-header">
                  <center>  <h3 class="box-title">Kegiatan</h3>  </center> 
                </div>
                <br>
                                        
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


                
</section>
<script src="<?php echo base_url('assets/js/moment.min.js')?>"></script>


<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js" type="text/javascript') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript">

$('.btn-add-dokumen').on('click', function (f) {
        f.preventDefault();
        var template =  
                                                    '<span class="btn btn-rose btn-round btn-file" class="fileinput fileinput-new text-center" data-provides="fileinput" data-provides="fileinput" fileinput-exists thumbnail>Select image</span><br>'
                                                        '<span class="fileinput-exists">Change</span>'
                                                         
                                                        '<input type="file" id="dokumenpendukung" name="dokumenpendukung" />'
                                                    '</span>'
                                                     
                                                    '<a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>'
                                                      ;
        $(this).before(template);
    });


$ (function () {
        $('#pilihTahun').datetimepicker({
           
            format: 'YYYY',
             icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove',
                inline: true
            }
           
        })
    });
$('#pilihTahun').on( 'click', 'button.filter', function (){
  var row = $(this).closest('tr');
  if ( row.hasClass('child') ) {
    row = row.prev();
  }
  var kolom = pilihTahun.row( row ).data();
  Pace.restart (); 
  Pace.track (function (){
    modal({
      buttons: {
        filter: {
          id    : 'pilihTahun',
          css   : 'btn-danger btn-raised btn-flat btn-bitbucket',
          label : 'Filter'
        }
      },
      title: 'Pilih Tahun Anggaran', 
      idunit    : kolom['unitkey'],
      
                         
    });  

  });  

});

$('#pilih').on( 'click', 'button.btndpa', function (){
  var row = $(this).closest('tr');
  if ( row.hasClass('child') ) {
    row = row.prev();
  }
  var kolom = tb_opd_dpa.row( row ).data();
  Pace.restart (); 
  Pace.track (function (){
    modal({
      buttons: {
        filter: {
          id    : 'btn-filter-dpa',
          css   : 'btn-danger btn-raised btn-flat btn-bitbucket',
          label : 'Filter'
        }
      },
      title: 'Pilih Tahun Anggaran', 
      idunit    : kolom['unitkey'],
      
                         
    });  

  });  

});


function modal(data) {
  
  // Set modal title
  $('.modal-title').html(data.title);
  // Clear buttons except Cancel
  $('.modal-footer button:not(".btn-default")').remove();
  // Set input values

  $('#idunit').val(data.idunit);
  // Create Butttons
  $.each(data.buttons, function(index, button){
    $('.modal-footer').prepend('<button type="button" id="' + button.id  + '" class="btn ' + button.css + '">' + button.label + '</button>')
  })
  //Show Modal
  $('.modal').modal('show');
}

$('.modal').on('click', '#btn-filter-dpa',  function(e){
  if(validator(['datepicker'])) {
  Pace.restart ();
  Pace.track (function (){
    var tahun = $('#datepicker').val();
    var idunit=$('#idunit').val();
    $ .ajax ({
      url: base_url+"Cpanel/cekopddpadetail/"+Math.random(),
      type: "POST",
      data: {
        thn : tahun,
        idunt : idunit

      },
      dataType: "JSON",
      complete: function(data){
        var jsonData = JSON.parse(data.responseText);
        
        if (jsonData.data[0].status == "false"){
          swal(
            'info',
            'Tidak ada Data di Tahun '+tahun+' !!!',
            'info'
          )
        }else{
           window.location.href = base_url+"Cpanel/opddpadetail/"+tahun+"/"+idunit; 
        
        }

      },
      error: function(jqXHR, textStatus, errorThrown){
        swal(
            'error',
            'Terjadi Kesalahan, Coba Lagi Nanti',
            'error'
          )
      }
    });      
    });
  }
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
            responsive: false,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Cari",
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

































