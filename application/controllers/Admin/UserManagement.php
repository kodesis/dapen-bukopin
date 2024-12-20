<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

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
		$this->load->model('UserManagementRelation_m', 'usermanagementrelation');
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

		$data['content']  = 'webview/Admin/UserManagement/usermanagement_view';
		$data['content_js'] = 'webview/Admin/UserManagement/usermanagement_js';
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
			// $row[] = $cat->nik;
			$row[] = $cat->alamat;
			$row[] = $cat->tgl_lahir;
			$row[] = $cat->pegawai;
			$row[] = $cat->peserta;
			if ($cat->role_id == 1) {
				$row[] = 'Admin';
			} else if ($cat->role_id == 2) {
				$row[] = 'User';
			}

			$this->db->from('user');
			$this->db->where('related_user_uid', $cat->kd_peserta);
			$cek_relasi = $this->db->get()->result();
			if (!empty($cek_relasi)) {
				$row[] = '<center> <h6 title="Status" onclick="onRelation(' . $cat->kd_peserta . ')" data-toggle="tooltip" data-original-title="Publish"  class="btn btn-secondary" id="btn-edit" >Relasi Akun</button></center>';
			} else {
				$row[] = '';
			}
			if ($cat->active == 0) {
				$row[] = '<center> <h6 title="Status" onclick="onApprove_req(' . $cat->uid . ')" data-toggle="tooltip" data-original-title="Not Publish"  class="btn btn-danger" id="btn-edit" >Non Active</button></center>';
			} else if ($cat->active == 1) {
				$row[] = '<center> <h6  title="Status" onclick="onApprove_req(' . $cat->uid . ')" data-toggle="tooltip" data-original-title="Publish"  class="btn btn-success" id="btn-edit" >Active</button></center>';
			} else if ($cat->active == 2) {
				$row[] = '<center> <h6 title="Status" onclick="onApprove_req(' . $cat->uid . ')" data-toggle="tooltip" data-original-title="Publish"  class="btn btn-warning" id="btn-edit" >Belum Terdaftar</button></center>';
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

	public function save_nip()
	{

		$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
		$kd_peserta = $this->input->post('kd_peserta');
		// $nik = $this->input->post('nik');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$pegawai = $this->input->post('pegawai');
		$peserta = $this->input->post('peserta');

		$tgl_lahir = date('Y-m-d', strtotime($tgl_lahir));

		// echo json_encode(array("status" => $tgl_lahir));
		// return;
		// Get KD Peserta
		$this->db->select('uid'); // Select the uid column
		$this->db->from('user'); // Your table name
		$this->db->where('kd_peserta', $kd_peserta); // Filter by kd_peserta
		$result2 = $this->db->get()->row(); // Execute the query

		if (!empty($result2)) {
			echo json_encode(array("status" => "NIK Sudah di Pakai", "kd_peserta" => $kd_peserta));
		} else {

			$this->usermanagement->save_user(
				array(

					'created'           => $date->format('Y-m-d H:i:s'),
					'kd_peserta'              => $kd_peserta,
					// 'nik'              => $nik,
					'tgl_lahir'        => $tgl_lahir,
					'pegawai'        => $pegawai,
					'peserta'        => $peserta,
					'role_id'             => 2,
					'active'           => 2,
				),
			);

			echo json_encode(array("status" => TRUE));
		}
	}

	public function save()
	{
		$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$kd_peserta = $this->input->post('kd_peserta');
		$role = $this->input->post('role');
		$password1 = $this->input->post('password1');
		// $nik = $this->input->post('nik');
		$alamat = $this->input->post('alamat');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$pegawai = $this->input->post('pegawai');
		$peserta = $this->input->post('peserta');
		$relasi = $this->input->post('relasi');

		// Get KD Peserta
		$this->db->select('uid'); // Select the uid column
		$this->db->from('user'); // Your table name
		$this->db->where('kd_peserta', $kd_peserta); // Filter by kd_peserta
		$result = $this->db->get()->row(); // Execute the query




		if (!empty($result)) {
			echo json_encode(array("status" => "Kode Peserta Sudah di Pakai", "kd_peserta" => $kd_peserta));
		} else {

			$this->usermanagement->save_user(
				array(

					'created'           => $date->format('Y-m-d H:i:s'),
					'nama'             => $nama,
					'kd_peserta'            => $kd_peserta,
					'email'            => $email,
					'role_id'             => $role,
					'password'         => password_hash($password1, PASSWORD_BCRYPT), // Hashing the password
					// 'nik'              => $nik,
					'alamat'           => $alamat,
					'tgl_lahir'        => $tgl_lahir,
					'pegawai'          => $pegawai,
					'peserta'          => $peserta,
					'related_user_uid'          => $relasi,
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
		// $nik = $this->input->post('nik');
		$alamat = $this->input->post('alamat');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$pegawai = $this->input->post('pegawai');
		$peserta = $this->input->post('peserta');
		$relasi = $this->input->post('relasi');

		$data_update = [
			'updated'           => $date->format('Y-m-d H:i:s'),
			'nama'             => $nama,
			'email'            => $email,
			'kd_peserta'            => $kd_peserta,
			'role_id'             => $role,
			// 'nik'              => $nik,
			'alamat'           => $alamat,
			'tgl_lahir'        => $tgl_lahir,
			'pegawai'          => $pegawai,
			'peserta'          => $peserta,
			'related_user_uid'          => $relasi,
		];

		if (!empty($relasi)) {
			$data_update['active'] = 1;
		}

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
		ob_start(); // Start output buffering

		// Initialize variables outside the if block
		$insertedRows = 0; // Initialize inserted rows counter
		$progressUpdates = []; // Array to hold progress data

		// Configure upload settings
		$config['upload_path'] = FCPATH . 'uploads/';
		$config['allowed_types'] = 'xls|xlsx|csv';

		$this->upload->initialize($config);

		if (!$this->upload->do_upload('file')) {
			// Handle upload failure
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error); // Return the error as JSON
			exit;
		} else {
			// Get file info if upload succeeds
			$file_data = $this->upload->data();
			$file_path = $file_data['full_path'];

			try {
				$spreadsheet = IOFactory::load($file_path);
				$worksheet = $spreadsheet->getActiveSheet();

				$totalRows = iterator_count($worksheet->getRowIterator()) - 2; // Adjust for headers
				$rowCounter = 0; // Start the row counter

				// Process each row in the worksheet
				foreach ($worksheet->getRowIterator() as $row) {
					$rowCounter++;

					// Skip header rows
					if ($rowCounter === 1 || $rowCounter === 2) {
						continue;
					}

					$cellIterator = $row->getCellIterator();
					$cellIterator->setIterateOnlyExistingCells(false);
					$data = [];

					foreach ($cellIterator as $cell) {
						$data[] = $cell->getValue();
					}

					// Extract data from the row
					$nama = $data[0] ?? null;
					$kd_peserta = $data[1] ?? null;
					$email = $data[2] ?? null;
					$password = $data[3] ?? null;
					$alamat = $data[4] ?? null;
					$tgl_lahir = $this->processDate($data[5] ?? null);
					$pegawai = $this->processDate($data[6] ?? null);
					$peserta = $this->processDate($data[7] ?? null);

					$this->db->select('uid');
					$this->db->from('user');
					$this->db->where('kd_peserta', $kd_peserta);
					$result = $this->db->get()->row();

					if (empty($result) && $nama && $kd_peserta) {
						$this->db->insert('user', [
							'nama' => $nama,
							'kd_peserta' => $kd_peserta,
							'email' => $email,
							'password' => password_hash($password, PASSWORD_BCRYPT),
							'alamat' => $alamat,
							'tgl_lahir' => $tgl_lahir,
							'pegawai' => $pegawai,
							'peserta' => $peserta,
							'role_id' => 2,
							'active' => 2,
						]);

						$insertedRows++; // Increment inserted rows counter
						$progress = round(($insertedRows / $totalRows) * 100); // Calculate progress
						$progressUpdates[] = [
							'progress' => $progress,
							'currentRow' => $insertedRows,
							'totalRows' => $totalRows,
						];
					}
				}

				// Output final result with all progress updates
				echo json_encode([
					"status" => true,
					"insertedRows" => $insertedRows,
					"progressUpdates" => $progressUpdates,
				]);
			} catch (Exception $e) {
				echo json_encode([
					"status" => false,
					"error" => 'Error loading file: ' . $e->getMessage(),
				]);
			}
		}
	}


	function processDate($dateValue)
	{
		if (is_numeric($dateValue)) {
			// Handle Excel date integer
			return DateTime::createFromFormat('U', ($dateValue - 25569) * 86400)->format('Y-m-d');
		} elseif (DateTime::createFromFormat('m/d/Y', $dateValue) !== false) {
			// Handle string date format
			return DateTime::createFromFormat('m/d/Y', $dateValue)->format('Y-m-d');
		}
		// If the date format is not recognized, return null or handle accordingly
		return null;
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

	public function ajax_list_relasi($id)
	{
		$list = $this->usermanagementrelation->get_datatables($id);
		$data = array();
		$crs = "";
		$no = $_POST['start'];




		foreach ($list as $cat) {

			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $cat->kd_peserta;
			$row[] = $cat->nama;
			$row[] = $cat->tgl_lahir;
			$row[] = '<center> <div class="list-icons d-inline-flex">
													<a title="Delete User" onclick="onDeleteRelasi(' . $cat->uid . ')" class="btn btn-danger"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
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
			"recordsTotal" => $this->usermanagementrelation->count_all($id),
			"recordsFiltered" => $this->usermanagementrelation->count_filtered($id),
			"data" => $data,
		);
		echo json_encode($output);
	}
	public function delete_relasi($id)
	{
		$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

		$data_update = [
			'updated'           => $date->format('Y-m-d H:i:s'),
			'active'             => 2,
			'related_user_uid'             => Null,

		];

		$this->usermanagement->update_user($data_update, array('uid' => $id));
		echo json_encode(array("status" => TRUE));
	}
}
