<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_about extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /* ================= GET ================= */

    // ADMIN – Brand List
    public function get_brands()
    {
        return $this->db->get('about_brand')->result();
    }

    // USER – Single Brand
    public function get_brand()
    {
        return $this->db->get('about_brand')->row();
    }

    // USER – Vision (single)
    // ADMIN – list
public function get_visions()
{
    return $this->db->get('about_vision')->result();
}

// USER – single
public function get_vision()
{
    return $this->db->get('about_vision')->row();
}


    // TEAM – List
    public function get_team()
    {
        return $this->db->get('team_members')->result();
    }

    // BUSINESS VERTICALS – List
    public function get_verticals()
    {
        return $this->db->get('business_verticals')->result();
    }

    // COMMON – Get single row by ID (🔥 THIS FIXES EDIT ERROR)
    public function get_by_id($table, $id)
    {
        return $this->db
                    ->where('id', $id)
                    ->get($table)
                    ->row();
    }

    /* ================= INSERT ================= */

    public function insert_brand($data)
    {
        return $this->db->insert('about_brand', $data);
    }

    public function insert_vision($data)
    {
        return $this->db->insert('about_vision', $data);
    }

    public function insert_team($data)
    {
        return $this->db->insert('team_members', $data);
    }

    public function insert_vertical($data)
    {
        return $this->db->insert('business_verticals', $data);
    }

    /* ================= UPDATE ================= */

    public function update_by_id($table, $id, $data)
    {
        return $this->db
                    ->where('id', $id)
                    ->update($table, $data);
    }

    /* ================= DELETE ================= */

    public function delete_by_id($table, $id)
    {
        return $this->db
                    ->where('id', $id)
                    ->delete($table);
    }
}
