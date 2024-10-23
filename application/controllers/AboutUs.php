<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AboutUs extends CI_Controller
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
        // if (!$this->session->userdata('user_logged_in')) {
        // 	redirect('auth'); // Redirect to the 'autentic' page
        // }
    }
    public function Sejarah()
    {

        $data['content']  = 'webview/sejarah/sejarah_view';
        // $data['content_js'] = 'webview/user/index/index_js';

        $this->load->view('_parts/User/Wrapper', $data);
    }
    public function ProgramPensiun()
    {

        $data['content']  = 'webview/programpensiun/programpensiun_view';
        // $data['content_js'] = 'webview/user/index/index_js';

        $this->load->view('_parts/User/Wrapper', $data);
    }
    public function Team()
    {
        $data['pengawas'] = $this->team->get_all_team_pengawas();
        $data['pengurus'] = $this->team->get_all_team_pengurus();
        $data['content']  = 'webview/team/team_view';

        $this->load->view('_parts/User/Wrapper', $data);
    }
}
