<?php
class Hasil extends CI_Controller{

	function __construct(){
		parent::__construct();
	}  
	function index(){ 
		if ( $this->session->userdata('login') == 1) {

			$data['data'] = $this->db->query("SELECT * FROM t_diagnosa AS a JOIN t_user AS b ON a.diagnosa_user = b.user_id JOIN t_penyakit AS d ON a.diagnosa_penyakit = d.penyakit_id JOIN t_obat AS f ON d.penyakit_obat = f.obat_id WHERE a.diagnosa_hapus = 0")->result_array();

			$data['hasil'] = 'class="active"'; 
		    $data['title'] = 'Hasil Diagnosa';
		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('hasil/index');
		    $this->load->view('v_template_admin/admin_footer');
 
		}
		else{
			redirect(base_url('login'));
		}
	} 
	function delete($id){
		$this->db->where('diagnosa_id',$id);
		$this->db->set('diagnosa_hapus',1);

		if ($this->db->update('t_diagnosa')) {
			$this->session->flashdata('success', 'Data berhasil di hapus');
		} else {
			$this->session->flashdata('gagal', 'Data gagal di hapus');
		}

		redirect(base_url('hasil'));
	}
}