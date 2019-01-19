<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_pengajuan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('jenis_pengajuan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Manajemen Jenis Pengajuan";
        $data['jenis_pengajuan_data'] = $this->jenis_pengajuan_model->get_all();
        $this->template->load('templates/template','tb_jenis_pengajuan_list', $data);
    }
    
	public function kriteria($id)
    {
        $data['title'] = "Manajemen Jenis kriteria per Jenis Pengajuan";
        $data['jenis_pengajuan'] = $this->jenis_pengajuan_model->get_jenis_pengajuan($id);
        $data['jenis_kriteria_data'] = $this->jenis_pengajuan_model->get_kriteria($id);
        $this->template->load('templates/template','tb_jenis_pengajuan_list_kriteria', $data);
    }
    
	
    public function create() 
    {
        $data = array(
            'title' => 'Tambah Jenis Pengajuan',
            'button' => 'Create',
            'action' => site_url('jenis_pengajuan/create_action'),
	    'id_jenis_pengajuan' => set_value('id_jenis_pengajuan'),
	    'nama_jenis_pengajuan' => set_value('nama_jenis_pengajuan'),
	);
        $this->template->load('templates/template','tb_jenis_pengajuan_form', $data);

    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $id = $this->jenis_pengajuan_model->getCountRow('tb_jenis_pengajuan');
            $idRow = $id->jumlah;
            $data = array(
        'id_jenis_pengajuan' => $idRow + 1,
		'nama_jenis_pengajuan' => $this->input->post('nama_jenis_pengajuan',TRUE),
	    );

            $this->jenis_pengajuan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_pengajuan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->jenis_pengajuan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update Jenis Pengajuan',
                'button' => 'Update',
                'action' => site_url('jenis_pengajuan/update_action'),
		'id_jenis_pengajuan' => set_value('id_jenis_pengajuan', $row->id_jenis_pengajuan),
		'nama_jenis_pengajuan' => set_value('nama_jenis_pengajuan', $row->nama_jenis_pengajuan),
	    );
            $this->template->load('templates/template','tb_jenis_pengajuan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_pengajuan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenis_pengajuan', TRUE));
        } else {
            $data = array(
		'nama_jenis_pengajuan' => $this->input->post('nama_jenis_pengajuan',TRUE),
	    );

            $this->jenis_pengajuan_model->update($this->input->post('id_jenis_pengajuan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_pengajuan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->jenis_pengajuan_model->get_by_id($id);

        if ($row) {
            $this->jenis_pengajuan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_pengajuan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_pengajuan'));
        }
    }

    function _rules() 
    {
	$this->form_validation->set_rules('nama_jenis_pengajuan', ' ', 'trim|required');

	$this->form_validation->set_rules('id_jenis_pengajuan', 'id_jenis_pengajuan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Jenis_pengajuan.php */
/* Location: ./application/modules/jenis_pengajuan/controllers/Jenis_pengajuan.php */