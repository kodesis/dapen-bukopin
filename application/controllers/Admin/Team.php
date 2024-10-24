<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Team extends CI_Controller
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
        $this->load->model('team_m', 'team');
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
        $data['content']  = 'webview/Admin/Team/team_view';
        $data['content_js'] = 'webview/Admin/Team/team_js';
        $this->load->view('_parts/Admin/Wrapper', $data);
    }

    public function ajax_list()
    {
        $list = $this->team->get_datatables();
        $data = array();
        $crs = "";
        $no = $_POST['start'];




        foreach ($list as $cat) {
            $path = base_url() . 'uploads/team/' . $cat->file;

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = '<img width="100px" src="' . $path . '">';
            $row[] = $cat->nama;
            $row[] = $cat->posisi;
            $row[] = $cat->detail_posisi;
            // $row[] = $cat->halaman_page;

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
            "recordsTotal" => $this->team->count_all(),
            "recordsFiltered" => $this->team->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function cat_list()
    {
        $items = $this->team->get_category(); // Retrieve items from the model
        echo json_encode($items); // Return the items as JSON

    }

    public function save()
    {
        $nama = $this->input->post('nama');
        $posisi = $this->input->post('posisi');
        $detail_posisi = $this->input->post('detail_posisi');
        // $halaman_page = $this->input->post('halaman_page');

        $config['upload_path'] = FCPATH . 'uploads/team/'; // Same as the config file
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = 'team_' . $nama;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file')) {
            $error = $this->upload->display_errors();
            echo $error;
            echo json_encode(array("status" => FALSE));
        } else {
            $image_data = $this->upload->data();
            $thumbnail = file_get_contents($image_data['full_path']);
            // CEK SIZE
            $file_path = $image_data['full_path']; // Full file path

            list($width, $height) = getimagesize($file_path); // Get dimensions of the uploaded image

            // if ($width == 670 && $height == 503) {
            //     $file = $image_data['file_name'];
            //     $this->team->save_file(
            //         array(

            //             // 'created'           => $date->format('Y-m-d H:i:s'),
            //             'file' => $file,
            //             'nama'             => $nama,
            //             'posisi'              => $posisi,
            //             'detail_posisi'           => $detail_posisi,
            //         )
            //     );
            //     echo json_encode(array("status" => TRUE));
            // } else {
            //     // Dimensions are incorrect, delete the uploaded file and return error
            //     unlink($file_path); // Delete the uploaded file
            //     echo json_encode(array(
            //         "status" => "Size Salah",
            //         "message" => "Image dimensions must be exactly 670x503 pixels."
            //     ));
            // }

            $file = $image_data['file_name'];
            $this->team->save_file(
                array(

                    // 'created'           => $date->format('Y-m-d H:i:s'),
                    'file' => $file,
                    'nama'             => $nama,
                    'posisi'              => $posisi,
                    'detail_posisi'           => $detail_posisi,
                )
            );
            echo json_encode(array("status" => TRUE));
        }
    }

    public function ajax_edit($id)
    {
        $data = $this->team->get_id_edit($id);

        echo json_encode($data);
    }

    public function update()
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $id_edit = $this->input->post('id');
        $nama = $this->input->post('nama');
        $posisi = $this->input->post('posisi');
        $detail_posisi = $this->input->post('detail_posisi');
        // $halaman_page = $this->input->post('halaman_page');

        $data_update = [
            // 'updated'           => $date->format('Y-m-d H:i:s'),
            'nama'             => $nama,
            'posisi'              => $posisi,
            'detail_posisi'              => $detail_posisi,
        ];

        $config['upload_path'] =  FCPATH . 'uploads/team/'; // Same as the config file
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['file_name'] = 'team_' . $nama;


        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file = $image_data['file_name'];

            // $file_path = $image_data['full_path']; // Full file path

            // list($width, $height) = getimagesize($file_path); // Get dimensions of the uploaded image

            // if ($width == 670 && $height == 503) {
            //     // Correct dimensions, proceed with update
            //     $data_update['file_team'] = $file;
            // } else {
            //     // Dimensions are incorrect, delete the uploaded file and return error
            //     unlink($file_path); // Delete the uploaded file
            //     echo json_encode(array(
            //         "status" => "Size Salah",
            //         "message" => "Image dimensions must be exactly 670x503 pixels."
            //     ));
            //     return; // Stop execution here
            // }
            $data_update['file'] = $file;
        }

        // Continue only if dimensions were correct
        $this->team->update_file($data_update, array('uid' => $this->input->post('id_edit')));
        echo json_encode(array("status" => TRUE));
    }

    public function delete()
    {
        $id = $this->input->post('id_delete');
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('uid', $id);
        $query = $this->db->get()->row();
        $filePath = './uploads/team/' . $query->file;
        $this->team->delete(array('uid' => $id));
        if (file_exists($filePath)) {
            unlink($filePath); // Delete the file from the uploads folder
        }
        echo json_encode(array("status" => TRUE));
    }
}
