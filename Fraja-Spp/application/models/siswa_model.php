<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
    private $_table = "siswa";

    public $nisn;
    public $nis;
    public $nama;    
    public $id_kelas;
    public $alamat;
    public $no_telp;
    public $id_login;
    public $id_spp;
    public $image;
    
    public function rules()
    {
        return [
            ['field' => 'nisn',
            'label' => 'NISN',
            'rules' => 'numeric'],

            ['field' => 'nis',
            'label' => 'NIS',
            'rules' => 'numeric'],

            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'id_kelas',
            'label' => 'Kelas',
            'rules' => 'required'],

            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'],

            ['field' => 'no_telp',
            'label' => 'No. Telpon',
            'rules' => 'numeric'],

            ['field' => 'id_spp',
            'label' => 'Tahun SPP',
            'rules' => 'required'],

           
        ];
    }

    public function getAll()
    {
        //return $this->db->get($this->_table)->result();
        $this->db->select('siswa.nisn,siswa.nis,siswa.nama,siswa.image,kelas.nama_kelas,siswa.alamat,siswa.no_telp,spp.tahun');
        $this->db->from('siswa');
        $this->db->join('kelas','siswa.id_kelas=kelas.id_kelas');
        $this->db->join('spp','siswa.id_spp=spp.id_spp');
        $query=$this->db->get();
        return $query->result();
    }

    public function getSiswa()
    {
        return $this->db->get($this->_table)->result();
    }

    public function graph()
    {
        $data = $this->db->query('SELECT * from siswa');
        return $data->result();
    }
    
    public function getById($nisn)
    {
        return $this->db->get_where($this->_table, ["nisn" => $nisn])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nisn = $post["nisn"];
        $this->nis = $post["nis"];
        $this->nama = $post["nama"];
        $this->id_kelas = $post["id_kelas"];
        $this->alamat = $post["alamat"];
        $this->no_telp = $post["no_telp"];
        $this->id_login = $post["id_login"];
        $this->id_spp = $post["id_spp"];
        $this->image = $this->_uploadImage();
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->nisn = $post["nisn"];
        $this->nis = $post["nis"];
        $this->nama = $post["nama"];
        $this->id_kelas = $post["id_kelas"];
        $this->alamat = $post["alamat"];
        $this->no_telp = $post["no_telp"];
        $this->id_login = $post["id_login"];
        $this->id_spp = $post["id_spp"];
        $this->image = $this->_uploadImage();
        $this->db->update($this->_table, $this, array('nisn' => $post['nisn']));
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

    public function delete($nisn)
    {
        return $this->db->delete($this->_table, array("nisn" => $nisn));
    }
}
