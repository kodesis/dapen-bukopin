<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
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
    public function index()
    {
        if ($this->session->userdata('user_logged_in') == 'true') {
            redirect('dashboard');
        }

        $data['content']  = 'webview/auth/login/login_view';
        $data['content_js'] = 'webview/auth/login/login_js';
        $this->load->view('_parts/Wrapper_auth', $data);
    }

    public function login_process()
    {

        $this->load->model('Auth_m', 'login');

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $active     = 1;


        $user = $this->login->user_login($username, $password, $active);

        if (!empty($user)) {

            if ($user->role_id == 1) {
                $role = 'Admin';
            } else if ($user->role_id == 2) {
                $role = 'User';
            }
            $this->session->set_userdata([
                'user_user_id'   => $user->uid,
                'username'  => $user->email,
                'name'  => $user->nama,
                'role_id'      => $user->role_id,
                'role'      => $role,
                // 'user_email'      => $user->email,
                // 'last_acces_time'      => $user->last_acces,
                'user_logged_in' => true
            ]);

            if ($user->role_id == 1) {
                echo json_encode(array("status" => 'admin'));
            } else if ($user->role_id == 2) {
                echo json_encode(array("status" => 'user'));
            }
        } else {
            echo json_encode(array("status" => 'Gagal Cari'));
        }
    }
    public function logout()
    {

        $this->session->unset_userdata('user_user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('user_logged_in');
        // $this->session->unset_userdata('user_email');
        $this->session->sess_destroy();

        $url = base_url();
        redirect('auth');
    }
}
