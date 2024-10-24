<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . '../vendor/autoload.php';

// Use the necessary PhpSpreadsheet classes
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class UserManagement extends CI_Controller
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
		$this->load->model('UserManagement_m', 'usermanagement');
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
		} else if ($this->session->userdata('role_id') == 2) {
			redirect('error404');
		}

		$data['content']  = 'webview/Admin/Usermanagement/usermanagement_view';
		$data['content_js'] = 'webview/Admin/Usermanagement/usermanagement_js';
		$this->load->view('_parts/Admin/Wrapper', $data);
	}

	public function ajax_list()
	{
		$list = $this->usermanagement->get_datatables();
		$data = array();
		$crs = "";
		$no = $_POST['start'];




		foreach ($list as $cat) {

			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $cat->kd_peserta;
			$row[] = $cat->nama;
			$row[] = $cat->email;
			$row[] = $cat->nik;
			$row[] = $cat->alamat;
			$row[] = $cat->tgl_lahir;
			$row[] = $cat->pegawai;
			$row[] = $cat->peserta;
			$row[] = $cat->role_name;
			if ($cat->active == 0) {
				$row[] = '<center> <h6 title="Status" onclick="onApprove_req(' . $cat->uid . ')" data-toggle="tooltip" data-original-title="Not Publish"  class="btn btn-danger" id="btn-edit" >Non Active</button></center>';
			} else if ($cat->active == 1) {
				$row[] = '<center> <h6  title="Status" onclick="onApprove_req(' . $cat->uid . ')" data-toggle="tooltip" data-original-title="Publish"  class="btn btn-success" id="btn-edit" >Active</button></center>';
			}
			$row[] = '<center> <div class="list-icons d-inline-flex">
                <a title="Update User" onclick="onEdit(' . $cat->uid . ')" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                    </svg></a>
                                                <a title="Delete User" onclick="onEditPassword(' . $cat->uid . ')" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M336 352c97.2 0 176-78.8 176-176S433.2 0 336 0S160 78.8 160 176c0 18.7 2.9 36.8 8.3 53.7L7 391c-4.5 4.5-7 10.6-7 17l0 80c0 13.3 10.7 24 24 24l80 0c13.3 0 24-10.7 24-24l0-40 40 0c13.3 0 24-10.7 24-24l0-40 40 0c6.4 0 12.5-2.5 17-7l33.3-33.3c16.9 5.4 35 8.3 53.7 8.3zM376 96a40 40 0 1 1 0 80 40 40 0 1 1 0-80z"/></svg></a>
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
			"recordsTotal" => $this->usermanagement->count_all(),
			"recordsFiltered" => $this->usermanagement->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}

	public function cat_list()
	{
		$items = $this->usermanagement->get_category(); // Retrieve items from the model
		echo json_encode($items); // Return the items as JSON

	}

	public function save()
	{
		$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$kd_peserta = $this->input->post('kd_peserta');
		$role = $this->input->post('role');
		$password1 = $this->input->post('password1');
		$nik = $this->input->post('nik');
		$alamat = $this->input->post('alamat');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$pegawai = $this->input->post('pegawai');
		$peserta = $this->input->post('peserta');

		// Get KD Peserta
		$this->db->select('uid'); // Select the uid column
		$this->db->from('user'); // Your table name
		$this->db->where('kd_peserta', $kd_peserta); // Filter by kd_peserta
		$result = $this->db->get()->row(); // Execute the query


		// Get KD Peserta
		$this->db->select('uid'); // Select the uid column
		$this->db->from('user'); // Your table name
		$this->db->where('kd_peserta', $nik); // Filter by kd_peserta
		$result2 = $this->db->get()->row(); // Execute the query

		if (!empty($result)) {
			echo json_encode(array("status" => "Kode Peserta Sudah di Pakai", "kd_peserta" => $kd_peserta));
		} elseif (!empty($result2)) {
			echo json_encode(array("status" => "NIK Sudah di Pakai", "nik" => $nik));
		} else {

			$this->usermanagement->save_user(
				array(

					'created'           => $date->format('Y-m-d H:i:s'),
					'nama'             => $nama,
					'kd_peserta'            => $kd_peserta,
					'email'            => $email,
					'role_id'             => $role,
					'password'         => password_hash($password1, PASSWORD_BCRYPT), // Hashing the password
					'nik'              => $nik,
					'alamat'           => $alamat,
					'tgl_lahir'        => $tgl_lahir,
					'pegawai'          => $pegawai,
					'peserta'          => $peserta,
					'active'           => 1,
				),
			);

			echo json_encode(array("status" => TRUE));
		}
	}

	public function ajax_edit($id)
	{
		$data = $this->usermanagement->get_id_edit($id);

		echo json_encode($data);
	}

	public function update()
	{
		$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
		$id_edit = $this->input->post('id');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$kd_peserta = $this->input->post('kd_peserta');
		$role = $this->input->post('role');
		$update_password = $this->input->post('update_password'); // Checkbox value		
		$nik = $this->input->post('nik');
		$alamat = $this->input->post('alamat');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$pegawai = $this->input->post('pegawai');
		$peserta = $this->input->post('peserta');

		$data_update = [
			'updated'           => $date->format('Y-m-d H:i:s'),
			'nama'             => $nama,
			'email'            => $email,
			'kd_peserta'            => $kd_peserta,
			'role_id'             => $role,
			'nik'              => $nik,
			'alamat'           => $alamat,
			'tgl_lahir'        => $tgl_lahir,
			'pegawai'          => $pegawai,
			'peserta'          => $peserta,
		];

		if ($update_password) {
			$password1 = $this->input->post('password1');
			$data_update['password'] = password_hash($password1, PASSWORD_BCRYPT);
		}

		$this->usermanagement->update_user($data_update, array('uid' => $this->input->post('id_edit')));
		echo json_encode(array("status" => TRUE));
	}
	public function update_password()
	{
		$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

		$password1 = $this->input->post('password1');
		$data_update = [
			'updated'           => $date->format('Y-m-d H:i:s'),
			'password'             => password_hash($password1, PASSWORD_BCRYPT),

		];

		$this->usermanagement->update_user($data_update, array('uid' => $this->input->post('id_edit')));
		echo json_encode(array("status" => TRUE));
	}
	public function delete()
	{

		$this->usermanagement->delete(array('uid' => $this->input->post('id_delete')));
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
				$rowCounter = 1; // Start at 1 since the first row (0) is the header

				// INPUT DATA USER
				foreach ($worksheet->getRowIterator() as $row) {
					// Increment the row counter
					$rowCounter++;

					// Skip the first row (header)
					if ($rowCounter === 2 || $rowCounter === 3) {
						continue; // Skip processing for the header row
					}

					$cellIterator = $row->getCellIterator();
					$cellIterator->setIterateOnlyExistingCells(false); // This loops through all cells, even empty ones

					$data = []; // Create an array to hold row data
					foreach ($cellIterator as $cell) {
						$data[] = $cell->getValue(); // Get cell value
					}

					// Assuming columns are: 'Nama' in column A, 'kd_peserta' in column B, etc.
					$nama = isset($data[0]) ? $data[0] : null; // Column A
					$kd_peserta = isset($data[1]) ? $data[1] : null; // Column B
					$email = isset($data[2]) ? $data[2] : null; // Column C
					$password = isset($data[3]) ? $data[3] : null; // Column D
					$nik = isset($data[4]) ? $data[4] : null; // Column E
					$alamat = isset($data[5]) ? $data[5] : null; // Column F
					$tgl_lahir = isset($data[6]) ? DateTime::createFromFormat('m/d/Y', $data[6])->format('Y-m-d') : null;
					$pegawai = isset($data[7]) ? DateTime::createFromFormat('m/d/Y', $data[7])->format('Y-m-d') : null;
					$peserta = isset($data[8]) ? DateTime::createFromFormat('m/d/Y', $data[8])->format('Y-m-d') : null;

					// Insert into the database
					if ($nama && $kd_peserta) {
						$this->db->insert('user', [
							'nama' => $nama,
							'kd_peserta' => $kd_peserta,
							'email' => $email,
							'password'  => password_hash($password, PASSWORD_BCRYPT), // Hashing the password
							'nik' => $nik,
							'alamat' => $alamat,
							'tgl_lahir' => $tgl_lahir,
							'pegawai' => $pegawai,
							'peserta' => $peserta,
							'role_id' => 2, // Set role_id to 1 as required
							'active' => 1, // Default value for 'active'
						]);
					}
				}
				echo json_encode(array("status" => True));
				return;
				// $rowCounter = 1; // Start at 1 since the first row (0) is the header
				// $missingUsers = []; // Array to hold kd_peserta of missing users
				// $duplicates = []; // Array to hold duplicate kd_peserta

				// // INPUT SALDO USER
				// foreach ($worksheet->getRowIterator() as $row) {
				// 	// Increment the row counter
				// 	$rowCounter++;

				// 	// Skip the first row (header)
				// 	if ($rowCounter === 2) {
				// 		continue; // Skip processing for the header row
				// 	}

				// 	$cellIterator = $row->getCellIterator();
				// 	$cellIterator->setIterateOnlyExistingCells(false); // This loops through all cells, even empty ones

				// 	$data = []; // Create an array to hold row data
				// 	foreach ($cellIterator as $cell) {
				// 		$data[] = $cell->getValue(); // Get cell value
				// 	}

				// 	$kd_peserta = isset($data[1]) ? $data[1] : null; // Column B
				// 	$ips_awal = isset($data[6]) ? floatval($this->clean_input($data[6])) : null; // Column G
				// 	// ... (same for other variables)

				// 	// Check for duplicates based on kd_peserta and input month-year
				// 	$inputDate = $this->input->post('tanggal'); // Assuming this is in Y-m-d format
				// 	$monthYear = date('Y-m', strtotime($inputDate));

				// 	$this->db->select('uid'); // Select the uid column
				// 	$this->db->from('user'); // Your table name
				// 	$this->db->where('kd_peserta', $kd_peserta); // Filter by kd_peserta
				// 	$query = $this->db->get(); // Execute the query

				// 	if ($query->num_rows() > 0) {
				// 		$result = $query->row(); // Get the first result row
				// 		$this->db->select('*');
				// 		$this->db->from('saldo');
				// 		$this->db->where('uid_user', $result->uid); // Filter by uid_user
				// 		$this->db->where("DATE_FORMAT(tanggal_data, '%Y-%m') =", date('Y-m', strtotime($inputDate))); // Check duplicates
				// 		$duplicateCheck = $this->db->get();

				// 		// If duplicate exists, add to duplicates array
				// 		if ($duplicateCheck->num_rows() > 0) {
				// 			$duplicates[] = $kd_peserta;
				// 			continue; // Skip to the next row
				// 		}

				// 		// Check if a result was found
				// 		$uid = $result->uid; // Access the uid
				// 		$this->db->insert('saldo', [
				// 			'uid_user' => $uid,
				// 			'ips_awal' => $ips_awal,
				// 			'ipk_awal' => $ipk_awal,
				// 			'total_awal' => $total_awal,
				// 			'ips_iuran' => $ips_iuran,
				// 			'ipk_iuran' => $ipk_iuran,
				// 			'ips_p' => $ips_p,
				// 			'ipk_p' => $ipk_p,
				// 			'ips_akhir' => $ips_akhir,
				// 			'ipk_akhir' => $ipk_akhir,
				// 			'total_akhir' => $total_akhir,
				// 			'tanggal_data' => $this->input->post('tanggal'),
				// 			'active' => 1,
				// 		]);
				// 	} else {
				// 		$missingUsers[] = $kd_peserta; // Store the kd_peserta of the missing user
				// 	}
				// }

				// // Prepare the response data
				// $data = [];
				// if (!empty($missingUsers)) {
				// 	$data['status'] = "Missing";
				// 	$data['missing'] = [
				// 		"count" => count($missingUsers),
				// 		"users" => $missingUsers,
				// 	];
				// 	// Call export function for missing users
				// 	// $this->exportToExcel($missingUsers); // Call the export function here
				// }

				// if (!empty($duplicates)) {
				// 	$data['status'] = "Duplicates";
				// 	$data['duplicates'] = [
				// 		"count" => count($duplicates),
				// 		"users" => $duplicates,
				// 	];
				// }

				// Respond with JSON
				// echo json_encode($data);
			} catch (Exception $e) {
				// echo 'Error loading file: ', $e->getMessage();
				echo json_encode(array("status" => False));
			}
		}
		// echo json_encode(array("status" => TRUE));
	}

	private function exportToExcel($missingUsers)
	{
		// Clear output buffer to prevent any unwanted output
		ob_end_clean(); // Clear the output buffer

		// Load your library for exporting to Excel, e.g., PhpSpreadsheet
		$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		// Set the headers
		$sheet->setCellValue('A1', 'Missing Users');
		$row = 2;

		// Write each kd_peserta into the sheet
		foreach ($missingUsers as $user) {
			$sheet->setCellValue("A{$row}", $user);
			$row++;
		}

		// Save the file
		$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
		$filename = 'missing_users_' . date('Ymd') . '.xlsx';

		// Set headers for downloading the file
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="' . $filename . '"');
		header('Cache-Control: max-age=0');
		header('Pragma: public');
		header('Expires: 0');

		// Save the file to php://output
		$writer->save('php://output');
		exit();
	}

	public function status_req()
	{
		$status_user = $this->input->post('status_user');
		$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
		$this->usermanagement->update_user(
			array(

				'active'      => $status_user,
			),
			array('uid' => $this->input->post('id_edit_status'))
		);

		echo json_encode(array("status" => TRUE));
	}
}
