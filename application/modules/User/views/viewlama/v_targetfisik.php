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
                                 <?php  echo $namappk;?>
                                    </div>
            </div>
            <br>
             </div>
            <br>
            
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
    <form action="<?php echo base_url('User/simpanfisik') ?>" method="POST"> 
                                <div class="card card-plain">
                                   
                                    <div class="card-content table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr><th>No</th>
                                                <th>Bulan</th>
                                                <th>Target Fisik</th>
                                                
                                            </tr></thead>
                                            <tbody>
                                                  <tr id ="r1">
                                                    <td>1</td>
                                                    <td>Januari</td>
                                                <td><input type="text" name="1" class="form-control"  id="1" placeholder="%" disabled></td>
                                                </tr>
                                                <tr id ="r2">
                                                    <td>2</td>
                                                    <td>Februari</td>
                                                    <td><input type="text" name="2" class="form-control" id="2" placeholder="%" disabled></td>
                                                </tr>
                                                 <tr id ="r3">
                                                    <td>3</td>
                                                    <td>Maret</td>
                                                    <td><input type="text" name="3" class="form-control" id="3" placeholder="%" disabled></td>
                                                    
                                                </tr>
                                                 <tr id ="r4">
                                                    <td>4</td>
                                                    <td>April</td>
                                                    <td><input type="text" name="4" class="form-control" id="4" placeholder="%" disabled></td>
                                                </tr>
                                                  <tr id ="r5">
                                                    <td>5</td>
                                                    <td>Mei</td>
                                                    <td><input type="text" name="5" class="form-control" id="5" placeholder="%" disabled></td>
                                                    
                                                </tr>
                                                 <tr id ="r6">
                                                    <td>6</td>
                                                    <td>Juni</td>
                                                    <td><input type="text" name="6" class="form-control" id="6" placeholder="%" disabled></td>
                                                   
                                                    
                                                </tr>
                                                  <tr id ="r7">
                                                    <td>7</td>
                                                    <td>Juli</td>
                                                    <td><input type="text" name="7" class="form-control" id="7" placeholder="%" disabled></td>
                                                     
                                                </tr>
                                                 <tr id ="r8">
                                                    <td>8</td>
                                                    <td>Agustus</td>
                                                    <td><input type="text" name="8" class="form-control" id="8" placeholder="%" disabled></td>
                                                    
                                                    
                                                </tr>
                                                <tr id ="r9">
                                                    <td>9</td>
                                                    <td>September</td>
                                                    <td><input type="text" name="9" class="form-control" id="9" placeholder="%" disabled></td>
                                                   
                                                </tr>
                                                <tr id ="r10">
                                                    <td>10</td>
                                                    <td>Oktober</td>
                                                    <td><input type="text" name="10" class="form-control" id="10"placeholder="%" disabled></td>
                                                     
                                                    
                                                </tr>
                                                <tr id ="r11">
                                                    <td>11</td>
                                                    <td>November</td>
                                                    <td><input type="text" name="11" class="form-control" id="11" 
                                                        placeholder="%" disabled></td>
                                                    
                                                    
                                                </tr>
                                                 <tr id ="r12">
                                                    <td>12</td>
                                                    <td>Desember</td>
                                                    <td><input type="text" name="12" class="form-control" id="12" placeholder="%" disabled></td>
                                                    
                                                     
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
      <button type ="submit" class="btn btn-block btn-danger" id="simpanfisik">
        <i class="fa fa-refresh"></i>Simpan
      <div class="ripple-container"></div></button>      
    </div>
</form>
  
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
      var jumlah = (parseInt(y)-parseInt(x)+1);
      var tb = [1,2,3,4,5,6,7,8,9,10,11,12];
      //console.log(tb.length);
      var bulan = [];
      for (i=0; i < jumlah; i++){
        bulan[i] = parseInt(x)+i;
        //document.getElementById('r'+bulan).remove();
      }
      var hb = [];
      for(i=0;i<tb.length;i++){
        //console.log(tb[i]);
        for(j=0;j<bulan.length;j++){
            if(tb[i]==bulan[j]){
                //var hb[] = tb[i];
                //console.log(tb[i]);
                document.getElementById(bulan[j]).removeAttribute('disabled');
                var index = tb.indexOf(tb[i]);
                if (index > -1) {
                    tb.splice(index, 1);
                }
            }
        }
      }
      //console.log(tb);
      for(i=0;i<tb.length;i++){
        document.getElementById('r'+tb[i]).remove();
      }
    

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

  

    





</script>
