<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T36_pembayaran_oleh extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('T36_pembayaran_oleh_model');
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't36_pembayaran_oleh?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't36_pembayaran_oleh?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't36_pembayaran_oleh';
            $config['first_url'] = base_url() . 't36_pembayaran_oleh';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T36_pembayaran_oleh_model->total_rows($q);
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['full_tag_open'] = '<ul class="pagination m-0 ms-auto">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = array('class' => 'page-link');
        $config['num_links'] = 5;
        $t36_pembayaran_oleh = $this->T36_pembayaran_oleh_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't36_pembayaran_oleh_data' => $t36_pembayaran_oleh,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('t36_pembayaran_oleh/t36_pembayaran_oleh_list', $data);
    }
    
    public function read($id)
    {
        $row = $this->T36_pembayaran_oleh_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'bkm_detail' => $row->bkm_detail,
                'paid_for' => $row->paid_for,
            );
            $this->load->view('t36_pembayaran_oleh/t36_pembayaran_oleh_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t36_pembayaran_oleh'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t36_pembayaran_oleh/create_action'),
            'id' => set_value('id'),
            'bkm_detail' => set_value('bkm_detail'),
            'paid_for' => set_value('paid_for'),
        );
        $this->load->view('t36_pembayaran_oleh/t36_pembayaran_oleh_form', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'bkm_detail' => $this->input->post('bkm_detail',TRUE),
                'paid_for' => $this->input->post('paid_for',TRUE),
            );
            $this->T36_pembayaran_oleh_model->insert($data);
            $this->session->set_flashdata('message', 'Tambah Data berhasil');
            redirect(site_url('t36_pembayaran_oleh'));
        }
    }

    public function update($id)
    {
        $row = $this->T36_pembayaran_oleh_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t36_pembayaran_oleh/update_action'),
                'id' => set_value('id', $row->id),
                'bkm_detail' => set_value('bkm_detail', $row->bkm_detail),
                'paid_for' => set_value('paid_for', $row->paid_for),
            );
            $this->load->view('t36_pembayaran_oleh/t36_pembayaran_oleh_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ada');
            redirect(site_url('t36_pembayaran_oleh'));
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
                'paid_for' => $this->input->post('paid_for',TRUE),
            );
            $this->T36_pembayaran_oleh_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Ubah Data berhasil');
            redirect(site_url('t36_pembayaran_oleh'));
        }
    }

    public function delete($id)
    {
        $row = $this->T36_pembayaran_oleh_model->get_by_id($id);
        if ($row) {
            $this->T36_pembayaran_oleh_model->delete($id);
            $this->session->set_flashdata('message', 'Hapus Data berhasil');
            redirect(site_url('t36_pembayaran_oleh'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ada');
            redirect(site_url('t36_pembayaran_oleh'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('bkm_detail', 'bkm detail', 'trim|required|numeric');
        $this->form_validation->set_rules('paid_for', 'paid for', 'trim|required|numeric');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    
}

/* End of file T36_pembayaran_oleh.php */
/* Location: ./application/controllers/T36_pembayaran_oleh.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-26 20:39:43 */
/* http://harviacode.com */
