<script src="<?php echo base_url('assets/admin/plugins/input-mask/jquery.inputmask.bundle.js')?>"></script>
<script src="<?php echo base_url('assets/admin/plugins/jquery-spinner/dist/js/jquery.spinner.js')?>"></script>

<script type="text/javascript">
    $(document).ready(function() {
        ajaxtoken();
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
              }else if(parseInt(vol, 10) > parseInt(sisvol, 10)){
              swal(
                'info',
                'Volume Melebihi Yang di Tetapkan!!!',
                'info'
              );
              row.find(".envol").val(0);
              row.find(".enharga-satuan").val(0);

            }else if(parseInt(jumlah, 10) > parseInt(sisavoltarif, 10) ){
                  swal(
                    'info',
                    'Jumlah Melebihi Nilai Sisa Dana',
                    'info'
                  );
                  row.find(".envol").val(0);
                  row.find(".enharga-satuan").val(0);
            }else{
              var jumlah =hs.replace(",", ".")*vol;
              var sisa= parseInt(sisavoltarif, 10) - parseInt(jumlah, 10);
              row.find(".harga-jumlah").val(jumlah);
              row.find(".sisadana").val(sisa);
              var tot = totperrek(rek);
              console.log(totpagubln);
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
                return false;
              }
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
                  return false;
                }
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
                return false;
              }
            }


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
      //$(".sisadana"+rek).val(hs);
      return tot;
    }
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
      <div class="box-header with-border">
        <i class="fa fa-text-width"></i>
        <h3 class="box-title">Form Realisasi</h3>
      </div>
      <div class="box-body">
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
                      $class='danger';
                      echo'<tr class ="'.$class.'">
                        <td class="id" style="display:none;">'.$id.'</td>
                        <td class="unitkey" style="display:none;">'.$unitkey.'</td>
                        <td class="kdkegunit" style="display:none;">'.$kdkegunit.'</td>
                        <td class="mtgkey" style="display:none;">'.$mtgkey.'</td>
                        <td><b>'.$kdper.'</b></td>
                        <td><b>'.$nmper.'</b></td>
                        <td colspan="4"></td>
                        <td style="display:none;"><b>'.$this->template->rupiah($nilai).'</b></td>
                        <td style="display:none;"><b>'.$this->template->rupiah($jumsdhreal).'</b></td>
                        <td style="text-align:right"><b>'.$this->template->rupiah($sisablnskr).'</b></td>
                        <td colspan="7"></td>
                        <td colspan="2"  style="vertical-align : middle;text-align:center;"><button type="button" class="btnrealfisik btn bg-blue btn-flat bm'.$clasrek.'">Entri Belanja Modal<div class="ripple-container"></div></button></td>
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
                                  <td><input type='hidden' class='form-control rek' readonly name='kdrek[]''  value=".$kdper."></td>
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
                          $rowbulanlalu = $this->db->get()->row();


                          // jika type "H" (header)
                          if ($dettype=='H'){
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
                                  <td><input type='hidden' class='form-control rek' readonly name='kdrek[]''  value=".$kdper."></td>
                                  <td><ul class='list-unstyled'>
                                  <li><ul><li>$deturaian</li></ul></li>
                                  </ul></td>
                                  <td class='sisvol' style='text-align:center'>$sisavol</td>
                                  <td style='text-align:center'>$detsatuan</td>
                                  <td class='dettarif' style='display:none;'>$dettarif</td>
                                  <td style='text-align:right'><b>".$this->template->rupiah($dettarif)."</b></td>
                                  <td class='sisavoltarif' style='display:none;'>$sisvoltarif</td>
                                  <td style='text-align:right'><b>".$this->template->rupiah($sisvoltarif)."</b></td>
                                  <td class='active'></td>
                                  <td class='info' style='text-align:center'>$rowbulanlalu->nm_dana</td>
                                  <td class='info' style='text-align:center'>$rowbulanlalu->vol</td>
                                  <td class='info' style='text-align:center'><b>".$this->template->rupiah($rowbulanlalu->harga_satuan)."</b></td>
                                  <td class='info' style='text-align:center'><b>".$this->template->rupiah($rowbulanlalu->jumlah_harga)."</b></td>
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





</section>
