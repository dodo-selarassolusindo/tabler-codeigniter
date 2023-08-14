<?php
defined('BASEPATH') OR exit('No direct script access allowed');


    /**
     * get jenis pembayaran by id
     */
    function get_jenis_pembayaran($id)
    {
        $ci =& get_instance();
        $q = 'select nama from t01_jenis_pembayaran where id = '.$id;
        $row = $ci->db->query($q)->row();
        return $row->nama;
    }


    /**
     * get informasi tanggal periode terakhir
     */
    function is_periode_terbaru($tanggal)
    {
        $ci =& get_instance();
        $q = 'select max(tanggal) as max_tanggal from t03_periode';
        $row = $ci->db->query($q)->row();
        $tanggal_periode_terbaru = $row->max_tanggal;
        return $tanggal_periode_terbaru == $tanggal;
    }


    /**
     * get mata uang kode by id
     */
    function get_mata_uang_kode($id)
    {
        $ci =& get_instance();
        $q = 'select kode from t00_mata_uang where id = '.$id;
        $row = $ci->db->query($q)->row();
        return $row->kode;
    }


    /**
     * mengubah format tanggal menjadi format dd-mm-yyyy
     */
    function date_dmy($value)
    {
        return date_format(date_create($value), 'd-m-Y');
    }


    /**
     * mengubah format tanggal menjadi format yyyy-mm-dd
     */
    function date_ymd($value)
    {
        return date('Y-m-d', strtotime(str_replace('/', '-', $value)));
    }


    /**
     * menampilkan nilai variabel
     */
    function pre($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
