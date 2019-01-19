<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class jenis_peralatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') <> 'Admin')
        {
        	redirect('login');
        }
        $this->load->model('Model_jenis_peralatan');
        $this->load->model('kategori_jenis_peralatan/kategori_jenis_peralatan_model');
        $this->load->model('sub_kategori_jenis_peralatan/sub_kategori_jenis_peralatan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Manajemen Jenis peralatan";
        $data['jenis_peralatan_data'] = $this->Model_jenis_peralatan->get_all();
        $this->template->load('templates/template','tb_jenis_peralatan_list',$data);
    }
    
    public function create() 
    {

        $data = array(
            'title' => 'Tambah jenis peralatan',
            'button' => 'Tambah',
            'action' => site_url('jenis_peralatan/create_action'),
            'id_jenis_peralatan' => set_value('id_jenis_peralatan'),
            'id_kategori_peralatan' => set_value('id_kategori_peralatan'),
            'kategori_jenis_peralatan' => $this->kategori_jenis_peralatan_model->get_all(),
            'sub_kategori_jenis_peralatan' => $this->sub_kategori_jenis_peralatan_model->get_all(),
            'id_sub_kategori_peralatan' => set_value('id_sub_kategori_peralatan'),
            'nama_peralatan' => set_value('nama_peralatan'),
        );
        $this->template->load('templates/template','tb_jenis_peralatan_form', $data);

    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } 
		else {
            $data = array(
              'id_kategori_peralatan' => $this->input->post('id_kategori_peralatan',TRUE),
              'id_sub_kategori_peralatan' => $this->input->post('id_sub_kategori_peralatan',TRUE),
              'nama_peralatan' => $this->input->post('nama_peralatan',TRUE),
          );

            $this->Model_jenis_peralatan->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_peralatan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Model_jenis_peralatan->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Perbarui jenis peralatan',
                'button' => 'Perbarui',
                'action' => site_url('jenis_peralatan/update_action'),
                'id_jenis_peralatan' => set_value('id_jenis_peralatan', $row->id_jenis_peralatan),
                'id_kategori_peralatan' => set_value('id_kategori_peralatan', $row->id_kategori_peralatan),
                'kategori_jenis_peralatan' => $this->kategori_jenis_peralatan_model->get_all(),
                'sub_kategori_jenis_peralatan' => $this->sub_kategori_jenis_peralatan_model->get_all(),
                'id_sub_kategori_peralatan' => set_value('id_sub_kategori_peralatan', $row->id_sub_kategori_peralatan),
                'nama_peralatan' => set_value('nama_peralatan', $row->nama_peralatan),
            );
            $this->template->load('templates/template','tb_jenis_peralatan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_peralatan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenis_peralatan', TRUE));
        } else {
            $data = array(
              'id_kategori_peralatan' => $this->input->post('id_kategori_peralatan',TRUE),
              'id_sub_kategori_peralatan' => $this->input->post('id_sub_kategori_peralatan',TRUE),
              'nama_peralatan' => $this->input->post('nama_peralatan',TRUE),
          );

            $this->Model_jenis_peralatan->update($this->input->post('id_jenis_peralatan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_peralatan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Model_jenis_peralatan->get_by_id($id);

        if ($row) {
            $this->Model_jenis_peralatan->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_peralatan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_peralatan'));
        }
    }

    function _rules() 
    {
       $this->form_validation->set_rules('id_kategori_peralatan', ' ', 'trim|required|numeric');
       $this->form_validation->set_rules('id_sub_kategori_peralatan', ' ', 'trim|required|numeric');
       $this->form_validation->set_rules('nama_peralatan', ' ', 'trim|required');

       $this->form_validation->set_rules('id_jenis_peralatan', 'id_jenis_peralatan', 'trim');
       $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
   }
}

/* End of file Jenis_peralatan.php */
/* Location: ./application/modules/jenis_peralatan/controllers/Jenis_peralatan.php */