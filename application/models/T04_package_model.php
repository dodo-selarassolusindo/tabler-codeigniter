<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T04_package_model extends CI_Model
{

    public $table = 't04_package';
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
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('periode', $q);
	$this->db->or_like('kode', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('ln3n_mata_uang', $q);
	$this->db->or_like('ln3n_harga', $q);
	$this->db->or_like('ln6n_mata_uang', $q);
	$this->db->or_like('ln6n_harga', $q);
	$this->db->or_like('ln1n_mata_uang', $q);
	$this->db->or_like('ln1n_harga', $q);
	$this->db->or_like('dnrb_mata_uang', $q);
	$this->db->or_like('dnrb_harga', $q);
	$this->db->or_like('dnfb_mata_uang', $q);
	$this->db->or_like('dnfb_harga', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('periode', $q);
	$this->db->or_like('kode', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('ln3n_mata_uang', $q);
	$this->db->or_like('ln3n_harga', $q);
	$this->db->or_like('ln6n_mata_uang', $q);
	$this->db->or_like('ln6n_harga', $q);
	$this->db->or_like('ln1n_mata_uang', $q);
	$this->db->or_like('ln1n_harga', $q);
	$this->db->or_like('dnrb_mata_uang', $q);
	$this->db->or_like('dnrb_harga', $q);
	$this->db->or_like('dnfb_mata_uang', $q);
	$this->db->or_like('dnfb_harga', $q);
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

}

/* End of file T04_package_model.php */
/* Location: ./application/models/T04_package_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-11 21:03:53 */
/* http://harviacode.com */