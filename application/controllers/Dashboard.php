<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('ms_user', [
            'username' => $this->session->userdata('username')
        ])->row_array();
        echo $data['user']['username'] . ', Selamat Kamu berhasil Login!';
    }
}
