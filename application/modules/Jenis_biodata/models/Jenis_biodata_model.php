<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jenis_biodata_model extends CI_Model
{

    public $table = 'tb_jenis_biodata';
    public $id = 'id_jenis_biodata';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('tb_jenis_input', 'tb_jenis_input.id_jenis_input = tb_jenis_biodata.id_tipe_jenis_biodata');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();
    }

    function perorangan()
    {
        $this->db->select('
            tb_jenis_biodata.*,
            tb_jenis_member.*,
            tb_jenis_input.*'
        );
        $this->db->from('tb_biodata_jenis_member');
        $this->db->join('tb_jenis_biodata', 'tb_jenis_biodata.id_jenis_biodata = tb_biodata_jenis_member.id_jenis_biodata');
        $this->db->join('tb_jenis_member', 'tb_jenis_member.id_jenis_member = tb_biodata_jenis_member.id_jenis_member');
        $this->db->join('tb_jenis_input', 'tb_jenis_input.id_jenis_input = tb_jenis_biodata.id_tipe_jenis_biodata');
        $this->db->where('tb_jenis_member.id_jenis_member', 1);
        $this->db->where('tb_jenis_biodata.kategori_jenis_biodata', 1);
        $this->db->order_by('tb_jenis_biodata.id_jenis_biodata', 'ASC');
        return $this->db->get()->result();
    }
    
    function passport()
    {
        $this->db->select('
            tb_jenis_biodata.*,
            tb_jenis_member.*,
            tb_jenis_input.*'
        );
        $this->db->from('tb_biodata_jenis_member');
        $this->db->join('tb_jenis_biodata', 'tb_jenis_biodata.id_jenis_biodata = tb_biodata_jenis_member.id_jenis_biodata');
        $this->db->join('tb_jenis_member', 'tb_jenis_member.id_jenis_member = tb_biodata_jenis_member.id_jenis_member');
        $this->db->join('tb_jenis_input', 'tb_jenis_input.id_jenis_input = tb_jenis_biodata.id_tipe_jenis_biodata');
        $this->db->where('tb_jenis_member.id_jenis_member', 1);
        $this->db->where('tb_jenis_biodata.kategori_jenis_biodata', 2);
        $this->db->order_by('tb_jenis_biodata.id_jenis_biodata', 'ASC');
        return $this->db->get()->result();
    }

    function get_biodata()
    {
        $id_member = $this->session->userdata('id_member');
        $query = "
        SELECT
        tb_data_member.*,
        tb_list_member.*,
        tb_jenis_biodata.*,
        tb_jenis_input.*
        FROM
        tb_data_member
        INNER JOIN tb_list_member ON tb_list_member.id_member = tb_data_member.id_member
        INNER JOIN tb_jenis_biodata ON tb_jenis_biodata.id_jenis_biodata = tb_data_member.id_biodata_member
        INNER JOIN tb_jenis_input ON tb_jenis_input.id_jenis_input = tb_jenis_biodata.id_tipe_jenis_biodata
        WHERE tb_data_member.id_member = $id_member
        AND tb_jenis_biodata.kategori_jenis_biodata = 1
        ORDER BY tb_jenis_biodata.id_jenis_biodata ASC
        ";
        return $this->db->query($query);
    }

    function get_passport()
    {
        $id_member = $this->session->userdata('id_member');
        $query = "
        SELECT
        tb_data_member.*,
        tb_list_member.*,
        tb_jenis_biodata.*,
        tb_jenis_input.*
        FROM
        tb_data_member
        INNER JOIN tb_list_member ON tb_list_member.id_member = tb_data_member.id_member
        INNER JOIN tb_jenis_biodata ON tb_jenis_biodata.id_jenis_biodata = tb_data_member.id_biodata_member
        INNER JOIN tb_jenis_input ON tb_jenis_input.id_jenis_input = tb_jenis_biodata.id_tipe_jenis_biodata
        WHERE tb_data_member.id_member = $id_member
        AND tb_jenis_biodata.kategori_jenis_biodata = 2
        ORDER BY tb_jenis_biodata.id_jenis_biodata ASC
        ";
        return $this->db->query($query);
    }
    
    function get_ktp()
    {
        $id_member = $this->session->userdata('id_member');
        $query = "
        SELECT
        tb_data_member.*,
        tb_list_member.*,
        tb_jenis_biodata.*,
        tb_jenis_input.*
        FROM
        tb_data_member
        INNER JOIN tb_list_member ON tb_list_member.id_member = tb_data_member.id_member
        INNER JOIN tb_jenis_biodata ON tb_jenis_biodata.id_jenis_biodata = tb_data_member.id_biodata_member
        INNER JOIN tb_jenis_input ON tb_jenis_input.id_jenis_input = tb_jenis_biodata.id_tipe_jenis_biodata
        WHERE tb_data_member.id_member = $id_member
        AND (tb_jenis_biodata.id_jenis_biodata = 1
        OR tb_jenis_biodata.id_jenis_biodata = 18)
        ORDER BY tb_jenis_biodata.id_jenis_biodata ASC
        ";
        return $this->db->query($query);
    }

    function instansi()
    {
        $this->db->select('
            tb_jenis_biodata.*,
            tb_jenis_member.*,
            tb_jenis_input.*'
        );
        $this->db->from('tb_biodata_jenis_member');
        $this->db->join('tb_jenis_biodata', 'tb_jenis_biodata.id_jenis_biodata = tb_biodata_jenis_member.id_jenis_biodata');
        $this->db->join('tb_jenis_member', 'tb_jenis_member.id_jenis_member = tb_biodata_jenis_member.id_jenis_member');
        $this->db->join('tb_jenis_input', 'tb_jenis_input.id_jenis_input = tb_jenis_biodata.id_tipe_jenis_biodata');
        $this->db->where('tb_jenis_member.id_jenis_member', 2);
        $this->db->order_by('tb_jenis_biodata.id_jenis_biodata', 'ASC');
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
        $this->db->join('tb_jenis_input', 'tb_jenis_biodata.id_tipe_jenis_biodata = tb_jenis_input.id_jenis_input');
        $this->db->order_by($this->id, $this->order);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    
    // get search total rows
    function search_total_rows($keyword = NULL) {
        $this->db->like('id_jenis_biodata', $keyword);
        $this->db->or_like('nama_jenis_biodata', $keyword);
        $this->db->or_like('id_tipe_jenis_biodata', $keyword);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get search data with limit
    function search_index_limit($limit, $start = 0, $keyword = NULL) {
        $this->db->join('tb_jenis_input', 'tb_jenis_biodata.id_tipe_jenis_biodata = tb_jenis_input.id_jenis_input');
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_jenis_biodata', $keyword);
        $this->db->or_like('nama_jenis_biodata', $keyword);
        $this->db->or_like('id_tipe_jenis_biodata', $keyword);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
            // $query = "SELECT MAX(id_jenis_biodata) AS id_terakhir FROM $this->table";
        $this->db->select('MAX(id_jenis_biodata) AS id_terakhir');
        $this->db->from($this->table);
        $query = $this->db->get();
        $row = $query->row();
        if ($this->input->post('perorangan') != NULL && $this->input->post('instansi') != NULL) {
            $query_2 = "INSERT INTO tb_biodata_jenis_member VALUES (1, $row->id_terakhir), (2, $row->id_terakhir)";
            return $this->db->query($query_2);
        } else if ($this->input->post('perorangan') != NULL) {
            $perorangan = array(
                'id_jenis_member' => $this->input->post('perorangan'), 
                'id_jenis_biodata' => $row->id_terakhir
            );
            $this->db->insert('tb_biodata_jenis_member', $perorangan);
        } else if ($this->input->post('instansi') != NULL) {
            $instansi = array(
                'id_jenis_member' => $this->input->post('instansi'), 
                'id_jenis_biodata' => $row->id_terakhir
            );
            $this->db->insert('tb_biodata_jenis_member', $instansi);
        }
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

/* End of file Jenis_biodata_model.php */
/* Location: ./application/models/Jenis_biodata_model.php */