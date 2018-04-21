<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hosts extends CI_Controller {


    function __construct() {
        parent::__construct();
        //helper
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('myip');
        //$this->load->helper(array('form','url'));
        
        //library
		$this->load->library('session');
        $this->load->library('csvimport');
        $this->load->library('pagination');

        //model
        //$this->load->database();
        $this->load->model('Ipam');
    }


	public function index()
	{

        $data["host_name"]="";

        //pagination settings
        $config['base_url'] = site_url("hosts/search/NIL");
        $config['total_rows'] = $this->db->count_all('hosts');
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = "5";
        $config["uri_segment"] = 4;
        $choice = $config["total_rows"]/$config["per_page"];
        $config["num_links"] = floor($choice);

        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // get hosts list
        $data['hosts'] = $this->Ipam->get_hosts($config["per_page"], $data['page'], NULL);

        $data['pagination'] = $this->pagination->create_links();
        
        //$data['hosts'] =$this->Ipam->get_all_hosts();

        $data['total_rows'] = $config['total_rows'];
        $data['start'] = $data['page'] + 1;
        $data['end'] = $data['start'] + $config['per_page'] - 1 ;

		$data['title'] = 'SimpleIPAM Hosts';
		$this->load->view('template/header', $data);
		$this->load->view('hosts_view');
		$this->load->view('template/footer');
	}


    function search()
    {
        $data["host_name"]="";    //this is form in header
        //input search
        // post
        $search = ($this->input->post("host_name"))? $this->input->post("host_name") : "NIL";
        // get
        $search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;
        // url encode for japanese
        $search= urldecode($search);

        
        empty($search) ? $data["host_name"]="" : $data["host_name"]=$search;
        if($search == "NIL" ){ $data["host_name"]=""; }


        // pagination settings
        $config = array();
        $config['base_url'] = site_url("hosts/search/$search");
        $config['total_rows'] = $this->Ipam->get_hosts_count($search);
        $config['per_page'] = "5";
        $config["uri_segment"] = 4;
        $choice = $config["total_rows"]/$config["per_page"];
        $config["num_links"] = floor($choice);

        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        // get netwroks list
        $data['hosts'] = $this->Ipam->get_hosts($config['per_page'], $data['page'], $search);

        $data['pagination'] = $this->pagination->create_links();

        $data['total_rows'] = $config['total_rows'];
        $data['start'] = $data['page'] + 1;
        $data['end'] = $data['start'] + $config['per_page'] - 1 ;


        //load view
		$data['title'] = 'SimpleIPAM Hosts';
		$this->load->view('template/header', $data);
		$this->load->view('hosts_view', $data );
		$this->load->view('template/footer' );
    }

	
	public function hosts_add()
	{
        $this->_validate();
		$data = array(
				'ip_address' => $this->input->post('ip_address'),
				'cidr' => $this->input->post('cidr'),
				'hostname' => $this->input->post('hostname'),
				'model' => $this->input->post('model'),
				'note' => $this->input->post('note'),
			);
		$insert = $this->Ipam->hosts_add($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_edit($id)
	{
		$data = $this->Ipam->hosts_get_by_id($id);

		echo json_encode($data);
	}


	public function hosts_update()
	{
    $this->_validate();
	$data = array(
		'ip_address' => $this->input->post('ip_address'),
		'cidr' => $this->input->post('cidr'),
		'hostname' => $this->input->post('hostname'),
		'model' => $this->input->post('model'),
		'note' => $this->input->post('note'),
		);
	$this->Ipam->hosts_update(array('id' => $this->input->post('id')), $data);
	echo json_encode(array("status" => TRUE));
	}


	public function hosts_delete($id)
	{
		$this->Ipam->hosts_delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}



    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('ip_address') == '')
        {
            $data['inputerror'][] = 'ip_address';
            $data['error_string'][] = 'IP Address is required';
            $data['status'] = FALSE;
        }


        $cidr=$this->input->post('cidr');
        if (!is_numeric($cidr))
        {
            $data['inputerror'][] = 'cidr';
            $data['error_string'][] = 'Cidr must be number';
            $data['status'] = FALSE;
        }
        if($cidr == '')
        {
            $data['inputerror'][] = 'cidr';
            $data['error_string'][] = 'Cidr is required';
            $data['status'] = FALSE;
        }

        /* 
        if($this->input->post('cidr') == '')
        {
            $data['inputerror'][] = 'cidr';
            $data['error_string'][] = 'Cidr is required';
            $data['status'] = FALSE;
        }
        */
 
        if($this->input->post('hostname') == '')
        {
            $data['inputerror'][] = 'hostname';
            $data['error_string'][] = 'hostname is required';
            $data['status'] = FALSE;
        }

 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
 

    }


    /*======================================================
     * CSV
     *======================================================
    */
	public function csv()
	{
        $data["host_name"]="";    //this is form in header
		$data['title'] = 'SimpleIPAM Hosts';

		$this->load->view('template/header', $data);
		$this->load->view('hosts_csv');
		$this->load->view('template/footer' );
	}

	public function export_csv() {
		$file_name = 'hosts_'.date("Y-m-d h-i-s").'.csv';
		$delimiter = ",";
        $newline = "\r\n";
        $sql_order = " order by CAST(substr(trim(ip_address),1,instr(trim(ip_address),'.')-1) AS INTEGER), CAST(substr(substr(trim(ip_address),length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)) ,1, instr(substr(trim(ip_address),length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)),'.')-1) AS INTEGER), CAST(substr(substr(trim(ip_address),length(substr(substr(trim(ip_address),length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)) ,1, instr(substr(trim(ip_address),length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)),'.')))+length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)) ,1, instr(substr(trim(ip_address),length(substr(substr(trim(ip_address),length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)) ,1, instr(substr(trim(ip_address),length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)),'.')))+length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)),'.')-1) AS INTEGER), CAST(substr(trim(ip_address),length(substr(substr(trim(ip_address),length(substr(substr(trim(ip_address),length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)) ,1, instr(substr(trim(ip_address),length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)),'.')))+length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)) ,1, instr(substr(trim(ip_address),length(substr(substr(trim(ip_address),length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)) ,1, instr(substr(trim(ip_address),length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)),'.')))+length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)),'.')))+ length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+length(substr(substr(trim(ip_address),length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)) ,1, instr(substr(trim(ip_address),length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)),'.')))+1,length(trim(ip_address))) AS INTEGER) ";
		$query = $this->db->query('SELECT ip_address, cidr, hostname, model, note FROM hosts WHERE 1'.$sql_order);
		$this->load->dbutil();
		$data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
		$this->load->helper('download');
		force_download($file_name, $data);  
		exit();
	}


	function import_csv() {
        $data['error'] = '';    //initialize image upload error array to empty
 
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '50000';  //50,000KB = 50MB
 
        $this->load->library('upload', $config);
 

        // If upload failed, display error
        if (!$this->upload->do_upload()) {
            $data['error'] = $this->upload->display_errors();
 
			$this->load->view('template/header', $data);
			$this->load->view('hosts_csv', $data);
			$this->load->view('template/footer' );
        } else {
            $file_data = $this->upload->data();
            $file_path =  './uploads/'.$file_data['file_name'];
 
            if ($this->csvimport->get_array($file_path)) {
                $csv_array = $this->csvimport->get_array($file_path);
                foreach ($csv_array as $row) {
                    $insert_data = array(
                        'ip_address'=>$row['ip_address'],
                        'cidr'=>$row['cidr'],
						'hostname'=>$row['hostname'],
						'model'=>$row['model'],
						'note'=>$row['note'],
                    );
                    $this->Ipam->hosts_insert_csv($insert_data);
                }
                $this->session->set_flashdata('success', 'Csv Data Imported Succesfully');
                //redirect(base_url().'networks/export_csv');
                //echo "<pre>"; print_r($insert_data);
            } else 
				$data['error'] = "Error occured";
				$this->load->view('template/header', $data);
				$this->load->view('hosts_csv', $data);
				$this->load->view('template/footer' );
        }
        //echo "$file_path";
        unlink($file_path);
	}    






}


