<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('My_model');
    }

    public function navbar()
    {
        $this->load->view('admin/navbar');
    }

    public function footer()
    {
        $this->load->view('admin/footer');
    }

    // FORM + LIST + EDIT
    public function home_hero($id = null)
    {
        $this->navbar();

        // edit record
        if ($id != null) {
            $res = $this->My_model->select_where('hero_banner', ['id' => $id]);
            $data['edit_banner'] = !empty($res) ? $res[0] : [];
        } else {
            $data['edit_banner'] = [];
        }

        // list
        $data['banner_list'] = $this->My_model->select_where(
            'hero_banner',
            ['status' => 1]
        );

        $this->load->view('admin/home/home_hero', $data);
        $this->footer();
    }

    // SAVE / UPDATE
    public function save_hero_banner($id = null)
    {
        extract($_POST);

        $data = [
            'title'       => $title,
            'sub_title'   => $sub_title,
            'button_text' => $button_text,
            'status'      => 1
        ];

        if (!empty($_FILES['video']['name'])) {
            $video_name = time().'_video.mp4';
            move_uploaded_file(
                $_FILES['video']['tmp_name'],
                FCPATH.'uploads/'.$video_name
            );
            $data['video'] = $video_name;
        }

        if ($id == null) {
            $this->My_model->insert('hero_banner', $data);
        } else {
            $this->My_model->update('hero_banner', ['id'=>$id], $data);
        }

        redirect('home/home_hero');
    }

    public function delete_hero($id)
    {
        $this->My_model->delete('hero_banner', ['id'=>$id]);
        redirect('home/home_hero');
    }
    
     // ================= ABOUT : SINGLE RECORD =================
    public function about()
    {
        $data = [];

        /* ================= SAVE / UPDATE ================= */
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $formData = [
                'title' => $this->input->post('title'),
                'description_1' => $this->input->post('description_1'),
                'description_2' => $this->input->post('description_2'),
                'button_text' => $this->input->post('button_text'),
                'status' => 1
            ];

            /* Image Upload */
            if (!empty($_FILES['image']['name'])) {

                $img  = time().'_'.$_FILES['image']['name'];
                $path = FCPATH.'uploads/about/';

                if (!is_dir($path)) {
                    mkdir($path, 0777, true);
                }

                move_uploaded_file(
                    $_FILES['image']['tmp_name'],
                    $path.$img
                );

                $formData['image'] = $img;
            }

            /* 🔒 SINGLE RECORD LOGIC */
            $existing = $this->db->get('about_us')->row();

            if ($existing) {
                // UPDATE existing record
                $this->db->where('id', $existing->id)
                         ->update('about_us', $formData);
            } else {
                // INSERT only once
                $this->db->insert('about_us', $formData);
            }

            redirect('home/about');
        }

        /* ================= FETCH SINGLE RECORD ================= */
        $data['about'] = $this->db->get('about_us')->row();

        /* ================= LOAD VIEW ================= */
        $this->navbar();                         // navbar include
        $this->load->view('admin/home/about', $data);
        $this->footer();                         // footer include
    } 


// ================= HOME PRODUCTS (SINGLE RECORD) =================
public function home_products()
{
    $data = [];

    /* ================= SAVE / UPDATE ================= */
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $formData = [
            'heading'     => $this->input->post('heading'),
            'title'       => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'button_text' => $this->input->post('button_text'),
            'status'      => 1
        ];

        // IMAGE UPLOAD
        if (!empty($_FILES['image']['name'])) {

            $img  = time().'_'.$_FILES['image']['name'];
            $path = FCPATH.'uploads/products/';

            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }

            move_uploaded_file(
                $_FILES['image']['tmp_name'],
                $path.$img
            );

            $formData['image'] = $img;
        }

        // SINGLE RECORD LOGIC
        $existing = $this->db->get('products_section')->row();

        if ($existing) {
            $this->db->where('id', $existing->id)
                     ->update('products_section', $formData);
        } else {
            $this->db->insert('products_section', $formData);
        }

        redirect('home/home_products'); // 🔥 URL pan change kelay
    }

    /* ================= FETCH SINGLE RECORD ================= */
    $data['products'] = $this->db->get('products_section')->row();

    /* ================= LOAD VIEW ================= */
    $this->navbar();   
    $this->load->view('admin/home/home_products', $data);
    $this->footer();   
}
// ================= HOME SERVICES (SINGLE RECORD) =================
// ================= HOME SERVICES FORM =================
public function home_services()
{
    $data['service'] = $this->db->limit(1)->get('home_services')->row();

    $this->navbar();
    $this->load->view('admin/home/home_services_form', $data);
    $this->footer();
}


// ================= SAVE / UPDATE SERVICES =================
public function save_home_services()
{
    // Get existing record (single record logic)
    $existing = $this->db->limit(1)->get('home_services')->row();

    $data = [
        'title'       => $this->input->post('title', true),
        'description' => $this->input->post('description', true),
        'button_text' => $this->input->post('button_text', true)
    ];

    // 🔥 IMAGE UPLOAD PART
    if (!empty($_FILES['image']['name'])) {

        $upload_path = FCPATH . 'uploads/';

        // Create folder if not exists
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        $config = [
            'upload_path'   => $upload_path,
            'allowed_types' => 'jpg|jpeg|png|webp',
            'encrypt_name'  => TRUE,
            'max_size'      => 5000
        ];

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {

            // Delete old image
            if (!empty($existing->image)) {
                $old_path = FCPATH . $existing->image;
                if (file_exists($old_path)) {
                    unlink($old_path);
                }
            }

            $uploadData = $this->upload->data();
            $data['image'] = 'uploads/' . $uploadData['file_name'];

        } else {
            // If upload fails show error
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('home/home_services');
            return;
        }
    }

    // 🔥 INSERT OR UPDATE
    if ($existing) {

        $this->db->where('id', $existing->id);
        $this->db->update('home_services', $data);

        $this->session->set_flashdata('success', 'Section Updated Successfully');

    } else {

        $this->db->insert('home_services', $data);

        $this->session->set_flashdata('success', 'Section Saved Successfully');
    }

    redirect('home/home_services');
}
    // ===============================
    // HOME BLOG LIST + FORM
    // ===============================
    public function home_blogs() {

        $this->navbar();   // Your navbar function

        $data['blogs'] = $this->db
                                ->order_by('id','DESC')
                                ->get('blogs_home')
                                ->result();

        $this->load->view("admin/home/home_blogs", $data);

        $this->footer();   // Your footer function
    }


    // ===============================
    // SAVE BLOG
    // ===============================
    public function save_home_blog() {

        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            $image = $this->upload->data('file_name');
        } else {
            $image = '';
        }

        $data = array(
            'title'           => $this->input->post('title'),
            'description_one' => $this->input->post('description_one'),
            'description_two' => $this->input->post('description_two'),
            'button_text'     => $this->input->post('button_text'),
            'image'           => $image
        );

        $this->db->insert('blogs_home', $data);

        redirect('home/home_blogs');
    }


    // ===============================
    // EDIT BLOG
    // ===============================
    public function edit_home_blog($id) {

        $this->navbar();

        $data['edit_blog'] = $this->db
                                   ->get_where('blogs_home', ['id' => $id])
                                   ->row();

        $data['blogs'] = $this->db
                               ->order_by('id','DESC')
                               ->get('blogs_home')
                               ->result();

        $this->load->view("admin/home/home_blogs", $data);

        $this->footer();
    }


    // ===============================
    // UPDATE BLOG
    // ===============================
    public function update_home_blog($id) {

        $blog = $this->db
                      ->get_where('blogs_home', ['id' => $id])
                      ->row();

        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {

            // Delete old image
            if (!empty($blog->image) && file_exists('./uploads/'.$blog->image)) {
                unlink('./uploads/'.$blog->image);
            }

            $image = $this->upload->data('file_name');

        } else {
            $image = $blog->image;
        }

        $data = array(
            'title'           => $this->input->post('title'),
            'description_one' => $this->input->post('description_one'),
            'description_two' => $this->input->post('description_two'),
            'button_text'     => $this->input->post('button_text'),
            'image'           => $image
        );

        $this->db->where('id', $id);
        $this->db->update('blogs_home', $data);

        redirect('home/home_blogs');
    }


    public function delete_home_blog($id) {

        $blog = $this->db
                      ->get_where('blogs_home', ['id' => $id])
                      ->row();

        // Delete image from folder
        if (!empty($blog->image) && file_exists('./uploads/'.$blog->image)) {
            unlink('./uploads/'.$blog->image);
        }

        $this->db->where('id', $id);
        $this->db->delete('blogs_home');

        redirect('home/home_blogs');
}

public function home_leading()
{
    $this->navbar();

    $data['leading'] = $this->db->get('leading_section')->row();

    $this->load->view("admin/home/home_leading", $data);

    $this->footer();
}

public function save_home_leading()
{
    $existing = $this->db->get('leading_section')->row();

    // ===== Upload Configuration =====
    $config['upload_path']      = FCPATH . 'uploads/';
    $config['allowed_types']    = '*';   // Allow all to avoid filetype error
    $config['encrypt_name']     = TRUE;
    $config['max_size']         = 10000; // 10MB
    $config['file_ext_tolower'] = TRUE;
    $config['remove_spaces']    = TRUE;

    $this->load->library('upload');
    $this->upload->initialize($config);

    $image = '';

    // ===== Check if file selected =====
    if (!empty($_FILES['image']['name'])) {

        if ($this->upload->do_upload('image')) {

            // Delete old image if exists
            if (!empty($existing->image) && file_exists(FCPATH . 'uploads/'.$existing->image)) {
                unlink(FCPATH . 'uploads/'.$existing->image);
            }

            $uploadData = $this->upload->data();
            $image = $uploadData['file_name'];

        } else {
            // If upload fails, keep old image
            $image = !empty($existing->image) ? $existing->image : '';
        }

    } else {
        $image = !empty($existing->image) ? $existing->image : '';
    }

    $data = array(
        'main_heading' => $this->input->post('main_heading'),
        'sub_heading'  => $this->input->post('sub_heading'),
        'button_text'  => $this->input->post('button_text'),
        'image'        => $image
    );

    if ($existing) {
        $this->db->where('id', $existing->id);
        $this->db->update('leading_section', $data);
    } else {
        $this->db->insert('leading_section', $data);
    }

    redirect('home/home_leading');
}

// =====================================
// FAQ LIST PAGE
// =====================================
public function home_faq()
{
    $this->navbar();

    $data['faqs'] = $this->db
                          ->order_by('id','DESC')
                          ->get('faqs')
                          ->result();

    $this->load->view("admin/home/home_faq", $data);

    $this->footer();
}


public function save_home_faq()
{
    $data = array(
        'question' => $this->input->post('question'),
        'answer'   => $this->input->post('answer')
    );

    $this->db->insert('faqs', $data);

    redirect('home/home_faq');
}


public function edit_home_faq($id)
{
    $this->navbar();

    $data['edit_faq'] = $this->db
                              ->get_where('faqs', ['id' => $id])
                              ->row();

    $data['faqs'] = $this->db
                          ->order_by('id','DESC')
                          ->get('faqs')
                          ->result();

    $this->load->view("admin/home/home_faq", $data);

    $this->footer();
}


public function update_home_faq($id)
{
    $data = array(
        'question' => $this->input->post('question'),
        'answer'   => $this->input->post('answer')
    );

    $this->db->where('id', $id);
    $this->db->update('faqs', $data);

    redirect('home/home_faq');
}


public function delete_home_faq($id)
{
    $this->db->where('id', $id);
    $this->db->delete('faqs');

    redirect('home/home_faq');
}
 
// ================= TESTIMONIAL =================

public function testimonial($id = null)
{
    $data['testimonial'] = $id 
        ? $this->db->get_where('testimonials', ['id'=>$id])->row()
        : null;

    $data['testimonials'] = $this->db
        ->order_by('id','DESC')
        ->get('testimonials')
        ->result();

    $this->navbar();
    $this->load->view("admin/home/testimonial", $data);
    $this->footer();
}


public function save_testimonial()
{
    $id = $this->input->post('id');

    $upload_path = FCPATH . 'uploads/testimonials/';

    if (!is_dir($upload_path)) {
        mkdir($upload_path, 0777, true);
    }

    $config = [
        'upload_path'   => $upload_path,
        'allowed_types' => 'jpg|jpeg|png|webp',
        'max_size'      => 28048,
        'encrypt_name'  => TRUE
    ];

    $this->load->library('upload', $config);

    $imageName = null;

    if (!empty($_FILES['image']['name'])) {

        if ($this->upload->do_upload('image')) {

            $imageName = $this->upload->data('file_name');

            // Delete old image
            if ($id) {
                $old = $this->db->get_where('testimonials', ['id'=>$id])->row();
                if ($old && $old->image && file_exists($upload_path.$old->image)) {
                    unlink($upload_path.$old->image);
                }
            }

        } else {
            echo $this->upload->display_errors();
            die;
        }
    }

    // 🔒 Message 20 word limit
    $message = $this->input->post('message', TRUE);
    $words = preg_split('/\s+/', trim($message));

    if(count($words) > 6){
        $message = implode(' ', array_slice($words, 0, 6));
    }

    $data = [
        'name'    => $this->input->post('name', TRUE),
        'role'    => $this->input->post('role', TRUE),
        'message' => $message,
        'rating'  => $this->input->post('rating')
    ];

    if ($imageName) {
        $data['image'] = $imageName;
    }

    if ($id) {
        $this->db->update('testimonials', $data, ['id'=>$id]);
    } else {
        $this->db->insert('testimonials', $data);
    }

    redirect('home/testimonial');
}



public function delete_testimonial($id)
{
    $upload_path = FCPATH . 'uploads/testimonials/';

    $row = $this->db->get_where('testimonials', ['id'=>$id])->row();

    if ($row) {

        if ($row->image && file_exists($upload_path.$row->image)) {
            unlink($upload_path.$row->image);
        }

        $this->db->delete('testimonials', ['id'=>$id]);
    }

    redirect('home/testimonial');
}




}