<?php defined('BASEPATH') or exit('No direct script access allowed');

class Profile_m extends CI_Model
{
    public function get_detail_profile()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('uid', $this->session->userdata('user_user_id'));
        return $this->db->get()->row();
    }

    public function update_user($data, $where)
    {
        $this->db->update('user', $data, $where);
    }
}
