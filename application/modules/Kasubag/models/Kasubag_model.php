<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kasubag_model extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }



function g_kegiatan() 
    {
        $this->datatables->select('unitkey,nmunit');
        $this->datatables->from($this->mopd);
       $this->datatables->add_column('action', '<button type="button" rel="tooltip" class="btndpa btn btn-info" data-original-title="" title=""><i class="material-icons">launch</i><div class="ripple-container"></div></button>' );
        
        return $this->datatables->generate();
    }
























































	public function getPns()
    {
        $query = $this->db->select("*")->from("tab_pns")->order_by("nama","asc")->get();
        return $query->result_array();
    }
	
	public function getpnsbyeselon($id_opd)
	{
		//$where = 'unitkey='.$id_opd.' and (id_eselon = 3 or id_eselon = 4)';
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
	
	public function get_namaunit($unitkey)
	{
		$query = $this->db->select("*")->from("daftunit")->where('unitkey',$unitkey)->get();
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
	
	public function getjabatanuser($id)
    {
          return $this->db->select('jabatan_pns')->from('v_jabatanuser1')->where('id_pns', $id)->get()->result_array();
    }
	
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
		//	return $data[0];
		//}
	
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
	
	public function gettahun()
    {
        $query = $this->db->select("*")->from("m_tahunanggaran")->get();
        return $query->result_array();
    }
	
	public function get_id_opd($id)
	{
		return $this->db->select('unitkey')->from('tab_pns')->where('id',$id)->get()->result_array()[0];
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