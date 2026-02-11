<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commercial_model extends CI_Model
{
    /* ================= ABOUT ================= */

    public function commercial_about()
    {
        return $this->db->get('commercial_about')->row();
    }

    /* ================= POINTS ================= */

    public function commercial_points()
    {
        return $this->db->get('commercial_points')->result();
    }

    /* ================= SUITABLE ================= */

    public function commercial_suitable()
    {
        return $this->db->get('commercial_suitable')->result();
    }

    /* ================= BENEFITS ================= */

    public function commercial_benefits()
    {
        return $this->db->get('commercial_benefits')->result();
    }
}
