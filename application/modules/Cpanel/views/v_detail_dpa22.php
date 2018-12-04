<script type="text/javascript" >

var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

</script>
<div class="content">

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">

          <div class="card-header card-header-text" data-background-color="red">
            <h4 class="card-title">Dokumen Pelaksanaan Anggaran</h4>
          </div>
          <div class="card-content">


            <div class="row">
              <div class="tim-typo">
                <h4>
                  <span class="tim-note">Nama Unit / OPD</span><?php echo $opd; ?></h4>
                </div>
                <div class="tim-typo">
                  <h4>
                    <span class="tim-note">Tahun</span><?php echo $thn; ?></h4>
                  </div>

                </div>
                <div class="row">
                  <!-- <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  <?php

                  foreach ($program as $key =>$row) {
                  $kdunit=$row->kdkegunit;
                  $kdprog=$row->IDPRGRM;
                  $nmprog=$row->NMPRGRM;

                  ?>
                  <div class="panel panel-default">
                  <div style="margin-left:20px" class="panel-heading" role="tab" id="<?php echo "heading".$key?>">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="<?php echo "#collapse".$key?>" aria-expanded="false" aria-controls="<?php echo "collapse".$key?>">

                  <h4 class="panel-title">
                  <blockquote>
                  <p><?php echo $nmprog?></p>
                </blockquote>
                <i class="material-icons">keyboard_arrow_down</i>
              </h4>
            </a>
          </div>
          <div id="<?php echo "collapse".$key?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?php echo "heading".$key?>">
          <div class="panel-body">
          <?php
          $this->db->select('dpa22.kdkegunit,mkegiatan.nmkegunit');
          $this->db->from('dpa22');
          $this->db->join('daftunit', 'dpa22.unitkey = daftunit.unitkey');
          $this->db->join('mkegiatan', 'dpa22.kdkegunit = mkegiatan.kdkegunit');
          $this->db->join('mpgrm', 'mkegiatan.idprgrm = mpgrm.IDPRGRM');
          $this->db->where('dpa22.tahun', $thn);
          $this->db->where('dpa22.unitkey', $idopd);
          $this->db->where('mpgrm.IDPRGRM', $kdprog);
          $this->db->group_by('dpa22.kdkegunit');
          $kegiatan=$this->db->get()->result();

          foreach ($kegiatan as $keykeg => $xrow){
          $kdkeg=$xrow->kdkegunit;
          ?>
          <div class="panel panel-default">
          <div class="panel-heading secondpanel" role="tab" id="<?php echo "headingkeg".$key.$keykeg?>">
          <a class="collapsed" role="button" data-toggle="collapse" data-parent="<?php echo '#heading'.$key?>" href="<?php echo "#collapsekeg".$key.$keykeg?>" aria-expanded="false" aria-controls="<?php echo "collapsekeg".$key.$keykeg?>">

          <h4 class="panel-title">

          <?php echo $xrow->nmkegunit?>
          <i class="material-icons">keyboard_arrow_down</i>
        </h4>
      </a>
    </div>
    <div id="<?php echo "collapsekeg".$key.$keykeg?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?php echo "headinkegg".$key.$keykeg?>">
    <div class="panel-body">
    <?php
    $this->db->select('matangr.kdper,matangr.nmper,dpa22.nilai');
    $this->db->from('dpa22');
    $this->db->join('matangr', 'dpa22.mtgkey=matangr.mtgkey');


    $this->db->where('dpa22.tahun', $thn);
    $this->db->where('dpa22.unitkey', $idopd);
    $this->db->where('dpa22.kdkegunit', $kdkeg);
    $this->db->order_by("matangr.kdper", "asc");
    $rek=$this->db->get()->result();

    echo '<div class="col-md-1 col-sm-6 col-xs-12">

    </div>
    <div class="col-md-10 col-sm-6 col-xs-12">



    <table class="table table-hover">
    <thead class="text-warning">
    <tr>
    <th class="text-center">Rekening</th>
    <th class="text-center">Rincian</th>
    <th class="text-center">Nilai</th>
    </tr>
    </thead>
    <tbody>';
    foreach ($rek as $yrow)
    {
    echo '<tr>
    <td class="text-center col-xs-1">'.$yrow->kdper.'</td>
    <td>'.$yrow->nmper.'</td>
    <td class="col-xs-2">'.$this->template->rupiah($yrow->nilai).'</td>
    </tr>';
  }

  echo '</tbody>
  </table>
  </div>
  <div class="col-md-1 col-sm-6 col-xs-12">
  </div><br>';

  ?>
</div>
</div>
</div>
<?php
}//end foreach kegiatan
?>
</div>
</div>
</div>
<?php
//tutup foreachprogram
}
?>

</div> -->
<div class="col-md-12">
  <ul class="timeline timeline-simple">
    <?php
    foreach ($program as $row)
    {
      $kdunit=$row->kdkegunit;
      $kdprog=$row->IDPRGRM;
      $nmprog=$row->NMPRGRM;
      echo '<li class="timeline-inverted">
      <div class="timeline-badge danger">
      <i class="material-icons">card_travel</i>
      </div>
      <div class="timeline-panel">
      <div class="timeline-heading"><h6>
      <span class="label label-info"><b>'.$nmprog.'</b></span></h6>
      </div>';
      $this->db->select('dpa22.kdkegunit,mkegiatan.nmkegunit');
      $this->db->from('dpa22');
      $this->db->join('daftunit', 'dpa22.unitkey = daftunit.unitkey');
      $this->db->join('mkegiatan', 'dpa22.kdkegunit = mkegiatan.kdkegunit');
      $this->db->join('mpgrm', 'mkegiatan.idprgrm = mpgrm.IDPRGRM');
      $this->db->where('dpa22.tahun', $thn);
      $this->db->where('dpa22.unitkey', $idopd);
      $this->db->where('mpgrm.IDPRGRM', $kdprog);
      $this->db->group_by('dpa22.kdkegunit');
      $kegiatan=$this->db->get()->result();
      foreach ($kegiatan as $xrow)
      {
        $kdkeg=$xrow->kdkegunit;
        echo '<blockquote>
        <p>';
        echo $xrow->nmkegunit;

        echo '</p>
        </blockquote>';

        $this->db->select('matangr.kdper,matangr.nmper,dpa22.nilai');
        $this->db->from('dpa22');
        $this->db->join('matangr', 'dpa22.mtgkey=matangr.mtgkey');


        $this->db->where('dpa22.tahun', $thn);
        $this->db->where('dpa22.unitkey', $idopd);
        $this->db->where('dpa22.kdkegunit', $kdkeg);
        $this->db->order_by("matangr.kdper", "asc");
        $rek=$this->db->get()->result();

        echo '<table class="table table-hover">
        <thead class="text-warning">
        <tr>
        <th class="text-center">Rekening</th>
        <th class="text-center">Rincian</th>
        <th class="text-center">Nilai</th>
        </tr>
        </thead>
        <tbody>';
        foreach ($rek as $yrow)
        {
          echo '<tr>
          <td class="text-center col-xs-1">'.$yrow->kdper.'</td>
          <td>'.$yrow->nmper.'</td>
          <td class="col-xs-2">'.$this->template->rupiah($yrow->nilai).'</td>
          </tr>';
        }

        echo'</tbody>
        </table> <br>';


      }

      echo '</div>
      </li> ';
    }
    ?>



  </ul>
</div>

</div>

</div>

<div class="card-footer text-center">

</div>

</div>
</div>

</div>

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

</div>
</div>
