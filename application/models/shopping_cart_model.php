<?php
class Shopping_cart_model extends CI_Model
{
    function fetch_all()
    {
        $query = $this->db->get("product");
        return $query->result();
    }
}