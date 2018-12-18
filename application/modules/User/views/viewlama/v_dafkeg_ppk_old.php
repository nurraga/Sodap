<script type="text/javascript">

  $(document).ready(function() {
    var date=new Date();
    var year=date.getFullYear();
    var month=date.getMonth();
    $('#dateawalkeg').datetimepicker( {
  
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
            },
    startDate: new Date(year, month, '01'),
    endDate: new Date(year+1, month, '31')
    
    });
    $('#dateakhirkeg').datetimepicker( {
  
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
  rizky.initMaterialWizard();
  $('#entrikak').hide();
  ajaxtoken();

  $(".btnkak").click(function() {
    // jQuery("#listkegiatan").fadeOut("slow");
    // jQuery("#targetfisik").fadein("slow");
    ajaxtoken();
    var row = $(this).closest("tr");    // Find the row
    var kdkegunit = row.find(".id").text(); // Find the text
    var unit = $('#kdunit').html();
    var token = localStorage.getItem("token");
      $.ajax ({
        url: base_url+"User/jsondetkegppk/"+Math.random(),
        type: "POST",
        data: {
        unitkey : unit,
        idkeg   : kdkegunit,
        token   : token
      },
      dataType: "JSON",
      complete: function(data){
      ajaxtoken();
      var jsonData = JSON.parse(data.responseText);
      $('.entri-kak').html('Entri K.A.K');
      $('#fnamakegiatan').html(jsonData.header[0].nmkegunit);
      $('#fnilai').html(jsonData.header[0].msknilai);
      var masuk='<p>..............................................<span style="text-decoration: line-through;">Silahkan Edit Titik Titik ini</span>.........................................................</p>';
      tinymce.get("masukan").setContent(masuk+' '+jsonData.header[0].msknilai);
      $('#fnamapptk').html(jsonData.header[0].idpnspptk);
      $('#fnamappk').html(jsonData.header[0].idpnsppk);
     $( "#listkegiatan, #entrikak" ).slideToggle(1000,"easeOutQuint");

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
  $("#btn-kak-kembali").click(function() {
  // jQuery("#listkegiatan").fadeOut("slow");
  // jQuery("#targetfisik").fadein("slow");
   $( "#listkegiatan, #entrikak" ).slideToggle(1000)
});
  
  $(".btn-next").click(function() {
    // var myDiv = document.getElementById('wizardProfile');
    // scrollTo(myDiv, 0, 100);

        $('html, body').animate({
        scrollTop: $(".ryh").offset().top
    });
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
                                <div class="card-header card-header-icon" data-background-color="red">
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

                                                    <th class="col-xs-5 text-left" >Nama Kegiatan</th>                   
                                                    <th class="col-xs-3 text-left" >Nama PPTK</th>
                                                    <th class="col-xs-2 text-right" >Pagu Dana</th>
                                                      <th class=" td-actions text-center" ></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php
                                              $i = 0;
                                              foreach ($list as $row){
                                                  $i++;
                                                  $stat=$row['status'];
                                                
                                                  echo'<tr>
                                                    <td>'.$i.'</td>
                                                      <td class="id" style="display:none;">'.$row['kdkegunit'].'</td>
                                                      <td class="col-xs-5">'.$row['nmkegunit'].'</td>
                                                      <td class="col-xs-3">'.$row['idpnspptk'].'</td>
                                                      <td class="col-xs-2 text-right">'.$this->template->rupiah($row['nilai']).'</td>
                                                      <td class="td-actions text-center">
                                                      <button class="btnkak btn btn-success" >Entri K.A.K<div class="ripple-container"></div></button>
                                                   </td>
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
                    <div class="row" id="entrikak">

                        <div class="col-md-12">
                           <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">

                    <a class="btn btn-block btn-info" id="btn-kak-kembali">
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
                                  <h4 class="card-title entri-kak"></h4>

                                          <div class="toolbar">


                                          </div>
                                          
                                <!-- ----------------- -->

                                <div class="col-sm-12">
                                  
                              

                               
                               
                        <!--      Wizard container        -->
                        <div id="myDiv"></div>
                        <div class="wizard-container">
                            <div class="card wizard-card" data-color="rose" id="wizardProfile">
                                <form action="#" method="">
                                    <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                                    <div class="wizard-header">
                                        <h3 class="wizard-title">
                                            KERANGKA ACUAN KERJA
                                        </h3>
                                        
                            
                                        <h5>Nama Program</h5>
                                        <hr>
                                    </div>
                                   

                                    <div class="row">
                                    <div class="col-md-2 col-sm-2 col-md-offset-1 text-muted" style="text-align: left">Nama Kegiatan</div>
                                    <div class="col-md-1 col-sm-1 text-muted" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-6 col-sm-9 text-muted" style="padding-left: 25px"><p id="fnamakegiatan"></p></div>
                                </div>
                                        <br>
                                    <div class="row">
                                    <div class="col-md-2 col-sm-2 col-md-offset-1 text-muted" style="text-align: left">Nilai Kegiatan</div>
                                    <div class="col-md-1 col-sm-1 text-muted" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-6 col-sm-9 text-muted" style="padding-left: 25px"><p id="fnilai"></p></div>
                                </div>
                                <br>
                                 <div class="row">
                                    <div class="col-md-2 col-sm-2 col-md-offset-1 text-muted" style="text-align: left">Nama PPTK</div>
                                    <div class="col-md-1 col-sm-1 text-muted" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-6 col-sm-6 text-muted" style="padding-left: 25px"><p id="fnamapptk"></p></div>
                                </div>
                                <br>

                                <div class="row ryh">
                                    <div class="col-md-2 col-sm-2 col-md-offset-1 text-muted" style="text-align: left">Nama PPK</div>
                                    <div class="col-md-1 col-sm-1 text-muted" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-6 col-sm-6 text-muted" style="padding-left: 25px"><p id="fnamappk"></p></div>
                                </div>

                                <br>
                                    <div class="wizard-navigation">
                                        <ul>
                                            <li>
                                                <a href="#about" data-toggle="tab">Pendahuluan</a>
                                            </li>
                                            <li>
                                                <a href="#account" data-toggle="tab">Indikator Kinerja</a>
                                            </li>
                                             <li>
                                                <a href="#output" data-toggle="tab">Output Keluaran</a>
                                            </li>
                                            <li>
                                                <a href="#address" data-toggle="tab">Proses Pelaksanaan</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane" id="about">
                                            <div class="row">
                                              <div class="row">
                                    <div class="col-md-2 col-sm-2 col-md-offset-1" style="text-align: left;"><b>I. PENDAHULUAN</b></div>
                                    
                                      </div>
                                      <div class="row col-md-offset-1">
                                    <div class="col-md-3 col-sm-3 text-muted" style="text-align: left;"><b>A. LATAR BELAKANG   </b></div>
                                    
                                      </div>
                                       
                                    

                                      <div class="row col-md-10 col-sm-10 col-md-offset-1">
                                                                           
                                      <textarea id="ltrblk">
                               
                                    </textarea>
                                    <br>
                                    
                                      </div>
                                       <div class="row col-md-offset-1">
                                    <div class="col-md-3 col-sm-3 text-muted" style="text-align: left;"><b>B. TUJUAN DAN SASARAN</b></div>
                                    
                                      </div>
                                     
                                      <div class="row col-md-offset-1">
                                    <div class="col-md-3 col-sm-3 text-muted" style="text-align: left;">&nbsp&nbsp&nbsp&nbsp&nbsp<b>1. TUJUAN</b></div>
                                    
                                      </div>
                                             

                                      <div class="row col-md-10 col-sm-10 col-md-offset-1">
                                                                           
                                      <textarea id="tujuan">
                               
                                    </textarea>
                                      <br>
                                    
                                      </div>
                                    
                                         

                                         

                                      <!-- -- -->
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="account">
                                           
                                            <div class="row">
                                                 <div class="row col-md-offset-1">
                                    <div class="col-md-3 col-sm-3 text-muted" style="text-align: left;">&nbsp&nbsp&nbsp&nbsp&nbsp<b>2. SASARAN</b></div>
                                    
                                      </div>
                                             

                                      <div class="row col-md-10 col-sm-10 col-md-offset-1">
                                                                           
                                      <textarea id="sasaran">
                               
                                    </textarea>
                                      <br>
                                    
                                      </div>
                                                 <div class="row col-md-offset-1">
                                    <div class="col-md-3 col-sm-3 text-muted" style="text-align: left;"><b>C. INDIKATOR KINERJA</b></div>
                                    
                                      </div>
                                     
                                      <div class="row col-md-offset-1">
                                    <div class="col-md-3 col-sm-3 text-muted" style="text-align: left;">&nbsp&nbsp&nbsp&nbsp&nbsp<b>1. INPUT (MASUKAN)</b></div>
                                    
                                      </div>
                                             

                                      <div class="row col-md-10 col-sm-10 col-md-offset-1">
                                                                           
                                      <textarea id="masukan">
                                      
                                       
                                        
                                     </textarea>
                                      <br>
                                    
                                      </div> 
                                    </div>
                                  </div>
                                       <div class="tab-pane" id="output">
                                            <div class="row">
                                               <div class="row col-md-offset-1">
                                    <div class="col-md-3 col-sm-3 text-muted" style="text-align: left;">&nbsp&nbsp&nbsp&nbsp&nbsp<b>2. OUTPUT (KELUARAN)</b></div>
                                    
                                      </div>
                                              <br>

                                      <div class="row col-md-10 col-sm-10 col-md-offset-1">
                                                                           
                                      <textarea id="keluaran">
                               
                                    </textarea>
                                      <br>
                                    
                                      </div>
                                          <div class="row col-md-offset-1">
                                    <div class="col-md-3 col-sm-3 text-muted" style="text-align: left;">&nbsp&nbsp&nbsp&nbsp&nbsp<b>3. HASIL (OUTCOME)</b></div>
                                    
                                      </div>
                                              <br>

                                      <div class="row col-md-10 col-sm-10 col-md-offset-1">
                                                                           
                                      <textarea id="hasil">
                               
                                    </textarea>
                                      <br>
                                    
                                      </div>
                                                   
                                
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="address">
                                            <div class="row">
                                              <div class="row">
                                    <div class="col-md-3 col-sm-3 col-md-offset-1" style="text-align: left;"><b>II. PROSES PELAKSANAAN</b></div>
                                    
                                      </div>
                                     
                                  

                                  <div class="row">

                                    <div class="col-sm-3 col-md-offset-2">
                                 <div class="form-group">

                                        <label class="label-control">Awal Kegiatan</label>
                                        <input type="text" class="form-control datepicker" id="dateawalkeg">
                                    <span class="material-input"></span>
                                  </div>

                       

                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-3 col-md-offset-2">
                                 <div class="form-group">

                                        <label class="label-control">Akhir Kegiatan</label>
                                        <input type="text" class="form-control datepicker" id="dateakhirkeg">
                                    <span class="material-input"></span>
                                  </div>

                       

                                      </div>
                                  </div>
                                      
                                        
                                    
                                                  <div class="row">
                                    <div class="col-md-2 col-sm-2 col-md-offset-1" style="text-align: left;"><b>III. PENUTUP</b></div>
                                    
                                      </div>
                                      <br>

                                      <div class="row col-md-10 col-sm-10 col-md-offset-1">
                                                                           
                                      <textarea id="penutup">
                               
                                    </textarea>
                                      <br>
                                    
                                      </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wizard-footer">
                                        <div class="pull-right">
                                            <input type='button' class='btn btn-next btn-fill btn-rose btn-wd' name='next' value='Next' />
                                            <input type='button' class='btn btn-finish btn-fill btn-rose btn-wd' name='finish' value='Finish' />
                                        </div>
                                        <div class="pull-left">
                                            <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- wizard container -->
                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
  </div>
</div>


