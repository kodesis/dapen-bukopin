<?php defined('BASEPATH') or exit('No direct script access allowed');

class Peraturan_m extends CI_Model
{
    public function get_peraturan()
    {
        $this->db->select('*');
        $this->db->from('file');
        $this->db->where('active', 1);
        $this->db->where('tipe', 'Peraturan');
        return $this->db->get()->result();
    }
}
