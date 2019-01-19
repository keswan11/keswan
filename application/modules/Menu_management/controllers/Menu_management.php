<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu_management extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') <> 'Admin')
        {
        	redirect('login');
        }
        $this->load->model('tabel_menu_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Manajemen Menu";
        $data['menu_management_data'] = $this->tabel_menu_model->get_all();
        $this->template->load('templates/template','tabel_menu_list', $data);
    }
    
  
    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('menu_management/create_action'),
            'menu_id' => set_value('menu_id'),
            'posisi' => set_value('posisi'),
            'nama_menu' => set_value('nama_menu'),
            'icon' => set_value('icon'),
            'link' => set_value('link'),
            'parent' => set_value('parent'),
            'role_menu' => set_value('role_menu'),
            'aktif' => set_value('aktif'),
            'title' => 'Tambah menu'
        );
        $this->template->load('templates/template','tabel_menu_form', $data);

    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'posisi' => $this->input->post('posisi',TRUE),
                'nama_menu' => $this->input->post('nama_menu',TRUE),
                'icon' => $this->input->post('icon',TRUE),
                'link' => $this->input->post('link',TRUE),
                'parent' => $this->input->post('parent',TRUE),
                'role_menu' => $this->input->post('role_menu',TRUE),
                'aktif' => $this->input->post('aktif',TRUE),
            );

            $this->tabel_menu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('menu_management'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->tabel_menu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('menu_management/update_action'),
                'menu_id' => set_value('menu_id', $row->menu_id),
                'posisi' => set_value('posisi', $row->posisi),
                'nama_menu' => set_value('nama_menu', $row->nama_menu),
                'icon' => set_value('icon', $row->icon),
                'link' => set_value('link', $row->link),
                'parent' => set_value('parent', $row->parent),
                'role_menu' => set_value('role_menu', $row->parent),
                'aktif' => set_value('aktif', $row->aktif),
                'title' => 'Perbarui data'
            );
            $this->template->load('templates/template','tabel_menu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu_management'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('menu_id', TRUE));
        } else {
            $data = array(
                'posisi' => $this->input->post('posisi',TRUE),
                'nama_menu' => $this->input->post('nama_menu',TRUE),
                'icon' => $this->input->post('icon',TRUE),
                'link' => $this->input->post('link',TRUE),
                'parent' => $this->input->post('parent',TRUE),
                'role_menu' => $this->input->post('role_menu',TRUE),
                'aktif' => $this->input->post('aktif',TRUE),
            );

            $this->tabel_menu_model->update($this->input->post('menu_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('menu_management'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->tabel_menu_model->get_by_id($id);

        if ($row) {
            $this->tabel_menu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('menu_management'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu_management'));
        }
    }

    function _rules() 
    {
     $this->form_validation->set_rules('nama_menu', ' ', 'trim|required');
     $this->form_validation->set_rules('icon', ' ', 'trim|required');
     $this->form_validation->set_rules('link', ' ', 'trim|required');
     $this->form_validation->set_rules('parent', ' ', 'trim|required|numeric');
     $this->form_validation->set_rules('role_menu', ' ', 'trim|required');
     $this->form_validation->set_rules('aktif', ' ', 'trim|required');

     $this->form_validation->set_rules('menu_id', 'menu_id', 'trim');
     $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
 }
}

/* End of file Menu_management.php */
/* Location: ./application/modules/menu_management/controllers/Menu_management.php */