<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas_model extends CI_Model
{
    private $_table = "petugas";

    public $id_petugas;
    public $nama_petugas;
    public $id_login;
    public $image;

    public function rules()
    {
        return [

            ['field' => 'nama_petugas',
            'label' => 'Nama Petugas',
            'rules' => 'required'],
            
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id_petugas)
    {
        return $this->db->get_where($this->_table, ["id_petugas" => $id_petugas])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_petugas = $post['id_petugas'];
        $this->nama_petugas = $post["nama_petugas"];
        $this->id_login = $post["id_login"];
        $this->image = $this->_uploadImage();
        $this->db->insert($this->_table, $this);
        
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_petugas = $post['id_petugas'];
        $this->nama_petugas = $post["nama_petugas"];
        $this->id_login = $post["id_login"];
        $this->image = $this->_uploadImage();
        $this->db->update($this->_table, $this, array('id_petugas' => $post['id']));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = time().'_'.$_FILES['image']['name'];
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
		
        if (!$this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        $return = $config['file_name'];
        return $return;
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_petugas" => $id));
    }
}
