<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends CI_Controller
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
    public function index($file)
    {
        $file_path = FCPATH . 'uploads/file/' . $file;

        // Check if the file exists
        // Set headers to serve the PDF
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . $file . '"');
        header('Content-Length: ' . filesize($file_path));

        // Read the file
        readfile($file_path);
    }
    public function PDP($file)
    {
        $file_path = FCPATH . 'uploads/PDP/' . $file;

        // Check if the file exists
        if (!file_exists($file_path)) {
            show_404(); // Send a 404 error if the file doesn't exist
        }

        // Clear output buffer to avoid issues with headers
        ob_clean();

        // Set headers to serve the PDF
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="' . basename($file) . '"');
        header('Content-Length: ' . filesize($file_path));
        header('Cache-Control: no-cache, no-store, must-revalidate'); // Prevent caching
        header('Pragma: no-cache'); // HTTP 1.0
        header('Expires: 0'); // Proxies

        // Read the file
        readfile($file_path);
        exit; // Always call exit after sending the file
    }
}
