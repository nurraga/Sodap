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

      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">

          <div class="card-header card-header-text" data-background-color="red">
            <h4 class="card-title">Dokumen Pelaksanaan Anggaran</h4>
          </div>
          <div class="card-content">


            <div class="row">
              <div class="col-md-1 col-sm-1 col-xs-1">

              </div>
              <div class="col-md-11 col-sm-11 col-xs-11">
                <h3>
                  <b><?php echo $opd; ?></b></h4>
                </div>
                <div class="col-md-1 col-sm-1 col-xs-1">

                </div>
                <div class="col-md-11 col-sm-11 col-xs-11">
                  <h3>
                    <b><?php echo $thn; ?></b></h4>
                  </div>

                </div>
                <div class="row">
                  <div class="col-md-12">
                  <ul class="timeline timeline-simple">
                  <?php
                  foreach ($program as $keyrow => $row)
                  {
                  $kdunit=$row->kdkegunit;
                  $kdprog=$row->IDPRGRM;
                  $nmprog=$row->NMPRGRM;


                  $this->db->select('dpa22.kdkegunit,mkegiatan.nmkegunit,sum(dpa22.nilai) as nilai_keg');
                  $this->db->from('dpa22');
                  $this->db->join('daftunit', 'dpa22.unitkey = daftunit.unitkey');
                  $this->db->join('mkegiatan', 'dpa22.kdkegunit = mkegiatan.kdkegunit');
                  $this->db->join('mpgrm', 'mkegiatan.idprgrm = mpgrm.IDPRGRM');
                  $this->db->where('dpa22.tahun', $thn);
                  $this->db->where('dpa22.unitkey', $idopd);
                  $this->db->where('mpgrm.IDPRGRM', $kdprog);
                  $this->db->group_by('dpa22.kdkegunit');
                  $kegiatan=$this->db->get()->result();

                  $arrkeg = array();
                  $datahtmlkeg='';
                  $jumkeg = 0;
                  foreach ($kegiatan as $keykeg => $xrow)
                  {
                    $arrkeg[$keyrow][$keykeg] = 0;

                    $tarkeg=0;
                    $realkeg=0;
                    $kdkeg=$xrow->kdkegunit;

                        //getrekening per kegiatan
                        $this->db->select('matangr.kdper,matangr.nmper,dpa22.nilai,matangr.mtgkey');
                        $this->db->from('dpa22');
                        $this->db->join('matangr', 'dpa22.mtgkey=matangr.mtgkey');
                        $this->db->where('dpa22.tahun', $thn);
                        $this->db->where('dpa22.unitkey', $idopd);
                        $this->db->where('dpa22.kdkegunit', $kdkeg);
                        $this->db->like('matangr.kdper','5.2.3');
                        $this->db->order_by("matangr.kdper", "asc");
                        $rek=$this->db->get()->result();
                        if($rek){
                          $arrkeg[$keyrow][$keykeg] = 1;
                          $jumkeg++;
                        }
                        $tagrek='';
                        foreach ($rek as $keyrek=> $yrow){
                          $tagtrgt = '';
                          $tagreal = '';
                          $tagrowrek = '';
                          $trgtbln = 0;
                          $nreal = 0;
                          $this->db->select('COALESCE((SUM(`nilai`)),0) AS target');
                          $this->db->from('`angkas`');
                          $this->db->where('`kdkegunit`', $kdkeg);
                          $this->db->where('`unitkey`', $idopd);
                          $this->db->where('`mtgkey`', $yrow->mtgkey);
                          $this->db->where('kd_bulan <', 5);
                          $querys =$this->db->get();
                          if($querys->num_rows() > 0 ){
                            $angkas = $querys->row();
                            $trgtbln = $angkas->target;
                            $tarkeg +=$trgtbln;
                            $tagtrgt ='<td class="text-right"><b>'.$this->template->nominal($trgtbln).'</b></td>';
                          }else{
                            $tagtrgt ='<td class="text-right"><b"><p>'.$this->template->nominal(0).'</p></b></td>';
                          }
                          if(strpos($yrow->kdper,'5.2.3.')!==false){
                            $this->db->select('tab_realisasi_bmodal`.`nilai_ktrk` AS jum_realisasi');
                            $this->db->from('`tab_pptk`');
                            $this->db->join('tab_realisasi_bmodal', '`tab_pptk`.`id` = `tab_realisasi_bmodal`.`id_tab_pptk`');
                            $this->db->join('tab_pptk_master', '`tab_pptk`.`id_pptk_master` = `tab_pptk_master`.`id`');
                            $this->db->where('`tab_pptk_master`.`unitkey`', $idopd);
                            $this->db->where('`tab_pptk`.`kdkegunit`', $kdkeg);
                            $this->db->where('`tab_realisasi_bmodal`.`mtgkey`', $yrow->mtgkey);
                            $query =$this->db->get();

                            if($query->num_rows() > 0 ){
                              $realmodal = $query->row();
                              $nreal = $realmodal->jum_realisasi;
                              $realkeg += $nreal;
                              $tagreal ='<td class="text-right"><b>'.$this->template->nominal($nreal).'</b></td>';
                            }else{
                              $tagreal ='<td class="text-right"><b><p style="color:red;">'.$this->template->nominal(0).'</p></b></td>';
                            }

                          }else{
                            $this->db->select('coalesce((SUM(`tab_realisasi_det`.`jumlah_harga`)),0) AS jum_realisasi');
                            $this->db->from('`tab_realisasi_det`');
                            $this->db->join('dpa221', '`tab_realisasi_det`.`id_dpa` = `dpa221`.`id`');
                            $this->db->where('`dpa221`.`unitkey`', $idopd);
                            $this->db->where('`dpa221`.`kdkegunit`', $kdkeg);
                            $this->db->where('`dpa221`.`mtgkey`', $yrow->mtgkey);
                            $querys =$this->db->get();
                            if($querys->num_rows() > 0 ){
                              $real = $querys->row();
                              $nreal = $real->jum_realisasi;
                              $realkeg += $nreal;
                              if($trgtbln != 0)
                              $pointrekening = ($nreal * 100) / $trgtbln;
                              else
                              $pointrekening =100;
                              if($pointrekening<80){
                                $tagreal ='<td class="text-right"><b><p style="color:red;">'.$this->template->nominal($nreal).'</p></b></td>';
                              }else{
                                $tagreal ='<td class="text-right"><b>'.$this->template->nominal($nreal).'</b></td>';
                              }

                            }else{
                              $tagreal ='<td class="text-right"><b><p style="color:red;">'.$this->template->nominal(0).'</p></b></td>';
                            }
                          }
                          if($trgtbln != 0)
                            $pointrekening = ($nreal * 100) / $trgtbln;
                          else
                            $pointrekening =100;
                          if($pointrekening<80){
                            $tagrowrek = '<tr class="danger">';
                          }else{
                            $tagrowrek = '<tr class="success">';
                          }
                          $tagrek .= $tagrowrek.'<td>'.$yrow->kdper.'</td>
                            <td>'.$yrow->nmper.'</td>
                            <td class="text-right">'.$this->template->nominal($yrow->nilai).'</td>'.$tagtrgt.$tagreal.'</tr>';
                        }
                        //getppkdanpptk
                        $this->db->select('pnspptk.`nama` AS nmpptk, pnsppk.nama AS nmppk');
                        $this->db->from('tab_pptk');
                        $this->db->join('`tab_pns` pnspptk','`tab_pptk`.`idpnspptk` = pnspptk.`nip`');
                        $this->db->join('`tab_pns` pnsppk','`tab_pptk`.`idpnsppk` = pnsppk.`nip`');
                        $this->db->join('`tab_pptk_master`','`tab_pptk`.`id_pptk_master` = `tab_pptk_master`.`id`');
                        $this->db->where('tab_pptk.`kdkegunit`',$kdkeg);
                        $this->db->where('tab_pptk_master.`unitkey`',$idopd);
                        $datakpa=$this->db->get();
                        $tagrowkeg='';
                        if($tarkeg != 0){
                          $nilaikegiatan = ($realkeg * 100) / $tarkeg;
                        }else{
                          $nilaikegiatan = 100;
                        }
                        if($nilaikegiatan<80){
                          $tagrowkeg = '<tr class="clickable danger" data-toggle="collapse" data-target="#group-of-rows-'.$kdprog.$kdkeg.'" aria-expanded="false" aria-controls="group-of-rows-'.$kdprog.$kdkeg.'">';
                        }else{
                          $tagrowkeg = '<tr class="clickable success" data-toggle="collapse" data-target="#group-of-rows-'.$kdprog.$kdkeg.'" aria-expanded="false" aria-controls="group-of-rows-'.$kdprog.$kdkeg.'">';
                        }
                        if($arrkeg[$keyrow][$keykeg] != 0){
                        $datahtmlkeg .= $tagrowkeg.'<td>'.ucwords($xrow->nmkegunit).'</td>
                                <td class="text-right">'.$this->template->nominal($xrow->nilai_keg).'</td>';
                                if($datakpa->num_rows()!=0){
                                  $pns = $datakpa->row();
                                  $datahtmlkeg .= '<td class="text-center">'.$pns->nmpptk.'</td>
                                        <td class="text-center">'.$pns->nmppk.'</td>';
                                }else{
                                  $datahtmlkeg .= '<td class="text-center">Belum Ada</td>
                                        <td class="text-center">Belum Ada</td>';
                                }
                        $datahtmlkeg .= '</tr>
                              </tbody>';
                        $datahtmlkeg .= '<tbody id="group-of-rows-'.$kdprog.$kdkeg.'" class="collapse">
                                <tr>
                                <td colspan="4">
                                  <div class="card-content">
                                    <table class="table table-hover">
                                      <thead class="text-info">';

                                        $datahtmlkeg .='<tr>
                                          <th>Rekening</td>
                                          <th>Rincian</td>
                                          <th class="text-right">Nilai (Rp.)</td>
                                          <th class="text-right">Target (Rp.)</td>
                                          <th class="text-right">Realisasi (Rp.)</td>
                                        </tr>';

                                      $datahtmlkeg .= '</thead>
                                      <tbody>';
                                        $datahtmlkeg .= $tagrek;
                                          $datahtmlkeg .= '<tr class="info">
                                                <td colspan="3" class="text-center"><b>Total</b></td>
                                                <td class="text-right">'.$this->template->nominal($tarkeg).'</td>
                                                <td class="text-right">'.$this->template->nominal($realkeg).'</td>
                                              </tr>';
                                      $datahtmlkeg .= '</tbody>
                                    </table>
                                  </div>
                                </td>
                              </tr>';
                              $datahtmlkeg .= '</tbody>';
                            }
                  }
                  if($jumkeg != 0){
                  echo '<li class="timeline-inverted">';
                  echo '<div class="timeline-badge danger">
                  <i class="material-icons">card_travel</i>
                  </div>
                  <div class="timeline-panel">
                  <div class="timeline-heading"><h4><b>'.$nmprog.'</b></h4>
                  </div>';
                  echo '<table class="table table-hover">
                        <thead class="text-info">
                        <tr>
                        <th class="text-center">Kegiatan</th>
                        <th class="text-right">Pagu Dana (Rp.)</th>
                        <th class="text-center">PPTK</th>
                        <th class="text-center">PPK/KPA</th>
                        </tr>
                        </thead>
                        <tbody>';
                      echo $datahtmlkeg;
                  echo '</table>';

                  echo '</div>
                  </li> ';
                }
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



</div>
</div>
