<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Controller
 * @package Controller
 * @subpackage Controller
 * Date created:August 25,2014
 * @author Shyam Sundar Awal<sndrawal50@gmail.com>
 */
class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
       $this->load->model('user_model');
    }

    function index() {  
        $data['title'] = '~Cpanel Login~';
        $this->load->view('login', $data);
    }

    /**
     * Loggen to the Super Admin page
     */
    function login() {
        $data['title'] = '~{{PROJECT_NAME}} Dashboard~';
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required|md5');
        if (FALSE == $this->form_validation->run()) {
            $this->session->set_flashdata('message', 'Email Address and Password are required fields');
            redirect(base_url() . 'admin');
        }

        $user_profile = $this->user_model->login($this->input->post('email'), $this->input->post('password'));


        if (isset($user_profile) && !empty($user_profile)) {
            if (isset($user_profile) && !empty($user_profile)) {
                $this->session->set_userdata('admin_user_profile', $user_profile);
                if ($user_profile->user_type == 'super_admin') {
                    redirect(base_url() . 'admin/dashboard', 'refresh', $data);
                }
                //------------If multiple admin or customer login then use below

                //  else if ($user_profile->user_type == 'store_admin') {
                //     redirect(base_url() . 'storeAdmin', 'refresh', $data);
                // }

               //-------------------------------------------------------------------- 
                 else {
                    $this->session->set_flashdata('message', 'Invalid Username or Password combination');
                    redirect(base_url() . 'admin');
                }
            }
        } else {
            $this->session->set_flashdata('message', 'Invalid Username or Password combination');
            redirect(base_url() . 'admin');
        }
    }

    /**
     * Change password page called
     */
    function changePassword() {
        if (!$this->session->userdata('admin_user_profile')) {
            redirect(base_url() . 'admin', 'refresh');
        }

        $data['title'] = '~Change Password~';
        $data['page_header'] = 'Change Password';
        $data['page_header_icone'] = 'fa-pencil';
        $data['parent_nav'] = '';
        $data['nav'] = 'dashboard';
        $data['panel_title'] = 'Admin Password Change';
        $data['main'] = 'change_password_view';
        $this->load->view('home', $data);
    }

    /**
     * changing old password with new password by checking validation
     */
    function changePasswordDetail() {
        $this->form_validation->set_rules('old_password', 'old_password', 'required|md5');
        $this->form_validation->set_rules('new_password', 'new_password', 'required|md5');
        $this->form_validation->set_rules('retype_password', 'retype_password', 'required|md5');
        if (FALSE == $this->form_validation->run()) {
            $this->session->set_flashdata('message', 'Current Password, New Password and Re-type Password are required fields.');
            redirect(base_url() . 'admin/changePassword', 'refresh');
        }
        $old_password = $this->input->post('old_password');
        $new_password = $this->input->post('new_password');
        $retype_password = $this->input->post('retype_password');
        $user_profile = $this->session->userdata('admin_user_profile');
        $userType = $user_profile->user_type;
        $userID = $user_profile->user_id;

        $user_info = $this->user_model->get_user_by_password($old_password, $userType, $userID);
        if (isset($user_info) && !empty($user_info)) {
            if ($new_password == $retype_password) {

                $this->user_model->update_user($new_password, $userType, $userID);
                $this->session->set_flashdata('success', 'Acount Password Change Successfully!!!');
                redirect(base_url() . 'admin/changePassword', 'refresh');
            } else {
                $this->session->set_flashdata('message', 'New Password and Reenter Password is not matching.Please Try Again!!!');
                redirect(base_url() . 'admin/changePassword', 'refresh');
            }
        } else {
            $this->session->set_flashdata('message', 'Incorrect Current Password.Please Try Again !!!');
            redirect(base_url() . 'admin/changePassword', 'refresh');
        }
    }

    /**
     * Super Admin Loggout 
     */
    function logOut() {
        $this->session->sess_destroy();
        redirect(base_url() . 'admin', 'refresh');
    }

}

/* End of file admin.php
 * Location: ./application/modules/admin/controllers/admin.php */