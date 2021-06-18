<?php
class Obat extends CI_Controller{

	function __construct(){
		parent::__construct();
	} 
	function index(){ 
		if ( $this->session->userdata('login') == 1) {
			$data['obat'] = 'class="active"';
		    $data['title'] = 'Obat';
		    $data['data'] = $this->db->query("SELECT * FROM t_obat WHERE obat_hapus = 0")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('obat/index');
		    $this->load->view('v_template_admin/admin_footer');

		} 
		else{
			redirect(base_url('login'));
		}
	} 
	function add(){ 
		$kode = $_POST['obat_kode'];
		$cek = $this->db->query("SELECT * FROM t_obat WHERE obat_hapus = 0 AND obat_kode = '$kode'")->num_rows();

		if ($cek > 0) {
			$this->session->set_flashdata('gagal','Kode sudah di gunakan');
		}else{
			$set = array(	
							'obat_kode' => $kode,
							'obat_nama' => $_POST['obat_nama'],
							'obat_aturan' => $_POST['obat_aturan'],
							'obat_harga' => $_POST['obat_harga'],
							'obat_tanggal'	=> date('Y-m-d'),
						);

			if ($this->query_builder->add('t_obat',$set)) {
				$this->session->set_flashdata('success','Data berhasil di tambah');
			} else {
				$this->session->set_flashdata('gagal','Data gagal di tambah');
			}	
		}
		
		redirect(base_url('obat'));
	}
	function delete($id){
        //hapus 
        $this->db->set('obat_hapus',1);
        $this->db->where('obat_id',$id);

		if ($this->db->update('t_obat')) {
			$this->session->set_flashdata('success','Data berhasil di tambah');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di tambah');
		}

		redirect(base_url('obat'));
	}
	function update($id){
		$set = array(
						'obat_nama' => $_POST['obat_nama'],
						'obat_aturan' => $_POST['obat_aturan'],
						'obat_harga' => $_POST['obat_harga'],
					);

		if ($this->query_builder->update('t_obat',$set,'obat_id ='.$id)) {
			$this->session->set_flashdata('success','Data berhasil di tambah');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di tambah');
		}
		redirect(base_url('obat'));
		
	}
}