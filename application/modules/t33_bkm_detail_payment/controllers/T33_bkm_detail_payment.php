<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T33_bkm_detail_payment extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('T33_bkm_detail_payment_model');
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't33_bkm_detail_payment?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't33_bkm_detail_payment?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't33_bkm_detail_payment';
            $config['first_url'] = base_url() . 't33_bkm_detail_payment';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T33_bkm_detail_payment_model->total_rows($q);
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['full_tag_open'] = '<ul class="pagination m-0 ms-auto">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = array('class' => 'page-link');
        $config['num_links'] = 5;
        $t33_bkm_detail_payment = $this->T33_bkm_detail_payment_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't33_bkm_detail_payment_data' => $t33_bkm_detail_payment,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('t33_bkm_detail_payment/t33_bkm_detail_payment_list', $data);
    }
    
    public function read($id)
    {
        $row = $this->T33_bkm_detail_payment_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'bkm_detail' => $row->bkm_detail,
                'kolom_payment' => $row->kolom_payment,
                'jumlah' => $row->jumlah,
            );
            $this->load->view('t33_bkm_detail_payment/t33_bkm_detail_payment_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t33_bkm_detail_payment'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t33_bkm_detail_payment/create_action'),
            'id' => set_value('id'),
            'bkm_detail' => set_value('bkm_detail'),
            'kolom_payment' => set_value('kolom_payment'),
            'jumlah' => set_value('jumlah'),
        );
        $this->load->view('t33_bkm_detail_payment/t33_bkm_detail_payment_form', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'bkm_detail' => $this->input->post('bkm_detail',TRUE),
                'kolom_payment' => $this->input->post('kolom_payment',TRUE),
                'jumlah' => $this->input->post('jumlah',TRUE),
            );
            $this->T33_bkm_detail_payment_model->insert($data);
            $this->session->set_flashdata('message', 'Tambah Data berhasil');
            redirect(site_url('t33_bkm_detail_payment'));
        }
    }

    public function update($id)
    {
        $row = $this->T33_bkm_detail_payment_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t33_bkm_detail_payment/update_action'),
                'id' => set_value('id', $row->id),
                'bkm_detail' => set_value('bkm_detail', $row->bkm_detail),
                'kolom_payment' => set_value('kolom_payment', $row->kolom_payment),
                'jumlah' => set_value('jumlah', $row->jumlah),
            );
            $this->load->view('t33_bkm_detail_payment/t33_bkm_detail_payment_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ada');
            redirect(site_url('t33_bkm_detail_payment'));
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
                'kolom_payment' => $this->input->post('kolom_payment',TRUE),
                'jumlah' => $this->input->post('jumlah',TRUE),
            );
            $this->T33_bkm_detail_payment_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Ubah Data berhasil');
            redirect(site_url('t33_bkm_detail_payment'));
        }
    }

    public function delete($id)
    {
        $row = $this->T33_bkm_detail_payment_model->get_by_id($id);
        if ($row) {
            $this->T33_bkm_detail_payment_model->delete($id);
            $this->session->set_flashdata('message', 'Hapus Data berhasil');
            redirect(site_url('t33_bkm_detail_payment'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ada');
            redirect(site_url('t33_bkm_detail_payment'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('bkm_detail', 'bkm detail', 'trim|required');
        $this->form_validation->set_rules('kolom_payment', 'kolom payment', 'trim|required');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required|numeric');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    
}

/* End of file T33_bkm_detail_payment.php */
/* Location: ./application/controllers/T33_bkm_detail_payment.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-18 19:10:34 */
/* http://harviacode.com */
