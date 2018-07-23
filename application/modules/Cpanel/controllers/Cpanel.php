<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpanel extends MX_Controller {

	public function __construct()
	{
		parent::__construct();

		 $this->load->model(array('Cpanel_model'));
	}
	public function index()
	{

	}

	function apiprgrm(){
		$result=$this->Cpanel_model->addprgrm();
	  echo $result;

	}
	function apidaftunit(){
		$result=$this->Cpanel_model->adddaftunit();
	  echo $result;

	}
	function apimkegiatan(){
		$result=$this->Cpanel_model->addmkegiatan();
	  echo $result;

	}
	function apidpa21(){
		$result=$this->Cpanel_model->adddpa21();
	  echo $result;

	}
	function apimatangr(){
		$result=$this->Cpanel_model->addmatangr();
	  echo $result;

	}
	function apidpa211(){
		$result=$this->Cpanel_model->adddpa211();
	  echo $result;

	}
	function apidpa22(){
		$result=$this->Cpanel_model->adddpa22();
	  echo $result;

	}

}
