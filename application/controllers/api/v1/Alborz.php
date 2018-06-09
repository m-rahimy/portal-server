<?php
require(APPPATH.'/libraries/REST_Controller.php');

class Alborz extends REST_Controller {
	function __construct() {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['marks_get']['limit'] = 500; // 500 requests per hour per user/key
        //$this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        //$this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
        
        $this->load->model('marks_model');
        $this->load->model('indicators_model');
        $this->load->model('indicator_tables_model');
        $this->load->model('row_titles_model');
        $this->load->model('col_titles_model');
        $this->load->model('units_model');
    }
    
    function years_get(){
		$data = $this->indicators_model->get_all_years();
		// Check if the users data store contains data (in case the database result returns NULL)
		if ($data)
		{
			// Set the response and exit
			$this->response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
		}
		else
		{
			// Set the response and exit
			$this->response([
				'status' => FALSE,
				'message' => 'No years were found'
			], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
		}
	}
	
    function months_get(){
		$data = $this->indicators_model->get_all_months();
		// Check if the users data store contains data (in case the database result returns NULL)
		if ($data)
		{
			// Set the response and exit
			$this->response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
		}
		else
		{
			// Set the response and exit
			$this->response([
				'status' => FALSE,
				'message' => 'No months were found'
			], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
		}
	}
	
    function seasons_get(){
		$data = $this->indicators_model->get_all_seasons();
		// Check if the users data store contains data (in case the database result returns NULL)
		if ($data)
		{
			// Set the response and exit
			$this->response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
		}
		else
		{
			// Set the response and exit
			$this->response([
				'status' => FALSE,
				'message' => 'No seasons were found'
			], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
		}
	}
    
	function marks_get() {
        $data = $this->marks_model->get_all();
		// Check if the users data store contains data (in case the database result returns NULL)
		if ($data)
		{
			// Set the response and exit
			$this->response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
		}
		else
		{
			// Set the response and exit
			$this->response([
				'status' => FALSE,
				'message' => 'No marks were found'
			], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
		}
	}
	
	function col_titles_get() {
        $data = $this->col_titles_model->get_all();
		// Check if the users data store contains data (in case the database result returns NULL)
		if ($data)
		{
			// Set the response and exit
			$this->response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
		}
		else
		{
			// Set the response and exit
			$this->response([
				'status' => FALSE,
				'message' => 'No col titles were found'
			], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
		}
	}
	
	function indicators_get() {
        $data = $this->indicators_model->get_all();
		// Check if the users data store contains data (in case the database result returns NULL)
		if ($data)
		{
			// Set the response and exit
			$this->response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
		}
		else
		{
			// Set the response and exit
			$this->response([
				'status' => FALSE,
				'message' => 'No indicators were found'
			], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
		}
	}
	
	function indicator_tables_get() {
        $data = $this->indicator_tables_model->get_all();
		// Check if the users data store contains users (in case the database result returns NULL)
		if ($data)
		{
			// Set the response and exit
			$this->response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
		}
		else
		{
			// Set the response and exit
			$this->response([
				'status' => FALSE,
				'message' => 'No indicator tables were found'
			], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
		}
	}
	
	function units_get() {
        $data = $this->units_model->get_all();
		// Check if the users data store contains users (in case the database result returns NULL)
		if ($data)
		{
			// Set the response and exit
			$this->response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
		}
		else
		{
			// Set the response and exit
			$this->response([
				'status' => FALSE,
				'message' => 'No units were found'
			], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
		}
	}
	
	function indicator_columns_get() {
        $data = $this->indicator_columns_model->get_all();
		// Check if the users data store contains users (in case the database result returns NULL)
		if ($data)
		{
			// Set the response and exit
			$this->response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
		}
		else
		{
			// Set the response and exit
			$this->response([
				'status' => FALSE,
				'message' => 'No indicator columns  were found'
			], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
		}
	}
	
	function row_titles_get() {
        $data = $this->row_titles_model->get_all();
		// Check if the users data store contains users (in case the database result returns NULL)
		if ($data)
		{
			// Set the response and exit
			$this->response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
		}
		else
		{
			// Set the response and exit
			$this->response([
				'status' => FALSE,
				'message' => 'No row titles  were found'
			], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
		}
	}
	
	function mark_get()
    {
        if(!$this->get('id') && !$this->get('mark')){
            $this->response(NULL, 400);
        }
 
        $mark = $this->marks_model->get_by_id( $this->get('id') );
         
        if($mark) {
            $this->response($mark, 200); // 200 being the HTTP response code
        } else{
			$mark = $this->marks_model->get_by_mark( $this->get('mark') );
            if($mark){
				$this->response($mark, 200); // 200 being the HTTP response code
			} else {
				$this->response(NULL, 404);
			}
        }
    }
    
}

?> 
