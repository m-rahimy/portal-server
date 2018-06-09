<?php
class Admin_indicators extends CI_Controller {

    /**
    * Responsable for auto load the model
    * @return void
    */
	public function __construct()
    {
        parent::__construct();
        $this->load->model('indicators_model');
        $this->load->model('col_titles_model');
        $this->load->model('indicator_columns_model');
        $this->load->model('indicator_tables_model');
        $this->load->model('marks_model');
        $this->load->model('row_titles_model');
        $this->load->model('units_model');
        //$this->load->model('categories_model');

        if(!$this->session->userdata('is_logged_in')){
            redirect('admin/login');
        }
    }


    /**
    * Load the main view with all the current model model's data.
    * @return void
    */
    public function index()
    {

        //all the posts sent by the view
        $category_id = $this->input->post('category_id');
        $search_string = $this->input->post('search_string');
        $order = $this->input->post('order');
        $order_type = $this->input->post('order_type');

        //pagination settings
        $config['per_page'] = 20;
        $config['base_url'] = base_url().'admin/indicators';
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 20;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';

        //limit end
        $page = $this->uri->segment(3);

        //math to get the initial record to be select in the database
        $limit_end = ($page * $config['per_page']) - $config['per_page'];
        if ($limit_end < 0){
            $limit_end = 0;
        }

        //if order type was changed
        if($order_type){
            $filter_session_data['order_type'] = $order_type;
        }
        else{
            //we have something stored in the session?
            if($this->session->userdata('order_type')){
                $order_type = $this->session->userdata('order_type');
            }else{
                //if we have nothing inside session, so it's the default "Asc"
                $order_type = 'Asc';
            }
        }
        //make the data type var avaible to our view
        $data['order_type_selected'] = $order_type;


        //we must avoid a page reload with the previous session data
        //if any filter post was sent, then it's the first time we load the content
        //in this case we clean the session filter data
        //if any filter post was sent but we are in some page, we must load the session data

        //filtered && || paginated
        if($category_id !== false && $search_string !== false && $order !== false || $this->uri->segment(3) == true){

            /*
            The comments here are the same for line 79 until 99

            if post is not null, we store it in session data array
            if is null, we use the session data already stored
            we save order into the the var to load the view with the param already selected
            */

            if($category_id !== 0){
                $filter_session_data['category_selected'] = $category_id;
            }else{
                $category_id = $this->session->userdata('category_selected');
            }
            $data['category_selected'] = $category_id;

            if($search_string){
                $filter_session_data['search_string_selected'] = $search_string;
            }else{
                $search_string = $this->session->userdata('search_string_selected');
            }
            $data['search_string_selected'] = $search_string;

            if($order){
                $filter_session_data['order'] = $order;
            }
            else{
                $order = $this->session->userdata('order');
            }
            $data['order'] = $order;

            //save session data into the session
            $this->session->set_userdata($filter_session_data);

            //fetch manufacturers data into arrays
            //$data['categories'] = $this->categories_model->get_categories();

            $data['count_indicators']= $this->indicators_model->count($search_string, $order);
            $config['total_rows'] = $data['count_indicators'];

            //fetch sql data into arrays
            if($search_string){
                if($order){
                    $data['indicators'] = $this->indicators_model->get_all($search_string, $order, $order_type, $config['per_page'],$limit_end);
                }else{
                    $data['indicators'] = $this->indicators_model->get_all($search_string, '', $order_type, $config['per_page'],$limit_end);
                }
            }else{
                if($order){
                    $data['indicators'] = $this->indicators_model->get_all('', $order, $order_type, $config['per_page'],$limit_end);
                }else{
                    $data['indicators'] = $this->indicators_model->get_all('', '', $order_type, $config['per_page'],$limit_end);
                }
            }

        }else{

            //clean filter data inside section
            $filter_session_data['category_selected'] = null;
            $filter_session_data['search_string_selected'] = null;
            $filter_session_data['order'] = null;
            $filter_session_data['order_type'] = null;
            $this->session->set_userdata($filter_session_data);

            //pre selected options
            $data['search_string_selected'] = '';
            $data['category_selected'] = 0;
            $data['order'] = 'id';

						/*$this->load->model('indicators_model');
		        $this->load->model('col_titles_model');
		        $this->load->model('indicator_tables_model');
		        $this->load->model('marks_model');
		        $this->load->model('row_titles_model');
		        $this->load->model('units_model');*/


            //fetch sql data into arrays
            $data['cols'] = $this->col_titles_model->get_all();
            $data['rows'] = $this->row_titles_model->get_all();
            $data['tables'] = $this->indicator_tables_model->get_all();
            $data['marks'] = $this->marks_model->get_all();
            $data['units'] = $this->units_model->get_all();

            $data['count_indicators']= $this->indicators_model->count();
            $data['indicators'] = $this->indicators_model->get_all('', '', $order_type, $config['per_page'],$limit_end);
            $config['total_rows'] = $data['count_indicators'];

        }//!isset($manufacture_id) && !isset($search_string) && !isset($order)

        //initializate the panination helper
        $this->pagination->initialize($config);

        //load the view
        $data['main_content'] = 'admin/indicators/list';
        $this->load->view('includes/template', $data);

    }//index


    public function add()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
            $this->form_validation->set_rules('row_title_id', 'row_title_id', 'required');
            $this->form_validation->set_rules('col_title_id', 'col_title_id', 'required');
            $this->form_validation->set_rules('table_name', 'table_name', 'required');
            $this->form_validation->set_rules('unit_id', 'unit_id', 'required');
            $this->form_validation->set_rules('mark_id', 'mark_id', 'required');
            $this->form_validation->set_rules('amount', 'amount', 'required');
            $this->form_validation->set_rules('is_urban', 'is_urban', 'required');
            $this->form_validation->set_rules('persian_year', 'persian_year', 'required');
            $this->form_validation->set_rules('persian_month', 'persian_month', 'required');
            $this->form_validation->set_rules('persian_day', 'persian_day', 'required');
            $this->form_validation->set_rules('persian_season', 'persian_season', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array(
                    'row_title_id' => $this->input->post('row_title_id'),
                    'col_title_id' => $this->input->post('col_title_id'),
                    'table_name' => $this->input->post('table_name'),
                    'unit_id' => $this->input->post('unit_id'),
                    'mark_id' => $this->input->post('mark_id'),
                    'amount' => $this->input->post('amount'),
                    'is_urban' => $this->input->post('is_urban'),
                    'persian_year' => $this->input->post('persian_year'),
                    'persian_month' => $this->input->post('persian_month'),
                    'persian_day' => $this->input->post('persian_day'),
                    'persian_season' => $this->input->post('persian_season'),
                );
                //if the insert has returned true then we show the flash message
                if($this->indicators_model->store($data_to_store)){
                    $data['flash_message'] = TRUE;
                }else{
                    $data['flash_message'] = FALSE;
                }

            }

        }
        //fetch categories data to populate the select field
				$data['cols'] = $this->col_titles_model->get_all();
				$data['rows'] = $this->row_titles_model->get_all();
				$data['tables'] = $this->indicator_tables_model->get_all();
				$data['marks'] = $this->marks_model->get_all();
				$data['units'] = $this->units_model->get_all();

				//load the view
        $data['main_content'] = 'admin/indicators/add';
        $this->load->view('includes/template', $data);
    }


    /**
    * Update item by his id
    * @return void
    */
    public function update()
    {
        //product id
        $id = $this->uri->segment(4);

        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('row_title_id', 'row_title_id', 'required');
            $this->form_validation->set_rules('col_title_id', 'col_title_id', 'required');
            $this->form_validation->set_rules('table_name', 'table_name', 'required');
            $this->form_validation->set_rules('unit_id', 'unit_id', 'required');
            $this->form_validation->set_rules('mark_id', 'mark_id', 'required');
            $this->form_validation->set_rules('amount', 'amount', 'required');
            $this->form_validation->set_rules('is_urban', 'is_urban', 'required');
            $this->form_validation->set_rules('persian_year', 'persian_year', 'required');
            $this->form_validation->set_rules('persian_month', 'persian_month', 'required');
            $this->form_validation->set_rules('persian_day', 'persian_day', 'required');
            $this->form_validation->set_rules('persian_season', 'persian_season', 'required');
            //$this->form_validation->set_rules('is_available', 'is_available', 'required');
	    //$this->form_validation->set_rules('is_new', 'is_new', 'required');
	    //$this->form_validation->set_rules('picture_address', 'picture_address', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {

                $data_to_store = array(
                    'row_title_id' => $this->input->post('row_title_id'),
                    'col_title_id' => $this->input->post('col_title_id'),
                    'table_name' => $this->input->post('table_name'),
                    'unit_id' => $this->input->post('unit_id'),
                    'mark_id' => $this->input->post('mark_id'),
                    'amount' => $this->input->post('amount'),
                    'is_urban' => $this->input->post('is_urban'),
                    'persian_year' => $this->input->post('persian_year'),
                    'persian_month' => $this->input->post('persian_month'),
                    'persian_day' => $this->input->post('persian_day'),
                    'persian_season' => $this->input->post('persian_season'),
                );

                //print_r($data_to_store);
				//trigger_error("Error message here", E_USER_ERROR);
                //if the insert has returned true then we show the flash message
                if($this->indicators_model->update($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/indicators/update/'.$id.'');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data
        $data['indicators'] = $this->indicators_model->get_by_id($id);
        //fetch manufactures data to populate the select field
				$data['cols'] = $this->col_titles_model->get_all();
				$data['rows'] = $this->row_titles_model->get_all();
				$data['tables'] = $this->indicator_tables_model->get_all();
				$data['marks'] = $this->marks_model->get_all();
				$data['units'] = $this->units_model->get_all();

				//load the view
        $data['main_content'] = 'admin/indicators/edit';
        $this->load->view('includes/template', $data);

    }//update


    /**
    * Delete product by his id
    * @return void
    */
    public function delete()
    {
        //product id
        $id = $this->uri->segment(4);
        $this->indicators_model->delete($id);
        redirect('admin/indicators');
    }//edit
}
?>
