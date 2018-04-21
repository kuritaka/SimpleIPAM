<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bootstrap extends CI_Controller {
	//indexページ
	public function index(){
		$this->load->view('boost');
	}
}
