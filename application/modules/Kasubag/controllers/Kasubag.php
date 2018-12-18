<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasubag extends MX_Controller
{
    public $data;

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->model('kasubag_model');
        $this->load->helper('form', 'url', 'language');
        $this->load->helper('directory');
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
       if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('Home/login', 'refresh');
        } elseif ($this->ion_auth->is_kasubag()) // remove this elseif if you want to enable this for non-admins
        {
            // continue to the requested url
        } else {
            redirect('Home', 'refresh');
        }
    }


    public function index()
    {

        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('Home/login', 'refresh');
        } elseif ($this->ion_auth->is_kasubag()) // remove this elseif if you want to enable this for non-admins
        {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');


            $this->data['users'] = $this->ion_auth->users()->result();
            foreach ($this->data['users'] as $k => $user) {
                $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
            }
            $id = $this->ion_auth->user()->row()->id_pns;
           
            $this->template->load('temp_kasubag', 'v_home', $this->data);
        } else {
            redirect('Home', 'refresh');
        }
    }
    function g_kegiatan(){
    	header('Content-Type: application/json');
    	echo $this->Cpanel_model->g_kegiatan();
  	}
     
	public function getpns($idopd)
	{
		
		$data = $this->kasubag_model->getpnsnip($idopd);
		echo json_encode($data);
	}

    public function entri()
   
    { 
        $id = $this->ion_auth->user()->row()->id_pns;
		$id_opd = $this->kasubag_model->get_id_opd($id);
		$data['tahun'] = $this->kasubag_model->gettahun();
		$data['matangr'] = $this->kasubag_model->getmatangr();
		$data['mpgrm'] = $this->kasubag_model->getmpgrm();
		$data['pns'] = $this->kasubag_model->get_pns_by_opd($id_opd['unitkey']);
		$data['kasi'] = $this->kasubag_model->getpnskasi($id_opd['unitkey']);
		$data['eselon'] = $this->kasubag_model->getpnsbyeselon($id_opd['unitkey']);
		$data['namaunit'] = $this->kasubag_model->get_namaunit($id_opd['unitkey']);
		$data['mkeg'] = $this->kasubag_model->getkegiatan($id_opd['unitkey']);
		//$data['namakeg'] = $this->kasubag_model->getnamakeg($id_opd['kdkegunit']);
		$datakodekegunit = $this->kasubag_model->getkegiatan($id_opd['unitkey']);
		$datakodekegunitnilai = $this->kasubag_model->getnilai($id_opd['unitkey']);
		for($i=0;$i<count($datakodekegunit);$i++)
		{
			$kodekegunit[$i] = $datakodekegunit[$i]['kdkegunit'];
			$kodekegunit1[$i] = $datakodekegunitnilai[$i]['nilai'];
		}

		$jumlahkodekegunit = count($kodekegunit);
		for($i=0;$i<$jumlahkodekegunit;$i++)
		{
			$datakegunit[$i] = $this->kasubag_model->getnamakeg($kodekegunit[$i]);
		}
		$data['datakegunit']  = $datakegunit;
		$data['datakegunit1']  = $kodekegunit1;
		
		
		//echo json_encode ($this->kasubag_model->get_namaunit($id_opd['unitkey']));
		$this->template->load('temp_kasubag', 'entri',$data);
    }



	public function list1()
    {
       $id = $this->ion_auth->user()->row()->id_pns;
	   $id_opd = $this->kasubag_model->get_id_opd($id);
	   $data['namaunit'] = $this->kasubag_model->get_namaunit($id_opd['unitkey']);
	   $data['jabatan_user'] = $this->kasubag_model->getjabatanuser($id);
	   $data['tahun'] = $this->kasubag_model->gettahun();
	   $data['idpptk'] = $this->kasubag_model->getkegiatanpptk($id_opd['unitkey']);
       $datakodekegunit = $this->kasubag_model->getkegiatanpptk($id);
	   if($datakodekegunit!=NULL){
		 for($i=0;$i<count($datakodekegunit);$i++)
		{
			$kodekegunit[$i] = $datakodekegunit[$i]['kdkegunit'];
			$kodekegunit1[$i] = $datakodekegunit[$i]['nilai'];
		}
		
		$jumlahkodekegunit = count($kodekegunit);
		for($i=0;$i<$jumlahkodekegunit;$i++)
		{
			$datakegunit[$i] = $this->kasubag_model->getnamakeg($kodekegunit[$i]);
		}
		$data['datakegunit']  = $datakegunit;
		$data['datakegunit1']  = $kodekegunit1;
		$this->template->load('temp_kasubag', 'v_list', $data);
	    }else{
				$data['datakegunit']  = NULL;
				$data['datakegunit1']  = NULL;
				$this->template->load('temp_kasubag', 'v_list', $data);
			 }
	  
    }

	public function simpan()
    {     
     	$id = $this->ion_auth->user()->row()->id_pns;   
		$jumlahpnspptk = count($this->input->post('pilihpnspptk[]'));
		for ($i=0; $i<$jumlahpnspptk;$i++)
			{
				//$datasimpan[$i] = array(
				//'idpns' => $this->input->post('pilihpns'),
				//'unitkey' => $this->input->post('namaunit'),	
				//'kdkegunit' => $this->input->post('kegiatan['.$i.']'), 
				//'tahun' => $this->input->post('tahun'),	
				//'idpnspptk' => $this->input->post('pilihpnspptk['.$i.']'),
				//'idpnsppk' => $this->input->post('pilihpnsppk['.$i.']'),			
				//);
				//$this->kasubag_model->insert_pptk($datasimpan[$i]); 
				
		if($this->input->post('pilihpnspptk['.$i.']')!=NULL)
			{
				$datasimpan[$i] = array(
				'idpns' => $this->input->post('pilihpns'),
				'unitkey' => $this->input->post('namaunit'),	
				'kdkegunit' => $this->input->post('kegiatan['.$i.']'), 
				'tahun' => $this->input->post('tahun'),	
				'nilai' => $this->input->post('nilai['.$i.']'),	
				'idpnspptk' => $this->input->post('pilihpnspptk['.$i.']'),
				'idpnsppk' => $this->input->post('pilihpnsppk['.$i.']'),	
				"status" => 0,
				'idpns' =>	$id,		
				);
		$this->kasubag_model->insert_pptk($datasimpan[$i]); 
			}
			}
		
				//	echo json_encode ($this->input->post('kegiatan[]'));
				//	echo json_encode ($this->input->post('pilihpnspptk[]'));

		{
		redirect(site_url('Kasubag/entri'));
		}  
			
	}
	
	public function php_info()
    {
        echo phpinfo();
    }
 
	public function logout()
    {
        $this->data['title'] = "Logout";
        // log the user out
        $logout = $this->ion_auth->logout();
        // redirect them to the login page
        $this->session->set_flashdata('message', $this->ion_auth->messages());
        redirect('Kasubag', 'refresh');
    }
	
	
}