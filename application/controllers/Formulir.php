<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Formulir extends CI_Controller
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
        $this->load->model('Formulir_m', 'formulir');
        // if (!$this->session->userdata('user_logged_in')) {
        // 	redirect('auth'); // Redirect to the 'autentic' page
        // }
    }
    public function Formulir_Permohonan()
    {
        $data['formulir'] = $this->formulir->get_formulir_permohonan(); // Ensure data is assigned to 'formulir'
        $data['content']  = 'webview/Formulir_permohonan/formulir_view';
        // $data['content_js'] = 'webview/user/index/index_js';

        $this->load->view('_parts/User/Wrapper', $data);
    }
    public function Formulir_Iuran()
    {
        $data['formulir'] = $this->formulir->get_formulir_iuran(); // Ensure data is assigned to 'formulir'
        $data['content']  = 'webview/Formulir_iuran/formulir_view';
        // $data['content_js'] = 'webview/user/index/index_js';

        $this->load->view('_parts/User/Wrapper', $data);
    }
    public function All_Formulir()
    {
        $data['formulir'] = $this->formulir->get_all_formulir(); // Ensure data is assigned to 'formulir'
        $data['content']  = 'webview/Formulir/formulir_view';
        // $data['content_js'] = 'webview/user/index/index_js';

        $this->load->view('_parts/User/Wrapper', $data);
    }
    // public function Detail_Formulir($file)
    // {
    //     $data['data_pdf'] = base_url('uploads/file/' . $file); // Ensure data is assigned to 'formulir'
    //     $data['content']  = 'webview/detail_view';
    //     // $data['content_js'] = 'webview/user/index/index_js';

    //     $this->load->view('_parts/User/Wrapper', $data);
    // }
    public function Detail_Formulir($file)
    {
        $file_path = FCPATH . 'uploads/file/' . $file;

        // Check if the file exists
        if (file_exists($file_path)) {
            // Set headers to serve the PDF
            header('Content-type: application/pdf');
            header('Content-Disposition: inline; filename="' . $file . '"');
            header('Content-Length: ' . filesize($file_path));

            // Read the file
            readfile($file_path);
        }
    }
}
