<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commercial extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Commercial_model');
        $this->load->helper('text');

    }

    private function page($view, $data = [])
    {
        $this->load->view('admin/navbar');
        $this->load->view('admin/'.$view, $data);
        $this->load->view('admin/footer');
    }

    /* ================= ABOUT ================= */

    public function commercial_about()
    {
        $data['about'] = $this->Commercial_model->commercial_about();
        $this->page('commercial_about', $data);
    }

   public function update_commercial_about()
{
    $about = $this->Commercial_model->commercial_about();

    $data['description'] = $this->input->post('description');

    if (!empty($_FILES['image']['name'])) {

        $config['upload_path']   = FCPATH.'uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|webp';
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('image')) {

            $this->session->set_flashdata(
                'error',
                $this->upload->display_errors('', '')
            );

            redirect('commercial/commercial_about');
            return;
        }

        // DELETE OLD IMAGE
        if (!empty($about->image)) {
            $old = FCPATH.'uploads/'.$about->image;
            if (file_exists($old)) {
                unlink($old);
            }
        }

        $upload = $this->upload->data();
        $data['image'] = $upload['file_name'];
    }

    $this->db->where('id', 1)
             ->update('commercial_about', $data);

    $this->session->set_flashdata(
        'success',
        'Commercial About updated successfully'
    );

    redirect('commercial/commercial_about');
}


    /* ================= POINTS ================= */

    public function commercial_points()
    {
        $data['points'] = $this->Commercial_model->commercial_points();
        $this->page('commercial_points', $data);
    }

    public function add_point()
    {
        $this->db->insert('commercial_points', [
            'point' => $this->input->post('point')
        ]);
        redirect('commercial/commercial_points');
    }

    public function update_point($id)
    {
        $this->db->where('id', $id)
                 ->update('commercial_points', [
                     'point' => $this->input->post('point')
                 ]);
        redirect('commercial/commercial_points');
    }

    public function delete_point($id)
    {
        $this->db->where('id', $id)
                 ->delete('commercial_points');
        redirect('commercial/commercial_points');
    }

    /* ================= SUITABLE ================= */

    public function commercial_suitable()
    {
        $data['suitable'] = $this->Commercial_model->commercial_suitable();
        $this->page('commercial_suitable', $data);
    }

    public function add_suitable()
    {
        $this->db->insert('commercial_suitable', [
            'title' => $this->input->post('title')
        ]);
        redirect('commercial/commercial_suitable');
    }

    public function update_suitable($id)
    {
        $this->db->where('id', $id)
                 ->update('commercial_suitable', [
                     'title' => $this->input->post('title')
                 ]);
        redirect('commercial/commercial_suitable');
    }

    public function delete_suitable($id)
    {
        $this->db->where('id', $id)
                 ->delete('commercial_suitable');
        redirect('commercial/commercial_suitable');
    }

    /* ================= BENEFITS ================= */

    public function commercial_benefits()
    {
        $data['benefits'] = $this->Commercial_model->commercial_benefits();
        $this->page('commercial_benefits', $data);
    }

    public function add_benefit()
    {
        $this->db->insert('commercial_benefits', [
            'title' => $this->input->post('title')
        ]);
        redirect('commercial/commercial_benefits');
    }

    public function update_benefit($id)
    {
        $this->db->where('id', $id)
                 ->update('commercial_benefits', [
                     'title' => $this->input->post('title')
                 ]);
        redirect('commercial/commercial_benefits');
    }

    public function delete_benefit($id)
    {
        $this->db->where('id', $id)
                 ->delete('commercial_benefits');
        redirect('commercial/commercial_benefits');
    }
}
