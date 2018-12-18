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
       if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('Home/login', 'refresh');
        } elseif ($this->ion_auth->is_kasi()) 
        {
          
        } else {
            redirect('Home', 'refresh');
        }
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
            $id = $this->ion_auth->user()->row()->username;
            $this->template->load('temp_kasi', 'v_home', $this->data);
        } else {
            redirect('Home', 'refresh');
        }
    }


     public function laporan_kegiatan()
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
            $id = $this->ion_auth->user()->row()->username;
           // $id_unit = $this->kasi_model->get_id_unit($id);
            $this->data['nmunit'] = $this->kasi_model->get_id_unit($id);
             $this->data['jabatan'] = $this->kasi_model->get_jabatan($id);
        //  $this->data['namaunit'] = $this->kasi_model->get_namaunit($id_unit['unitkey']);
           /*   $this->data['tahun'] = $this->kasi_model->gettahun($id);*/
            $this->template->load('temp_kasi', 'v_list_kegiatan', $this->data);
        } else {
            redirect('Home', 'refresh');
        }
    }
      public function json_view_kasikegiatan()
    {
        header('Content-Type: application/json');
        $id = $this->ion_auth->user()->row()->username;
        echo $this->kasi_model->json($id);
    }
public function json_view_keuangan()
    {
        header('Content-Type: application/json');
        $id = $this->ion_auth->user()->row()->username;
        echo $this->kasi_model->json_keuangan($id);
    }
    public function detail($id)
    {

       $id2 = $this->ion_auth->user()->row()->username;
       $row = $this->kasi_model->getdetail($id, $id2);
       $data['jan']= $this->kasi_model->vuang1 ($id);
       $data['feb']= $this->kasi_model->vuang2 ($id);
       $data['mar']= $this->kasi_model->vuang3 ($id);        
       $data['apr']= $this->kasi_model->vuang4 ($id);
       $data['mei']= $this->kasi_model->vuang5 ($id);
       $data['jun']= $this->kasi_model->vuang6 ($id);
       $data['jul']= $this->kasi_model->vuang7 ($id);
       $data['agus']= $this->kasi_model->vuang8 ($id);
       $data['sep']= $this->kasi_model->vuang9 ($id);
       $data['oct']= $this->kasi_model->vuang10 ($id);
       $data['nov']= $this->kasi_model->vuang11 ($id);
       $data['des']= $this->kasi_model->vuang12 ($id);
     //  $id_opd = $this->kasi_model->get_id_opd($id2);
       if ($row) {
            $data = array(
                 'id' => $row->id,
                 'nmkegunit' => $row->nmkegunit,
               //  'idpnsppk' => $row->idpnsppk,
                 'namaunit' => $row->namaunit,
            //     'jabatan' => $row->jabatan,
                 'tahun' => $row->tahun,
              //   'idpnsppk' => $row->namappk,
                 'nilai' => $row->nilai
            );
   // $data['targetkeuangan'] = $this->kasi_model->getuang($row);    
     /* $data['namappk'] = $this->kasi_model->getnamappk($id2);*/
     /*  $data['namaunit'] = $this->kasi_model->get_namaunit($id_opd['unitkey']);
      */
 //$data['tahun'] = $this->kasi_model->gettahunid($id2);
      
            $this->template->load('temp_kasi', 'v_read_keuangan', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Kasi'));
        }
    
    }

    public function ambildata($id){
        //$idpnspptk = $this->ion_auth->user()->row()->username;

        $kdkegunit = $this->kasi_model->getkdkegunit($idpptk);
        $datauang = $this->kasi_model->ambildata($id, $kdkegunit);
        echo json_encode($datauang);
    }
      public function editdata(){
        $result = $this->kasi_model->editdata();
        echo json_encode($result);
    }   

    public function fisik($id)
    {

       $id2 = $this->ion_auth->user()->row()->username;
       $row = $this->kasi_model->getfisik($id, $id2);

      // $id_opd = $this->kasi_model->get_id_opd($id2);
       if ($row) {
            $data = array(
                 'id' => $row->id,
                 'nmkegunit' => $row->nmkegunit,
                // 'idpnsppk' => $row->idpnsppk,
                
                 'tahun' => $row->tahun,
                 'namaunit' => $row->namaunit,
                 'nilai' => $row->nilai
            );
     /*   $data['namappk'] = $this->kasi_model->getnamappk($id);*/
      /* $data['namaunit'] = $this->kasi_model->get_namaunit($id_opd['unitkey']);
       $data['jabatan_user'] = $this->kasi_model->getjabatanuser($id2);*/
     //  $data['tahun'] = $this->kasi_model->gettahunid($id2);
      
            $this->template->load('temp_kasi', 'v_read_fisik', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Kasi'));
        }
    
    }
    public function realisasi($id)
    {

       $id2 = $this->ion_auth->user()->row()->username;
       $row = $this->kasi_model->getdetail($id, $id2);
     //  $id_opd = $this->kasi_model->get_id_opd($id2);
       if ($row) {
            $data = array(
                 'id' => $row->id,
                 'nmkegunit' => $row->nmkegunit,
                /* 'idpnsppk' => $row->idpnsppk,
                 'jabatan' => $row->jabatan,*/
                 'tahun' => $row->tahun,
                 'namaunit' => $row->namaunit,
                 'nilai' => $row->nilai
            );
      /* $data['namaunit'] = $this->kasi_model->get_namaunit($id_opd['unitkey']);
       $data['jabatan_user'] = $this->kasi_model->getjabatanuser($id2);
       $data['tahun'] = $this->kasi_model->gettahunid($id2);*/
      
            $this->template->load('temp_kasi', 'v_read_realisasi', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Kasi'));
        }
    
    }


    function daftarkegiatan(){
        if (!$this->ion_auth->logged_in()){
            redirect('Home/login', 'refresh');
        }elseif ($this->ion_auth->is_kasi()){  
          
            $nip=$this->ion_auth->user()->row()->username;
           /* $rowunit=$this->kasi_model->getpns($nip);
            $idunit=$rowunit->unitkey;*/
           $datakegiatan =$this->kasi_model->daftarkegiatan($nip);
           if($datakegiatan){
                 $this->data= array(
                     
                    'list'     =>  $datakegiatan
                   
                 );
            }            
        }else{
            redirect('Kasi', 'refresh');
        }   
    $this->template->load('temp_kasi','v_daftarkegiatan',$this->data);
     } 











public function ambildatafisik(){

        
        $datauang = $this->kasi_model->ambildatafisik()->result();
        echo json_encode($datauang);
    }
     





  /*  public function ambildata(){
        $idpnspptk = $this->ion_auth->user()->row()->username;
        $kdkegunit = $this->kasi_model->getkdkegunit($idpnspptk);
        $datauang = $this->kasi_model->ambildata($kdkegunit, $idpnspptk);
        echo json_encode($datauang);
    }
    public function ambildatafisik(){

        
        $datauang = $this->kasi_model->ambildatafisik()->result();
        echo json_encode($datauang);
    }
     
     public function editdata(){
        $result = $this->kasi_model->editdata();
        echo json_encode($result);
    }
     
    public function updatedata(){
        $result = $this->kasi_model->updatedata();
        $msg['success'] = false;
        if ($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }


    public function getpns($idopd)
    {
        
        $data = $this->kasi_model->getpnsnip($idopd);
        echo json_encode($data);
    }

    
   public function entri()
    { 
        $id = $this->ion_auth->user()->row()->username;
        $id_opd = $this->kasi_model->get_id_opd($id);
        $data['tahun'] = $this->kasi_model->gettahun();
        $data['matangr'] = $this->kasi_model->getmatangr();
        $data['mpgrm'] = $this->kasi_model->getmpgrm();
        $data['pns'] = $this->kasi_model->get_pns_by_opd($id_opd['unitkey']);
        $data['kasi'] = $this->kasi_model->getpnskasi($id_opd['unitkey']);
        $data['eselon'] = $this->kasi_model->getpnsbyeselon($id_opd['unitkey']);
        $data['namaunit'] = $this->kasi_model->get_namaunit($id_opd['unitkey']);
        $data['mkeg'] = $this->kasi_model->getkegiatan($id_opd['unitkey']);
        //$data['namakeg'] = $this->kasi_model->getnamakeg($id_opd['kdkegunit']);
        $datakodekegunit = $this->kasi_model->getkegiatan($id_opd['unitkey']);
        $datakodekegunitnilai = $this->kasi_model->getnilai($id_opd['unitkey']);
        for($i=0;$i<count($datakodekegunit);$i++)
        {
            $kodekegunit[$i] = $datakodekegunit[$i]['kdkegunit'];
            $kodekegunit1[$i] = $datakodekegunitnilai[$i]['nilai'];
        }

        $jumlahkodekegunit = count($kodekegunit);
        for($i=0;$i<$jumlahkodekegunit;$i++)
        {
            $datakegunit[$i] = $this->kasi_model->getnamakeg($kodekegunit[$i]);
        }
        $data['datakegunit']  = $datakegunit;
        $data['datakegunit1']  = $kodekegunit1;
        
        
        //echo json_encode ($this->kasi_model->get_namaunit($id_opd['unitkey']));
        $this->template->load('temp_kasi', 'entri',$data);
    }


    public function list1()
    {
       $id = $this->ion_auth->user()->row()->username;
       $id_opd = $this->kasi_model->get_id_opd($id);
       $data['namaunit'] = $this->kasi_model->get_namaunit($id_opd['unitkey']);
       $data['jabatan_user'] = $this->kasi_model->getjabatanuser($id);
       $data['tahun'] = $this->kasi_model->gettahun();
       $data['idpptk'] = $this->kasi_model->getkegiatanpptk($id_opd['unitkey']);
       $datakodekegunit = $this->kasi_model->getkegiatanpptk($id);
       if($datakodekegunit!=NULL){
         for($i=0;$i<count($datakodekegunit);$i++)
        {
            $kodekegunit[$i] = $datakodekegunit[$i]['kdkegunit'];
            $kodekegunit1[$i] = $datakodekegunit[$i]['nilai'];
        }
        
        $jumlahkodekegunit = count($kodekegunit);
        for($i=0;$i<$jumlahkodekegunit;$i++)
        {
            $datakegunit[$i] = $this->kasi_model->getnamakeg($kodekegunit[$i]);
        }
        $data['datakegunit']  = $datakegunit;
        $data['datakegunit1']  = $kodekegunit1;
        $this->template->load('temp_kasi', 'v_list', $data);
        }else{
                $data['datakegunit']  = NULL;
                $data['datakegunit1']  = NULL;
        $this->template->load('temp_kasi', 'v_list', $data);
             }
      
    }
    
      public function laporan_kegiatan()
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
            $id = $this->ion_auth->user()->row()->username
            //$id_opd = $this->kasi_model->get_id_opd($id);
            $this->data['namaunit'] = $this->kasi_model->get_namaunit($id_opd['unitkey']);
            $this->data['jabatan_user'] = $this->kasi_model->getjabatanuser($id);
            $this->data['tahun'] = $this->kasi_model->gettahunid($id);
            $this->data['idpptk'] = $this->kasi_model->getkegiatanpptk($id_opd['unitkey']);
           
            $this->template->load('temp_kasi', 'v_list_laporan', $this->data);
        } else {
            redirect('Home', 'refresh');
        }
    }

    
    public function detail($id)
    {

       $id2 = $this->ion_auth->user()->row()->username;
       $row = $this->kasi_model->getdetail($id, $id2);
       $id_opd = $this->kasi_model->get_id_opd($id2);
       if ($row) {
            $data = array(
                 'idpptk' => $row->idpptk,
                 'nmkegunit' => $row->nmkegunit,
                 'idpnsppk' => $row->idpnsppk,
                 'tahun' => $row->tahun,
                 'idpnsppk' => $row->namappk,
                 'nilai' => $row->nilai
            );
       $data['namaunit'] = $this->kasi_model->get_namaunit($id_opd['unitkey']);
       $data['jabatan_user'] = $this->kasi_model->getjabatanuser($id2);
 $data['tahun'] = $this->kasi_model->gettahunid($id2);
      
            $this->template->load('temp_kasi', 'v_read_keuangan', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Kasi'));
        }
    
    }


public function fisik($id)
    {

       $id2 = $this->ion_auth->user()->row()->username;
       $row = $this->kasi_model->getdetail($id, $id2);
       $id_opd = $this->kasi_model->get_id_opd($id2);
       if ($row) {
            $data = array(
                 'idpptk' => $row->idpptk,
                 'nmkegunit' => $row->nmkegunit,
                 'idpnsppk' => $row->idpnsppk,
                 'tahun' => $row->tahun,
                 'idpnsppk' => $row->namappk,
                 'nilai' => $row->nilai
            );
       $data['namaunit'] = $this->kasi_model->get_namaunit($id_opd['unitkey']);
       $data['jabatan_user'] = $this->kasi_model->getjabatanuser($id2);
       $data['tahun'] = $this->kasi_model->gettahunid($id2);
      
            $this->template->load('temp_kasi', 'v_read_fisik', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Kasi'));
        }
    
    }



public function realisasi($id)
    {

       $id2 = $this->ion_auth->user()->row()->username;
       $row = $this->kasi_model->getdetail($id, $id2);
       $id_opd = $this->kasi_model->get_id_opd($id2);
       if ($row) {
            $data = array(
                 'idpptk' => $row->idpptk,
                 'nmkegunit' => $row->nmkegunit,
                 'idpnsppk' => $row->idpnsppk,
                 'tahun' => $row->tahun,
                 'idpnsppk' => $row->namappk,
                 'nilai' => $row->nilai
            );
       $data['namaunit'] = $this->kasi_model->get_namaunit($id_opd['unitkey']);
       $data['jabatan_user'] = $this->kasi_model->getjabatanuser($id2);
       $data['tahun'] = $this->kasi_model->gettahunid($id2);
      
            $this->template->load('temp_kasi', 'v_read_realisasi', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Kasi'));
        }
    
    }



     
    
    

    public function simpan()
    {        
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
                //$this->kasi_model->insert_pptk($datasimpan[$i]); 
                
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
                );
        $this->kasi_model->insert_pptk($datasimpan[$i]); 
            }
            }
        
                //  echo json_encode ($this->input->post('kegiatan[]'));
                //  echo json_encode ($this->input->post('pilihpnspptk[]'));

        {
        redirect(site_url('Kasi/entri'));
        }  
            
    }
    */
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
        redirect('Kasi', 'refresh');
    }
    
    
}