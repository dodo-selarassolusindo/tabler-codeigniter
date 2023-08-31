<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T34_pembayaran_model extends CI_Model
{

    public $table = 't34_pembayaran';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
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
    function total_rows($q = NULL, $bkm_detail = null)
    {
        if ($bkm_detail <> null) {
            $this->db->having('bkm_detail', $bkm_detail);
        }
        $this->db->like('id', $q);
        $this->db->or_like('bkm_detail', $q);
        $this->db->or_like('tanggal', $q);
        $this->db->or_like('mata_uang', $q);
        $this->db->or_like('jumlah', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL, $bkm_detail = null)
    {
        $this->db->join('t00_mata_uang', 't00_mata_uang.id = '.$this->table.'.mata_uang', 'left');
        $this->db->join('t31_bkm_detail', 't31_bkm_detail.id = '.$this->table.'.bkm_detail', 'left');
        if ($bkm_detail <> null) {
            $this->db->having('bkm_detail', $bkm_detail);
        }
        $this->db->order_by($this->table.'.'.$this->id, $this->order);
        $this->db->like($this->table.'.'.'id', $q);
        $this->db->or_like('bkm_detail', $q);
        $this->db->or_like('tanggal', $q);
        $this->db->or_like($this->table.'.'.'mata_uang', $q);
        $this->db->or_like('jumlah', $q);
        $this->db->limit($limit, $start);
        $this->db->select(
            $this->table.'.*
            , t00_mata_uang.simbol as mata_uang
            , t31_bkm_detail.name
            ',
            false
        );
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

}

/* End of file T34_pembayaran_model.php */
/* Location: ./application/models/T34_pembayaran_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-20 05:28:42 */
/* http://harviacode.com */