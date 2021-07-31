<?php
class Penyakit extends CI_Controller{

	function __construct(){
		parent::__construct();
	} 
	function index(){ 
		if ( $this->session->userdata('login') == 1) {
			$data['modul'] = 'active';
		    $data['title'] = 'Bahan Aktif Obat';
		    $data['data'] = $this->db->query("SELECT * FROM t_penyakit as a JOIN t_obat as b ON a.penyakit_obat = b.obat_id WHERE penyakit_hapus = 0")->result_array();
		    $data['obat_data'] = $this->db->query("SELECT * FROM t_obat WHERE obat_hapus = 0")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('penyakit/index');
		    $this->load->view('v_template_admin/admin_footer');

		} 
		else{
			redirect(base_url('login'));
		}
	} 
	function add(){ 
		$set = array(
						'penyakit_nama' => $_POST['penyakit_nama'],
						'penyakit_deskripsi' => $_POST['penyakit_deskripsi'],
						'penyakit_obat' => $_POST['penyakit_obat'],
						'penyakit_tanggal'	=> date('Y-m-d'),
					);

		if ($this->query_builder->add('t_penyakit',$set)) {
			$this->session->set_flashdata('success','Data berhasil di tambah');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di tambah');
		}
		redirect(base_url('penyakit'));
	}
	function delete($id){
        //hapus 
        $this->db->set('penyakit_hapus',1);
        $this->db->where('penyakit_id',$id);

		if ($this->db->update('t_penyakit')) {
			$this->session->set_flashdata('success','Data berhasil di tambah');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di tambah');
		}

		redirect(base_url('penyakit'));
	}
	function update($id){
		$set = array(
						'penyakit_nama' => $_POST['penyakit_nama'],
						'penyakit_deskripsi' => $_POST['penyakit_deskripsi'],
						'penyakit_obat' => $_POST['penyakit_obat'],
					);

		if ($this->query_builder->update('t_penyakit',$set,'penyakit_id ='.$id)) {
			$this->session->set_flashdata('success','Data berhasil di tambah');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di tambah');
		}
		redirect(base_url('penyakit'));
		
	}
}