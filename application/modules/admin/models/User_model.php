<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin User_Model Model
 * @package Model
 * @subpackage Model
 * Date created:August 25,2014
 * @author Shyam Sundar Awal<sndrawal50@gmail.com>
 */
class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * check username and password
     * @param type username
     * @param type password
     * @return boolean or type
     */
    function login($email, $password) {
        $this->db->where(array('email_address' => $email, 'password' => $password, 'user_status_id' => '1'));
        $query = $this->db->get('db_user');
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->row();
        }
    }

    /**
     * get all the admin information 
     * @return boolean or type
     */
    function get_admin_info($userType, $userid) {
        $this->db->select();
        $this->db->where('user_type', $userType);
        $this->db->where('user_id', $userid);
        $this->db->where('user_status_id', '1');
        $query = $this->db->get('db_user');
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->row_array();
        }
    }

    /**
     * Getting Countries list
     * @return boolean
     */
    public function get_countries() {
        $this->db->select();
        $query = $this->db->get('db_countries');
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result_array();
        }
    }

    /**
     * get country name by passing country id
     * @param type $id
     * @return boolean or type
     */
    function get_country_name($id) {
        $this->db->select();
        $this->db->where('id', $id);
        $query = $this->db->get('db_countries');
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->row_array();
        }
    }

    /**
     * updating user info by password
     * @param type $password
     */
    function update_user($password, $userType, $userID) {
        $this->db->select();
        $data = array(
            'password' => $password
        );
        $this->db->where('user_id', $userID);
        $this->db->where('user_type', $userType);
        $this->db->where('user_status_id', '1');
        $this->db->update('db_user', $data);
    }

    /**
     * update whole admn information 
     */
    function update_user_info($userType, $userID) {
        $data = array(
            'name' => $this->input->post('name'),
            'email_address' => $this->input->post('email_address'),
            'contact_no' => $this->input->post('contact_no'),
            'address1' => $this->input->post('address1'),
            'address2' => $this->input->post('address2'),
            'county_id' => $this->input->post('country'),
            'city' => $this->input->post('city'),
            'post_code' => $this->input->post('postcode'),
        );
        $this->db->where('user_id', $userID);
        $this->db->where('user_type', $userType);
        $this->db->where('user_status_id', '1');
        $this->db->update('db_user', $data);
    }

    /**
     * retrive all the user information  by its password
     * @param type $password
     * @return boolean or type
     */
    function get_user_by_password($password, $userType, $userID) {
        $this->db->select();
        $this->db->where('user_type', $userType);
        $this->db->where('user_id', $userID);
        $this->db->where('user_status_id', '1');
        $this->db->where('password', $password);
        $query = $this->db->get('db_user');
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->row();
        }
    }

}

/* End of file user_model.php
 * Location: ./application/modules/admin/models/user_model.php */