<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_m extends CI_Model
{
    public function total_user()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('active', 1);
        $this->db->where('role_id', 2);
        return $this->db->count_all_results();
    }
    public function total_saldo_connected()
    {
        $this->db->from('user');
        $this->db->join('saldo', 'saldo.uid_user = user.uid'); // assuming 'user_id' is the foreign key in the 'saldo' table
        $this->db->where('user.active', 1);
        $this->db->where('user.role_id', 2);
        return $this->db->count_all_results();
    }

    public function total_saldo()
    {
        $this->db->from('saldo');
        $this->db->join('user', 'saldo.uid_user = user.uid'); // assuming 'user_id' is the foreign key in the 'saldo' table
        $this->db->where('saldo.active', 1);
        $this->db->where('user.role_id', 2);
        return $this->db->count_all_results();
    }
}
