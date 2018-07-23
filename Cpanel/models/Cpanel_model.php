<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cpanel_model extends CI_Model
{
  function __construct()
  {
      parent::__construct();
  }
  function addprgrm(){
    $json_string = 'http://192.168.10.5:8080/mpgrm/22384ee59631a5a61ce3386af63c094b/2018';
		$jsondata = file_get_contents($json_string);
		$obj = json_decode($jsondata, true);
		foreach ($obj['DATA'] as $row) {
			$data[] = array(
	                  "idprgrm"  =>  $row['IDPRGRM'],
	                  "nmprgrm"    =>  $row['NMPRGRM']
	          );
		}
    $this->db->trans_start();
    $this->db->insert_batch('mpgrm', $data);
    $this->db->trans_complete();
    return ($this->db->affected_rows()!=1)?false:true;
	
  }
  function adddaftunit(){
    $json_string = 'http://192.168.10.5:8080/daftunit/22384ee59631a5a61ce3386af63c094b/2018';
		$jsondata = file_get_contents($json_string);
		$obj = json_decode($jsondata, true);
		foreach ($obj['DATA'] as $row) {
			$data[] = array(
	                  "unitkey"  =>  $row['UNITKEY'],
	                  "nmunit"    =>  $row['NMUNIT']
	          );
		}
    $this->db->trans_start();
    $this->db->insert_batch('daftunit', $data);
    $this->db->trans_complete();
    return ($this->db->affected_rows()!=1)?false:true;
  }
  function addmkegiatan(){
    $json_string = 'http://192.168.10.5:8080/mkegiatan/22384ee59631a5a61ce3386af63c094b/2018';
		$jsondata = file_get_contents($json_string);
		$obj = json_decode($jsondata, true);
		foreach ($obj['DATA'] as $row) {
			$data[] = array(
	                  "nmkegunit"  =>  $row['NMKEGUNIT'],
	                  "kdkegunit"    =>  $row['KDKEGUNIT'],
					  "idprgrm"    =>  $row['IDPRGRM']
	          );
		}
    $this->db->trans_start();
    $this->db->insert_batch('mkegiatan', $data);
    $this->db->trans_complete();
    return ($this->db->affected_rows()!=1)?false:true;
  }
  function adddpa21(){
    $json_string = 'http://192.168.10.5:8080/dpa21/22384ee59631a5a61ce3386af63c094b/2018';
		$jsondata = file_get_contents($json_string);
		$obj = json_decode($jsondata, true);
		foreach ($obj['DATA'] as $row) {
			$data[] = array(
	                  "nilai"  =>  $row['NILAI'],
	                  "mtgkey"    =>  $row['MTGKEY'],
					  "unitkey"    =>  $row['UNITKEY']
	          );
		}
    $this->db->trans_start();
    $this->db->insert_batch('dpa21', $data);
    $this->db->trans_complete();
    return ($this->db->affected_rows()!=1)?false:true;
  }
  function addmatangr(){
    $json_string = 'http://192.168.10.5:8080/matangr/22384ee59631a5a61ce3386af63c094b/2018';
		$jsondata = file_get_contents($json_string);
		$obj = json_decode($jsondata, true);
		foreach ($obj['DATA'] as $row) {
			$data[] = array(
	                  "nmper"  =>  $row['NMPER'],
	                  "kdper"    =>  $row['KDPER'],
					  "mtgkey"    =>  $row['MTGKEY'],
					  "mtglevel"    =>  $row['MTGLEVEL'],
					  "type"    =>  $row['TYPE']
	          );
		}
    $this->db->trans_start();
    $this->db->insert_batch('matangr', $data);
    $this->db->trans_complete();
    return ($this->db->affected_rows()!=1)?false:true;
  }
  function adddpa211(){
    $json_string = 'http://192.168.10.5:8080/dpa211/22384ee59631a5a61ce3386af63c094b/2018';
		$jsondata = file_get_contents($json_string);
		$obj = json_decode($jsondata, true);
		foreach ($obj['DATA'] as $row) {
			$data[] = array(
	                  "satuan"  =>  $row['SATUAN'],
	                  "subtotal"    =>  $row['SUBTOTAL'],
					  "mtgkey"    =>  $row['MTGKEY'],
					  "jumbyek"    =>  $row['JUMBYEK'],
					  "unitkey"    =>  $row['UNITKEY'],
					  "uraian"    =>  $row['URAIAN'],
					  "tarif"    =>  $row['TARIF'],
					  "kdjabar"    =>  $row['KDJABAR'],
					  "type"    =>  $row['TYPE']
	          );
		}
    $this->db->trans_start();
    $this->db->insert_batch('dpa211', $data);
    $this->db->trans_complete();
    return ($this->db->affected_rows()!=1)?false:true;
  }
  function adddpa22(){
    $json_string = 'http://192.168.10.5:8080/dpa22/22384ee59631a5a61ce3386af63c094b/2018';
		$jsondata = file_get_contents($json_string);
		$obj = json_decode($jsondata, true);
		foreach ($obj['DATA'] as $row) {
			$data[] = array(
	                  "nilai"  =>  $row['NILAI'],
	                  "kdkegunit"    =>  $row['KDKEGUNIT'],
					  "mtgkey"    =>  $row['MTGKEY'],
					  "unitkey"    =>  $row['UNITKEY']
					 
	          );
		}
    $this->db->trans_start();
    $this->db->insert_batch('dpa22', $data);
    $this->db->trans_complete();
    return ($this->db->affected_rows()!=1)?false:true;
  }
  public function jika_prgrm($idprgrm, $nmprgrm){
        
        $data = $this->db->get_where('mpgrm', array('idprgrm' => $idprgrm, 'nmprgrm' => $nmprgrm))->row();
        return $data;
    }

  public function jika_daftunit($unitkey, $nmunit){
        
        $data = $this->db->get_where('daftunit', array('unitkey' => $unitkey, 'nmunit' => $nmunit))->row();
        return $data;
    }	
  
  public function jika_kegiatan($nmkegunit, $kdkegunit, $idprgrm){
        
        $data = $this->db->get_where('mkegiatan', array('nmkegunit' => $namakegunit, 'kdkegunit' => $kdkegunit, 'idprgrm' => $idprgrm))->row();
        return $data;
    }	
  
  public function jika_dpa21($nilai, $mtgkey, $unitkey){
        
        $data = $this->db->get_where('dpa21', array('nilai' => $nilai, 'mtgkey' => $mtgkey, 'unitkey' => $unitkey))->row();
        return $data;
    }	
  
  public function jika_dpa22($nilai, $kdkegunit, $mtgkey, $unitkey){
        
        $data = $this->db->get_where('dpa22', array('nilai' => $nilai, 'kdkegunit' => $kdkegunit, 'mtgkey' => $mtgkey, 'unitkey' => $unitkey))->row();
        return $data;
    }	
  
  
}
