<?php defined('BASEPATH') or exit('No direct script access allowed');

class Buku_Layanan_m extends CI_Model
{
    public function get_buku_layanan()
    {
        $this->db->select('*');
        $this->db->from('file');
        $this->db->where('active', 1);
        $this->db->where('tipe', 'Buku Layanan Kepesertaan');
        return $this->db->get()->result();
    }
}
