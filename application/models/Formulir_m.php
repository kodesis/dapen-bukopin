<?php defined('BASEPATH') or exit('No direct script access allowed');

class Formulir_m extends CI_Model
{
    public function get_formulir()
    {
        $this->db->select('*');
        $this->db->from('file');
        $this->db->where('active', 1);
        $this->db->where('tipe', 'Formulir');
        return $this->db->get()->result();
    }
}
