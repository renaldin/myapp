<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Blog_model');
    }
    

    public function index($offset = 0)
    {
        $this->load->library('pagination');

        $config['base_url']     = site_url('blog/index');
        $config['total_rows']   = $this->Blog_model->getTotalBlogs();
        $config['per_page']     = 3;

        $this->pagination->initialize($config);

        $query = $this->Blog_model->getBlogs($config['per_page'], $offset);
        $data['blogs'] = $query->result_array();

        $this->load->view('blog', $data);
    }

    public function detail($url)
    {
        $query = $this->Blog_model->getSingleBlog('url', $url);
        $data['blog'] = $query->row_array();

        $this->load->view('detail', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required|alpha_dash');
        $this->form_validation->set_rules('content', 'Content', 'required');

        if ($this->form_validation->run() === True) {
            $data['title'] = $this->input->post('title');
            $data['content'] = $this->input->post('content');
            $data['url'] = $this->input->post('url');

            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 1000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('cover'))
            {
                echo $this->upload->display_errors(); 
            } else {
                $data['cover'] = $this->upload->data()['file_name'];
            }
            
            $id = $this->Blog_model->insertBlog($data);

            if ($id) {
                $this->session->set_flashdata('message', '<div class="alert alert-success">Data has been saved</div>');
                redirect('/');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Data has not been saved</div>');
                redirect('/');
            }
        }
        

        $this->load->view('form_add');
    }

    public function edit($id)
    {
        $query = $this->Blog_model->getSingleBlog('id', $id);
        $data['blog'] = $query->row_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required|alpha_dash');
        $this->form_validation->set_rules('content', 'Content', 'required');

        if ($this->form_validation->run() === true) {
            $post['title'] = $this->input->post('title');
            $post['content'] = $this->input->post('content');
            $post['url'] = $this->input->post('url');

            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 1000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);
            $this->upload->do_upload('cover');

            if (!empty($this->upload->data()['file_name'])) {
                $post['cover'] = $this->upload->data()['file_name'];
            }
            
            $id = $this->Blog_model->updateBlog($id, $post);

            if ($id) {
                $this->session->set_flashdata('message', '<div class="alert alert-success">Data has been saved</div>');
                redirect('/');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Data has not been saved</div>');
                redirect('/');
            }
        }

        $this->load->view('form_edit', $data);
    }

    public function delete($id)
    {
        $result = $this->Blog_model->deleteBlog($id);
        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data has been deleted</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data has not been deleted</div>');
        }
        redirect('/');
    }

    public function login()
    {
        if ($this->input->post()) {
            # code...
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            if ($username == 'admin' && $password == 'admin') {
                $_SESSION['username'] = 'admin';
                
                redirect('/');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Username or password has not valid!</div>');
                redirect('blog/login');
            }
        }
            
        $this->load->view('login');
        
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }

}

/* End of file Blog.php */