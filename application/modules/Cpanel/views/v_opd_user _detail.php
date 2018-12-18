 <script>
    $( document ).ready(function() {
       var idunit = localStorage.getItem("id_unit");
      $('#chart-container').orgchart({
        // 'data' : '/orgchart/initdata',
        

        'data' : base_url+"Cpanel/jsonstruktur/"+idunit,
        'nodeContent': 'title'
      });
    });
</script>
<div class="content">

                <div class="container-fluid">
                   <div class="row">      
    <div class="col-md-3 col-sm-6 col-xs-12"> 
      <a class="btn btn-block btn-success" id="btn-kembali">
        <i class="fa fa-arrow-left"></i> Kembali 
      </a>        
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">    
    </div>     
    <div class="col-md-3 col-sm-6 col-xs-12">
       <a class="btn btn-block btn-danger" id="btn-kembali">
        <i class="fa fa-bank"></i> Struktur Organisasi 
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
                                 <h4 class="card-title">List Unit OPD</h4>
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                        
                                    </div>
                                    <div class="material-datatables">
                                      <table id="tb-opd-user" class="table" >
                                       <thead class="text-info">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Organisasi Perangkat Daerah</th>
                                                   <th>Aksi</th>                      
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Organisasi Perangkat Daerah</th>
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
