<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . '../vendor/autoload.php';

// Use the necessary PhpSpreadsheet classes
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class runningtext extends CI_Controller
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
		$this->load->model('RunningText_m', 'runningtext');
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

		$data['content']  = 'webview/admin/runningtext/runningtext_view';
		$data['content_js'] = 'webview/admin/runningtext/runningtext_js';
		$this->load->view('_parts/Admin/Wrapper', $data);
	}

	public function ajax_list()
	{
		$list = $this->runningtext->get_datatables();
		$data = array();
		$crs = "";
		$no = $_POST['start'];




		foreach ($list as $cat) {

			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $cat->text;

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
			"recordsTotal" => $this->runningtext->count_all(),
			"recordsFiltered" => $this->runningtext->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}

	public function save()
	{
		$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
		$text = $this->input->post('text');

		$this->runningtext->save(
			array(

				'created'           => $date->format('Y-m-d H:i:s'),
				'text'             => $text,
				'active'           => 1,
			),
		);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_edit($id)
	{
		$data = $this->runningtext->get_id_edit($id);

		echo json_encode($data);
	}

	public function update()
	{
		$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
		$text = $this->input->post('text');

		$data_update = [
			'updated'           => $date->format('Y-m-d H:i:s'),
			'text'             => $text,
		];


		$this->runningtext->update($data_update, array('uid' => $this->input->post('id_edit')));
		echo json_encode(array("status" => TRUE));
	}

	public function delete()
	{

		$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
		$this->runningtext->delete(
			array(

				'deleted'           => $date->format('Y-m-d H:i:s'),
				'active'      => 0,
			),
			array('uid' => $this->input->post('id_delete'))
		);
		echo json_encode(array("status" => TRUE));
	}
}
