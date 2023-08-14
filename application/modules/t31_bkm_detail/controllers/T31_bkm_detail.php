<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T31_bkm_detail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T31_bkm_detail_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't31_bkm_detail?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't31_bkm_detail?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't31_bkm_detail';
            $config['first_url'] = base_url() . 't31_bkm_detail';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T31_bkm_detail_model->total_rows($q);
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['full_tag_open'] = '<ul class="pagination m-0 ms-auto">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = array('class' => 'page-link');
        $config['num_links'] = 5;
        $t31_bkm_detail = $this->T31_bkm_detail_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't31_bkm_detail_data' => $t31_bkm_detail,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('t31_bkm_detail/t31_bkm_detail_list', $data);
    }

    public function read($id)
    {
        $row = $this->T31_bkm_detail_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'bkm' => $row->bkm,
		'name' => $row->name,
		'mf' => $row->mf,
		'country' => $row->country,
		'id_number' => $row->id_number,
		'package' => $row->package,
		'night' => $row->night,
		'check_in' => $row->check_in,
		'check_out' => $row->check_out,
		'agent' => $row->agent,
		'mata_uang' => $row->mata_uang,
		'price' => $row->price,
		'remarks' => $row->remarks,
		'usd' => $row->usd,
		'aud' => $row->aud,
		'paypal' => $row->paypal,
		'bca_dollar' => $row->bca_dollar,
		'rp' => $row->rp,
		'cc_bca' => $row->cc_bca,
		'cc_mandiri' => $row->cc_mandiri,
		'price_1' => $row->price_1,
		'price_1_value' => $row->price_1_value,
		'fee_tanas' => $row->fee_tanas,
		'fee_tanas_value' => $row->fee_tanas_value,
		'price_2' => $row->price_2,
	    );
            $this->load->view('t31_bkm_detail/t31_bkm_detail_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t31_bkm_detail'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t31_bkm_detail/create_action'),
	    'id' => set_value('id'),
	    'bkm' => set_value('bkm'),
	    'name' => set_value('name'),
	    'mf' => set_value('mf'),
	    'country' => set_value('country'),
	    'id_number' => set_value('id_number'),
	    'package' => set_value('package'),
	    'night' => set_value('night'),
	    'check_in' => set_value('check_in'),
	    'check_out' => set_value('check_out'),
	    'agent' => set_value('agent'),
	    'mata_uang' => set_value('mata_uang'),
	    'price' => set_value('price'),
	    'remarks' => set_value('remarks'),
	    'usd' => set_value('usd'),
	    'aud' => set_value('aud'),
	    'paypal' => set_value('paypal'),
	    'bca_dollar' => set_value('bca_dollar'),
	    'rp' => set_value('rp'),
	    'cc_bca' => set_value('cc_bca'),
	    'cc_mandiri' => set_value('cc_mandiri'),
	    'price_1' => set_value('price_1'),
	    'price_1_value' => set_value('price_1_value'),
	    'fee_tanas' => set_value('fee_tanas'),
	    'fee_tanas_value' => set_value('fee_tanas_value'),
	    'price_2' => set_value('price_2'),
	);
        $this->load->view('t31_bkm_detail/t31_bkm_detail_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'bkm' => $this->input->post('bkm',TRUE),
		'name' => $this->input->post('name',TRUE),
		'mf' => $this->input->post('mf',TRUE),
		'country' => $this->input->post('country',TRUE),
		'id_number' => $this->input->post('id_number',TRUE),
		'package' => $this->input->post('package',TRUE),
		'night' => $this->input->post('night',TRUE),
		'check_in' => $this->input->post('check_in',TRUE),
		'check_out' => $this->input->post('check_out',TRUE),
		'agent' => $this->input->post('agent',TRUE),
		'mata_uang' => $this->input->post('mata_uang',TRUE),
		'price' => $this->input->post('price',TRUE),
		'remarks' => $this->input->post('remarks',TRUE),
		'usd' => $this->input->post('usd',TRUE),
		'aud' => $this->input->post('aud',TRUE),
		'paypal' => $this->input->post('paypal',TRUE),
		'bca_dollar' => $this->input->post('bca_dollar',TRUE),
		'rp' => $this->input->post('rp',TRUE),
		'cc_bca' => $this->input->post('cc_bca',TRUE),
		'cc_mandiri' => $this->input->post('cc_mandiri',TRUE),
		'price_1' => $this->input->post('price_1',TRUE),
		'price_1_value' => $this->input->post('price_1_value',TRUE),
		'fee_tanas' => $this->input->post('fee_tanas',TRUE),
		'fee_tanas_value' => $this->input->post('fee_tanas_value',TRUE),
		'price_2' => $this->input->post('price_2',TRUE),
	    );

            $this->T31_bkm_detail_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t31_bkm_detail'));
        }
    }

    public function update($id)
    {
        $row = $this->T31_bkm_detail_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t31_bkm_detail/update_action'),
		'id' => set_value('id', $row->id),
		'bkm' => set_value('bkm', $row->bkm),
		'name' => set_value('name', $row->name),
		'mf' => set_value('mf', $row->mf),
		'country' => set_value('country', $row->country),
		'id_number' => set_value('id_number', $row->id_number),
		'package' => set_value('package', $row->package),
		'night' => set_value('night', $row->night),
		'check_in' => set_value('check_in', $row->check_in),
		'check_out' => set_value('check_out', $row->check_out),
		'agent' => set_value('agent', $row->agent),
		'mata_uang' => set_value('mata_uang', $row->mata_uang),
		'price' => set_value('price', $row->price),
		'remarks' => set_value('remarks', $row->remarks),
		'usd' => set_value('usd', $row->usd),
		'aud' => set_value('aud', $row->aud),
		'paypal' => set_value('paypal', $row->paypal),
		'bca_dollar' => set_value('bca_dollar', $row->bca_dollar),
		'rp' => set_value('rp', $row->rp),
		'cc_bca' => set_value('cc_bca', $row->cc_bca),
		'cc_mandiri' => set_value('cc_mandiri', $row->cc_mandiri),
		'price_1' => set_value('price_1', $row->price_1),
		'price_1_value' => set_value('price_1_value', $row->price_1_value),
		'fee_tanas' => set_value('fee_tanas', $row->fee_tanas),
		'fee_tanas_value' => set_value('fee_tanas_value', $row->fee_tanas_value),
		'price_2' => set_value('price_2', $row->price_2),
	    );
            $this->load->view('t31_bkm_detail/t31_bkm_detail_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t31_bkm_detail'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'bkm' => $this->input->post('bkm',TRUE),
		'name' => $this->input->post('name',TRUE),
		'mf' => $this->input->post('mf',TRUE),
		'country' => $this->input->post('country',TRUE),
		'id_number' => $this->input->post('id_number',TRUE),
		'package' => $this->input->post('package',TRUE),
		'night' => $this->input->post('night',TRUE),
		'check_in' => $this->input->post('check_in',TRUE),
		'check_out' => $this->input->post('check_out',TRUE),
		'agent' => $this->input->post('agent',TRUE),
		'mata_uang' => $this->input->post('mata_uang',TRUE),
		'price' => $this->input->post('price',TRUE),
		'remarks' => $this->input->post('remarks',TRUE),
		'usd' => $this->input->post('usd',TRUE),
		'aud' => $this->input->post('aud',TRUE),
		'paypal' => $this->input->post('paypal',TRUE),
		'bca_dollar' => $this->input->post('bca_dollar',TRUE),
		'rp' => $this->input->post('rp',TRUE),
		'cc_bca' => $this->input->post('cc_bca',TRUE),
		'cc_mandiri' => $this->input->post('cc_mandiri',TRUE),
		'price_1' => $this->input->post('price_1',TRUE),
		'price_1_value' => $this->input->post('price_1_value',TRUE),
		'fee_tanas' => $this->input->post('fee_tanas',TRUE),
		'fee_tanas_value' => $this->input->post('fee_tanas_value',TRUE),
		'price_2' => $this->input->post('price_2',TRUE),
	    );

            $this->T31_bkm_detail_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t31_bkm_detail'));
        }
    }

    public function delete($id)
    {
        $row = $this->T31_bkm_detail_model->get_by_id($id);

        if ($row) {
            $this->T31_bkm_detail_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t31_bkm_detail'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t31_bkm_detail'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('bkm', 'bkm', 'trim|required');
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('mf', 'mf', 'trim|required');
	$this->form_validation->set_rules('country', 'country', 'trim|required');
	$this->form_validation->set_rules('id_number', 'id number', 'trim|required');
	$this->form_validation->set_rules('package', 'package', 'trim|required');
	$this->form_validation->set_rules('night', 'night', 'trim|required');
	$this->form_validation->set_rules('check_in', 'check in', 'trim|required');
	$this->form_validation->set_rules('check_out', 'check out', 'trim|required');
	$this->form_validation->set_rules('agent', 'agent', 'trim|required');
	$this->form_validation->set_rules('mata_uang', 'mata uang', 'trim|required');
	$this->form_validation->set_rules('price', 'price', 'trim|required|numeric');
	$this->form_validation->set_rules('remarks', 'remarks', 'trim|required');
	$this->form_validation->set_rules('usd', 'usd', 'trim|required|numeric');
	$this->form_validation->set_rules('aud', 'aud', 'trim|required|numeric');
	$this->form_validation->set_rules('paypal', 'paypal', 'trim|required|numeric');
	$this->form_validation->set_rules('bca_dollar', 'bca dollar', 'trim|required|numeric');
	$this->form_validation->set_rules('rp', 'rp', 'trim|required|numeric');
	$this->form_validation->set_rules('cc_bca', 'cc bca', 'trim|required|numeric');
	$this->form_validation->set_rules('cc_mandiri', 'cc mandiri', 'trim|required|numeric');
	$this->form_validation->set_rules('price_1', 'price 1', 'trim|required');
	$this->form_validation->set_rules('price_1_value', 'price 1 value', 'trim|required');
	$this->form_validation->set_rules('fee_tanas', 'fee tanas', 'trim|required');
	$this->form_validation->set_rules('fee_tanas_value', 'fee tanas value', 'trim|required');
	$this->form_validation->set_rules('price_2', 'price 2', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file T31_bkm_detail.php */
/* Location: ./application/controllers/T31_bkm_detail.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-14 05:31:08 */
/* http://harviacode.com */