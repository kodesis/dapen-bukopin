<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
		$this->load->model('Dashboard_m', 'dashboard');
		// if (!$this->session->userdata('user_logged_in')) {
		// 	redirect('auth'); // Redirect to the 'autentic' page
		// }
	}

	public function index()
	{
		if ($this->session->userdata('user_logged_in') == null) {
			redirect('auth');
		}

		if ($this->session->userdata('role_id') == 2) {
			redirect('SaldoUser');
		}
		$data['content']  = 'webview/admin/dashboard/dashboard_view';
		$data['content_js'] = 'webview/admin/dashboard/dashboard_js';
		$this->load->view('_parts/Admin/Wrapper', $data);
	}

	public function user_count()
	{
		$user_count = $this->dashboard->total_user(); // Call the model method
		echo json_encode(array('user_count' => $user_count)); // Return the count as JSON
	}

	public function saldo_con_count()
	{
		$user_con_count = $this->dashboard->total_saldo_connected(); // Call the model method
		echo json_encode(array('user_con_count' => $user_con_count)); // Return the count as JSON
	}

	public function saldo_count()
	{
		$total_saldo = $this->dashboard->total_saldo(); // Call the model method
		echo json_encode(array('total_saldo' => $total_saldo)); // Return the count as JSON
	}
}
