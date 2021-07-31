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
	function pilih($type = ''){

		// -- HITUNG METODE FORWARD CHAINING -- //
		
	 	$id = $this->session->userdata('id');

	 	$arr = $_POST['pilih'];

	 	$indikasi = implode(',', array_filter($arr));
	 	
	 	//menentukan penyakit
		$x = $this->db->query("SELECT * FROM t_rules as a JOIN t_penyakit as b On a.rules_penyakit = b.penyakit_id JOIN t_obat AS c ON b.penyakit_obat = c.obat_id WHERE a.rules_indikasi = '$indikasi'")->row_array();

	 	if (@count($x) > 0) {

		 	$penyakit = $x['rules_penyakit'];
		 	$status = 'pasti';
		 	$h_k = $x['penyakit_nama']; 
		 	$deskripsi = $x['penyakit_deskripsi'];
		 	$obat = $x['obat_nama'];
		 	$obat_id = $x['obat_id'];
		 	$obat_kode = $x['obat_kode'];
		 	$obat_harga = $x['obat_harga'];
		 	$obat_stok = $x['obat_stok'];
		 	$id = $this->session->userdata('id');

		 	//save data
		 	$set = array(
	 						'diagnosa_user' => $id,
	 						'diagnosa_indikasi' => $indikasi, 
	 						'diagnosa_penyakit' => $penyakit,
	 						'diagnosa_status' => $status,
	 						'diagnosa_obat' => $obat_id,
	 						'diagnosa_tanggal'	=> date('Y-m-d'),
	 					);

	 		$this->db->set($set);
	 		$this->db->insert('t_diagnosa');

		 	if ($type == 1) {

		 		//menu transaksi
		 		$this->db->where('log_user',$id);
		 		$this->db->where('log_status',0);
				$this->db->delete('t_log');

		 		$i = array(
		 					'log_user' => $id,
		 					'log_kode' => $obat_kode,
		 					'log_obat' => $obat,
		 					'log_harga' => $obat_harga, 
		 					'log_stok' => $obat_stok,
		 				  );

		 		$this->db->set($i);
	 			$this->db->insert('t_log');
		 		
		 		$this->session->set_flashdata('success','Obat yang sesuai dengan diagnosa di temukan');
		 		redirect(base_url('transaksi'));
		 	}else{

		 		//menu diagnosa
		 		
		 		if ($x > 0) {

			 		//membuat sesi hasil diagnosa
			 		$kirim_hasil = array(
			 								'penyakit' => $h_k,
			 								'status' => $status,
			 								'obat' => $obat, 
			 							);

			 		$this->session->set_flashdata('hasil',$kirim_hasil);

				 } else {

				 	//rule kosong
				 	$this->session->set_flashdata('gagal','Rule tidak di temukan !!');
				 }

		 		redirect(base_url('hasil'));
		 	}

	 	} else {
	 		//indikasi kosong
	 		$this->session->set_flashdata('gagal','Rule tidak di temukan !!');

	 		if ($type == 1) {
	 			redirect(base_url('transaksi'));
	 		}else{
	 			redirect(base_url('diagnosa'));
	 		}
	 	}

	}
}