<?php defined('BASEPATH') or exit('No direct script access allowed');

class Formulir_m extends CI_Model
{
    public function get_formulir_permohonan()
    {
        $this->db->select('*');
        $this->db->from('file');
        $this->db->where('active', 1);
        $this->db->where('tipe', 'Formulir Permohonan');
        return $this->db->get()->result();
    }
    public function get_formulir_iuran()
    {
        $this->db->select('*');
        $this->db->from('file');
        $this->db->where('active', 1);
        $this->db->where('tipe', 'Formulir Iuran Sukarela');
        return $this->db->get()->result();
    }
}
