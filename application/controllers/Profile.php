<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */

    function __construct()
    {
        // require_once APPPATH . 'third_party/PhpSpreadsheet/src/Bootstrap.php';
        parent::__construct();
        $this->load->model('Profile_m', 'profile');
        // if (!$this->session->userdata('user_logged_in')) {
        // 	redirect('auth'); // Redirect to the 'autentic' page
        // }
    }
    public function index()
    {
        $data['profile'] = $this->profile->get_detail_profile(); // Ensure data is assigned to 'formulir'
        $data['content']  = 'webview/Profile/profile_view';
        $data['content_js']  = 'webview/Profile/profile_js';
        // $data['content_js'] = 'webview/user/index/index_js';

        $this->load->view('_parts/Admin/Wrapper', $data);
    }
    public function update_profile()
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $ganti_password = $this->input->post('ganti_password'); // Checkbox value		
        $alamat = $this->input->post('alamat');

        $data_update = [
            'updated'           => $date->format('Y-m-d H:i:s'),
            'nama'             => $nama,
            'email'            => $email,
            'alamat'           => $alamat,
        ];

        if ($ganti_password) {
            $password1 = $this->input->post('password1');
            $data_update['password'] = password_hash($password1, PASSWORD_BCRYPT);
        }

        $this->profile->update_user($data_update, array('uid' => $this->session->userdata('user_user_id')));
        echo json_encode(array("status" => TRUE));
    }
}
