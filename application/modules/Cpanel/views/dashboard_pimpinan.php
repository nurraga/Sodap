<?php
  // date_default_timezone_set('Asia/Jakarta');
  $blnthnskr = date('F Y');
?>
<script type="text/javascript">
       $(document).ready(function() {
        ajaxtoken();
$('.contentHolder').each(function(){
    $(this).perfectScrollbar();
});
       });
       //initchart rekap kota ptk
       $(document).ready(function() {
         var d = new Date();
         var bln = d.getMonth();
         var token = localStorage.getItem("token");
         var tableangkas = document.getElementById("tbl-angkas-pyk").getElementsByTagName('tbody')[0];

           $.ajax ({
             url: base_url+"Cpanel/jsonkota/"+bln,
             type: "GET",
             dataType: "JSON",
             success: function(result){
               console.log(result);
               var arrbulan = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des']
               var bulanasli =['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember',]
               var blnnow=new Array();
               var target=new Array();
               target.push(0);
               var real=new Array();
               real.push(0);
               blnnow.push('');
               for(x in result){
                 blnnow.push(arrbulan[x]);
                 target.push(result[x].persentar);
                 real.push(result[x].persenreal);
                   var newRow = tableangkas.insertRow(tableangkas.rows.length);
                   var no = newRow.insertCell(0);
                   var bulan = newRow.insertCell(1);
                   var isitarget = newRow.insertCell(2);
                   var isireal = newRow.insertCell(3);
                   var num = parseInt(x)+1;
                   no.innerHTML = num;
                   bulan.innerHTML = bulanasli[x];
                   isitarget.innerHTML = result[x].target;
                   isireal.innerHTML = result[x].realisasi;

               }


               //insertdata ke tables


               dataColouredBarsChart = {
                 labels: blnnow,
                 series: [
                   target,
                   real
                 ]
               };

               optionsColouredBarsChart = {
                 lineSmooth: Chartist.Interpolation.cardinal({
                     tension: 0
                 }),
                 axisY: {
                     showGrid: true
                 },
                 axisX: {
                     showGrid: false,
                 },
                 low: 1,
                 high: 100,
                 showPoint: true,
                 height: '400px',
                 plugins: [
                  Chartist.plugins.ctPointLabels({
                    labelOffset: {
                      x: -20,
                      y: 15
                    },
                    textAnchor: 'middle',
                    labelInterpolationFnc: function(value) {
                      if(value)
                      return value
                      else
                      return 0
                    }
                  })
                ]
               };


               var colouredBarsChart = new Chartist.Line('#colouredBarsChart', dataColouredBarsChart, optionsColouredBarsChart);

               md.startAnimationForLineChart(colouredBarsChart);
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

</script>
<div class="content">

                <div class="container-fluid">

                    <div class="row">
                      <div class="col-md-6">
                          <div class="card">
                              <div class="card-header card-header-icon" data-background-color="blue">
                                  <i class="material-icons">timeline</i>
                              </div>
                              <div class="card-content">
                                  <h4 class="card-title">Aliran Kas kota Payakumbuh
                                      <small> - <?php echo $blnthnskr ?> </small>
                                  </h4>
                              </div>

                              <div id="colouredBarsChart" class="ct-chart"></div>
                              <div class="card-footer">
                                    <h6>Keterangan</h6>
                                    <i class="fa fa-circle text-info"></i> Target
                                    <i class="fa fa-circle text-danger"></i> Realisasi

                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="card">

                              <div class="card-content">
                                  <h4 class="card-title">Detail Keuangan
                                      <small> - <?php echo $blnthnskr ?> </small>
                                  </h4>
                              </div>

                              <div id="colouredBarsChart" class="ct-chart"></div>
                              <div class="card-footer">
                                <table id="tbl-angkas-pyk" class="table table-hover">
                                  <thead class="text-info">
                                    <tr>
                                      <th>No</th>
                                      <th>Bulan</th>
                                      <th>Target</th>
                                      <th>Realisasi</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                  </tbody>
                                </table>
                              </div>
                          </div>
                      </div>


                </div>

            </div>
<div class="modal fade" id="dashboardmodal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>

                    <h5 class="modal-title"></h5>
            </div>

            <div class="modal-body">
                <div class="row">
                        <!-- <div class="col-md-2 ">
                            <br>
                            <h3>Detail</h3>
                        </div> -->
                        <div class="col-md-12 ">

                             <div class="card">

                                <div class="card-content">
                                    <p class="hide" id="idopd"></p>
                                     <blockquote>
                                <h4 class="info-text" id="namadinas"></h4>
                                <small id="admin"></small>

                                <br>

                            </blockquote>

                               <!--  <legend>Dokumen Pendukung</legend>
                                <table class="table table-hover">
                                        <thead class="text-warning">
                                          </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>SK-Kominfo 2018</td>

                                                <td>View</td>
                                            </tr>

                                        </tbody>
                                    </table> -->
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">access_time</i>
                                        <span class="label label-info" id="time"></span>
                                        <i class="material-icons">update</i>
                                        <span class="label label-info" id="status"></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                </div>
                <p id="list"></p>
            </div>

            <div class="modal-footer modal-footer-tombol">

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modaltolak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-small ">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            <form class="form-horizontal">
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Alasan</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="email" class="form-control">
                                                <span class="material-input"></span></div>
                                            </div>
                                        </div>



                                    </form>
                                                        </div>
                                                        <div class="modal-footer text-center">

                                                            <button type="button" class="btn btn-success btn-simple">Tolak</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
