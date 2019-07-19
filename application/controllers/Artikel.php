<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Artikel extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index_get()
	{
		$data = $this->db->get('tb_post');
		$this->response([
			'success' => true,
			'message' => 'Daftar Artikel',
			'data' => $data->result()
		], 200);
	}

	public function index_post()
	{
		$title_post = $this->post("judul");
		$body_post = $this->post("isi");
		$date_post = $this->post("tanggal");

		$data = array(	
			
            "title_post" => $title_post,
			"body_post" => $body_post,
			"date" => date("Y-m-d")
		);

		$simpan = $this->db->insert("tb_post",$data);

		if($simpan){
			$this->response([
				'success' => true,
				'message' => 'Data Berhasil Terkirim',
				'data' => '404'
			], 200);
		} else {
			$this->response([
				'success' => false,
				'message' => 'Data Gagal Dikirim',
				'data' => '404'
			], 200);
		}
		
	}

	public function index_put()
	{
		$id_post = $this->put("id");
		$title_post = $this->put("title_post");
		$body_post = $this->put("body_post");
		$date_post = $this->put("date");
		
        $data = array (
			"id_post" => $id_post,
            "title_post" => $title_post,
			"body_post" => $body_post,
			"date_post" => $date_post
		);
		$this->db->where('id_post',$id_post);

		$ubah = $this->db->update('tb_post',$data);
		if($ubah) {
			$this->response([
				'success' => true,
				'message' => 'Data Berhasil Terkirim',
				'data' => '404'
			], 200);
		} else {
			$this->response([
				'success' => false,
				'message' => 'Data Gagal Dikirim',
				'data' => '404'
			], 200);	
		}
	}

	public function index_delete()
	{
		$id_post = $this->query('id_post');
		$this->db->where('id_post', $id_post);
		$hapus = $this->db->delete('tb_post');
		if($hapus){
			$this->response([
				'success' => true,
				'message' => 'Data Berhasil Terhapus',
				'data' => '404'
			], 200);
		} else {
			$this->response([
				'success' => false,
				'message' => 'Data Gagal Dihapus',
				'data' => '404'
			], 200);
		}
	}
}