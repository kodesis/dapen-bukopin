<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . '../vendor/autoload.php';

// Use the necessary PhpSpreadsheet classes
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class SaldoUser extends CI_Controller
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
		$this->load->model('SaldoUser_m', 'saldouser');
		$this->load->helper(array('form', 'url'));
		$this->load->library('upload');
		// if (!$this->session->userdata('user_logged_in')) {
		// 	redirect('auth'); // Redirect to the 'autentic' page
		// }
	}
	public function index()
	{
		if ($this->session->userdata('user_logged_in') == null) {
			redirect('auth');
		}

		$this->db->from('user');
		$this->db->where('related_user_uid', $this->session->userdata('kd_peserta'));
		$relasi = $this->db->get()->result();
		$data['relasi'] = $relasi;
		if ($this->session->userdata('role_id') == 1) {
			$data['content']  = 'webview/Admin/SaldoUser/saldouser_view';
			$data['content_js'] = 'webview/Admin/SaldoUser/saldouser_js';
		} else if ($this->session->userdata('role_id') == 2) {
			$data['content']  = 'webview/User/SaldoUser/saldouser_view';
			$data['content_js'] = 'webview/User/SaldoUser/saldouser_js';
		}


		$this->load->view('_parts/Admin/Wrapper', $data);
	}


	public function get_last_saldo()
	{
		$data = $this->saldouser->get_last_saldo();

		echo json_encode($data);
	}

	public function cari($bulan, $tahun, $uid)
	{

		// $this->db->select('uid');
		// $this->db->from('user');
		// $this->db->where('kd_peserta', $kd_peserta);
		// $user = $this->db->get()->row();
		$data = $this->saldouser->get_cari($bulan, $tahun, $uid);
		if (!empty($data)) {
			echo json_encode(array("status" => "Success", "data" => $data));
		} else {
			echo json_encode(array("status" => "No Data"));
		}
	}
}
