<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Service_model');
    }

    /* ====================================================
       1️⃣ CARD SECTION (ONLY UPDATE - 3 FIXED)
    ==================================================== */

    public function service_card(){

        $data['services'] = $this->Service_model->get_services();

        $this->load->view('admin/navbar');
        $this->load->view('admin/service/service_card', $data);
        $this->load->view('admin/footer');
    }

    public function update_card($id){

        if($this->input->post()){

            $data = [
                'title'      => $this->input->post('title'),
                'short_desc' => $this->input->post('short_desc'),
                'slug'       => $this->input->post('slug')
            ];

            /* IMAGE UPLOAD */
            if(!empty($_FILES['image']['name'])){

                $config['upload_path']   = './uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png|webp';
                $config['encrypt_name']  = TRUE;

                $this->load->library('upload', $config);

                if($this->upload->do_upload('image')){
                    $upload_data = $this->upload->data();
                    $data['image'] = $upload_data['file_name'];
                }
            }

            $this->Service_model->update_service($id, $data);
            redirect('service/service_card');
        }
    }

    /* ====================================================
       2️⃣ DETAILS SECTION
    ==================================================== */

    public function service_details(){

        $data['details'] = $this->Service_model->get_details();

        $this->load->view('admin/navbar');
        $this->load->view('admin/service/service_details', $data);
        $this->load->view('admin/footer');
    }

    public function add_detail(){

        if($this->input->post()){

            $data = [
                'service_id' => $this->input->post('service_id'),
                'heading'    => $this->input->post('heading'),
                'description'=> $this->input->post('description')
            ];

            if(!empty($_FILES['image']['name'])){

                $config['upload_path']   = './uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png|webp';
                $config['encrypt_name']  = TRUE;

                $this->load->library('upload', $config);

                if($this->upload->do_upload('image')){
                    $upload_data = $this->upload->data();
                    $data['image'] = $upload_data['file_name'];
                }
            }

            $this->Service_model->insert_detail($data);
            redirect('service/service_details');
        }
    }

    /* ====================================================
       3️⃣ POINTS SECTION
    ==================================================== */

    public function service_points($detail_id = NULL){

        if($detail_id == NULL){
            show_404();
        }

        $data['detail'] = $this->Service_model->get_detail($detail_id);
        $data['points'] = $this->Service_model->get_points($detail_id);

        $this->load->view('admin/navbar');
        $this->load->view('admin/service/service_points', $data);
        $this->load->view('admin/footer');
    }

    public function add_point($detail_id){

        if($this->input->post()){

            $data = [
                'detail_id' => $detail_id,
                'point_text'=> $this->input->post('point_text')
            ];

            $this->Service_model->insert_point($data);
            redirect('service/service_points/'.$detail_id);
        }
    }

}
