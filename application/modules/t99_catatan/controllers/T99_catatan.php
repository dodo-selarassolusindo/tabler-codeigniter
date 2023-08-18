<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T99_catatan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('T99_catatan_model');
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't99_catatan?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't99_catatan?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't99_catatan';
            $config['first_url'] = base_url() . 't99_catatan';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T99_catatan_model->total_rows($q);
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['full_tag_open'] = '<ul class="pagination m-0 ms-auto">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = array('class' => 'page-link');
        $config['num_links'] = 5;
        $t99_catatan = $this->T99_catatan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't99_catatan_data' => $t99_catatan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('t99_catatan/t99_catatan_list', $data);
    }
    
    public function read($id)
    {
        $row = $this->T99_catatan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'tanggal' => $row->tanggal,
                'catatan' => $row->catatan,
            );
            $this->load->view('t99_catatan/t99_catatan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t99_catatan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t99_catatan/create_action'),
            'id' => set_value('id'),
            'tanggal' => set_value('tanggal'),
            'catatan' => set_value('catatan'),
        );
        $this->load->view('t99_catatan/t99_catatan_form', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'tanggal' => $this->input->post('tanggal',TRUE),
                'catatan' => $this->input->post('catatan',TRUE),
            );
            $this->T99_catatan_model->insert($data);
            $this->session->set_flashdata('message', 'Tambah Data berhasil');
            redirect(site_url('t99_catatan'));
        }
    }

    public function update($id)
    {
        $row = $this->T99_catatan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t99_catatan/update_action'),
                'id' => set_value('id', $row->id),
                'tanggal' => set_value('tanggal', $row->tanggal),
                'catatan' => set_value('catatan', $row->catatan),
            );
            $this->load->view('t99_catatan/t99_catatan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ada');
            redirect(site_url('t99_catatan'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'tanggal' => $this->input->post('tanggal',TRUE),
                'catatan' => $this->input->post('catatan',TRUE),
            );
            $this->T99_catatan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Ubah Data berhasil');
            redirect(site_url('t99_catatan'));
        }
    }

    public function delete($id)
    {
        $row = $this->T99_catatan_model->get_by_id($id);
        if ($row) {
            $this->T99_catatan_model->delete($id);
            $this->session->set_flashdata('message', 'Hapus Data berhasil');
            redirect(site_url('t99_catatan'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ada');
            redirect(site_url('t99_catatan'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
        $this->form_validation->set_rules('catatan', 'catatan', 'trim|required');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    
}

/* End of file T99_catatan.php */
/* Location: ./application/controllers/T99_catatan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-18 06:21:13 */
/* http://harviacode.com */
