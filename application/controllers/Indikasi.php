<?php
class Indikasi extends CI_Controller{

	function __construct(){
		parent::__construct();
	} 
	function index(){ 
		if ( $this->session->userdata('login') == 1) {
			$data['modul'] = 'active';
		    $data['title'] = 'Indikasi';
		    $data['data'] = $this->db->query("SELECT * FROM t_indikasi WHERE indikasi_hapus = 0")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('indikasi/index');
		    $this->load->view('v_template_admin/admin_footer');

		} 
		else{
			redirect(base_url('login'));
		}
	} 
	function add(){ 
		$set = array(
						'indikasi_nama' => $_POST['indikasi_nama'],
						'indikasi_tanggal'	=> date('Y-m-d'),
					);

		if ($this->query_builder->add('t_indikasi',$set)) {
			$this->session->set_flashdata('success','Data berhasil di tambah');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di tambah');
		}
		redirect(base_url('indikasi'));
	}
	function delete($id){
        //hapus 
        $this->db->set('indikasi_hapus',1);
        $this->db->where('indikasi_id',$id);

		if ($this->db->update('t_indikasi')) {
			$this->session->set_flashdata('success','Data berhasil di tambah');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di tambah');
		}

		redirect(base_url('indikasi'));
	}
	function update($id){
		$set = array(
						'indikasi_nama' => $_POST['indikasi_nama'],
					);

		if ($this->query_builder->update('t_indikasi',$set,'indikasi_id ='.$id)) {
			$this->session->set_flashdata('success','Data berhasil di tambah');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di tambah');
		}
		redirect(base_url('indikasi'));
		
	}
}