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
		if ($this->session->userdata('user_logged_in') == false) {
			redirect('auth');
		}

		$data['triwulan'] = $this->dashboard->get_triwulan(); // Ensure data is assigned to 'formulir'
		$data['tahunan'] = $this->dashboard->get_tahunan(); // Ensure data is assigned to 'formulir'

		if ($this->session->userdata('role_id') == 2) {

			$data['content']  = 'webview/User/Dashboard/dashboard_view';
			$data['content_js'] = 'webview/User/Dashboard/dashboard_js';
		} else {

			$data['content']  = 'webview/Admin/Dashboard/dashboard_view';
			$data['content_js'] = 'webview/Admin/Dashboard/dashboard_js';
		}

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

	public function saldo_per_6_bulan()
	{
		$result = $this->dashboard->saldo_per_6_bulan(); // Call the model method
		$salesData = [];
		$categories = [];

		foreach ($result as $row) {
			$salesData[] = (int)$row->total_count;
			$categories[] = $row->month_year;
		}

		// Set JSON header
		header('Content-Type: application/json');
		echo json_encode([
			'sales' => $salesData,
			'categories' => $categories,
		]);
	}

	public function total_saldo_per_6_bulan()
	{
		$result = $this->dashboard->total_saldo_per_6_bulan(); // Call the model method
		$salesData = [];
		$categories = [];

		foreach ($result as $row) {
			$salesData[] = (int)$row->total_count;
			$categories[] = $row->month_year;
		}

		// Set JSON header
		header('Content-Type: application/json');
		echo json_encode([
			'sales' => $salesData,
			'categories' => $categories,
		]);
	}
	public function saldo_per_6_bulan_user()
	{
		$result = $this->dashboard->saldo_per_6_bulan_user(); // Call the model method
		$salesData = [];
		$categories = [];

		foreach ($result as $row) {
			$salesData[] = (int)$row->total_count;
			$categories[] = $row->month_year;
		}

		// Set JSON header
		header('Content-Type: application/json');
		echo json_encode([
			'sales' => $salesData,
			'categories' => $categories,
		]);
	}
}
