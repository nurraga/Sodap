<script type="text/javascript" >

var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

</script>
<div class="content">

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <a class="btn btn-block btn-info" id="btn-kembali">
          <i class="fa fa-arrow-left"></i> Kembali
        </a>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">

      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-icon" data-background-color="blue">
            <i class="material-icons">assignment</i>
          </div>
          <div class="card-content">
            <h4 class="card-title">Rekap Belanja Modal Bulanan</h4>
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->

            </div>
            <div class="table-responsive">
              <table class="table table-bordered" cellspacing="0" width="100%" style="width:100%">
                <thead class="text-info">
                  <tr class="active">
                    <th rowspan="3" style="text-align: center;">No</th>
                    <th rowspan="3" style="width:30%">Nama OPD</th>
                    <th rowspan="3" style="text-align: center;">Pagu Dana</th>
                    <th colspan="4" style="text-align: center;">Keuangan</th>
                    <th colspan="2" rowspan="2" style="text-align: center;">Fisik</th>
                    <th rowspan="3" style="text-align: center;">Status</th>
                    <th rowspan="3" style="text-align: center;">Keterangan</th>
                    <th rowspan="3" style="text-align: center;">Aksi</th>
                  </tr>
                  <tr class="active">
                    <th colspan="2" style="text-align: center;">Target</th>
                    <th colspan="2" style="text-align: center;">Realisasai</th>
                  </tr>
                  <tr class="active">
                    <th>Persentase</th>
                    <th>Nilai</th>
                    <th>Persentase</th>
                    <th>Nilai</th>
                    <th>Target</th>
                    <th>Realisasi</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  $n=1;
                  foreach ($data as $key) {


                    ?>
                    <tr>
                      <td><?php echo $n++?></td>
                      <td><?php echo $key->nmunit ?></td>
                      <td style="text-align: right;"><?php echo $this->template->nominal($key->pagu_b_modal) ?></td>
                      <td style="text-align: center;">
                        <?php

                        echo number_format($key->persenTarKeu,2);
                        ?>%
                      </td>
                      <td><?php echo $this->template->nominal($key->targetKeu) ?></td>
                      <td style="text-align: center;"><?php echo $key->persentasiReal ?>%</td>
                      <td style="text-align: right;"><?php echo $this->template->nominal($key->realisasi_keu) ?></td>
                      <td style="text-align: center;"><?php echo $key->target_fis ?>%</td>
                      <td style="text-align: center;"><?php echo $key->realisasi_fis ?>%</td>
                      <td style="text-align: center;">
                        <?php
                        if($key->nilairapor < 80){
                          echo "<span class='label label-danger'>Belum Tercapai</span>";
                        }
                        else{
                          echo "<span class='label label-success'>Tercapai</span>";
                        }
                        ?>

                      </td>
                      <td style="text-align: center;">
                        <button class="btn btn-warning">Lihat<div class="ripple-container"></div></button>
                      </td>
                      <td style="text-align: center;"><button class="btn btn-info">Detail<div class="ripple-container"></div></td>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>

                </table>
              </div>

            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
