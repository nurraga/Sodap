<section class="content-header">
    <h1>
        e-SIPD
        <small>Kota Payakumbuh</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Kasi') ?>"><i class="fa fa-list-alt"></i> Telaah Staff</a></li>
        <li class="active">Detail</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1">
            <div class="box box-warning">
                <div class="box-header">

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="t1" class="table table-bordered" style="border-width: 2px">
                        <tr>
                            <th>
                                <center><h4>Telaah Staff</h4></center>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <br>
                                <div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: right">Kepada</div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9" style="padding-left: 25px">
                                        Yth. Bpk. <?php echo $kepada; ?> Kota Payakumbuh
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: right">Dari</div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9" style="padding-left: 25px">
                                        <?php echo ucwords(strtolower($nm_opd)); ?>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: right">Tanggal</div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9" style="padding-left: 25px">
                                        <?php echo tanggal($tgl_pengajuan) ?>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: right">Perihal</div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9" style="padding-left: 25px">
                                        <?php echo $perihal; ?>
                                    </div>
                                </div>
                                <br>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <table id="t2" class="table table-bordered" style="border-width: 2px">
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: right">Persoalan</div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9" style="padding-left: 0px">
                                        <?php echo $persoalan; ?>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: right">Fakta-fakta yang
                                        mempengaruhi
                                    </div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9" style="padding-left: 0px">
                                        <?php echo $fakta; ?>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: right">Analisis</div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9" style="padding-left: 0px">
                                        <?php echo $analisis; ?>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: right">Saran</div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9" style="padding-left: 25px">
                                        Perjalanan dinas ini akan dilaksanakan pada
                                        tanggal <?php echo tanggal($tanggal_berangkat) ?>
                                        s/d <?php echo tanggal($tanggal_kembali) ?> yang akan dilaksanakan
                                        <?php if ($jumlah_pengikut == 0) { ?>
                                            <?php echo ' oleh ' . $jabatan_pelaksana . ' ' . $opd_pelaksana ?>
                                        <?php } else { ?>
                                            <?php
                                            $i=0;
                                            $no=2;
                                            if ($jumlah_pelaksana > 0) { ?>
                                                oleh:
                                                <br>
                                                <?php
                                                echo '1. ' . $jabatan_pelaksana . ' ' . ucwords(strtolower($opd_pelaksana)); ?>
                                                <br>
                                                <?php
                                                if($jumlah_wherepengikut>0){
                                                    //echo $jumlah_wherepengikut;
                                                    for($i;$i<$jumlah_wherepengikut;$i++){
                                                        echo $no+$i.'. '.$wherepengikut[$i]["nama_jabatan"].'<br>';
                                                    }
                                                    echo $no+$i . '. ' . $jumlah_pelaksana . ' orang pelaksana';
                                                }
                                                ?>
                                                <?php
                                            } else if ($jumlah_pelaksana == 0) { ?>
                                                oleh:
                                                <br>
                                                <?php
                                                echo '1. ' . $jabatan_pelaksana . ' ' . ucwords(strtolower($opd_pelaksana)); ?>
                                                <br>
                                                <?php
                                                foreach ($pengikut as $p) {
                                                    echo $start2++ . '. ' . $p["nama_jabatan"];
                                                    ?>
                                                    <br><?php
                                                }
                                            } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: right">Biaya yang di timbulkan di
                                        bebenkan kepada
                                    </div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9" style="padding-left: 25px">
                                        <?php echo '<b>' . $nama_kegiatan . '</b>'; ?> DINAS OPD TERKAIT dengan no
                                        Rekening <?php echo '<b>' . $no_rek . '</b>'; ?>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2 col-sm-2" style="text-align: right">
                                        Dokumen Pendukung
                                    </div>
                                    <div class="col-md-1 col-sm-1" style="text-align: right;width: 5px">:</div>
                                    <div class="col-md-9 col-sm-9" style="padding-left: 25px">
                                        <?php foreach ($dokumen as $d): ?>
                                            <a type="button" href="#" data-toggle="modal"
                                               data-target="#modal-default-<?php echo $d['id_dokumen'] ?>">
                                                Lihat Dokumen <?php echo $no++ ?>
                                            </a>
                                            <div class="modal fade" id="modal-default-<?php echo $d['id_dokumen'] ?>">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span></button>
                                                            <center><h4 class="modal-title">Dokumen Pendukung
                                                                    dari <?php echo ucwords(strtolower($nm_opd)); ?></h4>
                                                            </center>
                                                        </div>
                                                        <div class="modal-body">
                                                            <center><p><img style="width: 100%"
                                                                            src="<?php echo base_url('assets/dokumen_pendukung/' . $d['nama_dokumen']) ?>">
                                                                </p></center>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div><br>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <table class="table table-bordered" style="border-width: 2px">
                        <tr>
                            <th colspan="5" style="text-align: center">Tracking Telaah Staff</th>
                        </tr>
                        <tr>
                            <th style="text-align: center;width: 20%">Kabid</th>
                            <th style="text-align: center;width: 20%">Kadis</th>
                            <th style="text-align: center;width: 20%">Asisten</th>
                            <th style="text-align: center;width: 20%">Sekda</th>
                            <th style="text-align: center;width: 20%">Walikota</th>
                        </tr>

                        <?php if ($status_terakhir['status'] == 0) { ?>
                            <?php if ($jumlah_persetujuan == 1) { ?>
                                <tr>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box box-warning">
                                                <div class="box-header">
                                                    <center><h3 class="box-title" style="color: black">diproses</h3></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><br></center>
                                                </div>
                                                <!-- /.box-body -->
                                                <!-- Loading (remove the following to stop the loading)-->
                                                <div class="overlay">
                                                    <i class="fa fa-refresh fa-spin"></i>
                                                </div>
                                                <!-- end loading -->
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box">
                                                <div class="box-header">
                                                    <center><h3 class="box-title" style="color: black">Menunggu</h3></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><br></center>
                                                </div>
                                                <!-- /.box-body -->
                                                <!-- Loading (remove the following to stop the loading)-->
                                                <div class="overlay">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                                <!-- end loading -->
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box">
                                                <div class="box-header">
                                                    <center><h3 class="box-title" style="color: black">Menunggu</h3></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><br></center>
                                                </div>
                                                <!-- /.box-body -->
                                                <!-- Loading (remove the following to stop the loading)-->
                                                <div class="overlay">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                                <!-- end loading -->
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box">
                                                <div class="box-header">
                                                    <center><h3 class="box-title" style="color: black">Menunggu</h3></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><br></center>
                                                </div>
                                                <!-- /.box-body -->
                                                <!-- Loading (remove the following to stop the loading)-->
                                                <div class="overlay">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                                <!-- end loading -->
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box">
                                                <div class="box-header">
                                                    <center><h3 class="box-title" style="color: black">Menunggu</h3></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><br></center>
                                                </div>
                                                <!-- /.box-body -->
                                                <!-- Loading (remove the following to stop the loading)-->
                                                <div class="overlay">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                                <!-- end loading -->
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                </tr>
                            <?php } elseif ($jumlah_persetujuan == 2) { ?>
                                <tr>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box box-success">
                                                <div class="box-header">
                                                    <center class="text-green"><b>OK</b></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><span class="glyphicon glyphicon-ok text-green"></span></center>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box box-warning">
                                                <div class="box-header">
                                                    <center><h3 class="box-title" style="color: black">diproses</h3></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><br></center>
                                                </div>
                                                <!-- /.box-body -->
                                                <!-- Loading (remove the following to stop the loading)-->
                                                <div class="overlay">
                                                    <i class="fa fa-refresh fa-spin"></i>
                                                </div>
                                                <!-- end loading -->
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box">
                                                <div class="box-header">
                                                    <center><h3 class="box-title" style="color: black">Menunggu</h3></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><br></center>
                                                </div>
                                                <!-- /.box-body -->
                                                <!-- Loading (remove the following to stop the loading)-->
                                                <div class="overlay">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                                <!-- end loading -->
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box">
                                                <div class="box-header">
                                                    <center><h3 class="box-title" style="color: black">Menunggu</h3></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><br></center>
                                                </div>
                                                <!-- /.box-body -->
                                                <!-- Loading (remove the following to stop the loading)-->
                                                <div class="overlay">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                                <!-- end loading -->
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box">
                                                <div class="box-header">
                                                    <center><h3 class="box-title" style="color: black">Menunggu</h3></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><br></center>
                                                </div>
                                                <!-- /.box-body -->
                                                <!-- Loading (remove the following to stop the loading)-->
                                                <div class="overlay">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                                <!-- end loading -->
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                </tr>
                            <?php } elseif ($jumlah_persetujuan == 3) { ?>
                                <tr>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box box-success">
                                                <div class="box-header">
                                                    <center class="text-green"><b>OK</b></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><span class="glyphicon glyphicon-ok text-green"></span></center>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box box-success">
                                                <div class="box-header">
                                                    <center class="text-green"><b>OK</b></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><span class="glyphicon glyphicon-ok text-green"></span></center>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box box-warning">
                                                <div class="box-header">
                                                    <center><h3 class="box-title" style="color: black">diproses</h3></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><br></center>
                                                </div>
                                                <!-- /.box-body -->
                                                <!-- Loading (remove the following to stop the loading)-->
                                                <div class="overlay">
                                                    <i class="fa fa-refresh fa-spin"></i>
                                                </div>
                                                <!-- end loading -->
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box">
                                                <div class="box-header">
                                                    <center><h3 class="box-title" style="color: black">Menunggu</h3></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><br></center>
                                                </div>
                                                <!-- /.box-body -->
                                                <!-- Loading (remove the following to stop the loading)-->
                                                <div class="overlay">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                                <!-- end loading -->
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box">
                                                <div class="box-header">
                                                    <center><h3 class="box-title" style="color: black">Menunggu</h3></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><br></center>
                                                </div>
                                                <!-- /.box-body -->
                                                <!-- Loading (remove the following to stop the loading)-->
                                                <div class="overlay">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                                <!-- end loading -->
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                </tr>
                            <?php } elseif ($jumlah_persetujuan == 4) { ?>
                                <tr>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box box-success">
                                                <div class="box-header">
                                                    <center class="text-green"><b>OK</b></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><span class="glyphicon glyphicon-ok text-green"></span></center>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box box-success">
                                                <div class="box-header">
                                                    <center class="text-green"><b>OK</b></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><span class="glyphicon glyphicon-ok text-green"></span></center>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box box-success">
                                                <div class="box-header">
                                                    <center class="text-green"><b>OK</b></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><span class="glyphicon glyphicon-ok text-green"></span></center>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box box-warning">
                                                <div class="box-header">
                                                    <center><h3 class="box-title" style="color: black">diproses</h3></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><br></center>
                                                </div>
                                                <!-- /.box-body -->
                                                <!-- Loading (remove the following to stop the loading)-->
                                                <div class="overlay">
                                                    <i class="fa fa-refresh fa-spin"></i>
                                                </div>
                                                <!-- end loading -->
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box">
                                                <div class="box-header">
                                                    <center><h3 class="box-title" style="color: black">Menunggu</h3></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><br></center>
                                                </div>
                                                <!-- /.box-body -->
                                                <!-- Loading (remove the following to stop the loading)-->
                                                <div class="overlay">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                                <!-- end loading -->
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                </tr>
                            <?php } elseif ($jumlah_persetujuan == 5) { ?>
                                <tr>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box box-success">
                                                <div class="box-header">
                                                    <center class="text-green"><b>OK</b></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><span class="glyphicon glyphicon-ok text-green"></span></center>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box box-success">
                                                <div class="box-header">
                                                    <center class="text-green"><b>OK</b></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><span class="glyphicon glyphicon-ok text-green"></span></center>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box box-success">
                                                <div class="box-header">
                                                    <center class="text-green"><b>OK</b></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><span class="glyphicon glyphicon-ok text-green"></span></center>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box box-success">
                                                <div class="box-header">
                                                    <center class="text-green"><b>OK</b></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><span class="glyphicon glyphicon-ok text-green"></span></center>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box box-warning">
                                                <div class="box-header">
                                                    <center><h3 class="box-title" style="color: black">diproses</h3></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><br></center>
                                                </div>
                                                <!-- /.box-body -->
                                                <!-- Loading (remove the following to stop the loading)-->
                                                <div class="overlay">
                                                    <i class="fa fa-refresh fa-spin"></i>
                                                </div>
                                                <!-- end loading -->
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } elseif ($status_terakhir['status'] == 1) { ?>
                            <tr>
                                <td>
                                    <div class="col-md-12">
                                        <div class="box box-success">
                                            <div class="box-header">
                                                <center class="text-green"><b>OK</b></center>
                                            </div>
                                            <div class="box-body">
                                                <center><span class="glyphicon glyphicon-ok text-green"></span></center>
                                            </div>
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-12">
                                        <div class="box box-success">
                                            <div class="box-header">
                                                <center class="text-green"><b>OK</b></center>
                                            </div>
                                            <div class="box-body">
                                                <center><span class="glyphicon glyphicon-ok text-green"></span></center>
                                            </div>
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-12">
                                        <div class="box box-success">
                                            <div class="box-header">
                                                <center class="text-green"><b>OK</b></center>
                                            </div>
                                            <div class="box-body">
                                                <center><span class="glyphicon glyphicon-ok text-green"></span></center>
                                            </div>
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-12">
                                        <div class="box box-success">
                                            <div class="box-header">
                                                <center class="text-green"><b>OK</b></center>
                                            </div>
                                            <div class="box-body">
                                                <center><span class="glyphicon glyphicon-ok text-green"></span></center>
                                            </div>
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-12">
                                        <div class="box box-success">
                                            <div class="box-header">
                                                <center class="text-green"><b>OK</b></center>
                                            </div>
                                            <div class="box-body">
                                                <center><span class="glyphicon glyphicon-ok text-green"></span></center>
                                            </div>
                                        </div>
                                        <!-- /.box -->
                                    </div>
                                </td>
                            </tr>
                        <?php } else { ?>
                            <?php if ($jumlah_persetujuan == 2) { ?>
                                <tr>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box box-danger">
                                                <div class="box-header">
                                                    <center class="text-red"><b>Ditolak</b></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><span class="glyphicon glyphicon-remove text-red"></span></center>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <?php } elseif ($jumlah_persetujuan == 3) { ?>
                                <tr>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box box-success">
                                                <div class="box-header">
                                                    <center class="text-green"><b>OK</b></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><span class="glyphicon glyphicon-ok text-green"></span></center>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box box-danger">
                                                <div class="box-header">
                                                    <center class="text-red"><b>Ditolak</b></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><span class="glyphicon glyphicon-remove text-red"></span></center>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <?php } elseif ($jumlah_persetujuan == 4) { ?>
                                <tr>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box box-success">
                                                <div class="box-header">
                                                    <center class="text-green"><b>OK</b></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><span class="glyphicon glyphicon-ok text-green"></span></center>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box box-success">
                                                <div class="box-header">
                                                    <center class="text-green"><b>OK</b></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><span class="glyphicon glyphicon-ok text-green"></span></center>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box box-danger">
                                                <div class="box-header">
                                                    <center class="text-red"><b>Ditolak</b></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><span class="glyphicon glyphicon-remove text-red"></span></center>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <?php } elseif ($jumlah_persetujuan == 5) { ?>
                                <tr>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box box-success">
                                                <div class="box-header">
                                                    <center class="text-green"><b>OK</b></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><span class="glyphicon glyphicon-ok text-green"></span></center>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box box-success">
                                                <div class="box-header">
                                                    <center class="text-green"><b>OK</b></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><span class="glyphicon glyphicon-ok text-green"></span></center>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box box-success">
                                                <div class="box-header">
                                                    <center class="text-green"><b>OK</b></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><span class="glyphicon glyphicon-ok text-green"></span></center>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box box-danger">
                                                <div class="box-header">
                                                    <center class="text-red"><b>Ditolak</b></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><span class="glyphicon glyphicon-remove text-red"></span></center>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                            <?php } elseif ($jumlah_persetujuan == 6) { ?>
                                <tr>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box box-success">
                                                <div class="box-header">
                                                    <center class="text-green"><b>OK</b></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><span class="glyphicon glyphicon-ok text-green"></span></center>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box box-success">
                                                <div class="box-header">
                                                    <center class="text-green"><b>OK</b></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><span class="glyphicon glyphicon-ok text-green"></span></center>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box box-success">
                                                <div class="box-header">
                                                    <center class="text-green"><b>OK</b></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><span class="glyphicon glyphicon-ok text-green"></span></center>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box box-success">
                                                <div class="box-header">
                                                    <center class="text-green"><b>OK</b></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><span class="glyphicon glyphicon-ok text-green"></span></center>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="box box-danger">
                                                <div class="box-header">
                                                    <center class="text-red"><b>Ditolak</b></center>
                                                </div>
                                                <div class="box-body">
                                                    <center><span class="glyphicon glyphicon-remove text-red"></span></center>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </table>
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-8">

                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



