

<section class="content-header">
    <h1>
        Selamat Datang
        <small> di Sodap Admin kontrol panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Your Page Content Here -->
	        <div class="col-md-10 col-md-offset-1">
             <div class="card">
	
	
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                
                <div class="box-body">
                    <div class="col-lg-6 col-lg-offset-3">
                       <?php echo form_open();?>


                       <div class="row">
                        <div class="col-xs-12">
                        <div class="form-group">

                              <label class="control-label" for="datepicker">Opd</label>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-caret-square-o-down fa-lg"></i></span>

                                  <select  class="form-control select2" style="width: 100%;" onchange="ajaxnamapns(this.value)" name="edtnamaopd" id="idnamaopd" >
                                      <option value="">Pilih Opd</option>
                                      <?php 
                                      foreach($opd as $data){
                                        echo '<option value="'.$data->kd.'">'.$data->nm.'</option>';
                                    }
                                    ?>
                                </select>




                            </div>

                        </div>
							</div>
                    <div class="col-xs-12">
                        <div class="form-group">

                          <label class="control-label" for="datepicker">PNS</label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-caret-square-o-down fa-lg"></i></span>


                              <select  class="form-control select2" style="width: 100%;" onchange="ajaxpilihpns(this.value)"  name="edtnamapns" id="idnamapns" >
                                  <option value="">Pilih Pns</option>

                              </select>



                          </div>

                      </div>
                  </div>

           </div>
           <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                       <?php        
                       $nip = array(
                          'type'=>'text',
                          'class'=>'form-control',
                          'name'=>'username',
                          'id'=>'username',
                          'placeholder'=>'nip',                           
                          'value' => '',
                          'readonly'=>'true',
                      );
                        echo form_label('Nip','username');
                        echo form_error('username');
                       echo '<div class="input-group">';
                       echo '<span class="input-group-addon"><i class="fa fa-list fa-lg"></i></span>';
                       echo form_input($nip);
                       echo '</div>';
                       ?>
                       
                   </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                       <?php        
                       $nama = array(
                          'type'=>'text',
                          'class'=>'form-control',
                          'name'=>'first_name',
                          'id'=>'first_name',
                          'placeholder'=>'nama',                           
                          'value' => '',
                          'readonly'=>'true',
                      );
                        echo form_label('Nama','first_name');
                        echo form_error('first_name');
                       echo '<div class="input-group">';
                       echo '<span class="input-group-addon"><i class="fa fa-list fa-lg"></i></span>';
                       echo form_input($nama);
                       echo '</div>';
                       ?>
                    <input name="parent_id" type="hidden" id="parent_id">

                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-xs-6">
                <div class="form-group">
                    <?php        
                       $email = array(
                          'type'=>'text',
                          'class'=>'form-control',
                          'name'=>'email',
                          'id'=>'email',
                          'placeholder'=>'email',                           
                          'value' => '',
                      );
                        echo form_label('E-mail','email');
                        echo form_error('email');
                       echo '<div class="input-group">';
                       echo '<span class="input-group-addon"><i class="fa fa-list fa-lg"></i></span>';
                       echo form_input($email);
                       echo '</div>';
                       ?>


                    
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <?php        
                       $phone = array(
                          'type'=>'text',
                          'class'=>'form-control',
                          'name'=>'phone',
                          'id'=>'phone',
                          'placeholder'=>'telepone',                           
                          'value' => '',
                      );
                        echo form_label('Telepon','phone');
                        echo form_error('phone');
                       echo '<div class="input-group">';
                       echo '<span class="input-group-addon"><i class="fa fa-list fa-lg"></i></span>';
                       echo form_input($phone);
                       echo '</div>';
                       ?>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">  
                <div class="form-group">
                     <?php        
                       $password = array(
                          'type'=>'password',
                          'class'=>'form-control',
                          'name'=>'password',
                          'id'=>'password',
                          'placeholder'=>'password',                           
                          'value' => '',
                      );
                        echo form_label('Password','password');
                        echo form_error('password');
                       echo '<div class="input-group">';
                       echo '<span class="input-group-addon"><i class="fa fa-list fa-lg"></i></span>';
                       echo form_input($password);
                       echo '</div>';
                       ?>
                  
                </div>            
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                     <?php        
                       $passwordconfirm = array(
                          'type'=>'password',
                          'class'=>'form-control',
                          'name'=>'password_confirm',
                          'id'=>'password_confirm',
                          'placeholder'=>'password konfirmasi',                           
                          'value' => '',
                      );
                        echo form_label('Password','password_confirm');
                        echo form_error('password_confirm');
                       echo '<div class="input-group">';
                       echo '<span class="input-group-addon"><i class="fa fa-list fa-lg"></i></span>';
                       echo form_input($passwordconfirm);
                       echo '</div>';
                       ?>
                  
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">  
                <div class="form-group">
                    <?php
                    if(isset($groups))
                    {
                        echo form_label('Groups','groups[]');
                        foreach($groups as $group)
                        {
                            echo '<div class="checkbox">';
                            echo '<label>';
                            echo form_checkbox('groups[]', $group->id, set_checkbox('groups[]', $group->id));
                            echo ' '.$group->name;
                            echo '</label>';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>          
            </div>


        </div>



    </div>

</div>



    </div>







</div>
<div class="box-footer with-border">

    <?php echo form_submit('submit', 'Create user', 'class="btn btn-primary pull-right "');?>
    <?php echo anchor('/Home/vuser', 'Cancel','class="btn btn-default  "');?>

    <?php echo form_close();?>
</div>
</div>


</div>
</div>

</section>

<script type="text/javascript">
  

function ajaxnamapns{} {
$(document).ready(function () {
        $(document).on('change', '.nama', function () {
            var id_opd = $(this).val();
            var op = "";
            $.ajax({
                type: 'get',
                url: 'Home/datapns/' + id_opd,
                success: function (data) {
                    op += '' + '<option selected disabled>- Pilihan Kota/Kabupaten -</option>';
                    op += '' + data;
                    document.getElementById("nama").innerHTML = op;
                },
                error: function () {
                    //do nothing
                }
            });
        })

}







</script>