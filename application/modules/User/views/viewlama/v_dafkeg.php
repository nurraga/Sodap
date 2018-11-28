<script type="text/javascript">
  $(document).ready(function() {
  $('#targetfisik').hide();
  ajaxtoken();
  $(".btntk").click(function() {
    ajaxtoken();
    var row = $(this).closest("tr");    // Find the row
    var kdkegunit = row.find(".id").text(); // Find the text
    var unit = $('#kdunit').html();
    var token = localStorage.getItem("token");
    $.ajax ({
      url: base_url+"User/jsontargetkeu/"+Math.random(),
      type: "POST",
      data: {
        unitkey : unit,
        idkeg   : kdkegunit,
        token   : token
      },
      dataType: "JSON",
      complete: function(data){
      ajaxtoken();
      var html = "";
      var dethtml = "";
      var jsonData = JSON.parse(data.responseText);
      for (x in jsonData.data) {
        dethtml = "";
        var bln=jsonData.data[x].mskbln;
        var nl=jsonData.data[x].msknilai;
        var heading=bln+'heading';
          html +="<div class='panel panel-default'>\
                    <div class='panel-heading' role='tab' id='"+heading+"'>\
                      <a class='collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#"+bln+"' aria-expanded='false' aria-controls='"+bln+"'>\
                        <div class='row'>\
                          <div class='col-md-1 col-sm-1 text-muted' style='text-align: left'></div>\
                          <div class='col-md-3 col-sm-3 text-muted' style='padding-left: 25px'>"+bln+"</div>\
                          <div class='col-md-8 col-sm-8 text-muted' style='padding-left: 25px'>"+nl+"</div>\
                          <h4 class='panel-title'><i class='material-icons'>keyboard_arrow_down</i></h4>\
                        </div>\
                      </a>\
                    </div>\
                      <div id='"+bln+"' class='panel-collapse collapse' role='tabpanel' aria-labelledby='"+heading+"'>\
                        <div class='panel-body'>\
                          <table class='table table-bordered'>\
                            <thead>\
                              <tr class='active'>\
                                <th>Tahun</th>\
                                <th>Kode Rekening</th>\
                                <th>Nama Rekening</th>\
                                <th>Nilai</th>\
                              </tr>\
                            </thead>\
                            <tfoot>\
                            </tfoot>\
                            <tbody>";
                            for (y in jsonData.data[x].rek) {
                              var tahun = jsonData.data[x].rek[y].tahun;
                              var kdrek = jsonData.data[x].rek[y].kdper;
                              var nmrek = jsonData.data[x].rek[y].nmper;
                              var nilai = jsonData.data[x].rek[y].msknilai;
                              dethtml +="<tr>\
                                <td>"+tahun+"</td>\
                                <td>"+kdrek+"</td>\
                                <td>"+nmrek+"</td>\
                                <td>"+nilai+"</td>\
                                </tr>"
                            }
                     html +=dethtml;
                    html +="</tbody>\
                          </table>\
                        </div>\
                      </div>\
                    </div>";
          }

            modaldafkeg({
              buttons: {
                batal: {
                  id    : 'btn-modal-batal',
                  css   : 'btn-info btn-raised btn-flat btn-bitbucket',
                  label : 'Tutup'
                }
              },
              title: 'Target Keuangan',
              namakegiatan : jsonData.header[0].nmkegunit,
              nilai : jsonData.header[0].msknilai,
              namapptk : jsonData.header[0].idpnspptk,
              namappk : jsonData.header[0].idpnsppk,
              html : html

            });
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

$(".btntf").click(function() {
  // jQuery("#listkegiatan").fadeOut("slow");
  // jQuery("#targetfisik").fadein("slow");
  ajaxtoken();
  var row = $(this).closest("tr");    // Find the row
  var kdkegunit = row.find(".id").text(); // Find the text
  var unit = $('#kdunit').html();
  var token = localStorage.getItem("token");
  $.ajax ({
    url: base_url+"User/jsontargetfis/"+Math.random(),
    type: "POST",
    data: {
      unitkey : unit,
      idkeg   : kdkegunit,
      token   : token
    },
    dataType: "JSON",
    complete: function(data){
      console.log(data);
      ajaxtoken();
      var html = "";
      var dethtml = "";
      var jsonData = JSON.parse(data.responseText);
        if (jsonData.header[0].status == false){
        swal(
          'info',
          'Belum Ada Kerangka Acuan Kerja!!!',
          'info'
        );
        ajaxtoken();
         }else{
      //      $('.card-title').html('Target Fisik');
      // $('#fnamakegiatan').html(jsonData.header[0].nmkegunit);
      // $('#fnilai').html(jsonData.header[0].msknilai);
      // $('#fnamapptk').html(jsonData.header[0].idpnspptk);
      // $('#fnamappk').html(jsonData.header[0].idpnsppk);
      // $('#jan').html(jsonData.header[0].jan);
      // $('#feb').html(jsonData.header[0].feb);
      // $('#mar').html(jsonData.header[0].mar);
      // $('#apr').html(jsonData.header[0].apr);
      // $('#mei').html(jsonData.header[0].mei);
      // $('#jun').html(jsonData.header[0].jun);
      // $('#jul').html(jsonData.header[0].jul);
      // $('#ags').html(jsonData.header[0].ags);
      // $('#sep').html(jsonData.header[0].sep);
      // $('#okt').html(jsonData.header[0].okt);
      // $('#nov').html(jsonData.header[0].nov);
      // $('#des').html(jsonData.header[0].des);
      // $( "#listkegiatan, #targetfisik" ).slideToggle(1000,"easeOutQuint");
      for (x in jsonData.data) {
        dethtml = "";
        var bln=jsonData.data[x].bln;
        var nl=jsonData.data[x].targ;
        var jtarget=jsonData.data[x].jumtarg;
        var heading=bln+'heading';
          html +="<div class='panel panel-default'>\
                    <div class='panel-heading' role='tab' id='"+heading+"'>\
                      <a class='collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#"+bln+"' aria-expanded='false' aria-controls='"+bln+"'>\
                        <div class='row'>\
                          <div class='col-md-1 col-sm-1 text-muted' style='text-align: left'></div>\
                          <div class='col-md-3 col-sm-3 text-muted' style='padding-left: 25px'>"+bln+"</div>\
                          <div class='col-md-4 col-sm-4 text-muted' style='padding-left: 25px'>"+nl+"%</div>\
                          <div class='col-md-4 col-sm-4 text-muted' style='padding-left: 25px'>"+jtarget+"%</div>\
                          <h4 class='panel-title'><i class='material-icons'>keyboard_arrow_down</i></h4>\
                        </div>\
                      </a>\
                    </div>\
                      <div id='"+bln+"' class='panel-collapse collapse' role='tabpanel' aria-labelledby='"+heading+"'>\
                      </div>\
                    </div>";
          }

            modaldafkeg({
              buttons: {
                batal: {
                  id    : 'btn-modal-batal',
                  css   : 'btn-info btn-raised btn-flat btn-bitbucket',
                  label : 'Tutup'
                }
              },

              title: 'Target Fisik',
              namakegiatan : jsonData.header[0].nmkegunit,
              nilai : jsonData.header[0].msknilai,
              namapptk : jsonData.header[0].idpnspptk,
              namappk : jsonData.header[0].idpnsppk,
              html : html

            });
         }
     
    },
    error: function(jqXHR, textStatus, errorThrown){
      console.log(jqXHR.responseText);
      swal(
        'error',
        'Terjadi Kesalahan, Coba Lagi Nanti',
        'error'
      )
      ajaxtoken();
    }
  }); 
});

$("#btn-aja-kembali").click(function() {
  // jQuery("#listkegiatan").fadeOut("slow");
  // jQuery("#targetfisik").fadein("slow");
   $( "#listkegiatan, #targetfisik" ).slideToggle(1000)
});

     });


</script>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-content">
            <div class="row">
              <div class="col-xs-12 col-md-12 col-md-offset-1">
           <br>
           <p id="kdunit" hidden><?php echo $idopd ?></p>
       <div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: left">Organisasi</div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9" style="padding-left: 25px"><?php echo $nmopd ?></div>
            </div>
      <br>

      <div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: left">Tahun</div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9" style="padding-left: 25px"><?php echo $tahun ?>

                                    </div>
            </div>
      <br>



        </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row" id="listkegiatan">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                 <h4 class="card-title">List Kegiatan</h4>
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->

                                    </div>

                                     <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-left"  width="2%"><b>#</b></th>

                                                    <th class="col-xs-5 text-center" >Nama Kegiatan</th>
                                                    <th class="col-xs-2 text-right" >Pagu Dana</th>
                                                     <th class=" td-actions text-center" ></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php
                                              $i = 0;
                                              foreach ($list as $row){
                                                  $i++;
                                                  echo'<tr>
                                                    <td>'.$i.'</td>
                                                     <td class="id" style="display:none;">'.$row['kdkegunit'].'</td>
                                                    <td class="col-xs-5">'.$row['nmkegunit'].'</td>
                                                    <td class="text-right">'.$this->template->rupiah($row['nilai']).'</td>
                                                    <td class=" td-actions text-center">
                                                    <button class="btntk btn btn-info">Target Keuangan<div class="ripple-container"></div>
                                                    </button>
                                                    <button class="btntf btn btn-success">Target Fisik<div class="ripple-container"></div></button>
                                                    <button class="btn btn-danger">Realisasi<div class="ripple-container"></div></button></td>
                                                    </tr>';

                                            }
                                        ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="targetfisik">

                        <div class="col-md-12">
                           <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">

                    <a class="btn btn-block btn-info" id="btn-aja-kembali">
              <i class="fa fa-arrow-left"></i> Kembali
            </a>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
          </div>
        </div>
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="green">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                  <h4 class="card-title">Target Fisik</h4>

                                          <div class="toolbar">


                                          </div>
                                          <div class="col-md-7">
                                               <br>
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 text-muted" style="text-align: left">Nama Kegiatan</div>
                                    <div class="col-md-1 col-sm-1 text-muted" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9 text-muted" style="padding-left: 25px"><p id="fnamakegiatan"></p></div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-2 col-sm-2 text-muted" style="text-align: left">Nilai Kegiatan</div>
                                    <div class="col-md-1 col-sm-1 text-muted" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9 text-muted" style="padding-left: 25px"><p id="fnilai"></p></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 text-muted" style="text-align: left">Nama PPTK</div>
                                    <div class="col-md-1 col-sm-1 text-muted" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9 text-muted" style="padding-left: 25px"><p id="fnamapptk"></p></div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-2 col-sm-2 text-muted" style="text-align: left">Nama PPK</div>
                                    <div class="col-md-1 col-sm-1 text-muted" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9 text-muted" style="padding-left: 25px"><p id="fnamappk"></p></div>
                                </div>

                                
                                          </div>
                                          <div class="col-md-5">
                                            <div class="table-responsive table-sales">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Januari</td>
                                                           
                                                            <td class="text-right">
                                                               <p id="jan"></p>
                                                            </td>
                                                        </tr>
                                                          <tr>
                                                            <td>Februari</td>
                                                           
                                                            <td class="text-right">
                                                               <p id="feb"></p>
                                                            </td>
                                                        </tr>
                                                          <tr>
                                                            <td>Maret</td>
                                                           
                                                            <td class="text-right">
                                                               <p id="mar"></p>
                                                            </td>
                                                        </tr>
                                                          <tr>
                                                            <td>April</td>
                                                           
                                                            <td class="text-right">
                                                               <p id="apr"></p>
                                                            </td>
                                                        </tr>
                                                          <tr>
                                                            <td>Mei</td>
                                                           
                                                            <td class="text-right">
                                                               <p id="mei"></p>
                                                            </td>
                                                        </tr>
                                                          <tr>
                                                            <td>Juni</td>
                                                           
                                                            <td class="text-right">
                                                               <p id="jun"></p>
                                                            </td>
                                                        </tr>
                                                          <tr>
                                                            <td>Juli</td>
                                                           
                                                            <td class="text-right">
                                                               <p id="jul"></p>
                                                            </td>
                                                        </tr>
                                                          <tr>
                                                            <td>Agustus</td>
                                                           
                                                            <td class="text-right">
                                                               <p id="ags"></p>
                                                            </td>
                                                        </tr>
                                                          <tr>
                                                            <td>September</td>
                                                           
                                                            <td class="text-right">
                                                               <p id="sep"></p>
                                                            </td>
                                                        </tr>
                                                          <tr>
                                                            <td>Oktober</td>
                                                           
                                                            <td class="text-right">
                                                               <p id="okt"></p>
                                                            </td>
                                                        </tr>
                                                          <tr>
                                                            <td>November</td>
                                                           
                                                            <td class="text-right">
                                                               <p id="nov"></p>
                                                            </td>
                                                        </tr>
                                                          <tr>
                                                            <td>Desember</td>
                                                           
                                                            <td class="text-right">
                                                               <p id="des"></p>
                                                            </td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                </div>
                                
                            </div>
                        </div>
                    </div>
  </div>
</div>
<div class="modal fade" id="modaldafkeg" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 text-muted" style="text-align: left">Nama Kegiatan</div>
                                    <div class="col-md-1 col-sm-1 text-muted" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9 text-muted" style="padding-left: 25px"><p id="namakegiatan"></p></div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-2 col-sm-2 text-muted" style="text-align: left">Nilai Kegiatan</div>
                                    <div class="col-md-1 col-sm-1 text-muted" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9 text-muted" style="padding-left: 25px"><p id="nilai"></p></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 text-muted" style="text-align: left">Nama PPTK</div>
                                    <div class="col-md-1 col-sm-1 text-muted" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9 text-muted" style="padding-left: 25px"><p id="namapptk"></p></div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-2 col-sm-2 text-muted" style="text-align: left">Nama PPK</div>
                                    <div class="col-md-1 col-sm-1 text-muted" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9 text-muted" style="padding-left: 25px"><p id="namappk"></p></div>
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

