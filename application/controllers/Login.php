<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Login extends REST_Controller{
    
    public function __construct()
    {
        parent::__construct();
    }

    //fungsi Get untuk mengambil data
    public function index_get()
    {
       $email = $this->get('email');
       $pass  = $this->get('password');
       $where = array (
           'email'=> $email, 'password' => $pass
        );

       $this->db->where($where);
        //mengambil data dari database
        $data = $this->db->get('tb_user');

        if ($data->num_rows()>0){
            $this->response([
                'success' => true,
                'message' =>'API',
                //fungsi result sebagai wadah 
                'data'    => $data->result()
    
            ], 200);             
        } else {
            $this->response([
                'success' => false,
                'message' =>'Login Gagal',
                //fungsi result sebagai wadah
                'data'    => $data->result()
    
            ], 200);
        }

       
    }
}