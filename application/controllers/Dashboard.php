<?php
class Dashboard extends CI_Controller{

	function __construct(){
		parent::__construct();
	} 
	function index(){  
		if ( $this->session->userdata('login') == 1) {
			
			$data['obat_num'] = $this->db->query("SELECT * FROM t_obat WHERE obat_hapus = 0")->num_rows();
			$data['indikasi_num'] = $this->db->query("SELECT * FROM t_indikasi WHERE indikasi_hapus = 0")->num_rows();
			$data['penyakit_num'] = $this->db->query("SELECT * FROM t_penyakit WHERE penyakit_hapus = 0")->num_rows();
			$data['rules_num'] = $this->db->query("SELECT * FROM t_rules WHERE rules_hapus = 0")->num_rows();

			$data['dashboard'] = 'class="active"'; 
		    $data['title'] = 'Dashboard';
		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('dashboard/dashboard');
 
		}
		else{
			redirect(base_url('login'));
		}
	} 
}