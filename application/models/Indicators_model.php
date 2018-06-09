<?php
class Indicators_model extends CI_Model {

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
    * Get indicator by it's id
    * @param int $id
    * @return array
    */
    public function get_by_id($id)
    {
  		$this->db->select('indicator.id as id , amount,  col_title_id, column_title.name AS colName, table_name, indicator_table.name as tableName, mark_id , marks.mark as mark,  marks.description as markDesc, row_title_id ,row_title.name as rowName, unit_id, unit.name as unitName, is_urban,persian_year, persian_month,persian_day,persian_season');
  		$this->db->from('indicator');
  		$this->db->join('column_title', 'indicator.col_title_id = column_title.id ');
  		$this->db->join('indicator_table', 'indicator.table_name = indicator_table.id ');
  		$this->db->join('marks', 'indicator.mark_id = marks.id ');
  		$this->db->join('row_title', 'indicator.row_title_id = row_title.id ');
  		$this->db->join('unit', 'indicator.unit_id = unit.id ');
  		$this->db->where('indicator.id', $id);
  		$query = $this->db->get();
  		return $query->result_array();
    }
    /**
    * Get all distinct years
    * @param int $id
    * @return array
    */
    public function get_all_years()
    {
		$this->db->distinct('persian_year');
		$this->db->select('persian_year');
		$this->db->from('indicator');
		$query = $this->db->get();
		return $query->result_array();
    }

    /**
    * Get all distinct months
    * @param int $id
    * @return array
    */
    public function get_all_months()
    {
		$this->db->distinct('persian_month');
		$this->db->select('persian_month');
		$this->db->from('indicator');
		$query = $this->db->get();
		return $query->result_array();
    }

    /**
    * Get all distinct seasons
    * @param int $id
    * @return array
    */
    public function get_all_seasons()
    {
		$this->db->distinct('persian_season');
		$this->db->select('persian_season');
		$this->db->from('indicator');
		$query = $this->db->get();
		return $query->result_array();
    }


    /**
    * Get indicator by it's amount
    * @param float $amount
    * @return array
    */
    public function get_by_amount($amount)
    {
      $this->db->select('indicator.id as id , amount,  col_title_id, column_title.name AS colName, table_name, indicator_table.name as tableName, mark_id , marks.mark as mark,  marks.description as markDesc, row_title_id ,row_title.name as rowName, unit_id, unit.name as unitName, is_urban,persian_year, persian_month,persian_day,persian_season');
    $this->db->join('column_title', 'indicator.col_title_id = column_title.id ');
    $this->db->join('indicator_table', 'indicator.table_name = indicator_table.id ');
    $this->db->join('marks', 'indicator.mark_id = marks.id ');
    $this->db->join('row_title', 'indicator.row_title_id = row_title.id ');
    $this->db->join('unit', 'indicator.unit_id = unit.id ');		$this->db->where('amount', $amount);
		$query = $this->db->get();
		return $query->result_array();
    }

    /**
    * Fetch indicators data from the database
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

      $this->db->select('indicator.id as id , amount,  col_title_id, column_title.name AS colName, table_name, indicator_table.name as tableName, mark_id , marks.mark as mark,  marks.description as markDesc, row_title_id ,row_title.name as rowName, unit_id, unit.name as unitName, is_urban,persian_year, persian_month,persian_day,persian_season');
		$this->db->from('indicator');

		if($search_string){
			$this->db->like('amount', $search_string);
		}
		$this->db->group_by('indicator.id');

		if($order){
			$this->db->order_by('indicator.'.$order, $order_type);
		}else{
		    $this->db->order_by('indicator.id', $order_type);
		}

        if($limit_start && $limit_end){
          $this->db->limit($limit_start, $limit_end);
        }

        if($limit_start != null){
          $this->db->limit($limit_start, $limit_end);
        }

        $this->db->join('column_title', 'indicator.col_title_id = column_title.id ');
        $this->db->join('indicator_table', 'indicator.table_name = indicator_table.id ');
        $this->db->join('marks', 'indicator.mark_id = marks.id ');
        $this->db->join('row_title', 'indicator.row_title_id = row_title.id ');
        $this->db->join('unit', 'indicator.unit_id = unit.id ');		$query = $this->db->get();
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
      $this->db->select('indicator.id as id , amount,  col_title_id, column_title.name AS colName, table_name, indicator_table.name as tableName, mark_id , marks.mark as mark,  marks.description as markDesc, row_title_id ,row_title.name as rowName, unit_id, unit.name as unitName, is_urban,persian_year, persian_month,persian_day,persian_season');
		$this->db->from('indicator');
		if($search_string){
			$this->db->like('amount', $search_string);
		}
		if($order){
			$this->db->order_by('indicator'.$order, 'Asc');
		}else{
		    $this->db->order_by('indicator.id', 'Asc');
		}

    $this->db->join('column_title', 'indicator.col_title_id = column_title.id ');
    $this->db->join('indicator_table', 'indicator.table_name = indicator_table.id ');
    $this->db->join('marks', 'indicator.mark_id = marks.id ');
    $this->db->join('row_title', 'indicator.row_title_id = row_title.id ');
    $this->db->join('unit', 'indicator.unit_id = unit.id ');		$query = $this->db->get();

		return $query->num_rows();
    }


    /**
    * Store the new item into the database
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function store($data)
    {
		$insert = $this->db->insert('indicator', $data);
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
		$this->db->update('indicator', $data);
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
		$this->db->delete('indicator');
	}

}
?>
