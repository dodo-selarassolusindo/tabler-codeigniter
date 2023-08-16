<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T07_kolom_payment extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('T07_kolom_payment_model');
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't07_kolom_payment?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't07_kolom_payment?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't07_kolom_payment';
            $config['first_url'] = base_url() . 't07_kolom_payment';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T07_kolom_payment_model->total_rows($q);
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['full_tag_open'] = '<ul class="pagination m-0 ms-auto">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = array('class' => 'page-link');
        $config['num_links'] = 5;
        $t07_kolom_payment = $this->T07_kolom_payment_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't07_kolom_payment_data' => $t07_kolom_payment,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('t07_kolom_payment/t07_kolom_payment_list', $data);
    }
    
    public function read($id)
    {
        $row = $this->T07_kolom_payment_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'urutan' => $row->urutan,
                'nama' => $row->nama,
                'mata_uang' => $row->mata_uang,
            );
            $this->load->view('t07_kolom_payment/t07_kolom_payment_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t07_kolom_payment'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t07_kolom_payment/create_action'),
            'id' => set_value('id'),
            'urutan' => set_value('urutan'),
            'nama' => set_value('nama'),
            'mata_uang' => set_value('mata_uang'),
        );
        $this->load->view('t07_kolom_payment/t07_kolom_payment_form', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'urutan' => $this->input->post('urutan',TRUE),
                'nama' => $this->input->post('nama',TRUE),
                'mata_uang' => $this->input->post('mata_uang',TRUE),
            );
            $this->T07_kolom_payment_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t07_kolom_payment'));
        }
    }

    public function update($id)
    {
        $row = $this->T07_kolom_payment_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t07_kolom_payment/update_action'),
                'id' => set_value('id', $row->id),
                'urutan' => set_value('urutan', $row->urutan),
                'nama' => set_value('nama', $row->nama),
                'mata_uang' => set_value('mata_uang', $row->mata_uang),
            );
            $this->load->view('t07_kolom_payment/t07_kolom_payment_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t07_kolom_payment'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'urutan' => $this->input->post('urutan',TRUE),
                'nama' => $this->input->post('nama',TRUE),
                'mata_uang' => $this->input->post('mata_uang',TRUE),
            );
            $this->T07_kolom_payment_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t07_kolom_payment'));
        }
    }

    public function delete($id)
    {
        $row = $this->T07_kolom_payment_model->get_by_id($id);
        if ($row) {
            $this->T07_kolom_payment_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t07_kolom_payment'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t07_kolom_payment'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('urutan', 'urutan', 'trim|required');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('mata_uang', 'mata uang', 'trim|required');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    
}

/* End of file T07_kolom_payment.php */
/* Location: ./application/controllers/T07_kolom_payment.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-16 08:39:31 */
/* http://harviacode.com */

?>