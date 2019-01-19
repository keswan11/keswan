<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_persyaratan_model extends CI_Model
{

    public $table = 'tb_jenis_persyaratan';
    public $id = 'id_jenis_persyaratan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('tb_jenis_input', 'tb_jenis_input.id_jenis_input = tb_jenis_persyaratan.tipe_jenis_persyaratan');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit
    function index_limit($limit, $start = 0) {
        $this->db->join('tb_jenis_input', 'tb_jenis_persyaratan.tipe_jenis_persyaratan = tb_jenis_input.id_jenis_input');
        $this->db->order_by($this->id, $this->order);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    
    // get search total rows
    function search_total_rows($keyword = NULL) {
        $this->db->like('id_jenis_persyaratan', $keyword);
	$this->db->or_like('nama_jenis_persyaratan', $keyword);
	$this->db->or_like('kode_jenis_persyaratan', $keyword);
	$this->db->or_like('tipe_jenis_persyaratan', $keyword);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get search data with limit
    function search_index_limit($limit, $start = 0, $keyword = NULL) {
        $this->db->join('tb_jenis_input', 'tb_jenis_persyaratan.tipe_jenis_persyaratan = tb_jenis_input.id_jenis_input');
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_jenis_persyaratan', $keyword);
	$this->db->or_like('nama_jenis_persyaratan', $keyword);
	$this->db->or_like('kode_jenis_persyaratan', $keyword);
	$this->db->or_like('tipe_jenis_persyaratan', $keyword);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    
    function getCountRow($table){
        $query = $this->db->query("SELECT COUNT(*) as jumlah FROM $table");
        $hasil = $query->row();
        return $hasil; 
    }

    function getJenisInput(){
        return $this->db->get('tb_jenis_input')->result();
    }

}

/* End of file Jenis_persyaratan_model.php */
/* Location: ./application/models/Jenis_persyaratan_model.php */