<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    public $tab_pns   = 'tab_pns';
    public function __construct()
    {
        parent::__construct();

    }

    function cekstrukturopd($opd){
      $this->db->where('id_unit', $opd);
      return $this->db->get('tab_struktur')->row();
    }

    function cekstrukturpns($nip){
      $this->db->where('nip', $nip);
      return $this->db->get('tab_struktur')->row();
    }

    function cekkegiatan($opd){
      $this->db->where('unitkey', $opd);
      return $this->db->get('tab_pptk_master')->row();
    }

    function cekkegiatanentri($opd){
      $this->db->where('unitkey', $opd);
      $this->db->where('stat', '1');
      return $this->db->get('tab_pptk_master')->row();
    }

    function struktur($opd){
      $this->db->select('tab_struktur.id,parent,tab_struktur.nama as name,tab_pns.nama as title,ikon as className');
      $this->db->from('tab_pns');
      $this->db->join('tab_struktur', 'tab_pns.nip = tab_struktur.nip');
      $this->db->where('tab_struktur.id_unit', $opd);


      return $this->db->get()->result_array();
    }
/********AGUNG-SETIA-BUDI-AGUNG-SETIA-BUDI-AGUNG-SETIA-BUDI-AGUNG-SETIA-BUDI-AGUNG-SETIA-BUDI*/
    function jsonstrukturlist_by($opd)
    {
      $this->datatables->select("*");
      $this->datatables->from('`v_kelola_opd`');
      $this->datatables->where('`v_kelola_opd`.`id_unit`', $opd);
      $this->datatables->add_column('action', '<button class="opdeditkelola btn btn-info">Edit<div class="ripple-container"></div></button>' );
      return $this->datatables->generate();
    }
    function updatestruktur($data,$id)
    {
        $this->db->where('id', $id);
        $upstrukt = $this->db->update('tab_struktur', $data);
        if($upstrukt)
          return true;
        else
          return false;
    }
    /*AGUNG-SETIA-BUDI-AGUNG-SETIA-BUDI-AGUNG-SETIA-BUDI-AGUNG-SETIA-BUDI-AGUNG-SETIA-BUDI*************/
	function getpns($nip){
      $this->db->where('nip', $nip);
      return $this->db->get($this->tab_pns)->row();
    }
//--------------------------------------------------------------------------------------------------------------//
	//pptk
  //#ryh
  function getnamaopd($nip){
    $this->db->select('`daftunit`.`unitkey`,`daftunit`.`nmunit`');
    $this->db->from('`tab_pns`');
    $this->db->join('daftunit', '`tab_pns`.`unitkey` = `daftunit`.`unitkey`');
    $this->db->where('nip', $nip);
    return $this->db->get()->row();
  }


    function getlistkegiatan($nip){
      $thn='2018';
     $this->db->select('
      `tab_pptk`.`id`
    ,`mkegiatan`.`kdkegunit`
    ,`mkegiatan`.`nmkegunit`
    , `tab_pptk`.`nilai`
    , u2.nama idpnspptk
    , u1.nama idpnsppk');
      $this->db->from('tab_pptk');
      $this->db->join('tab_pns u1', 'tab_pptk.idpnsppk = u1.nip');
      $this->db->join('tab_pns u2', 'tab_pptk.idpnspptk = u2.nip');
      $this->db->join('tab_pptk_master', 'tab_pptk.id_pptk_master = tab_pptk_master.id');
      $this->db->join('daftunit', 'tab_pptk_master.unitkey = daftunit.unitkey');
      $this->db->join('mkegiatan', 'tab_pptk.kdkegunit = mkegiatan.kdkegunit');
      $this->db->where('tab_pptk_master.tahun', $thn);
      $this->db->where('daftunit.tahun', $thn);
      $this->db->where('mkegiatan.tahun', $thn);
      $this->db->where('tab_pptk.idpnspptk', $nip);
      return $this->db->get()->result_array();
    }
    function getdetlistkegiatan($nip,$kdkegunit){
      $thn='2018';
     $this->db->select('
    `tab_pptk`.`id`
    ,`mkegiatan`.`kdkegunit`
    ,`mkegiatan`.`nmkegunit`
    , `tab_pptk`.`nilai`
    , u2.nama idpnspptk
    , u1.nama idpnsppk');
      $this->db->from('tab_pptk');
      $this->db->join('tab_pns u1', 'tab_pptk.idpnsppk = u1.nip');
      $this->db->join('tab_pns u2', 'tab_pptk.idpnspptk = u2.nip');
      $this->db->join('tab_pptk_master', 'tab_pptk.id_pptk_master = tab_pptk_master.id');
      $this->db->join('daftunit', 'tab_pptk_master.unitkey = daftunit.unitkey');
      $this->db->join('mkegiatan', 'tab_pptk.kdkegunit = mkegiatan.kdkegunit');
      $this->db->where('tab_pptk_master.tahun', $thn);
      $this->db->where('daftunit.tahun', $thn);
      $this->db->where('mkegiatan.tahun', $thn);
      $this->db->where('tab_pptk.idpnspptk', $nip);
      $this->db->where('tab_pptk.kdkegunit', $kdkegunit);
      return $this->db->get()->row();
    }
    function getdetlistkegiatan_detpptk($nip,$kdkegunit){
      $thn='2018';
     $this->db->select('
      `mpgrm`.`NMPRGRM` as prog
    ,`mkegiatan`.`kdkegunit` as kdkeg
    ,`mkegiatan`.`nmkegunit` as keg
    ,`tab_pptk`.`nilai` as nl
    , u2.nama pptk
    , u1.nama ppk');
      $this->db->from('tab_pptk');
      $this->db->join('tab_pns u1', 'tab_pptk.idpnsppk = u1.nip');
      $this->db->join('tab_pns u2', 'tab_pptk.idpnspptk = u2.nip');
      $this->db->join('tab_pptk_master', 'tab_pptk.id_pptk_master = tab_pptk_master.id');
      $this->db->join('daftunit', 'tab_pptk_master.unitkey = daftunit.unitkey');
      $this->db->join('mkegiatan', 'tab_pptk.kdkegunit = mkegiatan.kdkegunit');
      $this->db->join('mpgrm', 'mkegiatan.idprgrm = mpgrm.IDPRGRM');
      $this->db->where('tab_pptk_master.tahun', $thn);
      $this->db->where('daftunit.tahun', $thn);
      $this->db->where('mkegiatan.tahun', $thn);
      $this->db->where('mpgrm.tahun', $thn);
      $this->db->where('tab_pptk.idpnspptk', $nip);
      $this->db->where('tab_pptk.kdkegunit', $kdkegunit);
      return $this->db->get()->row();
    }

     function getheader_realisasipptk($unit,$kdkegunit){
      $thn='2018';
     $this->db->select('
       `dpa221`.`kdkegunit`
      , `dpa221`.`mtgkey`
      , `dpa221`.`unitkey`
      ,`matangr`.`kdper`
      , `matangr`.`nmper`
      ,SUM(`dpa221`.`jumbyek` *`dpa221`.`tarif`) as nilai');
      $this->db->from('dpa221');
      $this->db->join('matangr', '`dpa221`.`mtgkey` = `matangr`.`mtgkey`');
      $this->db->where('`dpa221`.`tahun`', $thn);
      $this->db->where('`dpa221`.`unitkey`', $unit);
      $this->db->where('`dpa221`.`kdkegunit`', $kdkegunit);
      $this->db->group_by('`matangr`.`kdper`');
      return $this->db->get()->result_array();
    }
     function getheader_realisasipptk_angkas($unit,$kdkegunit,$bulan){
      $thn='2018';
     $this->db->select('
       `angkas`.`unitkey`
      ,`angkas`.`kdkegunit`
      , `angkas`.`mtgkey`
      , `matangr`.`kdper`
      , `matangr`.`nmper`
      , `angkas`.`nilai`');
      $this->db->from('angkas');
      $this->db->join('matangr', '`angkas`.`mtgkey` = `matangr`.`mtgkey`');
      $this->db->where('`angkas`.`tahun`', $thn);
      $this->db->where(' `angkas`.`unitkey`', $unit);
      $this->db->where('`angkas`.`kdkegunit`', $kdkegunit);
      $this->db->where('`angkas`.`kd_bulan`', $bulan);
       $this->db->order_by('`matangr`.`kdper`','asc');
      return $this->db->get()->result_array();
    }

      function anggaranopd($idopd){
        $this->db->select('SUM(nilai)AS anggranopd');
        $this->db->from('angkas');
        $this->db->where('`angkas`.`kdkegunit` !=', '0_');
         $this->db->where('`angkas`.`unitkey`', $idopd);
        return $this->db->get()->row();
      }
       function sumberdana(){

        return $this->db->get('tab_sumber_dana')->result_array();
      }
    function getlistkak_by($idtabpptk){
     $this->db->select('`tab_schedule`.*');
      $this->db->from('tab_schedule');
      $this->db->join('tab_kak', '`tab_schedule`.`id_tab_kak` = `tab_kak`.`id`');
      $this->db->where('`tab_kak`.`idtab_pptk`', $idtabpptk);
      return $this->db->get()->result();
    }

    /*Dari agung*/
    function getkak_by($idtabpptk){
     $this->db->select('`tab_kak`.*
                        , `mkegiatan`.`nmkegunit` AS kegiatan
                        , `mpgrm`.`NMPRGRM` AS program
                        , `tab_pptk`.`nilai` AS pagu_dana
                        , `tab_pns`.`nama` AS nama_pptk
                        ');
      $this->db->from('tab_pptk');
      $this->db->join('tab_kak', '`tab_pptk`.`id` = `tab_kak`.`idtab_pptk`');
      $this->db->join('mkegiatan', '`tab_pptk`.`kdkegunit` = `mkegiatan`.`kdkegunit`');
      $this->db->join('mpgrm', '`mkegiatan`.`idprgrm` = `mpgrm`.`IDPRGRM`');
      $this->db->join('`tab_pns`', '`tab_pptk`.`idpnspptk` = `tab_pns`.`nip`');
      $this->db->where('`tab_kak`.`idtab_pptk`', $idtabpptk);
      return $this->db->get()->row();
    }

    function getSchedule_by($idkak){
     $this->db->select('`tab_schedule`.*');
      $this->db->from('tab_schedule');
      $this->db->join('tab_kak', '`tab_schedule`.`id_tab_kak` = `tab_kak`.`id`');
      $this->db->where('`tab_schedule`.`id_tab_kak`', $idkak);
      return $this->db->get()->result();
    }

    function getBljModal_by($idtabpptk){

     $this->db->select('`tab_schedule_blnj_mdl`.*
                        , `matangr`.`kdper` AS `no_rekening`
                        , `matangr`.`nmper` AS `nama_rekening`');
     $this->db->from('`tab_schedule_blnj_mdl`');
     $this->db->join('`tab_target_blnj_modal`', '`tab_schedule_blnj_mdl`.`id_tab_target` = `tab_target_blnj_modal`.`id`');
     $this->db->join('`tab_metode_pelaksanaan`', '`tab_metode_pelaksanaan`.`id` = `tab_target_blnj_modal`.`id_mtde_plk`');
     $this->db->join('`matangr`', '`tab_target_blnj_modal`.`mtgkey` = `matangr`.`mtgkey`');
     $this->db->where('`tab_target_blnj_modal`.`idtab_pptk`',$idtabpptk);
      return $this->db->get()->result();

    }

    /*Sampai agung*/

     function kegperbulan($idkeg,$unitkey){
      $thn='2018';
      $this->db->select('kd_bulan,SUM(`nilai`) as nilai');
      $this->db->from('angkas');
      $this->db->where('angkas.tahun', $thn);
      $this->db->where('angkas.kdkegunit', $idkeg);
      $this->db->where('angkas.unitkey', $unitkey);
      $this->db->group_by('angkas.kd_bulan');
      $this->db->order_by('angkas.kd_bulan','asc');
      return $this->db->get()->result_array();
     }

      function angkasrek_by($idkeg,$unitkey,$bulan){
      $thn='2018';
      $this->db->select('
        `angkas`.`mtgkey`
      , `angkas`.`nilai`
      , `matangr`.`nmper`
      , `matangr`.`kdper`
      , `matangr`.`tahun`');
      $this->db->from('angkas');
      $this->db->join('matangr', 'angkas.mtgkey = matangr.mtgkey');
      $this->db->where('angkas.tahun', $thn);
      $this->db->where('matangr.tahun', $thn);
      $this->db->where('angkas.kdkegunit', $idkeg);
      $this->db->where('angkas.unitkey', $unitkey);
      $this->db->where('angkas.kd_bulan', $bulan);



      return $this->db->get()->result_array();
      }

      function cekstatkak($tab){
        $this->db->where('idtab_pptk', $tab);
        return $this->db->get('tab_kak');
      }

    function simpanrealisasi($data){
        $this->db->trans_start();
        $this->db->insert('tab_realisasi', $data);
        $id_master  = $this->db->insert_id();
        $iddpa     = $this->input->post('iddpa');
        $mtgkey     = $this->input->post('mtgkey');
        $kdrek      = $this->input->post('kdrek');
        $sumberdana = $this->input->post('sumberdn');
        $volume     = $this->input->post('volume');
        $hrsatuan   = $this->input->post('hrsatuan');
        $jum        = $this->input->post('jum');
        $sisadn     = $this->input->post('sisadn');

        $detpgblnskr     = $this->input->post('detpgblnskr');

        $list=array();
        for($i=0; $i < count ($kdrek); $i++){
          $var1 = str_replace("Rp ","",$hrsatuan[$i]);
          $var2 = str_replace("Rp ","",$jum[$i]);
          $var3 = str_replace("Rp ","",$sisadn[$i]);
        //jika jumlah tidak sama dengan 0 dan hrsatuan =0 maka reset jumlah ke 0
        if($volume[$i]!=0 && $var1==0){
          $vol=0;

        }else{
          $vol=$volume[$i];


        }
          $list[$i]=array(
            'id_tab_realisasi'=> $id_master,
            'id_dpa'          => $iddpa[$i],
            'mtgkey'          => $mtgkey[$i],
            'kd_rek'          => $kdrek[$i],
            'sumber_dana'     => $sumberdana[$i],
            'vol'             => $vol,
            'harga_satuan'    => str_replace(".","",$var1),
            'jumlah_harga'    => str_replace(".","",$var2),
            'sisa_dana'       => str_replace(".","",$var3),
            'pagu_perbln'     => $detpgblnskr[$i]
          );
        }

        $this->db->insert_batch('tab_realisasi_det', $list);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
          $this->db->trans_rollback();
          return FALSE;
        }
        else
        {
          $this->db->trans_commit();
          return TRUE;
        }
      }

      function simpanrealisasibmodal($data,$detail){
          $this->db->trans_start();
          $this->db->insert('tab_realisasi_bmodal', $data);
          $id_master = $this->db->insert_id();
          $detail["id_tab_real_bmodal"] = $id_master;
          $this->db->insert('tab_realisasi_bmodal_det', $detail);
          $this->db->trans_complete();

          if ($this->db->trans_status() === FALSE)
          {
            $this->db->trans_rollback();
            return FALSE;
          }
          else
          {
            $this->db->trans_commit();
            return TRUE;
          }
        }
        function simpanrealisasibmodaldet($detail){
            $this->db->trans_start();

            $this->db->insert('tab_realisasi_bmodal_det', $detail);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE)
            {
              $this->db->trans_rollback();
              return FALSE;
            }
            else
            {
              $this->db->trans_commit();
              return TRUE;
            }
          }
          function ubahrealisasibmodaldet($detail,$iddet)
          {
            $this->db->where('id', $iddet);
            $updetbljmodal = $this->db->update('tab_realisasi_bmodal_det', $detail);
            if($updetbljmodal)
              return true;
            else
              return false;


          }

//akhir pptk
//-------------------------------------------------------------------------------------------------//

//-------------------------------------------------------------------------------------------------//
//ppk
//#ryh
 function getdetlistkegiatan_ppk($nip){
    $thn='2018';
    $this->db->select('
    `mkegiatan`.`kdkegunit`
    ,`mkegiatan`.`nmkegunit`
    , `tab_pptk`.`nilai`
    , `tab_pptk`.`id`
    , `tab_pptk`.`status`
    , u2.nama idpnspptk
    , u1.nama idpnsppk');
      $this->db->from('tab_pptk');
      $this->db->join('tab_pns u1', 'tab_pptk.idpnsppk = u1.nip');
      $this->db->join('tab_pns u2', 'tab_pptk.idpnspptk = u2.nip');
      $this->db->join('tab_pptk_master', 'tab_pptk.id_pptk_master = tab_pptk_master.id');
      $this->db->join('daftunit', 'tab_pptk_master.unitkey = daftunit.unitkey');
      $this->db->join('mkegiatan', 'tab_pptk.kdkegunit = mkegiatan.kdkegunit');
      $this->db->where('tab_pptk_master.tahun', $thn);
      $this->db->where('daftunit.tahun', $thn);
      $this->db->where('mkegiatan.tahun', $thn);
      $this->db->where('tab_pptk.idpnsppk', $nip);

      return $this->db->get()->result_array();
    }
function getdetlistkegiatan_detppk($nip,$kdkegunit){
      $thn='2018';
     $this->db->select('
      `mpgrm`.`NMPRGRM` as prog
    ,`mkegiatan`.`kdkegunit` as kdkeg
    ,`mkegiatan`.`nmkegunit` as keg
    ,`tab_pptk`.`nilai` as nl
    , u2.nama pptk
    , u1.nama ppk');
      $this->db->from('tab_pptk');
      $this->db->join('tab_pns u1', 'tab_pptk.idpnsppk = u1.nip');
      $this->db->join('tab_pns u2', 'tab_pptk.idpnspptk = u2.nip');
      $this->db->join('tab_pptk_master', 'tab_pptk.id_pptk_master = tab_pptk_master.id');
      $this->db->join('daftunit', 'tab_pptk_master.unitkey = daftunit.unitkey');
      $this->db->join('mkegiatan', 'tab_pptk.kdkegunit = mkegiatan.kdkegunit');
      $this->db->join('mpgrm', 'mkegiatan.idprgrm = mpgrm.IDPRGRM');
      $this->db->where('tab_pptk_master.tahun', $thn);
      $this->db->where('daftunit.tahun', $thn);
      $this->db->where('mkegiatan.tahun', $thn);
      $this->db->where('mpgrm.tahun', $thn);
      $this->db->where('tab_pptk.idpnsppk', $nip);
      $this->db->where('tab_pptk.kdkegunit', $kdkegunit);
      return $this->db->get()->row();
    }

 function updraft($data,$idtab)
    {
        $this->db->where('idtab_pptk', $idtab);
        $this->db->update('tab_kak', $data);
        return TRUE;
    }
//akhir ppk
//-------------------------------------------------------------------------------------------------//










//!ryh


// function daftarkegiatan($idp){

//         $this->db->select('tab_pptk.id,tab_pptk.idpnspptk,mkegiatan.kdkegunit,mkegiatan.nmkegunit as namakeg,tab_pptk.nilai');
//         $this->db->from('tab_pptk');
//         $this->db->join('mkegiatan', 'tab_pptk.kdkegunit = mkegiatan.kdkegunit');
//         $this->db->where('tab_pptk.idpnspptk', $idp);
//         $this->db->where('status', 1);

//         return $this->db->get()->result_array();
//   }


// function getnamakeg($unitkey)
//     {
//         $query = $this->db->select("*")->from("mkegiatan")->where('kdkegunit',$unitkey)->get();
//         $data = $query->result_array();
//     return $data[0];
//     }

//  function getdetail($id)
//     {
//         $this->db->where('id', $id)->where('status', 1);

//         return $this->db->get('v_pptk')->row();
//     }
// function getnamapns($id){
//       $this->db->select("nama")->where('id', $id);
//      return $this->db->get('v_namappk')->row();
//     }

   //akhirpptk
	//Kasubag ryh
	function listkegiatan($idunit){
		$this->db->select('dpa22.unitkey,mkegiatan.kdkegunit,mkegiatan.nmkegunit as namakeg,SUM(dpa22.nilai) as nilai');
      	$this->db->from('dpa22');
      	$this->db->join('mkegiatan', 'dpa22.kdkegunit = mkegiatan.kdkegunit');
      	$this->db->join('daftunit', 'dpa22.unitkey = daftunit.unitkey');

      	$this->db->where('dpa22.unitkey', $idunit);
      	$this->db->group_by('dpa22.kdkegunit');
        $this->db->order_by('dpa22.kdkegunit');
      	return $this->db->get()->result();
	}
	function listpptk($idunit){
		/*peran=3 untuk pptk*/
		$this->db->select('tab_pns.nip,tab_pns.nama');
      	$this->db->from('tab_struktur');
      	$this->db->join('tab_pns', 'tab_struktur.nip = tab_pns.nip');
      	$this->db->where('tab_struktur.peran', '3');
      	$this->db->where('tab_struktur.id_unit', $idunit);
      	return $this->db->get()->result();

	}
	function listppk($idunit){
		/*peran=2 untuk ppk*/
		$this->db->select('tab_pns.nip,tab_pns.nama');
      	$this->db->from('tab_struktur');
      	$this->db->join('tab_pns', 'tab_struktur.nip = tab_pns.nip');
      	$this->db->where('tab_struktur.peran', '2');
      	$this->db->where('tab_struktur.id_unit', $idunit);
      	return $this->db->get()->result();
	}
  function simpanentrikegiatan($master){
    $this->db->trans_start();
    $this->db->insert('tab_pptk_master', $master);
    $id_master = $this->db->insert_id();
    $kdkegunit      = $this->input->post('nmkdkeg');
    $nilai          = $this->input->post('nilai');
    $idpnspptk      = $this->input->post('nmpptk');
    $idpnsppk       = $this->input->post('nmppk');
    $nmfile         = $this->input->post('namadokumen');


    $list=array();
      for($i=0; $i < count ($kdkegunit); $i++){
        $list[$i]=array(
          'id_pptk_master'=> $id_master,
          'kdkegunit'     => $kdkegunit[$i],
          'nilai'         => $nilai[$i],
          'idpnspptk'     => $idpnspptk[$i],
          'idpnsppk'      => $idpnsppk[$i]
        );
      }

    $this->db->insert_batch('tab_pptk', $list);

    $file = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
    $config['upload_path'] = './assets/dokumen/'; //path folder iko
    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf|doc|docx|xlsx|xls'; //type yang dapat diakses ikobisa anda sesuaikan
    $config['max_size'] = '3072'; //maksimum besar file 3M
    $config['max_width']  = '5000'; //lebar maksimum 5000 px
    $config['max_height']  = '5000'; //tinggi maksimu 5000 px
    $config['file_name'] = $file; //nama yang terupload nantinya smpai iko
    $files = $_FILES;
    $listdokumen=array();
    for($i=0; $i < count ($nmfile); $i++){
      $_FILES['userfile']['name']= $files['userfile']['name'][$i];
      $_FILES['userfile']['type']= $files['userfile']['type'][$i];
      $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
      $_FILES['userfile']['error']= $files['userfile']['error'][$i];
      $_FILES['userfile']['size']= $files['userfile']['size'][$i];
      $this->upload->initialize($config);
      //$this->upload->do_upload();
          if ( !$this->upload->do_upload()){
              $namo_dokumen = 'no-image.png';
          }else{
              $fileData = $this->upload->data();
              $namo_dokumen = $fileData['file_name'];
          }
          $listdokumen[$i]=array(
          'id_pptk_master'  => $id_master,
            'nama_dokumen'    => $nmfile[$i],
            'file_path'    => $namo_dokumen,
          );


    }
  $this->db->insert_batch('tab_upload_sk', $listdokumen);
    $this->db->trans_complete();
        if ($this->db->affected_rows() == '1') {
        return TRUE;
        }
        else {
            // trans error?
            if ($this->db->trans_status() === FALSE) {
                return 0;
            }
                return 1;
        }
  }

function simpanentrikak($masterkak){
    $this->db->trans_start();
    $this->db->insert('tab_kak', $masterkak);
    $id_master = $this->db->insert_id();
    $sc = $this->input->post('tms');
    $list=array();
     for($i=0; $i < count ($sc); $i++){
       $januari='';
       if(array_key_exists('0', $sc[$i])){
         $jan= count($sc[$i]['0']);
         for($x=0; $x < $jan ; $x++){
          $januari.=$sc[$i]['0'][$x];
        }
      }

      $februari='';
      if(array_key_exists('1', $sc[$i])){
       $feb= count($sc[$i]['1']);
       for($x=0; $x < $feb ; $x++){
        $februari.=$sc[$i]['1'][$x];
       }
      }

    $maret='';
    if(array_key_exists('2', $sc[$i])){
     $mar= count($sc[$i]['2']);
     for($x=0; $x < $mar ; $x++){
      $maret.=$sc[$i]['2'][$x];
      }
    }

    $april='';
    if(array_key_exists('3', $sc[$i])){
     $apr= count($sc[$i]['3']);
     for($x=0; $x < $apr ; $x++){
      $april.=$sc[$i]['3'][$x];
      }
    }

    $may='';
    if(array_key_exists('4', $sc[$i])){
     $mei= count($sc[$i]['4']);
     for($x=0; $x < $mei ; $x++){
      $may.=$sc[$i]['4'][$x];
      }
    }

    $juni='';
    if(array_key_exists('5', $sc[$i])){
     $jun= count($sc[$i]['5']);
     for($x=0; $x < $jun ; $x++){
      $juni.=$sc[$i]['5'][$x];
      }
    }

    $juli='';
    if(array_key_exists('6', $sc[$i])){
     $jul= count($sc[$i]['6']);
     for($x=0; $x < $jul ; $x++){
      $juli.=$sc[$i]['6'][$x];
      }
    }

    $agustus='';
    if(array_key_exists('7', $sc[$i])){
     $ags= count($sc[$i]['7']);
     for($x=0; $x < $ags ; $x++){
      $agustus.=$sc[$i]['7'][$x];
      }
    }

    $september='';
    if(array_key_exists('8', $sc[$i])){
     $sep= count($sc[$i]['8']);
     for($x=0; $x < $sep ; $x++){
      $september.=$sc[$i]['8'][$x];
      }
    }

    $oktober='';
    if(array_key_exists('9', $sc[$i])){
     $okt= count($sc[$i]['9']);
     for($x=0; $x < $okt ; $x++){
      $oktober.=$sc[$i]['9'][$x];
      }
    }

    $november='';
    if(array_key_exists('10', $sc[$i])){
     $nov= count($sc[$i]['10']);
     for($x=0; $x < $nov ; $x++){
      $november.=$sc[$i]['10'][$x];
      }
    }

    $desember='';
    if(array_key_exists('11', $sc[$i])){
     $des= count($sc[$i]['11']);
     for($x=0; $x < $des ; $x++){
      $desember.=$sc[$i]['11'][$x];
      }
    }

      $list[$i]=array(
       'uraian_keg' => $sc[$i]['uraian']['0'],
       'id_tab_kak' => $id_master,
       'jan'      => $januari,
       'feb'      => $februari,
       'mar'      => $maret,
       'apr'      => $april,
       'mei'      => $may,
       'jun'      => $juni,
       'jul'      => $juli,
       'ags'      => $agustus,
       'sep'      => $september,
       'okt'      => $oktober,
       'nov'      => $november,
       'des'      => $desember
      );
  }

    $this->db->insert_batch('tab_schedule', $list);
    $this->db->trans_complete();
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        else {
            // trans error?
            if ($this->db->trans_status() === FALSE) {
                return 0;
            }
                return 1;
        }
  }
  function simpantargetfisik($data, $detail){
    $this->db->trans_start();
    $this->db->insert('tab_target_blnj_modal', $data);
    $id_master = $this->db->insert_id();
    $detail["id_tab_target"] = $id_master;
    $this->db->insert('tab_schedule_blnj_mdl', $detail);
    $this->db->trans_complete();
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        else {
            // trans error?
            if ($this->db->trans_status() === FALSE) {
                return 0;
            }
                return 1;
        }
  }
    function cekblnjamodal($unitkey,$idkeg){

        $this->db->select(' `angkas`.`kdkegunit`
        , `matangr`.`mtgkey`
        , `matangr`.`kdper`
        , `matangr`.`nmper`');
        $this->db->from('angkas');
        $this->db->join('matangr', '`angkas`.`mtgkey` = `matangr`.`mtgkey`');
        $this->db->where('`angkas`.`unitkey`', $unitkey);
        $this->db->where('`angkas`.`kdkegunit`', $idkeg);
        $this->db->like('`matangr`.`kdper`', '5.2.3.', 'both');
        $this->db->group_by('`matangr`.`mtgkey`');
        return $this->db->get();
    }

    function getnama_metode(){
      return $this->db->get('tab_metode_pelaksanaan')->result();
    }

    function jsonlistbmodal($unit,$kegiatan){
      $this->datatables->select('`angkas`.`kdkegunit` as kdkegunit
        , `matangr`.`mtgkey` as mtgkey
        , `matangr`.`kdper` as kdper
        , `matangr`.`nmper` as nmper
        , (`tab_target_blnj_modal`.`idtab_pptk` IS NOT NULL) AS ada');
      $this->datatables->from('`db_sodap`.`angkas`');
      $this->datatables->join('`db_sodap`.`matangr`', '`angkas`.`mtgkey` = `matangr`.`mtgkey`');
      $this->datatables->join('`db_sodap`.`tab_target_blnj_modal`', '`tab_target_blnj_modal`.`mtgkey` = `matangr`.`mtgkey`','LEFT');
      $this->datatables->where('`angkas`.`unitkey`', $unit);
      $this->datatables->where('`angkas`.`kdkegunit`', $kegiatan);
      $this->datatables->like('`matangr`.`kdper`', '5.2.3.', 'both');
      $this->datatables->group_by('`matangr`.`mtgkey`');

        return $this->datatables->generate();
    }
     function cektargetfisik($unit,$kegiatan){
      $this->db->select('`angkas`.`kdkegunit` as kdkegunit
        , `matangr`.`mtgkey` as mtgkey
        , `matangr`.`kdper` as kdper
        , `matangr`.`nmper` as nmper
        , (`tab_target_blnj_modal`.`idtab_pptk` IS NOT NULL) AS ada');
      $this->db->from('`db_sodap`.`angkas`');
      $this->db->join('`db_sodap`.`matangr`', '`angkas`.`mtgkey` = `matangr`.`mtgkey`');
      $this->db->join('`db_sodap`.`tab_target_blnj_modal`', '`tab_target_blnj_modal`.`mtgkey` = `matangr`.`mtgkey`','LEFT');
      $this->db->where('`angkas`.`unitkey`', $unit);
      $this->db->where('`angkas`.`kdkegunit`', $kegiatan);

      $this->db->like('`matangr`.`kdper`', '5.2.3.', 'both');
      $this->db->group_by('`matangr`.`mtgkey`');
      // $this->datatables->add_column('action', '<button class="opduserpass btn btn-danger">Password<div class="ripple-container"></div></button> <button class="opduserinfo btn btn-info">Info<div class="ripple-container"></div></button>' );
       return $this->db->get()->result();
    }
    // function jsonlistbmodal($unit,$kegiatan){
    //   $this->datatables->select('kdkegunit,mtgkey,kdper,nmper,ada');
    //   $this->datatables->where('`unitkey`', $unit);
    //   $this->datatables->where('`kdkegunit`', $kegiatan);
    //   $this->datatables->from('v_belanja_modal');
    //   $this->datatables->add_column('action', '<button class="opduserpass btn btn-danger">Password<div class="ripple-container"></div></button> <button class="opduserinfo btn btn-info">Info<div class="ripple-container"></div></button>' );
    //     return $this->datatables->generate();
    // }

    //<--query untuk mendapatkan unitkey ppk
    function getunitkeyppk($nip)
    {
        $this->db->select('unitkey');
        $this->db->where('nip',$nip);
        $this->db->from('tab_pns');
        $result = $this->db->get()->row();
        return $result->unitkey;
    }
    //end query untuk mendapatkan unitkey ppk-->

    //<--query untuk mendapatkan id struktur ppk
    function getidstrukturppk($nip)
    {
        $this->db->select('id');
        $this->db->where('nip',$nip);
        $this->db->from('tab_struktur');
        $result = $this->db->get()->row();
        return $result->id;
    }
    //end query untuk mendapatkan id struktur ppk-->

    //<--query untuk mendapatkan nip struktur pptk
    function getnipstrukturpptk($parent)
    {
        $query = 'SELECT
        `tab_pns`.`nip`
        , `tab_pns`.`nama`
        FROM
        `db_sodap`.`tab_struktur`
        INNER JOIN `db_sodap`.`tab_pns`
            ON (`tab_struktur`.`nip` = `tab_pns`.`nip`) WHERE `tab_struktur`.`parent`='.$parent;
        $result = $this->db->query($query)->result_array();
        return $result;
    }
    //end query untuk mendapatkan nip struktur ppk-->

    //<--query untuk mendapatkan data dpa221, tab_pptk, matangr, mkegiatan ppk
    function getdatappk($unitkey,$nipppk)
    {
        $query = 'SELECT
    `tab_pptk`.`idpnsppk`
    , `tab_pptk`.`idpnspptk`
    , `mkegiatan`.`kdkegunit`
    , `mkegiatan`.`nmkegunit`
    , `matangr`.`mtgkey`
    , `matangr`.`nmper`
    , `dpa221`.`id` AS `dpa221_id`
    , `dpa221`.`satuan`
    , `dpa221`.`jumbyek`
    , `dpa221`.`uraian`
    , `dpa221`.`tarif`
    , `angkas`.`id` AS `angkas_id`
    , `angkas`.`kd_bulan`
    , `angkas`.`nilai`
    , `angkas`.`tahun`
FROM
    `db_sodap`.`dpa221`
    INNER JOIN `db_sodap`.`matangr`
        ON (`dpa221`.`mtgkey` = `matangr`.`mtgkey`)
    INNER JOIN `db_sodap`.`mkegiatan`
        ON (`dpa221`.`kdkegunit` = `mkegiatan`.`kdkegunit`)
    INNER JOIN `db_sodap`.`angkas`
        ON (`matangr`.`mtgkey` = `angkas`.`mtgkey`)
    INNER JOIN `db_sodap`.`tab_pptk`
        ON (`tab_pptk`.`kdkegunit` = `mkegiatan`.`kdkegunit`) AND (`angkas`.`kdkegunit` = `mkegiatan`.`kdkegunit`) WHERE `dpa221`.`unitkey` ="'.$unitkey.'" AND `tab_pptk`.`idpnsppk`="'.$nipppk.'" AND `angkas`.`tahun`=YEAR(NOW())';
        return $this->db->query($query)->result_array();
    }
    //end query untuk mendapatkan data dpa221, tab_pptk, matangr, mkegiatan ppk-->

    //<--query untuk mendapatkan data pagu tahun
    function getpagutahun($nipppk,$unitkey)
    {

        $query = 'SELECT
    SUM(`angkas`.`nilai`) AS `pagu_tahun`
FROM
    `db_sodap`.`tab_pptk`
    INNER JOIN `db_sodap`.`angkas`
        ON (`tab_pptk`.`kdkegunit` = `angkas`.`kdkegunit`) WHERE `tab_pptk`.`idpnsppk`='.$nipppk.' AND `angkas`.`tahun` = YEAR(NOW()) AND `angkas`.`unitkey`="'.$unitkey.'"';
        return $this->db->query($query)->row()->pagu_tahun;
    }
    //end query untuk mendapatkan data pagu tahun-->

    //<--query untuk mendapatkan data angkas hingga bulan ini
    function getangkashinggabulanini($nipppk,$unitkey)
    {

        $query = 'SELECT
    SUM(`angkas`.`nilai`) AS `angkas_bulan`
FROM
    `db_sodap`.`tab_pptk`
    INNER JOIN `db_sodap`.`angkas`
        ON (`tab_pptk`.`kdkegunit` = `angkas`.`kdkegunit`) WHERE `tab_pptk`.`idpnsppk`='.$nipppk.' AND `angkas`.`kd_bulan` <= MONTH(NOW()) AND `angkas`.`tahun` = YEAR(NOW()) AND `angkas`.`unitkey`="'.$unitkey.'"';
        return $this->db->query($query)->row()->angkas_bulan;
    }
    //end query untuk mendapatkan data angkas hingga bulan ini-->

    //<--query untuk mendapatkan data angkas bulan ini
    function getangkasbulanini($nipppk,$unitkey)
    {

        $query = 'SELECT
    SUM(`angkas`.`nilai`) AS `angkas_bulan`
FROM
    `db_sodap`.`tab_pptk`
    INNER JOIN `db_sodap`.`angkas`
        ON (`tab_pptk`.`kdkegunit` = `angkas`.`kdkegunit`) WHERE `tab_pptk`.`idpnsppk`='.$nipppk.' AND `angkas`.`kd_bulan` = MONTH(NOW()) AND `angkas`.`tahun` = YEAR(NOW()) AND `angkas`.`unitkey`="'.$unitkey.'"';
        return $this->db->query($query)->row()->angkas_bulan;
    }
    //end query untuk mendapatkan data angkas bulan ini-->

    //<--query untuk mendapatkan detail data angkas bulan ini
    function getdetangkasbulanini($nipppk,$unitkey)
    {
        $query = 'SELECT
    `angkas`.`nilai`,
    `angkas`.`kdkegunit`
FROM
    `db_sodap`.`tab_pptk`
    INNER JOIN `db_sodap`.`angkas`
        ON (`tab_pptk`.`kdkegunit` = `angkas`.`kdkegunit`) WHERE `tab_pptk`.`idpnsppk`='.$nipppk.' AND `angkas`.`kd_bulan` = MONTH(NOW()) AND `angkas`.`tahun` = YEAR(NOW()) AND `angkas`.`unitkey`="'.$unitkey.'"';
        return $this->db->query($query)->result_array();
    }
    //end query untuk mendapatkan detail data angkas bulan ini-->

    //<--query untuk mendapatkan data realisasi bulan ini
    function getrealisasibulanini($idppk)
    {
        $query = 'SELECT
    SUM(`tab_realisasi_det`.`jumlah_harga`) AS `realisasi`
FROM
    `db_sodap`.`tab_realisasi_det`
    INNER JOIN `db_sodap`.`tab_realisasi`
        ON (`tab_realisasi_det`.`id_tab_realisasi` = `tab_realisasi`.`id`)
    INNER JOIN `db_sodap`.`tab_struktur`
        ON (`tab_struktur`.`nip` = `tab_realisasi`.`admin_entri`) WHERE `tab_struktur`.`parent`='.$idppk.' AND MONTH(`tab_realisasi`.`real_bulan`)=MONTH(NOW()) AND YEAR(`tab_realisasi`.`real_bulan`)=YEAR(NOW())';
        if($this->db->query($query)->num_rows()!=0){
            return $this->db->query($query)->row()->realisasi;
        }else{
            return 0;
        }
    }
    //end query untuk mendapatkan data realisasi bulan ini-->

    //<--query untuk mendapatkan detail realisasi belanja modal bulan ini
    function getdetrealbmodalbi($idstrukturppk,$unitkey)
    {
        $query = 'SELECT
    `tab_realisasi_bmodal`.`nilai_ktrk`
    , `dpa221`.`mtgkey`
    , `dpa221`.`kdkegunit`
FROM
    `db_sodap`.`tab_realisasi_bmodal`
    INNER JOIN `db_sodap`.`tab_struktur`
        ON (`tab_realisasi_bmodal`.`admin_entri` = `tab_struktur`.`nip`)
    INNER JOIN `db_sodap`.`dpa221`
        ON (`dpa221`.`mtgkey` = `tab_realisasi_bmodal`.`mtgkey`)
        WHERE `tab_struktur`.`parent`='.$idstrukturppk.' AND `dpa221`.`unitkey`="'.$unitkey.'" AND MONTH(`tab_realisasi_bmodal`.`real_bulan`)=MONTH(NOW()) AND YEAR(`tab_realisasi_bmodal`.`real_bulan`)=YEAR(NOW());';
        if($this->db->query($query)->num_rows()!=0){
            return $this->db->query($query)->result_array();
        }else{
            return 0;
        }
    }
    //end query untuk mendapatkan detail realisasi belanja modal bulan ini-->

    //<--query untuk mendapatkan data kegiatan pptk
    function getkegiatan($nipppk)
    {
        $query = 'SELECT
`mkegiatan`.`nmkegunit`,
`mkegiatan`.`kdkegunit`,
`tab_pptk`.`idpnspptk`
FROM
`db_sodap`.`tab_pptk`
INNER JOIN `db_sodap`.`mkegiatan`
ON (`tab_pptk`.`kdkegunit` = `mkegiatan`.`kdkegunit`) WHERE `tab_pptk`.`idpnsppk`='.$nipppk.' AND `mkegiatan`.`tahun`=YEAR(NOW())';
        return $this->db->query($query)->result_array();
    }
    //end query untuk mendapatkan data kegiatan pptk-->

    //<--query untuk mendapatkan data realisasi bulan ini pptk
    function getdatarealisasi($nipppk)
    {
        $query = 'SELECT
    `tab_realisasi_det`.`jumlah_harga`
    , `mkegiatan`.`kdkegunit`
    , `mkegiatan`.`nmkegunit`
FROM
    `db_sodap`.`tab_realisasi_det`
    INNER JOIN `db_sodap`.`tab_realisasi`
        ON (`tab_realisasi_det`.`id_tab_realisasi` = `tab_realisasi`.`id`)
    INNER JOIN `db_sodap`.`dpa221`
        ON (`dpa221`.`id` = `tab_realisasi_det`.`id_dpa`)
    INNER JOIN `db_sodap`.`mkegiatan`
        ON (`mkegiatan`.`kdkegunit` = `dpa221`.`kdkegunit`)
    INNER JOIN `db_sodap`.`tab_pptk`
        ON (`tab_pptk`.`kdkegunit` = `mkegiatan`.`kdkegunit`) WHERE `tab_pptk`.`idpnsppk`='.$nipppk.' AND MONTH(`tab_realisasi`.`real_bulan`)=MONTH(NOW()) AND YEAR(`tab_realisasi`.`real_bulan`)=YEAR(NOW())';
        return $this->db->query($query)->result_array();
    }
    //end query untuk mendapatkan data realisasi bulan ini pptk-->

    //<--query untuk mendapatkan data realisasi hingga bulan sebelumnya
    function getdatarealisasihbs($nipppk)
    {
        $query = 'SELECT
    `tab_realisasi_det`.`jumlah_harga`
    , `mkegiatan`.`kdkegunit`
    , `mkegiatan`.`nmkegunit`
FROM
    `db_sodap`.`tab_realisasi_det`
    INNER JOIN `db_sodap`.`tab_realisasi`
        ON (`tab_realisasi_det`.`id_tab_realisasi` = `tab_realisasi`.`id`)
    INNER JOIN `db_sodap`.`dpa221`
        ON (`dpa221`.`id` = `tab_realisasi_det`.`id_dpa`)
    INNER JOIN `db_sodap`.`mkegiatan`
        ON (`mkegiatan`.`kdkegunit` = `dpa221`.`kdkegunit`)
    INNER JOIN `db_sodap`.`tab_pptk`
        ON (`tab_pptk`.`kdkegunit` = `mkegiatan`.`kdkegunit`) WHERE `tab_pptk`.`idpnsppk`='.$nipppk.' AND MONTH(`tab_realisasi`.`real_bulan`)<MONTH(NOW()) AND YEAR(`tab_realisasi`.`real_bulan`)=YEAR(NOW())';
        return $this->db->query($query)->result_array();
    }
    //end query untuk mendapatkan data realisasi hingga bulan sebelumnya-->

    //<--query untuk mendapatkan data realisasi hingga bulan ini
    function gettotalrealisasi($nipppk)
    {
        $query = 'SELECT
    SUM(`tab_realisasi_det`.`jumlah_harga`) as `total_realisasi`
FROM
    `db_sodap`.`tab_realisasi_det`
    INNER JOIN `db_sodap`.`tab_realisasi`
        ON (`tab_realisasi_det`.`id_tab_realisasi` = `tab_realisasi`.`id`)
    INNER JOIN `db_sodap`.`dpa221`
        ON (`dpa221`.`id` = `tab_realisasi_det`.`id_dpa`)
    INNER JOIN `db_sodap`.`mkegiatan`
        ON (`mkegiatan`.`kdkegunit` = `dpa221`.`kdkegunit`)
    INNER JOIN `db_sodap`.`tab_pptk`
        ON (`tab_pptk`.`kdkegunit` = `mkegiatan`.`kdkegunit`) WHERE `tab_pptk`.`idpnsppk`='.$nipppk.' AND MONTH(`tab_realisasi`.`real_bulan`)<MONTH(NOW()) AND YEAR(`tab_realisasi`.`real_bulan`)=YEAR(NOW())';

        if($this->db->query($query)->num_rows()!=0){
            return $this->db->query($query)->row()->total_realisasi;
        }else{
            return 0;
        }
    }
    //end query untuk mendapatkan data realisasi hingga bulan ini-->

    //<--query untuk mendapatkan detail angkas hingga bulan sebelumnya
    function getdetangkashbs($nipppk,$unitkey)
    {
        $query = 'SELECT
    `angkas`.`kd_bulan`
    , `angkas`.`kdkegunit`
    , SUM(`angkas`.`nilai`) AS `total_angkas`
FROM
    `db_sodap`.`angkas`
    INNER JOIN `db_sodap`.`mkegiatan`
        ON (`angkas`.`kdkegunit` = `mkegiatan`.`kdkegunit`)
    INNER JOIN `db_sodap`.`tab_pptk`
        ON (`tab_pptk`.`kdkegunit` = `mkegiatan`.`kdkegunit`) WHERE `tab_pptk`.`idpnsppk` = '.$nipppk.' AND `angkas`.`kd_bulan`<MONTH(NOW()) AND `angkas`.`tahun`=YEAR(NOW()) AND `angkas`.`unitkey`="'.$unitkey.'" GROUP BY `angkas`.`kdkegunit`;';

        if($this->db->query($query)->num_rows()!=0){
            return $this->db->query($query)->result_array();
        }else{
            return 0;
        }
    }
    //end query untuk mendapatkan detail angkas hingga bulan sebelumnya-->

    //<--query untuk mendapatkan rincian realisasi
    function rincianrealisasi($kdkegunit)
    {
        $query = 'SELECT
    `matangr`.`mtgkey`
    , `matangr`.`nmper`
    , `matangr`.`kdper`
    , `tab_realisasi`.`real_bulan`
    , `tab_realisasi`.`tgl_entri`
    , `tab_realisasi`.`bobot_real`
    , `tab_sumber_dana`.`nm_dana`
    , `tab_realisasi_det`.`harga_satuan`
    , `tab_realisasi_det`.`jumlah_harga`
    , `tab_realisasi_det`.`sisa_dana`
    , `tab_realisasi_det`.`vol`
    , `dpa221`.`satuan`
    , `dpa221`.`uraian`
FROM
    `db_sodap`.`tab_realisasi`
    INNER JOIN `db_sodap`.`tab_realisasi_det`
        ON (`tab_realisasi`.`id` = `tab_realisasi_det`.`id_tab_realisasi`)
    INNER JOIN `db_sodap`.`dpa221`
        ON (`tab_realisasi_det`.`id_dpa` = `dpa221`.`id`)
    INNER JOIN `db_sodap`.`matangr`
        ON (`dpa221`.`mtgkey` = `matangr`.`mtgkey`)
    INNER JOIN `db_sodap`.`mkegiatan`
        ON (`dpa221`.`kdkegunit` = `mkegiatan`.`kdkegunit`)
    INNER JOIN `db_sodap`.`tab_sumber_dana`
        ON (`tab_sumber_dana`.`id` = `tab_realisasi_det`.`sumber_dana`)
        WHERE `mkegiatan`.`kdkegunit` = "'.$kdkegunit.'" AND MONTH(`tab_realisasi`.`real_bulan`)=MONTH(NOW()) AND YEAR(`tab_realisasi`.`real_bulan`)=YEAR(NOW())';

        if($this->db->query($query)->num_rows()!=0){
            return $this->db->query($query)->result_array();
        }else{
            return 0;
        }
    }
    //end query untuk mendapatkan rincian realisasi-->

    //<--query untuk mendapatkan data mata anggaran
    function getmatangr($kdkegunit)
    {
        $query = 'SELECT
    `matangr`.`kdper`
    , `matangr`.`nmper`
    , `matangr`.`mtgkey`
    , SUM(`tab_realisasi_det`.`sisa_dana`) AS `sisa_dana`
FROM
    `db_sodap`.`matangr`
    INNER JOIN `db_sodap`.`dpa221`
        ON (`matangr`.`mtgkey` = `dpa221`.`mtgkey`)
    INNER JOIN `db_sodap`.`tab_realisasi_det`
        ON (`dpa221`.`id` = `tab_realisasi_det`.`id_dpa`)
    INNER JOIN `db_sodap`.`tab_realisasi`
        ON (`tab_realisasi_det`.`id_tab_realisasi` = `tab_realisasi`.`id`)
        WHERE `dpa221`.`kdkegunit`= "'.$kdkegunit.'" AND MONTH(`tab_realisasi`.`real_bulan`)=MONTH(NOW()) AND YEAR(`tab_realisasi`.`real_bulan`)=YEAR(NOW()) GROUP BY `matangr`.`kdper`';

        if($this->db->query($query)->num_rows()!=0){
            return $this->db->query($query)->result_array();
        }else{
            return 0;
        }
    }
    //end query untuk mendapatkan data mata anggaran-->

    //<--query untuk mendapatkan data mata anggaran belanja modal
    function getmatangrbmodal($kdkegunit)
    {
        $query = 'SELECT
    `matangr`.`kdper`
    , `matangr`.`nmper`
    , `matangr`.`mtgkey`
FROM
    `db_sodap`.`tab_realisasi_bmodal_det`
    INNER JOIN `db_sodap`.`tab_realisasi_bmodal`
        ON (`tab_realisasi_bmodal_det`.`id_tab_real_bmodal` = `tab_realisasi_bmodal`.`id`)
    INNER JOIN `db_sodap`.`matangr`
        ON (`tab_realisasi_bmodal`.`mtgkey` = `matangr`.`mtgkey`)
    INNER JOIN `db_sodap`.`dpa221`
        ON (`dpa221`.`mtgkey` = `matangr`.`mtgkey`)
        WHERE `dpa221`.`kdkegunit`= "'.$kdkegunit.'" AND MONTH(`tab_realisasi_bmodal`.`real_bulan`)=MONTH(NOW()) AND YEAR(`tab_realisasi_bmodal`.`real_bulan`)=YEAR(NOW()) GROUP BY `matangr`.`kdper`';

        if($this->db->query($query)->num_rows()!=0){
            return $this->db->query($query)->result_array();
        }else{
            return 0;
        }
    }
    //end query untuk mendapatkan data mata anggaran belanja modal-->

    //<--query untuk mendapatkan detail angkas untuk satu tahun
    function getdetangkassatutahun($nipppk,$unitkey)
    {
        $query = 'SELECT
    `angkas`.`kd_bulan`
    , `angkas`.`kdkegunit`
    , SUM(`angkas`.`nilai`) AS `total_angkas`
FROM
    `db_sodap`.`angkas`
    INNER JOIN `db_sodap`.`mkegiatan`
        ON (`angkas`.`kdkegunit` = `mkegiatan`.`kdkegunit`)
    INNER JOIN `db_sodap`.`tab_pptk`
        ON (`tab_pptk`.`kdkegunit` = `mkegiatan`.`kdkegunit`) WHERE `tab_pptk`.`idpnsppk` = '.$nipppk.' AND `angkas`.`tahun`=YEAR(NOW()) AND `angkas`.`unitkey`="'.$unitkey.'" GROUP BY `angkas`.`kdkegunit`;';

        if($this->db->query($query)->num_rows()!=0){
            return $this->db->query($query)->result_array();
        }else{
            return 0;
        }
    }
    //end query untuk mendapatkan detail angkas untuk satu tahun-->

    //<--query untuk mendapatkan data schedule satu tahun
    function getdataschedule($nipppk)
    {
        $query = 'SELECT
    `tab_pptk`.`kdkegunit`
    , `tab_schedule`.`id_tab_kak`
    , `tab_schedule`.`jan` AS `bulan_1`
    , `tab_schedule`.`feb` AS `bulan_2`
    , `tab_schedule`.`mar` AS `bulan_3`
    , `tab_schedule`.`apr` AS `bulan_4`
    , `tab_schedule`.`mei` AS `bulan_5`
    , `tab_schedule`.`jun` AS `bulan_6`
    , `tab_schedule`.`jul` AS `bulan_7`
    , `tab_schedule`.`ags` AS `bulan_8`
    , `tab_schedule`.`sep` AS `bulan_9`
    , `tab_schedule`.`okt` AS `bulan_10`
    , `tab_schedule`.`nov` AS `bulan_11`
    , `tab_schedule`.`des` AS `bulan_12`
FROM
    `db_sodap`.`tab_kak`
    INNER JOIN `db_sodap`.`tab_pptk`
        ON (`tab_kak`.`idtab_pptk` = `tab_pptk`.`id`)
    INNER JOIN `db_sodap`.`mkegiatan`
        ON (`tab_pptk`.`kdkegunit` = `mkegiatan`.`kdkegunit`)
    INNER JOIN `db_sodap`.`tab_schedule`
        ON (`tab_schedule`.`id_tab_kak` = `tab_kak`.`id`)
        WHERE `tab_pptk`.`idpnsppk`='.$nipppk.' AND `mkegiatan`.`tahun`=YEAR(NOW())';

        if($this->db->query($query)->num_rows()!=0){
            return $this->db->query($query)->result_array();
        }else{
            return 0;
        }
    }
    //end query untuk mendapatkan data schedule satu tahun-->

    //<--query untuk mendapatkan data realisasi fisik bulan ini
    function getrealfisik($nipppk)
    {
        $query = 'SELECT
    `mkegiatan`.`kdkegunit`
    , `tab_realisasi`.`bobot_real`
FROM
    `db_sodap`.`tab_pptk`
    INNER JOIN `db_sodap`.`mkegiatan`
        ON (`tab_pptk`.`kdkegunit` = `mkegiatan`.`kdkegunit`)
    INNER JOIN `db_sodap`.`tab_realisasi`
        ON (`tab_realisasi`.`id_tabpptk` = `tab_pptk`.`id`)
        WHERE `tab_pptk`.`idpnsppk`='.$nipppk.' AND `mkegiatan`.`tahun`=YEAR(NOW()) AND MONTH(`tab_realisasi`.`real_bulan`)=MONTH(NOW()) AND YEAR(`tab_realisasi`.`real_bulan`)=YEAR(NOW())';

        if($this->db->query($query)->num_rows()!=0){
            return $this->db->query($query)->result_array();
        }else{
            return 0;
        }
    }
    //end query untuk mendapatkan data realisasi fisik bulan ini-->

    //<--query untuk mendapatkan data realisasi belanja modal bulan ini
    function getrealbmodal($kdkegunit)
    {
        $query = 'SELECT
    `matangr`.`mtgkey`
    , `dpa221`.`uraian`
    , `dpa221`.`satuan`
    , `dpa221`.`jumbyek` AS `vol`
    , `tab_realisasi_bmodal`.`nilai_ktrk` AS `harga_satuan`
    , `tab_realisasi_bmodal`.`nilai_ktrk` AS `jumlah_harga`
FROM
    `db_sodap`.`tab_realisasi_bmodal_det`
    INNER JOIN `db_sodap`.`tab_realisasi_bmodal`
        ON (`tab_realisasi_bmodal_det`.`id_tab_real_bmodal` = `tab_realisasi_bmodal`.`id`)
    INNER JOIN `db_sodap`.`matangr`
        ON (`tab_realisasi_bmodal`.`mtgkey` = `matangr`.`mtgkey`)
    INNER JOIN `db_sodap`.`dpa221`
        ON (`dpa221`.`mtgkey` = `matangr`.`mtgkey`)
        WHERE `dpa221`.`kdkegunit`="'.$kdkegunit.'" AND MONTH(`tab_realisasi_bmodal`.`real_bulan`)=MONTH(NOW()) AND YEAR(`tab_realisasi_bmodal`.`real_bulan`)=YEAR(NOW())';

        if($this->db->query($query)->num_rows()!=0){
            return $this->db->query($query)->result_array();
        }else{
            return 0;
        }
    }
    //end query untuk mendapatkan data realisasi belanja modal bulan ini-->

    //<--query untuk mendapatkan seluruh data realisasi belanja modal hingga bulan sebelumnya
    function gettotalrealbmodalhbs($idstrukturppk)
    {
        $query = 'SELECT
    SUM(`tab_realisasi_bmodal`.`nilai_ktrk`) AS `total_real_bmodal`
FROM
    `db_sodap`.`tab_realisasi_bmodal`
    INNER JOIN `db_sodap`.`tab_struktur`
        ON (`tab_realisasi_bmodal`.`admin_entri` = `tab_struktur`.`nip`)
        WHERE `tab_struktur`.`parent`='.$idstrukturppk.' AND MONTH(`tab_realisasi_bmodal`.`real_bulan`)<MONTH(NOW()) AND YEAR(`tab_realisasi_bmodal`.`real_bulan`)=YEAR(NOW());';

        if($this->db->query($query)->num_rows()!=0){
            return $this->db->query($query)->row()->total_real_bmodal;
        }else{
            return 0;
        }
    }
    //end query untuk mendapatkan seluruh data realisasi belanja modal hingga bulan sebelumnya-->

    //<--query untuk mendapatkan seluruh data realisasi belanja modal bulan ini
    function gettotalrealbmodalbi($idstrukturppk)
    {
        $query = 'SELECT
    SUM(`tab_realisasi_bmodal`.`nilai_ktrk`) AS `total_real_bmodal`
FROM
    `db_sodap`.`tab_realisasi_bmodal`
    INNER JOIN `db_sodap`.`tab_struktur`
        ON (`tab_realisasi_bmodal`.`admin_entri` = `tab_struktur`.`nip`)
        WHERE `tab_struktur`.`parent`='.$idstrukturppk.' AND MONTH(`tab_realisasi_bmodal`.`real_bulan`)=MONTH(NOW()) AND YEAR(`tab_realisasi_bmodal`.`real_bulan`)=YEAR(NOW());';

        if($this->db->query($query)->num_rows()!=0){
            return $this->db->query($query)->row()->total_real_bmodal;
        }else{
            return 0;
        }
    }
    //end query untuk mendapatkan seluruh data realisasi belanja modal bulan ini-->

    //<--query untuk mendapatkan data angkas untuk belanja modal
    function getangkasbmodal($kdkegunit,$unitkey)
    {
        $query = 'SELECT
            `nilai`,`mtgkey`
            FROM
    `db_sodap`.`angkas`
    WHERE `angkas`.`kdkegunit`="'.$kdkegunit.'" AND `angkas`.`tahun`=YEAR(NOW()) AND `angkas`.`unitkey`="'.$unitkey.'"';

        if($this->db->query($query)->num_rows()!=0){
            return $this->db->query($query)->result_array();
        }else{
            return 0;
        }
    }
    //end query untuk mendapatkan data angkas untuk belanja modal-->
}
