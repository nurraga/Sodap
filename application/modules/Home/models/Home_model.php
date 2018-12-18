<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home_model extends CI_Model
{
    public $tb_opd = 'm_opd';
 public $tb_pns = 'tab_pns';
  public $id_opd_pns = 'id_opd';
   public $id_pns = 'id';
    function __construct()
    {
        parent::__construct();
    }



    public function get_namaopd()
    {
        $this->db->select('id_opd as kd,nama_opd as nm');
        $this->db->from($this->tb_opd);
        return $this->db->get()->result();
    }
    public function get_namapns($id)
    {
        $this->db->select('id as kd,nip,nama as nm');
        $this->db->from($this->tb_pns);
        $this->db->where($this->id_opd_pns, $id);
        return $this->db->get()->result();
    }
    public function getpns_byid($id)
    {
        $this->db->where($this->id_pns, $id);
        return $this->db->get($this->tb_pns)->result();
    }
}