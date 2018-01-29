<?php

class Item_model extends CI_Model {
    function fetch($table, $where = NULL, $orderby = NULL, $order = NULL, $limit = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        if (!empty($orderby) AND !empty($order)) {
            $this->db->order_by($orderby, $order);
        }
        if (!empty($limit)) {
            $this->db->limit($limit);
        }
        $query = $this->db->get($table);
        return ($query->num_rows()) ? $query->result() : FALSE;
    }

    function avg($table, $where = NULL, $avg){
        $this->db->select_avg($avg);
        $this->db->where($where);
        $query = $this->db->get($table);
        return $query->row();
    }

    
    function insert_id($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    function insertData($table, $arrayData) {
        return $this->db->insert($table, $arrayData);
    }

    function updatedata($table, $data, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        return $this->db->update($table, $data); # true or false
    }

    function delete($table, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->delete($table);
    }

    function getDistinct($table, $where, $column, $order) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->order_by($column, $order);
        $this->db->select($column);
        $this->db->distinct();
        $query = $this->db->get($table);
        return ($query->num_rows()) ? $query->result() : FALSE;
    }

    function getCount($table, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return $query->num_rows();
    }

    function getItemsWithLimit($table, $limit = NULL, $offset = NULL, $orderby = NULL, $order = NULL, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->limit($limit);
        $this->db->offset($offset);
        $this->db->order_by($orderby, $order);
        $query = $this->db->get($table);
        return $query->result();
    }

    function getLogWithLimit($limit, $offset, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->limit($limit);
        $this->db->offset($offset);
        $this->db->order_by('log_id', 'DESC');
        $query = $this->db->get('user_log');
        return $query->result();
    }

    function getTrailWithLimit($limit, $offset, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->limit($limit);
        $this->db->offset($offset);
        $this->db->order_by('at_id', 'DESC');
        $query = $this->db->get('audit_trail');
        return $query->result();
    }

    function search($table, $where, $like) {
        $this->db->like($where, $like);
        $query = $this->db->get($table);
        return ($query->num_rows()) ? $query->result() : FALSE;
    }

    function getCountsearch($table, $where = NULL, $like) {
        
        if (!empty($like && $where)) {
            $this->db->like($where,$like);
        }

        $query = $this->db->get($table);
        return $query->num_rows();
    }
    
    function getItemsWithLimitSearch($table, $limit = NULL, $offset = NULL, $orderby = NULL, $order = NULL, $where = NULL, $like) {
        
        if (!empty($like && $where)) {
            $this->db->like($where,$like);
        }


        $this->db->limit($limit);
        $this->db->offset($offset);
        $this->db->order_by($orderby, $order);
        $query = $this->db->get($table);
        return $query->result();
    }

    function getSalt($table, $column, $table_id, $id) {
        # salt from the column should be unique
        $query_string = "SELECT $column FROM $table WHERE $table_id = $id";
        $query = $this->db->query($query_string);
        return ($query->row()->$column); # to be sha1() or not?
    }

    function setPassword($string, $salt /*$table, $column, $table_id, $id*/) {
        #  $salt = $this->getSalt($table, $column, $table_id, $id);
        $string = password_hash($salt.$string, PASSWORD_DEFAULT);
        return $string;
    }

}
