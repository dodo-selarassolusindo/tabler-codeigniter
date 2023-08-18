<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T30_bkm extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('T30_bkm_model');
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't30_bkm?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't30_bkm?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't30_bkm';
            $config['first_url'] = base_url() . 't30_bkm';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T30_bkm_model->total_rows($q);
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['full_tag_open'] = '<ul class="pagination m-0 ms-auto">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = array('class' => 'page-link');
        $config['num_links'] = 5;
        $t30_bkm = $this->T30_bkm_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't30_bkm_data' => $t30_bkm,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('t30_bkm/t30_bkm_list', $data);
    }
    
    public function read($id)
    {
        $row = $this->T30_bkm_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'nomor' => $row->nomor,
                'tanggal' => $row->tanggal,
                'rate_usd' => $row->rate_usd,
                'rate_aud' => $row->rate_aud,
            );
            $this->load->view('t30_bkm/t30_bkm_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t30_bkm'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t30_bkm/create_action'),
            'id' => set_value('id'),
            'nomor' => set_value('nomor'),
            'tanggal' => set_value('tanggal'),
            'rate_usd' => set_value('rate_usd'),
            'rate_aud' => set_value('rate_aud'),
        );
        $this->load->view('t30_bkm/t30_bkm_form', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nomor' => $this->input->post('nomor',TRUE),
                'tanggal' => $this->input->post('tanggal',TRUE),
                'rate_usd' => $this->input->post('rate_usd',TRUE),
                'rate_aud' => $this->input->post('rate_aud',TRUE),
            );
            $this->T30_bkm_model->insert($data);
            $this->session->set_flashdata('message', 'Tambah Data berhasil');
            redirect(site_url('t30_bkm'));
        }
    }

    public function update($id)
    {
        $row = $this->T30_bkm_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t30_bkm/update_action'),
                'id' => set_value('id', $row->id),
                'nomor' => set_value('nomor', $row->nomor),
                'tanggal' => set_value('tanggal', $row->tanggal),
                'rate_usd' => set_value('rate_usd', $row->rate_usd),
                'rate_aud' => set_value('rate_aud', $row->rate_aud),
            );
            $this->load->view('t30_bkm/t30_bkm_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ada');
            redirect(site_url('t30_bkm'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'nomor' => $this->input->post('nomor',TRUE),
                'tanggal' => $this->input->post('tanggal',TRUE),
                'rate_usd' => $this->input->post('rate_usd',TRUE),
                'rate_aud' => $this->input->post('rate_aud',TRUE),
            );
            $this->T30_bkm_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Ubah Data berhasil');
            redirect(site_url('t30_bkm'));
        }
    }

    public function delete($id)
    {
        $row = $this->T30_bkm_model->get_by_id($id);
        if ($row) {
            $this->T30_bkm_model->delete($id);
            $this->session->set_flashdata('message', 'Hapus Data berhasil');
            redirect(site_url('t30_bkm'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ada');
            redirect(site_url('t30_bkm'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nomor', 'nomor', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
        $this->form_validation->set_rules('rate_usd', 'rate usd', 'trim|required|numeric');
        $this->form_validation->set_rules('rate_aud', 'rate aud', 'trim|required|numeric');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    
}

/* End of file T30_bkm.php */
/* Location: ./application/controllers/T30_bkm.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-18 06:20:47 */
/* http://harviacode.com */
