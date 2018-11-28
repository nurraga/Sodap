

<section class="content-header">
    <h1>
        Selamat Datang
        <small> Di Sodap Admin kontrol panel</small>
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
                     <div class="row">
        <div class="col-lg-12">
            <a href="<?php echo site_url('Home/create');?>" class="btn btn-primary">Tambah User</a>
           
        </div>
    </div>
                    <div class="row">
                       
            <div class="col-lg-12" style="margin-top: 10px;">
            <?php

            if(!empty($users))
            {
                echo '<table class="table table-hover table-bordered table-condensed">';
                echo '<tr><td>ID</td><td>Username</td></td><td>Name</td><td>Email</td><td>Last login</td><td>Operations</td></tr>';
                foreach($users as $user)
                {
                    echo '<tr>';
                    echo '<td>'.$user->id.'</td><td>'.$user->username.'</td><td>'.$user->first_name.' '.$user->last_name.'</td></td><td>'.$user->email.'</td><td>'.date('Y-m-d H:i:s', $user->last_login).'</td><td>';
                    if($current_user->id != $user->id) echo anchor('admin/users/edit/'.$user->id,'<span class="glyphicon glyphicon-pencil"></span>').' '.anchor('admin/users/delete/'.$user->id,'<span class="glyphicon glyphicon-remove"></span>');
                    else echo '&nbsp;';
                    echo '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            }
            ?>
        </div>

                        <!-- ./col -->
                    </div>

                    


                </div>
            </div>

</div>
        </div>
    </div>
	  </div>

</section>