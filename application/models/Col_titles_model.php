<?php
class Col_titles_model extends CI_Model {

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
    * Get column_title by it's id
    * @param int $id
    * @return array
    */
    public function get_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('column_title');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array();
    }

    /**
    * Get column_title by it's name
    * @param text $text
    * @return array
    */
    public function get_by_name($text)
    {
		$this->db->select('*');
		$this->db->from('column_title');
		$this->db->like('name', $text);
		$query = $this->db->get();
		return $query->result_array();
    }

    public function get_all_cursor($value='')
    {
     return  $this->db->query("SELECT * FROM column_title"); // whatever you want to export to CSV, just select in query
    }
    /**
    * Fetch column_title data from the database
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
		$this->db->from('column_title');

		if($search_string){
			$this->db->like('name', $search_string);
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
    * Count the number of columns
    * @param int $search_string
    * @param int $order
    * @return int
    */
    function count($search_string=null, $order=null)
    {
		$this->db->select('*');
		$this->db->from('column_title');
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
		$insert = $this->db->insert('column_title', $data);
	    return $insert;
	}

    /**
    * Update column_title
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('column_title', $data);
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
    * Delete unit
    * @param int $id - manufacture id
    * @return boolean
    */
	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('column_title');
	}

}
?>
