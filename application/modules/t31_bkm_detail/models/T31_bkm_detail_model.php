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

    // get data by id :: menyertakan detail payment
    function get_by_id_2($id)
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
        // return $this->db->get($this->table)->row();

        foreach($this->db->get($this->table)->result() as $key => $value) {
            // $data['data'][$key] = (object) array(
            // $data['data'] = (object) array(
            $data = (object) array(
                'id' => $value->id,
                'bkm' => $value->bkm,
                'name' => $value->name,
                'package' => $value->package,
                'night' => $value->night,
                'check_in' => $value->check_in,
                'check_out' => $value->check_out,
                'agent' => $value->agent == -1 ? '' : $value->agent,
                'mata_uang' => $value->mata_uang,
                'price' => $value->price,
                'price_1' => $value->price_1,
                'price_1_value' => $value->price_1_value,
                'fee_tanas' => $value->fee_tanas,
                'fee_tanas_value' => $value->fee_tanas_value,
                'price_2' => $value->price_2,
                'remarks' => $value->remarks,
            );

            $bkmDetailPayment = $this->db
                ->select('t32_bkm_detail_payment.*, t07_kolom_payment.id as kolom_payment_id, t07_kolom_payment.nama')
                ->from('t32_bkm_detail_payment')
                ->where('bkm_detail', $value->id)
                ->join('(select * from t07_kolom_payment order by urutan asc) t07_kolom_payment', 't07_kolom_payment.id = t32_bkm_detail_payment.kolom_payment', 'left')
                ->order_by('kolom_payment', 'ASC')
                ->get()->result();

            $bkmDetailPayment = $this->db
                ->select('t07_kolom_payment.id as kolom_payment_id, ifnull(t32_bkm_detail_payment.jumlah, 0) as jumlah')
                ->from('(select * from t07_kolom_payment order by urutan asc) t07_kolom_payment')
                ->join('(select * from t32_bkm_detail_payment where bkm_detail = '.$value->id.') t32_bkm_detail_payment', 't07_kolom_payment.id = t32_bkm_detail_payment.kolom_payment', 'left')
                ->order_by('t07_kolom_payment.urutan', 'asc')
                ->get()->result();
            // pre($bkmDetailPayment); exit;
            foreach($bkmDetailPayment as $row) {
                // array_push($data['data'][$key], [$row->nama => $row_value]);
                // array_push($data['data'][$key], [$row->nama => $row->jumlah]);
                // $data['data'][$key]['kolom_payment_id_'.$row->kolom_payment_id] = $row->jumlah;
                // $data['data'][$key]->{'kolom_payment_id_'.$row->kolom_payment_id} = $row->jumlah;
                $data->{'kolom_payment_id_'.$row->kolom_payment_id} = $row->jumlah;
            }

        }
        // exit;
        // pre($data['data']); exit;
        // pre($data); exit;
        // return (object)$data;
        return $data;
        // return json_decode(json_encode($data['data']), FALSE);
    }

    // get all by bkm :: menyertakan detail payment
    function get_limit_data_2($limit, $start = 0, $q = NULL, $bkm = null)
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
        // $this->db->select(
        //     $this->table.'.*
        //     , t04_package.nama as package_nama
        //     , t00_mata_uang.kode as mata_uang_kode
        //     , t05_agent.nama as agent_nama
        //     ');
        // $this->db->where('bkm', $bkm);
        // $this->db->join('t04_package', 't04_package.id = '.$this->table.'.package', 'left');
        // $this->db->join('t00_mata_uang', 't00_mata_uang.id = '.$this->table.'.mata_uang', 'left');
        // $this->db->join('t05_agent', 't05_agent.id = '.$this->table.'.agent', 'left');

        // return $this->db->get($this->table)->result();

        // hasil result-set diloop dulu dan ditambahkan dari kolom payment
        foreach($this->db->get($this->table)->result() as $key => $value) {
            $data['data'][$key] = (object) array(
            // $data['data'] = (object) array(
                'id' => $value->id,
                'bkm' => $value->bkm,
                'name' => $value->name,
                'package' => $value->package,
                'night' => $value->night,
                'check_in' => $value->check_in,
                'check_out' => $value->check_out,
                'agent' => $value->agent == -1 ? '' : $value->agent,
                'mata_uang' => $value->mata_uang,
                'price' => $value->price,
                'price_1' => $value->price_1,
                'price_1_value' => $value->price_1_value,
                'fee_tanas' => $value->fee_tanas,
                'fee_tanas_value' => $value->fee_tanas_value,
                'price_2' => $value->price_2,
                'remarks' => $value->remarks,
            );

            $bkmDetailPayment = $this->db
                ->select('t32_bkm_detail_payment.*, t07_kolom_payment.id as kolom_payment_id, t07_kolom_payment.nama')
                ->from('t32_bkm_detail_payment')
                ->where('bkm_detail', $value->id)
                ->join('(select * from t07_kolom_payment order by urutan asc) t07_kolom_payment', 't07_kolom_payment.id = t32_bkm_detail_payment.kolom_payment', 'left')
                ->order_by('kolom_payment', 'ASC')
                ->get()->result();

            $bkmDetailPayment = $this->db
                ->select('t07_kolom_payment.id as kolom_payment_id, ifnull(t32_bkm_detail_payment.jumlah, 0) as jumlah')
                ->from('(select * from t07_kolom_payment order by urutan asc) t07_kolom_payment')
                ->join('(select * from t32_bkm_detail_payment where bkm_detail = '.$value->id.') t32_bkm_detail_payment', 't07_kolom_payment.id = t32_bkm_detail_payment.kolom_payment', 'left')
                ->order_by('t07_kolom_payment.urutan', 'asc')
                ->get()->result();
            // pre($bkmDetailPayment); exit;
            foreach($bkmDetailPayment as $row) {
                // array_push($data['data'][$key], [$row->nama => $row_value]);
                // array_push($data['data'][$key], [$row->nama => $row->jumlah]);
                // $data['data'][$key]['kolom_payment_id_'.$row->kolom_payment_id] = $row->jumlah;
                $data['data'][$key]->{'kolom_payment_id_'.$row->kolom_payment_id} = $row->jumlah;
                // $data['data']->{'kolom_payment_id_'.$row->kolom_payment_id} = $row->jumlah;
            }

        }
        // exit;
        // pre($data['data']); exit;

        // return (object)$data;
        // return $data;
        return json_decode(json_encode($data['data']), FALSE);

    }

    function get_price_list($bkm_detail)
    {
        // pre($bkm_detail); exit;
        $this->db->where_in('id', $bkm_detail);
        $this->db->select_sum('price_1_value');
        return $this->db->get($this->table)->row()->price_1_value;
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
            , '.$this->table.'.package as package_id
            , '.$this->table.'.mata_uang as mata_uang_id
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
