<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

    public function getBlogs($limit, $offset)
    {
        $fillter = $this->input->get('find');
        $this->db->like('title', $fillter);
        $this->db->limit($limit, $offset);
        $this->db->order_by('date', 'desc');
        return $this->db->get("blog");
    }

    public function getTotalBlogs()
    {
        $fillter = $this->input->get('find');
        $this->db->like('title', $fillter);
        return $this->db->count_all_results("blog");
    }

    public function getSingleBlog($field, $value)
    {
        $this->db->where($field, $value);
        return $this->db->get('blog');
    }

    public function insertBlog($data)
    {
        $this->db->insert('blog', $data);
        return $this->db->insert_id();
    }

    public function updateBlog($id, $post)
    {
        $this->db->where('id', $id);
        $this->db->update('blog', $post);
        return $this->db->affected_rows();
    }

    public function deleteBlog($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('blog');
        return $this->db->affected_rows();
    }

}

/* End of file Blog)model.php */
