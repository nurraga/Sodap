<section class="content-header">

   
</section>
<script type="text/javascript">
   var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
 </script>



<div id="myModal" class ="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" arial-label="Close"> <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-tittle">modal tittle</h4>
            </div>


<div class="modal-body">
                        <form id="myForm" action"" method="post" class="form-horizontal">
                            <input type="hidden" name="idbulan" value="0">
                            <div class="form-group">
                                <label class="label control col-md-2">Bulan</label> 
                                <div class="col-md-8">
                                <input type="text" name="namabulan" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="label control col-md-2">Target Fisik</label> 
                                <div class="col-md-8">
                                <input type="text" name="targetfisik" class="form-control">
                                </div>
                            </div>
                        </form>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
    <button type="button" id="btnsave" class="btn btn-primary" data-dismiss="modal">save</button>
</div>
</div>
</div>
</div>



<!-- Main content -->
<section class="content">
 <div class="col-md-12">    
<div class="card">
                            <div class="card-header card-header-text" data-background-color="blue">
                                        <h4 class="card-title">Form Target Fisik</h4>
                            </div>
                            <br>
                            <br>
    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1">
             <div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: left">Perangkat Daerah</div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9" style="padding-left: 25px">
                                      <?php  echo $namaunit ?>
                                    
                                    </div>
            </div>
            <br>
            
            <div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: left">Tahun</div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9" style="padding-left: 25px">
                                       <?php  echo $tahun ?>
                                      
                                    </div>
            </div>
            <br>
            <div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: left">Nama PPTK</div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-4 col-sm-5" style="padding-left: 25px">
                                     <?php echo $this->ion_auth->user()->row()->first_name ?> 
                                      
                                    </div>
            </div>
            <br>
            <div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: left">Nama Kegiatan</div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9" style="padding-left: 25px">
                                       <?php  echo $nmkegunit ?>
                                      
                                    </div>
            </div>
            <br>
            <div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: left">Pagu Anggaran</div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9" style="padding-left: 25px">
                                    
                                      Rp. <?php echo number_format($nilai,0,',','.') ?>,-
                                    </div>
            </div>
            <br>
            <div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: left">Nama PPK</div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9" style="padding-left: 25px">
                                       <!-- <?php  echo$idpnsppk?> -->
                                    </div>
            </div>
            <br>
             </div>
            <br>
            
             <!-- <div class="form-group">
                                    <label for="fakta" class="control-label col-md-4"
                                        style="text-align: left"></label>
                                    <div class="col-md-8">
                                            <a id="tampilkan-tabel"  data-background-color="rose"><i
                                             class="fa fa-plus-circle-o text-blue"></i>Entri </a>
                                    </div>
            </div>
 -->

            <!-- <div class="col-md-12">
                                            <a href="#tab-2" data-toggle="tab" class="btn btn-succes"><i
                                             class="fa fa-floppy-o text-blue"></i> Sinkoronisasi Keuangan</a>
            </div> -->
        </div>
    </div>
    </div>
<div class="col-md-12">        
<div class="card">
                            <div class="card-header card-header-text" data-background-color="blue">
                                        <h4 class="card-title">Pilih Bulan Target Fisik</h4>
                            </div>
                            <br>
                            <br>
    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1">
           
            <br>
             <div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: left">Awal Kegiatan</div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-4 col-sm-9" style="padding-left: 25px">  
                                    <input name="pilihBulan" type="text"
                                                       class="form-control pull-right datepicker"
                                                       id="pilihBulan" placeholder="Bulan"> 
                                    </div>
            </div>
            <br>
            <div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: left">Akhir Kegiatan</div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-4 col-sm-9" style="padding-left: 25px">
                                    <input name="pilihBulan1" type="text"
                                                       class="form-control pull-right datepicker"
                                                       id="pilihBulan1" placeholder="Bulan"> 
                                    </div>
        </div>
        <br>
                            <div class="row">
                                <div class="form-group">
                                    <label for="fakta" class="control-label col-md-2"
                                        style="text-align: right"></label>
                                    <div class="col-md-8">
                                            <a data-toggle="tab" onclick="generatebulan()" class="btn btn-succes"><i
                                             class="fa fa-floppy-o text-blue"></i> Generate Bulan</a>
                                    </div>
                                </div>
                            </div>

<div class="col-md-12">  
<div class="card">
                                <div class="card card-plain">
                                   
                                    <div class="card-content table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr><th>No</th>
                                                <th>Bulan</th>
                                                <th>Target Fisik</th>
                                                
                                            </tr></thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Januari</td>
                                                <td><input type="text"  class="form-control" id="01" placeholder="%" disabled></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Februari</td>
                                                    <td><input type="text" class="form-control" id="02" placeholder="%" disabled></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Maret</td>
                                                    <td><input type="text" class="form-control" id="03" placeholder="%" disabled></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>April</td>
                                                    <td><input type="text" class="form-control" id="04" placeholder="%" disabled></td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Mei</td>
                                                    <td><input type="text" class="form-control" id="05" placeholder="%" disabled></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>Juni</td>
                                                    <td><input type="text" class="form-control" id="06" placeholder="%" disabled></td>
                                                   
                                                    
                                                </tr>
                                                 <tr>
                                                    <td>7</td>
                                                    <td>Juli</td>
                                                    <td><input type="text" class="form-control" id="07" placeholder="%" disabled></td>
                                                     
                                                </tr>
                                                <tr>
                                                    <td>8</td>
                                                    <td>Agustus</td>
                                                    <td><input type="text" class="form-control" id="8" placeholder="%" disabled></td>
                                                    
                                                    
                                                </tr>
                                                <tr>
                                                    <td>9</td>
                                                    <td>September</td>
                                                    <td><input type="text" class="form-control" id="09" placeholder="%" disabled></td>
                                                   
                                                </tr>
                                                <tr>
                                                    <td>10</td>
                                                    <td>Oktober</td>
                                                    <td><input type="text" class="form-control" id="10"placeholder="%" disabled></td>
                                                     
                                                    
                                                </tr>
                                                <tr>
                                                    <td>11</td>
                                                    <td>November</td>
                                                    <td><input type="text" class="form-control" id="11" 
                                                        placeholder="%" disabled></td>
                                                    
                                                    
                                                </tr>
                                                <tr>
                                                    <td>12</td>
                                                    <td>Desember</td>
                                                    <td><input type="text" class="form-control" id="12" placeholder="%" disabled></td>
                                                    
                                                    
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
</div>
    </div>
                
               
    <br>
     <div class="col-md-3 col-sm-6 col-xs-12"> 
      <a class="btn btn-block btn-success" id="btn-kembali">
        <i class="fa fa-arrow-left"></i> Kembali 
      </a>        
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12"> 
      <a class="btn btn-block btn-danger" id="btn-singkron-opd">
        <i class="fa fa-refresh"></i>Simpan
      <div class="ripple-container"></div></a>      
    </div>

  
            </div>     

</section>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="<?php echo base_url('assets/js/moment.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-datetimepicker.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js" type="text/javascript') ?>"></script>

<script type="text/javascript">

$('#btn-kembali').click(function(){ 
  
    window.history.back();
    
});

function generatebulan(){
      var x = document.getElementById("pilihBulan").value;
      var y = document.getElementById("pilihBulan1").value;
      console.log(y-x+1);
}




$ (function () {
        $('#pilihBulan').datetimepicker({
           
            format: 'MM',
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
$(function () {
        $('#pilihBulan1').datetimepicker({
           
            format: 'MM',
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
function myFunction() {
    var x = document.getElementById("pilihBulan").value;
      var y = document.getElementById("pilihBulan1").value;
      console.log (x+y);
  }
  /*  document.getElementById("demo").innerHTML = "You selected: " + x;
}*/
   /* $(document).ready(function(){
        function tampilkanBulan() {
        var date1 = document.getElementById("pilihBulan").value;
        var date2 = document.getElementById("pilihBulan1").value;
        console.log (date1+date2);
        var tJan = 1;
        var tFeb = 2;
        var tMar = 3;
        var tApr = 4;
        var tMay = 5;
        var tJun = 6;
        var tJul = 7;
        var tAug = 8;
        var tSep = 9;
        var tOct = 10;
        var tNov= 11;
        var tDec= 12;
        var jum;
    }
    }); */

       
/*
        if (date1 && date2) {
            var jumlahBulan;
            var totalBulan;
            if (array1[1] < array2[1]) {
                totalBulan = (parseInt(array2[1]) - parseInt(array1[1]));
                console.log(totalBulan);
            } else if (array1[1] < array2[1]) {
                var hb1 = (totalBulan - array1[0]) + 1;
                jumlahBulan = parseInt(hb1) + parseInt(array2[0]);
                //console.log(jumlahHari);
            }*/

         /*   if (jumlahHari > 0 && jumlahHari <= 3) {
                totalTujuan = 1;
            } else if (jumlahHari / 3 > 1) {
                totalTujuan = 2;
            } else {
                totalTujuan = 0;
            }*/

           

    





</script>
