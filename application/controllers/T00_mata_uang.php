<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T00_mata_uang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('T00_mata_uang_model');
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't00_mata_uang?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't00_mata_uang?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't00_mata_uang';
            $config['first_url'] = base_url() . 't00_mata_uang';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T00_mata_uang_model->total_rows($q);
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['full_tag_open'] = '<ul class="pagination m-0 ms-auto">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = array('class' => 'page-link');
        $config['num_links'] = 5;
        $t00_mata_uang = $this->T00_mata_uang_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't00_mata_uang_data' => $t00_mata_uang,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('t00_mata_uang/t00_mata_uang_list', $data);
    }
    
    public function read($id)
    {
        $row = $this->T00_mata_uang_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'kode' => $row->kode,
                'nama' => $row->nama,
                'simbol' => $row->simbol,
            );
            $this->load->view('t00_mata_uang/t00_mata_uang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t00_mata_uang'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t00_mata_uang/create_action'),
            'id' => set_value('id'),
            'kode' => set_value('kode'),
            'nama' => set_value('nama'),
            'simbol' => set_value('simbol'),
        );
        $this->load->view('t00_mata_uang/t00_mata_uang_form', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kode' => $this->input->post('kode',TRUE),
                'nama' => $this->input->post('nama',TRUE),
                'simbol' => $this->input->post('simbol',TRUE),
            );
            $this->T00_mata_uang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t00_mata_uang'));
        }
    }

    public function update($id)
    {
        $row = $this->T00_mata_uang_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t00_mata_uang/update_action'),
                'id' => set_value('id', $row->id),
                'kode' => set_value('kode', $row->kode),
                'nama' => set_value('nama', $row->nama),
                'simbol' => set_value('simbol', $row->simbol),
            );
            $this->load->view('t00_mata_uang/t00_mata_uang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t00_mata_uang'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'kode' => $this->input->post('kode',TRUE),
                'nama' => $this->input->post('nama',TRUE),
                'simbol' => $this->input->post('simbol',TRUE),
            );
            $this->T00_mata_uang_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t00_mata_uang'));
        }
    }

    public function delete($id)
    {
        $row = $this->T00_mata_uang_model->get_by_id($id);
        if ($row) {
            $this->T00_mata_uang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t00_mata_uang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t00_mata_uang'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kode', 'kode', 'trim|required');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('simbol', 'simbol', 'trim|required');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    
}

/* End of file T00_mata_uang.php */
/* Location: ./application/controllers/T00_mata_uang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-16 11:56:07 */
/* http://harviacode.com */
