<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin User_Model Model
 * @package Model
 * @subpackage Model
 * Date created:August 25,2014
 * @author Shyam Sundar Awal<sndrawal50@gmail.com>
 */
class Test_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_test_details($limit = NULL, $offset = NULL) {
        $this->db->select();
        $query = $this->db->get('db_test_table', $limit, $offset);
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function insert_test($image){
    	 $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'input_field' => $this->input->post('input_field'),
            'select_field' => $this->input->post('select_field'),
            'radio_field' => $this->input->post('radio_field'),
            'image_field' => $image,
            'color_picker_field' => $this->input->post('color_picker_field'),
            'date_picker_field' => $this->input->post('date_picker_field')
        );
        $this->db->insert('db_test_table', $data);

    }

    public function get_test_by_id($pk_id){
    	$this->db->select();
        $this->db->where('pk_test_id', $pk_id);
        $query = $this->db->get('db_test_table');
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->row();
        }
    }

    public function update_test($pkid,$image){
    	if ('' !== $image) {
            $data = array(
               'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'input_field' => $this->input->post('input_field'),
            'select_field' => $this->input->post('select_field'),
            'radio_field' => $this->input->post('radio_field'),
            'image_field' => $image,
            'color_picker_field' => $this->input->post('color_picker_field'),
            'date_picker_field' => $this->input->post('date_picker_field')
            );
        } else {
            $data = array(
               'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'input_field' => $this->input->post('input_field'),
            'select_field' => $this->input->post('select_field'),
            'radio_field' => $this->input->post('radio_field'),
            'color_picker_field' => $this->input->post('color_picker_field'),
            'date_picker_field' => $this->input->post('date_picker_field')
            );
        }

        $this->db->where('pk_test_id', $pkid);
        $this->db->update('db_test_table', $data);
    }

    public function delete_test($pkid){
    	$this->db->where('pk_test_id', $pkid);
        $this->db->delete('db_test_table');
    }
}