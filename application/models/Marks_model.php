<?php
class Marks_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
		//$this->output->enable_profiler(TRUE);
        $this->load->database();
    }

    /**
    * Get Mark by it's id
    * @param int $id 
    * @return array
    */
    public function get_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('marks');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }    
    
    /**
    * Get Mark by it's mark
    * @param int $mark 
    * @return array
    */
    public function get_by_mark($mark)
    {
		$this->db->select('*');
		$this->db->from('marks');
		$this->db->where('mark', $mark);
		$query = $this->db->get();
		return $query->result_array(); 
    }    

    /**
    * Fetch Marks data from the database
    * possibility to mix search, filter and order
    * @param string $search_string 
    * @param strong $order
    * @param string $order_type 
    * @param int $limit_start
    * @param int $limit_end
    * @return array
    */
    public function get_all($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
    {
	    
		$this->db->select('*');
		$this->db->from('marks');

		if($search_string){
			$this->db->like('mark', $search_string);
		}
		$this->db->group_by('id');

		if($order){
			$this->db->order_by($order, $order_type);
		}else{
		    $this->db->order_by('id', $order_type);
		}

        if($limit_start && $limit_end){
          $this->db->limit($limit_start, $limit_end);	
        }

        if($limit_start != null){
          $this->db->limit($limit_start, $limit_end);    
        }
        
		$query = $this->db->get();
		//print_r($this->db->last_query() );
		//trigger_error("Error message here", E_USER_ERROR);
		return $query->result_array(); 	
    }

    /**
    * Count the number of rows
    * @param int $search_string
    * @param int $order
    * @return int
    */
    function count($search_string=null, $order=null)
    {
		$this->db->select('*');
		$this->db->from('marks');
		if($search_string){
			$this->db->like('name', $search_string);
		}
		if($order){
			$this->db->order_by($order, 'Asc');
		}else{
		    $this->db->order_by('id', 'Asc');
		}
		
		$query = $this->db->get();
		
		return $query->num_rows();        
    }


    /**
    * Store the new item into the database
    * @param array $data - associative array with data to store
    * @return boolean 
    */
    function store($data)
    {
		$insert = $this->db->insert('marks', $data);
	    return $insert;
	}

    /**
    * Update manufacture
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('marks', $data);
		$report = array();
		//$report['error'] = $this->db->_error_number();
		//$report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}
    }
    
    /**
    * Delete manufacturer
    * @param int $id - manufacture id
    * @return boolean
    */
	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('marks'); 
	}
 
}
?>
