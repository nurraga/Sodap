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
      <a class="btn btn-block btn-danger" id="btn-singkron-opd">
        <i class="fa fa-refresh"></i> Singkron Data
      </a>
    </div>
  </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="blue">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                 <h4 class="card-title">List Unit dan OPD DPA 2.2</h4>
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->

                                    </div>
                                    <div class="material-datatables">
                                      <table id="tb-opd-dpa" class="table table-responsive table-hover" cellspacing="0" width="100%" style="width:100%">
                                       <thead class="text-info">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Unit / OPD</th>
                                                    <th>Aksi</th>

                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Unit / OPD</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </tfoot>
                                      </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
   <div class="modal fade">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="error"></div>
          <div class="box-body">
         <!--    <div class="form-group is-empty">
              <div class='input-group date'>
              <div class='input-group-addon'>
                <i class='fa fa-calendar'></i>
              </div>
              <input type='text' class='form-control datepicker' id='datepicker'>
            </div>
          </div> -->
          <input type="hidden" id="idunit" name="nmunit" readonly>

          <div class="form-group">

             <label class="label-control">Tahun :</label>
            <input type='text' class='form-control datepicker' id='datepicker'>
          </div>

         <!--  <div class="konten"></div> -->
          </div>

      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
