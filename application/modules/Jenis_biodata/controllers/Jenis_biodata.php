<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_biodata extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') <> 'Admin')
        {
        	redirect('login');
        }
        $this->load->model('jenis_biodata_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Manajemen Jenis Biodata";
        $data['jenis_biodata_data'] = $this->jenis_biodata_model->get_all();
        $this->template->load('templates/template','tb_jenis_biodata_list', $data);
    }
    
    public function create() 
    {
        $data = array(
            'title' => 'Tambah Jenis Biodata',
            'button' => 'Create',
            'action' => site_url('jenis_biodata/create_action'),
            'id_jenis_biodata' => set_value('id_jenis_biodata'),
            'nama_jenis_biodata' => set_value('nama_jenis_biodata'),
            'id_tipe_jenis_biodata' => set_value('id_tipe_jenis_biodata'),
            'jenis_input' => $this->jenis_biodata_model->getJenisInput()
        );
        $this->template->load('templates/template','tb_jenis_biodata_form', $data);

    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $id = $this->jenis_biodata_model->getCountRow('tb_jenis_biodata');
            $idRow = $id->jumlah;
            $data = array(
                'id_jenis_biodata' => $idRow + 1,
                'nama_jenis_biodata' => $this->input->post('nama_jenis_biodata',TRUE),
                'id_tipe_jenis_biodata' => $this->input->post('id_tipe_jenis_biodata',TRUE),
            );

            $this->jenis_biodata_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_biodata'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->jenis_biodata_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Update Jenis Biodata',
                'button' => 'Update',
                'action' => site_url('jenis_biodata/update_action'),
                'id_jenis_biodata' => set_value('id_jenis_biodata', $row->id_jenis_biodata),
                'nama_jenis_biodata' => set_value('nama_jenis_biodata', $row->nama_jenis_biodata),
                'id_tipe_jenis_biodata' => set_value('id_tipe_jenis_biodata', $row->id_tipe_jenis_biodata),
                'jenis_input' => $this->jenis_biodata_model->getJenisInput()
            );
            $this->template->load('templates/template','tb_jenis_biodata_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_biodata'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenis_biodata', TRUE));
        } else {
            $data = array(
              'nama_jenis_biodata' => $this->input->post('nama_jenis_biodata',TRUE),
              'id_tipe_jenis_biodata' => $this->input->post('id_tipe_jenis_biodata',TRUE),
          );

            $this->jenis_biodata_model->update($this->input->post('id_jenis_biodata', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_biodata'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->jenis_biodata_model->get_by_id($id);

        if ($row) {
            $this->jenis_biodata_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_biodata'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_biodata'));
        }
    }

    function _rules() 
    {
     $this->form_validation->set_rules('nama_jenis_biodata', ' ', 'trim|required');

     $this->form_validation->set_rules('id_jenis_biodata', 'id_jenis_biodata', 'trim');
     $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
 }
}

/* End of file Jenis_biodata.php */
/* Location: ./application/modules/jenis_biodata/controllers/Jenis_biodata.php */