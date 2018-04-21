<?php
class Ipam extends CI_Model {


    var $table = 'networks';


    public function __construct() {
                parent::__construct();
                $this->load->database();
        } 


    /*======================================================
     *Networks
     *======================================================
     */

    function get_all_networks() {
        $this->db->order_by("networks", 'ASC');
        $query = $this->db->get("networks");
        return $query->result_array();
 
        //if($query->num_rows() > 0) {
        //    return $query->result_array();
        //}
    }

    //fetch networks
    function get_networks($limit, $start, $st = NULL)
    {
        if ($st == "NIL") $st = "";
        //$sql = "select * from networks where networks like '%$st%' limit " . $start . ", " . $limit;
        $sql1 = " select * from networks where networks like '%$st%' ";
        $sql2 = " or cidr like '%$st%' or broadcast_address like '%$st%' or vlan_id like '%$st%' ";
        $sql3 = " or note1 like '%$st%' or note2 like '%$st%' ";
        //https://stackoverflow.com/questions/23092783/best-way-to-sort-by-ip-addresses-in-sql
        //$sql_order = " order by networks ";
        //$sql_order = " order by CAST(substr(networks,1,instr(networks,'.')) AS NUMERIC) ";
        $sql_order = " order by CAST(substr(trim(networks),1,instr(trim(networks),'.')-1) AS INTEGER), CAST(substr(substr(trim(networks),length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)) ,1, instr(substr(trim(networks),length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)),'.')-1) AS INTEGER), CAST(substr(substr(trim(networks),length(substr(substr(trim(networks),length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)) ,1, instr(substr(trim(networks),length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)),'.')))+length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)) ,1, instr(substr(trim(networks),length(substr(substr(trim(networks),length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)) ,1, instr(substr(trim(networks),length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)),'.')))+length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)),'.')-1) AS INTEGER), CAST(substr(trim(networks),length(substr(substr(trim(networks),length(substr(substr(trim(networks),length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)) ,1, instr(substr(trim(networks),length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)),'.')))+length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)) ,1, instr(substr(trim(networks),length(substr(substr(trim(networks),length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)) ,1, instr(substr(trim(networks),length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)),'.')))+length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)),'.')))+ length(substr(trim(networks),1,instr(trim(networks),'.')))+length(substr(substr(trim(networks),length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)) ,1, instr(substr(trim(networks),length(substr(trim(networks),1,instr(trim(networks),'.')))+1,length(networks)),'.')))+1,length(trim(networks))) AS INTEGER) ";
        $sql_limit = " limit " . $start . ", " . $limit;
        $sql = "$sql1 $sql2 $sql3 $sql_order $sql_limit";
        $query = $this->db->query($sql);
        //return $query->result();
        return $query->result_array();
    }
    
    function get_networks_count($st = NULL)
    {
        if ($st == "NIL") $st = "";
        //$sql = "select * from networks where networks like '%$st%'";
        $sql1 = "select * from networks where networks like '%$st%' ";
        $sql2 = "or cidr like '%$st%' or broadcast_address like '%$st%' or vlan_id like '%$st%' ";
        $sql3 = "or note1 like '%$st%' or note2 like '%$st%' ";
        $sql = "$sql1 $sql2 $sql3";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }


    function networks_search($str) {
        $str = urldecode($str); // for japanese
        $this->db->like('networks', "$str");
        $this->db->or_like('note1', $str); 
        $this->db->or_like('note2', $str); 
        $this->db->order_by("networks", "ASC"); 
        $query = $this->db->get('networks');

        if ($query->num_rows() <= 0) {
            return;
        }

        return $query->result_array();
    }


	public function networks_get_by_id($id)
	{
        //$this->db->from($this->table);
        $this->db->from("networks");
		$this->db->where('id',$id);
		$query = $this->db->get();
 
		return $query->row();
	}
 
	public function networks_add($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
 
	public function networks_update($where, $data)
	{
		//$this->db->update($this->table, $data, $where);
		$this->db->update("networks", $data, $where);
		return $this->db->affected_rows();
	}
 
	public function networks_delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}

    public function networks_insert_csv($data) {
        $this->db->insert('networks', $data);
    }

    function truncate_networks() {
        $sql = 'delete from networks where id > 0 ';
        $this->db->query($sql);
 
        $sql = 'VACUUM;';
        $this->db->query($sql);

    }


    /*======================================================
     * Hosts
     *======================================================
    */
    function get_all_hosts() {
        $query = $this->db->get("hosts");
        return $query->result_array();
 
        //if($query->num_rows() > 0) {
        //    return $query->result_array();
        //}
    }

    //fetch hosts
    function get_hosts($limit, $start, $st = NULL)
    {
        if ($st == "NIL") $st = "";
        //$sql = "select * from hosts where ip_addr like '%$st%' limit " . $start . ", " . $limit;
        $sql1 = " select * from hosts where ip_address like '%$st%' ";
        $sql2 = " or hostname like '%$st%' or model like '%$st%' or note like '%$st%' ";
        // https://stackoverflow.com/questions/23092783/best-way-to-sort-by-ip-addresses-in-sql
        //$sql_order = " order by ip_address ";
        //$sql_order = " order by CAST(substr(ip_address,1,instr(ip_address,'.')) AS NUMERIC) ";
        $sql_order = " order by CAST(substr(trim(ip_address),1,instr(trim(ip_address),'.')-1) AS INTEGER), CAST(substr(substr(trim(ip_address),length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)) ,1, instr(substr(trim(ip_address),length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)),'.')-1) AS INTEGER), CAST(substr(substr(trim(ip_address),length(substr(substr(trim(ip_address),length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)) ,1, instr(substr(trim(ip_address),length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)),'.')))+length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)) ,1, instr(substr(trim(ip_address),length(substr(substr(trim(ip_address),length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)) ,1, instr(substr(trim(ip_address),length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)),'.')))+length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)),'.')-1) AS INTEGER), CAST(substr(trim(ip_address),length(substr(substr(trim(ip_address),length(substr(substr(trim(ip_address),length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)) ,1, instr(substr(trim(ip_address),length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)),'.')))+length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)) ,1, instr(substr(trim(ip_address),length(substr(substr(trim(ip_address),length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)) ,1, instr(substr(trim(ip_address),length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)),'.')))+length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)),'.')))+ length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+length(substr(substr(trim(ip_address),length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)) ,1, instr(substr(trim(ip_address),length(substr(trim(ip_address),1,instr(trim(ip_address),'.')))+1,length(ip_address)),'.')))+1,length(trim(ip_address))) AS INTEGER) ";
        $sql_limit = " limit " . $start . ", " . $limit;
        $sql = "$sql1 $sql2 $sql_order $sql_limit";
        $query = $this->db->query($sql);
        //return $query->result();
        return $query->result_array();
    }
    
    function get_hosts_count($st = NULL)
    {
        if ($st == "NIL") $st = "";
        //$sql = "select * from hosts where hosts like '%$st%'";
        $sql1 = "select * from hosts where ip_address like '%$st%' ";
        $sql2 = " or hostname like '%$st%' or model like '%$st%' or note like '%$st%' ";
        $sql = "$sql1 $sql2";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }


    function hosts_search($str) {
        $str = urldecode($str); // for japanese
        $this->db->like('ip_address', "$str");
        $this->db->or_like('hostname', $str); 
        $this->db->or_like('model', $str); 
        $this->db->or_like('note', $str); 
        $this->db->order_by("hosts", "ASC"); 
        $query = $this->db->get('hosts');

        if ($query->num_rows() <= 0) {
            return;
        }

        return $query->result_array();
    }


	public function hosts_get_by_id($id)
	{
        //$this->db->from($this->table);
        $this->db->from("hosts");
		$this->db->where('id',$id);
		$query = $this->db->get();
 
		return $query->row();
	}

	public function hosts_add($data)
	{
        //$this->db->insert($this->table, $data);
        $this->db->insert("hosts", $data);
		return $this->db->insert_id();
	}
 
	public function hosts_update($where, $data)
	{
		//$this->db->update($this->table, $data, $where);
		$this->db->update("hosts", $data, $where);
		return $this->db->affected_rows();
	}

	public function hosts_delete_by_id($id)
	{
		$this->db->where('id', $id);
        //$this->db->delete($this->table);
        $this->db->delete("hosts");
	}

    public function hosts_insert_csv($data) {
        $this->db->insert('hosts', $data);
    }


    /*======================================================
     * ETC
     *======================================================
    */
    private function _get_datatables_query()
    {
         
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }


    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get("hosts");
        return $query->result();
    }



}
