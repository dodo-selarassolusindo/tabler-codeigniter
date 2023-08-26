<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T05_agent extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('T05_agent_model');
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't05_agent?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't05_agent?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't05_agent';
            $config['first_url'] = base_url() . 't05_agent';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T05_agent_model->total_rows($q);
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['full_tag_open'] = '<ul class="pagination m-0 ms-auto">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = array('class' => 'page-link');
        $config['num_links'] = 5;
        $t05_agent = $this->T05_agent_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't05_agent_data' => $t05_agent,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('t05_agent/t05_agent_list', $data);
    }
    
    public function read($id)
    {
        $row = $this->T05_agent_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'nama' => $row->nama,
                'komisi' => $row->komisi,
            );
            $this->load->view('t05_agent/t05_agent_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t05_agent'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t05_agent/create_action'),
            'id' => set_value('id'),
            'nama' => set_value('nama'),
            'komisi' => set_value('komisi'),
        );
        $this->load->view('t05_agent/t05_agent_form', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama' => $this->input->post('nama',TRUE),
                'komisi' => $this->input->post('komisi',TRUE),
            );
            $this->T05_agent_model->insert($data);
            $this->session->set_flashdata('message', 'Tambah Data berhasil');
            redirect(site_url('t05_agent'));
        }
    }

    public function update($id)
    {
        $row = $this->T05_agent_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t05_agent/update_action'),
                'id' => set_value('id', $row->id),
                'nama' => set_value('nama', $row->nama),
                'komisi' => set_value('komisi', $row->komisi),
            );
            $this->load->view('t05_agent/t05_agent_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ada');
            redirect(site_url('t05_agent'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'nama' => $this->input->post('nama',TRUE),
                'komisi' => $this->input->post('komisi',TRUE),
            );
            $this->T05_agent_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Ubah Data berhasil');
            redirect(site_url('t05_agent'));
        }
    }

    public function delete($id)
    {
        $row = $this->T05_agent_model->get_by_id($id);
        if ($row) {
            $this->T05_agent_model->delete($id);
            $this->session->set_flashdata('message', 'Hapus Data berhasil');
            redirect(site_url('t05_agent'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ada');
            redirect(site_url('t05_agent'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('komisi', 'komisi', 'trim|required|numeric');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    
}

/* End of file T05_agent.php */
/* Location: ./application/controllers/T05_agent.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-18 06:20:26 */
/* http://harviacode.com */
