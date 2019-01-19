<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Biodata extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('biodata_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $keyword = '';
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'biodata/index/';
        $config['total_rows'] = $this->biodata_model->total_rows();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['suffix'] = '.html';
        $config['first_url'] = base_url() . 'biodata.html';
        $this->pagination->initialize($config);

        $start = $this->uri->segment(3, 0);
        $biodata = $this->biodata_model->index_limit($config['per_page'], $start);

        $data = array(
            'biodata_data' => $biodata,
            'keyword' => $keyword,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->template->load('templates/editthistemplate','biodata_list', $data);
    }
    
    public function search() 
    {
        $keyword = $this->uri->segment(3, $this->input->post('keyword', TRUE));
        $this->load->library('pagination');
        
        if ($this->uri->segment(2)=='search') {
            $config['base_url'] = base_url() . 'biodata/search/' . $keyword;
        } else {
            $config['base_url'] = base_url() . 'biodata/index/';
        }

        $config['total_rows'] = $this->biodata_model->search_total_rows($keyword);
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['suffix'] = '.html';
        $config['first_url'] = base_url() . 'biodata/search/'.$keyword.'.html';
        $this->pagination->initialize($config);

        $start = $this->uri->segment(4, 0);
        $biodata = $this->biodata_model->search_index_limit($config['per_page'], $start, $keyword);

        $data = array(
            'biodata_data' => $biodata,
            'keyword' => $keyword,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('templates/editthistemplate','biodata_list', $data);
    }

    public function read($id) 
    {
        $row = $this->biodata_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'fk_idkelas' => $row->fk_idkelas,
		'nama' => $row->nama,
		'no_telp' => $row->no_telp,
		'alamat' => $row->alamat,
	    );
            $this->template->load('templates/editthistemplate','biodata_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('biodata'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('biodata/create_action'),
	    'id' => set_value('id'),
	    'fk_idkelas' => set_value('fk_idkelas'),
	    'nama' => set_value('nama'),
	    'no_telp' => set_value('no_telp'),
	    'alamat' => set_value('alamat'),
	);
        $this->template->load('templates/editthistemplate','biodata_form', $data);

    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'fk_idkelas' => $this->input->post('fk_idkelas',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
	    );

            $this->biodata_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('biodata'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->biodata_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('biodata/update_action'),
		'id' => set_value('id', $row->id),
		'fk_idkelas' => set_value('fk_idkelas', $row->fk_idkelas),
		'nama' => set_value('nama', $row->nama),
		'no_telp' => set_value('no_telp', $row->no_telp),
		'alamat' => set_value('alamat', $row->alamat),
	    );
            $this->template->load('templates/editthistemplate','biodata_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('biodata'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'fk_idkelas' => $this->input->post('fk_idkelas',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
	    );

            $this->biodata_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('biodata'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->biodata_model->get_by_id($id);

        if ($row) {
            $this->biodata_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('biodata'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('biodata'));
        }
    }

    function _rules() 
    {
	$this->form_validation->set_rules('fk_idkelas', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('nama', ' ', 'trim|required');
	$this->form_validation->set_rules('no_telp', ' ', 'trim|required');
	$this->form_validation->set_rules('alamat', ' ', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Biodata.php */
/* Location: ./application/modules/biodata/controllers/Biodata.php */