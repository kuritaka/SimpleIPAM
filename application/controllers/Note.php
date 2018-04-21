<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Note extends CI_Controller {

	public function index()
	{
                $this->load->helper('url');

		$data['title'] = 'SimpleIPAM IP List';
		$this->load->view('template/header', $data);
		$this->load->view('result');
		$this->load->view('template/footer');
	}
}
