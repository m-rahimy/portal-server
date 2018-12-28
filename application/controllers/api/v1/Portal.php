<?php
require(APPPATH.'/libraries/REST_Controller.php');

class Portal extends REST_Controller {
	function __construct() {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        //$this->methods['marks_get']['limit'] = 500; // 500 requests per hour per user/key
        //$this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        //$this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->load->model('ingress_user_model');
        $this->load->model('image_url_model');
        $this->load->model('portal_model');
        $this->load->model('portal_image_model');
        $this->load->model('portal_junc_location_model');
        $this->load->model('portal_like_model');
        $this->load->model('portal_location_model');
        $this->load->model('portal_report_model');
        /*$this->load->model('row_titles_model');
        $this->load->model('col_titles_model');
        $this->load->model('units_model');*/
    }

	function ingress_user_get() {
        $data = $this->ingress_user_model->get_all();
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

	function ingress_user_put(){
		$result = $this->ingress_user_model->store(array(
				'name' => $this->put('name'),
				'email' => $this->put('email')
		));

		if($result === FALSE)		{
				$this->response(array('status' => 'failed'));
		}		else		{
				$this->response(array('status' => 'success'));
		}
  }

	function ingress_user_post()    {
		$result = $this->ingress_user_model->update( $this->post('name'), array(
				'email' => $this->post('email')
		));

		if($result === FALSE)		{
				$this->response(array('status' => 'failed'));
		}		else		{
				$this->response(array('status' => 'success'));
		}

  }

	function image_url_get() {
        $data = $this->image_url_model->get_all();
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
						'message' => 'Nothing were found'
					], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
				}
	}

	function image_url_put(){
		$result = $this->image_url_model->store(array(
				'url' => $this->put('url'),
				'uploader_name' => $this->put('uploader_name')
		));

		if($result === FALSE)		{
				$this->response(array('status' => 'failed'));
		}		else		{
				$this->response(array('status' => 'success'));
		}
  }

	function image_url_post()    {
		$result = $this->image_url_model->update( $this->post('url'), array(
				'uploader_name' => $this->post('uploader_name')
		));

		if($result === FALSE)		{
				$this->response(array('status' => 'failed'));
		}		else		{
				$this->response(array('status' => 'success'));
		}

  }

	function portal_get() {
        $data = $this->portal_model->get_all();
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
						'message' => 'Nothing were found'
					], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
				}
	}
/*$this->db->set('id', 'UUID()', FALSE);
*/
	function portal_put(){
		$id = null;
		if(null!==$this->put('id')){
			$id = $this->put('id');
		}
		$result = $this->portal_model->store(array(
				'title' => $this->put('title'),
				'description' => $this->put('description'),
				'id' => $id,
				'uploader' => $this->put('uploader')
		));

		if($result === FALSE)		{
				$this->response(array('status' => 'failed'));
		}		else		{
				$this->response(array('status' => 'success'));
		}
  }

	function portal_post()    {
		$result = $this->portal_model->update( $this->post('id'), array(
				'uploader' => $this->post('uploader'),
				'title' => $this->post('title'),
				'description' => $this->post('description')
		));

		if($result === FALSE)		{
				$this->response(array('status' => 'failed'));
		}		else		{
				$this->response(array('status' => 'success'));
		}

  }


		function portal_image_get() {
	        $data = $this->portal_image_model->get_all();
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
							'message' => 'Nothing were found'
						], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
					}
		}
	/*$this->db->set('id', 'UUID()', FALSE);
	*/
		function portal_image_put(){
			$result = $this->portal_image_model->store(array(
					'portal_id' => $this->put('portal_id'),
					'url' => $this->put('url')
			));

			if($result === FALSE)		{
					$this->response(array('status' => 'failed'));
			}		else		{
					$this->response(array('status' => 'success'));
			}
	  }

		function portal_image_post() {
			$result = $this->portal_model->update( $this->post('id'), array(
					'portal_id' => $this->post('portal_id'),
					'url' => $this->post('url'),
					'description' => $this->post('description')
			));

			if($result === FALSE)		{
					$this->response(array('status' => 'failed'));
			}		else		{
					$this->response(array('status' => 'success'));
			}

	  }

		//----------------------------------------

				function portal_junc_location_get() {
			        $data = $this->portal_junc_location_model->get_all();
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
									'message' => 'Nothing were found'
								], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
							}
				}
			/*$this->db->set('id', 'UUID()', FALSE);
			*/
				function portal_junc_location_put(){
					$result = $this->portal_junc_location_model->store(array(
							'portal_id' => $this->put('portal_id'),
							'is_main' => $this->put('is_main'),
							'location_id' => $this->put('location_id')
					));

					if($result === FALSE)		{
							$this->response(array('status' => 'failed'));
					}		else		{
							$this->response(array('status' => 'success'));
					}
			  }

				function portal_junc_location_post() {
					$result = $this->portal_junc_location_model->update( $this->post('id'), array(
							'portal_id' => $this->post('portal_id'),
							'is_main' => $this->post('is_main'),
							'location_id' => $this->post('location_id')
					));

					if($result === FALSE)		{
							$this->response(array('status' => 'failed'));
					}		else		{
							$this->response(array('status' => 'success'));
					}

			  }
////////////////
				function portal_like_get() {
			        $data = $this->portal_like_model->get_all();
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
									'message' => 'Nothing were found'
								], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
							}
				}
			/*$this->db->set('id', 'UUID()', FALSE);
			*/
				function portal_like_put(){
					$result = $this->portal_like_model->store(array(
							'portal_id' => $this->put('portal_id'),
							'_like' => $this->put('like'),
							'username' => $this->put('username')
					));

					if($result === FALSE)		{
							$this->response(array('status' => 'failed'));
					}		else		{
							$this->response(array('status' => 'success'));
					}
			  }

				function portal_like_post() {
					$result = $this->portal_like_model->update( $this->post('id'), array(
							'portal_id' => $this->post('portal_id'),
							'_like' => $this->post('like'),
							'username' => $this->post('username')
					));

					if($result === FALSE)		{
							$this->response(array('status' => 'failed'));
					}		else		{
							$this->response(array('status' => 'success'));
					}

			  }

				//--=-=-=-=-=-=-=-=-=-

////////////////
				function portal_location_get() {
			        $data = $this->portal_location_model->get_all();
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
									'message' => 'Nothing were found'
								], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
							}
				}
			/*$this->db->set('id', 'UUID()', FALSE);
			*/
				function portal_location_put(){
					$result = $this->portal_location_model->store(array(
							'lat' => $this->put('lat'),
							'lon' => $this->put('lon'),
							'uploader_name' => $this->put('uploader_name')
					));

					if($result === FALSE)		{
							$this->response(array('status' => 'failed'));
					}		else		{
							$this->response(array('status' => 'success'));
					}
			  }

				function portal_location_post() {
					$result = $this->portal_location_model->update( $this->post('id'), array(
						'lat' => $this->post('lat'),
						'lon' => $this->post('lon'),
						'uploader_name' => $this->post('uploader_name')
					));

					if($result === FALSE)		{
							$this->response(array('status' => 'failed'));
					}		else		{
							$this->response(array('status' => 'success'));
					}

			  }

				/*/*//*/*//*/*//*/*//*/*/
				///////
								function portal_report_get() {
							        $data = $this->portal_report_model->get_all();
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
													'message' => 'Nothing were found'
												], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
											}
								}
							/*$this->db->set('id', 'UUID()', FALSE);
							*/
								function portal_report_put(){
									$result = $this->portal_report_model->store(array(
											'portal_id' => $this->put('portal_id'),
											'username' => $this->put('username'),
											'description' => $this->put('description')
									));

									if($result === FALSE)		{
											$this->response(array('status' => 'failed'));
									}		else		{
											$this->response(array('status' => 'success'));
									}
							  }

								function portal_report_post() {
									$result = $this->portal_report_model->update( $this->post('id'), array(
										'portal_id' => $this->post('portal_id'),
										'username' => $this->post('username'),
										'description' => $this->post('description')
									));

									if($result === FALSE)		{
											$this->response(array('status' => 'failed'));
									}		else		{
											$this->response(array('status' => 'success'));
									}

							  }
}

?>
