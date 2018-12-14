function myajax(){

  if (window.XMLHttpRequest){
    return new XMLHttpRequest();
  }
  if (window.ActiveXObject){
    return new ActiveXObject("Microsoft.XMLHTTP");
   }
    return null;
}

var ajaxku=myajax();

// function ajaxtoken(){
//   var url=base_url+"User/gettoken/"+Math.random();
//   ajaxku.onreadystatechange=ajaxtokenstate;
//   ajaxku.open("GET",url,true);
//   ajaxku.send(null);
// }
//
// function ajaxtokenstate(){
//   var data;
//   if (ajaxku.readyState==4){
//     data=ajaxku.responseText;
//     if(data.length>=0){
//
//       localStorage.setItem("token", data);
//     }else{
//       localStorage.setItem("token", "tokentidakvalid");
//     }
//   }
// }
function ajaxtoken() {
  $.ajax({

    url: base_url+"User/gettoken",
    type: "POST",
    data: {
    },
    dataType: "JSON",
    success: function(result){

       localStorage.setItem("token", result.data[0].token);

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

}
$('#btn-entrikegiatan').click(function(){

  $.ajax ({
    url: base_url+"User/cekkegiatan/"+Math.random(),
    type: "POST",
    data: {},
    dataType: "JSON",
    complete: function(data){
      var jsonData = JSON.parse(data.responseText);
      if (jsonData.data[0].status == "false"){
        Pace.restart ();
        Pace.track (function (){
          window.location.href = base_url+"User/entrikegiatan";
        });
      }else{
        Pace.restart ();
        Pace.track (function (){
          window.location.href = base_url+"User/entrikegiatan";
        });
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

 //---------------------------ppk-------------------------------//

$('#btn-entri-kak').click(function(){
  Pace.restart ();
  Pace.track (function (){
    window.location.href = base_url+"User/kakppk";
  });

});

// $('#btn-selesaikan-tf').click(function(){

// });
$('.btn-selesaikan-tf').click(function(){
  var kdunit  = $('#kdunit').html();
    var kdkeg   = $('#idkegiatan').html();
    $.ajax ({
      url: base_url+"User/cektargetfisik/"+Math.random(),
      type: "POST",
      data: {
        kdunit:kdunit,
        kdkeg:kdkeg
      },
      dataType: "JSON",
      complete: function(data){
        var jsonData = JSON.parse(data.responseText);
        if (jsonData.data[0].status == true){
      swal({
        title: "Simpan dan Selesaikan Target Fisik",
        text: "Pastikan Semua Data Sudah Benar",
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
                    var tabppk  = $('#idtabpptk').html();

                    //ubah Tab_kak Stat Draft dari 1 ke 0
                    $.ajax({
                      url: base_url+"User/selesaikantargetfisik",
                      type: 'POST',
                      data: {
                        token:token,
                        tabppk:tabppk
                      },
                      dataType: "JSON",
                      success: function(result){
                          var jsonData =result.data[0].status;
                          if (jsonData == false){
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
                                text: "Semua Target Fisik Berhasil di Simpan!!!",
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
                                 window.location.href = base_url+"User/kakppk/";
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
                }else {
                  swal("Batal", "Batal Simpan", "error");
                }
              });
        }else{
          swal(
            'GAGAL',
            'Silahkan Entri Semua Target Fisik',
            'error'
          )
        }



      },
      error: function(jqXHR, textStatus, errorThrown){
        swal(
          'error',
          'Terjadi Kesalahan, Silahkan Reload Lagi',
          'error'
        )
      }
    });
});

 //------------------------batas ppk----------------------------//

$('#btn-dash-entri').click(function(){

  $.ajax ({
    url: base_url+"User/cekkegiatanentri/"+Math.random(),
    type: "POST",
    data: {},
    dataType: "JSON",
    complete: function(data){
      var jsonData = JSON.parse(data.responseText);
      if (jsonData.data[0].status == "false"){
         swal(
            'info',
            'Belum Di konfirmasi Dalbang !!!',
            'info'
          );
      }else{
        Pace.restart ();
        Pace.track (function (){

          window.location.href = base_url+"User/dafkeg";

        });

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

function modalrealisasi(data) {
  /*modal Cpanel/opduser*/
  // Set modal title
  $('.modal-title').html(data.title);
  $('#idbmodal').html(data.idbmodal);

  $('#rekbmodal').html(data.rek);
  $('#nmrekbmodal').html(data.nmrek);
  $('#mtgkey').html(data.mtgkey);
  var pgkeg = $('#pagukegiatan').html();
  var x=data.paguprbln / pgkeg * 100;
  $('#bobotbljmodal').val(x.toFixed(2));
  $('#pagubmodalbln').html(data.paguprbln);
  var stat= data.status;
  $('#code').html(stat);
  $('#totargetfisik').val(data.tottarfis);

  if(stat==1){
    $('#totargetfisik').prop("disabled", "disabled");
    $('#nilaikontrak').prop("disabled", "disabled");
    $('#pbj').prop("disabled", "disabled");
    $('#awalktr').prop("disabled", "disabled");
    $('#akhirktr').prop("disabled", "disabled");
    $('.realfissudah2').prop("hidden", false);
    $('#spmk').prop("disabled", "disabled");
    $('#nomorkontrak').prop("disabled", "disabled");
    $('#nilaikontrak').val(data.nlktrk);
    $('#pbj').val(data.pbj);
    $("#awalktr").datepicker("setDate",new Date(data.awlktrk));
    $("#akhirktr").datepicker("setDate",new Date(data.akrktrk));
    $("#spmk").datepicker("setDate",new Date(data.spmk));
    $('#nomorkontrak').val(data.noktrk);
    $('#realfissudah').html(data.realfisik);
    $('#realfissudah2').val(data.realfisik);

  }else if(stat==3 || stat==4){
    $('#totargetfisik').prop("disabled", "disabled");
    $('#nilaikontrak').prop("disabled", "disabled");
    $('#pbj').prop("disabled", "disabled");
    $('#awalktr').prop("disabled", "disabled");
    $('#akhirktr').prop("disabled", "disabled");
    $('#spmk').prop("disabled", "disabled");
    $('#nomorkontrak').prop("disabled", "disabled");
    $('.realfissudah2').prop("hidden", false);
    $('#nilaikontrak').val(data.nlktrk);
    $('#pbj').val(data.pbj);
    $("#awalktr").datepicker("setDate",new Date(data.awlktrk));
    $("#akhirktr").datepicker("setDate",new Date(data.akrktrk));
    $("#spmk").datepicker("setDate",new Date(data.spmk));
    $('#nomorkontrak').val(data.noktrk);
    $('#realfissudah').html(data.realfisik);
    $('#realfissudah2').val(data.realfisik);
    $('#realfisedit').html(data.realbj);

    $('#realfisikbljmodal').val(data.realbj );
    $('#realbobotbljmodal').val(data.bbtbj);
    $('#iddet').html(data.iddet);
  }else{
    $('#totargetfisik').prop("disabled", "disabled");
    $('#nilaikontrak').removeAttr("disabled");
    $('#pbj').removeAttr("disabled");
    $('#awalktr').removeAttr("disabled");
    $('#akhirktr').removeAttr("disabled");
    $('#spmk').removeAttr("disabled");
    $('#nomorkontrak').removeAttr("disabled");
    $('.realfissudah2').prop("hidden", true);
    $('#realfissudah').html(0);
    $('#idbmodal').html(0);
    $('#iddet').html(0);
  }









  // Clear buttons except Cancel
  $('.modal-footer button:not(".btn-default")').remove();

  // Create Butttons
  $.each(data.buttons, function(index, button){
    $('.modal-footer').prepend('<button type="' + button.type  + '" id="' + button.id  + '" class="btn ' + button.css + '">' + button.label + '</button>')
  })

  //Show Modal
  $('#modalrealisasi').modal('show');

}


$('#modalrealisasi').on('click', '#btn-modal-tutup',  function(e){
  Pace.restart ();
  Pace.track (function (){
    $('#modalrealisasi').modal('hide');
    });
});

$('#modalrealisasi').on('hidden.bs.modal',  function(){


  Pace.restart ();
  Pace.track (function (){
    $('#awalktr').datepicker('setDate', null);
    $('#awalktr').datepicker('destroy');
    $('#akhirktr').datepicker('setDate', null);
    $('#akhirktr').datepicker('destroy');
    $('#spmk').datepicker('setDate', null);
    $('#spmk').datepicker('destroy');
    $("#formrealisasibljmodal")[0].reset();

    });

});
function modaldafkeg(data) {
  /*modal Cpanel/opduser*/
  // Set modal title

  $('.modal-title').html(data.title);

  $('#kdkeg').html(data.kdkeg);
  $('#idtab').html(data.idtab);
  $('#namakegiatan').html(data.namakegiatan);
  $('#nilai').html(data.nilai);
  $('#namapptk').html(data.namapptk);
  $('#namappk').html(data.namappk);
  $('#accordion').html(data.html);
  // Clear buttons except Cancel
  $('.modal-footer button:not(".btn-default")').remove();

  // Create Butttons
  $.each(data.buttons, function(index, button){
    $('.modal-footer').prepend('<button type="button" id="' + button.id  + '" class="btn ' + button.css + '">' + button.label + '</button>')
  })

  //Show Modal
  $('#modaldafkeg').modal('show');

}
function modaltargetfisik(data) {
  /*modal*/
  // Set modal title
  $('.modal-title').html(data.title);
  $('#mtgkey').html(data.mgkey);

  // Clear buttons except Cancel
  $('.modal-footer button:not(".btn-default")').remove();

  // Create Butttons
  $.each(data.buttons, function(index, button){
    $('.modal-footer').prepend('<button type= "' + button.type  + '"  id="' + button.id  + '" class="btn ' + button.css + '">' + button.label + '</button>')
  })

  //Show Modal
  $('#modal-target').modal('show');

}

$('#btn-batal').click(function(){

  window.location.href = base_url+"User/admingeneral";

});

/*Button kembali atau back pada browser*/
$('#btn-kembali').click(function(){

    window.history.back();

});

// function initMCE() {
//   $("textarea.tinymce").tinymce({
//     theme: "modern",
//     toolbar_items_size: "small",
//     // toolbar: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify table | copy paste | bullist numlist | undo redo | link fullscreen localautosave ",
//     plugins: [
//             'advlist autolink lists link image charmap print preview hr anchor pagebreak',
//             'searchreplace wordcount visualblocks visualchars code fullscreen',
//             'insertdatetime media nonbreaking save table contextmenu directionality',
//             'emoticons template paste textcolor colorpicker textpattern imagetools'
//         ],
//     toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | forecolor backcolor emoticons',
//     image_advtab: true,
//     setup: function(editor) {
//       editor.on("change", function(e) {
//         //console.log("change event", e);
//         tinyMCE.triggerSave();
//         $("#" + editor.id).valid();
//       });
//     }
//   });
//   tinymce.suffix = ".min";
//   tinyMCE.baseURL = base_url+'assets/components/tinymce';
// }


// tinymce.init({
//         selector: "textarea#ltrblk",
//         theme: "modern",
//         height: 150,
//         plugins: [
//             'advlist autolink lists link image charmap print preview hr anchor pagebreak',
//             'searchreplace wordcount visualblocks visualchars code fullscreen',
//             'insertdatetime media nonbreaking save table contextmenu directionality',
//             'emoticons template paste textcolor colorpicker textpattern imagetools'
//         ],
//         toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | forecolor backcolor emoticons',
//         image_advtab: true
//     });
// tinymce.init({
//         selector: "textarea#tujuan",
//         theme: "modern",
//         height: 150,
//         plugins: [
//             'advlist autolink lists link image charmap print preview hr anchor pagebreak',
//             'searchreplace wordcount visualblocks visualchars code fullscreen',
//             'insertdatetime media nonbreaking save table contextmenu directionality',
//             'emoticons template paste textcolor colorpicker textpattern imagetools'
//         ],
//         toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | forecolor backcolor emoticons',
//         image_advtab: true
//     });
// tinymce.init({
//         selector: "textarea#sasaran",
//         theme: "modern",
//         height: 150,
//         plugins: [
//             'advlist autolink lists link image charmap print preview hr anchor pagebreak',
//             'searchreplace wordcount visualblocks visualchars code fullscreen',
//             'insertdatetime media nonbreaking save table contextmenu directionality',
//             'emoticons template paste textcolor colorpicker textpattern imagetools'
//         ],
//         toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | forecolor backcolor emoticons',
//         image_advtab: true
//     });
// tinymce.init({
//         selector: "textarea#input",
//         theme: "modern",
//         height: 150,
//         plugins: [
//             'advlist autolink lists link image charmap print preview hr anchor pagebreak',
//             'searchreplace wordcount visualblocks visualchars code fullscreen',
//             'insertdatetime media nonbreaking save table contextmenu directionality',
//             'emoticons template paste textcolor colorpicker textpattern imagetools'
//         ],
//         toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | forecolor backcolor emoticons',
//         image_advtab: true
//     });
// tinymce.init({
//         selector: "textarea#output",
//         theme: "modern",
//         height: 150,
//         plugins: [
//             'advlist autolink lists link image charmap print preview hr anchor pagebreak',
//             'searchreplace wordcount visualblocks visualchars code fullscreen',
//             'insertdatetime media nonbreaking save table contextmenu directionality',
//             'emoticons template paste textcolor colorpicker textpattern imagetools'
//         ],
//         toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | forecolor backcolor emoticons',
//         image_advtab: true
//     });
// tinymce.init({
//         selector: "textarea#outcome",
//         theme: "modern",
//         height: 150,
//         plugins: [
//             'advlist autolink lists link image charmap print preview hr anchor pagebreak',
//             'searchreplace wordcount visualblocks visualchars code fullscreen',
//             'insertdatetime media nonbreaking save table contextmenu directionality',
//             'emoticons template paste textcolor colorpicker textpattern imagetools'
//         ],
//         toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | forecolor backcolor emoticons',
//         image_advtab: true
//     });
// tinymce.init({
//         selector: "textarea#penutup",
//         theme: "modern",
//         height: 150,
//         plugins: [
//             'advlist autolink lists link image charmap print preview hr anchor pagebreak',
//             'searchreplace wordcount visualblocks visualchars code fullscreen',
//             'insertdatetime media nonbreaking save table contextmenu directionality',
//             'emoticons template paste textcolor colorpicker textpattern imagetools'
//         ],
//         toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | forecolor backcolor emoticons',
//         image_advtab: true
//     });


rizky = {

initMaterialWizard: function(){
        // Code for the Validator
        var $validator = $('.wizard-card form').validate({
          rules: {
            firstname: {
              required: true,
              minlength: 3
            },
            lastname: {
              required: true,
              minlength: 3
            },
            email: {
              required: true,
              minlength: 3,
            }
            },

            errorPlacement: function(error, element) {
                $(element).parent('div').addClass('has-error');
             }
      });

        // Wizard Initialization
        $('.wizard-card').bootstrapWizard({
            'tabClass': 'nav nav-pills',
            'nextSelector': '.btn-next',
            'previousSelector': '.btn-previous',

            onNext: function(tab, navigation, index) {

              var $valid = $('.wizard-card form').valid();
              if(!$valid) {
                $validator.focusInvalid();
                return false;
              }
            },

            onInit : function(tab, navigation, index){

              //check number of tabs and fill the entire row
              var $total = navigation.find('li').length;
              $width = 100/$total;
              var $wizard = navigation.closest('.wizard-card');

              $display_width = $(document).width();

              if($display_width < 600 && $total > 3){
                  $width = 50;
              }

               navigation.find('li').css('width',$width + '%');
               $first_li = navigation.find('li:first-child a').html();
               $moving_div = $('<div class="moving-tab">' + $first_li + '</div>');
               $('.wizard-card .wizard-navigation').append($moving_div);
               refreshAnimation($wizard, index);
               $('.moving-tab').css('transition','transform 0s');
           },

            onTabClick : function(tab, navigation, index){
                var $valid = $('.wizard-card form').valid();

                if(!$valid){
                    return false;
                } else{
                    return true;
                }
            },

            onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;

                var $wizard = navigation.closest('.wizard-card');

                // If it's the last tab then hide the last button and show the finish instead
                if($current >= $total) {
                    $($wizard).find('.btn-next').hide();
                    $($wizard).find('.btn-finish').show();
                } else {
                    $($wizard).find('.btn-next').show();
                    $($wizard).find('.btn-finish').hide();
                }

                button_text = navigation.find('li:nth-child(' + $current + ') a').html();

                setTimeout(function(){
                    $('.moving-tab').text(button_text);
                }, 150);

                var checkbox = $('.footer-checkbox');

                if( !index == 0 ){
                    $(checkbox).css({
                        'opacity':'0',
                        'visibility':'hidden',
                        'position':'absolute'
                    });
                } else {
                    $(checkbox).css({
                        'opacity':'1',
                        'visibility':'visible'
                    });
                }

                refreshAnimation($wizard, index);
            }
        });


        // Prepare the preview for profile picture
        $("#wizard-picture").change(function(){
            readURL(this);
        });

        $('[data-toggle="wizard-radio"]').click(function(){
            wizard = $(this).closest('.wizard-card');
            wizard.find('[data-toggle="wizard-radio"]').removeClass('active');
            $(this).addClass('active');
            $(wizard).find('[type="radio"]').removeAttr('checked');
            $(this).find('[type="radio"]').attr('checked','true');
        });

        $('[data-toggle="wizard-checkbox"]').click(function(){
            if( $(this).hasClass('active')){
                $(this).removeClass('active');
                $(this).find('[type="checkbox"]').removeAttr('checked');
            } else {
                $(this).addClass('active');
                $(this).find('[type="checkbox"]').attr('checked','true');
            }
        });

        $('.set-full-height').css('height', 'auto');

         //Function to show image before upload

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(window).resize(function(){
            $('.wizard-card').each(function(){
                $wizard = $(this);
                index = $wizard.bootstrapWizard('currentIndex');
                refreshAnimation($wizard, index);

                $('.moving-tab').css({
                    'transition': 'transform 0s'
                });
            });
        });

        function refreshAnimation($wizard, index){
            total_steps = $wizard.find('li').length;
            move_distance = $wizard.width() / total_steps;
            step_width = move_distance;
            move_distance *= index;

            $current = index + 1;

            if($current == 1){
                move_distance -= 8;
            } else if($current == total_steps){
                move_distance += 8;
            }

            $wizard.find('.moving-tab').css('width', step_width);
            $('.moving-tab').css({
                'transform':'translate3d(' + move_distance + 'px, 0, 0)',
                'transition': 'all 0.5s cubic-bezier(0.29, 1.42, 0.79, 1)'

            });
        }
    },
}
