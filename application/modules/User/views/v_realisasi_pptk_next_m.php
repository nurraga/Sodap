<script src="<?php echo base_url('assets/admin/plugins/input-mask/jquery.inputmask.bundle.js')?>"></script>
<script src="<?php echo base_url('assets/admin/plugins/jquery-spinner/dist/js/jquery.spinner.js')?>"></script>

<script type="text/javascript">

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
          <div class="row">
            <table class="table table-bordered ">
              <thead >
                <tr>
                  <th rowspan="3" style="vertical-align : middle;text-align:center; width: 100px">Kode Rekening</th>
                  <th rowspan="3" style="vertical-align : middle;text-align:center; width: 160px">Uraian</th>
                  <th colspan="2" style="vertical-align : middle;text-align:center;">ANGGARAN</th>

                  <th  class="danger" rowspan="3" style="vertical-align : middle;text-align:center; width: 80px">SUMBER DANA</th>
                  <th class="danger" colspan="2"  style="vertical-align : middle;text-align:center;">REALISASI BULAN LALU</th>
                  <th class="danger" rowspan="3" style="vertical-align : middle;text-align:center; width: 120px">SISA DANA</th>
                  <th rowspan="3" style="vertical-align : middle;text-align:center; width: 80px">SUMBER DANA</th>

                  <th colspan="3" style="vertical-align : middle;text-align:center;">REALISASI</th>
                  <th rowspan="3" style="vertical-align : middle;text-align:center; width: 130px">SISA DANA</th>
                </tr>
                <tr>
                  <th rowspan="2" style="vertical-align : middle;text-align:center;  width: 120px">Harga Satuan</th>
                  <th rowspan="2" style="vertical-align : middle;text-align:center; width: 130px">Jumlah Pagu</th>
                  <th class="danger" colspan="2" style="vertical-align : middle;text-align:center;">Rincian Bulan <span class="blink_me text-danger" style="color: white;
    text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;"><b>Januari</b></span></th>

                  <th rowspan="2" style="vertical-align : middle;text-align:center;  width: 120px">Volumea</th>
                  <th rowspan="2" style="vertical-align : middle;text-align:center; width: 130px">Harga Satuan</th>
                  <th rowspan="2" style="vertical-align : middle;text-align:center; width: 130px">Jumlah</th>
                </tr>
                <tr>
                  <th class="danger"  style="vertical-align : middle;text-align:center; width: 70px">Volume Realisasi</th>

                  <th class="danger"  style="vertical-align : middle;text-align:center; width: 120px">Jumlah Realisasi</th>
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

                    $jkrek=substr($kdper,0,6);

                    if($jkrek=='5.2.3.'){
                      $class='danger';
                    }else{
                      $class='active';
                    }
                  echo'<tr class ="'.$class.'">
                    <td class="id" style="display:none;">'.$id.'</td>
                    <td class="unitkey" style="display:none;">'.$unitkey.'</td>
                    <td class="kdkegunit" style="display:none;">'.$kdkegunit.'</td>
                    <td class="mtgkey" style="display:none;">'.$mtgkey.'</td>
                    <td><b>'.$kdper.'</b></td>
                    <td><b>'.$nmper.'</b></td>
                    <td></td>
                    <td style="text-align:right"><b>'.$this->template->rupiah($nilai).'</b></td>
                    <td class="info" ></td>
                    <td class="info" colspan="2"></td>
                    <td class="info" ></td>

                    <td colspan="5"></td>
                    </tr>';
                  }
                  ?>



                </tbody>
            </table>
          </div>

      </div>
      <div class="box-footer">

      </div>
    </div>





</section>
