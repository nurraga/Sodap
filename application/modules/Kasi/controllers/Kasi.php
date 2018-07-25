<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasi extends MX_Controller
{
    public $data;

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->model('kasi_model');
        $this->load->helper('form', 'url', 'language');
        $this->load->helper('directory');
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
       
    }

    public function index()
    {

        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('Home/login', 'refresh');
        } elseif ($this->ion_auth->is_kasi()) // remove this elseif if you want to enable this for non-admins
        {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');


            $this->data['users'] = $this->ion_auth->users()->result();
            foreach ($this->data['users'] as $k => $user) {
                $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
            }
            $id = $this->ion_auth->user()->row()->id_pns;
           
            $this->template->load('temp_kasi', 'v_home', $this->data);
        } else {
            redirect('Home', 'refresh');
        }
    }

    public function list1()
    {
        $id = $this->ion_auth->user()->row()->id_pns;
        $this->template->load('temp_kasi', 'v_list');
    }


    public function logout()
    {
        $this->data['title'] = "Logout";

        // log the user out
        $logout = $this->ion_auth->logout();

        // redirect them to the login page
        $this->session->set_flashdata('message', $this->ion_auth->messages());
        redirect('Home', 'refresh');
    }

   public function entri()
   
    { 
        $id = $this->ion_auth->user()->row()->id_pns;
        $data['opd'] = $this->kasi_model->getopd();
		$data['unit'] = $this->kasi_model->getunit();
		$data['tahun'] = $this->kasi_model->gettahun();
		$data['matangr'] = $this->kasi_model->getmatangr();
        $idopd = implode(':', $this->kasi_model->getidopd($id));
        $data['pns'] = $this->kasi_model->getPns();
        $data['pnse12'] = $this->kasi_model->getPnsE12();
        $this->template->load('temp_kasi', 'entri',$data);
    }
	public function php_info()
    {
        echo phpinfo();
    }

}