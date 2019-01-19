<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testing extends MX_Controller {

	public function index()
	{
		$this->load->model('testing_models');
		$data['testmodel'] = $this->testing_models->getModels();
		$this->load->view('testing_view',$data);
	}

	/////////////////////////////////////////////////////////
	// download rekap excel
	public function download_excel($id)
	{
        // load to_excel_helper (untuk membuat laporan dengan format excel)
        $this->load->helper('to_excel');

        // parameter OK
        if(! empty($id))
        {
            // kelas
            $kelas = $this->db->select('nama')->where('id', $id)->get('biodata');
			
			
			$nama_file = 'REKAP_ABSEN_KELAS_' . $kelas . '_SEMESTER_' . $id;
			
            to_excel($kelas, $nama_file);
        }
        // parameter tidak lengkap
        else
        {
            $this->session->set_flashdata('pesan', 'Proses pembuatan data rekap (Excel) gagal. Parameter tidak lengkap.');
            redirect(base_url());
        }
	}

	public function download_pdf()
	{
		 //load helper 
		 $this->load->helper('dompdf');
	     
	     $data['data'] = "Hallo Ini Adalah File PDF";
	     // page info here, db calls, etc.     
	     $html = $this->load->view('test_print', $data, true);
	     pdf_create($html, 'filename');
	     //or
	     //$data = pdf_create($html, '', false);
	     //write_file('name', $data);
	}

}

/* End of file testing.php */
/* Location: ./application/modules/testing/controllers/testing.php */