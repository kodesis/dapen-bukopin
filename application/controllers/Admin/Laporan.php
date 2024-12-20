<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
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
        // if (!$this->session->userdata('user_logged_in')) {
        // 	redirect('auth'); // Redirect to the 'autentic' page
        // }
        if ($this->session->userdata('user_logged_in') == null) {
            redirect('error404');
        }
    }

    public function index()
    {
        $file_path = FCPATH . 'uploads/PDP/PDP_Bank_KB_Bukopin.pdf';
        $data['data_file'] = $file_path;
        $data['content']  = 'webview/Admin/Laporan/laporan_view';
        // $data['content_js'] = 'webview/user/laporan/laporan_js';
        $this->load->view('_parts/Admin/Wrapper', $data);
    }
    public function detail($type, $id)
    {
        // $tipe = 'Laporan ' . $type;

        $this->db->select('*');
        $this->db->from('file');
        $this->db->where('uid', $id);
        $this->db->where('tipe', $type);
        $file = $this->db->get()->row();
        if (empty($file)) {
            redirect('error404');
        }
        $file = $file->file;
        $file_path = base_url('uploads/file/' . $file);
        $data['id'] = $id;

        $data['data_file'] = $file_path;
        $data['content']  = 'webview/Admin/Laporan/laporan_detail_view';
        // $data['content_js'] = 'webview/user/laporan/laporan_js';
        $this->load->view('_parts/Admin/Wrapper', $data);
    }
    // public function Detail_PDP()
    // {
    //     $file_path = base_url('uploads/PDP/PDP_Bank_KB_Bukopin.pdf');
    //     $data['data_file'] = $file_path;
    //     $data['content']  = 'webview/Admin/Laporan/laporan_detail_view';
    //     // $data['content_js'] = 'webview/user/laporan/laporan_js';
    //     $this->load->view('_parts/Admin/Wrapper', $data);
    // }
    public function PDP()
    {
        $this->db->select('*');
        $this->db->from('file');
        $this->db->where('active', 1);
        $this->db->where('tipe', 'PDP Bank KB Bukopin');
        // Order by 'tanggal' column in descending order to get the latest one
        $this->db->order_by('created', 'DESC');
        $pdp = $this->db->get()->result();

        $data['Title'] = 'PDP Bank KB Bukopin';
        $data['data_file'] = $pdp;
        $data['content']  = 'webview/Admin/Laporan/laporan_view';
        // $data['content_js'] = 'webview/user/laporan/laporan_js';
        $this->load->view('_parts/Admin/Wrapper', $data);
    }

    public function Triwulan()
    {
        $this->db->select('*');
        $this->db->from('file');
        $this->db->where('active', 1);
        $this->db->where('tipe', 'Laporan Triwulan');
        // Order by 'tanggal' column in descending order to get the latest one
        $this->db->order_by('created', 'DESC');
        $triwulan = $this->db->get()->result();

        $data['Title'] = 'Laporan Triwulan';
        $data['data_file'] = $triwulan;
        $data['content']  = 'webview/Admin/Laporan/laporan_view';
        // $data['content_js'] = 'webview/user/laporan/laporan_js';
        $this->load->view('_parts/Admin/Wrapper', $data);
    }

    public function Tahunan()
    {
        $this->db->select('*');
        $this->db->from('file');
        $this->db->where('active', 1);
        $this->db->where('tipe', 'Laporan Tahunan');
        // Order by 'tanggal' column in descending order to get the latest one
        $this->db->order_by('created', 'DESC');

        $tahunan = $this->db->get()->result();

        $data['Title'] = 'Laporan Tahunan';
        $data['data_file'] = $tahunan;
        $data['content']  = 'webview/Admin/Laporan/laporan_view';
        // $data['content_js'] = 'webview/user/laporan/laporan_js';
        $this->load->view('_parts/Admin/Wrapper', $data);
    }
    // public function tahunan()
    // {
    //     $this->db->select('*');
    //     $this->db->from('file');
    //     $this->db->where('active', 1);
    //     $this->db->where('tipe', 'Laporan Tahunan');
    //     // Order by 'tanggal' column in descending order to get the latest one
    //     $this->db->order_by('created', 'DESC');

    //     // Limit to 1 to get only the latest record
    //     $this->db->limit(1);
    //     $tahunan = $this->db->get()->row();

    //     $file = $tahunan->file;
    //     $file_path = base_url('uploads/file/' . $file);

    //     $data['data_file'] = $file_path;
    //     $data['content']  = 'webview/Admin/Laporan/laporan_view';
    //     // $data['content_js'] = 'webview/user/laporan/laporan_js';
    //     $this->load->view('_parts/Admin/Wrapper', $data);
    // }
}
