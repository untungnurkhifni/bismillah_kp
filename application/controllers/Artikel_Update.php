<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
//mengambil dari tabel Database tb_post
class Artikel_Update extends REST_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index_get()
    {
        $data = $this->db->get('tb_post');
        //"select * from tb_post"
        $this->response([
            'success' => true,
            'message' => 'Daftar Artikel Baru',
            'data'    => $data->result()

        ], 200);
    }

    public function index_post()
	{
		//untuk bagian ini penamaan bebas
		$id 		  = $this->post("id");
		$judul        = $this->post("title_post");
		$isi_berita   = $this->post("body_post");
		$tanggal      = $this->post("tanggal");
		$kategori 	  = $this->post("kategori");

		//mengambil nama file yang di upload
		$file_name   = $_FILES['file']['name'];
		//merubah nama file yang diupload menjadi :
		$new_name = $kategori."_".date("mdy")."_".time().".".pathinfo($file_name, PATHINFO_EXTENSION);
		//konfigurasi library upload
		//lokasi tempat gambar akan disimpan
		$config['upload_path']   = './uploads/';
		//file apa saja yang boleh disimpan
		$config['allowed_types'] = '.gif|jpg|png|jpeg';
		//maksimal ukuran file /kb
		$config['max_size']      = 10000;
		//maksimal dimensi panjang file /kb
		$config['max_width']     = 25000;
		//maksimal dimensi tinggi file /kb
		$config['max_height']    = 14000;
		//file/gambar yang disimpan akan di rename menjadi :
		$config['file_name'] = $new_name;
		//inisiasi library upload
		$this->load->library('Upload', $config);
	

		//proses upload
		if ( ! $this->upload->do_upload('file')) {
			//jika gagal
			$error = array('error' => $this->upload->display_errors());
			$this->response([
				'success' => false,
				'message' => $error,
				'data' => '404'
			], 200);
		} else {
			//berhasil
			$data = array(	
				"id"         => $id,
				"title_post" => $judul,
				"body_post"  => $isi_berita,
				"date"       => date("Y-m-d"),
				"kategori"   => $kategori,
				"gambar"     => $new_name
			);
			//simpan ke database
			$simpan = $this->db->insert("tb_post",$data);
			
			if($simpan){
				//berhasil simpan
				$this->response([
					'success' => true,
					'message' => 'Data Berhasil Terkirim',
					'data' => '404'
				], 200);
			} else {
				//gagal simpan
				$this->response([
					'success' => false,
					'message' => 'Data Gagal Dikirim',
					'data' => '404'
				], 200);
			}
		}
	}