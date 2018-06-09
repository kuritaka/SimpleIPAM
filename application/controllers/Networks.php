<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Networks extends CI_Controller
{

    function __construct()
    {
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
        $this->load->model('Ipam');
        //$this->load->database();
    }


    public function index()
    {
        $data["host_name"] = "";    //this is form in header
        $data["network_name"] = "";

        //pagination settings
        $config['base_url'] = site_url("networks/search/NIL");
        $config['total_rows'] = $this->db->count_all('networks');
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = "10";
        $config["uri_segment"] = 4;
        $choice = $config["total_rows"] / $config["per_page"];
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

        // get networks list
        $data['networks'] = $this->Ipam->get_networks($config["per_page"], $data['page'], NULL);

        $data['pagination'] = $this->pagination->create_links();

        //$data['networks'] =$this->Ipam->get_all_networks();

        $data['total_rows'] = $config['total_rows'];
        $data['start'] = $data['page'] + 1;
        $data['end'] = $data['start'] + $config['per_page'] - 1;

        $data['title'] = 'SimpleIPAM Networks';
        $this->load->view('template/header', $data);
        $this->load->view('networks_view', $data);
        $this->load->view('template/footer');
    }


    function search()
    {
        $data["host_name"] = "";    //this is form in header
        //input search
        // post
        $search = ($this->input->post("network_name")) ? $this->input->post("network_name") : "NIL";
        // get
        $search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;
        // url encode for japanese
        $search = urldecode($search);


        empty($search) ? $data["network_name"] = "" : $data["network_name"] = $search;
        if ($search == "NIL") {
            $data["network_name"] = "";
        }


        // pagination settings
        $config = array();
        $config['base_url'] = site_url("networks/search/$search");
        $config['total_rows'] = $this->Ipam->get_networks_count($search);
        $config['per_page'] = "5";
        $config["uri_segment"] = 4;
        $choice = $config["total_rows"] / $config["per_page"];
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
        $data['networks'] = $this->Ipam->get_networks($config['per_page'], $data['page'], $search);

        $data['pagination'] = $this->pagination->create_links();

        $data['total_rows'] = $config['total_rows'];
        $data['start'] = $data['page'] + 1;
        $data['end'] = $data['start'] + $config['per_page'] - 1;


        //load view
        $data['title'] = 'SimpleIPAM Networks';
        $this->load->view('template/header', $data);
        $this->load->view('networks_view', $data);
        $this->load->view('template/footer');
    }


    public function networks_add()
    {
        $this->_validate();
        $data = array(
            'networks' => $this->input->post('networks'),
            'cidr' => $this->input->post('cidr'),
            'broadcast_address' => $this->input->post('broadcast_address'),
            'vlan_id' => $this->input->post('vlan_id'),
            'note1' => $this->input->post('note1'),
            'note2' => $this->input->post('note2'),
        );
        $insert = $this->Ipam->networks_add($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_edit($id)
    {
        $data = $this->Ipam->networks_get_by_id($id);

        echo json_encode($data);
    }


    public function networks_update()
    {
        $this->_validate();
        $data = array(
            'networks' => $this->input->post('networks'),
            'cidr' => $this->input->post('cidr'),
            'broadcast_address' => $this->input->post('broadcast_address'),
            'vlan_id' => $this->input->post('vlan_id'),
            'note1' => $this->input->post('note1'),
            'note2' => $this->input->post('note2'),
        );
        $this->Ipam->networks_update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }


    public function networks_delete($id)
    {
        $this->Ipam->networks_delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }


    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if ($this->input->post('networks') == '') {
            $data['inputerror'][] = 'networks';
            $data['error_string'][] = 'Networks is required';
            $data['status'] = FALSE;
        }


        $cidr = $this->input->post('cidr');
        if (!is_numeric($cidr)) {
            $data['inputerror'][] = 'cidr';
            $data['error_string'][] = 'Cidr must be number';
            $data['status'] = FALSE;
        }
        if ($cidr == '') {
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

        if ($this->input->post('broadcast_address') == '') {
            $data['inputerror'][] = 'broadcast_address';
            $data['error_string'][] = 'Broadcast Address is required';
            $data['status'] = FALSE;
        }


        if ($data['status'] === FALSE) {
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
        $data["host_name"] = "";    //this is form in header
        $data['title'] = 'SimpleIPAM Networks';

        $this->load->view('template/header', $data);
        $this->load->view('networks_csv');
        $this->load->view('template/footer');
    }

    public function export_csv()
    {
        $file_name = 'networks_' . date("Y-m-d h-i-s") . '.csv';
        $delimiter = ",";
        $newline = "\r\n";
        $sql_order = " order by CAST(substr(trim(networks),1,instr(trim(networks),'.')-1) AS INTEGER), CAST(substr(substr(trim(networks),length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)) ,1, instr(substr(trim(networks),length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)),'.')-1) AS INTEGER), CAST(substr(substr(trim(networks),length(substr(substr(trim(networks),length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)) ,1, instr(substr(trim(networks),length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)),'.')))+length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)) ,1, instr(substr(trim(networks),length(substr(substr(trim(networks),length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)) ,1, instr(substr(trim(networks),length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)),'.')))+length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)),'.')-1) AS INTEGER), CAST(substr(trim(networks),length(substr(substr(trim(networks),length(substr(substr(trim(networks),length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)) ,1, instr(substr(trim(networks),length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)),'.')))+length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)) ,1, instr(substr(trim(networks),length(substr(substr(trim(networks),length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)) ,1, instr(substr(trim(networks),length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)),'.')))+length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)),'.')))+ length(substr(trim(networks),1,instr(trim(networks),'.')))+length(substr(substr(trim(networks),length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)) ,1, instr(substr(trim(networks),length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)),'.')))+1,length(trim(networks))) AS INTEGER) ";
        $query = $this->db->query('SELECT networks, cidr, broadcast_address, vlan_id, note1, note2 FROM networks WHERE 1' . $sql_order);
        $this->load->dbutil();
        $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
        $this->load->helper('download');
        force_download($file_name, $data);
        exit();
    }

    function import_csv()
    {
        $data["host_name"] = "";    //this is form in header
        $data['error'] = '';    //initialize image upload error array to empty

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '50000';  //50,000KB = 50MB

        $this->load->library('upload', $config);


        // If upload failed, display error
        if (!$this->upload->do_upload()) {
            $data['error'] = $this->upload->display_errors();

            $this->load->view('template/header', $data);
            $this->load->view('networks_csv', $data);
            $this->load->view('template/footer');
        } else {
            $file_data = $this->upload->data();
            $file_path = './uploads/' . $file_data['file_name'];

            if ($this->csvimport->get_array($file_path)) {
                $csv_array = $this->csvimport->get_array($file_path);
                foreach ($csv_array as $row) {
                    $insert_data = array(
                        'networks' => $row['networks'],
                        'cidr' => $row['cidr'],
                        'broadcast_address' => $row['broadcast_address'],
                        'vlan_id' => $row['vlan_id'],
                        'note1' => $row['note1'],
                        'note2' => $row['note2'],
                    );
                    $this->Ipam->networks_insert_csv($insert_data);
                }
                $this->session->set_flashdata('success', 'Csv Data Imported Succesfully');
                //redirect(base_url().'networks/export_csv');
                //echo "<pre>"; print_r($insert_data);
            } else
                $data['error'] = "Error occured";
            $this->load->view('template/header', $data);
            $this->load->view('networks_csv', $data);
            $this->load->view('template/footer');

        }
        //echo "$file_path";
        unlink($file_path);

    }


    function importcsv_purge_add()
    {
        $data['error'] = '';    //initialize image upload error array to empty
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '1000';
        $this->load->library('upload', $config);

        $this->Ipam->truncate_networks();

        // If upload failed, display error
        if (!$this->upload->do_upload()) {
            $data['error'] = $this->upload->display_errors();

            $this->load->view('template/header', $data);
            $this->load->view('networks_csv', $data);
            $this->load->view('template/footer');
        } else {
            $file_data = $this->upload->data();
            $file_path = './uploads/' . $file_data['file_name'];
            if ($this->csvimport->get_array($file_path)) {
                //import csv
                $csv_array = $this->csvimport->get_array($file_path);
                foreach ($csv_array as $row) {
                    $insert_data = array(
                        'id' => $row['id'],
                        'networks' => $row['networks'],
                        'cidr' => $row['cidr'],
                        'broadcast_address' => $row['broadcast_address'],
                        'vlan_id' => $row['vlan_id'],
                        'note1' => $row['note1'],
                        'note2' => $row['note2'],
                    );
                    $this->Ipam->networks_insert_csv($insert_data);
                }
                $this->session->set_flashdata('success', 'Csv Data Imported Succesfully');
                //redirect(base_url().'networks/export_csv');
                //echo "<pre>"; print_r($insert_data);
            } else
                $data['error'] = "Error occured";
            $this->load->view('template/header', $data);
            $this->load->view('networks_csv', $data);
            $this->load->view('template/footer');
        }
    }


}
