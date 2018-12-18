<script>
    $( document ).ready(function() {
      var tb_kelola_pod;
        $(".select2").select2();
       var idunit = '<?php echo $idopd ?>';
       ajaxtoken();
   /*Datatable untuk User Per OPD*/
   $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings){
    return{
      "iStart": oSettings._iDisplayStart,
      "iEnd": oSettings.fnDisplayEnd(),
      "iLength": oSettings._iDisplayLength,
      "iTotal": oSettings.fnRecordsTotal(),
      "iFilteredTotal": oSettings.fnRecordsDisplay(),
      "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
      "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
    };
  };
  /********AGUNG-SETIA-BUDI-AGUNG-SETIA-BUDI-AGUNG-SETIA-BUDI-AGUNG-SETIA-BUDI-AGUNG-SETIA-BUDI*/

  tb_kelola_pod = $('#tb-kelola-opd').DataTable({
    initComplete: function() {
      var api = this.api();
      $('#tb-kelola-opd_filter input')
      .off('.DT')
      .on('keyup.DT', function(e) {
        if (e.keyCode == 13) {
          api.search(this.value).draw();
        }
      });
    },
    language: {
        sProcessing: "loading...",
        search: "_INPUT_",
        searchPlaceholder: "Cari ASN..."
    },
    responsive: true,
    processing: true,
    serverSide: true,
    ajax: {
      
      "url": base_url+"User/jsonstrukturlist_by/"+idunit,
      "type": "GET"
    },

    columns: [
      {
        "data": "id_unit",
        "orderable": false
      },
      {
        "data": "nip",  
      },
      {
        "data": "nama_pns",  
      },
      {
        "data": "jabatan",
      },
      {
        "data" : "action",
        "orderable": false,
        "className" : "td-actions text-center"
      }

    ],
    //rowsGroup: [0], //ini untuk colspan atau grouping
    // order: [[4, 'asc']], 
    displayLength: 25,
    //ini untuk menambahkan kolom no di index 0
    rowCallback: function(row, data, iDisplayIndex) {
      var info = this.fnPagingInfo();
      var page = info.iPage;
      var length = info.iLength;
      var index = page * length + (iDisplayIndex + 1);
      $('td:eq(0)', row).html(index);
    }          
  });


  $('#tb-kelola-opd tbody').on( 'click', '.opdeditkelola', function () {
        Pace.restart();
        var data = tb_kelola_pod.row( $(this).parents('tr') ).data();
        

        var token = localStorage.getItem("token");
        $.ajax ({ 
          url: base_url+"User/jsonkelola_byid/",
          type: "POST",
          data: {
            idKelola : data['id'],
            token : token
          },
           dataType: "JSON",
           complete: function(data){
            ajaxtoken();
            var jsonData = JSON.parse(data.responseText);
            var pns='';
            var nippejabat='';
            var jbtpejabat='';

            
            var idstruktur = jsonData.struktur.id;
            for (x in jsonData.pns){
                var nippejabat = jsonData.struktur.nip;
                if(jsonData.pns[x].nip == jsonData.struktur.nip) {
                  pns += '<option selected="selected" value="'+jsonData.pns[x].nip+'">'+jsonData.pns[x].nama+'</option>'
                  nippejabat = jsonData.struktur.nip;
                  jbtpejabat = jsonData.struktur.jabatan;
                } else{
                  pns += '<option value="'+jsonData.pns[x].nip+'">'+jsonData.pns[x].nama+'</option>';
                }
                
                
            }


            modalkelola({
              buttons: {
                batal: {
                  id    : 'btn-modal-batal',
                  css   : 'btn-warning btn-raised btn-flat btn-bitbucket',
                  label : 'Batal'
                }, simpan: {
                  id    : 'btn-modal-simpan',
                  css   : 'btn-info btn-raised btn-flat btn-bitbucket',
                  label : 'Simpan'
                }
              },
              title: 'Ganti Pejabat',
              
              idstruktur : idstruktur,
              pnspejabat : pns,
              nippejabat : nippejabat,
              jbtpejabat : jbtpejabat,

            });
              
           },
           error: function(jqXHR, textStatus, errorThrown){
            console.log(jqXHR);
            swal(
            'error',
            'Terjadi Kesalahan, Coba Lagi Nanti',
            'error'
             )
           }
      }); /// tutup ajax

     $("#modalkelola").on('hidden.bs.modal',function(){
      ajaxtoken();
      tb_kelola_pod.ajax.reload();
     });
    });
      $(document).on('click','#btn-modal-batal',function() {
          $('#modalkelola').modal('toggle');
        });


      $(document).on('change','#pnspejabat',function(){
            var nip = $("#pnspejabat option:selected").val();
            $('#nippejabat').val(nip);
        });

     $(document).on('click','#btn-modal-simpan',function() {
          var nippjb =$('#nippejabat').val();
          var idstruktur =$('#idstruktur').text();
          var token = localStorage.getItem("token");
           $.ajax ({ 
              url: base_url+"User/updateStruktur/",
                type: "POST",
                data: {
                  idstruktur : idstruktur,
                  nip : nippjb,
                  token : token
                },
                 dataType: "JSON",
                 complete: function(data){
                  ajaxtoken();
                  
                    swal({
                      title: 'success',
                      text: 'OKE sukses',
                      type: 'info'
                    }, function(){
                      $("#modalkelola").modal('hide');  
                    }
                   );
                    
                 },
                 error: function(jqXHR, textStatus, errorThrown){
                  console.log(jqXHR.responseText);
                  swal(
                  'error',
                  'Terjadi Kesalahan, Coba Lagi Nanti',
                  'error'
                   )
                 }

           });
        });



  function modalkelola(data) {
  /*modal Cpanel/opduser*/
  // Set modal title
  $('.modal-title').html(data.title);
  $('#pnspejabat').html(data.pnspejabat);
  $('#jbtpejabat').html(data.jbtpejabat);
  $('#nippejabat').val(data.nippejabat);
  $('#idstruktur').html(data.idstruktur);
  // Clear buttons except Cancel
  $('.modal-footer button:not(".btn-default")').remove();
  
  // Create Butttons
  $.each(data.buttons, function(index, button){
    $('.modal-footer').prepend('<button type="button" id="' + button.id  + '" class="btn ' + button.css + '">' + button.label + '</button>')
  })
  
  //Show Modal
  $('#modalkelola').modal('show');

  }
 /*AGUNG-SETIA-BUDI-AGUNG-SETIA-BUDI-AGUNG-SETIA-BUDI-AGUNG-SETIA-BUDI-AGUNG-SETIA-BUDI********/
    });

</script>
<div class="content">

                <div class="container-fluid">
                   <div class="row">      
    <div class="col-md-3 col-sm-6 col-xs-12"> 
      <a class="btn btn-block btn-info" id="btn-kembali">
        <i class="fa fa-arrow-left"></i> Kembali 
      </a>        
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">    
    </div>     
    <div class="col-md-3 col-sm-6 col-xs-12">
      <a class="btn btn-block btn-danger" id="btn-singkron-opd">
        <i class="fa fa-refresh"></i> Kelola Organisasi
      </a>
    </div>
  </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="blue">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                 <h4 class="card-title">Struktur OPD</h4>
                                    <div class="material-datatables">
                                      <table id="tb-kelola-opd" class="table" >
                                       <thead class="text-info">
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIP</th>
                                                    <th>Nama</th>
                                                    <th>Jabatan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIP</th>
                                                    <th>Nama</th>
                                                    <th>Jabatan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </tfoot>
                                      </table>
                                    </div>
                                     
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


<!--++++++++++++ AGUNG-SETIA-BUDI-AGUNG-SETIA-BUDI-AGUNG-SETIA-BUDI-AGUNG-SETIA-BUDI-AGUNG-SETIA-BUDI -->
<div class="modal fade" id="modalkelola" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
            </div>
            <div class="modal-body">
              <p id="idstruktur"hidden></p>
               <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                              <div class="card-content">
                              <h4 class="card-title modal-title"></h4>
                                <div class="toolbar">

                                </div>
                              <br>
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 text-muted" style="text-align: left">Nama</div>
                                    <div class="col-md-1 col-sm-1 text-muted" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9 text-muted" style="padding-left: 25px">
                                      
                                        <select id="pnspejabat" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        </select>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-2 col-sm-2 text-muted" style="text-align: left">NIP</div>
                                    <div class="col-md-1 col-sm-1 text-muted" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9 text-muted" style="padding-left: 25px">
                                      <input id="nippejabat" type="text" class="form-control" placeholder="Enter ..." disabled="">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 text-muted" style="text-align: left">Jabatan</div>
                                    <div class="col-md-1 col-sm-1 text-muted" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9 text-muted" style="padding-left: 25px"><p id="jbtpejabat"></p></div>
                                </div>

                                <br>
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

            </div>

            <div class="modal-footer modal-footer-tombol">

            </div>
        </div>
    </div>
</div>
 <!-- AGUNG-SETIA-BUDI-AGUNG-SETIA-BUDI-AGUNG-SETIA-BUDI-AGUNG-SETIA-BUDI-AGUNG-SETIA-BUDI ++++++++++-->