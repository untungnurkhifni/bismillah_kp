<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
//mengambil dari tabel Database tb_post
class Prestasi extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index_get()
	{
		$data = $this->db->get('tb_post');
		//"select * from tb_user"
		$this->response([
			'success' => true,
			'message' => 'Daftar Prestasi',
			'data' => $data->result()
		], 200);
	}
															
	public function index_post()
	{
		//untuk bagin ini penamaan bebas
		$id 		  = $this->post("id");
		$judul        = $this->post("title_post");
		$isi_berita   = $this->post("body_post");
		$tanggal      = $this->post("tanggal");
		$kategori 	  = $this->post("kategori");
		$gambar		  = $this->post("gambar");

		//untuk bagian id,title_post dsb, menyesuaikan tabel di Database
		$data = array(	
			"id"         => $id,
            "title_post" => $judul,
			"body_post"  => $isi_berita,
			"date"       => date("Y-m-d"),
			"kategori"   => $kategori,
			"gambar"     => $gambar
		);

		$simpan = $this->db->insert("tb_post",$data);

		if($simpan){
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

	public function index_put()
	{
		$id         = $this->put("id");
		$judul      = $this->put("title_post");
		$isi_berita = $this->put("body_post");
		$tanggal    = $this->put("tanggal");
		$kategori   = $this->put("kategori");
		$gambar     = $this->put("gambar");
		
        $data = array (
			"id"         => $id,
            "title_post" => $judul,
			"body_post"  => $isi_berita,
			"date"       => $tanggal,
			"kategori"   => $kategori,
			"gambar"     => $gambar
		);
		$this->db->where('id',$id);

		$ubah = $this->db->update('tb_post',$data);
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
		$hapus = $this->db->delete('tb_post');
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