<?php defined('BASEPATH') or exit('No direct script access allowed');

class UserManagement_m extends CI_Model
{
    var $table = 'user';
    var $column_order = array('user.uid', 'kd_peserta', 'nama', 'email', 'alamat', 'tgl_lahir', 'pegawai', 'peserta', 'role_id', 'related_user_uid', 'active'); //set column field database for datatable orderable
    var $column_search = array('user.uid', 'kd_peserta', 'nama', 'email', 'alamat', 'tgl_lahir', 'pegawai', 'peserta', 'role_id', 'related_user_uid', 'active'); //set column field database for datatable searchable 
    var $order = array('user.uid' => 'asc'); // default order 

    function get_category()
    {
        return $this->db->get('active_status')->result_array();
    }
    function _get_datatables_query()
    {

        $this->db->select('user.*');
        $this->db->from('user');
        // $this->db->where('user.active', 1);
        $i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all()
    {

        $this->_get_datatables_query();
        $query = $this->db->get();

        return $this->db->count_all_results();
    }

    public function save_user($data)
    {
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }

    public function get_id_edit($id)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('uid', $id);
        // $this->db->where('active', 1);
        $query = $this->db->get();

        return $query->row();
    }

    public function update_user($data, $where)
    {
        $this->db->update('user', $data, $where);
    }

    public function delete($uid)
    {
        $this->db->delete('user', $uid);
    }
}
