<?php
class Diagnosa extends CI_Controller{

	function __construct(){
		parent::__construct();
	}  
	function index(){  
		if ( $this->session->userdata('login') == 1) {

			$data['indikasi_data'] = $this->db->query("SELECT * FROM t_indikasi WHERE indikasi_hapus = 0")->result_array();

			$data['diagnosa'] = 'class="active"'; 
		    $data['title'] = 'Diagnosa';
		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('diagnosa/index');
		    $this->load->view('v_template_admin/admin_footer');
 
		}  
		else{
			redirect(base_url('login'));
		}
	}
	function pilih(){

		// -- HITUNG METODE FORWARD CHAINING -- //
		$cek = $this->db->query("SELECT * FROM t_rules WHERE rules_hapus = 0")->num_rows();

		 if ($cek > 0) {

		 	$id = $this->session->userdata('id');
		 	$indikasi = implode(',', $_POST['pilih']);

		 	if (@$indikasi > 0) {
		 		
		 		//menentukan penyakit
			 	$x = $this->db->query("SELECT * FROM t_rules as a JOIN t_penyakit as b On a.rules_penyakit = b.penyakit_id JOIN t_obat AS c ON b.penyakit_obat = c.obat_id WHERE a.rules_indikasi = '$indikasi'")->row_array();

			 	//rule ada
			 	if ($x > 0) {
				 	$penyakit = $x['rules_penyakit'];
				 	$status = 'pasti';
				 	$h_k = $x['penyakit_nama'];
				 	$deskripsi = $x['penyakit_deskripsi'];
				 	$obat = $x['obat_nama'];
				 	$obat_id = $x['obat_id'];
				 } else {
				 //gejala mirip
				 	$i = $this->db->query("SELECT * FROM t_rules as a JOIN t_penyakit as b ON a.rules_penyakit = b.penyakit_id JOIN t_obat AS c ON b.penyakit_obat = c.obat_id WHERE a.rules_indikasi IN ($indikasi) ORDER BY a.rules_indikasi DESC LIMIT 1")->row_array();
				 	$penyakit = $i['rules_penyakit'];
				 	$status = 'belum pasti';
				 	$h_k = $i['penyakit_nama'];
				 	$deskripsi = $i['penyakit_deskripsi'];
				 	$obat = $i['obat_nama'];
				 	$obat_id = $i['obat_id'];
				 }

				 $set = array(
		 						'diagnosa_user' => $this->session->userdata('id'),
		 						'diagnosa_indikasi' => $indikasi, 
		 						'diagnosa_penyakit' => $penyakit,
		 						'diagnosa_status' => $status,
		 						'diagnosa_obat' => $obat_id,
		 						'diagnosa_tanggal'	=> date('Y-m-d'),
		 					);

		 		$this->db->set($set);
		 		$this->db->insert('t_diagnosa');

		 		//membuat sesi hasil diagnosa
		 		$kirim_hasil = array(
		 								'penyakit' => $h_k,
		 								'status' => $status,
		 								'obat' => $obat, 
		 							);

		 		$this->session->set_flashdata('hasil',$kirim_hasil);

		 		redirect(base_url('hasil'));

		 	} else {
		 		//indikasi kosong
		 		$this->session->set_flashdata('gagal','Indikasi Masih Kosong !!');
		 		redirect(base_url('diagnosa'));
		 	}

		 } else {
		 	//rule kosong
		 	$this->session->set_flashdata('gagal','Rule Masih Kosong !!');
		 	redirect(base_url('diagnosa'));
		 }
		

	}
}