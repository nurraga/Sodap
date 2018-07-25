<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kasi_model extends CI_Model
{
  

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

	public function getPns()
    {
        $query = $this->db->select("*")->from("tab_pns")->order_by("nama","asc")->get();
        return $query->result_array();
    }
	 public function getPnsE12()
    {
        $query = $this->db->select("*")->from("v_opd")->get();
        return $query->result_array();
    }
	 public function getopd()
    {
        $query = $this->db->select("*")->from("v_opd")->group_by("nama_opd","asc")->get();
        return $query->result_array();
    }
	public function getunit()
    {
        $query = $this->db->select("*")->from("daftunit")->group_by("nmunit","asc")->get();
        return $query->result_array();
    }
	public function gettahun()
    {
        $query = $this->db->select("*")->from("m_tahunanggaran")->group_by("tahun","asc")->get();
        return $query->result_array();
    }
public function getmatangr()
    {
        $query = $this->db->select("*")->from("matangr")->group_by("nmper","asc")->get();
        return $query->result_array();
    }
	
	 public function getidopd($id)
    {
        $query = $this->db->select("id_opd")->from("tab_pns")->where("id",$id)->get();
        $idopd = $query->result_array();
        return $idopd[0];
    }
	 public function getOpdPns($id)
    {
        $query = $this->db->select("id_opd")->from("tab_pns")->where("id",$id)->get();
        $idopd = $query->result();
        return $idopd[0];
    }

}