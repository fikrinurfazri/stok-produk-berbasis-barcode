<?php

class User_model extends CI_Model
{
    public function getuser()
    {

        return $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();
    }
}
