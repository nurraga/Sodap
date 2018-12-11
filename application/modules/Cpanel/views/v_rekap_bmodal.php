<script type="text/javascript" >

var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
$(document).ready(function(){
  ajaxtoken();
  $('.btn-lihat-masalah').click(function(){
    var row = $(this).closest("tr");

    var unitkey = row.find(".unitkey").text();
    var nmunit = row.find(".nmunit").text();
    Pace.restart ();
    Pace.track (function (){
      modalbulan({
        buttons: {
          filter: {
            id    : 'btn-filter-real',
            css   : 'btn-danger btn-raised btn-flat btn-bitbucket',
            label : 'Pilih'
          }
        },
        title: 'Pilih Bulan Realisasi',
        idunit    : unitkey,
        nmunit    : nmunit,
      });
    });



        // for(x in   json ){
        //   console.log(json[x])
        // }
    //   },
    //   error: function(jqXHR, textStatus, errorThrown){
    //     console.log(jqXHR.responseText);
    //     swal(
    //       'error',
    //       'Terjadi Kesalahan, Coba Lagi Nanti',
    //       'error'
    //     )
    //   }
    // });
  });
  $('#modalbulan').on('click','#btn-filter-real',function(e){
    // alert("sda");

    var kodebulan={'January':'1','February':'2','March':'3','April':'4','May':'5','June':'6','July':'7','August':'8','September':'9','October':'10','November':'11','December':'12'};
    var bulan = $("#datepickmonth").val();
    var unitkey=$('#idunit').val();
    var nmunit=$('#nmunit').val();
    var dt = new Date();
    var tahun = dt.getFullYear();
    var id = $('.modal').id;

    var idtoken= localStorage.getItem("token");
    if(bulan != '') {
      Pace.restart ();
      Pace.track (function (){
        $.ajax ({
          url: base_url+"Cpanel/jsonmasalah/"+Math.random(),
          type: "POST",
          data: {
            unitkey : unitkey,
            tahun   : tahun,
            bulan   : kodebulan[bulan],
            token   : idtoken
          },
          dataType: "JSON",
          complete: function(data){
            $('#modalbulan').modal('hide');
            ajaxtoken();
            var jsonprog = JSON.parse(data.responseText);
            var html = "";
            for(x in jsonprog){

              var rowhtml = "";
              var nmprog=jsonprog[x].NMPRGRM;
              var kegiatan=jsonprog[x].keg;
              var heading='heading'+x;
              var collapse='collapse'+x;
              html +="<div class='panel panel-default'>\
                        <div class='panel-heading' role='tab' id='"+heading+"'>\
                          <a class='collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#"+collapse+"' aria-expanded='false' aria-controls='"+bulan[x]+"'>\
                          <h4 class='panel-title' style='margin-left:10px'>"+nmprog+"</h4>\
                          </a>\
                        </div>\
                        <div id='"+collapse+"' class='panel-collapse collapse' role='tabpanel' aria-labelledby='"+heading+"'>\
                          <div class='panel-body'>\
                          <table class='table table-bordered'>\
                            <thead>\
                              <tr class='active'>\
                                <th>Nama Kegiatan</th>\
                                <th>Keterangan</th>\
                              </tr>\
                            </thead>\
                            <tfoot>\
                            </tfoot>\
                            <tbody>";
                            for(y in kegiatan){
                              var nmkeg = kegiatan[y].nmkegunit;
                              var masalah = kegiatan[y].masalah;
                              rowhtml+="<tr>\
                                      <td>"+nmkeg+"</td>\
                                      <td>"+masalah+"</td>\
                                      </tr>";
                            }
                      html+=rowhtml;
                      html+="</tbody>\
                            </table>\
                          </div>\
                        </div>\
                      </div>";

              // for(x in jsonprogram){
              //   var idprgrm = jsonprogram[x].IDPRGRM;
              //   var heading=idprgrm+'heading';
              //
              // }
            }

            modalmasalah({
              buttons: {
                batal: {
                  id    : 'btn-modal-batal',
                  css   : 'btn-info btn-raised btn-flat btn-bitbucket',
                  label : 'Tutup'
                }
              },
              title: 'Masalah',
              namaopd : nmunit,
              tahun : tahun,
              bulan : bulan,
              html : html

            });
          }
        });
      });
    }else{
      swal(
        'info',
        'Pilih Bulan !!!',
        'info'
      )
    }
  });
  $('.btn-detail-opd').click(function(){
    var row = $(this).closest("tr");    // Find the row
    var dt = new Date();
    var tahun = dt.getFullYear();
    Pace.restart ();
    Pace.track (function (){
      var unitkey = row.find(".unitkey").text(); // Find the text
      console.log(tahun)
      var idtoken= localStorage.getItem("token");
      $.ajax ({
        url: base_url+"Cpanel/cekopddpadetail/"+Math.random(),
        type: "POST",
        data: {
          thn : tahun,
          idunt : unitkey,
          token : idtoken
        },
        dataType: "JSON",
        complete: function(data){
          var jsonData = JSON.parse(data.responseText);
          if (jsonData.data[0].status == "false"){
            swal(
              'info',
              'Tidak ada Data di Tahun '+tahun+' !!!',
              'info'
            );
            ajaxtoken();
          }else{
            window.location.href = base_url+"Cpanel/opddetailbmodal/"+tahun+"/"+unitkey;
          }
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
  });

  $('#datepickmonth').datetimepicker( {

      format: "MMMM",

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

  });
});

function modalmasalah(data) {
  /*modal Cpanel/opduser*/
  // Set modal title

  $('.modal-title').html(data.title);

  $('#namaopd').html(data.namaopd);
  $('#bulan').html(data.bulan+'/'+data.tahun);
  $('#accordion').html(data.html);
  // Clear buttons except Cancel
  $('.modal-footer button:not(".btn-default")').remove();

  // Create Butttons
  $.each(data.buttons, function(index, button){
    $('.modal-footer').prepend('<button type="button" id="' + button.id  + '" class="btn ' + button.css + '">' + button.label + '</button>')
  })

  //Show Modal
  $('#modalmasalah').modal('show');

}
function modalbulan(data) {

  // Set modal title
  $('.modal-title').html(data.title);
  // Clear buttons except Batal
  $('.modal-footer button:not(".btn-default")').remove();
  // Set input values

  $('#idunit').val(data.idunit);
  $('#nmunit').val(data.nmunit);
  // Create Butttons
  $.each(data.buttons, function(index, button){
    $('.modal-footer').prepend('<button type="button" id="' + button.id  + '" class="btn ' + button.css + '">' + button.label + '</button>')
  })
  //Show Modal
  $('#modalbulan').modal('show');
}
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

      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-icon" data-background-color="blue">
            <i class="material-icons">assignment</i>
          </div>
          <div class="card-content">
            <h4 class="card-title">Rekap Belanja Modal Bulanan</h4>
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->

            </div>
            <div class="table-responsive">
              <table class="table table-bordered" cellspacing="0" width="100%" style="width:100%">
                <thead class="text-info">
                  <tr class="active" class="text-center">
                    <th rowspan="3" style="text-align: center;">No</th>
                    <th rowspan="3" style="width:30%" class="text-center">Nama OPD</th>
                    <th rowspan="3" class="text-center">Pagu Dana</th>
                    <th colspan="4" style="text-align: center;">Keuangan</th>
                    <th colspan="2" rowspan="2" style="text-align: center;">Fisik</th>
                    <th rowspan="3" style="text-align: center;">Status</th>
                    <th rowspan="3" style="text-align: center;">Keterangan</th>
                    <th rowspan="3" style="text-align: center;">Aksi</th>
                  </tr>
                  <tr class="active">
                    <th colspan="2" style="text-align: center;">Target</th>
                    <th colspan="2" style="text-align: center;">Realisasai</th>
                  </tr>
                  <tr class="active">
                    <th class="text-center">%</th>
                    <th class="text-center">Nilai</th>
                    <th class="text-center">%</th>
                    <th class="text-center">Nilai</th>
                    <th class="text-center">Target</th>
                    <th class="text-center">Realisasi</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  $n=1;
                  foreach ($data as $key) {


                    ?>
                    <tr>
                      <td><?php echo $n++?></td>
                      <td><?php echo $key->nmunit ?></td>
                      <td style="text-align: right;"><?php echo $this->template->nominal($key->pagu_b_modal) ?></td>
                      <td style="text-align: center;">
                        <?php

                        echo number_format($key->persenTarKeu,2);
                        ?>%
                      </td>
                      <td><?php echo $this->template->nominal($key->targetKeu) ?></td>
                      <td style="text-align: center;"><?php echo $key->persentasiReal ?>%</td>
                      <td style="text-align: right;"><?php echo $this->template->nominal($key->realisasi_keu) ?></td>
                      <td style="text-align: center;"><?php echo $key->target_fis ?>%</td>
                      <td style="text-align: center;"><?php echo $key->realisasi_fis ?>%</td>
                      <td style="text-align: center;">
                        <?php
                        if($key->nilairapor < 80){
                          echo "<span class='label label-danger'>Belum Tercapai</span>";
                        }
                        else{
                          echo "<span class='label label-success'>Tercapai</span>";
                        }
                        ?>

                      </td>
                      <td style="text-align: center;">
                        <button class="btn btn-warning btn-lihat-masalah">Lihat<div class="ripple-container"></div></button>
                      </td>
                      <td style="text-align: center;"><button class="btn btn-info btn-detail-opd">Detail<div class="ripple-container"></div></td>
                        <td class="unitkey" style="display:none;" ><?php echo $key->unitkey?></td>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>

                </table>
              </div>

            </div>
          </div>
        </div>
      </div>


    </div>
    <div class="modal fade" id="modalbulan">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <div class="error"></div>
            <div class="box-body">
              <!--    <div class="form-group is-empty">
              <div class='input-group date'>
              <div class='input-group-addon'>
              <i class='fa fa-calendar'></i>
            </div>
            <input type='text' class='form-control datepicker' id='datepicker'>
          </div>
        </div> -->
        <input type="hidden" id="idunit" name="idunit" readonly>
        <input type="hidden" id="nmunit" name="nmunit" readonly>

        <div class="form-group">

          <label class="label-control">Tahun :</label>
          <input type='text' class='form-control datepicker' id='datepickmonth'>
        </div>

        <!--  <div class="konten"></div> -->
      </div>

    </div>
    <div class="modal-footer">

    </div>
  </div>
</div>
</div>

<div style="overflow-y:auto;" class="modal fade" id="modalmasalah" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>


      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-icon" data-background-color="blue">
                <i class="material-icons">assignment</i>
              </div>
              <div class="card-content">
                <h4 class="card-title modal-title"></h4>
                <div class="toolbar">


                </div>
                <br>

                <p id="kdkeg"></p>
                <p id="idtab"></p>
                <div class="row">
                  <div class="col-md-2 col-sm-2 text-muted" style="text-align: left">Nama OPD</div>
                  <div class="col-md-1 col-sm-1 text-muted" style="text-align: right;width: 5px">:</div>
                  <div class="col-md-9 col-sm-9 text-muted" style="padding-left: 25px"><p id="namaopd"></p></div>
                </div>
                <br>

                <div class="row">
                  <div class="col-md-2 col-sm-2 text-muted" style="text-align: left">Bulan / Tahun</div>
                  <div class="col-md-1 col-sm-1 text-muted" style="text-align: right;width: 5px">:</div>
                  <div class="col-md-9 col-sm-9 text-muted" style="padding-left: 25px"><p id="bulan"></p></div>
                </div>
                <br>


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
</div>
