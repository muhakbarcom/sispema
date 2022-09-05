<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_pemesanan_model extends CI_Model
{

    public $table = 'detail_pemesanan';
    public $id = 'id_detail_pemesanan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function total_histori($id)
    {
        $id_pelanggan = $this->ion_auth->user()->row();
        $id_pelanggan = $id_pelanggan->id;
        $this->db->select('pm.id_detail_pemesanan as id_detail_pemesanan, pm.id_pemesanan as id_pemesanan, pm.id_produk as id_produk, pm.qty as qty, pm.total_harga as total_harga, pb.id_produk as id_produk, pb.nama_produk as nama_produk, pb.harga_produk as harga_produk, pb.gambar_produk as gambar_produk');
        $this->db->from('detail_pemesanan pm');
        $this->db->join('produk pb', 'pm.id_produk=pb.id_produk');
        $this->db->where('pm.id_pemesanan', $id);
        return $this->db->count_all_results();
    }

    function get_limit_histori($id)
    {
        $id_pelanggan = $this->ion_auth->user()->row();
        $id_pelanggan = $id_pelanggan->id;
        $this->db->select('pm.id_detail_pemesanan as id_detail_pemesanan, pm.id_pemesanan as id_pemesanan, pm.id_produk as id_produk, pm.qty as qty, pm.total_harga as total_harga, pb.id_produk as id_produk, pb.nama_produk as nama_produk, pb.harga_produk as harga_produk, pb.gambar_produk as gambar_produk');
        $this->db->from('detail_pemesanan pm');
        $this->db->join('produk pb', 'pm.id_produk=pb.id_produk');
        $this->db->where('pm.id_pemesanan', $id);
        $this->db->group_by('pm.id_detail_pemesanan');
        $this->db->order_by('pm.id_pemesanan', $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_limit_data_detail($id_pemesanan)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->where("id_pemesanan", $id_pemesanan);
        return $this->db->get($this->table)->result();
    }
    function get_limit_data_detail_total($id_pemesanan)
    {
        $this->db->select_sum('total_harga');
        $this->db->where("id_pemesanan", $id_pemesanan);
        return $this->db->get($this->table)->result();
    }

    function total_rows_detail($q = NULL, $id_pemesanan)
    {

        $this->db->from($this->table);
        $this->db->where("id_pemesanan", $id_pemesanan);
        return $this->db->count_all_results();
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
        $this->db->like('id_detail_pemesanan', $q);
        $this->db->or_like('id_pemesanan', $q);
        $this->db->or_like('id_produk', $q);
        $this->db->or_like('qty', $q);
        $this->db->or_like('total_harga', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_detail_pemesanan', $q);
        $this->db->or_like('id_pemesanan', $q);
        $this->db->or_like('id_produk', $q);
        $this->db->or_like('qty', $q);
        $this->db->or_like('total_harga', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
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

/* End of file Detail_pemesanan_model.php */
/* Location: ./application/models/Detail_pemesanan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-04 06:15:52 */
/* http://harviacode.com */