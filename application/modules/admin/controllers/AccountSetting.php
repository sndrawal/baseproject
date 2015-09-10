<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Account Setting Controller
 * @package Controller
 * @subpackage Controller
 * Date created:February 27,2014
 * @author Shyam Sundar Awal<sndrawal50@gmail.com>
 */
class AccountSetting extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->checkUserlogin();
        $this->load->model('user_model');
    }

    /**
     * check whether user is loggin or not. If not redirect to the login page.
     */
     function checkUserlogin() {
        $user_profile = $this->session->userdata('admin_user_profile');
        if ($user_profile) {
            if($user_profile->user_type=='super_admin') {
                return true;
            }
        }
        redirect(base_url() . 'admin', 'refresh');
    }

    /**
     * Getting all the user information and display 
     */
    function index() {
        $user_profile = $this->session->userdata('admin_user_profile');
        $userType = $user_profile->user_type;
        $userID = $user_profile->user_id;
        $data['title'] = '~Account Setting~';
        $data['page_header'] = 'Account Setting';
        $data['page_header_icone'] = 'fa-pencil';
        $data['panel_title'] = 'Admin Information Change';
        $data['userInfo'] = $this->user_model->get_admin_info($userType,$userID);
        $data['country_name'] = $this->user_model->get_countries();
        $data['parent_nav'] = '';
        $data['nav'] = 'dashboard';
        $data['user_type'] = $userType;
        $data['main'] = 'account_setting_view';
        $this->load->view('home', $data);
    }

    /**
     * Editing user information and return success message
     */
    function accountDetail($userType) {
        $user_profile = $this->session->userdata('admin_user_profile');
        $userID = $user_profile->user_id;
        $this->user_model->update_user_info($userType,$userID);
        $this->session->set_flashdata('success', 'User Updated Successfully...');
        redirect('admin/accountSetting');
    }
} 
/* End of file accountSetting.php
 * Location: ./application/modules/admin/controllers/accountSetting.php */