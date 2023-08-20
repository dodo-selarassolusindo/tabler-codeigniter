<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T33_selisih_price extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('T33_selisih_price_model');
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't33_selisih_price?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't33_selisih_price?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't33_selisih_price';
            $config['first_url'] = base_url() . 't33_selisih_price';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T33_selisih_price_model->total_rows($q);
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['full_tag_open'] = '<ul class="pagination m-0 ms-auto">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = array('class' => 'page-link');
        $config['num_links'] = 5;
        $t33_selisih_price = $this->T33_selisih_price_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't33_selisih_price_data' => $t33_selisih_price,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('t33_selisih_price/t33_selisih_price_list', $data);
    }
    
    public function read($id)
    {
        $row = $this->T33_selisih_price_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'bkm_detail' => $row->bkm_detail,
                'tanggal' => $row->tanggal,
                'mata_uang' => $row->mata_uang,
                'jumlah' => $row->jumlah,
            );
            $this->load->view('t33_selisih_price/t33_selisih_price_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t33_selisih_price'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t33_selisih_price/create_action'),
            'id' => set_value('id'),
            'bkm_detail' => set_value('bkm_detail'),
            'tanggal' => set_value('tanggal'),
            'mata_uang' => set_value('mata_uang'),
            'jumlah' => set_value('jumlah'),
        );
        $this->load->view('t33_selisih_price/t33_selisih_price_form', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'bkm_detail' => $this->input->post('bkm_detail',TRUE),
                'tanggal' => $this->input->post('tanggal',TRUE),
                'mata_uang' => $this->input->post('mata_uang',TRUE),
                'jumlah' => $this->input->post('jumlah',TRUE),
            );
            $this->T33_selisih_price_model->insert($data);
            $this->session->set_flashdata('message', 'Tambah Data berhasil');
            redirect(site_url('t33_selisih_price'));
        }
    }

    public function update($id)
    {
        $row = $this->T33_selisih_price_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t33_selisih_price/update_action'),
                'id' => set_value('id', $row->id),
                'bkm_detail' => set_value('bkm_detail', $row->bkm_detail),
                'tanggal' => set_value('tanggal', $row->tanggal),
                'mata_uang' => set_value('mata_uang', $row->mata_uang),
                'jumlah' => set_value('jumlah', $row->jumlah),
            );
            $this->load->view('t33_selisih_price/t33_selisih_price_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ada');
            redirect(site_url('t33_selisih_price'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'bkm_detail' => $this->input->post('bkm_detail',TRUE),
                'tanggal' => $this->input->post('tanggal',TRUE),
                'mata_uang' => $this->input->post('mata_uang',TRUE),
                'jumlah' => $this->input->post('jumlah',TRUE),
            );
            $this->T33_selisih_price_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Ubah Data berhasil');
            redirect(site_url('t33_selisih_price'));
        }
    }

    public function delete($id)
    {
        $row = $this->T33_selisih_price_model->get_by_id($id);
        if ($row) {
            $this->T33_selisih_price_model->delete($id);
            $this->session->set_flashdata('message', 'Hapus Data berhasil');
            redirect(site_url('t33_selisih_price'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ada');
            redirect(site_url('t33_selisih_price'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('bkm_detail', 'bkm detail', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
        $this->form_validation->set_rules('mata_uang', 'mata uang', 'trim|required');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required|numeric');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    
}

/* End of file T33_selisih_price.php */
/* Location: ./application/controllers/T33_selisih_price.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-20 05:28:33 */
/* http://harviacode.com */
