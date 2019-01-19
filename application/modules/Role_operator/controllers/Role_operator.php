<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class role_operator extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('role_operator_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $keyword = '';
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'role_operator/index/';
        $config['total_rows'] = $this->role_operator_model->total_rows();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['suffix'] = '.html';
        $config['first_url'] = base_url() . 'role_operator.html';
        $this->pagination->initialize($config);

        $start = $this->uri->segment(3, 0);
        $role_operator = $this->role_operator_model->index_limit($config['per_page'], $start);

        $data = array(
            'role_operator_data' => $role_operator,
            'keyword' => $keyword,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->template->load('templates/editthistemplate','tb_role_operator_list', $data);
    }
    
    public function search() 
    {
        $keyword = $this->uri->segment(3, $this->input->post('keyword', TRUE));
        $this->load->library('pagination');
        
        if ($this->uri->segment(2)=='search') {
            $config['base_url'] = base_url() . 'role_operator/search/' . $keyword;
        } else {
            $config['base_url'] = base_url() . 'role_operator/index/';
        }

        $config['total_rows'] = $this->role_operator_model->search_total_rows($keyword);
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['suffix'] = '.html';
        $config['first_url'] = base_url() . 'role_operator/search/'.$keyword.'.html';
        $this->pagination->initialize($config);

        $start = $this->uri->segment(4, 0);
        $role_operator = $this->role_operator_model->search_index_limit($config['per_page'], $start, $keyword);

        $data = array(
            'role_operator_data' => $role_operator,
            'keyword' => $keyword,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('templates/editthistemplate','tb_role_operator_list', $data);
    }

    public function read($id) 
    {
        $row = $this->role_operator_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_role_operator' => $row->id_role_operator,
		'nama_role_operator' => $row->nama_role_operator,
	    );
            $this->template->load('templates/editthistemplate','tb_role_operator_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('role_operator'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('role_operator/create_action'),
	    'id_role_operator' => set_value('id_role_operator'),
	    'nama_role_operator' => set_value('nama_role_operator'),
	);
        $this->template->load('templates/editthistemplate','tb_role_operator_form', $data);

    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_role_operator' => $this->input->post('nama_role_operator',TRUE),
	    );

            $this->role_operator_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('role_operator'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->role_operator_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('role_operator/update_action'),
		'id_role_operator' => set_value('id_role_operator', $row->id_role_operator),
		'nama_role_operator' => set_value('nama_role_operator', $row->nama_role_operator),
	    );
            $this->template->load('templates/editthistemplate','tb_role_operator_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('role_operator'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_role_operator', TRUE));
        } else {
            $data = array(
		'nama_role_operator' => $this->input->post('nama_role_operator',TRUE),
	    );

            $this->role_operator_model->update($this->input->post('id_role_operator', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('role_operator'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->role_operator_model->get_by_id($id);

        if ($row) {
            $this->role_operator_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('role_operator'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('role_operator'));
        }
    }

    function _rules() 
    {
	$this->form_validation->set_rules('nama_role_operator', ' ', 'trim|required');

	$this->form_validation->set_rules('id_role_operator', 'id_role_operator', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Role_operator.php */
/* Location: ./application/modules/role_operator/controllers/Role_operator.php */