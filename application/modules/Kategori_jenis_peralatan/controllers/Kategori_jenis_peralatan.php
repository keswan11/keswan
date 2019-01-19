<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class kategori_jenis_peralatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') <> 'Admin')
        {
        	redirect('login');
        }
        $this->load->model('kategori_jenis_peralatan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Manajemen Kategori Jenis Peralatan";
        $data['kategori_jenis_peralatan_data'] = $this->kategori_jenis_peralatan_model->get_all();
        $this->template->load('templates/template','tb_kategori_jenis_peralatan_list', $data);
    }
    
    public function create() 
    {
        $data = array(
            'title' => 'Tambah kategori jenis peralatan',
            'button' => 'Tambah',
            'action' => site_url('kategori_jenis_peralatan/create_action'),
            'id_kategori_jenis_peralatan' => set_value('id_kategori_jenis_peralatan'),
            'nama_kategori_jenis_peralatan' => set_value('nama_kategori_jenis_peralatan'),
        );
        $this->template->load('templates/template','tb_kategori_jenis_peralatan_form', $data);

    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
              'nama_kategori_jenis_peralatan' => $this->input->post('nama_kategori_jenis_peralatan',TRUE),
          );

            $this->kategori_jenis_peralatan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kategori_jenis_peralatan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->kategori_jenis_peralatan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Perbarui kategori jenis peralatan',
                'button' => 'Perbarui',
                'action' => site_url('kategori_jenis_peralatan/update_action'),
                'id_kategori_jenis_peralatan' => set_value('id_kategori_jenis_peralatan', $row->id_kategori_jenis_peralatan),
                'nama_kategori_jenis_peralatan' => set_value('nama_kategori_jenis_peralatan', $row->nama_kategori_jenis_peralatan),
            );
            $this->template->load('templates/template','tb_kategori_jenis_peralatan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori_jenis_peralatan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kategori_jenis_peralatan', TRUE));
        } else {
            $data = array(
              'nama_kategori_jenis_peralatan' => $this->input->post('nama_kategori_jenis_peralatan',TRUE),
          );

            $this->kategori_jenis_peralatan_model->update($this->input->post('id_kategori_jenis_peralatan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kategori_jenis_peralatan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->kategori_jenis_peralatan_model->get_by_id($id);

        if ($row) {
            $this->kategori_jenis_peralatan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kategori_jenis_peralatan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori_jenis_peralatan'));
        }
    }

    function _rules() 
    {
     $this->form_validation->set_rules('nama_kategori_jenis_peralatan', ' ', 'trim|required');

     $this->form_validation->set_rules('id_kategori_jenis_peralatan', 'id_kategori_jenis_peralatan', 'trim');
     $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
 }
}

/* End of file Kategori_jenis_peralatan.php */
/* Location: ./application/modules/kategori_jenis_peralatan/controllers/Kategori_jenis_peralatan.php */