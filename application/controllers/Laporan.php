<?php
class Laporan extends CI_Controller{

	function __construct(){
		parent::__construct();
	}  
	function index(){ 
		if ( $this->session->userdata('login') == 1) {

			$data['data'] = $this->db->query("SELECT * FROM t_transaksi WHERE transaksi_hapus = 0")->result_array();

			$data['laporan'] = 'class="active"'; 
		    $data['title'] = 'Transaksi';
		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('laporan/index');
		    $this->load->view('v_template_admin/admin_footer');
 
		}
		else{
			redirect(base_url('login'));
		}
	} 
	function delete($id){
		$this->db->where('transaksi_id',$id);
		$this->db->set('transaksi_hapus',1);

		if ($this->db->update('t_transaksi')) {
			$this->session->flashdata('success', 'Data berhasil di hapus');
		} else {
			$this->session->flashdata('gagal', 'Data gagal di hapus');
		}

		redirect(base_url('laporan'));
	}
}