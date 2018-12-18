<script type="text/javascript">
    $(function () {
 

  });
    function bs_input_file(){
        $(".input-file").before(
            function() {
                if ( ! $(this).prev().hasClass('input-ghost') ) {
                    var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
                    element.attr("name",$(this).attr("name"));
                    element.change(function(){
                        element.next(element).find('input').val((element.val()).split('\\').pop());
                    });
                    $(this).find("button.btn-choose").click(function(){
                        element.click();
                    });
                    $(this).find("button.btn-reset").click(function(){
                        element.val(null);
                        $(this).parents(".input-file").find('input').val('');
                    });
                    
                    $(this).find('input').css("cursor","pointer");
                    $(this).find('input').mousedown(function() {
                        $(this).parents('.input-file').prev().click();
                        return false;
                    });
                    return element;
                }
            }
        );
    }
    $(function() {
        bs_input_file();
    });

    $(document).ready(function() {
        ajaxtoken();
        $(".select2").select2({
            placeholder: "* Pilih Nama Pejabat",
            width: "200px"
        });
        
        var validobj = $("#formkegiatan").validate({
            onkeyup: false,
            errorClass: "myErrorClass",

        errorPlacement: function (error, element) {
            var elem = $(element);
            error.insertAfter(element);
        },

        highlight: function (element, errorClass, validClass) {
            var elem = $(element);
            if (elem.hasClass("select2")) {
                $("#s2id_" + elem.attr("id") + " ul").addClass(errorClass);
            } else {
                elem.addClass(errorClass);
            }
        },

        unhighlight: function (element, errorClass, validClass) {
            var elem = $(element);
            if (elem.hasClass("select2")) {
                $("#s2id_" + elem.attr("id") + " ul").removeClass(errorClass);
            } else {
                elem.removeClass(errorClass);
            }
        }
        });
         $(document).on("change", ".select2", function () {
            if (!$.isEmptyObject(validobj.submitted)) {
                validobj.form();
              
            }
        });

        $(document).on("select2-opening", function (arg) {
            var elem = $(arg.target);
            if ($("#s2id_" + elem.attr("id") + " ul").hasClass("myErrorClass")) {
                //jquery checks if the class exists before adding.
                $(".select2-drop ul").addClass("myErrorClass");
            } else {
                $(".select2-drop ul").removeClass("myErrorClass");
            }
        });
        var i = 0;
        $(".btn-add").click(function(){
            i++;
            var markup  = "<tr>";
                markup += "<td>";
                markup += "<label class='control-label'>&nbsp</label>\
                            <div class='form-group'>\
                                <label>\
                                 <input type='checkbox' class='minimal-red' name='record'>\
                                </label>\
                            </div>";
                markup += "</td>";
                markup += "<td>";
                markup += "<div class='form-group label-floating is-empty'>\
                            <label class='control-label'>* Nama File (ex: SK no. xx Th xxxx)</label>\
                            <input type='text' class='form-control required' name='namadokumen["+i+"]' id='namadokumenid["+i+"]'>\
                            <span class='material-input'></span>\
                            </div>";
                markup += "</td>";
                markup += "<td>";
                markup += "<label class='control-label'>&nbsp</label>\
                            <div class='input-group input-file' name='userfile[]' id='userfile'>\
                            <input type='text' class='form-control' placeholder='Pilih Dokumen...' />\
                            <span class='input-group-btn'>\
                            <button type='button' class='btn btn-info btn-choose' >Choose</button>\
                            </span>\
                            </div>";
                markup += "</td>";
                markup += "<td>";
                markup += "</td>";
                markup += "</tr>";
            $(".tabel-dokumen tbody").append(markup);
            bs_input_file();
            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
              checkboxClass: 'icheckbox_minimal-blue',
              radioClass   : 'iradio_minimal-blue'
            })
            //Red color scheme for iCheck
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
              checkboxClass: 'icheckbox_minimal-red',
              radioClass   : 'iradio_minimal-red'
            })
            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
              checkboxClass: 'icheckbox_flat-green',
              radioClass   : 'iradio_flat-green'
            })
            
        });

        $(".btn-hapus").click(function(){
            $(".tabel-dokumen tbody").find('input[name="record"]').each(function(){
                if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });
    });
    
    $(function () {
        $('#formkegiatan').submit(function (e, params) {
            var localParams = params || {};
            if (!localParams.send) {
                e.preventDefault();
            }
            if($(this).valid()) {
                swal({
                  title: "Pastikan Data Sudah Benar",
                  text: "Simpan dan Kirim Entri Kegiatan",
                  type: "warning",
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
                        var token = localStorage.getItem("token");
                        var formData = new FormData($('#formkegiatan')[0]);
                        formData.append("token",token);
                        $.ajax({
                            url: base_url+"User/simpanentrikegiatan",
                            type: 'POST',
                            data: formData,
                            mimeType: "multipart/form-data",
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function(result){
                                swal({
                                  title: "Sukses",
                                  text: "Data berhasil di Kirim !!!",
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
                                     /*jika suskser direct ke */
                                     window.location.href = base_url+"User";
                                  }
                                });

                                                
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
            }
        });
    });

</script>


<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    SODAP
    <small>Kota Payakumbuh</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

</ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="callout callout-info">
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


<div class="box box-primary">
  <div class="box-header with-border">
    <i class="fa fa-text-width"></i>
    <h3 class="box-title">Form Entri PPTK-PPK</h3>
  </div>
  <div class="box-body">
    <form id="formkegiatan" enctype="multipart/form-data" role="form" autocomplete="off">     
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama Kegiatan</th>
                                            <th class="col-xs-2 text-right">Pagu Dana</th>
                                            <th class="col-xs-1 text-center ">PPTK</th>
                                            <th class="col-xs-1 text-center ">PPK</th>   
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                            foreach ($list as $row){
                                                // $tahun = date("Y");
                                                // $unitkey = $row->unitkey;
                                                // $kdkegunit = $row->kdkegunit;
                                                // $this->db->where('tahun', $tahun);
                                                // $this->db->where('unitkey', $unitkey);
                                                
                                                // $ada=$this->db->get('tab_pptk_master')->row();
                                                // if(!$ada){
                                                  
                                                // }
                                                  echo'<tr>        
                                                    <td>'.$row->namakeg.'<div class="form-group"><input class="form-control" name="nmkdkeg[]"" type="hidden" value='.$row->kdkegunit.'></div></td>
                                                    <td class="text-right">'.$this->template->rupiah($row->nilai).'<div class="form-group"><input class="form-control" name="nilai[]" type="hidden" value='.$row->nilai.'></div></td>
                                                    <td class="text-center info"><select name="nmpptk['.$i.']" id="idpptk['.$i.']" size="1" class="select2 required"><option value=""></option>';
                                                        foreach ($pptk as $xrow) {
                                                            echo "<option value='{$xrow->nip}'>{$xrow->nama}</option>";
                                                        }
                                                echo'</select></td>   
                                                    <td class="text-center danger"><select name="nmppk['.$i.']" id="idppk['.$i.']" size="1" class="select2 required"><option value=""></option>';
                                                        foreach ($ppk as $yrow) {
                                                            echo "<option value='{$yrow->nip}'>{$yrow->nama}</option>";
                                                        }
                                                echo'</select></td>    
                                                    </tr>';
                                                 $i++; 
                                            }
                                        ?>
                                    </tbody>
                                </table>    
                            </div>
                            <hr class="style13">



                            <div class="row">
                               <div class="col-md-12">
                            <legend>Dokumen Pendukung</legend>

                            <table class="table table-striped tabel-dokumen">
                                <tbody>

                                    <tr>
                                        <td>
                                            
                                        </td>
                                        <td>

                                            
                                            <div class="form-group is-empty">

                                                <label class="control-label">* Nama File (ex: SK no. xx Th xxxx)</label>
                                                <input type="text" class="form-control required" name="namadokumen[0]" id="namadokumenid[0]">
                                                <span class="material-input"></span>
                                            </div>
                                            
                                        </td>
                                        <td>

                                        <!-- <div class="form-group">
                                            <label class="control-label">&nbsp</label>
                                            <div class="input-group input-file" name="userfile[]" id="userfile">  
                                                <input type="text" class="form-control" placeholder='Pilih Dokumen...' />
                                                <span class="input-group-btn">
                                                    <button class="btn btn-info btn-sm btn-choose" type="button">Choose</button>
                                                </span>
                                                
                                                <span class="input-group-btn">
                                                   
                                                </span>
                                            </div>
                                          
                                        </div> -->
                                        <label class="control-label">&nbsp</label>
                                        <div class="input-group input-file" name="userfile[]" id="userfile">
                                            <input type="text" class="form-control" placeholder='Pilih Dokumen...' />
                                                <span class="input-group-btn">
                                                  <button type="button" class="btn btn-info btn-choose">Choose!</button>
                                                </span>
                                        </div>
                                        </td>
                                        <td class="col-xs-3 text-center">

                                        <label class="control-label">&nbsp</label>
                                        <div class="input-group input-group">
                                            <label class="control-label">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                                            <div class="btn-group">
                                                <button class="btn btn-info btn-add" type="button"><i class="fa fa-fw fa-plus"></i></button>
                                                <button class="btn btn-danger btn-hapus" type="button"><i class="fa fa-fw fa-remove"></i></button>      
                                            </div>
                                        </div>
                                            
                                        </td>
                                        
                                    </tr>     
                                </tbody>
                            </table>
                            
                           </div> 

                            </div>
                            <hr class="style13">
                            <div class="category form-category">
                                <small>*</small> Required fields</div>
                                <div class="form-footer text-right">
                                    <button type="button" class="btn btn-rose btn-fill" id="btn-batal">Batal</button>
                                    <button type="submit" class="btn btn-info btn-fill" id="btn-simpankegiatan" >Simpan</button>
                                   
                                </div>
                            <div class="card-footer">          
                            </div>                 
                        </form>
  </div>
</div>
 

</section>
<!-- /.content -->









