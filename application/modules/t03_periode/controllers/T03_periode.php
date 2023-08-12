<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T03_periode extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T03_periode_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't03_periode?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't03_periode?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't03_periode';
            $config['first_url'] = base_url() . 't03_periode';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T03_periode_model->total_rows($q);
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['full_tag_open'] = '<ul class="pagination m-0 ms-auto">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = array('class' => 'page-link');
        $config['num_links'] = 5;
        $t03_periode = $this->T03_periode_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't03_periode_data' => $t03_periode,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('t03_periode/t03_periode_list', $data);
    }

    public function read($id)
    {
        $row = $this->T03_periode_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'tanggal' => $row->tanggal,
	    );
            $this->load->view('t03_periode/t03_periode_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t03_periode'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t03_periode/create_action'),
	    'id' => set_value('id'),
	    'tanggal' => set_value('tanggal'),
	);
        $this->load->view('t03_periode/t03_periode_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tanggal' => $this->input->post('tanggal',TRUE),
	    );

            $this->T03_periode_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t03_periode'));
        }
    }

    public function update($id)
    {
        $row = $this->T03_periode_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t03_periode/update_action'),
		'id' => set_value('id', $row->id),
		'tanggal' => set_value('tanggal', $row->tanggal),
	    );
            $this->load->view('t03_periode/t03_periode_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t03_periode'));
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
	    );

            $this->T03_periode_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t03_periode'));
        }
    }

    public function delete($id)
    {
        $row = $this->T03_periode_model->get_by_id($id);

        if ($row) {
            $this->T03_periode_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t03_periode'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t03_periode'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file T03_periode.php */
/* Location: ./application/controllers/T03_periode.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-12 19:56:43 */
/* http://harviacode.com */
