<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Controller
 * @package Controller
 * @subpackage Controller
 * Date created:August 25,2014
 * @author Shyam Sundar Awal<sndrawal50@gmail.com>
 */
class TestManagement extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->checkUserlogin();
		$this->load->model('test_model');
		$this->load->model('general_model');
		$this->load->library('pagination');
	}

    /**
     * check whether user is loggin or not. If not redirect to the login page.
     */
    public function checkUserlogin() {
    	if (!$this->session->userdata('admin_user_profile')) {
    		redirect(base_url() . 'home', 'refresh');
    	}
    }

    public function index() {
    	$this->showTest();
    }

    /**
     * Displaying /listing Test data
     * @param type $id
     */
    public function showTest(){
    	$config['base_url'] = base_url() . 'admin/TestManagement';
    	$config['uri_segment'] = 3;
    	$config['per_page'] = 10;

            // Number Links
    	$config['num_wrapper_open'] = '<div class="pages"><span>';
    	$config['num_tag_open'] = ' | ';
    	$config['num_tag_close'] = ' | ';
    	$config['num_wrapper_close'] = '</span></div>';

    	$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $config['total_rows'] = $this->db->count_all('db_test_table');   //Test Table
            $data['test_info'] = $this->test_model->get_test_details($config['per_page'], $page);

            $this->pagination->initialize($config);

            $data['title'] = '~Test Management~';
            $data['page_header'] = 'Test Management';
            $data['page_header_icone'] = 'fa-cogs';
            $data['parent_nav'] = '';
            $data['nav'] = 'test';
            $data['panel_title'] = 'Test Management';
            $data['main'] = 'admin/test_manager_view';
            $this->load->view('admin/home', $data);
        }

        /**
	     * Calling add form to add test data
	     * @param type $id
	     */
        public function add(){
        	$data['title'] = '~Test Management~';
        	$data['page_header'] = 'Test Management';
        	$data['page_header_icone'] = 'fa-cogs';
        	$data['parent_nav'] = '';
        	$data['nav'] = 'test';
        	$data['panel_title'] = 'Test Management';
        	$data['main'] = 'add-edit-test';

        	$this->load->view('home', $data);
        }

        /**
	     * Adding Test data
	     * @param 
	     */
        public function addTest(){
        	$this->form_validation->set_rules('title', 'title', 'required');
        	$this->form_validation->set_rules('input_field', 'input_field', 'required');
        	if (FALSE == $this->form_validation->run()) {
        		$this->session->set_flashdata('message', 'Title and Input field are required fields');
        		redirect(base_url() . 'admin/TestManagement');
        	}else{
        	//Inserting data can be done in two ways

        	//First Method--------
        	//$table = 'db_test_table';
        	//$this->general_model->insert($table,$_POST);
        	//------------------------------------------------------------------
        	//Second Method
        		$config['upload_path'] = "./././assets/admin/images/uploads";
        		$config['allowed_types'] = "gif|jpg|jpeg|png|php";
        		$config['max_size'] = "4716";
        		$config['max_width'] = "1900";
        		$config['max_height'] = "1280";
        		$config['file_name'] = 'test_' . date('m-d-Y-His');  
        		$this->load->library('upload', $config);

        		$this->upload->initialize($config);
        		if (!$this->upload->do_upload()) {
        			$thumbnail_name = "";
        		} else {
        			$finfo = $this->upload->data();
        			$thumbnail_name = $finfo['raw_name'] . $finfo['file_ext'];
        		}
        		$this->test_model->insert_test($thumbnail_name);
        		$this->session->set_flashdata('success', 'Test Added Successfully...');
        		redirect(base_url() . 'admin/TestManagement', 'refresh');
        	}
        }

        /**
	     * calling edit form to edit test data
	     * @param type $id
	     */
        public function edit($id){
        	if (!isset($id))
        		redirect(base_url() . 'admin/TestManagement');

        	if (!is_numeric($id))
        		redirect(base_url() . 'admin/TestManagement');

        	$data['test_detail'] = $this->test_model->get_test_by_id($id);
        	if (empty($data['test_detail'])) {
        		show_404();
        	} else {
        		$data['title'] = '~Test Management~';
        		$data['page_header'] = 'Test Management';
        		$data['page_header_icone'] = 'fa-cogs';
        		$data['parent_nav'] = '';
        		$data['nav'] = 'test';
        		$data['panel_title'] = 'Test Management';
        		$data['main'] = 'admin/add-edit-test';
        		$this->load->view('admin/home', $data);
        	}
        }

        /**
	     * Updating Test data by its Id
	     * @param type $id
	     */
        public function editTest($id){
        	$this->form_validation->set_rules('title', 'title', 'required');
        	$this->form_validation->set_rules('input_field', 'input_field', 'required');
        	if (FALSE == $this->form_validation->run()) {
        		$this->session->set_flashdata('message', 'Title and Input field are required fields');
        		redirect(base_url() . 'admin/TestManagement');
        	}else{
    	      //Updating data can be done in two ways

        	//First Method--------
        	//$table = 'db_test_table';

        	//$this->general_model->update($table,$_POST,array('pk_test_id'=>$id));
        	//----------------------------------------------------------------------	
        	//Second Method
        		$thumbnail_name = '';
        		if (isset($_FILES) && $_FILES['userfile']['name'] != '') {
        			$config['upload_path'] = "./././assets/admin/images/uploads";
        			$config['allowed_types'] = "gif|jpg|jpeg|png";
        			$config['max_size'] = "4716";
        			$config['max_width'] = "1900";
        			$config['max_height'] = "1280";
        			$config['file_name'] = 'news_' . date('m-d-Y-His');
        			$this->load->library('upload', $config);

        			$this->upload->initialize($config);
        			if ($this->upload->do_upload()) {
        				if ($this->input->post('prev_img') != '') {
        					$prev_img = $_SERVER['DOCUMENT_ROOT'] . '/assets/admin/images/uploads/' . $this->input->post('prev_img');
        					unlink($prev_img);
        				}
        				$finfo = $this->upload->data();
        				$thumbnail_name = $finfo['raw_name'] . $finfo['file_ext'];
        			}
        		}

        		if (!isset($id))
        			redirect(base_url() . 'admin/TestManagement');

        		if (!is_numeric($id))
        			redirect(base_url() . 'admin/TestManagement');

        		$this->test_model->update_test($id, $thumbnail_name);
        		$this->session->set_flashdata('success', 'Test Updated Successfully...');
        		redirect(base_url() . 'admin/TestManagement', 'refresh');
        	}
        }

        /**
	     * Delete test value by its Id
	     * @param type $pk_id
	     */
        public function deleteTest($pk_id){

        	 //Deleting data can be done in two ways

        	//First Method--------
        	//$table = 'db_test_table';

        	//$this->general_model->delete($table,array('pk_test_id'=>$id));
        	//----------------------------------------------------------------------	
        	
        	//Second Method
        	if (!isset($pk_id))
        		redirect(base_url() . 'admin/TestManagement');

        	if (!is_numeric($pk_id))
        		redirect(base_url() . 'admin/TestManagement');

        	$this->test_model->delete_test($pk_id);
        	$this->session->set_flashdata('success', 'Test Deleted Successfully...');
        	redirect(base_url() . 'admin/TestManagement', 'refresh');
        }
    }