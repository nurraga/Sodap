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
                                 <h4 class="card-title">List Master Anggaran</h4>
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                        
                                    </div>
                                    <div class="material-datatables">
                                      <table id="tb-anggaran" class="table table-responsive table-hover" cellspacing="0" width="100%" style="width:100%">
                                       <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tahun</th>
                                                    <th>Kode Rekening</th>
                                                    <th>Nama Rekening</th>

                                                    
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tahun</th>
                                                    <th>Kode Rekening</th>
                                                    <th>Nama Rekening</th>
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

            <div class="modal fade" id="anggaranmodal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <input type="hidden" id="idcsrf" name="idcsrf" value="" />
                                                <div class="modal-dialog modal-notice">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                                                            <h5 class="modal-title"></h5>
                                                        </div>
                                                        <div class="modal-body">
                                                           <form enctype="multipart/form-data" action="#" id="form-generate" role="form">
                                                <div class="row">
                                                
                                                <div class="col-sm-4 col-sm-offset-1">
                                                    <div class="picture-container">
                                                        <div class="picture">
                                                            <img src="../../assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title="">
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">screen_lock_landscape</i>
                                                        </span>
                                                        <h4 class="info-text" id="gennip" ></h4>
                                                        <!-- <input type="text" class="form-control" id="gennip" name="nip" placeholder="nama" readonly="true"> -->
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">person</i>
                                                        </span>
                                                        <h4 class="info-text" id="gennama"></h4>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">assignment</i>
                                                        </span>
                                                        <h4 class="info-text" id="genjabatan"></h4>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">people</i>
                                                        </span>
                                                      <!--  <select  class="form-control select2" style="width: 100%;" id="idgroup" name="idgroup">
                                                        <option value="">Pilih Group</option>
                                                        </select> -->
                                                        <select class="form-control select2" multiple="multiple" id="idgroup" name="groups[]" data-placeholder="Pilih Group" style="width: 100%;"> 
                                                          </select>
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>
                                          </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
