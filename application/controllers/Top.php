<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Top extends CI_Controller {


	function __construct() {
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


	public function index()
	{
		$data["host_name"]="";     //this is form in header

		$data['title'] = 'SimpleIPAM Top';
		$this->load->view('template/header', $data);
		$this->load->view('top_view');
		$this->load->view('template/footer');


	}

	
/*
	public function result()
	{
		$data['title'] = 'SimpleIPAM Top';
		$this->load->view('template/header', $data);
		$this->load->view('result');
		$this->load->view('template/footer');
	}
	public function note()
	{
		$data['title'] = 'SimpleIPAM Top';
		$this->load->view('template/header', $data);
		$this->load->view('note');
		$this->load->view('template/footer');
	}
*/
}
