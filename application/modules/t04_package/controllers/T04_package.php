<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T04_package extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('T04_package_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't04_package?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't04_package?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't04_package';
            $config['first_url'] = base_url() . 't04_package';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T04_package_model->total_rows($q);
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['full_tag_open'] = '<ul class="pagination m-0 ms-auto">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = array('class' => 'page-link');
        $config['num_links'] = 5;
        $t04_package = $this->T04_package_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't04_package_data' => $t04_package,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('t04_package/t04_package_list', $data);
    }

    public function read($id)
    {
        $row = $this->T04_package_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'periode' => $row->periode,
                'kode' => $row->kode,
                'nama' => $row->nama,
                'ln3n_mata_uang' => $row->ln3n_mata_uang,
                'ln3n_harga' => $row->ln3n_harga,
                'ln6n_mata_uang' => $row->ln6n_mata_uang,
                'ln6n_harga' => $row->ln6n_harga,
                'ln1n_mata_uang' => $row->ln1n_mata_uang,
                'ln1n_harga' => $row->ln1n_harga,
                'dnrb_mata_uang' => $row->dnrb_mata_uang,
                'dnrb_harga' => $row->dnrb_harga,
                'dnfb_mata_uang' => $row->dnfb_mata_uang,
                'dnfb_harga' => $row->dnfb_harga,
            );
            $this->load->view('t04_package/t04_package_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t04_package'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t04_package/create_action'),
            'id' => set_value('id'),
            'periode' => set_value('periode'),
            'kode' => set_value('kode'),
            'nama' => set_value('nama'),
            'ln3n_mata_uang' => set_value('ln3n_mata_uang'),
            'ln3n_harga' => set_value('ln3n_harga'),
            'ln6n_mata_uang' => set_value('ln6n_mata_uang'),
            'ln6n_harga' => set_value('ln6n_harga'),
            'ln1n_mata_uang' => set_value('ln1n_mata_uang'),
            'ln1n_harga' => set_value('ln1n_harga'),
            'dnrb_mata_uang' => set_value('dnrb_mata_uang'),
            'dnrb_harga' => set_value('dnrb_harga'),
            'dnfb_mata_uang' => set_value('dnfb_mata_uang'),
            'dnfb_harga' => set_value('dnfb_harga'),
        );
        $this->load->view('t04_package/t04_package_form', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'periode' => $this->input->post('periode',TRUE),
                'kode' => $this->input->post('kode',TRUE),
                'nama' => $this->input->post('nama',TRUE),
                'ln3n_mata_uang' => $this->input->post('ln3n_mata_uang',TRUE),
                'ln3n_harga' => $this->input->post('ln3n_harga',TRUE),
                'ln6n_mata_uang' => $this->input->post('ln6n_mata_uang',TRUE),
                'ln6n_harga' => $this->input->post('ln6n_harga',TRUE),
                'ln1n_mata_uang' => $this->input->post('ln1n_mata_uang',TRUE),
                'ln1n_harga' => $this->input->post('ln1n_harga',TRUE),
                'dnrb_mata_uang' => $this->input->post('dnrb_mata_uang',TRUE),
                'dnrb_harga' => $this->input->post('dnrb_harga',TRUE),
                'dnfb_mata_uang' => $this->input->post('dnfb_mata_uang',TRUE),
                'dnfb_harga' => $this->input->post('dnfb_harga',TRUE),
            );
            $this->T04_package_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t04_package'));
        }
    }

    public function update($id)
    {
        $row = $this->T04_package_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t04_package/update_action'),
                'id' => set_value('id', $row->id),
                'periode' => set_value('periode', $row->periode),
                'kode' => set_value('kode', $row->kode),
                'nama' => set_value('nama', $row->nama),
                'ln3n_mata_uang' => set_value('ln3n_mata_uang', $row->ln3n_mata_uang),
                'ln3n_harga' => set_value('ln3n_harga', $row->ln3n_harga),
                'ln6n_mata_uang' => set_value('ln6n_mata_uang', $row->ln6n_mata_uang),
                'ln6n_harga' => set_value('ln6n_harga', $row->ln6n_harga),
                'ln1n_mata_uang' => set_value('ln1n_mata_uang', $row->ln1n_mata_uang),
                'ln1n_harga' => set_value('ln1n_harga', $row->ln1n_harga),
                'dnrb_mata_uang' => set_value('dnrb_mata_uang', $row->dnrb_mata_uang),
                'dnrb_harga' => set_value('dnrb_harga', $row->dnrb_harga),
                'dnfb_mata_uang' => set_value('dnfb_mata_uang', $row->dnfb_mata_uang),
                'dnfb_harga' => set_value('dnfb_harga', $row->dnfb_harga),
            );
            $this->load->view('t04_package/t04_package_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t04_package'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'periode' => $this->input->post('periode',TRUE),
                'kode' => $this->input->post('kode',TRUE),
                'nama' => $this->input->post('nama',TRUE),
                'ln3n_mata_uang' => $this->input->post('ln3n_mata_uang',TRUE),
                'ln3n_harga' => $this->input->post('ln3n_harga',TRUE),
                'ln6n_mata_uang' => $this->input->post('ln6n_mata_uang',TRUE),
                'ln6n_harga' => $this->input->post('ln6n_harga',TRUE),
                'ln1n_mata_uang' => $this->input->post('ln1n_mata_uang',TRUE),
                'ln1n_harga' => $this->input->post('ln1n_harga',TRUE),
                'dnrb_mata_uang' => $this->input->post('dnrb_mata_uang',TRUE),
                'dnrb_harga' => $this->input->post('dnrb_harga',TRUE),
                'dnfb_mata_uang' => $this->input->post('dnfb_mata_uang',TRUE),
                'dnfb_harga' => $this->input->post('dnfb_harga',TRUE),
            );
            $this->T04_package_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t04_package'));
        }
    }

    public function delete($id)
    {
        $row = $this->T04_package_model->get_by_id($id);
        if ($row) {
            $this->T04_package_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t04_package'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t04_package'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('periode', 'periode', 'trim|required');
        $this->form_validation->set_rules('kode', 'kode', 'trim|required');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('ln3n_mata_uang', 'ln3n mata uang', 'trim|required');
        $this->form_validation->set_rules('ln3n_harga', 'ln3n harga', 'trim|required|numeric');
        $this->form_validation->set_rules('ln6n_mata_uang', 'ln6n mata uang', 'trim|required');
        $this->form_validation->set_rules('ln6n_harga', 'ln6n harga', 'trim|required|numeric');
        $this->form_validation->set_rules('ln1n_mata_uang', 'ln1n mata uang', 'trim|required');
        $this->form_validation->set_rules('ln1n_harga', 'ln1n harga', 'trim|required|numeric');
        $this->form_validation->set_rules('dnrb_mata_uang', 'dnrb mata uang', 'trim|required');
        $this->form_validation->set_rules('dnrb_harga', 'dnrb harga', 'trim|required|numeric');
        $this->form_validation->set_rules('dnfb_mata_uang', 'dnfb mata uang', 'trim|required');
        $this->form_validation->set_rules('dnfb_harga', 'dnfb harga', 'trim|required|numeric');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file T04_package.php */
/* Location: ./application/controllers/T04_package.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-16 08:37:34 */
/* http://harviacode.com */
