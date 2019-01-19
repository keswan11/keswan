<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_pengajuan_model extends CI_Model
{

    public $table = 'tb_jenis_pengajuan';
    public $id = 'id_jenis_pengajuan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
	
	function get_jenis_pengajuan($id)
    {
		$this->db->select('nama_jenis_pengajuan');
		$this->db->join('tb_jenis_pengajuan a', 'b.id_jenis_pengajuan=a.id_jenis_pengajuan','left');
		$this->db->where('b.id_jenis_pengajuan', $id);
		$this->db->order_by('b.id_jenis_persyaratan', $this->order);
        return $this->db->get('tb_persyaratan_pengajuan b',1)->result();
    }

	
	
	function get_kriteria($id)
    {
		$this->db->select('*');
		$this->db->from('tb_persyaratan_pengajuan b');
		$this->db->join('tb_jenis_pengajuan a', 'b.id_jenis_pengajuan=a.id_jenis_pengajuan','left');
		$this->db->join('tb_jenis_persyaratan c', 'b.id_jenis_persyaratan=c.id_jenis_persyaratan','left');
		$this->db->where('b.id_jenis_pengajuan', $id);
		$this->db->order_by('b.id_jenis_persyaratan', $this->order);
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
        $this->db->order_by($this->id, $this->order);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    
    // get search total rows
    function search_total_rows($keyword = NULL) {
        $this->db->like('id_jenis_pengajuan', $keyword);
	$this->db->or_like('nama_jenis_pengajuan', $keyword);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get search data with limit
    function search_index_limit($limit, $start = 0, $keyword = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_jenis_pengajuan', $keyword);
	$this->db->or_like('nama_jenis_pengajuan', $keyword);
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

}

/* End of file Jenis_pengajuan_model.php */
/* Location: ./application/models/Jenis_pengajuan_model.php */