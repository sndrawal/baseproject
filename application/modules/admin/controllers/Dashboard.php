<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Dashboard Controller
 * @package Controller
 * @subpackage Controller
 * Date created:August 25,2014
 * @author Shyam Sundar Awal <s.awal@andmine.com>
 */
class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->check_userlogin();
    }

    function check_userlogin() {
        $user_profile = $this->session->userdata('admin_user_profile');
        if ($user_profile) {
            if ($user_profile->user_type == 'super_admin') {
                return true;
            }
        }
        redirect(base_url() . 'admin', 'refresh');
    }

    function index() {
        $data['title'] = '~{{PROJECT_NAME}} DASHBOARD~';
        $data['page_header'] = 'Dashboard';
        $data['page_header_icone'] = 'fa-home';
        $data['main'] = 'dashboard_view';
        $data['parent_nav'] = '';
        $data['nav'] = 'dashboard';
        $this->load->view('home', $data);
    }

}

/* End of file dashboard.php
 * Location: ./application/modules/admin/controllers/dashboard.php */