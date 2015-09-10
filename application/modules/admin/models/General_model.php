<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin General_model Model
 * @package Model
 * @subpackage Model
 * Date created:Jan 15 2015
 * @author shyam sundar awal(sndrawal50@gmail.com)
 */
class General_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function insert($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    function update($table, $data, $where) {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function delete($table, $where) {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function getAll($table, $where = NULL, $orderBy = NULL, $select = NULL, $group_by = NULL) {
        if ($select)
            $this->db->select($select);
        if ($where)
            $this->db->where($where);
        if ($orderBy)
            $this->db->order_by($orderBy);
        if ($group_by)
            $this->db->group_by($group_by);
        $query = $this->db->get($table); 
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    function getById($table, $fieldId, $id, $select = '*') {
        $this->db->select($select);
        $this->db->where($fieldId . " = '" . $id . "'");
        $query = $this->db->get($table);
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->row();
        }
    }
    function getAllById($table, $fieldId, $id,$order) {
        $this->db->select();
        $this->db->where($fieldId . " = '" . $id . "'");
        $this->db->order_by($order,'DESC'); 
        $query = $this->db->get($table);
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->row();
        }
    }


    function get_with_limit($table, $limit, $start, $search = NULL, $orderBy = NULL) {
        if ($search)
            $this->db->where($search);
        if ($orderBy)
            $this->db->order_by($orderBy, 'ASC');
        $query = $this->db->get($table, $limit, $start);
//        echo $this->db->last_query();exit;
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    function countTotal($table, $where = NULL) {
        if ($where)
            $this->db->where($where);
        $this->db->from($table);
        return $this->db->count_all_results();
    }

    function upload_file($folder, $file = '') {
        if ($file == '')
            $file = time();
        $config['upload_path'] = $this->config->item('uploads') . $folder;
        $config['allowed_types'] = "gif|jpg|jpeg|png";
        $config['max_size'] = "10716";
        $config['max_width'] = "5000";
        $config['max_height'] = "5000";
        $config['file_name'] = $file;
        $this->load->library('upload', $config);

        $this->upload->initialize($config);
        if (!$this->upload->do_upload()) {
            $thumb = '';
        } else {
            $finfo = $this->upload->data();
            $thumb = $finfo['raw_name'] . $finfo['file_ext'];
        }
        return $thumb;
    }

    function del_img($table, $where, $folder, $feild = 'image') {
        $this->db->where($where);
        $query = $this->db->get($table)->row();
        $img = $query->$feild;
        if ($img != '') {
            $path = $this->config->item('uploads') . $folder . '/' . $img;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        return true;
    }

    function unlink_img($folder, $name) {
        if ($name != '') {
            $path = $this->config->item('uploads') . $folder . '/' . $name;
            if (file_exists($path)) {
                unlink($path);
            }
        }
    }

}

/* End of file General_model.php
 * Location: ./application/modules/admin/models/General_model.php */