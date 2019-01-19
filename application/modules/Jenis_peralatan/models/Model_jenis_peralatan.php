<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_jenis_peralatan extends CI_Model
{

    public $table = 'tb_jenis_peralatan';
    public $id = 'id_jenis_peralatan';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        // $query = "
        // SELECT
        // tb_jenis_peralatan.*,
        // tb_kategori_jenis_peralatan.*,
        // tb_sub_kategori_jenis_peralatan.*,
        // FROM
        // tb_jenis_peralatan
        // INNER JOIN tb_kategori_jenis_peralatan ON tb_kategori_jenis_peralatan.id_kategori_jenis_peralatan = tb_jenis_peralatan.id_kategori_peralatan
        // INNER JOIN tb_sub_kategori_jenis_peralatan ON tb_sub_kategori_jenis_peralatan.id_sub_kategori_jenis_peralatan = tb_jenis_peralatan.id_sub_kategori_peralatan
        // ORDER BY tb_jenis_peralatan.id_jenis_peralatan ASC
        // ";
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('tb_kategori_jenis_peralatan', 'tb_kategori_jenis_peralatan.id_kategori_jenis_peralatan = tb_jenis_peralatan.id_kategori_peralatan');
        $this->db->join('tb_sub_kategori_jenis_peralatan', 'tb_sub_kategori_jenis_peralatan.id_sub_kategori_jenis_peralatan = tb_jenis_peralatan.id_sub_kategori_peralatan');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();
        // return $this->db->query($query)->result();
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
        // return $this->db->get($this->table)->result();
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('tb_kategori_jenis_peralatan', 'tb_kategori_jenis_peralatan.id_kategori_jenis_peralatan = tb_jenis_peralatan.id_kategori_peralatan');
        $this->db->join('tb_sub_kategori_jenis_peralatan', 'tb_sub_kategori_jenis_peralatan.id_sub_kategori_jenis_peralatan = tb_jenis_peralatan.id_sub_kategori_peralatan');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();
    }
    
    // get search total rows
    function search_total_rows($keyword = NULL) {
        $this->db->like('id_jenis_peralatan', $keyword);
        $this->db->or_like('id_kategori_peralatan', $keyword);
        $this->db->or_like('id_sub_kategori_peralatan', $keyword);
        $this->db->or_like('nama_peralatan', $keyword);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get search data with limit
    function search_index_limit($limit, $start = 0, $keyword = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_jenis_peralatan', $keyword);
        $this->db->or_like('id_kategori_peralatan', $keyword);
        $this->db->or_like('id_sub_kategori_peralatan', $keyword);
        $this->db->or_like('nama_peralatan', $keyword);
        $this->db->limit($limit, $start);
        // return $this->db->get($this->table)->result();
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('tb_kategori_jenis_peralatan', 'tb_kategori_jenis_peralatan.id_kategori_jenis_peralatan = tb_jenis_peralatan.id_kategori_peralatan');
        $this->db->join('tb_sub_kategori_jenis_peralatan', 'tb_sub_kategori_jenis_peralatan.id_sub_kategori_jenis_peralatan = tb_jenis_peralatan.id_sub_kategori_peralatan');
        // $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();
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

}

/* End of file Jenis_peralatan_model.php */
/* Location: ./application/models/Jenis_peralatan_model.php */