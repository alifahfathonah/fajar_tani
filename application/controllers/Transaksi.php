<?php
class Transaksi extends CI_Controller{

	function __construct(){
		parent::__construct();
	} 
	function index(){  
		if ( $this->session->userdata('login') == 1) {
			$user = $this->session->userdata('id');

			$data['data_obat'] = $this->db->query("SELECT * FROM t_obat WHERE obat_hapus = 0")->result_array();
			$data['data_log'] = $this->db->query("SELECT * FROM t_log WHERE log_status = 1 AND log_user = '$user'")->result_array();
			$data['log_last'] = $this->db->query("SELECT * FROM t_log WHERE log_status = 0 AND log_user = '$user'")->row_array();
			$data['data_total'] = $this->db->query("SELECT SUM(log_harga) AS total FROM t_log WHERE log_status = 1 AND log_user = '1'")->row_array();
			$data['indikasi_data'] = $this->db->query("SELECT * FROM t_indikasi WHERE indikasi_hapus = 0")->result_array();

			$data['transaksi'] = 'class="active"'; 
		    $data['title'] = 'Transaksi';
		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('transaksi/index');
		    $this->load->view('v_template_admin/admin_footer');
 
		} 
		else{
			redirect(base_url('login'));
		}
	} 
	function cart($id){
		$user = $this->session->userdata('id');
		$obat = $this->db->query("SELECT * FROM t_obat WHERE obat_id = '$id'")->row_array();

		$cek = $this->db->query("SELECT * FROM t_log WHERE log_status = 0 AND log_user = '$user'")->num_rows();

		if ($cek > 0) {

			//update
			$set = array(
							'log_user' => $user, 
							'log_kode' => $obat['obat_kode'], 
							'log_obat' => $obat['obat_nama'], 
							'log_harga' => $obat['obat_harga'], 
						);
			$this->db->where('log_user', $user);
			$this->db->where('log_status', 0);
			$this->db->set($set);
			$this->db->update('t_log');

		}else{

			//insert
			$set = array(
							'log_user' => $user, 
							'log_kode' => $obat['obat_kode'], 
							'log_obat' => $obat['obat_nama'], 
							'log_harga' => $obat['obat_harga'], 
						);
			$this->db->set($set);
			$this->db->insert('t_log');
		}

		redirect(base_url('transaksi'));
	}
	function cart_add(){
		$id = $_POST['log_id'];

		$this->db->where('log_id',$id);
		$this->db->set('log_status',1);
		$this->db->update('t_log');

		redirect(base_url('transaksi'));
	}
	function del_log($id){
		$this->db->where('log_id',$id);
		$this->db->delete('t_log');

		redirect(base_url('transaksi'));
	}
	function bayar(){
		$user = $this->session->userdata('id');

		$set = array(
						'transaksi_total' => $_POST['total'],
						'transaksi_kembali' => $_POST['kembali'],
						'transaksi_bayar' => $_POST['bayar'],
						'transaksi_tanggal' => date('Y-m-d'), 
					);
		$this->db->set($set);

		if ($this->db->insert('t_transaksi')) {
			
			//kurangi stok
			$db_obat = $this->db->query("SELECT * FROM t_obat WHERE obat_hapus = 0")->result_array();
			$db_log = $this->db->query("SELECT log_kode AS kode, SUM(log_jumlah) AS jumlah FROM t_log GROUP BY log_kode")->result_array();

			foreach ($db_obat as $obat) {
				
				foreach ($db_log as $log) {
					
					if ($obat['obat_kode'] == $log['kode']) {
						
						$kode = $log['kode'];
						$hasil = $obat['obat_stok'] - $log['jumlah'];

						$this->db->where('obat_kode',$kode);
						$this->db->set('obat_stok',$hasil);
						$this->db->update('t_obat'); 
					}
				}
				  
			}

			//delete log
			$this->db->where('log_user',$user);
			$this->db->delete('t_log');

			$this->session->set_flashdata('success','Transaksi berhasil di simpan');
		}else{

			$this->session->set_flashdata('gagal','Transaksi gagal');
		}

		redirect(base_url('transaksi'));
	}
	function diagnosa(){

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

		 		//save log
		 		$obat = $this->db->query("SELECT * FROM t_obat WHERE obat_id = '$obat_id'")->row_array();
				$cek = $this->db->query("SELECT * FROM t_log WHERE log_status = 0 AND log_user = '$id'")->num_rows();

				if ($cek > 0) {

					//update
					$set = array(
									'log_user' => $id, 
									'log_kode' => $obat['obat_kode'], 
									'log_obat' => $obat['obat_nama'], 
									'log_harga' => $obat['obat_harga'], 
								);
					$this->db->where('log_user', $id);
					$this->db->where('log_status', 0);
					$this->db->set($set);
					$this->db->update('t_log');

				}else{

					//insert
					$set = array(
									'log_user' => $id, 
									'log_kode' => $obat['obat_kode'], 
									'log_obat' => $obat['obat_nama'], 
									'log_harga' => $obat['obat_harga'], 
								);
					$this->db->set($set);
					$this->db->insert('t_log');
				}

		 		//membuat sesi hasil diagnosa
		 		$kirim_hasil = array(
		 								'penyakit' => $h_k,
		 								'status' => $status,
		 								'obat' => $obat, 
		 							);

		 		$this->session->set_flashdata('hasil',$kirim_hasil);

		 		redirect(base_url('transaksi'));

		 	} else {
		 		//indikasi kosong
		 		$this->session->set_flashdata('gagal','Rules Tidak Di Temukan !!');
		 		redirect(base_url('transaksi'));
		 	}

		 } else {
		 	//rule kosong
		 	$this->session->set_flashdata('gagal','Rule Masih Kosong !!');
		 	redirect(base_url('transaksi'));
		 }
	}
}