<?php
class View extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    function index(){
        $data['title'] = "MyTitle";
        $data['now_time'] = date("H:i:s");
        $this->load->view('view', $data);
    }
}
?>
