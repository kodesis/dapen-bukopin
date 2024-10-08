<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku_Layanan extends CI_Controller
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
        $this->load->model('Buku_Layanan_m', 'buku_layanan');
        // if (!$this->session->userdata('user_logged_in')) {
        // 	redirect('auth'); // Redirect to the 'autentic' page
        // }
    }
    public function index()
    {
        $data['peraturan'] = $this->buku_layanan->get_buku_layanan(); // Ensure data is assigned to 'formulir'
        $data['content']  = 'webview/buku_layanan/buku_layanan_view';
        // $data['content_js'] = 'webview/user/index/index_js';

        $this->load->view('_parts/User/Wrapper', $data);
    }
}
