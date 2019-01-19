<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_persyaratan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') <> 'Admin')
        {
        	redirect('login');
        }
        $this->load->model('jenis_persyaratan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Manajemen Jenis Persyaratan";
        $data['jenis_persyaratan_data'] = $this->jenis_persyaratan_model->get_all();
        $this->template->load('templates/template','tb_jenis_persyaratan_list', $data);
    }
    
    public function create() 
    {
        $data = array(
            'title' => 'Tambah Jenis Persyaratan',
            'button' => 'Create',
            'action' => site_url('jenis_persyaratan/create_action'),
	    'id_jenis_persyaratan' => set_value('id_jenis_persyaratan'),
	    'nama_jenis_persyaratan' => set_value('nama_jenis_persyaratan'),
	    'kode_jenis_persyaratan' => set_value('kode_jenis_persyaratan'),
	    'tipe_jenis_persyaratan' => set_value('tipe_jenis_persyaratan'),
        'jenis_input' => $this->jenis_persyaratan_model->getJenisInput()
	);
        $this->template->load('templates/template','tb_jenis_persyaratan_form', $data);

    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $id = $this->jenis_persyaratan_model->getCountRow('tb_jenis_persyaratan');
            $idRow = $id->jumlah;
            $data = array(
                'id_jenis_persyaratan' => $idRow + 1,
		'nama_jenis_persyaratan' => $this->input->post('nama_jenis_persyaratan',TRUE),
		'kode_jenis_persyaratan' => $this->input->post('kode_jenis_persyaratan',TRUE),
		'tipe_jenis_persyaratan' => $this->input->post('tipe_jenis_persyaratan',TRUE),
	    );

            $this->jenis_persyaratan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_persyaratan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->jenis_persyaratan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update Jenis Persyaratan',
                'button' => 'Update',
                'action' => site_url('jenis_persyaratan/update_action'),
		'id_jenis_persyaratan' => set_value('id_jenis_persyaratan', $row->id_jenis_persyaratan),
		'nama_jenis_persyaratan' => set_value('nama_jenis_persyaratan', $row->nama_jenis_persyaratan),
		'kode_jenis_persyaratan' => set_value('kode_jenis_persyaratan', $row->kode_jenis_persyaratan),
		'tipe_jenis_persyaratan' => set_value('tipe_jenis_persyaratan', $row->tipe_jenis_persyaratan),
        'jenis_input' => $this->jenis_persyaratan_model->getJenisInput()
	    );
            $this->template->load('templates/template','tb_jenis_persyaratan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_persyaratan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenis_persyaratan', TRUE));
        } else {
            $data = array(
		'nama_jenis_persyaratan' => $this->input->post('nama_jenis_persyaratan',TRUE),
		'kode_jenis_persyaratan' => $this->input->post('kode_jenis_persyaratan',TRUE),
		'tipe_jenis_persyaratan' => $this->input->post('tipe_jenis_persyaratan',TRUE),
	    );

            $this->jenis_persyaratan_model->update($this->input->post('id_jenis_persyaratan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_persyaratan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->jenis_persyaratan_model->get_by_id($id);

        if ($row) {
            $this->jenis_persyaratan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_persyaratan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_persyaratan'));
        }
    }

    function _rules() 
    {
	$this->form_validation->set_rules('nama_jenis_persyaratan', ' ', 'trim|required');
	$this->form_validation->set_rules('kode_jenis_persyaratan', ' ', 'trim|required');
	$this->form_validation->set_rules('tipe_jenis_persyaratan', ' ', 'trim|required');

	$this->form_validation->set_rules('id_jenis_persyaratan', 'id_jenis_persyaratan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Jenis_persyaratan.php */
/* Location: ./application/modules/jenis_persyaratan/controllers/Jenis_persyaratan.php */