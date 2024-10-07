<?php defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_parts/User/Header');
// $this->load->view('_parts/User/Sidebar');
$this->load->view('_parts/User/TopNavbar');
$this->load->view($content);
// $this->load->view('layouts/_parts/nav_bottom');
$this->load->view('_parts/User/Footer');
$this->load->view('_parts/User/JS');
if (isset($content_js)) $this->load->view($content_js);
