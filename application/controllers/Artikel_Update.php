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
															
	public function index_post()
	{
		//untuk bagian ini penamaan bebas
		$id 		  = $this->post("id");
		$judul        = $this->post("title_post");
		$isi_berita   = $this->post("body_post");
		$kategori 	  = $this->post("kategori");
	
		//mengambil nama file yang di upload
		$file_name   = $_FILES['file']['name'];
		//merubah nama file yang diupload menjadi :
		$new_name = $kategori."_".date("d-m-Y")."_".time().".".pathinfo($file_name, PATHINFO_EXTENSION);
		// die(json_encode($new_name));
		//konfigurasi library upload
		//lokasi tempat gambar akan disimpan
		$config['upload_path']   = './uploads_artikel/';
		//file apa saja yang boleh disimpan
		$config['allowed_types'] = '.gif|jpg|png|jpeg';
		//maksimal ukuran file /kb
		$config['max_size']      = 10000;
		//file/gambar yang disimpan akan di rename menjadi :
		$config['file_name'] = $new_name;
		//inisiasi library upload
		$this->load->library('Upload', $config);
	
		//untuk refresh image yang baru
		$gambar = $this->db->select('gambar');
		$gambar = $this->db->where('id', $id);
		$gambar = $this->db->get('tb_post')->row();
		//die(json_encode($gambar));
		if($gambar != null){
			//fungsi unlink untuk mengahpus file
			@unlink("uploads_artikel/" . $gambar->gambar);
		}
		

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
				"gambar"     => $new_name,
				"full_gambar"=> base_url().'uploads_artikel/'.$new_name
			);
			

			
			//simpan ke database
			$this->db->where('id', $id);
			$simpan = $this->db->update("tb_post",$data);

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
}