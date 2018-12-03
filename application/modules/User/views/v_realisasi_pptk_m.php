<script src="<?php echo base_url('assets/admin/plugins/input-mask/jquery.inputmask.bundle.js')?>"></script>
<script src="<?php echo base_url('assets/admin/plugins/jquery-spinner/dist/js/jquery.spinner.js')?>"></script>

<script type="text/javascript">

  $(document).ready(function() {
    var bln =0;
    var thn =0;
    var tgl =0;
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
       $('.hr').inputmask("numeric",{
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
    $('#nilaikontrak').inputmask("numeric",{
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

      // $("#nilaikontrak").focusout(function() {
   $("#nilaikontrak").on('input change',function (e) {
        var pagu=$('#pagubmodalbln').html();
        var val= this.value;
        // newStr = parseInt(numbers.replace(/_/g, ""), 10);
        console.log(val +'-'+ pagu);
        if(parseInt(val,10) > parseInt(pagu,10)){
          swal(
            'Upss ',
            'Total Melebihi Pagu',
            'info'
          )
          $("#nilaikontrak").val(0);

          return false;
        }
       // jumlah = jumlah > 100 ? swal(
       //      'info',
       //      'Target Fisik Belanja Modal Sudah di Entri',
       //      'info'
       //    ) this.select(): jumlah;
      });
  // $('#nilaikontrak').on('input change', function(e) {
  //
  // // console.log(pagumodal);
  //   if(this.value > $('#pagubmodalbln').html()){
  //     swal(
  //        'Ups',
  //        'Melebihi Pagu Belanja Modal',
  //        'info'
  //      );
  //     self.Value(0);
  //      return false;
  //   }
  // });

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

     $("#realfisikbljmodal").on('input change',function (e) {
      var x=parseInt($("#realfisikbljmodal").val());
      var y = parseInt($('#realfissudah').html());
      var xy= x+y;
      var botblj=$('#bobotbljmodal').val();
      if (xy>100){
         swal(
            'Ups',
            'Tidak Lebih Dari 100 %, ya :)',
            'info'
          );
         $("#realfisikbljmodal").val('');
           $("#realbobotbljmodal").val(0);
         return false;
      }else{

        var bobtreal=x/100*botblj;

        if(isNaN(bobtreal)){
          $("#realbobotbljmodal").val(0);
        }else{
          $("#realbobotbljmodal").val( bobtreal.toFixed(2));
        }


      }
     });

    $('.spinner').spinner('changed', function(e, newVal) {
       // alert(newVal);
        var row = $(this).closest("tr");    // Find the row
        var vol = row.find(".vl").val();

        var res = row.find(".rek").val();
        var rek = res.replace(/\./g, "-");
        var hs = row.find(".harga-satuan").val(); // Find the text
        var jumlah =hs.replace(",", ".")*vol;
        var jumyek = row.find(".jumy").text();
        var totjum = row.find(".totjum").text();
        var totpagu =  row.find(".totpagu").text();
        var totpagubln =  row.find(".totpagubln"+rek).text();

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
              totperrek(rek);
              totkeu();
              totsisadana();
             return false;
        }else{
          var sisa= parseInt(totjum, 10) - parseInt(jumlah, 10)

          row.find(".sisadana").val(sisa);
          row.find(".harga-jumlah").val(jumlah);
           var tot = totperrek(rek);
            if(tot > totpagubln){
               swal(
              'info',
              'Total Jumlah Melebihi Pagu Bulan Sekarang!!!',
              'info'
            );
                row.find(".sisadana").val(totpagu);
                row.find(".harga-satuan").val(0);
                row.find(".harga-jumlah").val(0);
              totperrek(rek);
              totkeu();
              totsisadana();
             return false;
            }

           totkeu();
           totsisadana();
        }


    });

    $('.harga-satuan').on('input change', function(e, newVal) {
       // alert(newVal);
        var row = $(this).closest("tr");    // Find the row
        var vol = row.find(".vl").val();
        var res = row.find(".rek").val();

        var rek = res.replace(/\./g, "-");
        var hs = row.find(".harga-satuan").val(); // Find the text
        var jumlah =hs.replace(",", ".");
        var tarif = row.find(".tarif").text();
        var totpagu =  row.find(".totpagu").text();
        var totpagubln =  row.find(".totpagubln"+rek).text();

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
          totperrek(rek);

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
           totperrek(rek);

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
              totperrek(rek);

              totkeu();
              totsisadana();

              return false;
           }else{
             var sisa= parseInt(totjumsd, 10) - parseInt(totjum, 10)

              row.find(".sisadana").val(sisa);
             row.find(".harga-jumlah").val(totjum);
             var tot = totperrek(rek);
              if(tot > totpagubln){
                 swal(
                'info',
                'Total Jumlah Melebihi Pagu Bulan Sekarang!!!',
                'info'
              );
                  row.find(".sisadana").val(totpagu);
                  row.find(".harga-satuan").val(0);
                  row.find(".harga-jumlah").val(0);
                totperrek(rek);
                totkeu();
                totsisadana();
               return false;
              }
             totkeu();
             totsisadana();
           }
        }

    });
    $(".btnrealfisik").click(function() {
      ajaxtoken();
        var row = $(this).closest("tr");    // Find the row
        var res = row.find(".rekheader").text();
        var rek = res.replace(/\./g, "-");
        var nmrek = row.find(".nmrekheader").text();
        var mtgkey = row.find(".mtgkey").text();
        var totpagubln =  row.find(".totpagubln"+rek).text();
        var indexbln = $('#indexbulan').html();
        var idtab = $('#idtab').html();
        var token   = localStorage.getItem("token");
        $.ajax({
          url: base_url+"User/cekrealbmodal/"+Math.random(),
          type: "POST",
          data: {
            token   : token,
            idtab   : idtab,
            mtgkey  : mtgkey,
            indexbulan : indexbln
          },
          dataType: "JSON",
          success: function(result){



              if (result.data[0].code == 0){

                modalrealisasi({
                      buttons: {
                        batal: {
                          id    : 'btn-modal-tutup',
                          type  : 'button',
                          css   : 'btn-danger btn-raised btn-flat ',
                          label : 'Tutup'
                        },
                        simpan: {
                          id    : 'btn-modal-simpan',
                          type  : 'submit',
                          css   : 'btn-info btn-raised btn-flat btn-bitbucket',
                          label : 'Simpan'
                        }
                      },
                      title: 'Realiasasi Belanja Modal',
                      rek:res,
                      nmrek:nmrek,
                      mtgkey:mtgkey,
                      paguprbln:totpagubln,
                      status : result.data[0].code


                    });
              }else if(result.data[0].code == 1){
                  //code 1 = Master sudah ada tetapi detail belum ada
                modalrealisasi({
                      buttons: {
                        batal: {
                          id    : 'btn-modal-tutup',
                          type  : 'button',
                          css   : 'btn-danger btn-raised btn-flat ',
                          label : 'Tutup'
                        },
                        simpan: {
                          id    : 'btn-modal-simpan',
                          type  : 'submit',
                          css   : 'btn-info btn-raised btn-flat btn-bitbucket',
                          label : 'Simpan'
                        }
                      },
                      title: 'Realiasasi Belanja Modal',
                      rek:res,
                      nmrek:nmrek,
                      mtgkey:mtgkey,
                      paguprbln:totpagubln,
                      nlktrk:result.data[0].nilai_ktrk,
                      pbj:result.data[0].pbj,
                      awlktrk : result.data[0].awlktrk,
                      akrktrk : result.data[0].akrktrk,
                      spmk    : result.data[0].spmk,
                      noktrk  : result.data[0].noktrk,
                      status : result.data[0].code,
                      realfisik : result.data[0].realfisik,
                      idbmodal : result.data[0].idbmodal
                    });
              }else if(result.data[0].code == 2){
                swal({
                  title: 'Info',
                  text: 'Realisasi Belanja Modal Sudah 100%',
                  type: 'info',
                  confirmButtonClass: "btn btn-danger",
                  buttonsStyling: false
                })
              }else{
                //code 3 = realisasi belum 100 persen dan masih bisa tambah
                modalrealisasi({

                      buttons: {
                        batal: {
                          id    : 'btn-modal-tutup',
                          type  : 'button',
                          css   : 'btn-danger btn-raised btn-flat ',
                          label : 'Tutup'
                        },
                        simpan: {
                          id    : 'btn-modal-simpan',
                          type  : 'submit',
                          css   : 'btn-info btn-raised btn-flat btn-bitbucket',
                          label : 'Simpan'
                        }
                      },
                      title: 'Realiasasi Belanja Modal3',
                      rek:res,
                      nmrek:nmrek,
                      mtgkey:mtgkey,
                      paguprbln:totpagubln,
                      nlktrk:result.data[0].nilai_ktrk,
                      pbj:result.data[0].pbj,
                      awlktrk : result.data[0].awlktrk,
                      akrktrk : result.data[0].akrktrk,
                      spmk    : result.data[0].spmk,
                      noktrk  : result.data[0].noktrk,
                      status : result.data[0].code,
                      realfisik : result.data[0].realfisik,
                      idbmodal : result.data[0].idbmodal

                    });

              }
              // if (jsonData.data[0].status == false){
              //
              // }else{
              //
              // }
          },
          error: function(jqXHR, textStatus, errorThrown){

            swal({
              title: 'Kesalahan !!',
              text: 'Reload Lagi',
              type: 'error',
              confirmButtonClass: "btn btn-danger",
              buttonsStyling: false
            })
              ajaxtoken();
          }
        });



            var bulan = {
              'January':'0','February':'1',
              'March':'2','April':'3','May':'4',
              'June':'5','July':'6','August':'7',
              'September':'8','October':'9',
              'November':'10','December':'11'};
            $('#awalktr').datepicker({
             format: "dd MM yyyy",
             language: "id",
             autoclose: true

           }).on("input change", function (e) {

             var namabln =this.value;
             var convert = namabln.split(" ");

             tgl = convert[0];
             bln = bulan[convert[1]];
             thn = convert[2];
             // console.log(tgl +'-'+ bln +'-'+thn);
             $('#akhirktr').datepicker('setDate', null);
             $('#akhirktr').datepicker('destroy');
             $('#akhirktr').datepicker({
                 format: "dd MM yyyy",

                 autoclose: true,
                 startDate: new Date(thn,bln,tgl),


               }).on("input change", function (e) {
                 var namabln2 =this.value;
                 var convert2 = namabln2.split(" ");
                 var tgl2 = convert2[0];
                 var bln2 = bulan[convert2[1]];
                 var thn2 = convert2[2];
                 $('#spmk').datepicker('setDate', null);
                 $('#spmk').datepicker('destroy');
                 $('#spmk').datepicker({
                     format: "dd MM yyyy",
                     autoclose: true,
                     startDate: new Date(thn,bln,tgl),
                     endDate: new Date(thn2,bln2,tgl2)

                   });

               });
             });

    });

  });
function totperrek(rek){
     var arr = $("."+rek);
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }
    //console.log(tot);
    var pagubulan =  $(".pg"+rek).val();
    var hs= parseInt(pagubulan)-tot;

    $(".harga-rek"+rek).val(tot);
    $(".sisadana"+rek).val(hs);


     return tot;

}
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
    var arr = $(".nsisadana");
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }
      $(".totsisadana").val(tot);


}

$(function () {
  $('#formrealisasibljmodal').submit(function (e, params) {
    var localParams = params || {};
    if (!localParams.send) {
      e.preventDefault();
    }
    ajaxtoken();
    var status =  $('#idbmodal').html();
    if(status==0){
      swal({
        title: "Simpan Realisasi Belanja Modal",
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
          var mtgkey  = $('#mtgkey').html();
            var bulan   = $('#idbulan').html();
              var tahun   = $('#idtahun').html();
                var nilaikontrak   = $('#nilaikontrak').val();

          var formData = new FormData($('#formrealisasibljmodal')[0]);
          formData.append("token",token);
          formData.append("tahun",tahun);
          formData.append("bulan",bulan);
          formData.append("idtab",tab);
          formData.append("mtgkey",mtgkey);
          formData.append("nilaikontrak",nilaikontrak);
          $.ajax({
            url: base_url+"User/simpanrealisasibmodal",
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
                           $('#modalrealisasi').modal('hide');
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
    }else{
      swal({
        title: "Tambah Belanja Modal",
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
          var tabbmodal     = status;
          var bulan   = $('#idbulan').html();
          var tahun   = $('#idtahun').html();
          var formData = new FormData($('#formrealisasibljmodal')[0]);
          formData.append("token",token);
          formData.append("tabbmodal",tabbmodal);
          formData.append("tahun",tahun);
          formData.append("bulan",bulan);

          $.ajax({
            url: base_url+"User/simpanrealisasibmodaldet",
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
                           $('#modalrealisasi').modal('hide');
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
    }

    });
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
                console.log(result);
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
              <p id="indexbulan"><?php echo $indexbulan ?></p>

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
      <th colspan="4"  style="vertical-align : middle;text-align:center;">ANGGARAN TAHUN SEKARANG</th>
       <th rowspan="3" style="vertical-align : middle;text-align:center; width: 130px">BULAN SEKARANG</th>
      <th rowspan="3" style="vertical-align : middle;text-align:center; width: 80px">SUMBER DANA</th>
      <th colspan="3" style="vertical-align : middle;text-align:center;">REALISASI</th>
      <th rowspan="3" style="vertical-align : middle;text-align:center; width: 130px">SISA DANA</th>

    </tr>
    <tr>
      <th colspan="3" style="vertical-align : middle;text-align:center;">Rincian Perhitungan</th>
      <th rowspan="2" style="vertical-align : middle;text-align:center; width: 120px">Jumlah Pagu / Th</th>
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
                      $clasrek=str_replace(".","-",$hrow['kdper']);
                      if($jkrek=='5.2.3.'){

                      $class='danger';

                      $this->db->select('
                      ,SUM(`dpa221`.`jumbyek` *`dpa221`.`tarif`) as nilai');
                      $this->db->from('dpa221');
                      $this->db->where('`dpa221`.`tahun`', $tahun);
                      $this->db->where('`dpa221`.`unitkey`', $idopd);
                      $this->db->where('`dpa221`.`kdkegunit`', $kdkeg);
                      $this->db->where('`dpa221`.`mtgkey`', $mtgkey);
                      $nltahun=$this->db->get()->row();


                      echo'<tr class ="'.$class.'">

                      <td class="unit" style="display:none;">'.$hrow['unitkey'].'</td>
                      <td class="keg" style="display:none;">'.$hrow['kdkegunit'].'</td>
                      <td class="mtgkey" style="display:none;">'.$hrow['mtgkey'].'</td>
                      <td class="rekheader"><b>'.$hrow['kdper'].'</b></td>
                      <td class="nmrekheader"><b>'.$hrow['nmper'].'</b></td>
                      <td colspan="3"></td>
                      <td style="text-align:right"><b>'.$this->template->rupiah($nltahun->nilai).'</b></td>

                      <td class="totpagubln'.$clasrek.'" style="display:none;">'.$hrow['nilai'].'</td>
                        <td style="display:none;"><input type="text" class="form-control pg'.$clasrek.'"  readonly value='.$hrow['nilai'].'></td>
                      <td style="text-align:right"><b>'.$this->template->rupiah($hrow['nilai']).'</b></td>
                      <td style="display:none;"><input type="text" class="form-control nsisadana sisadana'.$clasrek.'"  readonly value='.$hrow['nilai'].'></td>
                      <td colspan="3"></td>
                      <td colspan="2" style="vertical-align : middle;text-align:center;"><button type="button" class="btnrealfisik btn bg-blue btn-flat bm'.$clasrek.'">Entri Belanja Modal<div class="ripple-container"></div></button></td>
                      </tr>';

                        $this->db->where('`dpa221`.`tahun`', $tahun);
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
                           <td class="totpagubln'.$clasrek.'" style="display:none;">'.$hrow['nilai'].'</td>
                              <td><input type="hidden" class="form-control exrek" readonly name="exkdrek[]"  value='.$hrow['kdper'].'></td>
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
                             <td colspan="6"></td>
                          </tr>';
                        }
                      }else{

                        $class='active';

                      $this->db->select('
                      ,SUM(`dpa221`.`jumbyek` *`dpa221`.`tarif`) as nilai');
                      $this->db->from('dpa221');
                      $this->db->where('`dpa221`.`tahun`', $tahun);
                      $this->db->where('`dpa221`.`unitkey`', $idopd);
                      $this->db->where('`dpa221`.`kdkegunit`', $kdkeg);
                      $this->db->where('`dpa221`.`mtgkey`', $mtgkey);
                      $nltahun=$this->db->get()->row();

                      echo'<tr class ="'.$class.'">

                      <td class="unit" style="display:none;">'.$hrow['unitkey'].'</td>
                      <td class="keg" style="display:none;">'.$hrow['kdkegunit'].'</td>
                      <td class="mtgkey" style="display:none;">'.$hrow['mtgkey'].'</td>
                      <td><b>'.$hrow['kdper'].'</b></td>
                      <td><b>'.$hrow['nmper'].'</b></td>
                      <td colspan="3"></td>
                      <td style="text-align:right"><b>'.$this->template->rupiah($nltahun->nilai).'</b></td>
                      <td class="totpagubln'.$clasrek.'" style="display:none;">'.$hrow['nilai'].'</td>
                      <td style="display:none;"><input type="text" class="form-control pg'.$clasrek.'"  readonly value='.$hrow['nilai'].'></td>
                      <td style="text-align:right"><b>'.$this->template->rupiah($hrow['nilai']).'</b></td>
                      <td style="display:none;"><input type="text" class="form-control nsisadana sisadana'.$clasrek.'"  readonly value='.$hrow['nilai'].'></td>
                      <td colspan="3"></td>
                     <td><input type="text" class="form-control hr harga-rek'.$clasrek.'" readonly name="jumperrek[]"></td>
                      <td ></td>
                      </tr>';

                        $this->db->where('`dpa221`.`tahun`', $tahun);
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
                              <td class="totpagubln'.$clasrek.'" style="display:none;">'.$hrow['nilai'].'</td>
                              <td style="display:none;"><input type="hidden" class="form-control" readonly name="detpgblnskr[]"  value='.$hrow['nilai'].'></td>
                              <td><input type="hidden" class="form-control rek" readonly name="kdrek[]"  value='.$hrow['kdper'].'></td>
                              <td style="display:none;"><input type="hidden" class="form-control" readonly name="iddpa[]"  value='.$row['id'].'></td>
                              <td style="display:none;"><input type="hidden" class="form-control" readonly name="mtgkey[]"  value='.$mtgkey.'></td>
                              <td class="tarif" style="display:none;">'.$tarif.'</td>
                              <td class"text-muted"> - '.$row['uraian'].'</td>
                              <td class="jumy" style="display:none;">'.$jumyek.'</td>
                              <td class="totpagu" style="display:none;">'.$total.'</td>
                              <td class"text-muted" style="text-align:right">'.$jumyek.'</td>
                              <td class"text-muted" style="text-align:center">'.$row['satuan'].'</td>
                              <td class"text-muted" style="text-align:right">'.$this->template->rupiah($tarif) .'</td>
                              <td class"text-muted" style="text-align:right">'.$this->template->rupiah($total) .'</td>
                               <td class="totjum" style="display:none;">'.$total.'</td>
                               <td class="active"></td>
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
                                <td><input type="text" class="form-control harga-jumlah '.$clasrek.'" readonly name="jum[]"></td>
                                <td><input type="text" class="form-control sisadana" readonly name="sisadn[]"value='.$total.'></td>
                          </tr>';
                        }
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
<div class="modal fade" id="modalrealisasi" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <form id="formrealisasibljmodal" enctype="multipart/form-data" role="form" autocomplete="off">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h4 class="modal-title"> </h4>
      </div>

      <div class="modal-body">


        <div class="row">
          <div class="col-md-12">
            <p id="code"></p>
            <p id="idbmodal"></p>
            <p id="realfissudah"></p>
            <p id="pagubmodalbln" hidden></p>
            <p id="mtgkey" hidden></p>
            <p id="pagukegiatan" hidden><?php echo $nl; ?></p>
             <div class="row">
              <div class="col-md-1 col-sm-1 col-xs-12">
              </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                   <h4 class="text-left text-muted">Rekening</h4>
                 </div>
                 <div class="col-md-1 col-sm-1 col-xs-12">
                  <h4 class="text-center text-muted">:</h4>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <h4 class="text-left text-muted"><p id="rekbmodal"></p></h4>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                </div>
              </div>
              <div class="row">
              <div class="col-md-1 col-sm-1 col-xs-12">
              </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                   <h4 class="text-left text-muted">Nama Rekening</h4>
                 </div>
                 <div class="col-md-1 col-sm-1 col-xs-12">
                  <h4 class="text-center text-muted">:</h4>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <h4 class="text-left text-muted"><p id="nmrekbmodal"></p></h4>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                </div>
              </div>
           <div class="row">
              <div class="col-md-1 col-sm-1 col-xs-12">
              </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                   <h4 class="text-left text-muted">Nilai Kontrak</h4>
                 </div>
                 <div class="col-md-1 col-sm-1 col-xs-12">
                  <h4 class="text-center text-muted">:</h4>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <h4 class="text-left text-muted"><input type="text" class="form-control" id="nilaikontrak"  style="text-align:right"></h4>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                </div>
              </div>

              <div class="row">
              <div class="col-md-1 col-sm-1 col-xs-12">
              </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                   <h4 class="text-left text-muted">Pelaksana / Penyedia PBJ</h4>
                 </div>
                 <div class="col-md-1 col-sm-1 col-xs-12">
                  <h4 class="text-center text-muted">:</h4>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <h4 class="text-left text-muted"><input type="text" class="form-control "  id="pbj" name="pbj" style="text-align:left"></h4>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                </div>
              </div>
              <div class="row">
              <div class="col-md-1 col-sm-1 col-xs-12">
              </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                   <h4 class="text-left text-muted">Awal Kontrak</h4>
                 </div>
                 <div class="col-md-1 col-sm-1 col-xs-12">
                  <h4 class="text-center text-muted">:</h4>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right datepicker" id="awalktr" name="awalktr">
                        </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                </div>
              </div>
              <div class="row">
              <div class="col-md-1 col-sm-1 col-xs-12">
              </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                   <h4 class="text-left text-muted">Akhir Kontrak</h4>
                 </div>
                 <div class="col-md-1 col-sm-1 col-xs-12">
                  <h4 class="text-center text-muted">:</h4>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right datepicker" id="akhirktr" name="akhirktr">
                        </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                </div>
              </div>
              <div class="row">
              <div class="col-md-1 col-sm-1 col-xs-12">
              </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                   <h4 class="text-left text-muted">SPMK</h4>
                 </div>
                 <div class="col-md-1 col-sm-1 col-xs-12">
                  <h4 class="text-center text-muted">:</h4>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                   <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right datepicker" id="spmk" name="spmk">
                        </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                </div>
              </div>
              <div class="row">
              <div class="col-md-1 col-sm-1 col-xs-12">
              </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                   <h4 class="text-left text-muted">Nomor Kontrak/SP</h4>
                 </div>
                 <div class="col-md-1 col-sm-1 col-xs-12">
                  <h4 class="text-center text-muted">:</h4>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <h4 class="text-left text-muted"><input type="text" class="form-control "  id="nomorkontrak" name="nomorkontrak" style="text-align:left"></h4>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                </div>
              </div>
              <div class="row">
              <div class="col-md-1 col-sm-1 col-xs-12">
              </div>
                  <div class="col-md-3 col-sm-3 col-xs-12">
                   <h4 class="text-left text-muted">Bobot Belanja Modal</h4>
                 </div>
                 <div class="col-md-1 col-sm-1 col-xs-12">
                  <h4 class="text-center text-muted">:</h4>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="input-group">
                                <input type="text" class=" form-control" id="bobotbljmodal"  name="bobotbljmodal" style="text-align: right;" readonly>
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
                  <div class="col-md-3 col-sm-3 col-xs-12">
                   <h4 class="text-left text-muted">Realisasi Fisik</h4>
                 </div>
                 <div class="col-md-1 col-sm-1 col-xs-12">
                  <h4 class="text-center text-muted">:</h4>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="input-group">
                                <input type="text" class=" form-control" id="realfisikbljmodal" name="realfisikbljmodal"  style="text-align: right;" >
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
                  <div class="col-md-3 col-sm-3 col-xs-12">
                   <h4 class="text-left text-muted">Bobot Realisasi </h4>
                 </div>
                 <div class="col-md-1 col-sm-1 col-xs-12">
                  <h4 class="text-center text-muted">:</h4>
                </div>
                 <div class="col-md-4 col-sm-4 col-xs-12">
                   <div class="input-group">
                                <input type="text" class="form-control" id="realbobotbljmodal" name="realbobotbljmodal" style="text-align: right;" readonly>
                                <div class="input-group-addon">
                                <i class="fa fa-percent"></i>
                                </div>
                                </div>

                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                </div>
              </div>


          </div>
       </div>

      </div>

      <div class="modal-footer modal-footer-tombol">

      </div>
      </form>
    </div>
  </div>
</div>
