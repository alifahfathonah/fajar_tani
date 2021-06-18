<?php
class Weight extends CI_Controller{

	function __construct(){
		parent::__construct();
	}  

	///////////////-- Kriteria --////////////////////////

	function kriteria(){
		if ( $this->session->userdata('login') == 1) {
			$data['weight'] = 'active'; 
		    $data['title'] = 'Kriteria';

		    $data['data'] = $this->db->query("SELECT * FROM t_kriteria WHERE kriteria_hapus = 0")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('kriteria/index');
		    $this->load->view('v_template_admin/admin_footer'); 
 
		}
		else{
			redirect(base_url('login'));
		}
	}
	function add_kriteria(){
		//generate kode
		$k = $this->db->query("SELECT * FROM t_kriteria order by kriteria_id DESC LIMIT 1")->row_array();
		if (@$k['kriteria_kode']) {
			$i = str_replace('KR0', '', $k['kriteria_kode']) + 1;
			$kode = 'KR0'.$i;
		} else {
			$kode = 'KR01';
		}
		

		$set = array(
						'kriteria_kode' => $kode,
						'kriteria_title' => $_POST['kriteria_title'],
						'kriteria_bobot' => $_POST['kriteria_bobot'],
						'kriteria_jenis' => $_POST['kriteria_jenis'],
						'kriteria_tanggal' => date('Y-m-d'), 
					);
		$this->db->set($set);

		if ($this->db->insert('t_kriteria')) {
			$this->session->set_flashdata('success','Data berhasil di tambah');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di tambah');
		}
		redirect(base_url('weight/kriteria'));
	}
	function update_kriteria($id){
		$set = array(
						'kriteria_title' => $_POST['kriteria_title'],
						'kriteria_bobot' => $_POST['kriteria_bobot'],
						'kriteria_jenis' => $_POST['kriteria_jenis'], 
					);
		$this->db->set($set);
		$this->db->where('kriteria_id',$id);
		if ($this->db->update('t_kriteria')) {
			$this->session->set_flashdata('success','Data berhasil di edit');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di edit');
		}
		redirect(base_url('weight/kriteria'));
	}
	function delete_kriteria($id){
		$this->db->set('kriteria_hapus',1);
		$this->db->where('kriteria_id',$id);

		if ($this->db->update('t_kriteria')) {
			$this->session->set_flashdata('success','Data berhasil di hapus');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di hapus');
		}
		redirect(base_url('weight/kriteria'));
	}

	/////////////////////////////////////////////////////////

	///////////////-- Sub Kriteria --////////////////////////

	function sub(){
		if ( $this->session->userdata('login') == 1) {
			$data['weight'] = 'active'; 
		    $data['title'] = 'Sub Kriteria';

		    $data['data'] = $this->db->query("SELECT * FROM t_sub as a JOIN t_kriteria as b ON a.sub_kriteria = b.kriteria_id WHERE a.sub_hapus = 0")->result_array();
		    $data['kriteria_data'] = $this->db->query("SELECT * FROM t_kriteria WHERE kriteria_hapus = 0")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('sub/index');
		    $this->load->view('v_template_admin/admin_footer');
 
		}
		else{
			redirect(base_url('login'));
		}
	} 
	function add_sub(){
		//generate kode
		$k = $this->db->query("SELECT * FROM t_sub order by sub_id DESC LIMIT 1")->row_array();
		if (@$k['sub_kode']) {
			$i = str_replace('SUB0', '', $k['sub_kode']) + 1;
			$kode = 'SUB0'.$i;
		} else {
			$kode = 'SUB01';
		}
		

		$set = array(
						'sub_kode' => $kode,
						'sub_title' => $_POST['sub_title'],
						'sub_bobot' => $_POST['sub_bobot'],
						'sub_kriteria' => $_POST['sub_kriteria'],
						'sub_tanggal' => date('Y-m-d'), 
					);
		$this->db->set($set);

		if ($this->db->insert('t_sub')) {
			$this->session->set_flashdata('success','Data berhasil di tambah');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di tambah');
		}
		redirect(base_url('weight/sub'));
	}
	function update_sub($id){
		$set = array(
						'sub_title' => $_POST['sub_title'],
						'sub_bobot' => $_POST['sub_bobot'],
						'sub_kriteria' => $_POST['sub_kriteria'], 
					);
		$this->db->set($set);
		$this->db->where('sub_id',$id);
		if ($this->db->update('t_sub')) {
			$this->session->set_flashdata('success','Data berhasil di edit');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di edit');
		}
		redirect(base_url('weight/sub'));
	}
	function delete_sub($id){
		$this->db->set('sub_hapus',1);
		$this->db->where('sub_id',$id);

		if ($this->db->update('t_sub')) {
			$this->session->set_flashdata('success','Data berhasil di hapus');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di hapus');
		}
		redirect(base_url('weight/sub'));
	}

	/////////////////////////////////////////////////////////

	///////////////-- Penilaian --//////////////////////////

	function penilaian(){
		if ( $this->session->userdata('login') == 1) {
			$data['weight'] = 'active'; 
		    $data['title'] = 'Penilaian';
 
		    $data['data'] = $this->db->query("SELECT * FROM t_weight as a JOIN t_penduduk as b ON a.weight_penduduk = b.penduduk_id WHERE a.weight_hapus = 0 AND weight_status = 0")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('penilaian/index');
		    $this->load->view('v_template_admin/admin_footer');
 
		}
		else{
			redirect(base_url('login'));
		}
	} 
	function delete_penilaian($id){
		$this->db->set('weight_hapus',1);
		$this->db->where('weight_id',$id);

		if ($this->db->update('t_weight')) {
			$idk = $this->db->query("SELECT * FROM t_weight WHERE weight_id = '$id'")->row_array();

			//delete status penilaian
			$this->db->where('penilaian_karyawan',$idk['weight_karyawan']);
			$this->db->set('penilaian_hapus',1);
			$this->db->update('t_penilaian');

			$this->session->set_flashdata('success','Data berhasil di hapus');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di hapus');
		}
		redirect(base_url('weight/penilaian'));
	}
	function penilaian_add(){
		if ( $this->session->userdata('login') == 1) {
			$data['weight'] = 'active'; 
		    $data['title'] = 'Penilaian';

		    $data['karyawan_data'] = $this->db->query("SELECT * FROM t_karyawan WHERE karyawan_hapus = 0 AND karyawan_status = 0")->result_array();

		    $data['kriteria_data'] = $this->db->query("SELECT * FROM t_kriteria WHERE kriteria_hapus = 0")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('penilaian/add');
		    $this->load->view('v_template_admin/admin_footer');
 
		}
		else{
			redirect(base_url('login'));
		}
	}
	function penilaian_insert(){
		$id = $_POST['nama'];

		for ($i = 1; $i < $_POST['jumlah'] ; $i++) {

			//insert looping
			$set = array(	
						'penilaian_kriteria' => $_POST['kriteria_'.$i],
						'penilaian_karyawan' => $id,
						'penilaian_pilih' => $_POST['pilih_'.$i],
						'penilaian_tanggal' => date('Y-m-d'),
						'penilaian_jenis' => $_POST['jenis_'.$i],
					);
			$this->db->set($set);
			$this->db->insert('t_penilaian');	
		}

		//insert weight
		$set1 = array(	
						'weight_karyawan' => $id,
						'weight_tanggal' => date('Y-m-d'),
					);
		$this->db->set($set1);
		$this->db->where('weight_id',$id);
		if ($this->db->insert('t_weight')) {
			//ubah status penduduk
			$this->db->set('karyawan_status',1);
			$this->db->where('karyawan_id',$id);
			$this->db->update('t_karyawan');

			$this->session->set_flashdata('success','Data berhasil di simpan');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di simpan');
		}

		$this->session->set_flashdata('success','Data berhasil di simpan');
		redirect(base_url('weight/penilaian'));
		
	}

	////////////////////////////////////////////////////////

	///////////////-- Penilaian --//////////////////////////

	function seleksi(){
		$num = $this->db->query("SELECT * FROM t_weight WHERE weight_status = 0 AND weight_hapus = 0")->num_rows();

		if ($num >= 5) {
			
			//perbaikan bobot
			$bobot = $this->db->query("SELECT SUM(kriteria_bobot) AS jum_bobot FROM t_kriteria WHERE kriteria_hapus = 0")->row_array();

			$b = $this->db->query("SELECT * FROM t_kriteria WHERE kriteria_hapus = 0")->result_array();

			foreach ($b as $key) {
				$bobot_nilai = $key['kriteria_bobot'] / $bobot['jum_bobot'];

				$bobot_set = array(
									'bobot_kode' => $key['kriteria_kode'],
									'bobot_nilai' => $bobot_nilai, 
								  );

				$this->db->set($bobot_set);
				$this->db->insert('t_bobot');
			}
			////////////////////////////////////////////////////////////

			//menentukan vektor
			$v = $this->db->query("SELECT * FROM t_penilaian WHERE penilaian_status = 0")->result_array();
			$bt = $this->db->query("SELECT * FROM t_bobot WHERE bobot_status = 0")->result_array();

			foreach ($v as $v_key) {
				foreach ($bt as $b_key) {
					if ($v_key['penilaian_kriteria'] == $b_key['bobot_kode']) {
						
						if ($v_key['penilaian_jenis'] == 'benefit') {
							//benefit
							$x = pow($v_key['penilaian_pilih'], $b_key['bobot_nilai']);
						} else {
							//cost
							$x = pow($v_key['penilaian_pilih'], '-'.$b_key['bobot_nilai']);
						}

						$vektor_set = array(	
											'vektor_karyawan' => $v_key['penilaian_karyawan'], 
											'vektor_kode' => $v_key['penilaian_kriteria'],
											'vektor_nilai' => round($x,4),
											);
						$this->db->set($vektor_set);
						$this->db->insert('t_vektor');
					}
				}
			}
			////////////////////////////////////////////////////////////

			//menghitung prevensi
			$p = $this->db->query("SELECT *, ROUND(SUM(vektor_nilai),4) AS sum_nilai FROM t_vektor WHERE vektor_status = 0 GROUP BY vektor_karyawan")->result_array();
			$sum = $this->db->query("SELECT ROUND(SUM(vektor_nilai),4) AS sum FROM t_vektor WHERE vektor_status = 0")->row_array();

			foreach ($p as $key) {
				$c = $key['sum_nilai'] / $sum['sum'];

				$prevensi_set = array(
										'prevensi_karyawan' => $key['vektor_karyawan'],
										'prevensi_nilai' => round($c,4), 
									);

				$this->db->set($prevensi_set);
				$this->db->insert('t_prevensi');

			}
			//////////////////////////////////////////////////

			//penerima bonus
			$limit = $_POST['limit'];

			$desc = $this->db->query("SELECT * FROM t_prevensi WHERE prevensi_status = 0 ORDER BY prevensi_nilai DESC LIMIT $limit")->result_array();

			foreach ($desc as $ds) {
				$bonus_set = array(
									'bonus_karyawan' => $ds['prevensi_karyawan'],
									'bonus_nilai' => $ds['prevensi_nilai'],
									'bonus_tanggal' => date('Y-m-d'), 
								  );

				$this->db->set($bonus_set);
				$this->db->insert('t_bonus');
			}
			//////////////////////////////////////////////////////

			//ubah status
			
			//karyawan
			$this->db->set('karyawan_status',1);
			$this->db->update('t_karyawan');

			//weight
			$this->db->set('weight_status',1);
			$this->db->update('t_weight');

			//penilaian
			$this->db->set('penilaian_status',1);
			$this->db->update('t_penilaian');

			//bobot
			$this->db->set('bobot_status',1);
			$this->db->update('t_bobot');

			//vektor
			$this->db->set('vektor_status',1);
			$this->db->update('t_vektor');

			//prevensi
			$this->db->set('prevensi_status',1);
			$this->db->update('t_prevensi');

			////////////////////-- END --//////////////////////////

			$this->session->set_flashdata('success','Karyawan selesai di seleksi cek penerima bonus');

		} else {
			$this->session->set_flashdata('gagal','Karyawan yang di seleksi kurang dari 5 orang');
		}

		redirect(base_url('weight/penilaian'));
		
	}
}