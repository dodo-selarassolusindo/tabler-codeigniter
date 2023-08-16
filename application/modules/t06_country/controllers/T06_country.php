<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T06_country extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('T06_country_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't06_country?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't06_country?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't06_country';
            $config['first_url'] = base_url() . 't06_country';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T06_country_model->total_rows($q);
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['full_tag_open'] = '<ul class="pagination m-0 ms-auto">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = array('class' => 'page-link');
        $config['num_links'] = 5;
        $t06_country = $this->T06_country_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't06_country_data' => $t06_country,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('t06_country/t06_country_list', $data);
    }

    public function read($id)
    {
        $row = $this->T06_country_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_country' => $row->id_country,
                'country_name' => $row->country_name,
            );
            $this->load->view('t06_country/t06_country_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t06_country'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t06_country/create_action'),
            'id_country' => set_value('id_country'),
            'country_name' => set_value('country_name'),
        );
        $this->load->view('t06_country/t06_country_form', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'country_name' => $this->input->post('country_name',TRUE),
            );
            $this->T06_country_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t06_country'));
        }
    }

    public function update($id)
    {
        $row = $this->T06_country_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t06_country/update_action'),
                'id_country' => set_value('id_country', $row->id_country),
                'country_name' => set_value('country_name', $row->country_name),
            );
            $this->load->view('t06_country/t06_country_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t06_country'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_country', TRUE));
        } else {
            $data = array(
                'country_name' => $this->input->post('country_name',TRUE),
            );
            $this->T06_country_model->update($this->input->post('id_country', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t06_country'));
        }
    }

    public function delete($id)
    {
        $row = $this->T06_country_model->get_by_id($id);
        if ($row) {
            $this->T06_country_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t06_country'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t06_country'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('country_name', 'country name', 'trim|required');
        $this->form_validation->set_rules('id_country', 'id_country', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file T06_country.php */
/* Location: ./application/controllers/T06_country.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-16 08:38:49 */
/* http://harviacode.com */
