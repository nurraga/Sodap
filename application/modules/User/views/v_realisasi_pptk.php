<script src="<?php echo base_url('assets/admin/plugins/input-mask/jquery.inputmask.bundle.js')?>"></script>
<script src="<?php echo base_url('assets/admin/plugins/jquery-spinner/dist/js/jquery.spinner.js')?>"></script>

<script type="text/javascript">
  $(document).ready(function() {
    ajaxtoken();
    totkeu();
    totsisadana();
    $(".select2").select2();
    $('.textarea').wysihtml5()
    $('.harga-satuan').inputmask("numeric",{
      radixPoint: ",",
      groupSeparator: ".",
      digits: 2,
      autoGroup: true,
      prefix: 'Rp ', //No Space, this will truncate the first character
      rightAlign: false,
      autoUnmask : true,
      oncleared: function () {
        self.Value('0');
      }
    });

    $('.harga-jumlah').inputmask("numeric",{
      radixPoint: ",",
      groupSeparator: ".",
      digits: 2,
      autoGroup: true,
      prefix: 'Rp ', //No Space, this will truncate the first character
      rightAlign: false,
      autoUnmask : true,
      oncleared: function () {
        self.Value('0');
      }
    });

    $('.sisadana').inputmask("numeric",{
      radixPoint: ",",
      groupSeparator: ".",
      digits: 2,
      autoGroup: true,
      prefix: 'Rp ', //No Space, this will truncate the first character
      rightAlign: false,
      autoUnmask : true,
      oncleared: function () {
        self.Value('0');
      }
    });

     $('.totkeu').inputmask("numeric",{
      radixPoint: ",",
      groupSeparator: ".",
      digits: 2,
      autoGroup: true,
      prefix: 'Rp ', //No Space, this will truncate the first character
      rightAlign: false,
      autoUnmask : true,
      oncleared: function () {
        self.Value('0');
      }
    });

      $('.totsisadana').inputmask("numeric",{
      radixPoint: ",",
      groupSeparator: ".",
      digits: 2,
      autoGroup: true,
      prefix: 'Rp ', //No Space, this will truncate the first character
      rightAlign: false,
      autoUnmask : true,
      oncleared: function () {
        self.Value('0');
      }
    });
    
     $(".realfisik").inputmask({
       
        greedy: false,
        definitions: {
          '*': {
            validator: "[0-9]"
          }
        },
        rightAlign: true
      });  
 
     $(".realfisik").on('input change',function (e) {
      var x=parseInt($(".realfisik").val());
      var botkeg=$('#botkeg').html();
      if (x>100){
         swal(
            'Ups',
            'Tidak Lebih Dari 100 %, ya :)',
            'info'
          );
         $(".realfisik").val('');
           $(".realbobot").val(0);
         return false;
      }else{
        
       

        
        var bobtreal=x/100*botkeg;
      


        if(isNaN(bobtreal)){
          $(".realbobot").val(0);
        }else{
          $(".realbobot").val( bobtreal.toFixed(2));
        }
      
        
      }
     });

    $('.spinner').spinner('changed', function(e, newVal) {
       // alert(newVal);
        var row = $(this).closest("tr");    // Find the row
        var vol = row.find(".vl").val(); // Find the text
        var hs = row.find(".harga-satuan").val(); // Find the text
        var jumlah =hs.replace(",", ".")*vol;   
        var jumyek = row.find(".jumy").text();
        var totjum = row.find(".totjum").text();
        var totpagu =  row.find(".totpagu").text();
        if(parseInt(vol, 10) > parseInt(jumyek, 10)){
          swal(
            'info',
            'Volume Melebihi Yang di Tetapkan!!!',
            'info'
          );
        }
        if(parseInt(jumlah, 10) > parseInt(totpagu, 10) ) {
            swal(
              'info',
              'Total Jumlah Melebihi Pagu!!!',
              'info'
            );
             
          
              row.find(".sisadana").val(totpagu);
            row.find(".harga-satuan").val(0);
            row.find(".harga-jumlah").val(0);
             totkeu();
             totsisadana();
             return false;
        }else{
          var sisa= parseInt(totjum, 10) - parseInt(jumlah, 10)
          
          row.find(".sisadana").val(sisa);
          row.find(".harga-jumlah").val(jumlah);
           totkeu();
           totsisadana();
        }
        

    });

    $('.harga-satuan').on('input change', function(e, newVal) {
       // alert(newVal);
        var row = $(this).closest("tr");    // Find the row
        var vol = row.find(".vl").val(); // Find the text
        var hs = row.find(".harga-satuan").val(); // Find the text
        var jumlah =hs.replace(",", ".");
        var tarif = row.find(".tarif").text();
        var totpagu =  row.find(".totpagu").text();
        var totjumsd = row.find(".totjum").text();
        if(parseInt(jumlah, 10) > parseInt(tarif, 10)){
          swal(
            'info',
            'Harga Melebihi Harga Yang di Tetapkan!!!',
            'info'
          );
            var sisa= parseInt(totjumsd, 10) - parseInt(totjum, 10)
          
              row.find(".sisadana").val(totpagu);
          row.find(".harga-satuan").val(0);
          row.find(".harga-jumlah").val(0);
           totkeu();
           totsisadana();
          return false;
        }else if(parseInt(vol, 10)===0)
        {
          swal(
            'info',
            'Silahkan Isi Volume!!!',
            'info'
          );
            var sisa= parseInt(totjumsd, 10) - parseInt(totjum, 10)
          
          row.find(".sisadana").val(totpagu);
          row.find(".harga-satuan").val(0);
          row.find(".harga-jumlah").val(0);
           totkeu();
           totsisadana();
          return false;
        }
        else{
          var totjum=jumlah*vol;
          if(parseInt(totjum, 10) > parseInt(totpagu, 10)){
            swal(
              'info',
              'Total Jumlah Melebihi Pagu!!!',
              'info'
            );
              var sisa= parseInt(totjumsd, 10) - parseInt(totjum, 10)
          
              row.find(".sisadana").val(totpagu);
              row.find(".harga-satuan").val(0);
              row.find(".harga-jumlah").val(0);
               totkeu();
               totsisadana();
              return false;
           }else{
             var sisa= parseInt(totjumsd, 10) - parseInt(totjum, 10)
          
              row.find(".sisadana").val(sisa);
             row.find(".harga-jumlah").val(totjum);
             totkeu();
             totsisadana();
           }
        }
      
    });
  });
function totkeu(){
    var arr = $(".harga-jumlah");
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }

    $(".totkeu").val(tot);
    
}
function totsisadana(){
    var arr = $(".sisadana");
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }
      $(".totsisadana").val(tot);
    
}
$(function () {
  $('#formrealisasi').submit(function (e, params) {
    var localParams = params || {};
    if (!localParams.send) {
      e.preventDefault();
    }
    swal({
      title: "Simpan Realisasi",
      text: "Pastikan data sudah benar",
      type: "info",
      showCancelButton: true,
      confirmButtonColor: "#367FA9",
      confirmButtonText: "Ya, Simpan",
      cancelButtonText: "Tidak, Batal!",
      closeOnConfirm: false,
      closeOnCancel: false
    }, function (isConfirm) {
      if (isConfirm) {
        Pace.restart ();
        Pace.track (function (){
        var token   = localStorage.getItem("token");
        var tab     = $('#idtab').html();
        var botkeg  = $('#botkeg').html();
        var bulan   = $('#idbulan').html();
        var tahun   = $('#idtahun').html();
        
        var realkeu   = $('#realkeu').val();
        var totsdana   = $('#totsdana').val();
        var realfisik   = $('#realfisik').val();
        var realbobot   = $('#realbobot').val();
        var formData = new FormData($('#formrealisasi')[0]);
        formData.append("token",token);
        formData.append("idtab",tab);
        formData.append("botkeg",botkeg);
        formData.append("bulan",bulan);
        formData.append("tahun",tahun);
        formData.append("realkeu",realkeu);
        formData.append("totsdana",totsdana);
        formData.append("realfisik",realfisik);
        formData.append("realbobot",realbobot);
        $.ajax({
          url: base_url+"User/simpanrealisasi",
          type: 'POST',
          data: formData,
          mimeType: "multipart/form-data",
          contentType: false,
          cache: false,
          processData: false,
          success: function(result){
            var jsonData = JSON.parse(result);     
              if (jsonData.data[0].status == false){
                swal(
                  'info',
                  'Terjadi Kesalahan saat simpan!!!',
                  'info'
                );
                ajaxtoken();
              }else{
                ajaxtoken();
                swal({
                  title: "Sukses",
                  text: "Data berhasil disimpan!!!",
                  type: "success",
                  showCancelButton: false,
                  confirmButtonColor: "#008D4C",
                  confirmButtonText: "OK",
                  cancelButtonText: "",
                  closeOnConfirm: false,
                  closeOnCancel: false
                },function(isConfirm){
                  if(isConfirm){
                    swal.close();
                       window.location.href = base_url+"User/dafkeg/"; 
                  }
                });
              }
          },
          error: function(jqXHR, textStatus, errorThrown){
            swal({
              title: 'Kesalahan !!',
              text: 'Gagal Simpan Data',
              type: 'error',
              confirmButtonClass: "btn btn-danger",
              buttonsStyling: false
            })
          }
        });
        });
      } else {
        swal("Batal", "Batal Simpan", "error");
      }
    });
  });
});
</script>

<section class="content-header">
  <h1>
    SODAP
    <small>Kota Payakumbuh</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    
</ol>
</section>
<section class="content">

    
  
    <div class="callout callout-info">
      <div class="row">
          <div class="col-xs-12 col-md-12 col-md-offset-1">
             <br>
              <p id="kdunit"><?php echo $idopd ?></p>
              <p id="kdkeg"><?php echo $kdkeg ?></p>
              <p id="idtab"><?php echo $idtab ?></p>
              <p id="idtahun"><?php echo $tahun ?></p>
              <p id="idbulan"><?php echo $bulan ?></p>
             <div class="row">
                <div class="col-md-2 col-sm-2" style="text-align: left">Organisasi</div>
                <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                <div class="col-md-9 col-sm-9" style="padding-left: 25px"><?php echo $nmopd ?></div>
            </div>
            <br>

            <div class="row">
                <div class="col-md-2 col-sm-2" style="text-align: left">Tahun</div>
                <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                <div class="col-md-9 col-sm-9" style="padding-left: 25px"><?php echo $tahun ?></div>
        </div>
        <br>



    </div>

</div>

</div>

<div class="row">
        
      <div class="col-md-3 col-sm-6 col-xs-12">
        <a class="btn btn-block btn-social btn-success" id="btn-kembali">
          <i class="fa fa-arrow-left"></i> Kembali 
        </a> 
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
      
        </div>
         
        <div class="col-md-3 col-sm-6 col-xs-12">
        

        </div>
        
        
      
      </div>
      <br>
<!-- Default box -->

<div class="box box-primary">
  <div class="box-header with-border">
    <i class="fa fa-text-width"></i>
    <h3 class="box-title">Form Realisasi</h3>
  </div>
  <div class="box-body">
    <form id="formrealisasi" enctype="multipart/form-data" role="form" autocomplete="off"> 

    <div class="row">
      <div class="col-md-2 col-sm-2 col-xs-12">  
      </div>
      <div class="col-md-8 col-sm-8 col-xs-12">
        <h2 class="text-center">Realisasi Kegiatan</h2>
      </div>
      <div class="col-md-2 col-sm-2 col-xs-12">
      </div> 
    </div>
    <div class="row">
      <div class="col-md-2 col-sm-2 col-xs-12">  
      </div>
      <div class="col-md-8 col-sm-8 col-xs-12">
       <h3 class="text-center"><?php echo $prog ?></h3>
     </div>
     <div class="col-md-2 col-sm-2 col-xs-12">
     </div> 
   </div>
   <hr>
   <div class="row">
    <div class="col-md-1 col-sm-1 col-xs-12">        
    </div>
    <div class="col-md-2 col-sm-2 col-xs-12">  
     <h4 class="text-left text-muted">Kegiatan</h4>
   </div>
   <div class="col-md-1 col-sm-1 col-xs-12">  
    <h4 class="text-center text-muted">:</h4>
  </div>
  <div class="col-md-6 col-sm-8 col-xs-12">
    <h4 class="text-left text-muted"><?php echo $keg ?></h4>
  </div>
  <div class="col-md-2 col-sm-2 col-xs-12">
  </div> 
</div>
<div class="row">
  <div class="col-md-1 col-sm-1 col-xs-12">  

  </div>
  <div class="col-md-2 col-sm-2 col-xs-12">  
   <h4 class="text-left text-muted">Pagu Dana</h4>
 </div>
 <div class="col-md-1 col-sm-1 col-xs-12">  
  <h4 class="text-center text-muted">:</h4>
</div>
<div class="col-md-6 col-sm-8 col-xs-12">
 <h4 class="text-left text-muted"><?php echo $this->template->rupiah($nl) ?></h4>
</div>
<div class="col-md-2 col-sm-2 col-xs-12">
</div> 
</div>
<div class="row">
  <div class="col-md-1 col-sm-1 col-xs-12">        
  </div>
  <div class="col-md-2 col-sm-2 col-xs-12">  
   <h4 class="text-left text-muted">Bobot Kegiatan</h4>
 </div>
 <div class="col-md-1 col-sm-1 col-xs-12">  
  <h4 class="text-center text-muted">:</h4>
</div>
<div class="col-md-6 col-sm-8 col-xs-12">
 <h4 class="text-left text-muted" id="botkeg"><?php echo $bobot ?></h4>
</div>
<div class="col-md-2 col-sm-2 col-xs-12">
</div> 
</div>
<div class="row">
  <div class="col-md-1 col-sm-1 col-xs-12">        
  </div>
  <div class="col-md-2 col-sm-2 col-xs-12">  
   <h4 class="text-left text-muted">Nama PPK</h4>
 </div>
 <div class="col-md-1 col-sm-1 col-xs-12">  
  <h4 class="text-center text-muted">:</h4>
</div>
<div class="col-md-6 col-sm-8 col-xs-12">
 <h4 class="text-left text-muted"><?php echo $ppk ?></h4>
</div>
<div class="col-md-2 col-sm-2 col-xs-12">
</div> 
</div>
<div class="row">
  <div class="col-md-1 col-sm-1 col-xs-12">        
  </div>
  <div class="col-md-2 col-sm-2 col-xs-12">  
   <h4 class="text-left text-muted">Bulan</h4>
 </div>
 <div class="col-md-1 col-sm-1 col-xs-12">  
  <h4 class="text-center text-muted">:</h4>
</div>
<div class="col-md-6 col-sm-8 col-xs-12">
 <h4 class="text-left text-muted"><?php echo $bulan ?></h4>
</div>
<div class="col-md-2 col-sm-2 col-xs-12">
</div> 
</div>
<hr>
<table class="table table-bordered ">
  <thead >
    <tr>
      <th rowspan="3" style="vertical-align : middle;text-align:center; width: 100px">Kode Rekening</th>
      <th rowspan="3" style="vertical-align : middle;text-align:center; width: 160px">Uraian</th>
      <th colspan="4"  style="vertical-align : middle;text-align:center;">ANGGARAN</th>
      <th rowspan="3" style="vertical-align : middle;text-align:center; width: 80px">SUMBER DANA</th>
      <th colspan="3" style="vertical-align : middle;text-align:center;">REALISASI</th>
      <th rowspan="3" style="vertical-align : middle;text-align:center; width: 130px">SISA DANA</th>
    </tr>
    <tr>
      <th colspan="3" style="vertical-align : middle;text-align:center;">Rincian Perhitungan</th>
      <th rowspan="2" style="vertical-align : middle;text-align:center; width: 120px">Jumlah Pagu</th>
      <th rowspan="2" style="vertical-align : middle;text-align:center;  width: 120px">Volume</th>
      <th rowspan="2" style="vertical-align : middle;text-align:center; width: 130px">Harga Satuan</th>
      <th rowspan="2" style="vertical-align : middle;text-align:center; width: 130px">Jumlah</th>
    </tr>
    <tr>
      <th style="vertical-align : middle;text-align:center; width: 70px">Volume</th>
      <th style="vertical-align : middle;text-align:center; width: 70px">Satuan</th>
      <th style="vertical-align : middle;text-align:center; width: 120px">Harga Satuan</th>
    </tr>
            
  </thead>
  
                <tbody>
                     <?php
                     foreach ($header as $hrow){
                      $unitkey=$hrow['unitkey'];
                      $kdkegunit=$hrow['kdkegunit'];
                      $mtgkey=$hrow['mtgkey'];
                      $jkrek=substr($hrow['kdper'],0,6);
                      if($jkrek=='5.2.3.'){
                        $class='danger';
                      }else{
                        $class='active';
                      }
                    echo'<tr class ="'.$class.'">
                      
                      <td class="unit" style="display:none;">'.$hrow['unitkey'].'</td>
                      <td class="keg" style="display:none;">'.$hrow['kdkegunit'].'</td>
                      <td class="mtgkey" style="display:none;">'.$hrow['mtgkey'].'</td>
                      <td><b>'.$hrow['kdper'].'</b></td>
                      <td><b>'.$hrow['nmper'].'</b></td>
                      <td colspan="3"></td>
                      <td style="text-align:right"><b>'.$this->template->rupiah($hrow['nilai']).'</b></td>
                      <td colspan="5"></td>
                      </tr>';
                        $thn='2018';
                        $this->db->where('`dpa221`.`tahun`', $thn);
                        $this->db->where('`dpa221`.`unitkey`', $unitkey);
                        $this->db->where('`dpa221`.`kdkegunit`', $kdkegunit); 
                        $this->db->where('`dpa221`.`mtgkey`', $mtgkey);        
                        $detail=$this->db->get('dpa221')->result_array();
                        foreach ($detail as $row){
                          $jumyek=$row['jumbyek'];
                          $tarif=$row['tarif'];
                          $total=$jumyek*$tarif;
                          $jkrek=substr($hrow['kdper'],0,6);
                          if($jkrek=='5.2.3.'){
                            $class='warning';
                          }else{
                             $class='';
                          }
                          echo'<tr class ="'.$class.'">   
                              <td><input type="hidden" class="form-control" readonly name="kdrek[]"  value='.$hrow['kdper'].'></td>
                              <td style="display:none;"><input type="hidden" class="form-control" readonly name="iddpa[]"  value='.$row['id'].'></td>
                              <td class="tarif" style="display:none;">'.$tarif.'</td>
                              <td class"text-muted"> - '.$row['uraian'].'</td>
                              <td class="jumy" style="display:none;">'.$jumyek.'</td>
                              <td class="totpagu" style="display:none;">'.$total.'</td>
                              <td class"text-muted" style="text-align:right">'.$jumyek.'</td>
                              <td class"text-muted" style="text-align:center">'.$row['satuan'].'</td>
                              <td class"text-muted" style="text-align:right">'.$this->template->rupiah($tarif) .'</td>
                              <td class"text-muted" style="text-align:right">'.$this->template->rupiah($total) .'</td>
                               <td class="totjum" style="display:none;">'.$total.'</td>
                              <td >  <select class="form-control select2" name="sumberdn[]" style="width: 100%;">';  
                               $sdana= $this->User_model->sumberdana();  
                              foreach ($sdana as $k) {
                                if($k['id']==1){
                                   echo "<option selected='selected' value='{$k['id']}'>{$k['nm_dana']}</option>";
                                }else{
                                  echo "<option value='{$k['id']}'>{$k['nm_dana']}</option>";
                                }
                              }

                              echo'</select></td>  
                              <td><div class="input-group spinner" data-trigger="spinner">
                                <input type="text" class="form-control text-center vl" value="0" name="volume[]" data-rule="quantity">
                                <div class="input-group-addon">
                                  <a href="javascript:;" class="spin-up" data-spin="up"><i class="fa fa-caret-up"></i></a>
                                  <a href="javascript:;" class="spin-down" data-spin="down"><i class="fa fa-caret-down"></i></a>
                                </div>
                              </div></td>  
                                <td><input type="text" class="form-control harga-satuan" name="hrsatuan[]"></td>  
                                <td><input type="text" class="form-control harga-jumlah" readonly name="jum[]"></td>  
                                <td><input type="text" class="form-control sisadana" readonly name="sisadn[]"value='.$total.'></td>             
                          </tr>';
                        }
                      }                   
                     ?>
                
               
            
               
              </tbody>
            </table>
    </div>
    <br>
   
<!-- /.box-body -->

<!-- <div class="box-footer">
  Footer
</div> -->
<!-- /.box-footer-->

</div>
<!-- /.box -->
<div class="box box-primary">
  <div class="box-header with-border">
   
  </div>
  <div class="box-body">
 <div class="row">
    <div class="col-md-1 col-sm-1 col-xs-12">        
    </div>
    <div class="col-md-2 col-sm-2 col-xs-12">  
     <h4 class="text-left text-muted">Realisasi Keuangan</h4>
   </div>
   <div class="col-md-1 col-sm-1 col-xs-12">  
    <h4 class="text-center text-muted">:</h4>
  </div>
  <div class="col-md-3 col-sm-3 col-xs-12">
    <h4 class="text-left text-muted"><input type="text" class="form-control totkeu" id="realkeu"  readonly style="text-align:right"></h4>
  </div>
  <div class="col-md-2 col-sm-2 col-xs-12">
  </div> 
</div>
<div class="row">
    <div class="col-md-1 col-sm-1 col-xs-12">        
    </div>
    <div class="col-md-2 col-sm-2 col-xs-12">  
     <h4 class="text-left text-muted">Total Sisa Dana</h4>
   </div>
   <div class="col-md-1 col-sm-1 col-xs-12">  
    <h4 class="text-center text-muted">:</h4>
  </div>
  <div class="col-md-3 col-sm-3 col-xs-12">
    <h4 class="text-left text-muted"><input type="text" class="form-control totsisadana" id="totsdana"  readonly style="text-align:right"></h4>
  </div>
  <div class="col-md-2 col-sm-2 col-xs-12">
  </div> 
</div>
<div class="row">
    <div class="col-md-1 col-sm-1 col-xs-12">        
    </div>
    <div class="col-md-2 col-sm-2 col-xs-12">  
     <h4 class="text-left text-muted">Realisasi Fisik</h4>
   </div>
   <div class="col-md-1 col-sm-1 col-xs-12">  
    <h4 class="text-center text-muted">:</h4>
  </div>
   <div class="col-md-3 col-sm-3 col-xs-12">
    <div class="input-group">
                  <input type="text" class="realfisik form-control" id="realfisik" >
                  <div class="input-group-addon">
                  <i class="fa fa-percent"></i>
                  </div>
    </div>
    
  </div>
  <div class="col-md-2 col-sm-2 col-xs-12">
  </div> 
</div>
<div class="row">
    <div class="col-md-1 col-sm-1 col-xs-12">        
    </div>
    <div class="col-md-2 col-sm-2 col-xs-12">  
     <h4 class="text-left text-muted">Bobot Realisasi</h4>
   </div>
   <div class="col-md-1 col-sm-1 col-xs-12">  
    <h4 class="text-center text-muted">:</h4>
  </div>
   <div class="col-md-3 col-sm-3 col-xs-12">
     <div class="input-group">
                  <input type="text" class="realbobot form-control" id="realbobot"  style="text-align: right;" readonly>
                  <div class="input-group-addon">
                  <i class="fa fa-percent"></i>
                  </div>
                  </div>
   
  </div>
  <div class="col-md-2 col-sm-2 col-xs-12">
  </div> 
</div>
<div class="row">
    <div class="col-md-1 col-sm-1 col-xs-12">        
    </div>
    <div class="col-md-2 col-sm-2 col-xs-12">  
     <h4 class="text-left text-muted">Permasalahan</h4>
   </div>
   <div class="col-md-1 col-sm-1 col-xs-12">  
    <h4 class="text-center text-muted">:</h4>
  </div>
  <div class="col-md-7 col-sm-7 col-xs-12">
    <textarea class="textarea" id="masalah" name="masalah"  placeholder="Jika Ada Permasalahan"
                       style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
  </div>
  <div class="col-md-2 col-sm-2 col-xs-12">
  </div> 
</div>
  </div>
  <div class="box-footer">
      <div class="row">

  <div class="col-md-3 col-sm-6 col-xs-12">
   
  </div>
  <div class="col-md-3 col-sm-6 col-xs-12">
  </div>
  <div class="col-md-3 col-sm-6 col-xs-12">

  </div>

  <div class="col-md-3 col-sm-6 col-xs-12 button-all">
 <button type="submit" class="btn btn-block btn-social btn-flat btn-success" data-toggle="tooltip" title="Simpan Semua Target Fisik"><i class="fa  fa-save"></i>Simpan Realisasi</button>

  </div>



  </div>
  </div>
  </div>
 </form>
</section>


