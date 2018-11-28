<script type="text/javascript">
    $(document).ready(function () {
        $("#dashkeg").click(function () {
            Pace.restart();
            Pace.track(function () {
                window.location.href = base_url + "User/kakppk";
            });
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
    <div class="row">
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>LIST</h3>
                    <p>Kegiatan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <!--   <a href="#" class="small-box-footer" id="dashkeg">
                      Proses <i class="fa fa-arrow-circle-right"></i>
                  </a> -->
                <a class="btn btn-block btn-social btn-success" id="dashkeg">
                    <i class="fa fa-bars"></i> proses
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <div class="row col-md-12 col-sm-12 col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border" style="font-size: 18px">
                <center><strong>Realisasi</strong></center>
            </div>
            <div class="box-body table-responsive">
                <div class="row col-md-offset-1 col-md-10 col-sm-10 col-xs-10">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <strong>Pagu Tahun</strong>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <?php echo $pagu_tahun; ?>
                    </div>
                </div>
                <div class="row col-md-offset-1 col-md-10 col-sm-10 col-xs-10">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <strong>Angkas sampai bulan ini</strong>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <?php echo $angkas_bulan; ?>
                    </div>
                </div>
                <div class="row col-md-offset-1 col-md-10 col-sm-10 col-xs-10">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <strong>Persentase realisasi bulan ini</strong>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <?php echo $persen_realisasi; ?>
                    </div>
                </div>
                <div class="row col-md-12 col-sm-12 col-xs-12">
                    <br>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td style="text-align: center">No</td>
                            <td>PPTK</td>
                            <td style="text-align: center">Persentase</td>
                            <td style="text-align: center">Nilai</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no=1;foreach ($lspptk as $pptk){ ?>
                        <tr>
                            <td style="text-align: center"><?php echo $no; ?></td>
                            <td><?php echo $pptk['nama'] ?></td>
                            <td style="text-align: center">%</td>
                            <td style="text-align: center">...</td>
                        </tr>
                        </tbody>
                        <?php $no++;} ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-data" class="modal fadeIn">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header" style="text-align: center">
                    Detail Realisasi
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-condensed">
                        <thead>
                        <tr>
                            <td rowspan="3" style="text-align: center;vertical-align: middle"><strong>Sumber Dana</strong></td>
                            <td colspan="3" style="text-align: center;vertical-align: middle"><strong>Realisasi</strong></td>
                            <td rowspan="3" style="text-align: center;vertical-align: middle"><strong>Sisa Dana</strong></td>
                        </tr>
                        <tr>
                            <td rowspan="2" style="text-align: center;vertical-align: middle"><strong>Volumes</strong></td>
                            <td rowspan="2" style="text-align: center;vertical-align: middle"><strong>Harga Satuan</strong></td>
                            <td rowspan="2" style="text-align: center;vertical-align: middle"><strong>Jumlah</strong></td>
                        </tr>
                        <tr>

                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php if($data_realisasi){ ?>
<script type="application/javascript">
    function addRowHandlers() {
        var table = document.getElementById("tabel-realisasi");
        var rows = table.getElementsByTagName("tr");
        for (i = 0; i < rows.length; i++) {
            var currentRow = table.rows[i];
            var createClickHandler = function(row) {
                return function() {
                    var cell = row.getElementsByTagName("td")[1];
                    var id = cell.innerHTML;
                    //alert("id:" + id);
                    //document.getElementById('nmpptk').innerHTML = id;
                    $('#modal-data').modal('show');
                };
            };
            currentRow.onclick = createClickHandler(currentRow);
        }
    }
    window.onload = addRowHandlers();
</script>
<?php } ?>
<!-- /.content -->









