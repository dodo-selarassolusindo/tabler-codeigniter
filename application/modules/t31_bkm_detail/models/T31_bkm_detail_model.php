<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T31_bkm_detail_model extends CI_Model
{

    public $table = 't31_bkm_detail';
    public $id = 'id';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    function get_price_list($bkm_detail)
    {
        $this->db->where_in('id', $bkm_detail);
        $this->db->select_sum('price');
        return $this->db->get($this->table)->row()->price;
    }

    // get all by bkm but not this bkm_detail
    function get_all_by_bkm_not_bkm_detail($bkm, $bkm_detail)
    {
        // $this->db->order_by($this->id, $this->order);
        $this->db->where('bkm', $bkm);
        $this->db->where('id !=', $bkm_detail);
        return $this->db->get($this->table)->result();
    }

    // get all by bkm
    function get_all_by_bkm($bkm, $bkm_detail, $array_bayar)
    {
        // $this->db->order_by($this->id, $this->order);
        $this->db->where('bkm', $bkm);
        $this->db->where('id !=', $bkm_detail);
        $this->db->where_not_in('id', $array_bayar);
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
        $this->db->join('t04_package', 't04_package.id = '.$this->table.'.package', 'left');
        $this->db->join('t05_agent', 't05_agent.id = '.$this->table.'.agent', 'left');
        $this->db->join('t00_mata_uang', 't00_mata_uang.id = '.$this->table.'.mata_uang', 'left');
        $this->db->where($this->table.'.'.$this->id, $id);
        $this->db->select(
            $this->table.'.*
            , t04_package.nama as package
            , t05_agent.nama as agent
            , t00_mata_uang.kode as mata_uang
            ', false);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL, $bkm = null)
    {
        if ($bkm <> null) {
            $this->db->having('bkm', $bkm);
        }
        $this->db->like('id', $q);
    	$this->db->or_like('bkm', $q);
    	$this->db->or_like('name', $q);
    	$this->db->or_like('mf', $q);
    	$this->db->or_like('country', $q);
    	$this->db->or_like('id_number', $q);
    	$this->db->or_like('package', $q);
    	$this->db->or_like('night', $q);
    	$this->db->or_like('check_in', $q);
    	$this->db->or_like('check_out', $q);
    	$this->db->or_like('agent', $q);
    	$this->db->or_like('mata_uang', $q);
    	$this->db->or_like('price', $q);
    	$this->db->or_like('remarks', $q);
    	$this->db->or_like('usd', $q);
    	$this->db->or_like('aud', $q);
    	$this->db->or_like('paypal', $q);
    	$this->db->or_like('bca_dollar', $q);
    	$this->db->or_like('rp', $q);
    	$this->db->or_like('cc_bca', $q);
    	$this->db->or_like('cc_mandiri', $q);
    	$this->db->or_like('price_1', $q);
    	$this->db->or_like('price_1_value', $q);
    	$this->db->or_like('fee_tanas', $q);
    	$this->db->or_like('fee_tanas_value', $q);
    	$this->db->or_like('price_2', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL, $bkm = null)
    {
        $this->db->join('t04_package', 't04_package.id = '.$this->table.'.package', 'left');
        $this->db->join('t05_agent', 't05_agent.id = '.$this->table.'.agent', 'left');
        $this->db->join('t00_mata_uang', 't00_mata_uang.id = '.$this->table.'.mata_uang', 'left');
        if ($bkm <> null) {
            $this->db->having('bkm', $bkm);
        }
        $this->db->order_by($this->table.'.'.$this->id, $this->order);
        $this->db->like($this->table.'.'.'id', $q);
    	$this->db->or_like('bkm', $q);
    	$this->db->or_like('name', $q);
    	$this->db->or_like('mf', $q);
    	$this->db->or_like('country', $q);
    	$this->db->or_like('id_number', $q);
    	// $this->db->or_like('package', $q);
    	$this->db->or_like('t04_package.nama', $q);
    	$this->db->or_like('night', $q);
    	$this->db->or_like('check_in', $q);
    	$this->db->or_like('check_out', $q);
    	$this->db->or_like('agent', $q);
    	$this->db->or_like('mata_uang', $q);
    	$this->db->or_like('price', $q);
    	$this->db->or_like('remarks', $q);
    	$this->db->or_like('usd', $q);
    	$this->db->or_like('aud', $q);
    	$this->db->or_like('paypal', $q);
    	$this->db->or_like('bca_dollar', $q);
    	$this->db->or_like('rp', $q);
    	$this->db->or_like('cc_bca', $q);
    	$this->db->or_like('cc_mandiri', $q);
    	$this->db->or_like('price_1', $q);
    	$this->db->or_like('price_1_value', $q);
    	$this->db->or_like('fee_tanas', $q);
    	$this->db->or_like('fee_tanas_value', $q);
    	$this->db->or_like('price_2', $q);
    	$this->db->limit($limit, $start);
        $this->db->select(
            $this->table.'.*
            , t04_package.nama as package
            , t05_agent.nama as agent
            , t00_mata_uang.kode as mata_uang
            ', false);
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

/* End of file T31_bkm_detail_model.php */
/* Location: ./application/models/T31_bkm_detail_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-14 05:31:08 */
/* http://harviacode.com */
