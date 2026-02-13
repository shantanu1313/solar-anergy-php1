<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_model extends CI_Model {

    /* =============================
       1️⃣ GET 3 FIXED SERVICES
    ============================== */

    public function get_services(){
        return $this->db
                    ->order_by('id','ASC')
                    ->limit(3)
                    ->get('services')
                    ->result();
    }

    public function get_service($id){
        return $this->db
                    ->where('id',$id)
                    ->get('services')
                    ->row();
    }

    public function update_service($id,$data){
        return $this->db
                    ->where('id',$id)
                    ->update('services',$data);
    }

    /* =============================
       2️⃣ DETAILS SECTION
    ============================== */

    public function get_details(){
        return $this->db
                    ->order_by('id','ASC')
                    ->get('service_details')
                    ->result();
    }

    public function get_detail($id){
        return $this->db
                    ->where('id',$id)
                    ->get('service_details')
                    ->row();
    }

    public function insert_detail($data){
        return $this->db
                    ->insert('service_details',$data);
    }

    public function delete_detail($id){
        return $this->db
                    ->where('id',$id)
                    ->delete('service_details');
    }

    /* =============================
       3️⃣ POINTS SECTION
    ============================== */

    public function get_points($detail_id){
        return $this->db
                    ->where('detail_id',$detail_id)
                    ->get('service_points')
                    ->result();
    }

    public function insert_point($data){
        return $this->db
                    ->insert('service_points',$data);
    }

    public function delete_point($id){
        return $this->db
                    ->where('id',$id)
                    ->delete('service_points');
    }

}
