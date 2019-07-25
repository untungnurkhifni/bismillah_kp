<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
//mengambil dari tabel Database tb_user
class User extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    //Fungsi Get untuk mengambil data
    public function index_get()
    {
        //mengambil data dari database
        $data = $this->db->get('tb_user');

        $this->response([ 
            'success' => true,
            'message' => 'API',
            //fungsi result sebagai wadah
            'data'    => $data->result()

        ], 200);
    }

    public function index_post()
    {
        $id         = $this->post("id");
        $nama       = $this->post("nama");
        $nidn       = $this->post("nidn");
        $email      = $this->post("email");
        $password   = $this->post("password");
        $kategori   = $this->post("kategori");

        $data = array(
            "id"        => $id,
            "nama"      => $nama,
            "nidn"      => $nidn,
            "email"     => $email,
            "password"  => md5($password),
            "kategori"  => $kategori
        );

        $simpan = $this->db->insert("tb_user",$data);

        if($simpan){
            $this->response([
                'success' => true,
                'message' => 'Data Berhasil Dikirim',
                'data'    => '404'
            ], 200);
        } else {
            $this->response([
                'success' => false,
                'message' => 'Data Gagal Dikirim',
                'data'    => '404'
            ], 200);
        }
    }

    public function index_put()
    {
        $id         = $this->put("id");
        $nama       = $this->put("nama");
        $nidn       = $this->put("nidn");
        $email      = $this->put("email");
        $password   = $this->put("password");
        $kategori   = $this->put("kategori");

        $data       = array (
            'nama'      => $nama,
            'nidn'      => $nidn,
            'email'     => $email,
            'password'  => md5($password),
            'kategori'  => $kategori
        );
        $this->db->where('id', $id);

        $ubah = $this->db->update('tb_user',$data);
        if($ubah) {
            $this->response([
                'success' => true,
                'message' => 'Data Berhasil Terkirim',
                'data'    => '404'
            ], 200);
        } else {
            $this->response([
                'success' => false,
                'message' => 'Data Gagal Dikirim',
                'data'    => '404'
            ], 200);
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id');
        $this->db->where('id', $id);
        $hapus = $this->db->delete('tb_user');
        if($hapus){
            $this->response([
                'success' => true,
                'message' => 'Data Berhasil Terhapus',
                'data'    => '404'
            ], 200);
        } else {
            $this->response([
                'success' => false,
                'message' => 'Data Gagal Dihapus',
                'data'    => '404'
            ], 200);
        }
    }
}