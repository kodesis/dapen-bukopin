<?php defined('BASEPATH') or exit('No direct script access allowed');

class Index_m extends CI_Model
{
    public function get_running_text()
    {
        $this->db->select('*');
        $this->db->from('running_text');
        $this->db->where('active', 1);
        return $this->db->get()->result();
    }
    public function get_banner()
    {
        $this->db->select('*');
        $this->db->from('banner');
        $this->db->where('active', 1);
        return $this->db->get()->result();
    }
}
