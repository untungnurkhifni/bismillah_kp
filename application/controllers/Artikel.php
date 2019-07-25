<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
//mengambil dari tabel Database tb_post
class Artikel extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	//fungsi Get untuk mengambil data
	public function index_get()
	{
		//mengambil data dari database
		$data = $this->db->get('tb_post');
		//"select * from tb_post"
		$this->response([
			'success' => true,
			'message' => 'Daftar Artikel',
			//fungsi result sebagai wadah
			'data'    => $data->result()
		], 200);
	}
															
	public function index_post()
	{
		//untuk bagian ini penamaan bebas
		$id 		  = $this->post("id");
		$judul        = $this->post("title_post");
		$isi_berita   = $this->post("body_post");
		//$tanggal     = $this->post("tanggal");
		$kategori 	  = $this->post("kategori");

		//mengambil nama file yang di upload
		$file_name   = $_FILES['file']['name'];
		//merubah nama file yang diupload menjadi :
		$new_name = $kategori."_".date("d-m-Y")."_".time().".".pathinfo($file_name, PATHINFO_EXTENSION);
		//konfigurasi library upload
		//lokasi tempat gambar akan disimpan
		$config['upload_path']   = './uploads_artikel/';
		//file apa saja yang boleh disimpan
		$config['allowed_types'] = '.gif|jpg|png|jpeg';
		//maksimal ukuran file 10Mb
		$config['max_size']      = 10000;
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
					'data'    => '404'
				], 200);
			}
		}
	}
		
		//untuk bagian id,title_post dsb, menyesuaikan tabel di Database
		

		// $this->load->library('upload', $config);
		// if ( ! $this->upload->do_upload('berkas')) {
		// 	$error = array('error' => $this->upload->display_errors());
		// 	$this->load->view('v_upload', $error);
		// } else {
		// 	$data = array('upload_data' => $this->upload->data());
		// 	$this->load->view('v_upload_sukses', $data);
		// }

	public function index_delete()
	{
		$id     = $this->delete('id');
		$gambar = $this->db->select('gambar');
		$gambar = $this->db->where('id', $id);
		$gambar = $this->db->get('tb_post')->row();
		//die(json_encode($gambar));
		if($gambar != null){
			//fungsi unlink untuk mengahpus file
			@unlink("uploads_artikel/" . $gambar->gambar);
		}
		$hapus = $this->db->where('id', $id);
		$hapus = $this->db->delete('tb_post');
		
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