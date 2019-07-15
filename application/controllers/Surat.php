<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Surat extends REST_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    //fungsi Get untuk mengambil data
    public function index_get()
    {
        //mengambil data dari database
        $data = $this->db->get('tb_surat');
        
        $this->response([
            'success' => true,
            'message' => 'API',
            //fungsi result sebagai wadah
            'data' => $data->result()
        ], 200);
    }

    public function index_post()
    {
        $id             = $this->post("id");
        $judul_surat    = $this->post("judul_surat");
        $jenis          = $this->post("jenis");
        $deskripsi      = $this->post("deskripsi");
        $tanggal        = $this->post("tanggal");
        $lampiran       = $this->post("lampiran");

        $data = array(
            "id"            => $id,
            "judul_surat"   => $judul_surat,
            "jenis"         => $jenis,
            "deskripsi"     => $deskripsi,
            "tanggal"       => $tanggal,
            "lampiran"      => $lampiran
        );

        $simpan = $this->db->insert("tb_surat",$data);

        if($simpan){
            $this->response([
                'success' => true,
                'message' => 'Data Berhasil Disimpan',
                'data'    => '404'
            ], 200);
        } else {
            $this->response([
                'success' => false,
                'message' => 'Data Gagal Disimpan',
                'data'    => '404'
            ], 200);
        }
    }

    public function index_put()
    {
        $id          = $this->put("id");
        $judul_surat = $this->put("judul_surat");
        $jenis       = $this->put("jenis");
        $deskripsi   = $this->put("deskripsi");
        $tanggal     = $this->put("tanggal");
        $lampiran    = $this->put("lampiran");

        $data        = array (
            'judul_surat' => $judul_surat,
            'jenis'       => $jenis,
            'deskripsi'   => $deskrispi,
            'tanggal'     => $tanggal,
            'lampiran'    => $lampiran
       
        );
        $this->db->where('id', $id);

        $ubah = $this->db->update('tb_surat',$data);
        if($ubah) {
            $this->response([
                'success' => true,
                'message' => 'Data berhasil tersimpan',
                'data'    => '404'
            ], 200);
        } else {
            $this->response([
                'success' =>  false,
                'message' => 'Data berhasil terupdate',
                'data'    => '404'
            ], 200);
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id');
        $this->db->where('id', $id);
        $hapus = $this->db->delete('tb_surat');
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