<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class jenis_warga extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') <> 'Admin')
        {
        	redirect('login');
        }
        $this->load->model('jenis_warga_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Manajemen Warga";
        $data['jenis_warga_data'] = $this->jenis_warga_model->get_all();
        $this->template->load('templates/template','tb_jenis_warga_list', $data);
    }
    
    public function create() 
    {
        $data = array(
            'title' => 'Tambah jenis warga',
            'button' => 'Tambah',
            'action' => site_url('jenis_warga/create_action'),
            'id_jenis_warga' => set_value('id_jenis_warga'),
            'nama_jenis_warga' => set_value('nama_jenis_warga'),
        );
        $this->template->load('templates/template','tb_jenis_warga_form', $data);

    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
              'nama_jenis_warga' => $this->input->post('nama_jenis_warga',TRUE),
          );

            $this->jenis_warga_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_warga'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->jenis_warga_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Perbarui jenis warga',
                'button' => 'Perbarui',
                'action' => site_url('jenis_warga/update_action'),
                'id_jenis_warga' => set_value('id_jenis_warga', $row->id_jenis_warga),
                'nama_jenis_warga' => set_value('nama_jenis_warga', $row->nama_jenis_warga),
            );
            $this->template->load('templates/template','tb_jenis_warga_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_warga'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenis_warga', TRUE));
        } else {
            $data = array(
              'nama_jenis_warga' => $this->input->post('nama_jenis_warga',TRUE),
          );

            $this->jenis_warga_model->update($this->input->post('id_jenis_warga', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_warga'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->jenis_warga_model->get_by_id($id);

        if ($row) {
            $this->jenis_warga_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_warga'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_warga'));
        }
    }

    function _rules() 
    {
       $this->form_validation->set_rules('nama_jenis_warga', ' ', 'trim|required');

       $this->form_validation->set_rules('id_jenis_warga', 'id_jenis_warga', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }
}

/* End of file Jenis_warga.php */
/* Location: ./application/modules/jenis_warga/controllers/Jenis_warga.php */