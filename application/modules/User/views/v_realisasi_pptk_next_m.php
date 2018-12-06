<script src="<?php echo base_url('assets/admin/plugins/input-mask/jquery.inputmask.bundle.js')?>"></script>
<script src="<?php echo base_url('assets/admin/plugins/jquery-spinner/dist/js/jquery.spinner.js')?>"></script>

<script type="text/javascript">
    $(document).ready(function() {
        ajaxtoken();
        headtotsd();
        totkeu();
        totsisadana();
        $(".select2").select2();
        $('.textarea').wysihtml5();
        $('.format-rupiah').inputmask("numeric",{
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
          //spiner volume
        $('.spinner').spinner('changed', function(e, newVal) {
            var row = $(this).closest("tr");    // Find the row
            var vol = row.find(".envol").val();
            var sisvol = row.find(".sisvol").text();
            //--------------------------------------
            var res = row.find(".rek").val();
            var rek = res.replace(/\./g, "-");
            var hs  = row.find(".enharga-satuan").val();
            var jumlah =hs.replace(",", ".")*vol; //entri harga satuan * envol
            var sisavoltarif =  row.find(".sisavoltarif").text();
            var totpagubln =  row.find(".totpagubln"+rek).text();
            // var totjum = row.find(".totjum").text();

              if(parseInt(vol, 10)===0){
                row.find(".envol").val(0);
                row.find(".enharga-satuan").val(0);
                var vol = row.find(".envol").val();
                var hs  = row.find(".enharga-satuan").val();
                var jumlah =hs.replace(",", ".")*vol;
                var sisa= parseInt(sisavoltarif, 10) - parseInt(jumlah, 10);
                row.find(".harga-jumlah").val(jumlah);
                row.find(".sisadana").val(sisa);
                totperrek(rek);
                totkeu();
                totsisadana();
              }else if(parseInt(vol, 10) > parseInt(sisvol, 10)){
              swal(
                'info',
                'Volume Melebihi Yang di Tetapkan!!!',
                'info'
              );
              row.find(".envol").val(0);
              row.find(".enharga-satuan").val(0);
              totperrek(rek);
              totkeu();
              totsisadana();

            }else if(parseInt(jumlah, 10) > parseInt(sisavoltarif, 10) ){
                  swal(
                    'info',
                    'Jumlah Melebihi Nilai Sisa Dana',
                    'info'
                  );
                  row.find(".envol").val(0);
                  row.find(".enharga-satuan").val(0);
                  totperrek(rek);
                  totkeu();
                  totsisadana();
            }else{
              var jumlah =hs.replace(",", ".")*vol;
              var sisa= parseInt(sisavoltarif, 10) - parseInt(jumlah, 10);
              row.find(".harga-jumlah").val(jumlah);
              row.find(".sisadana").val(sisa);
              var tot = totperrek(rek);

              if(tot > totpagubln){
                swal(
                  'info',
                  'Total Jumlah Melebihi Pagu Bulan Sekarang!!!',
                  'info'
                );
                row.find(".envol").val(0);
                row.find(".enharga-satuan").val(0);
                var vol = row.find(".envol").val();
                var hs  = row.find(".enharga-satuan").val();
                var jumlah =hs.replace(",", ".")*vol;
                var sisa= parseInt(sisavoltarif, 10) - parseInt(jumlah, 10);
                row.find(".harga-jumlah").val(jumlah);
                row.find(".sisadana").val(sisa);
                totperrek(rek);
                totkeu();
                totsisadana();
                return false;
              }
              totperrek(rek);
              totkeu();
              totsisadana();
            }
        });
        //batas volume spinner
        //entri harga satuan change
        $('.enharga-satuan').on('input change', function(e) {
            var row = $(this).closest("tr");    // Find the row
            var vol = row.find(".envol").val();
            var sisvol = row.find(".sisvol").text();

            var res = row.find(".rek").val();
            var rek = res.replace(/\./g, "-");
            var dettarif = row.find(".dettarif").text();
            var hs  = row.find(".enharga-satuan").val();
            var jumlah =hs.replace(",", ".")*vol; //entri harga satuan * envol
            var sisavoltarif =  row.find(".sisavoltarif").text();
            var totpagubln =  row.find(".totpagubln"+rek).text();
            if(parseInt(vol, 10)===0){
              swal(
                  'info',
                  'Silahkan Isi Volume!!!',
                  'info'
                );
                row.find(".enharga-satuan").val(0);
                totkeu();
                totsisadana();
            }else if(parseInt(hs,10) > parseInt(dettarif,10)){
              swal(
                  'info',
                  'Harga Melebihi Harga Yang di Tetapkan!!!',
                  'info'
                );
                row.find(".envol").val(0);
                row.find(".enharga-satuan").val(0);
                var hs  = row.find(".enharga-satuan").val();
                var jumlah =hs.replace(",", ".")*vol;
                var sisa= parseInt(sisavoltarif, 10) - parseInt(jumlah, 10);
                row.find(".harga-jumlah").val(jumlah);
                row.find(".sisadana").val(sisa);
                var tot = totperrek(rek);

                if(tot > totpagubln){
                  swal(
                    'info',
                    'Total Jumlah Melebihi Pagu Bulan Sekarang!!!',
                    'info'
                  );
                  row.find(".envol").val(0);
                  row.find(".enharga-satuan").val(0);
                  var hs  = row.find(".enharga-satuan").val();
                  var jumlah =hs.replace(",", ".")*vol;
                  var sisa= parseInt(sisavoltarif, 10) - parseInt(jumlah, 10);
                  row.find(".harga-jumlah").val(jumlah);
                  row.find(".sisadana").val(sisa);
                  var tot = totperrek(rek);
                  totkeu();
                  totsisadana();
                  return false;
                }
                totperrek(rek);
                totkeu();
                totsisadana();
                return false;
            }else{
              var jumlah =hs.replace(",", ".")*vol;
              var sisa= parseInt(sisavoltarif, 10) - parseInt(jumlah, 10);
              row.find(".harga-jumlah").val(jumlah);
              row.find(".sisadana").val(sisa);
              var tot = totperrek(rek);

              if(tot > totpagubln){
                swal(
                  'info',
                  'Total Jumlah Melebihi Pagu Bulan Sekarang!!!',
                  'info'
                );
                row.find(".envol").val(0);
                row.find(".enharga-satuan").val(0);
                var hs  = row.find(".enharga-satuan").val();
                var jumlah =hs.replace(",", ".")*vol;
                var sisa= parseInt(sisavoltarif, 10) - parseInt(jumlah, 10);
                row.find(".harga-jumlah").val(jumlah);
                row.find(".sisadana").val(sisa);
                var tot = totperrek(rek);
                totkeu();
                totsisadana();
                return false;
              }
              totperrek(rek);
              totkeu();
              totsisadana();
            }


        });

        $(".btnrealfisik").click(function() {
          var bulan = {
            'January':'0','February':'1',
            'March':'2','April':'3','May':'4',
            'June':'5','July':'6','August':'7',
            'September':'8','October':'9',
            'November':'10','December':'11'};
            var row = $(this).closest("tr");    // Find the row
            var res = row.find(".rekheader").text();
            var rek = res.replace(/\./g, "-");
            var nmrek = row.find(".nmrekheader").text();
            var mtgkey = row.find(".mtgkey").text();
            var totpagubln =  row.find(".totpagubln"+rek).text();
            var indexbln = $('#indexbulan').html();
            var idtab = $('#idtab').html();

            $.ajax({
              url: base_url+"User/cekrealbmodal/"+Math.random(),
              type: "POST",
              data: {

                idtab   : idtab,
                mtgkey  : mtgkey,
                indexbulan : indexbln
              },
              dataType: "JSON",
              success: function(result){


                  if (result.data[0].code == 0){


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
                                               startDate: new Date(thn,bln,tgl)



                                             });


                                         });
                                       });

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
                  }else if(result.data[0].code == 4){
                    //code 4 = realisasi masih bisa di edit

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
                          title: 'Ubah Realisasi Belanja Modal Bulan Sekarang',
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
                          realbj  : result.data[0].realblj,
                          bbtbj   :result.data[0].bobotrealblj,
                          status  : result.data[0].code,
                          realfisik : result.data[0].realfisik,
                          idbmodal : result.data[0].idbmodal,
                          iddet : result.data[0].iddet

                        });
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




        });

        $("#nilaikontrak").on('input change',function (e) {

             var pagu=$('#pagubmodalbln').html();
             var val= this.value;
             // newStr = parseInt(numbers.replace(/_/g, ""), 10);
             // console.log(val +'-'+ pagu);
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

        //batas on ready

    });
    function headtotsd(){
        var arr = $(".headtotsd");
        var tot=0;
        for(var i=0;i<arr.length;i++){
            if(parseInt(arr[i].value))
                tot += parseInt(arr[i].value);
        }

        $("#headtotsdana").val(parseInt(tot, 10) );

    }
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
      //$(".sisadana"+rek).val(hs);
      return tot;
    }

    function totkeu(){
        var arr = $(".harga-jumlah");
        var tot=0;
        for(var i=0;i<arr.length;i++){
            if(parseInt(arr[i].value))
                tot += parseInt(arr[i].value);
        }
        var arrx = $(".real5-2-3");
        var tot523=0;
        for(var i=0;i<arrx.length;i++){
            if(parseInt(arrx[i].value))
                 tot523 += parseInt(arrx[i].value);
        }


        $(".totkeu").val(parseInt(tot, 10) + parseInt(tot523, 10));

    }
    function totsisadana(){
        var arr = $(".headtotsd");
        var tot=0;
        for(var i=0;i<arr.length;i++){
            if(parseInt(arr[i].value))
                tot += parseInt(arr[i].value);
        }
        var arrhr = $(".hr");
        var hr=0;
        for(var i=0;i<arrhr.length;i++){
            if(parseInt(arrhr[i].value))
                 hr += parseInt(arrhr[i].value);
        }
        // var arrx = $(".real5-2-3");
        // var tot523=0;
        // for(var i=0;i<arrx.length;i++){
        //     if(parseInt(arrx[i].value))
        //          tot523 += parseInt(arrx[i].value);
        // }

          $(".totsisadana").val(parseInt(tot, 10) - parseInt(hr, 10));

    }
    $(function () {

      $('#formrealisasibljmodal').submit(function (e, params) {
        var localParams = params || {};
        if (!localParams.send) {
          e.preventDefault();
        }
        ajaxtoken();
        var status =  $('#code').html();
        var iddet =  $('#iddet').html();
        var rekbmodal= $('#rekbmodal').html();
        var rek = rekbmodal.replace(/\./g, "-");
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
              var pagubmodalbln   = $('#pagubmodalbln').html();
              var nilaikontrak   = $('#nilaikontrak').val();


              var formData = new FormData($('#formrealisasibljmodal')[0]);
              formData.append("token",token);
              formData.append("tahun",tahun);
              formData.append("bulan",bulan);
              formData.append("idtab",tab);
              formData.append("mtgkey",mtgkey);
              formData.append("pagubmodalbln",pagubmodalbln);
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
                      var nlktrk = jsonData.data[0].nilai;
                      var render = jsonData.data[0].render;

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
                          $(".harga-rek"+rek).val(nlktrk);
                          $("#nlrealbmodal"+rek).val(nlktrk);
                          $(".sisaentribm"+rek).html(render);

                          totkeu();
                          totsisadana();
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
        }else if(status==4){
          swal({
            title: "Ubah Realisasi Belanja Modal Bulan Sekarang",
            text: "Pastikan data sudah benar",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#367FA9",
            confirmButtonText: "Ya, Ubah",
            cancelButtonText: "Tidak, Batal!",
            closeOnConfirm: false,
            closeOnCancel: false
           }, function (isConfirm) {
            if (isConfirm) {
              Pace.restart ();
              Pace.track (function (){
              var token   = localStorage.getItem("token");
              var iddet     = $('#iddet').html();


              var formData = new FormData($('#formrealisasibljmodal')[0]);
              formData.append("token",token);
              formData.append("iddet",iddet);

              $.ajax({
                url: base_url+"User/ubahrealisasibmodaldet",
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
                        text: "Data berhasil diubah!!!",
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
    <li><a href="#"><i class="fa fa-dashboard"></i> Home Next</a></li>

  </ol>
</section>

<section class="content">
  <div class="callout bg-blue">
    <div class="row">
      <div class="col-xs-12 col-md-12 col-md-offset-1">
           <br>
            <p id="kdunit" hidden><?php echo $idopd ?></p>
            <p id="kdkeg" hidden><?php echo $kdkeg ?></p>
            <p id="idtab" hidden><?php echo $idtab ?></p>
            <p id="idtahun" hidden><?php echo $tahun ?></p>
            <p id="indexbulan" hidden><?php echo $indexbulan ?></p>
            <p id="idbulan" hidden><?php echo $bulan ?></p>

           <div class="row" >
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
         <a class="btn btn-block btn-social bg-green btn-flat"id="btn-kembali">
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
    <div class="box box-primary">
      <form id="formrealisasi" enctype="multipart/form-data" role="form" autocomplete="off">
      <div class="box-header with-border">
        <i class="fa fa-text-width"></i>
        <h3 class="box-title">Form Realisasi</h3>
      </div>
      <div class="box-body table-responsive">
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
    <div class="row">
      <div class="col-md-1 col-sm-1 col-xs-12">
      </div>
      <div class="col-md-2 col-sm-2 col-xs-12">
       <h4 class="text-left text-muted">Pagu Dana s/d Bulan Sekarang</h4>
     </div>
     <div class="col-md-1 col-sm-1 col-xs-12">
      <h4 class="text-center text-muted">:</h4>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-12">
     <h4 class="text-left text-muted"><input type="text" class="format-rupiah form-control"  id="headtotsdana"  readonly style="text-align:left; font-family: Arial, Helvetica, sans-serif; font-size: 18px; font-weight: bold;"></h4>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-12">
    </div>
    </div>
    <hr>
    <div class="row">

          <div class="col-md-3 col-sm-6 col-xs-12">

          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">

            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
           <a class="btn btn-block btn-social bg-blue btn-flat" id="btn-lihat-realisasi">
              <i class="fa fa-file-text-o"></i> Lihat Semua Realisasi
            </a>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
           <a class="btn btn-block btn-social btn-danger btn-flat" id="btn-lihat-anggaran">
              <i class="fa fa-file-text-o"></i> Lihat Anggaran Kegiatan
            </a>

            </div>


          </div>
              <hr>

            <table class="table table-bordered table-responsive">
              <thead >
                <tr>
                  <th rowspan="3" style="vertical-align : middle;text-align:center; width: 100px">Kode Rekening</th>
                  <th rowspan="3" style="vertical-align : middle;text-align:center; width: 160px">Uraian</th>
                  <th colspan="4" style="vertical-align : middle;text-align:center;">SISA ANGGARAN TAHUN SEKARANG</th>
                  <th rowspan="3" style="vertical-align : middle;text-align:center; width: 80px">JUMLAH PAGU s/d BULAN SEKARANG</th>
                  <th class="danger" rowspan="3" style="vertical-align : middle;text-align:center; width: 80px">SUMBER DANA</th>
                  <th class="danger" colspan="3"  style="vertical-align : middle;text-align:center;">REALISASI BULAN LALU</th>

                  <th rowspan="3" style="vertical-align : middle;text-align:center; width: 80px">SUMBER DANA</th>
                  <th colspan="3" style="vertical-align : middle;text-align:center;">REALISASI</th>
                  <th rowspan="3" style="vertical-align : middle;text-align:center; width: 130px">SISA DANA</th>
                </tr>
                <tr>
                  <th style="vertical-align : middle;text-align:center;" colspan="4">Rincian Perhitungan</th>
                  <th class="danger" colspan="3" style="vertical-align : middle;text-align:center;">Rincian Bulan <span class="blink_me text-danger" style="color: white;
    text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;"><b><?php echo $bulanlalu?></b></span></th>
                  <th rowspan="2" style="vertical-align : middle;text-align:center;  width: 120px">Volume</th>
                  <th rowspan="2" style="vertical-align : middle;text-align:center; width: 130px">Harga Satuan</th>
                  <th rowspan="2" style="vertical-align : middle;text-align:center; width: 130px">Jumlah</th>
                </tr>
                <tr>
                  <th style="vertical-align : middle;text-align:center;  width: 120px">Sisa Volume</th>
                  <th style="vertical-align : middle;text-align:center; width: 130px">Satuan</th>
                  <th style="vertical-align : middle;text-align:center; width: 130px">Harga Satuan</th>
                  <th style="vertical-align : middle;text-align:center; width: 130px">Jumlah Harga</th>
                  <th class="danger"  style="vertical-align : middle;text-align:center; width: 70px">Volume Realisasi</th>
                  <th class="danger"  style="vertical-align : middle;text-align:center; width: 120px">Jumlah Realisasi</th>
                  <th class="danger"  style="vertical-align : middle;text-align:center; width: 120px">Total Realisasi</th>
                </tr>
              </thead>
                <tbody>
                  <?php
                  foreach ($header as $hrow){

                    $id       =$hrow['id'];
                    $unitkey  =$hrow['unitkey'];
                    $kdkegunit=$hrow['kdkegunit'];
                    $kd_bulan =$hrow['kdkegunit'];
                    $nilai    =$hrow['nilai'];
                    $mtgkey   =$hrow['mtgkey'];
                    $kdper    =$hrow['kdper'];
                    $nmper    =$hrow['nmper'];
                    $tahun    =$hrow['tahun'];
                    //ambil sum jumlah_harga ke tab_realisasi_det berdasarkan id_tab_realisasi(yang tadi disimpan di array)
                    //dan berdasarkan mtgkey
                    $this->db->select('SUM(`jumlah_harga`) AS jumsdhreal');
                    $this->db->from('tab_realisasi_det');
                    $this->db->where_in('id_tab_realisasi', $idmreal);
                    $this->db->where('mtgkey', $mtgkey);
                    $tabdetreal = $this->db->get()->row();
                    $jumsdhreal=$tabdetreal->jumsdhreal;
                    $sisablnskr = (int)$nilai - (int)$jumsdhreal;
                    $jkrek=substr($kdper,0,6);
                    $clasrek=str_replace(".","-",$kdper);
                    if($jkrek=='5.2.3.'){
                      //jika rekening 5.2.3
                      //cek realisasi belanja modal ke tabel tab_realisasi_bmodal
                      //SELECT * FROM `tab_realisasi_bmodal` WHERE id_tab_pptk = '5' AND mtgkey='1326_'
                      $nilaibmodal = $this->db->get_where('tab_realisasi_bmodal',array('id_tab_pptk'=>$idtab,'mtgkey'=>$mtgkey));
                      if($nilaibmodal->num_rows()>0){
                        $nlrealbmodal = $nilaibmodal->row()->nilai_ktrk;
                      }else{
                        $nlrealbmodal = 0;
                      }

                      $bmsisablnskr = (int)$nilai - (int)$nlrealbmodal;

                      $class='danger';
                      echo'<tr class ="'.$class.'">
                        <td class="totpagubln'.$clasrek.'" style="display:none;">'.$nilai.'</td>
                        <td class="id" style="display:none;">'.$id.'</td>
                        <td class="unitkey" style="display:none;">'.$unitkey.'</td>
                        <td class="kdkegunit" style="display:none;">'.$kdkegunit.'</td>
                        <td class="mtgkey" style="display:none;">'.$mtgkey.'</td>
                        <td class="rekheader"><b>'.$kdper.'</b></td>
                        <td class="nmrekheader"><b>'.$nmper.'</b></td>
                        <td colspan="4"></td>
                        <td style="display:none;"><b>'.$this->template->rupiah($nilai).'</b></td>
                        <td style="display:none;"><b>'.$this->template->rupiah($jumsdhreal).'</b></td>
                        <td class="sisaentribm'.$clasrek.'"style="text-align:right"><b>'.$this->template->rupiah($bmsisablnskr).'</b></td>
                        <td style="display:none;"><input type="text" class="form-control headtotsd"  readonly value='.$bmsisablnskr.'></td>
                        <td colspan="2"style="vertical-align : middle;text-align:center;"><u><b><i>Nilai Kontrak</i></b></u></td>
                        <td colspan="2"style="vertical-align : middle;text-align:center;"><input type="text" class="format-rupiah form-control" readonly value='.$nlrealbmodal.' id="nlrealbmodal'.$clasrek.'"></td>
                        <td colspan="4"></td>
                        <td style="vertical-align : middle;text-align:right; display:none;"><input type="text" class="format-rupiah form-control hr real5-2-3 harga-rek'.$clasrek.'" readonly ></td>
                        <td style="vertical-align : middle;text-align:center;"><button type="button" class="btnrealfisik btn bg-blue btn-flat bm'.$clasrek.'">Realisasi<div class="ripple-container"></div></button></td>
                        </tr>';
                        //ambil detail(anak rincian) rekening ke table dpa221 berdasarkan tahun, unit, kdkegunit, mtgkey,
                        $this->db->where('`dpa221`.`tahun`', $tahun);
                        $this->db->where('`dpa221`.`unitkey`', $unitkey);
                        $this->db->where('`dpa221`.`kdkegunit`', $kdkegunit);
                        $this->db->where('`dpa221`.`mtgkey`', $mtgkey);
                        $detail=$this->db->get('dpa221')->result_array();
                        foreach ($detail as $row){
                          $detid        = $row['id'];
                          $dettahun     = $row['tahun'];
                          $detunitkey   = $row['unitkey'];
                          $detkdkegunit = $row['kdkegunit'];
                          $detmtgkey    = $row['mtgkey'];
                          $deturaianx   = str_replace("-","",$row['uraian']);
                          $deturaian    = str_replace("  ","",$deturaianx);
                          $detsatuan    = $row['satuan'];
                          $dettarif     = $row['tarif'];
                          $detjumbyek   = $row['jumbyek'];
                          $detkdjabar   = $row['kdjabar'];
                          $dettype      = $row['type'];
                          if ($dettype=='H'){
                            echo "<tr class='active'>
                                  <td></td>
                                  <td>$deturaian</td>
                                  <td colspan='4'></td>
                                  <td class='info' colspan='4'></td>
                                  <td colspan='5'></td>
                                  </tr>";
                          }else{
                              $sisvoltarif=$detjumbyek*$dettarif;
                            echo "<tr class='warning'>

                                  <td></td>
                                  <td><ul class='list-unstyled'>
                                  <li><ul><li>$deturaian</li></ul></li>
                                  </ul></td>
                                  <td class='sisvol' style='text-align:center;'>$detjumbyek</td>
                                  <td style='text-align:center;'>$detsatuan</td>
                                  <td class='dettarif' style='display:none;'>$dettarif</td>
                                  <td style='text-align:right'><b>".$this->template->rupiah($dettarif)."</b></td>
                                  <td class='sisavoltarif' style='display:none;'>$sisvoltarif</td>
                                  <td style='text-align:right'><b>".$this->template->rupiah($sisvoltarif)."</b></td>
                                  <td colspan='10'></td>
                                </tr>";
                          }
                        }

                    }else{
                      //selain rekening 5.2.3
                      $jumtahun=0;
                      $class='active';
                      echo'<tr class ="'.$class.'">
                        <td class="id" style="display:none;">'.$id.'</td>
                        <td class="unitkey" style="display:none;">'.$unitkey.'</td>
                        <td class="kdkegunit" style="display:none;">'.$kdkegunit.'</td>
                        <td class="mtgkey" style="display:none;">'.$mtgkey.'</td>
                        <td><b>'.$kdper.'</b></td>
                        <td><b>'.$nmper.'</b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="display:none;"><b>'.$this->template->rupiah($nilai).'</b></td>
                        <td style="display:none;"><b>'.$this->template->rupiah($jumsdhreal).'</b></td>
                        <td style="text-align:right"><b>'.$this->template->rupiah($sisablnskr).'</b></td>
                        <td style="display:none;"><input type="text" class="form-control headtotsd"  readonly value='.$sisablnskr.'></td>
                        <td class="info" colspan="4"></td>
                        <td colspan="3"></td>
                        <td><input type="text" class="format-rupiah form-control hr harga-rek'.$clasrek.'" readonly name="jumperrek[]"></td>
                        <td></td>
                        </tr>';
                        //ambil detail(anak rincian) rekening ke table dpa221 berdasarkan tahun, unit, kdkegunit, mtgkey,
                        $this->db->where('`dpa221`.`tahun`', $tahun);
                        $this->db->where('`dpa221`.`unitkey`', $unitkey);
                        $this->db->where('`dpa221`.`kdkegunit`', $kdkegunit);
                        $this->db->where('`dpa221`.`mtgkey`', $mtgkey);
                        $detail=$this->db->get('dpa221')->result_array();
                        foreach ($detail as $row){
                          $detid        = $row['id'];
                          $dettahun     = $row['tahun'];
                          $detunitkey   = $row['unitkey'];
                          $detkdkegunit = $row['kdkegunit'];
                          $detmtgkey    = $row['mtgkey'];
                          $deturaianx   = str_replace("-","",$row['uraian']);
                          $deturaian    = str_replace("  ","",$deturaianx);
                          $detsatuan    = $row['satuan'];
                          $dettarif     = $row['tarif'];
                          $detjumbyek   = $row['jumbyek'];
                          $detkdjabar   = $row['kdjabar'];
                          $dettype      = $row['type'];

                          //bandingkan volume dpa221 dengan volume yang sudah di realisasikan
                          //ambil ke tab_realisasi_det berdasarkan id dpa221 ,id ta
                          //SELECT SUM(vol)  as jumvol FROM `tab_realisasi_det` WHERE `id_tab_realisasi` IN('1','2') AND `id_dpa`='30873'
                          $this->db->select('SUM(vol) as jumvol');
                          $this->db->from('tab_realisasi_det');
                          $this->db->where_in('id_tab_realisasi', $idmreal);
                          $this->db->where('id_dpa', $detid );
                          $jumvolsdh = $this->db->get()->row();
                          $exvol = $jumvolsdh->jumvol;
                          $sisavol = (int)$detjumbyek - (int)$exvol;

                          //select data realiasasi bulan sebelumnya
                          //ambil ke tab_realisasi_det berdasarkan id_tab_realisasi dan mtgkey

                          $this->db->select('`tab_sumber_dana`.`nm_dana`
                          , `tab_realisasi_det`.`vol`
                          , `tab_realisasi_det`.`harga_satuan`
                          , `tab_realisasi_det`.`jumlah_harga`');
                          $this->db->from('tab_realisasi_det');
                          $this->db->join('tab_sumber_dana', '`tab_realisasi_det`.`sumber_dana` = `tab_sumber_dana`.`id`');
                          $this->db->where_in('id_tab_realisasi', $idreal);
                          $this->db->where('mtgkey', $detmtgkey);
                          $this->db->where('id_dpa', $detid);
                          $rowbulanlalu = $this->db->get()->row_array();
                        //print_r($rowbulanlalu);
                        //ini aneh tidak bisa row() seperti biasa harus row_array /sajam untuk iko se
                        $blnmdana=$rowbulanlalu['nm_dana'];
                        $blvol=$rowbulanlalu['vol'];
                        $blhs = $rowbulanlalu['harga_satuan'];
                        $bljh = $rowbulanlalu['jumlah_harga'];
// ".$rowbulanlalu->nm_dana."".$rowbulanlalu->vol."".$this->template->rupiah($rowbulanlalu->harga_satuan)."".$this->template->rupiah($rowbulanlalu->jumlah_harga)."


                          // jika type "H" (header)
                          if ($dettype =='H'){
                            echo "<tr class='active'>
                                  <td></td>
                                  <td>$deturaian</td>
                                  <td colspan='4'></td>
                                  <td class='info' colspan='4'></td>
                                  <td colspan='5'></td>
                                  </tr>";
                          }else{
                            // $sisvoltarif = sisa volume di kali tarif per anak rincian
                            $sisvoltarif=$sisavol*$dettarif;
                            $jumtahun+=$sisvoltarif;
                            echo "<tr>
                                  <td class='totpagubln$clasrek' style='display:none;'>$sisablnskr</td>
                                    <td style='display:none;'><input type='hidden' class='form-control' readonly name='detpgblnskr[]'  value=".$sisablnskr."></td>
                                  <td style='display:none;'><input type='hidden' class='form-control' readonly name='iddpa[]'  value=".$detid."></td>
                                  <td style='display:none;'><input type='hidden' class='form-control' readonly name='mtgkey[]'  value=".$detmtgkey."></td>
                                  <td><input type='hidden' class='form-control rek' readonly name='kdrek[]''  value=".$kdper."></td>
                                  <td><ul class='list-unstyled'>
                                  <li><ul><li>$deturaian</li></ul></li>
                                  </ul></td>
                                  <td class='sisvol' style='text-align:center'>$sisavol</td>
                                  <td style='text-align:center'>$detsatuan</td>
                                  <td class='dettarif' style='display:none;'>$dettarif</td>
                                  <td style='text-align:right'>".$this->template->rupiah($dettarif)."</td>
                                  <td class='sisavoltarif' style='display:none;'>$sisvoltarif</td>
                                  <td style='text-align:right'>".$this->template->rupiah($sisvoltarif)."</td>
                                  <td class='active'></td>


                                  <td class='info' style='text-align:center'>".$blnmdana."</td>
                                  <td class='info' style='text-align:center'>".$blvol."</td>
                                  <td class='info' style='text-align:center'>".$this->template->rupiah($blhs)."</td>
                                  <td class='info' style='text-align:center'>".$this->template->rupiah($bljh)."</td>
                                  <td ><select class='form-control select2' name='sumberdn[]' style='width: 100%;'>";
                                   $sdana= $this->User_model->sumberdana();
                                  foreach ($sdana as $k) {
                                    if($k['id']==1){
                                       echo "<option selected='selected' value='{$k['id']}'>{$k['nm_dana']}</option>";
                                    }else{
                                      echo "<option value='{$k['id']}'>{$k['nm_dana']}</option>";
                                    }
                                  }
                                  echo"</select></td>
                                  <td><div class='input-group spinner' data-trigger='spinner'>
                                    <input type='text' class='form-control text-center envol' value='0' name='volume[]' data-rule='quantity'>
                                  <div class='input-group-addon'>
                                    <a href='javascript:;' class='spin-up' data-spin='up'><i class='fa fa-caret-up'></i></a>
                                    <a href='javascript:;' class='spin-down' data-spin='down'><i class='fa fa-caret-down'></i></a>
                                  </div>
                                </div></td>
                                <td><input type='text' class='format-rupiah form-control enharga-satuan' name='hrsatuan[]'></td>
                                <td><input type='text' class='format-rupiah form-control harga-jumlah $clasrek' readonly name='jum[]'></td>
                                <td><input type='text' class='format-rupiah form-control sisadana' readonly name='sisadn[]'value='.$sisvoltarif.'></td>
                                </tr>";
                          }

                        }
                        echo"<tr>
                          <td colspan='4' style='text-align:right'><b>Total Jumlah</b></td>
                          <td colspan='2' style='text-align:right'><b>".$this->template->rupiah($jumtahun)."</b></td>

                          <td class='active'></td>
                          <td class='info' colspan='4'></td>
                          <td colspan='5'></td>
                          </tr>";

                    }

                  }
                  ?>



                </tbody>
            </table>


      </div>
      <div class="box-footer">

      </div>
    </div>
    <!-- ---------------------------------------------------------------- -->
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
        <h4 class="text-left text-muted"><input type="text" class="format-rupiah form-control totkeu" id="realkeu"  readonly style="text-align:right"></h4>
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
        <h4 class="text-left text-muted"><input type="text" class="format-rupiah form-control totsisadana" id="totsdana"  readonly style="text-align:right"></h4>
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
            <p id="iddet"></p>
            <p id="code"></p>
            <p id="idbmodal"></p>
            <p id="realfissudah"></p>
            <!-- <p id="rek"></p> -->
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
                  <h4 class="text-left text-muted"><input type="text" class="format-rupiah form-control" id="nilaikontrak"  style="text-align:right"></h4>
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
