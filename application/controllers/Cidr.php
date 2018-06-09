<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Cidr
 */
class Cidr extends CI_Controller
{

    /**
     * Cidr constructor.
     */
    function __construct()
    {
        parent::__construct();
        //helper
        $this->load->helper('url');
        $this->load->helper('form');
        //$this->load->helper('myip');

        //library
        //$this->load->library('session');
        //$this->load->library('csvimport');
        //$this->load->library('pagination');

        //model
        //$this->load->model('Ipam');
    }

    /**
     *
     */
    public function index()
    {
        $data["host_name"] = "";     //this is form in header

        $data['title'] = 'SimpleIPAM Cidr Note';
        $this->load->view('template/header', $data);
        $this->load->view('cidr_view');
        $this->load->view('template/footer');
    }

}
