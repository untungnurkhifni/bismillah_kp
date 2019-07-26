<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
//mengambil dari tabel Database tb_surat
class Surat extends REST_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    //fungsi Get untuk mengambil data
    public function index_get()
    {
        //mengambil data dari database
        $data = $this->db->get('tb_surat');
        //select * from tb_surat
        $this->response([
            'success' => true,
            'message' => 'Daftar Surat',
            //fungsi result sebagai wadah
            'data'    => $data->result()
        ], 200);
    }

    public function index_post()
    {
        //untuk bagian ini penamaan bebas
        $id             = $this->post("id");
        $judul_surat    = $this->post("judul_surat");
        $jenis          = $this->post("jenis");
        $deskripsi      = $this->post("deskripsi");
     
        //mengambil nama file yang diupload
        $file_name = $_FILES['lampiran']['name'];
        //Merubah nama file yang di upload menjadi :
        $new_name = $jenis."_".date("d-m-Y")."_".time().".".pathinfo($file_name, PATHINFO_EXTENSION);
        //konfigurasi library upload
        //lokasi tempat surat akan disimpan
        $config['upload_path'] = './uploads_surat/';
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
        if ( ! $this->upload->do_upload('lampiran')) {
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
                "jenis"         => $jenis,
                "deskripsi"     => $deskripsi,
                "tanggal"       => date("Y-m-d"),
                "lampiran"      => $new_name,
                "full_surat"    => base_url().'uploads_surat/'.$new_name
            );
            //simpan ke database
            $simpan = $this->db->insert("tb_surat",$data);

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
        $surat = $this->db->select('lampiran');
        $surat = $this->db->where('id', $id);
        $surat = $this->db->get('tb_surat')->row();

        // $this->db->where('id', $id);
        // $hapus = $this->db->delete('tb_surat');
        if($surat != null){
            //fungsi unlink utntuk menghapus file
            unlink("uploads_surat/" . $surat->lampiran);
        }
        $hapus = $this->db->where('id', $id);
        $hapus = $this->db->delete('tb_surat');

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