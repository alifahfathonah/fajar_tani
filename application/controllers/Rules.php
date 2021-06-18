<?php
class Rules extends CI_Controller{

	function __construct(){
		parent::__construct();
	} 
	function index(){ 
		if ( $this->session->userdata('login') == 1) {
			$data['modul'] = 'active';
		    $data['title'] = 'Rules';
		    $data['data'] = $this->db->query("SELECT * FROM t_rules as a JOIN t_penyakit as b ON a.rules_penyakit = b.penyakit_id WHERE a.rules_hapus = 0")->result_array();

		    $data['penyakit_data'] = $this->db->query("SELECT * FROM t_penyakit WHERE penyakit_hapus = 0")->result_array();
		    $data['penyakit_data'] = $this->db->query("SELECT * FROM t_penyakit WHERE penyakit_hapus = 0")->result_array();
		    $data['indikasi_data'] = $this->db->query("SELECT * FROM t_indikasi WHERE indikasi_hapus = 0")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('rules/index');
		    $this->load->view('v_template_admin/admin_footer');

		} 
		else{
			redirect(base_url('login'));
		}
	} 
	
	function add(){ 
		$indikasi = implode(',', $_POST['rules_indikasi']);
		$cek = $this->db->query("SELECT * FROM t_rules WHERE rules_indikasi IN('$indikasi') AND rules_hapus = 0")->num_rows();

		if ($cek > 0) {
			$this->session->set_flashdata('gagal','Rules sudah ada !!');
		} else {
			
			//nama
			$no = $this->db->query("SELECT * FROM t_rules WHERE rules_hapus = 0")->num_rows();

			if ($no > 0) {
				$x = $no+1;
				$nama = 'Rules '.$x;
			} else {
				$nama = 'Rules 1';
			}
			

			$set = array(
							'rules_nama' => $nama,
							'rules_indikasi' => $indikasi,
							'rules_penyakit' => $_POST['rules_penyakit'],
							'rules_tanggal'	=> date('Y-m-d'),
						);

			if ($this->query_builder->add('t_rules',$set)) {
				$this->session->set_flashdata('success','Data berhasil di tambah');
			} else {
				$this->session->set_flashdata('gagal','Data gagal di tambah');
			}

		}
		
		redirect(base_url('rules'));
	}
	function delete($id){
        //hapus 
        $this->db->set('rules_hapus',1);
        $this->db->where('rules_id',$id);

		if ($this->db->update('t_rules')) {
			$this->session->set_flashdata('success','Data berhasil di tambah');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di tambah');
		}

		redirect(base_url('rules'));
	}
	function update($id){

		$indikasi = implode(',', $_POST['rules_indikasi']);
		$set = array(
						'rules_penyakit' => $_POST['rules_penyakit'],
						'rules_indikasi' => $indikasi,
						'rules_penyakit' => $_POST['rules_penyakit'],
					);

		if ($this->query_builder->update('t_rules',$set,'rules_id ='.$id)) {
			$this->session->set_flashdata('success','Data berhasil di tambah');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di tambah');
		}
		redirect(base_url('rules'));
		
	}
}