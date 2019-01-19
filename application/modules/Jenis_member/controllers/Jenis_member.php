<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') <> 'Admin')
        {
        	redirect('login');
        }
        $this->load->model('jenis_member_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Manajemen Member";
        $data['jenis_member_data'] = $this->jenis_member_model->get_all();
        $this->template->load('templates/template','tb_jenis_member_list', $data);
    }
    
    public function create() 
    {
        $data = array(
            'title' => 'Tambah Jenis Member',
            'button' => 'Create',
            'action' => site_url('jenis_member/create_action'),
	    'id_jenis_member' => set_value('id_jenis_member'),
	    'nama_jenis_member' => set_value('nama_jenis_member'),
	);
        $this->template->load('templates/template','tb_jenis_member_form', $data);

    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $id = $this->jenis_member_model->getCountRow('tb_jenis_member');
            $idRow = $id->jumlah;
            $data = array(
                'id_jenis_member' => $idRow + 1,
		'nama_jenis_member' => $this->input->post('nama_jenis_member',TRUE),
	    );

            $this->jenis_member_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_member'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->jenis_member_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update Jenis Member',
                'button' => 'Update',
                'action' => site_url('jenis_member/update_action'),
		'id_jenis_member' => set_value('id_jenis_member', $row->id_jenis_member),
		'nama_jenis_member' => set_value('nama_jenis_member', $row->nama_jenis_member),
	    );
            $this->template->load('templates/template','tb_jenis_member_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_member'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenis_member', TRUE));
        } else {
            $data = array(
		'nama_jenis_member' => $this->input->post('nama_jenis_member',TRUE),
	    );

            $this->jenis_member_model->update($this->input->post('id_jenis_member', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_member'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->jenis_member_model->get_by_id($id);

        if ($row) {
            $this->jenis_member_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_member'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_member'));
        }
    }

    function _rules() 
    {
	$this->form_validation->set_rules('nama_jenis_member', ' ', 'trim|required');

	$this->form_validation->set_rules('id_jenis_member', 'id_jenis_member', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Jenis_member.php */
/* Location: ./application/modules/jenis_member/controllers/Jenis_member.php */