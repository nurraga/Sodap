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
                    <div class="card-header card-header-icon" data-background-color="red">
                        <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title">Daftar Kegiatan</h4>
                    <div class="card-content">
                        <form id="formkegiatan" enctype="multipart/form-data" role="form">     
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nama Kegiatan</th>
                                            <th class="col-xs-2 text-left">Pagu Dana</th>
                                           
                                            <th class="col-xs-1 text-center"></th>
                                            <th class="col-xs-1 text-center">Aksi</th>
                                            <th class="col-xs-1 text-center"></th>
                                          
                                            <th class="col-xs-1 text-left ">Status</th>   
                                        </tr>
                                    </thead>
                                  <tbody>
                                      <?php
                                        $i = 0;
                                            foreach ($list as $row){
                                                
                                                  echo'<tr>  
                                                    
                                                    <td>'.$row->namakeg.'<div class="form-group"><input class="form-control" name="nmkdkeg[]"" type="hidden" value='.$row->kdkegunit.'></div></td>
                                                    <td class="text-left">'.$this->template->rupiah($row->nilai).'<div class="form-group"><input class="form-control" name="nilai[]" type="hidden" value='.$row->nilai.'></div></td>
                                                    <td ><a  class="btn btn-info btn-xs" class="glyphicon glyphicon-eye-open" href="'.base_url('User/detail/').$row->id.'">Target Keuangan</a> </td>
                                                     <td><a  class="btn btn-success btn-xs" class="glyphicon glyphicon-eye-open" href="'.base_url('User/fisik/').$row->id.'">Target Fisik</a> </td>
                                                     <td><a  class="btn btn-danger btn-xs" class="glyphicon glyphicon-eye-open" href="'.base_url('User/realisasi/').$row->id.'">Target Realisasi</a> </td>
                                                    <td><div style="color: #f98022">Belum dientri</div> </td>
                                                    </tr>';
                                                 $i++; 
                                            }
                                        ?>
                                    </tbody>
                                </table>    
                            </div>
                            <hr class="style13">



                            

                          
                            
                          
                            <div class="card-footer">          
                            </div>                 
                        </form>
                    </div>
                </div>
            </div>   
        </div>
        
    </div>
</div>