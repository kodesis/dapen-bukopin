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

		$data['content']  = 'webview/admin/usermanagement/usermanagement_view';
		$data['content_js'] = 'webview/admin/usermanagement/usermanagement_js';
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

	public function delete()
	{

		$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
		$this->usermanagement->delete(
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
				$rowCounter = 1; // Start at 1 since the first row (0) is the header

				// INPUT DATA USER
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

				// 	// Assuming columns are: 'Nama' in column A, 'kd_peserta' in column B, etc.
				// 	$nama = isset($data[0]) ? $data[0] : null; // Column A
				// 	$kd_peserta = isset($data[1]) ? $data[1] : null; // Column B
				// 	$alamat = isset($data[2]) ? $data[2] : null; // Column C
				// 	$tgl_lahir = isset($data[3]) ? $data[3] : null; // Column D
				// 	$pegawai = isset($data[4]) ? $data[4] : null; // Column E
				// 	$peserta = isset($data[5]) ? $data[5] : null; // Column F

				// 	// Insert into the database
				// 	if ($nama && $kd_peserta) {
				// 		$this->db->insert('user', [
				// 			'nama' => $nama,
				// 			'kd_peserta' => $kd_peserta,
				// 			'alamat' => $alamat,
				// 			'tgl_lahir' => $tgl_lahir,
				// 			'pegawai' => $pegawai,
				// 			'peserta' => $peserta,
				// 			'role_id' => 2, // Set role_id to 1 as required
				// 			'active' => 1, // Default value for 'active'
				// 		]);
				// 	}
				// }

				$rowCounter = 1; // Start at 1 since the first row (0) is the header
				// INPUT SALDO USER
				foreach ($worksheet->getRowIterator() as $row) {
					// Increment the row counter
					$rowCounter++;

					// Skip the first row (header)
					if ($rowCounter === 2) {
						continue; // Skip processing for the header row
					}

					$cellIterator = $row->getCellIterator();
					$cellIterator->setIterateOnlyExistingCells(false); // This loops through all cells, even empty ones

					$data = []; // Create an array to hold row data
					foreach ($cellIterator as $cell) {
						$data[] = $cell->getValue(); // Get cell value
					}

					$kd_peserta = isset($data[1]) ? $data[1] : null; // Column B
					$ips_awal = isset($data[6]) ? floatval($this->clean_input($data[6])) : null; // Column G
					$ipk_awal = isset($data[7]) ? floatval($this->clean_input($data[7])) : null; // Column H
					$total_awal = isset($data[8]) ? floatval($this->clean_input($data[8])) : null; // Column I
					$ips_iuran = isset($data[9]) ? floatval($this->clean_input($data[9])) : null; // Column J
					$ipk_iuran = isset($data[10]) ? floatval($this->clean_input($data[10])) : null; // Column K
					$ips_p = isset($data[11]) ? floatval($this->clean_input($data[11])) : null; // Column L
					$ipk_p = isset($data[12]) ? floatval($this->clean_input($data[12])) : null; // Column M
					$ips_akhir = isset($data[13]) ? floatval($this->clean_input($data[13])) : null; // Column N
					$ipk_akhir = isset($data[14]) ? floatval($this->clean_input($data[14])) : null; // Column O
					$total_akhir = isset($data[15]) ? floatval($this->clean_input($data[15])) : null; // Column P


					$this->db->select('uid'); // Select the uid column
					$this->db->from('user'); // Your table name
					$this->db->where('kd_peserta', $kd_peserta); // Filter by kd_peserta
					$query = $this->db->get(); // Execute the query

					// Check if a result was found
					if ($query->num_rows() > 0) {
						$result = $query->row(); // Get the first result row
						$uid = $result->uid; // Access the uid
						$this->db->insert('saldo', [
							'uid_user' => $uid,
							'ips_awal' => $ips_awal,
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
					}
				}

				// echo "Data imported successfully!";
				echo json_encode(array("status" => TRUE));
			} catch (Exception $e) {
				// echo 'Error loading file: ', $e->getMessage();
				echo json_encode(array("status" => False));
			}
		}
		echo json_encode(array("status" => TRUE));
	}
}
