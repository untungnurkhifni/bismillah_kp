<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
//mengambil dari tabel Database tb_surat
class Kaprodi extends REST_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    //fungsi Get untuk mengambil data
    public function index_get()
    {
        //mengambil data dari database
        $id= $this->get('id');
        $data = $this->db->get('tb_kaprodi');
        $data = $this->db->where('id_user', $id);
        $data = $this->db->get('tb_kaprodi');
        //select * from tb_kaprodi
        $this->response([
            'success' => true,
            'message' => 'Daftar Download Surat',
            //fungsi result sebagai wadah
            'data'    => $data->result()
        ], 200);
    }

    public function index_post()
    {
        //untuk bagian ini penamaan bebas
        $id             = $this->post("id");
        $judul_surat    = $this->post("judul_surat");
        $jenis_surat    = $this->post("jenis_surat");
        $file_surat     = $this->post("file_surat");
        $id_user        = $this->post("id_user");
       
        //mengambil nama file yang diupload, fungsi 'file' untuk jenis yang di lampiran dalam jenis file contoh misal docx,pdf
        $file_name = $_FILES['file']['name'];
        //Merubah nama file yang di upload dan fungsi $jenis_surat mengambil kebutuhan
        $new_name = $jenis_surat."_".date("d-m-Y")."_".time().".".pathinfo($file_name, PATHINFO_EXTENSION);
        //konfigurasi library upload
        //lokasi tempat surat akan disimpan
        $config['upload_path'] = './uploads_kaprodi/';
        //file apa saja yang boleh disimpan
        $config['allowed_types'] = 'pdf|doc|docx';
        //maksimal ukuran file 10Mb
        $config['max_size'] = 10000;
        //file/surat yang di simpan akan di rename menjadi:
        $config['file_name'] = $new_name;
        //inisiasi library upload
        $this->load->library('upload', $config);

        //proses upload 
        //do_upload adalah nama function
        if ( ! $this->upload->do_upload('file')) {
            //jika gagal
            $error = array('error' => $this->upload->display_errors());
            $this->response([
                'success' => false,
                'message' => $error,
                'data'    => '404'

            ], 200);
        } else {
            //jika berhasil
            $data = array(
                "id"            => $id,
                "judul_surat"   => $judul_surat,   
                "jenis_surat"   => $jenis_surat,
                "tanggal"       => date("Y-m-d"),
                "file_surat"    => base_url().'uploads_kaprodi/'.$new_name,
                "isi_surat"     => $new_name,
                "id_user"       => $id_user
            );
            //simpan ke database
            $simpan = $this->db->insert("tb_kaprodi",$data);

            if($simpan){
                //berhasil simpan
                $this->response([
                    'success' => true,
                    'message' => 'Data Berhasil Terkirim',
                    'data'    => '404'
                ], 200);
            } else {
                //gagal simpan
                $this->response([
                    'success' => false,
                    'message' => 'Data Gagal Dikirim',
                    'data'    => '404'
                ], 200);
            }
        }
    }

    public function index_delete()
    {
        $id    = $this->delete('id');
        $surat = $this->db->select('isi_surat');
        $surat = $this->db->where('id', $id);
        $surat = $this->db->get('tb_kaprodi')->row();

        // $this->db->where('id', $id);
        // $hapus = $this->db->delete('tb_surat');
        if($surat != null){
            //fungsi unlink utntuk menghapus file
            unlink("uploads_kaprodi/" . $surat->isi_surat);
        }
        $hapus = $this->db->where('id', $id);
        $hapus = $this->db->delete('tb_kaprodi');

        if($hapus){
            $this->response([
                'success' => true,
                'message' => 'Data Berhasil Terhapus',
                'data'    => $id
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