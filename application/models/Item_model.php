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

    function getCount() {
        $query = $this->db->get('product');
        return $query->num_rows();
    }

    function getItemsWithLimit($limit, $offset) {
        $this->db->limit($limit);
        $this->db->offset($offset);

        $query = $this->db->get('product');
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
}
