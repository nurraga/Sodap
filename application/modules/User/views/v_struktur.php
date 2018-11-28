
 <script>
    $( document ).ready(function() {

       var idunit = '<?php echo $idopd ?>';
      $('#chart-container').orgchart({
        // 'data' : '/orgchart/initdata',
        
        'data' : base_url+"User/jsonstruktur/"+idunit,
        'nodeContent': 'title'
      });
    });
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
      <a href="<?php echo base_url('User/kelola');?>" class="btn btn-block btn-danger" id="btn-singkron-opd">
        <i class="fa fa-refresh"></i> Kelola Organisasi
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
                                 <h4 class="card-title">Struktur OPD</h4>
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                        
                                    </div>
                                      <div id="chart-container"></div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
