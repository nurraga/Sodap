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
		if (!$this->ion_auth->logged_in()) {
				// redirect them to the login page
				redirect('Home/login', 'refresh');
		}	elseif ($this->ion_auth->is_admin()) {
			$this->template->load('template','dashboard');
		} else {
			redirect('Home', 'refresh');
		}
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
