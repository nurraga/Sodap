<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasi_model extends CI_Model
{
    public $vtable_kasi = 'v_pptk';
  

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    /*function getpns($nip){
      $this->db->where('nip', $nip);
      return $this->db->get($this->tab_pns)->row();
    }*/
    public function get_id_unit($id)
    {
       $query = $this->db->select("*")->from("v_jabatanuser")->where('username',$id)->get();
       return $query->result_array();
    }
    public function get_jabatan($id)
    {
       $query = $this->db->select("*")->from("v_jabatanuser")->where('username',$id)->get();
       return $query->result_array();
    }

    function daftarkegiatan($idp){
    $this->db->select('tab_pptk.id,tab_pptk.idpnspptk,mkegiatan.kdkegunit,mkegiatan.nmkegunit as namakeg,nilai');
        $this->db->from('tab_pptk');
        $this->db->join('mkegiatan', 'tab_pptk.kdkegunit = mkegiatan.kdkegunit');   
        $this->db->where('tab_pptk.idpnspptk', $idp);
        $this->db->where('status', 1);   
        return $this->db->get()->result();
  }

   /* public function gettahun($id)
    {
        $query = $this->db->select('tahun')->from("tab_pptk")->where('idpnspptk',$id)->group_by('tahun')->get();
        return $query->result_array();
    }*/


   /* public function get_namaunit($unitkey)
    {
        $query = $this->db->select("nmunit")->from("daftunit")->where('id_unit',$unitkey)->get();
        return $query->result_array();
    }*/
   /* public function ambildata($table)
    {
    return $this->db->get($table);  
    }   */ 
     public function ambildata($kdkegunit, $idpnspptk)
    {    
        $query = $this->db->select("id_bulan")->from("v_keuangan")->where('idpptk', $idpptk)->where('kdkegunit', 
        $kdkegunit)->order_by("nama_bulan","asc")->get();
        return $query->result_array();
       // $this->db->get('v_keuangan'); 
      /*  $this->db->where('kdkegunit', $kdkegunit); 
        $this->db->where('idpnspptk', $idpnspptk); */
    }  
    
    public function getkdkegunit ($idpnspptk)
    {
    $this->db->get('tab_pptk'); 
    $this->db->where('kdkegunit',$idpnspptk); 
    }
public function getuang ($id)
    {
    $this->db->get('v_keuangan'); 
    $this->db->where('id',$id); 
     $this->db->where('kd_bulan',1); 
    }





     public function ambildatafisik()
 
    {    return $this->db->get('nm_bulan');  
    }   

    public function editdata()
    {
            $id_bulan = $this->input->get('id_bulan');
            $this->db->where('id_bulan', $id_bulan);
            $query = $this->db->get('nm_bulan');
            if ($query->num_rows() > 0){
                    return $query->row();
                }else{
                    return false;
                }
    }
  
   public function updatedata()
    {
            $id_bulan = $this->input->get('idbulan');
            $field = array(
            'targetfisik'=>$this->input->post('targetfisik')
            );

            $this->db->where('id_bulan', $id_bulan);
            $this->db->update('targetfisik');
            $query = $this->db->get('targetfisik',  $field);
            if ($this->db->affected_rows() > 0){
                    return true;
                }else{
                    return false;
                }
    }
    
  /*  public function getPns()
    {
        $query = $this->db->select("*")->from("tab_pns")->order_by("nama","asc")->get();
        return $query->result_array();
    }
    */
    public function getpnsbyeselon($id_opd)
    {
        $query = $this->db->select("*")->from("v_namaeselon")->where('unitkey',$id_opd)->where('id_eselon',4)->order_by("id_eselon","asc")->get();
        return $query->result_array();
    }
    
    public function getpnskasi($id_opd)
    {
        $query = $this->db->select("*")->from("v_namaeselon")->where('unitkey',$id_opd)->where('id_eselon',5)->order_by("id_eselon","asc")->get();
        return $query->result_array();
    }
    
    public function getparentid($id_opd)
    {
        $query = $this->db->select("*")->from("v_namaeselon")->where('unitkey',$id_opd)->where('parent_id')->order_by("id_eselon","asc")->get();
        return $query->result_array();
    }
    
    public function get_pns_by_opd($id_opd)
    {
        $query = $this->db->select("*")->from("tab_pns")->where('unitkey',$id_opd)->order_by("nama","asc")->get();
        return $query->result_array();
    }
    
    public function getkegiatan($unitkey)
    {
        $query = $this->db->select("*")->from("dpa22")->where('unitkey',$unitkey)->group_by('kdkegunit')->get();
        return $query->result_array();
    }
    
    public function getnilai($unitkey)
    {
        $query = $this->db->select_sum("nilai")->from("dpa22")->where('unitkey',$unitkey)->group_by('kdkegunit')->get();
        return $query->result_array();
    }
    
  /*  public function getjabatanuser($id)
    {
          return $this->db->select('jabatan_pns')->from('v_jabatanuser1')->where('id_pns', $id)->get()->result_array();
    }
    */
    public function getkegiatanpptk($id)
    {
        $query = $this->db->select("*")->from("tab_pptk")->where('idpnspptk',$id)->get();
        return $query->result_array();
    }
    
        //public function getkegiatanok($unitkey)
        //{
        //   $query = $this->db->select("*")->from("dpa22")->where('unitkey',$unitkey)->get();
        //  return $query->result_array();
        //}
        //public function getnamakegok($unitkey)
        //{
        //  $query = $this->db->select("*")->from("mkegiatan")->where('kdkegunit',$unitkey)->get();
        // $data = $query->result_array();
        //  return $data[0];
        //}
    
     public function countts($id)
    {
        $query = count($this->db->select('*')->from('v_pptk')->where('idpnspptk',$id)->get()->result_array());
        return $query;
    }
     public function json($id)
    {
        $this->datatables->select('id,nmkegunit,nilai');
        $this->datatables->from('v_pptk');
        $this->datatables->where('idpnspptk', $id);
        $this->datatables->where('status',1);
        $this->datatables->add_column('aksi', anchor(site_url('Kasi/detail/$1'), '<button  target="_blank" class="btn1  btn btn-info btn-xs btn-block" ><i target="_blank"  class="glyphicon glyphicon-eye-open" ></i> Target Keuangan</button>'), 'id');
        $this->datatables->add_column('aksi2', anchor(site_url('Kasi/fisik/$1'), '<button class="btn1 btn btn-info btn-xs btn-block" ><i ></i> Target Fisik</button>'), 'id');
        $this->datatables->add_column('aksi3', anchor(site_url('Kasi/realisasi/$1'), '<button class="btn1 btn btn-info btn-xs btn-block" ><i ></i> Realisasi</button>'), 'id');
        return $this->datatables->generate();
    }
     /*public function json_keuangan($id)
    {
        $this->datatables->select('idpptk,id_bulan,nilai');
        $this->datatables->from('v_keuangan');
        $this->datatables->where('kdkegunit', $id);
        return $this->datatables->generate();
    }*/
  public function json_keuangan($idpptk){
  $this->datatables->select('`tab_pptk`.`idpptk`  AS `idpptk`,
  `tab_pptk`.`kdkegunit`  AS `kdkegunit`,
  `mkegiatan`.`nmkegunit` AS `nmkegunit`,
  `angkas`.`kd_bulan`     AS `kd_bulan`,
  `nm_bulan`.`id_bulan`   AS `id_bulan`,
  `nm_bulan`.`nama_bulan` AS `nama_bulan`,
  SUM(`angkas`.`nilai`)   AS `nilai`');
        $this->datatables->from('`angkas`');
        $this->datatables->join(' `nm_bulan`');
        $this->datatables->ON('`angkas`.`kd_bulan` = `nm_bulan`.`id_bulan`');
        $this->datatables->join(' `tab_pptk`');
        $this->datatables->ON('`tab_pptk`.`kdkegunit` = `angkas`.`kdkegunit`');
        $this->datatables->join('`daftunit`');
        $this->datatables->ON('`angkas`.`unitkey` = `daftunit`.`unitkey`');
        $this->datatables->AND('`tab_pptk`.`unitkey` = `daftunit`.`unitkey`');
        $this->datatables->join('`mkegiatan`');
        $this->datatables->ON('`mkegiatan`.`kdkegunit` = `angkas`.`kdkegunit`');
        $this->datatables->AND('`mkegiatan`.`kdkegunit` = `tab_pptk`.`kdkegunit`');
        $this->datatables->GROUP_BY('`tab_pptk`.`kdkegunit`,`angkas`.`kd_bulan`');
         $this->datatables->where('idpptk',  $idpptk);
        return $this->datatables->generate();
}
 /*   public function getnamappk($id2)
    {
        $this->db->where('idpnsppk', $id2);
        return $this->db->get('v_namappk')->row();
    }*/

    function vuang1($idp){
    $this->db->select('tab_pptk.kdkegunit,angkas.kd_bulan,SUM(angkas.nilai) as nilai');
    $this->db->from('tab_pptk');
    $this->db->join('tab_pptk_master', 'tab_pptk.id_pptk_master = tab_pptk_master.id');   
    $this->db->join('angkas', 'tab_pptk.kdkegunit = angkas.kdkegunit', 'tab_pptk_master.unitkey = angkas.unitkey');    
    $this->db->where('tab_pptk.id', $idp);
    $this->db->where('kd_bulan', 1);
    return $this->db->get()->result_array();
  }
  function vuang2($idp){
    $this->db->select('tab_pptk.kdkegunit,angkas.kd_bulan,SUM(angkas.nilai) as nilai');
    $this->db->from('tab_pptk');
    $this->db->join('tab_pptk_master', 'tab_pptk.id_pptk_master = tab_pptk_master.id');   
    $this->db->join('angkas', 'tab_pptk.kdkegunit = angkas.kdkegunit', 'tab_pptk_master.unitkey = angkas.unitkey');    
    $this->db->where('tab_pptk.id', $idp);
    $this->db->where('kd_bulan', 2);
    return $this->db->get()->result_array();
  }
  function vuang3($idp){
    $this->db->select('tab_pptk.kdkegunit,angkas.kd_bulan,SUM(angkas.nilai) as nilai');
    $this->db->from('tab_pptk');
    $this->db->join('tab_pptk_master', 'tab_pptk.id_pptk_master = tab_pptk_master.id');   
    $this->db->join('angkas', 'tab_pptk.kdkegunit = angkas.kdkegunit', 'tab_pptk_master.unitkey = angkas.unitkey');    
    $this->db->where('tab_pptk.id', $idp);
    $this->db->where('kd_bulan', 3);
    return $this->db->get()->result_array();
  }
  function vuang4($idp){
    $this->db->select('tab_pptk.kdkegunit,angkas.kd_bulan,SUM(angkas.nilai) as nilai');
    $this->db->from('tab_pptk');
    $this->db->join('tab_pptk_master', 'tab_pptk.id_pptk_master = tab_pptk_master.id');   
    $this->db->join('angkas', 'tab_pptk.kdkegunit = angkas.kdkegunit', 'tab_pptk_master.unitkey = angkas.unitkey');    
    $this->db->where('tab_pptk.id', $idp);
    $this->db->where('kd_bulan', 4);
    return $this->db->get()->result_array();
  }
  function vuang5($idp){
    $this->db->select('tab_pptk.kdkegunit,angkas.kd_bulan,SUM(angkas.nilai) as nilai');
    $this->db->from('tab_pptk');
    $this->db->join('tab_pptk_master', 'tab_pptk.id_pptk_master = tab_pptk_master.id');   
    $this->db->join('angkas', 'tab_pptk.kdkegunit = angkas.kdkegunit', 'tab_pptk_master.unitkey = angkas.unitkey');    
    $this->db->where('tab_pptk.id', $idp);
    $this->db->where('kd_bulan', 5);
    return $this->db->get()->result_array();
  }
  function vuang6($idp){
    $this->db->select('tab_pptk.kdkegunit,angkas.kd_bulan,SUM(angkas.nilai) as nilai');
    $this->db->from('tab_pptk');
    $this->db->join('tab_pptk_master', 'tab_pptk.id_pptk_master = tab_pptk_master.id');   
    $this->db->join('angkas', 'tab_pptk.kdkegunit = angkas.kdkegunit', 'tab_pptk_master.unitkey = angkas.unitkey');    
    $this->db->where('tab_pptk.id', $idp);
    $this->db->where('kd_bulan', 6);
    return $this->db->get()->result_array();
  }
  function vuang7($idp){
    $this->db->select('tab_pptk.kdkegunit,angkas.kd_bulan,SUM(angkas.nilai) as nilai');
    $this->db->from('tab_pptk');
    $this->db->join('tab_pptk_master', 'tab_pptk.id_pptk_master = tab_pptk_master.id');   
    $this->db->join('angkas', 'tab_pptk.kdkegunit = angkas.kdkegunit', 'tab_pptk_master.unitkey = angkas.unitkey');    
    $this->db->where('tab_pptk.id', $idp);
    $this->db->where('kd_bulan', 7);
    return $this->db->get()->result_array();
  }
  function vuang8($idp){
    $this->db->select('tab_pptk.kdkegunit,angkas.kd_bulan,SUM(angkas.nilai) as nilai');
    $this->db->from('tab_pptk');
    $this->db->join('tab_pptk_master', 'tab_pptk.id_pptk_master = tab_pptk_master.id');   
    $this->db->join('angkas', 'tab_pptk.kdkegunit = angkas.kdkegunit', 'tab_pptk_master.unitkey = angkas.unitkey');    
    $this->db->where('tab_pptk.id', $idp);
    $this->db->where('kd_bulan', 8);
    return $this->db->get()->result_array();
  }
  function vuang9($idp){
    $this->db->select('tab_pptk.kdkegunit,angkas.kd_bulan,SUM(angkas.nilai) as nilai');
    $this->db->from('tab_pptk');
    $this->db->join('tab_pptk_master', 'tab_pptk.id_pptk_master = tab_pptk_master.id');   
    $this->db->join('angkas', 'tab_pptk.kdkegunit = angkas.kdkegunit', 'tab_pptk_master.unitkey = angkas.unitkey');    
    $this->db->where('tab_pptk.id', $idp);
    $this->db->where('kd_bulan', 9);
    return $this->db->get()->result_array();
  }
  function vuang10($idp){
    $this->db->select('tab_pptk.kdkegunit,angkas.kd_bulan,SUM(angkas.nilai) as nilai');
    $this->db->from('tab_pptk');
    $this->db->join('tab_pptk_master', 'tab_pptk.id_pptk_master = tab_pptk_master.id');   
    $this->db->join('angkas', 'tab_pptk.kdkegunit = angkas.kdkegunit', 'tab_pptk_master.unitkey = angkas.unitkey');    
    $this->db->where('tab_pptk.id', $idp);
    $this->db->where('kd_bulan', 10);
    return $this->db->get()->result_array();
  }
  function vuang11($idp){
    $this->db->select('tab_pptk.kdkegunit,angkas.kd_bulan,SUM(angkas.nilai) as nilai');
    $this->db->from('tab_pptk');
    $this->db->join('tab_pptk_master', 'tab_pptk.id_pptk_master = tab_pptk_master.id');   
    $this->db->join('angkas', 'tab_pptk.kdkegunit = angkas.kdkegunit', 'tab_pptk_master.unitkey = angkas.unitkey');    
    $this->db->where('tab_pptk.id', $idp);
    $this->db->where('kd_bulan', 11);
    return $this->db->get()->result_array();
  }
  function vuang12($idp){
    $this->db->select('tab_pptk.kdkegunit,angkas.kd_bulan,SUM(angkas.nilai) as nilai');
    $this->db->from('tab_pptk');
    $this->db->join('tab_pptk_master', 'tab_pptk.id_pptk_master = tab_pptk_master.id');   
    $this->db->join('angkas', 'tab_pptk.kdkegunit = angkas.kdkegunit', 'tab_pptk_master.unitkey = angkas.unitkey');    
    $this->db->where('tab_pptk.id', $idp);
    $this->db->where('kd_bulan', 12);
    return $this->db->get()->result_array();
  }



    public function getdetail($id)
    {
        $this->db->where('id', $id);

        return $this->db->get('v_pptk')->row();
    }
     public function getfisik($id)
    {
        $this->db->where('id', $id);

        return $this->db->get('v_pptk')->row();
    }
    public function getnamakeg($unitkey)
    {
        $query = $this->db->select("*")->from("mkegiatan")->where('kdkegunit',$unitkey)->get();
        $data = $query->result_array();
        return $data[0];
    }
    
    public function getpnsnip($id)
    {
        $this->db->where('id',$id);
        $this->db->select('*');
        $this->db->from('tab_pns');
        $data = $this->db->get()->result_array();
        return $data[0];
    }
        
    public function getmatangr()
    {
        $query = $this->db->select("*")->from("matangr")->group_by("nmper","asc")->get();
        return $query->result_array();
    }
    
    public function getmpgrm()
    {
        $query = $this->db->select("*")->from("mpgrm")->group_by("NMPRGRM","asc")->get();
        return $query->result_array();
    }
    
   /* public function gettahun()
    {
        $query = $this->db->select("*")->from("m_tahunanggaran")->get();
        return $query->result_array();
    }
*/
     
    /*public function gettahunid($id)
    {
        $query = $this->db->select('tahun')->from("tab_pptk")->where('idpnspptk',$id)->group_by("tahun","asc")->get();
        return $query->result_array();
    }*/
     public function getkegid($id)
    {
        $query = $this->db->select('nmkegunit')->from("v_pptk")->where('idpnspptk',$id)->get();
        return $query->result_array();
    }
     public function getnilaiid($id)
    {
        $query = $this->db->select('nilai')->from("v_pptk")->where('idpnspptk',$id)->get();
        return $query->result_array();
    }
    public function namappk($id)
    {
        $query = $this->db->select('idpnsppk')->from("tab_pptk")->where('idpnspptk',$id)->get();
        return $query->result_array();
    }
    
    
    
     public function insert_pptk($data)
    {
        $this->db->insert('tab_pptk',$data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function savemohon($valuesyarat)
    {
        $this->db->trans_start();
        $this->db->insert_batch('tab_dok_pendukung', $valuesyarat);
        $this->db->trans_complete();
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            // any trans error?
            if ($this->db->trans_status() === FALSE) {
                return 0;
            }
            return 1;
        }
    }
}