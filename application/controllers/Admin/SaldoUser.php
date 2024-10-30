<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

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


		if ($this->session->userdata('role_id') == 1) {
			$data['content']  = 'webview/Admin/SaldoUser/saldouser_view';
			$data['content_js'] = 'webview/Admin/SaldoUser/saldouser_js';
		} else if ($this->session->userdata('role_id') == 2) {
			$data['content']  = 'webview/Admin/SaldoUser/User/saldouser_view';
			$data['content_js'] = 'webview/Admin/SaldoUser/User/saldouser_js';
		}


		$this->load->view('_parts/Admin/Wrapper', $data);
	}

	public function ajax_list()
	{
		$list = $this->saldouser->get_datatables();
		$data = array();
		$crs = "";
		$no = $_POST['start'];
		foreach ($list as $cat) {

			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $cat->kd_peserta;
			$row[] = $cat->nama;
			$row[] = number_format($cat->ips_awal, 0, ',', '.');
			$row[] = number_format($cat->ipk_awal, 0, ',', '.');
			$row[] = number_format($cat->total_awal, 0, ',', '.');
			$row[] = number_format($cat->ips_iuran, 0, ',', '.');
			$row[] = number_format($cat->ipk_iuran, 0, ',', '.');
			$row[] = number_format($cat->ips_p, 0, ',', '.');
			$row[] = number_format($cat->ipk_p, 0, ',', '.');
			$row[] = number_format($cat->ips_akhir, 0, ',', '.');
			$row[] = number_format($cat->ipk_akhir, 0, ',', '.');
			$row[] = number_format($cat->total_akhir, 0, ',', '.');
			$row[] = $cat->tanggal_data;



			$row[] = '<center> <div class="list-icons d-inline-flex">
                <a title="Update User" onclick="onEdit(' . $cat->uid . ')" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                    </svg></a>
                                                <a title="Delete User" onclick="onDelete(' . $cat->uid . ')" class="btn btn-danger"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    </svg></a>
            </div>
    </center>';


			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->saldouser->count_all(),
			"recordsFiltered" => $this->saldouser->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}

	public function cat_list()
	{
		$items = $this->saldouser->get_category(); // Retrieve items from the model
		echo json_encode($items); // Return the items as JSON

	}

	public function save()
	{
		$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
		$kd_peserta = $this->input->post('kd_peserta');
		$ips_awal = $this->input->post('ips_awal');
		$ipk_awal = $this->input->post('ipk_awal');
		$total_awal = $this->input->post('total_awal');
		$ips_iuran = $this->input->post('ips_iuran');
		$ipk_iuran = $this->input->post('ipk_iuran');
		$ips_p = $this->input->post('ips_p');
		$ipk_p = $this->input->post('ipk_p');
		$ips_akhir = $this->input->post('ips_akhir');
		$ipk_akhir = $this->input->post('ipk_akhir');
		$total_akhir = $this->input->post('total_akhir');

		// Get KD Peserta
		$this->db->select('uid'); // Select the uid column
		$this->db->from('user'); // Your table name
		$this->db->where('kd_peserta', $kd_peserta); // Filter by kd_peserta
		$result = $this->db->get()->row(); // Execute the query

		// Check if a result was found
		// Access the uid
		if (empty($result)) {
			echo json_encode(array("status" => "Peserta Tidak ada", "peserta" => $kd_peserta));
			return;
		}
		$uid = $result->uid;
		// Cek Data di database
		$tanggal = $this->input->post('tanggal');

		$month = date('m', strtotime($tanggal)); // Get the month
		$year = date('Y', strtotime($tanggal));  // Get the year
		// Build the query
		$this->db->from('saldo'); // Your table name
		$this->db->where(
			'MONTH(tanggal_data)',
			$month
		); // Filter by month
		$this->db->where('YEAR(tanggal_data)', $year);   // Filter by year
		$this->db->where('uid_user', $uid);              // Filter by UID_User
		$this->db->where('active', 1);              // Filter by UID_User
		$cek_data = $this->db->get()->row(); // Execute the query

		// if ($cek_data != null) {
		if (!empty($cek_data)) {
			$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
			$data_update = [
				'updated'           => $date->format('Y-m-d H:i:s'),
				'ips_awal' => $ips_awal, // Remove dots and commas
				'ipk_awal' => $ipk_awal,
				'total_awal' => $total_awal,
				'ips_iuran' => $ips_iuran,
				'ipk_iuran' => $ipk_iuran,
				'ips_p' => $ips_p,
				'ipk_p' => $ipk_p,
				'ips_akhir' => $ips_akhir,
				'ipk_akhir' => $ipk_akhir,
				'total_akhir' => $total_akhir,
				'tanggal_data' => $this->input->post('tanggal'),
			];

			$this->saldouser->update_user($data_update, array('uid' => $cek_data->uid));
			echo json_encode(array("status" => 'Menimpa', "uid" => $uid, "Cek Data" => $cek_data));
		} else {
			$this->db->insert('saldo', [
				'uid_user' => $uid,
				'ips_awal' => $ips_awal, // Remove dots and commas
				'ipk_awal' => $ipk_awal,
				'total_awal' => $total_awal,
				'ips_iuran' => $ips_iuran,
				'ipk_iuran' => $ipk_iuran,
				'ips_p' => $ips_p,
				'ipk_p' => $ipk_p,
				'ips_akhir' => $ips_akhir,
				'ipk_akhir' => $ipk_akhir,
				'total_akhir' => $total_akhir,
				'tanggal_data' => $this->input->post('tanggal'),
				'active' => 1,
			]);
			echo json_encode(array("status" => TRUE));
		}
	}

	public function ajax_edit($id)
	{
		$data = $this->saldouser->get_id_edit($id);

		echo json_encode($data);
	}
	public function cari($bulan, $tahun)
	{
		$data = $this->saldouser->get_cari($bulan, $tahun);
		if (!empty($data)) {
			echo json_encode(array("status" => "Success", "data" => $data));
		} else {
			echo json_encode(array("status" => "No Data"));
		}
	}
	public function update()
	{
		$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
		// $id_edit = $this->input->post('id');
		$ips_awal = $this->input->post('ips_awal');
		$ipk_awal = $this->input->post('ipk_awal');
		$total_awal = $this->input->post('total_awal');
		$ips_iuran = $this->input->post('ips_iuran');
		$ipk_iuran = $this->input->post('ipk_iuran');
		$ips_p = $this->input->post('ips_p');
		$ipk_p = $this->input->post('ipk_p');
		$ips_akhir = $this->input->post('ips_akhir');
		$ipk_akhir = $this->input->post('ipk_akhir');
		$total_akhir = $this->input->post('total_akhir');
		$tanggal_data = $this->input->post('tanggal');

		// Assuming $date is a DateTime object
		$data_update = [
			'updated'           => $date->format('Y-m-d H:i:s'),
			'ips_awal'         => $ips_awal,
			'ipk_awal'         => $ipk_awal,
			'total_awal'       => $total_awal,
			'ips_iuran'        => $ips_iuran,
			'ipk_iuran'        => $ipk_iuran,
			'ips_p'            => $ips_p,
			'ipk_p'            => $ipk_p,
			'ips_akhir'        => $ips_akhir,
			'ipk_akhir'        => $ipk_akhir,
			'total_akhir'      => $total_akhir,
			'tanggal_data'     => $tanggal_data
		];

		$this->saldouser->update_user($data_update, array('uid' => $this->input->post('id_edit')));
		echo json_encode(array("status" => TRUE));
	}

	public function delete()
	{

		$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
		$this->saldouser->delete(
			array(

				'deleted'           => $date->format('Y-m-d H:i:s'),
				'active'      => 0,
			),
			array('uid' => $this->input->post('id_delete'))
		);
		echo json_encode(array("status" => TRUE));
	}

	private function clean_input($value)
	{
		return str_replace([',', '.'], '', $value);
	}

	public function process_insert_excel()
	{
		// Configure upload settings
		$config['upload_path'] = FCPATH . 'uploads/';
		$config['allowed_types'] = 'xls|xlsx|csv'; // Allowed file types

		// $this->load->library('upload', $config);
		$this->upload->initialize($config);
		// Debugging output


		if (!$this->upload->do_upload('file')) {
			// If the upload fails, show the error
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
			echo "Upload Path: " . $config['upload_path'];
			exit; // Stop execution for debugging
		} else {
			// Get file info
			$file_data = $this->upload->data();
			$file_path = $file_data['full_path']; // Full path of the uploaded file

			// Load the spreadsheet using PhpSpreadsheet
			try {
				$spreadsheet = IOFactory::load($file_path);
				$worksheet = $spreadsheet->getActiveSheet();

				// Iterate over each row
				$rowCounterCekUser = 1; // Start at 1 since the first row (0) is the header

				foreach ($worksheet->getRowIterator() as $row) {
					// Increment the row counter
					$rowCounterCekUser++;

					$totalRows = iterator_count($worksheet->getRowIterator()); // Get the total rows for progress calculation
					$totalRows -= 2; // Adjust for headers
					$insertedRows = 0; // Initialize inserted rows counter
					// Skip the first row (header)
					if (
						$rowCounterCekUser === 2 || $rowCounterCekUser === 3
					) {
						continue; // Skip processing for the header row
					}

					$cellIterator = $row->getCellIterator();
					$cellIterator->setIterateOnlyExistingCells(false); // This loops through all cells, even empty ones

					$data = []; // Create an array to hold row data
					foreach ($cellIterator as $cell) {
						$data[] = $cell->getValue(); // Get cell value
					}

					// Assuming columns are: 'Nama' in column A, 'kd_peserta' in column B, etc.
					$kd_peserta = isset($data[1]) ? $data[1] : null; // Column 

					$this->db->select('uid'); // Select the uid column
					$this->db->from('user'); // Your table name
					$this->db->where('kd_peserta', $kd_peserta); // Filter by kd_peserta
					$result = $this->db->get()->row(); // Execute the query
					if (empty($result)) {
						echo json_encode(array("status" => "Data Peserta Tidak Ada", 'kd_peserta' => $kd_peserta));
						return;
					}
				}

				$rowCounter = 1; // Start at 1 since the first row (0) is the header
				// INPUT DATA USER
				foreach ($worksheet->getRowIterator() as $row) {
					// Increment the row counter
					$rowCounter++;

					$totalRows = iterator_count($worksheet->getRowIterator()); // Get the total rows for progress calculation
					$totalRows -= 2; // Adjust for headers
					$insertedRows = 0; // Initialize inserted rows counter
					// Skip the first row (header)
					if (
						$rowCounter === 2 || $rowCounter === 3
					) {
						continue; // Skip processing for the header row
					}

					$cellIterator = $row->getCellIterator();
					$cellIterator->setIterateOnlyExistingCells(false); // This loops through all cells, even empty ones

					$data = []; // Create an array to hold row data
					foreach ($cellIterator as $cell) {
						$data[] = $cell->getValue(); // Get cell value
					}

					// Assuming columns are: 'Nama' in column A, 'kd_peserta' in column B, etc.
					$kd_peserta = isset($data[1]) ? $data[1] : null; // Column 
					$ips_awal = isset($data[6]) ? $data[6] : null; // Column 
					$ipk_awal = isset($data[7]) ? $data[7] : null; // Column 
					$total_awal = isset($data[8]) ? $data[8] : null; // Column 
					$ips_iuran = isset($data[9]) ? $data[9] : null; // Column 
					$ipk_iuran = isset($data[10]) ? $data[10] : null; // Column 
					$ips_p = isset($data[11]) ? $data[11] : null; // Column 
					$ipk_p = isset($data[12]) ? $data[12] : null; // Column 
					$ips_akhir = isset($data[13]) ? $data[13] : null; // Column 
					$ipk_akhir = isset($data[14]) ? $data[14] : null; // Column 
					$total_akhir = isset($data[15]) ? $data[15] : null; // Column 

					// Cek Data di database
					$tanggal = $this->input->post('tanggal');
					// Extract the month and year from the input date
					$month = date('m', strtotime($tanggal)); // Get the month
					$year = date('Y', strtotime($tanggal));  // Get the year
					// Build the query
					// Get KD Peserta
					$this->db->select('uid'); // Select the uid column
					$this->db->from('user'); // Your table name
					$this->db->where('kd_peserta', $kd_peserta); // Filter by kd_peserta
					$result = $this->db->get()->row(); // Execute the query
					$uid = $result->uid;

					$this->db->from('saldo'); // Your table name
					$this->db->where(
						'MONTH(tanggal_data)',
						$month
					); // Filter by month
					$this->db->where('YEAR(tanggal_data)', $year);   // Filter by year
					$this->db->where('uid_user', $uid);              // Filter by UID_User
					$this->db->where('active', 1);              // Filter by UID_User
					$cek_data = $this->db->get()->row(); // Execute the query

					// if ($cek_data != null) {
					if (!empty($cek_data)) {
						$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
						$data_update = [
							'updated'           => $date->format('Y-m-d H:i:s'),
							'ips_awal' => (int) str_replace(['.', ','], '', $ips_awal), // Remove dots and commas
							'ipk_awal' => (int) str_replace(['.', ','], '', $ipk_awal),
							'total_awal' => (int) str_replace(['.', ','], '', $total_awal),
							'ips_iuran' => (int) str_replace(['.', ','], '', $ips_iuran),
							'ipk_iuran' => (int) str_replace(['.', ','], '', $ipk_iuran),
							'ips_p' => (int) str_replace(['.', ','], '', $ips_p),
							'ipk_p' => (int) str_replace(['.', ','], '', $ipk_p),
							'ips_akhir' => (int) str_replace(['.', ','], '', $ips_akhir),
							'ipk_akhir' => (int) str_replace(['.', ','], '', $ipk_akhir),
							'total_akhir' => (int) str_replace(['.', ','], '', $total_akhir),
							'tanggal_data' => $this->input->post('tanggal'),
						];

						$this->saldouser->update_user($data_update, array('uid' => $uid));
						// echo json_encode(array("status" => 'Menimpa', "uid" => $uid, "Cek Data" => $cek_data));
					} else {
						$this->db->insert('saldo', [
							'uid_user' => $uid,
							'ips_awal' => (int) str_replace(['.', ','], '', $ips_awal), // Remove dots and commas
							'ipk_awal' => (int) str_replace(['.', ','], '', $ipk_awal),
							'total_awal' => (int) str_replace(['.', ','], '', $total_awal),
							'ips_iuran' => (int) str_replace(['.', ','], '', $ips_iuran),
							'ipk_iuran' => (int) str_replace(['.', ','], '', $ipk_iuran),
							'ips_p' => (int) str_replace(['.', ','], '', $ips_p),
							'ipk_p' => (int) str_replace(['.', ','], '', $ipk_p),
							'ips_akhir' => (int) str_replace(['.', ','], '', $ips_akhir),
							'ipk_akhir' => (int) str_replace(['.', ','], '', $ipk_akhir),
							'total_akhir' => (int) str_replace(['.', ','], '', $total_akhir),
							'tanggal_data' => $this->input->post('tanggal'),
							'active' => 1,
						]);
						// echo json_encode(array("status" => True));
					}
					$insertedRows++;
					$progress = round(($insertedRows / $totalRows) * 100);
					echo "data: " . json_encode(['progress' => $progress, 'currentRow' => $insertedRows, 'totalRows' => $totalRows]) . "\n\n";
					ob_flush();
					flush();
				}
				echo json_encode(array("status" => True));
				return;
			} catch (Exception $e) {
				// echo 'Error loading file: ', $e->getMessage();
				echo json_encode(array("status" => False));
			}
		}
		// echo json_encode(array("status" => TRUE));
	}
}
