<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Api extends REST_Controller
{
    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->model('api_model');
        //$this->load->library('ion_auth');
    }

    public function datapns_get()
    {
        $query = $this->db->query('select * from tab_pns')->result();
        foreach ($query as $hasil)
        {
            $this->response($query,REST_Controller::HTTP_OK);
        }
    }

    public function insertdatapns_post()
    {
        $data = array(
            "NMPRGRM" => $this->post('NMPRGRM'),
            "IDPRGRM" => $this->post('IDPRGRM'),
           
        );
        $this->db->insert('coba',$data);
    }

    public function cobadatapns_get()
    {
        echo ''.
        '<html>'.
        '<head>'.
            '<title></title>'.
            '</head>'.
            '<body>'.
                '<div id="coba"></div>'.
            '</body>'.
        '</html>'.
        '<script src="' . base_url("assets/admin-panel/plugins/jQuery/jquery-2.2.3.min.js") . '"></script>'.
        '<script src="' . base_url("assets/admin-panel/bootstrap/js/bootstrap.js") . '"></script>'.
        '<script type="application/javascript">'.
            'window.onload = $(document).ready(function () {'.
            '$.ajax({'.
                'type: "get",'.
                'url: "http://192.168.10.5:8080/mpgrm/22384ee59631a5a61ce3386af63c094b/2018",'.
                'success: function (data) {'.
                    '
                    var databaru = [];
                    for(i=0;i<data.length;i++)
                    {
                        databaru[i]=
                            {"NMPRGRM":data[i].NMPRGRM,"IDPRGRM":data[i].IDPRGRM}
                        ;
                         $.ajax({
                            type: "post",
                            data:databaru[i],
                            dataType: "JSON",
                            url: "insertdatapns",
                            success: function (data) {
                            },
                            error: function () {
                                //do nothing
                            }
                          })
                    }'.
                '},'.
                'error: function () {'.
                //do nothing
                '}'.
            '})});'.
        '</script>'
        ;
    }
}