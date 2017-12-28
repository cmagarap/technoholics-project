<?php

class Item_model extends CI_Model {
    function fetch($table, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return ($query->num_rows()) ? $query->result() : FALSE;
    }

    function insertData($table, $arrayData) {
        $this->db->insert($table, $arrayData);
    }

    function updatedata($table, $data, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }

        $this->db->update($table, $data);
    }

    function delete($table, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }

        $this->db->delete($table);
    }

    function getDistinct($table, $column, $order) {
        $this->db->order_by($column, $order);
        $this->db->select($column);
        $this->db->distinct();
        $query = $this->db->get($table);
        return ($query->num_rows()) ? $query->result() : FALSE;
    }
/*
    function getCount() {
        $query = $this->db->get('product');
        return $query->num_rows();
    }
*/
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

    function search($table, $where, $like) {
        $this->db->like($where, $like);
        $query = $this->db->get($table);
        return ($query->num_rows()) ? $query->result() : FALSE;
    }

    public function getItems($page, $noOfRows) {
        $q = $this->db->get('product', $noOfRows, $page);
        return $q->result();
    }

    function getProducts($table, /*$limit, $offset,*/ $orderby, $order, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }

        #$this->db->limit($limit);
        #$this->db->offset($offset);
        $this->db->order_by($orderby, $order);
        $query = $this->db->get($table);
        return $query->result();

    }

    function getAccess($account){
       
        if ($account = "Admin Assistant"){

            $accounts = "1";
            return $accounts;
        }
        elseif ($account = "Customers"){

            $accounts = "2";
            return $accounts;
        }
    }
}


