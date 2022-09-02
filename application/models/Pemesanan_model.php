<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemesanan_model extends CI_Model
{

    public $table = 'pemesanan';
    public $id = 'id_pemesanan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
    function total_rows_pelanggan($q = NULL)
    {

        $id_pelanggan = $this->ion_auth->user()->row();
        $id_pelanggan = $id_pelanggan->id;
        $this->db->select('pm.id_pemesanan as id_pemesanan, pm.tanggal_pemesanan as tanggal_pemesanan, pm.total_pembayaran as total_pembayaran, pm.id_pelanggan as id_pelanggan, pb.id_pembayaran as id_pembayaran, pb.metode_pembayaran as metode_pembayaran, pb.status_pembayaran as status_pembayaran, pb.bukti_transfer as bukti_transfer, pm.status_pemesanan as status_pemesanan');
        $this->db->from('pemesanan pm');
        $this->db->join('pembayaran pb', 'pm.id_pemesanan=pb.id_pemesanan');
        $this->db->where('pm.id_pelanggan', $id_pelanggan);
        $this->db->group_by('pm.id_pemesanan');
        $this->db->order_by('pm.id_pemesanan', $this->order);
        // $this->db->limit($limit, $start);
        return $this->db->get($this->table)->num_rows();
    }

    function get_limit_data_pelanggan($limit, $start = 0, $q = NULL)
    {
        $id_pelanggan = $this->ion_auth->user()->row();
        $id_pelanggan = $id_pelanggan->id;
        $this->db->select('pm.id_pemesanan as id_pemesanan, pm.tanggal_pemesanan as tanggal_pemesanan, pm.total_pembayaran as total_pembayaran, pm.id_pelanggan as id_pelanggan, pb.id_pembayaran as id_pembayaran, pb.metode_pembayaran as metode_pembayaran, pb.status_pembayaran as status_pembayaran, pb.bukti_transfer as bukti_transfer, pm.status_pemesanan as status_pemesanan');
        $this->db->from('pemesanan pm');
        $this->db->join('pembayaran pb', 'pm.id_pemesanan=pb.id_pemesanan');
        $this->db->where('pm.id_pelanggan', $id_pelanggan);
        $this->db->group_by('pm.id_pemesanan');
        $this->db->order_by('pm.id_pemesanan', $this->order);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_pemesanan', $q);
        $this->db->or_like('tanggal_pemesanan', $q);
        $this->db->or_like('total_pembayaran', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pemesanan', $q);
        $this->db->or_like('tanggal_pemesanan', $q);
        $this->db->or_like('total_pembayaran', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    function total_rows_admin($q = NULL)
    {

        $this->db->select('pm.id_pemesanan as id_pemesanan, pm.tanggal_pemesanan as tanggal_pemesanan, pm.total_pembayaran as total_pembayaran, pm.id_pelanggan as id_pelanggan, pb.id_pembayaran as id_pembayaran, pb.metode_pembayaran as metode_pembayaran, pb.status_pembayaran as status_pembayaran, pb.bukti_transfer as bukti_transfer, pm.status_pemesanan as status_pemesanan');
        $this->db->from('pemesanan pm');
        $this->db->join('pembayaran pb', 'pm.id_pemesanan=pb.id_pemesanan');

        $this->db->group_by('pm.id_pemesanan');
        $this->db->order_by('pm.id_pemesanan', $this->order);
        // $this->db->limit($limit, $start);
        return $this->db->get($this->table)->num_rows();
    }

    // get data with limit and search
    function get_limit_data_adminx($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pemesanan', $q);
        $this->db->or_like('tanggal_pemesanan', $q);
        $this->db->or_like('total_pembayaran', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function get_limit_data_admin($limit, $start = 0, $q = NULL)
    {
        $this->db->select('pm.id_pemesanan as id_pemesanan, pm.tanggal_pemesanan as tanggal_pemesanan, pm.total_pembayaran as total_pembayaran, pm.id_pelanggan as id_pelanggan, pb.id_pembayaran as id_pembayaran, pb.metode_pembayaran as metode_pembayaran, pb.status_pembayaran as status_pembayaran, pb.bukti_transfer as bukti_transfer, pm.status_pemesanan as status_pemesanan');
        $this->db->from('pemesanan pm');
        $this->db->join('pembayaran pb', 'pm.id_pemesanan=pb.id_pemesanan');

        $this->db->group_by('pm.id_pemesanan');
        $this->db->order_by('pm.id_pemesanan', $this->order);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    // delete bulkdata
    function deletebulk()
    {
        $data = $this->input->post('msg_', TRUE);
        $arr_id = explode(",", $data);
        $this->db->where_in($this->id, $arr_id);
        return $this->db->delete($this->table);
    }
}

/* End of file Pemesanan_model.php */
/* Location: ./application/models/Pemesanan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-04 06:17:18 */
/* http://harviacode.com */