<section class="content-header">

</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="box box-warning">
                <div class="box-header" style="border-width: medium">
                    <center><h3>ENTRI LAPORAN PERJALANAN DINAS</h3></center>
                    <hr>
                </div>
                <div class="box-body">
                    <form class="form" method="post" action="<?php echo base_url('Kasi/store_laporan/') . $id ?>"
                          enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group col-md-12">
                                    <label class="control-label col-md-3">
                                        Instansi yang dikunjungi
                                    </label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" value="<?php echo $kantor_tujuan ?>"
                                               disabled>
                                        <input type="hidden" class="form-control" value="<?php echo $id_tujuan ?>"
                                               name="id_tujuan">
                                        <input type="hidden" value="<?php echo $id ?>" name="id_ts">
                                        <input type="hidden" value="<?php echo $id_pns ?>" name="id_pns">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group col-md-12">
                                    <label class="control-label col-md-3">
                                        <br>
                                        Diterima oleh pejabat:
                                    </label>
                                    <div class="col-md-5">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group col-md-12">
                                    <label class="control-label col-md-3" style="text-align: right">
                                        Nama
                                    </label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" placeholder="Nama Pejabat" name="nama">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group col-md-12">
                                    <label class="control-label col-md-3" style="text-align: right">
                                        Jabatan
                                    </label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" placeholder="Jabatan"
                                               name="jabatan_pejabat">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group col-md-12">
                                    <label class="control-label col-md-3" style="text-align: right">
                                        NIP
                                    </label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" placeholder="NIP" name="nip_pejabat">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group col-md-12">
                                    <label class="control-label col-md-3" style="text-align: right">
                                        Tanggal
                                    </label>
                                    <div class="col-md-5" style="text-align: right">
                                        <input type="text" class="form-control datepicker" id="tglditerima"
                                               name="tanggal_kegiatan" placeholder="Tanggal">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group col-md-12" style="text-align: right">
                                    <label class="control-label col-md-3">
                                        Tempat
                                    </label>
                                    <div class="col-md-5" style="text-align: right">
                                        <input type="text" class="form-control" placeholder="Tempat"
                                               name="lokasi_kegiatan">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group col-md-12">
                                    <label class="control-label col-md-3" style="text-align: right">
                                        Topik/masalah
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="Topik atau masalah"
                                               name="topik">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group col-md-12">
                                    <label class="control-label col-md-3"
                                           style="text-align: right"></label>
                                    <div class="col-md-9">
                                                <textarea id="editor1" class="form-control" rows="7" placeholder="..."
                                                          name="laporan"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group col-md-12">
                                    <label class="control-label col-md-3" style="text-align: right">
                                        Dokumen Laporan
                                    </label>
                                    <div class="col-md-9">
                                        <?php form_open_multipart('Kasi/store_laporan') ?>
                                        <input type="file" accept="application/pdf" name="dokumen_laporan">
                                        <br>
                                        <small><i><b class="text-red">*</b> Format Dokumen : PDF</i></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group col-md-12">
                                    <label class="control-label col-md-3" style="text-align: right">

                                    </label>
                                    <div class="col-md-9">
                                        <button type="submit" class="btn btn-primary pull-right">
                                            <i class="fa fa-save"></i> Simpan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
<!-- CK Editor -->
<script src="<?php echo base_url('assets/bower_components/ckeditor/ckeditor.js') ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>
<script type="text/javascript">
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1')
        //bootstrap WYSIHTML5 - text editor
    })

    $(function () {
        $('#tglditerima').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        })
    });

    $(function () {
        $('#tglKembali').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        })
    });

    //function untuk menampilkan tujuan
    function tampilkanTujuan() {
        var date1 = document.getElementById("tglBerangkat").value;
        var date2 = document.getElementById("tglKembali").value;
        var array1 = date1.split("/");
        var array2 = date2.split("/");
        var tJanuari = 31;
        var tFebruari = 28;
        var tMaret = 31;
        var tApril = 30;
        var tMei = 31;
        var tJuni = 30;
        var tJuli = 31;
        var tAgustus = 31;
        var tSeptember = 30;
        var tOktober = 31;
        var tNovember = 30;
        var tDesember = 31;
        var totalHari;

        if (array1[1] == 1) {
            totalHari = tJanuari;
        } else if (array1[1] == 2) {
            totalHari = tFebruari;
        } else if (array1[1] == 3) {
            totalHari = tMaret;
        } else if (array1[1] == 4) {
            totalHari = tApril;
        } else if (array1[1] == 5) {
            totalHari = tMei;
        } else if (array1[1] == 6) {
            totalHari = tJuni;
        } else if (array1[1] == 7) {
            totalHari = tJuli;
        } else if (array1[1] == 8) {
            totalHari = tAgustus
        } else if (array1[1] == 9) {
            totalHari = tSeptember;
        } else if (array1[1] == 10) {
            totalHari = tOktober;
        } else if (array1[1] == 11) {
            totalHari = tNovember;
        } else if (array1[1] == 12) {
            totalHari = tDesember;
        }

        if (date1 && date2) {
            var jumlahHari;
            var totalTujuan;
            if (array1[1] == array2[1]) {
                jumlahHari = (parseInt(array2[0]) - parseInt(array1[0])) + 1;
                //console.log(jumlahHari);
            } else if (array1[1] < array2[1]) {
                var hb1 = (totalHari - array1[0]) + 1;
                jumlahHari = parseInt(hb1) + parseInt(array2[0]);
                //console.log(jumlahHari);
            }

            if (jumlahHari / 3 == 1) {
                totalTujuan = 1;
            } else if (jumlahHari / 3 > 1) {
                totalTujuan = 2;
            } else {
                totalTujuan = 0;
            }

            var template = '<div class="row">' +
                '<div class="col-md-12">' +
                '<div class="form-group">' +
                '<label class="control-label col-md-2" style="text-align: right">' +
                'Tujuan' +
                '</label>' +
                '<div class="col-md-10">' +
                '<div class="col-md-4">' +
                '<select class="form-control provtujuan" id="provinsi" name="provinsitujuan[]">' +
                '<option>' +
                'provinsi' +
                '</option>' +
                '</select>' +
                '</div>' +
                '<div class="col-md-4">' +
                '<select class="form-control" id="kota" name="kotatujuan[]">' +
                '<option>- Pilihan Kota/Kabupaten -</option>' +
                '</select>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div><br>' +
                '<div class="row">' +
                '<div class="col-md-12">' +
                '<div class="form-group">' +
                '<label class="control-label col-md-2" style="text-align: right">' +
                'Kantor Tujuan' +
                '</label>' +
                '<div class="col-md-10">' +
                '<div class="col-md-4">' +
                '<input type="text" class="form-control" placeholder="Nama Kantor" name="kantortujuan[]">' +
                '</div>' +
                '<div class="col-md-6">' +
                '<input type="text" class="form-control" placeholder="Alamat Kantor (optional)" name="alamattujuan[]">' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div><br>' +
                '<div class="row">' +
                '<div class="col-md-12">' +
                '<div class="form-group">' +
                '<label class="control-label col-md-2" style="text-align: right">' +
                'Kontak Tujuan' +
                '</label>' +
                '<div class="col-md-10">' +
                '<div class="col-md-4">' +
                '<div class="input-group">' +
                '<span class="input-group-addon"><i class="fa fa-phone"></i></span>' +
                '<input type="text" class="form-control" placeholder="Telepon (optional)" name="telpontujuan[]">' +
                '</div>' +
                '</div>' +
                '<div class="col-md-6">' +
                '<div class="input-group">' +
                '<span class="input-group-addon"><i class="fa fa-envelope"></i></span>' +
                '<input type="text" class="form-control" placeholder="Email (optional)" name="emailtujuan[]">' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div><hr>';

            var template2 = '<div class="row">' +
                '<div class="col-md-12">' +
                '<div class="form-group">' +
                '<label class="control-label col-md-2" style="text-align: right">' +
                'Tujuan ke 2' +
                '</label>' +
                '<div class="col-md-10">' +
                '<div class="col-md-4">' +
                '<select class="form-control provtujuan2" id="provinsi2" name="provinsitujuan[]">' +
                '<option>' +
                'provinsi' +
                '</option>' +
                '</select>' +
                '</div>' +
                '<div class="col-md-4">' +
                '<select class="form-control" id="kota2" name="kotatujuan[]">' +
                '<option>- Pilihan Kota/Kabupaten -</option>' +
                '</select>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div><br>' +
                '<div class="row">' +
                '<div class="col-md-12">' +
                '<div class="form-group">' +
                '<label class="control-label col-md-2" style="text-align: right">' +
                'Kantor Tujuan ke 2' +
                '</label>' +
                '<div class="col-md-10">' +
                '<div class="col-md-4">' +
                '<input type="text" class="form-control" placeholder="Nama Kantor" name="kantortujuan[]">' +
                '</div>' +
                '<div class="col-md-6">' +
                '<input type="text" class="form-control" placeholder="Alamat Kantor (optional)" name="alamattujuan[]">' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div><br>' +
                '<div class="row">' +
                '<div class="col-md-12">' +
                '<div class="form-group">' +
                '<label class="control-label col-md-2" style="text-align: right">' +
                'Kontak Tujuan ke 2' +
                '</label>' +
                '<div class="col-md-10">' +
                '<div class="col-md-4">' +
                '<div class="input-group">' +
                '<span class="input-group-addon"><i class="fa fa-phone"></i></span>' +
                '<input type="text" class="form-control" placeholder="Telepon (optional)" name="telpontujuan[]">' +
                '</div>' +
                '</div>' +
                '<div class="col-md-6">' +
                '<div class="input-group">' +
                '<span class="input-group-addon"><i class="fa fa-envelope"></i></span>' +
                '<input type="text" class="form-control" placeholder="Email (optional)" name="emailtujuan[]">' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div><hr>';

            function getDataProv() {
                var op = "";
                $.ajax({
                    type: "get",
                    url: "Kasi/dataProv",
                    success: function (data) {
                        op += '' + '<option selected disabled>- Pilihan Provinsi -</option>';
                        op += '' + data;
                        document.getElementById("provinsi").innerHTML = op;
                    },
                    error: function () {
                        //do nothing
                    }
                })
            }

            function getDataProv2() {
                var op = "";
                $.ajax({
                    type: "get",
                    url: "Kasi/dataProv",
                    success: function (data) {
                        op += '' + '<option selected disabled>- Pilihan Provinsi -</option>';
                        op += '' + data;
                        document.getElementById("provinsi2").innerHTML = op;
                    },
                    error: function () {
                        //do nothing
                    }
                })
            }

            if (totalTujuan == 1) {
                document.getElementById("tujuan1").innerHTML = template;
                document.getElementById("tujuan2").innerHTML = '';
                getDataProv();
            } else if (totalTujuan == 2) {
                document.getElementById("tujuan1").innerHTML = template;
                document.getElementById("tujuan2").innerHTML = template2;
                getDataProv();
                getDataProv2();

            } else {
                document.getElementById("tujuan1").innerHTML = '';
                document.getElementById("tujuan2").innerHTML = '';
            }
        }
    }

    $(document).ready(function () {
        $(document).on('change', '.provtujuan', function () {
            var id_prov = $(this).val();
            var op = "";
            $.ajax({
                type: 'get',
                url: 'Kasi/dataKota/' + id_prov,
                success: function (data) {
                    op += '' + '<option selected disabled>- Pilihan Kota/Kabupaten -</option>';
                    op += '' + data;
                    document.getElementById("kota").innerHTML = op;
                },
                error: function () {
                    //do nothing
                }
            });
        })

        $(document).on('change', '.provtujuan2', function () {
            var id_prov = $(this).val();
            var op = "";
            $.ajax({
                type: 'get',
                url: 'Kasi/dataKota/' + id_prov,
                success: function (data) {
                    op += '' + '<option selected disabled>- Pilihan Kota/Kabupaten -</option>';
                    op += '' + data;
                    document.getElementById("kota2").innerHTML = op;
                },
                error: function () {
                    //do nothing
                }
            });
        })

        $(document).on('change', '.kegiatan', function () {
            var id_kegiatan = $(this).val();
            $.ajax({
                type: 'get',
                url: 'Kasi/dataRek/',
                success: function (data) {
                    for (i = 0; i < JSON.parse(data).length; i++) {
                        if (id_kegiatan == JSON.parse(data)[i].id_kegiatan) {
                            var norek = JSON.parse(data)[i].no_rek;
                            document.getElementById("norekening").innerHTML = norek;
                        }
                    }
                },
                error: function () {
                    //do nothing
                }
            });
        })

    });

    $(document).ready($(document).on('change', '#provinsi', function () {
        var idprovtujuan = $(this).val();
        var idasal = document.getElementsByName('id_opd_asal')[0].value;
        var rekening = '';
        if (idprovtujuan == idasal) {
            rekening = '5.2.2.15.01.';
            var kegiatan = '';
            $.ajax({
                url: 'Kasi/dataRek/',
                type: 'get',
                success: function (data) {
                    kegiatan += '<option disable selected>' + '- Pilihan Kegiatan -' + '</option>';
                    for (i = 0; i < JSON.parse(data).length; i++) {
                        var drek = JSON.parse(data)[i].no_rek;
                        if (drek == rekening) {
                            kegiatan += '<option value="' + JSON.parse(data)[i].id_kegiatan + '">' +
                                JSON.parse(data)[i].no_rek + ' ' + JSON.parse(data)[i].nama_kegiatan +
                                '</option>';
                            document.getElementById('kegiatan').innerHTML = kegiatan;
                        } else {

                        }
                    }
                }
            });
        } else {
            rekening = '5.2.2.15.02.';
            var kegiatan = '';
            $.ajax({
                url: 'Kasi/dataRek/',
                type: 'get',
                success: function (data) {
                    kegiatan += '<option disable selected>- Pilihan Kegiatan -</option>';
                    for (i = 0; i < JSON.parse(data).length; i++) {
                        var drek = JSON.parse(data)[i].no_rek;
                        if (drek == rekening) {
                            kegiatan += '<option value="' + JSON.parse(data)[i].id_kegiatan + '">' +
                                JSON.parse(data)[i].no_rek + ' ' + JSON.parse(data)[i].nama_kegiatan +
                                '</option>';
                            document.getElementById('kegiatan').innerHTML = kegiatan;
                        } else {

                        }
                    }
                }
            });
        }
    }))
</script>