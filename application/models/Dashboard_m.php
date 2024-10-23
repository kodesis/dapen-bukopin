<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_m extends CI_Model
{
    public function total_user()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('active', 1);
        // $this->db->where('role_id', 2);
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
    public function get_triwulan()
    {
        $this->db->select('*');
        $this->db->from('file');
        $this->db->where('active', 1);
        $this->db->where('tipe', 'Laporan Triwulan');
        // Order by 'tanggal' column in descending order to get the latest one
        $this->db->order_by('created', 'DESC');

        // Limit to 1 to get only the latest record
        $this->db->limit(1);

        return $this->db->get()->row();
    }

    public function get_tahunan()
    {
        $this->db->select('*');
        $this->db->from('file');
        $this->db->where('active', 1);
        $this->db->where('tipe', 'Laporan Tahunan');
        // Order by 'tanggal' column in descending order to get the latest one
        $this->db->order_by('created', 'DESC');

        // Limit to 1 to get only the latest record
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    public function saldo_per_6_bulan()
    {
        // Get the current date
        $this->db->select('COUNT(*) as total_count, DATE_FORMAT(tanggal_data, "%M %Y") as month_year');
        $this->db->from('saldo');
        $this->db->where('active', 1);
        // $this->db->where('uid_user', $this->session->userdata('user_user_id'));

        // Get the last 6 months
        $this->db->where('tanggal_data >=', date('Y-m-d', strtotime('-6 months')));

        // Group by month and year
        $this->db->group_by('month_year');

        // Order by month in descending order
        $this->db->order_by('tanggal_data', 'ASC');

        // Execute the query
        $query = $this->db->get();

        // Return the result
        return $query->result();
    }
    public function total_saldo_per_6_bulan()
    {
        // Get the current date
        $this->db->select('SUM(total_akhir) as total_count, DATE_FORMAT(tanggal_data, "%M %Y") as month_year');
        $this->db->from('saldo');
        $this->db->where('active', 1);
        // $this->db->where('uid_user', $this->session->userdata('user_user_id'));

        // Get the last 6 months
        $this->db->where('tanggal_data >=', date('Y-m-d', strtotime('-6 months')));

        // Group by month and year
        $this->db->group_by('month_year');

        // Order by month in descending order
        $this->db->order_by('tanggal_data', 'ASC');

        // Execute the query
        $query = $this->db->get();

        // Return the result
        return $query->result();
    }
    public function saldo_per_6_bulan_user()
    {
        // Get the current date
        $this->db->select('total_akhir as total_count, DATE_FORMAT(tanggal_data, "%M %Y") as month_year');
        $this->db->from('saldo');
        $this->db->where('active', 1);
        $this->db->where('uid_user', $this->session->userdata('user_user_id'));

        // Get the last 6 months
        $this->db->where('tanggal_data >=', date('Y-m-d', strtotime('-6 months')));

        // Group by month and year
        $this->db->group_by('month_year');

        // Order by month in descending order
        $this->db->order_by('tanggal_data', 'ASC');

        // Execute the query
        $query = $this->db->get();

        // Return the result
        return $query->result();
    }
}
